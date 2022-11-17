<?php

namespace App\Http\Controllers;

use App\models\Kecamatan;
use App\models\Desa;
use App\models\Puskes;
use App\models\Balita;
use App\models\PuskesModel;
use App\User;
// use Auth;
use Illuminate\Support\Facades\Hash;



use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class PuskesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $puskes = Puskes::all();
        $user = User::all();

        $kecamatan = Kecamatan::get();
        $balita = Balita::get();
        $desa = Desa::get();
        return view('puskes')->with([
            'puskes' => $puskes,
            'kecamatan' => $kecamatan,
            'balita' => $balita,
            'desa' => $desa,
            'user' => $user,

        ]);
    }

         /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function puskes()
    {
        
        $puskes = Puskes::all();
        return json_encode($puskes);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function lokasip($id_puskes='')
    {
        $puskes = Puskes::find($id_puskes);
        return json_encode($puskes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
{

        $kecamatan = Kecamatan::get();
        $desa = Desa::get();
        $puskes = Puskes::all();
        $user = User::all();
        return view('tambahpuskes', compact('kecamatan','desa','puskes','user'));

       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $data = $request->all();

        // Puskes::create([

        //     'nama_puskes' => $data['nama_puskes'],
        //     'alamat' => $data['alamat'],
        //     'email' => $data['email'],
        //     'kd_kecamatan' => $data['kd_kecamatan'],
        //     'latitude' => $data['latitude'],
        //     'longitude' => $data['longitude'],
        //     'status' => "0",
        //     'user_id' => "0",

        // ]);

        // User::create([
        //     // 'id' => $data['user_id'],
        //     'name' => $data['nama_puskes'],
        //     'email' => $data['email'],
        //     'password' => Hash::make($data['password']),
        //     'level' => "puskes"
        // ]);

        $validatedData = $request->validate([

            'nama_puskes' => 'required',
            'alamat' => 'required',
            'kd_kecamatan' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
        ]);

        Puskes::create($validatedData);
        return redirect('/puskes')->with('success', 'data berhasil tertambah');

        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_puskes)
    {
        // return view('editkecamatan');
        $puskes = Puskes::find($id_puskes);
        $desa = Desa::all();
        return view('ubahpuskes', compact('puskes','desa'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_puskes)
    {
        $puskes = Puskes::find($id_puskes);
        $puskes->nama_puskes = $request->nama_puskes;
        $puskes->alamat = $request->alamat;
        $puskes->kd_kecamatan = $request->kd_kecamatan;
        $puskes->latitude = $request->latitude;
        $puskes->longitude = $request->longitude;



        $puskes->update();

        return redirect('/puskes')->with('success', 'Data Berhasil Di Ubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_puskes)
    {
        $puskes = Puskes::find($id_puskes);
        $puskes->delete();
        return back()->with('success', 'Data Berhasil Di Hapus');
    }
}

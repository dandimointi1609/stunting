<?php

namespace App\Http\Controllers;

use App\models\Kecamatan;
use App\models\Desa;
use App\models\Puskes;
use App\models\Balita;
use App\models\PuskesModel;


use Illuminate\Http\Request;

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
        $kecamatan = Kecamatan::get();
        $desa = Desa::get();
        return view('puskes', [ 'puskes' =>$puskes]);
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
        return view('tambahpuskes', compact('kecamatan','desa','puskes'));
        // return view('puskes', [ 'puskes' =>$puskes]);

       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Puskes::create([
            'nama_puskes' => $request->nama_puskes,
            'alamat' => $request->alamat,
            'kd_kecamatan' => $request->kd_kecamatan,
            'status' => '0',
            'latitude' => $request->latitude,
            'longitude' => $request->longitude


            

        ]);
            
        return redirect('/puskes');
        
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

        return redirect('/puskes');
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
        return back();
    }
}

<?php

namespace App\Http\Controllers;

use App\models\Kecamatan;
use App\models\Desa;
use App\models\KecamatanModel;
use Illuminate\Http\Request;
use Carbon\Carbon;

class KecamatanController extends Controller
{ 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->KecamatanModel= new KecamatanModel();
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kecamatan = Kecamatan::all();
        $results = $this->KecamatanModel->allLokasi();
        return view('kecamatan')->with([
            'kecamatan' => $kecamatan,
            'lokasi' => $results,
        ]);
    }

         /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function kecamatan()
    {
        $results = $this->KecamatanModel->allData();
        return json_encode($results);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function lokasik($kd_kecamatan='')
    {
        $results = $this->KecamatanModel->getlokasi($kd_kecamatan);
        return json_encode($results);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tambahkecamatan');
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([

            'kd_kecamatan' => 'required',
            'nama_kecamatan' => 'required',
            'kd_kecamatan' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
        ]);

        Kecamatan::create($validatedData);
        return redirect('/kecamatan')->with('success', 'data berhasil tertambah');

        // Kecamatan::create([
        //     'kd_kecamatan' => $request->kd_kecamatan,
        //     'nama_kecamatan' => $request->nama_kecamatan,
        //     'longitude' => $request->longitude,
        //     'latitude' => $request->latitude,
        // ]);

        // return redirect('/kecamatan');
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
    public function edit($kd_kecamatan)
    {

        $kecamatan = Kecamatan::find($kd_kecamatan);
        return view('ubahkecamatan', compact('kecamatan'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $kd_kecamatan)
    {

        $kecamatan = Kecamatan::find($kd_kecamatan);
        $kecamatan->kd_kecamatan = $request->kd_kecamatan;
        $kecamatan->nama_kecamatan = $request->nama_kecamatan;
        $kecamatan->longitude = $request->longitude;
        $kecamatan->latitude = $request->latitude;
        
        $kecamatan->update();

        return redirect('/kecamatan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($kd_kecamatan)
    {
        $kecamatan = Kecamatan::find($kd_kecamatan);
        $kecamatan->delete();
        return back();
    }
}

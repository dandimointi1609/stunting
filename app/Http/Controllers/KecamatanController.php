<?php

namespace App\Http\Controllers;

use App\models\Kecamatan;
use App\models\Desa;
use Illuminate\Http\Request;
use Carbon\Carbon;

class KecamatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //  return view('balita');
        $kecamatan = Kecamatan::all();

        return view('kecamatan', [ 'kecamatan' =>$kecamatan]);
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
        if ($request->file('gambar')) {
            $file = $request->file('gambar');
            // $dt = Carbon::now();
            // $acak  = $file->getClientOriginalExtension();
            // $acak  = $file->getClientOriginalExtension();
            $file->getClientOriginalName();
            $file->getClientOriginalExtension();
            // $fileName = $request->getClientOriginalName();
            $request->file('gambar')->move("webmap\geojson", $file->getClientOriginalName());
            $gambar = $file;
        } else {
            $cover = NULL;
        }

        Kecamatan::create([
            'kd_kecamatan' => $request->kd_kecamatan,
            'nama_kecamatan' => $request->nama_kecamatan,
            // 'longitude' => $request->longitude,
            // 'latitude' => $request->latitude,
            // 'gambar' => $request->gambar,


        ]);

        return redirect('/kecamatan');
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
        // return view('editkecamatan');
        // $kecamatan = Kecamatan::find($id_kecamatan);
        // return view('ubahkecamatan', compact('kecamatan'));

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
        // $kecamatan = Kecamatan::find($id_kecamatan);
        // $kecamatan->nama_kecamatan = $request->nama_kecamatan;
        // $kecamatan->id_kecamatan = $request->kecamatan;
        // $kecamatan->update();

        // return redirect('/kecamatan');

        $kecamatan = Kecamatan::find($kd_kecamatan);
        $kecamatan->kd_kecamatan = $request->kd_kecamatan;
        $kecamatan->nama_kecamatan = $request->nama_kecamatan;
        // $kecamatan->longitude = $request->longitude;
        // $kecamatan->latitude = $request->latitude;
        
        // $balita->id_jenis_kelamin = $request->jenis_kelamin;
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

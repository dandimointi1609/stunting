<?php

namespace App\Http\Controllers;

use App\models\Kecamatan;
use App\models\Desa;
use Illuminate\Http\Request;

class DesaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //  return view('balita');
        $desa = Desa::all();

        return view('desa', [ 'desa' =>$desa]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('tambahdesa');
        $kecamatan = Kecamatan::get();
        // $status = Status::get();

        return view('tambahdesa', compact('kecamatan'));
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Desa::create([
            'kd_desa' => $request->kd_desa,
            'nama_desa' => $request->nama_desa,
            'kd_kecamatan' => $request->kd_kecamatan,

        ]);

        return redirect('/desa');
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
    public function edit($kd_desa)
    {
        // return view('editkecamatan');
        $desa = Desa::find($kd_desa);
        $kecamatan = Kecamatan::all();
        
        return view('ubahdesa', compact('desa','kecamatan'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $kd_desa)
    {
        $desa = Desa::find($kd_desa);
        $desa->kd_desa = $request->kd_desa;
        $desa->nama_desa = $request->nama_desa;
        $desa->kd_kecamatan = $request->kd_kecamatan;
        $desa->update();

        return redirect('/desa');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($kd_desa)
    {
        $desa = Desa::find($kd_desa);
        $desa->delete();
        return back();
    }
}

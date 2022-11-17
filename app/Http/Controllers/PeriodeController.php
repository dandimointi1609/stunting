<?php

namespace App\Http\Controllers;

use App\models\Balita;
use Illuminate\Http\Request;
use App\User;
use App\models\Periode;


class PeriodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $periode = Balita::all();
        // $periode = User::get();
        $dataperiode = Periode::all()->where('jenis_periode','sebaran');
        $dataperiode2 = Periode::all()->where('jenis_periode','pravelensi');


        // return view('dataperiode', compact('periode'));
        return view('dataperiode', [ 'dataperiode' =>$dataperiode,
                                     'dataperiode2' =>$dataperiode2,
                                    ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
                $dataperiode = Periode::get();        
                // return view('dataperiode', compact('periode'));
                return view('dataperiode', [ 'dataperiode' =>$dataperiode]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $validatedData = $request->validate([

        //     'id_periode' => 'required',
        //     'nama_periode' => 'required',
        //     'tgl_awal' => 'required',
        //     'tgl_akhir' => 'required',
        //     'jenis_periode' => 'required',
        // ]);

        // Periode::create($validatedData);
        // return redirect('/desa')->with('success', 'data berhasil tertambah');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('/dataperiode');
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_periode)
    {
        $periode = Periode::find($id_periode);
        $periode->update([
            'status' => '1'
        ]);

        return redirect('/dataperiode');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

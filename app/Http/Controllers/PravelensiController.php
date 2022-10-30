<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\TitikModel;
use App\models\Periode;
use App\Models\Kecamatan;
use App\Models\Desa;
use App\Models\Balita;
use App\Models\Puskes;





class PravelensiController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->TitikModel= new TitikModel();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $periode = Periode::all();
        $desa = Desa::all();
        $balita = Balita::all();
        $puskes = Puskes::all();
        $kecamatan = Kecamatan::all();
        $kecamatan = Kecamatan::all();

        // $kecamatan = Kecamatan::all();
        $results = $this->TitikModel->allLokasi();
        // $pencarian = $this->TitikModel->allPencarian();

        return view('pravelensi')->with([
            'lokasi' => $results,
            // 'pencarian' => $pencarian,
            'periode' => $periode,
            'balita' => $balita,
            'puskes' => $puskes,
            'kecamatan' => $kecamatan,
            'desa' => $desa

        ]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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

    public function laporan(Request $request){
        if($request->kd):
            return view('buntulia');
        else:
            return view('buntulia1');
        endif;
    }
}

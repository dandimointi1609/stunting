<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Kecamatan;
use App\models\Desa;
use App\models\Puskes;
use App\models\Balita;
use App\models\TitikModel;
use App\models\PuskesModel;
use App\models\KecamatanModel;
use App\models\Periode;





class SebaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->TitikModel= new TitikModel();
        $this->KecamatanModel= new KecamatanModel();
        $this->PuskesModel= new PuskesModel();

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $periode = Periode::all();
        $results = $this->TitikModel->allLokasi();
        $pencarian = $this->TitikModel->allPencarian();

        return view('sebaran')->with([
            'lokasi' => $results,
            'pencarian' => $pencarian,
            'periode' => $periode

        ]);
    }


     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function titik()
    {
        $results = $this->TitikModel->allData();
        return json_encode($results);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function lokasi($kd_kecamatan='')
    {
        $results = $this->TitikModel->getlokasi($kd_kecamatan);
        return json_encode($results);
    }

    public function data($kd_kecamatan='')
    {
        $results = $this->TitikModel->getGrafik($kd_kecamatan);
        return json_encode($results);
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
}

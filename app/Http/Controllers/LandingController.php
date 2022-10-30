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

use App\Exports\PenderitaExport;
use PDF;


use Illuminate\Support\Facades\DB;

use Maatwebsite\Excel\facades\Excel;
use App\Http\Controllers\Controller;

class LandingController extends Controller
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
        $kecamatan = Kecamatan::all();
        $results = $this->TitikModel->allLokasi();
        $pencarian = $this->TitikModel->allPencarian();

        return view('homepage')->with([
            'lokasi' => $results,
            'pencarian' => $pencarian,
            'kecamatan' => $kecamatan,
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

    public function sebaranpertanggal($tglawal,$tglakhir,$fkecamatan){

        $sebaranpertanggal= DB::table('t_balita AS b')     
        ->select(DB::raw('count(b.hasil) as total'),
                 DB::raw('sum(b.hasil = "pendek") as total_pendek'),
                 DB::raw('sum(b.hasil = "sangatpendek") as sangat_pendek'),
                           'd.nama_desa',
                           'k.nama_kecamatan',
                           'b.tgl_pengukuran',
                           'p.nama_puskes'
                          )
                          ->groupBy('k.nama_kecamatan','d.nama_desa','b.tgl_pengukuran','p.nama_puskes','kode_desa')
                          ->rightjoin('t_puskes as p', 'b.id_puskes', '=', 'p.id_puskes')
                          ->rightjoin('t_desa as d', 'b.kode_desa', '=', 'd.kd_desa')
                          ->rightjoin('t_kecamatan as k', 'd.kd_kecamatan', '=', 'k.kd_kecamatan')
                          ->whereBetween('tgl_pengukuran',[$tglawal,$tglakhir])
                          ->where('nama_kecamatan',[$fkecamatan])
                          ->orderBy('p.nama_puskes', 'desc')
        ->get();
        return view('cetak-sebaranpertanggal-pdf', compact('sebaranpertanggal'));
        view()->share('data', $sebaranpertanggal);
    }
}

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
use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

// use PDF;
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
        ini_set('max_execution_time', 300);


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

        // $balita = Balita::all();
        // ->whereBetween('b.tgl_pengukuran',[$tglawal,$tglakhir])


        $data= DB::table('t_balita AS b')     
        ->select(DB::raw('sum(b.hasil) as total'),
                 DB::raw('sum(b.hasil = "pendek") as total_pendek'),
                 DB::raw('sum(b.hasil = "sangatpendek") as sangat_pendek'),
                 DB::raw('sum(b.hasil = "sangatpendek") + sum(b.hasil = "pendek")  as pendek_sangat_pendek'),
                 DB::raw('((sum(b.hasil = "sangatpendek") + sum(b.hasil = "pendek")) / COUNT(b.hasil)) * 100  as pravelensi'),   
                           'd.nama_desa',
                           'k.nama_kecamatan',
                           'b.tgl_pengukuran',
                           'b.id_periode',
                           'p.nama_puskes',
                           'dp.nama_periode'
                          )
                          ->groupBy('b.kode_desa')
                          ->join('t_periode as dp', 'b.id_periode', '=', 'dp.id_periode')
                          ->rightjoin('t_puskes as p', 'b.id_puskes', '=', 'p.id_puskes')
                          ->rightjoin('t_desa as d', 'b.kode_desa', '=', 'd.kd_desa')
                          ->rightjoin('t_kecamatan as k', 'd.kd_kecamatan', '=', 'k.kd_kecamatan')
                        //   ->where('b.id_periode',[$fperiode])
                         ->whereBetween('b.tgl_pengukuran',[$tglawal,$tglakhir])
                          ->where('k.nama_kecamatan',[$fkecamatan])
                          ->orderBy('b.kode_desa', 'desc')
        ->get();
        // $data = DB::select('SELECT t_desa.nama_desa, t_kecamatan.nama_kecamatan, t_balita.tgl_pengukuran, t_puskes.nama_puskes, t_puskes.id_puskes, COUNT(t_balita.hasil) as total, sum(t_balita.hasil = "pendek") as total_pendek , sum(t_balita.hasil = "sangatpendek") as sangat_pendek, sum(t_balita.hasil = "normal") as normal, sum(t_balita.hasil = "sangatpendek") + sum(t_balita.hasil = "pendek") as pendek_sangat_pendek, ((sum(t_balita.hasil = "sangatpendek") + sum(t_balita.hasil = "pendek")) / COUNT(t_balita.hasil)) * 100 as pravelensi FROM t_balita RIGHT JOIN t_desa ON t_balita.kode_desa = t_desa.kd_desa RIGHT JOIN t_puskes ON t_balita.id_puskes = t_puskes.id_puskes RIGHT JOIN t_kecamatan ON t_desa.kd_kecamatan = t_kecamatan.kd_kecamatan GROUP BY t_balita.kode_desa ORDER BY t_balita.kode_desa DESC;');
        
        // return view('cetak-sebaranpertanggal-pdf', compact('sebaranpertanggal','periode'));
        return view('cetak-sebaranpertanggal-pdf')->with([
            'data' => $data,
        ]);
        view()->share('data', $data);



        // view()->share('data', $data);
        // $pdf = PDF::loadview('cetak-sebaranpertanggal-pdf');
        // return $pdf->download('sebaranpertanggal.pdf');
    }
}



<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\TitikModel;
use App\models\Periode;
use App\Models\Kecamatan;
use App\Models\Desa;
use App\Models\Balita;
use App\Models\Puskes;

use Illuminate\Support\Facades\DB;

use Maatwebsite\Excel\facades\Excel;
use App\Http\Controllers\Controller;





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
    public function index($fkecamatan)
    {
        $periode = Periode::all();
        $desa = Desa::all();
        $balita = Balita::all();
        $puskes = Puskes::all();
        $kecamatan = Kecamatan::all();
        $kecamatan = Kecamatan::all();

        if($fkecamatan == 'all'){
            $results = $this->TitikModel->allLokasi();
        }else{
            $results = DB::table('t_kecamatan AS k')     
            ->select(DB::raw('count(hasil) as total'),
                  DB::raw('sum(b.hasil = "pendek") as total_pendek, k.kd_kecamatan'),
                  DB::raw('sum(b.hasil = "sangatpendek") as sangat_pendek, k.kd_kecamatan'),
                   'k.kd_kecamatan', 
                   'k.nama_kecamatan',
                   'd.nama_desa'
                   )
                   ->rightjoin('t_puskes as p', 'k.kd_kecamatan', '=', 'p.kd_kecamatan')
                   ->join('t_balita as b', 'p.id_puskes', '=', 'b.id_puskes')
                   ->rightjoin('t_desa as d', 'b.kode_desa', '=', 'd.kd_desa')
                   ->groupBy('k.kd_kecamatan','k.nama_kecamatan','d.nama_desa')
                   ->where('nama_kecamatan',[$fkecamatan])
                //    ->whereBetween('nama_kecamatan',[$fkecamatan])
              ->get();
        }
        // $pencarian = $this->TitikModel->allPencarian();

        return view('pravelensi')->with([
            'lokasi' => $results,
            // 'pencarian' => $pencarian,
            'periode' => $periode,
            'balita' => $balita,
            'puskes' => $puskes,
            'kecamatan' => $kecamatan,
            'desa' => $desa,
            'fkecamatan' => $fkecamatan

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
    public function sebaranpertanggal($fkecamatan){

        $periode = Periode::all();
        $desa = Desa::all();
        $balita = Balita::all();
        $puskes = Puskes::all();
        $kecamatan = Kecamatan::all();
        $kecamatan = Kecamatan::all();
        $results = $this->TitikModel->allLokasi();

        $sebaranpertanggal= DB::table('t_kecamatan AS k')     
        ->select(DB::raw('count(hasil) as total'),
              DB::raw('sum(b.hasil = "pendek") as total_pendek, k.kd_kecamatan'),
              DB::raw('sum(b.hasil = "sangatpendek") as sangat_pendek, k.kd_kecamatan'),
               'k.kd_kecamatan', 
               'k.nama_kecamatan',
               'd.nama_desa'
               )
               ->rightjoin('t_puskes as p', 'k.kd_kecamatan', '=', 'p.kd_kecamatan')
               ->join('t_balita as b', 'p.id_puskes', '=', 'b.id_puskes')
               ->rightjoin('t_desa as d', 'b.kode_desa', '=', 'd.kd_desa')
               ->groupBy('k.kd_kecamatan','k.nama_kecamatan','d.nama_desa')
               ->where('nama_kecamatan',[$fkecamatan])
            //    ->whereBetween('nama_kecamatan',[$fkecamatan])
          ->get();
        // return view('grafik', compact('sebaranpertanggal'));
        
        return view('grafik')->with([
            'lokasi' => $results,
            'periode' => $periode,
            'balita' => $balita,
            'puskes' => $puskes,
            'kecamatan' => $kecamatan,
            'desa' => $desa,
            'sebaranpertanggal' => $sebaranpertanggal


        ]);

        // view()->share('data', $sebaranpertanggal);

    }

}

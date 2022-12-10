<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\TitikModel;
use App\models\GrafikModel;
// use App\models\Periode;
use App\Models\Kecamatan;
use App\Models\Desa;
use App\Models\Balita;
use App\Models\Puskes;
use Illuminate\Support\Carbon;

use Illuminate\Support\Facades\DB;

use Maatwebsite\Excel\facades\Excel;
use App\Http\Controllers\Controller;
use App\Exports\GpravelensiExport;
// use Maatwebsite\Excel\Facades\Excel;





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
        // $this->GrafikModel= new GrafikModel();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($fkecamatan)
    {
        // $periode = Periode::all();
        $desa = Desa::all();
        $balita = Balita::all();
        $puskes = Puskes::all();
        $kecamatan = Kecamatan::all();


        if($fkecamatan == 'all'){
            $results = $this->TitikModel->allGrafik();
        }else{
         $results = DB::table('t_pravelensi as g')     
            ->select(DB::raw('(g.total_pendek_sangat / g.total_balita) * 100  as pravelensi'),
             'p.nama_puskes',
             'k.kd_kecamatan', 
             'k.nama_kecamatan',
             'd.nama_desa'
             )
             ->rightjoin('t_puskes as p', 'g.id_puskes', '=', 'p.id_puskes')
             ->rightjoin('t_desa as d', 'g.kd_desa', '=', 'd.kd_desa')
             ->rightjoin('t_kecamatan as k', 'p.kd_kecamatan', '=', 'k.kd_kecamatan')
             ->groupBy('k.kd_kecamatan','k.nama_kecamatan','d.nama_desa')
             ->whereYear('g.tgl_input', Carbon::now()->year)
             ->where('k.nama_kecamatan',[$fkecamatan])

        ->get();
        }

        return view('pravelensi')->with([
            'lokasi' => $results,
            // 'periode' => $periode,
            'balita' => $balita,
            'puskes' => $puskes,
            'kecamatan' => $kecamatan,
            'desa' => $desa,
            'fkecamatan' => $fkecamatan
        ]);
    }


                         /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function gpravelensi($filterkecamatan)
    {
        return Excel::download(new GpravelensiExport($filterkecamatan),'data-gpravelensi.xlsx');
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
    // public function sebaranpertanggal($fkecamatan){

    //     // $periode = Periode::all();
    //     $desa = Desa::all();
    //     $balita = Balita::all();
    //     $puskes = Puskes::all();
    //     $kecamatan = Kecamatan::all();
    //     $kecamatan = Kecamatan::all();
    //     $results = $this->TitikModel->allLokasi();

    //     $sebaranpertanggal= DB::table('t_kecamatan AS k')     
    //     ->select(DB::raw('count(hasil) as total'),
    //           DB::raw('sum(b.hasil = "pendek") as total_pendek, k.kd_kecamatan'),
    //           DB::raw('sum(b.hasil = "sangatpendek") as sangat_pendek, k.kd_kecamatan'),
    //            'k.kd_kecamatan', 
    //            'k.nama_kecamatan',
    //            'd.nama_desa'
    //            )
    //            ->rightjoin('t_puskes as p', 'k.kd_kecamatan', '=', 'p.kd_kecamatan')
    //            ->join('t_balita as b', 'p.id_puskes', '=', 'b.id_puskes')
    //            ->rightjoin('t_desa as d', 'b.kode_desa', '=', 'd.kd_desa')
    //            ->groupBy('k.kd_kecamatan','k.nama_kecamatan','d.nama_desa')
    //            ->where('nama_kecamatan',[$fkecamatan])
    //         //    ->whereBetween('nama_kecamatan',[$fkecamatan])
    //       ->get();
    //     // return view('grafik', compact('sebaranpertanggal'));
        
    //     return view('grafik')->with([
    //         'lokasi' => $results,
    //         // 'periode' => $periode,
    //         'balita' => $balita,
    //         'puskes' => $puskes,
    //         'kecamatan' => $kecamatan,
    //         'desa' => $desa,
    //         'sebaranpertanggal' => $sebaranpertanggal


    //     ]);

    //     // view()->share('data', $sebaranpertanggal);

    // }
    public function pravelensipertanggalf($filterkecamatan){

        $data = DB::table('t_pravelensi as g')     
        ->select(DB::raw('(g.total_pendek_sangat / g.total_balita) * 100  as pravelensi'),
        'p.nama_puskes',
        'k.kd_kecamatan', 
        'k.nama_kecamatan',
        'g.tgl_input',
        'g.total_balita',
        'g.pendek',
        'g.sangat_pendek',
        'g.total_pendek_sangat',
        'd.nama_desa'
         )
         ->rightjoin('t_puskes as p', 'g.id_puskes', '=', 'p.id_puskes')
         ->rightjoin('t_desa as d', 'g.kd_desa', '=', 'd.kd_desa')
         ->rightjoin('t_kecamatan as k', 'p.kd_kecamatan', '=', 'k.kd_kecamatan')
         ->groupBy('id_pravelensi')
         ->where('k.nama_kecamatan',[$filterkecamatan])
        ->get();
        return view('cetak-pravelensipertanggal-pdf')->with([
            'data' => $data,
        ]);
        view()->share('data', $data);
    }

    public function pravelensipertanggal($tglawal,$tglakhir,$filterkecamatan){

        $data = DB::table('t_pravelensi as g')     
        ->select(DB::raw('(g.total_pendek_sangat / g.total_balita) * 100  as pravelensi'),
        'p.nama_puskes',
        'k.kd_kecamatan', 
        'k.nama_kecamatan',
        'g.tgl_input',
        'g.total_balita',
        'g.pendek',
        'g.sangat_pendek',
        'g.total_pendek_sangat',
        'd.nama_desa'
         )
         ->rightjoin('t_puskes as p', 'g.id_puskes', '=', 'p.id_puskes')
         ->rightjoin('t_desa as d', 'g.kd_desa', '=', 'd.kd_desa')
         ->rightjoin('t_kecamatan as k', 'p.kd_kecamatan', '=', 'k.kd_kecamatan')
         ->groupBy('id_pravelensi')
         ->whereBetween('g.tgl_input',[$tglawal,$tglakhir])
         ->where('k.nama_kecamatan',[$filterkecamatan])
        ->get();
        return view('cetak-pravelensipertanggal-pdf')->with([
            'data' => $data,
        ]);
        view()->share('data', $data);
    }

    public function pravelensipertanggalall(){
        $data = DB::table('t_pravelensi as g')     
        ->select(DB::raw('(g.total_pendek_sangat / g.total_balita) * 100  as pravelensi'),
         'p.nama_puskes',
         'k.kd_kecamatan', 
         'k.nama_kecamatan',
         'g.tgl_input',
         'g.total_balita',
         'g.pendek',
         'g.sangat_pendek',
         'g.total_pendek_sangat',
         'd.nama_desa'
         )
         ->rightjoin('t_puskes as p', 'g.id_puskes', '=', 'p.id_puskes')
         ->rightjoin('t_desa as d', 'g.kd_desa', '=', 'd.kd_desa')
         ->rightjoin('t_kecamatan as k', 'p.kd_kecamatan', '=', 'k.kd_kecamatan')
         ->groupBy('id_pravelensi')
         ->orderBy('k.nama_kecamatan')
        ->get();

        return view('cetak-pravelensipertanggal-pdf')->with([
            'data' => $data,
        ]);
        view()->share('data', $data);
    }

}

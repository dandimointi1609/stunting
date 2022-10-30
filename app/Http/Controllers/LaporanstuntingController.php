<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\models\Jenis_Kelamin;
use App\models\Balita;
use App\models\Puskes;
use App\models\Desa;
use App\models\Kecamatan;
use App\Exports\LaporanExport;
use PDF;
use App\models\Periode;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\facades\Excel;
use App\Http\Controllers\Controller;

class LaporanstuntingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $balita = Balita::all();
        $periode = Periode::all();

        // return view('balita', [ 'balita' =>$balita]);
        
        return view('penderita')->with([
            'penderita' => $balita,
            'periode' => $periode

        ]);
    }

    public function laporanexport()
    {
       
        return Excel::download(new LaporanExport,'LaporanPenderita.xlsx');
    }

    public function cetaklaporan($tglawal,$tglakhir){
        $filterlaporan= DB::table('t_balita AS b')     
        ->select(          'b.nama_balita',
                           'j.jenis_kelamin',
                           'b.tgl_lahir',
                           'b.bb_lahir',
                           'b.tb_lahir',
                           'b.nama_ortu',
                           'k.nama_kecamatan',
                           'p.nama_puskes',
                           'd.nama_desa',
                           'b.alamat',
                           'b.tgl_pengukuran',
                           'b.bb',
                           'b.tb',
                           'b.hasil',
                           'b.tgl_pengukuran'

                          )
                          ->groupBy('k.nama_kecamatan','d.nama_desa','b.tgl_pengukuran','p.nama_puskes','kode_desa','b.nama_balita','j.jenis_kelamin',
                          
                          'b.tgl_lahir',
                          'b.bb_lahir',
                          'b.tb_lahir',
                          'b.nama_ortu',
                          'k.nama_kecamatan',
                          'p.nama_puskes',
                          'd.nama_desa',
                          'b.alamat',
                          'b.tgl_pengukuran',
                          'b.bb',
                          'b.tb',
                          'b.hasil',
                          'b.tgl_pengukuran'
                          
                                    )
                          ->rightjoin('t_puskes as p', 'b.id_puskes', '=', 'p.id_puskes')
                          ->rightjoin('t_jenkel as j', 'b.id_jenis_kelamin', '=', 'j.id_jk')
                          ->rightjoin('t_desa as d', 'b.kode_desa', '=', 'd.kd_desa')
                          ->rightjoin('t_kecamatan as k', 'd.kd_kecamatan', '=', 'k.kd_kecamatan')
                          ->whereBetween('tgl_pengukuran',[$tglawal,$tglakhir])
                          ->orderBy('p.nama_puskes', 'desc')
                   ->get();
        return view('cetak-laporan-pdf', compact('filterlaporan'));
        view()->share('filterlaporan', $filterlaporan);
    }

    public function laporanall(){
        $filterlaporan = DB::table('t_balita AS b')     
        ->select(          'b.nama_balita',
                            'j.jenis_kelamin',
                            'b.tgl_lahir',
                            'b.bb_lahir',
                            'b.tb_lahir',
                            'b.nama_ortu',
                            'k.nama_kecamatan',
                            'p.nama_puskes',
                            'd.nama_desa',
                            'b.alamat',
                            'b.tgl_pengukuran',
                            'b.bb',
                            'b.tb',
                            'b.hasil',
                            'b.tgl_pengukuran'
                          )
                        //   ->groupBy('k.nama_kecamatan','d.nama_desa','b.tgl_pengukuran','p.nama_puskes','kode_desa','b.nama_balita')
                        ->groupBy('k.nama_kecamatan','d.nama_desa','b.tgl_pengukuran','p.nama_puskes','kode_desa','b.nama_balita','j.jenis_kelamin','b.tgl_lahir','b.bb_lahir','b.tb_lahir',
                                'b.nama_ortu',
                                'k.nama_kecamatan',
                                'p.nama_puskes',
                                'd.nama_desa',
                                'b.alamat',
                                'b.tgl_pengukuran',
                                'b.bb',
                                'b.tb',
                                'b.hasil',
                                'b.tgl_pengukuran')

                        ->rightjoin('t_jenkel as j', 'b.id_jenis_kelamin', '=', 'j.id_jk')
                          ->rightjoin('t_puskes as p', 'b.id_puskes', '=', 'p.id_puskes')
                          ->rightjoin('t_desa as d', 'b.kode_desa', '=', 'd.kd_desa')
                          ->rightjoin('t_kecamatan as k', 'd.kd_kecamatan', '=', 'k.kd_kecamatan')
                          ->orderBy('p.nama_puskes', 'desc')
                   ->get();
                   return view('cetak-laporan-pdf', compact('filterlaporan'));
                   view()->share('filterlaporan', $filterlaporan);

                //    $pdf = PDF::loadview('cetak-laporan-pdf',['filterlaporan'=>$filterlaporan]);
                //    return $pdf->download('cetak-laporan-pdf');
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

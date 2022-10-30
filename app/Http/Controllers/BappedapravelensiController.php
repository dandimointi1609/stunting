<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\models\Jenis_Kelamin;
use App\models\Balita;
use App\models\Puskes;
use App\models\Desa;
use App\models\Kecamatan;
use App\Exports\PenderitaExport;
use PDF;
use App\models\Periode;

use Illuminate\Support\Facades\DB;

use Maatwebsite\Excel\facades\Excel;
use App\Http\Controllers\Controller;

class BappedapravelensiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $periode = Periode::all();
        $kecamatan = Kecamatan::all();
        $laporan = DB::table('t_balita AS b')     
         ->select(DB::raw('count(b.hasil) as total'),
                  DB::raw('sum(b.hasil = "pendek") as total_pendek'),
                  DB::raw('sum(b.hasil = "sangatpendek") as sangat_pendek'),
                            'd.nama_desa',
                            'k.nama_kecamatan',
                            'b.tgl_pengukuran',
                            'u.id_puskesmas',
                            'p.nama_puskes',
                            'p.id_puskes'

                           )
                           ->groupBy('k.nama_kecamatan','d.nama_desa','p.nama_puskes','kode_desa','b.tgl_pengukuran','u.id_puskesmas','p.id_puskes')
                           ->rightjoin('t_puskes as p', 'b.id_puskes', '=', 'p.id_puskes')
                           ->rightjoin('t_desa as d', 'b.kode_desa', '=', 'd.kd_desa')
                           ->rightjoin('t_kecamatan as k', 'd.kd_kecamatan', '=', 'k.kd_kecamatan')
                          ->rightjoin('users as u', 'u.id_puskesmas', '=', 'p.id_puskes')
                           ->orderBy('d.nama_desa', 'desc')
                    ->get();

        return view('laporan')->with([
            'laporan' => $laporan,
            'kecamatan' => $kecamatan,
            'periode' => $periode

        ]);
    }

         /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function penderitaexport()
    {
       
        return Excel::download(new PenderitaExport,'penderita.xlsx');
    }

            /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function penderitapdf()
    {
        $data = DB::table('t_balita AS b')     
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
                           ->orderBy('p.nama_puskes', 'desc')
                    ->get();
        view()->share('data', $data);
        $pdf = PDF::loadview('pravelensi-pdf');
        return $pdf->download('pravelensi.pdf');
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

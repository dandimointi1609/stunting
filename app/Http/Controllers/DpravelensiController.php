<?php

namespace App\Http\Controllers;

// use App\models\Kecamatan;
// use App\models\Desa;
// use App\models\Puskes;
// use App\models\Periode;

// use App\models\Balita;
// use Illuminate\Http\Request;

use App\models\Jenis_Kelamin;
use App\models\Balita;
use App\models\Puskes;
use App\models\Desa;
use App\models\Kecamatan;
use App\Exports\PravelensiExport;
use PDF;
use App\models\Periode;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Maatwebsite\Excel\facades\Excel;
use App\Http\Controllers\Controller;

class DpravelensiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //  return view('dpravelensi');
        $puskes = Puskes::all();
        // dd($puskes);
        $periode = Periode::all();
        $kecamatan = Kecamatan::all();
        $balita = Balita::all();

        


        // return view('dpravelensi', [ 'dpravelensi' =>$puskes]);

        return view('dpravelensi')->with([
            'puskes' => $puskes,
            'kecamatan' => $kecamatan,
            'balita' => $balita,
            'periode' => $periode

        ]);

    }

    public function pravelensiexport()
    {
       
        return Excel::download(new PravelensiExport,'pravelensi.xlsx');
    }

                /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function pravelensipdf()
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
        return view('tambahdpravelensi');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

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
    public function edit()
    {
        return view('ubahdpravelensi');

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_puskes)
    {
        $dpravelensi = Puskes::find($id_puskes);


        $dpravelensi->update([
            'status' => '1'
        ]);

        // $dpravelensi->buku->where('id_buku', $dpravelensi->buku->id_buku)
        //     ->update([
        //         'jumlah' => ($dpravelensi->buku->jumlah + 1),
        //     ]);

        return redirect('/dpravelensi');
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

    public function filterpertanggal($tglawal,$tglakhir){
        $filterpertanggal= DB::table('t_balita AS b')     
        ->select(DB::raw('count(b.hasil) as total'),
                 DB::raw('sum(b.hasil = "pendek") as total_pendek'),
                 DB::raw('sum(b.hasil = "sangatpendek") as sangat_pendek'),
                           'd.nama_desa',
                           'k.nama_kecamatan',
                           'b.tgl_pengukuran',
                           'b.alamat',
                           'p.nama_puskes'
                          )
                          ->groupBy('k.nama_kecamatan','d.nama_desa','b.tgl_pengukuran','p.nama_puskes','kode_desa','b.alamat')
                          ->rightjoin('t_puskes as p', 'b.id_puskes', '=', 'p.id_puskes')
                          ->rightjoin('t_desa as d', 'b.kode_desa', '=', 'd.kd_desa')
                          ->rightjoin('t_kecamatan as k', 'd.kd_kecamatan', '=', 'k.kd_kecamatan')
                          ->whereBetween('tgl_pengukuran',[$tglawal,$tglakhir])
                          ->orderBy('p.nama_puskes', 'desc')
                   ->get();
        return view('filter-pertanggal-pdf', compact('filterpertanggal'));
        view()->share('data', $filterpertanggal);

    }
}

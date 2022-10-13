<?php

namespace App\Http\Controllers;

// use App\models\Jenis_Kelamin;
// use App\models\Balita;
use App\models\Jenis_Kelamin;
use App\models\Balita;
use App\models\Puskes;
use App\models\Desa;
use App\models\Kecamatan;
use App\Exports\PenderitaExport;
use PDF;
use App\models\Periode;

use Illuminate\Support\Facades\DB;


use Illuminate\Http\Request;

use Maatwebsite\Excel\facades\Excel;
use App\Http\Controllers\Controller;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $periode = Periode::all();

        $laporan = DB::table('t_balita AS b')     
         ->select(DB::raw('count(b.hasil) as total'),
                  DB::raw('sum(b.hasil = "pendek") as total_pendek'),
                  DB::raw('sum(b.hasil = "sangatpendek") as sangat_pendek'),
                            'd.nama_desa',
                            'k.nama_kecamatan',
                            'b.tgl_pengukuran',
                            'p.nama_puskes'
                           )
                           ->groupBy('k.nama_kecamatan','d.nama_desa','p.nama_puskes','kode_desa','b.tgl_pengukuran')
                           ->rightjoin('t_puskes as p', 'b.id_puskes', '=', 'p.id_puskes')
                           ->rightjoin('t_desa as d', 'b.kode_desa', '=', 'd.kd_desa')
                           ->rightjoin('t_kecamatan as k', 'd.kd_kecamatan', '=', 'k.kd_kecamatan')
                           ->orderBy('p.nama_puskes', 'desc')
                    ->get();

        return view('laporan')->with([
            'laporan' => $laporan,
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
        // return view('tambahbalita');
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Balita::create([
        //     'nama_balita' => $request->nama_balita,
        //     'id_jenis_kelamin' => $request->jenis_kelamin,

        // ]);

        // return redirect('/balita');
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
    public function edit($id_balita)
    {
        // return view('editkecamatan');
        // $balita = Balita::find($id_balita);
        // return view('ubahbalita', compact('balita'));

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
        // $balita = Balita::find($id_balita);
        // $balita->nama_balita = $request->nama_balita;
        // $balita->id_jenis_kelamin = $request->jenis_kelamin;
        // $balita->update();

        // return redirect('/balita');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $balita = Balita::find($id_balita);
        // $balita->delete();
        // return back();
    }


    public function cetakpertanggal($tglawal,$tglakhir){
        $cetakpertanggal= DB::table('t_balita AS b')     
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
                          ->orderBy('p.nama_puskes', 'desc')
                   ->get();
        return view('cetak-pertanggal-pdf', compact('cetakpertanggal'));
        view()->share('data', $cetakpertanggal);

        // view()->share('cetakpertanggal', $cetakpertanggal);
        // $pdf = PDF::loadview('cetak-pertanggal-pdf');
        // return $pdf->download('cetak-pertanggal-pdf');
    }

    // public function cetakpenderita($tglawal,$tglakhir){
    //     $cetakpenderita= DB::table('t_balita AS b')     
    //     ->select(          'b.nama_balita',
    //                        'b.tgl_pengukuran',
    //                        'k.nama_kecamatan',
    //                        'd.nama_desa',
    //                        'p.nama_puskes'
    //                       )
    //                       ->groupBy('b.nama_balita','k.nama_kecamatan','d.nama_desa','b.tgl_pengukuran','p.nama_puskes','kode_desa')
    //                       ->rightjoin('t_puskes as p', 'b.id_puskes', '=', 'p.id_puskes')
    //                       ->rightjoin('t_desa as d', 'b.kode_desa', '=', 'd.kd_desa')
    //                       ->rightjoin('t_kecamatan as k', 'd.kd_kecamatan', '=', 'k.kd_kecamatan')
    //                       ->whereBetween('tgl_pengukuran',[$tglawal,$tglakhir])
    //                       ->orderBy('p.nama_puskes', 'desc')
    //                ->get();
            // view()->share('cetakpenderita', $cetakpenderita);
            // $pdf = PDF::loadview('cetak-penderita-pdf');
            // return $pdf->download('cetak-penderita-pdf');
    // }
}

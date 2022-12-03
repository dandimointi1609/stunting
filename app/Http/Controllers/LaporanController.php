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
use Faker\Provider\Base;

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
        // $kecamatan = Kecamatan::all();
        // $balita = Balita::all();

        $laporan= DB::table('t_balita AS b')     
        ->select(DB::raw('count(b.hasil) as total   '),
                 DB::raw('sum(b.hasil = "pendek") as total_pendek'),
                 DB::raw('sum(b.hasil = "sangatpendek") as sangat_pendek'),
                 DB::raw('sum(b.hasil = "sangatpendek") + sum(b.hasil = "pendek")  as pendek_sangat_pendek'),
                 DB::raw('((sum(b.hasil = "sangatpendek") + sum(b.hasil = "pendek")) / COUNT(b.hasil)) * 100  as pravelensi'),   
                           'd.nama_desa',
                           'k.nama_kecamatan',
                           'b.tgl_pengukuran',
                           'b.id_periode',
                           'p.nama_puskes',
                           'u.id_puskesmas',
                           'p.id_puskes',
                           'b.kode_desa',
                           'dp.nama_periode'
                          )
                          ->groupBy('b.kode_desa','u.id_puskesmas')
                          ->join('t_periode as dp', 'b.id_periode', '=', 'dp.id_periode')
                          ->join('t_puskes as p', 'b.id_puskes', '=', 'p.id_puskes')
                          ->join('t_desa as d', 'b.kode_desa', '=', 'd.kd_desa')
                          ->join('t_kecamatan as k', 'd.kd_kecamatan', '=', 'k.kd_kecamatan')
                         ->join('users as u', 'u.id_puskesmas', '=', 'p.id_puskes')
                          ->orderBy('b.kode_desa', 'desc')
                    ->get();

        $laporan2 = DB::select('SELECT t_desa.nama_desa, t_kecamatan.nama_kecamatan, t_balita.tgl_pengukuran, t_puskes.nama_puskes, t_puskes.id_puskes, COUNT(t_balita.hasil) as total, sum(t_balita.hasil = "pendek") as total_pendek , sum(t_balita.hasil = "sangatpendek") as sangat_pendek, sum(t_balita.hasil = "normal") as normal, sum(t_balita.hasil = "sangatpendek") + sum(t_balita.hasil = "pendek") as pendek_sangat_pendek, ((sum(t_balita.hasil = "sangatpendek") + sum(t_balita.hasil = "pendek")) / COUNT(t_balita.hasil)) * 100 as pravelensi FROM t_balita RIGHT JOIN t_desa ON t_balita.kode_desa = t_desa.kd_desa RIGHT JOIN t_puskes ON t_balita.id_puskes = t_puskes.id_puskes RIGHT JOIN t_kecamatan ON t_desa.kd_kecamatan = t_kecamatan.kd_kecamatan GROUP BY t_balita.kode_desa ORDER BY t_balita.kode_desa DESC;');
                    // dd($laporan2);

        return view('laporan')->with([
            'laporan' => $laporan2,
            // 'kecamatan' => $kecamatan,
            // 'balita' => $balita,
            'periode' => $periode

        ]);

        
    }

         /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function penderitaexport(Request $request)
    {
     
        // $puskes = DB::table('t_balita AS b')     
        //  ->select(DB::raw('count(b.hasil) as total'),
        //           DB::raw('sum(b.hasil = "pendek") as total_pendek'),
        //           DB::raw('sum(b.hasil = "sangatpendek") as sangat_pendek'),
        //                     'd.nama_desa',
        //                     'k.nama_kecamatan',
        //                     'p.nama_puskes'
        //                    )
        //                    ->groupBy('k.nama_kecamatan','d.nama_desa','p.nama_puskes','kode_desa')
        //                    ->rightjoin('t_puskes as p', 'b.id_puskes', '=', 'p.id_puskes')
        //                    ->rightjoin('t_desa as d', 'b.kode_desa', '=', 'd.kd_desa')
        //                    ->rightjoin('t_kecamatan as k', 'd.kd_kecamatan', '=', 'k.kd_kecamatan') 
                        //    ->where('k.nama_kecamatan','buntulia')  
                        //    ->whereBetween('tgl_pengukuran',[$tglawal,$tglakhir])
        //                    ->orderBy('p.nama_puskes', 'desc')
        //             ->get();
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


        // public function cetakpertanggal($fperiode){
        //     $cetakpertanggal= DB::table('t_balita AS b')     
        //     ->select(DB::raw('count(b.hasil) as total'),
        //              DB::raw('sum(b.hasil = "pendek") as total_pendek'),
        //              DB::raw('sum(b.hasil = "sangatpendek") as sangat_pendek'),
        //                        'd.nama_desa',
        //                        'k.nama_kecamatan',
        //                        'b.tgl_pengukuran',
        //                        'p.nama_puskes',
        //                        'b.id_periode',
        //                        'p.id_puskes'
        //                       )
        //                       ->groupBy('k.nama_kecamatan','d.nama_desa','b.tgl_pengukuran','p.nama_puskes','kode_desa','p.id_puskes')
        //                       ->join('t_periode as dp', 'b.id_periode', '=', 'dp.id_periode')
        //                       ->rightjoin('t_puskes as p', 'b.id_puskes', '=', 'p.id_puskes')
        //                       ->rightjoin('t_desa as d', 'b.kode_desa', '=', 'd.kd_desa')
        //                       ->rightjoin('t_kecamatan as k', 'd.kd_kecamatan', '=', 'k.kd_kecamatan')
        //                       ->rightjoin('users as u', 'u.id_puskesmas', '=', 'p.id_puskes')
        //                     //   ->whereBetween('tgl_pengukuran',[$tglawal,$tglakhir])
        //                     //   ->where('nama_kecamatan',[$fperiode])
        //                       ->where('b.id_periode',[$fperiode])
        //                       ->orderBy('p.nama_puskes', 'desc')
        //                ->get();
        //     return view('cetak-pertanggal-pdf', compact('cetakpertanggal'));
        //     view()->share('data', $cetakpertanggal);

        //     // $cetakpertanggal= DB::table('t_balita AS b')     
        //     // ->select(DB::raw('sum(b.hasil) as total'),
        //     //          DB::raw('sum(b.hasil = "pendek") as total_pendek'),
        //     //          DB::raw('sum(b.hasil = "sangatpendek") as sangat_pendek'),
        //     //          DB::raw('sum(b.hasil = "sangatpendek") + sum(b.hasil = "pendek")  as pendek_sangat_pendek'),
        //     //          DB::raw('((sum(b.hasil = "sangatpendek") + sum(b.hasil = "pendek")) / COUNT(b.hasil)) * 100  as pravelensi'),   
        //     //                    'd.nama_desa',
        //     //                    'k.nama_kecamatan',
        //     //                    'b.tgl_pengukuran',
        //     //                    'p.nama_puskes',
        //     //                    'b.id_periode',
        //     //                    'p.id_puskes',
        //     //                    'dp.nama_periode'
        //     //                   )
        //     //                   ->groupBy('b.kode_desa')
        //     //                   ->join('t_periode as dp', 'b.id_periode', '=', 'dp.id_periode')
        //     //                   ->rightjoin('t_puskes as p', 'b.id_puskes', '=', 'p.id_puskes')
        //     //                   ->rightjoin('t_desa as d', 'b.kode_desa', '=', 'd.kd_desa')
        //     //                   ->rightjoin('t_kecamatan as k', 'd.kd_kecamatan', '=', 'k.kd_kecamatan')
        //     //                   ->rightjoin('users as u', 'u.id_puskesmas', '=', 'p.id_puskes')
        //     //                   ->where('b.id_periode',[$fperiode])
        //     //                   ->orderBy('b.kode_desa', 'desc')
        //     // ->get();
        //     // return view('cetak-pertanggal-pdf', compact('cetakpertanggal'));
        //     // view()->share('data', $cetakpertanggal);

        // }

    public function cetakpertanggal($tglawal,$tglakhir){

        // $cetakpertanggal= DB::table('t_balita AS b')     
        // ->select(DB::raw('COUNT(b.hasil) as total'),
        //          DB::raw('sum(b.hasil = "pendek") as total_pendek'),
        //          DB::raw('sum(b.hasil = "sangatpendek") as sangat_pendek'),
        //          DB::raw('sum(b.hasil = "sangatpendek") + sum(b.hasil = "pendek")  as pendek_sangat_pendek'),
        //          DB::raw('((sum(b.hasil = "sangatpendek") + sum(b.hasil = "pendek")) / COUNT(b.hasil)) * 100  as pravelensi'),   
        //                    'd.nama_desa',
        //                    'k.nama_kecamatan',
        //                    'b.tgl_pengukuran',
        //                    'b.id_periode',
        //                    'p.nama_puskes',
        //                    'p.id_puskes',
        //                    'dp.nama_periode'
        //                   )
        //                   ->groupBy('b.kode_desa')
        //                   ->join('t_periode as dp', 'b.id_periode', '=', 'dp.id_periode')
        //                   ->rightjoin('t_puskes as p', 'b.id_puskes', '=', 'p.id_puskes')
        //                   ->rightjoin('t_desa as d', 'b.kode_desa', '=', 'd.kd_desa')
        //                   ->rightjoin('t_kecamatan as k', 'd.kd_kecamatan', '=', 'k.kd_kecamatan')
        //                   ->rightjoin('users as u', 'u.id_puskesmas', '=', 'p.id_puskes')
        //                 //   ->where('b.id_periode',[$fperiode])
        //                 ->whereBetween('tgl_pengukuran',[$tglawal,$tglakhir])
        //                 ->orderBy('b.kode_desa', 'desc')
        // ->get();
        $cetakpertanggal = DB::select("SELECT t_desa.nama_desa, t_kecamatan.nama_kecamatan, t_balita.tgl_pengukuran, t_puskes.nama_puskes,
                                t_puskes.id_puskes,
                                COUNT(t_balita.hasil) as total,
                                sum(t_balita.hasil = 'pendek') as total_pendek,
                                sum(t_balita.hasil = 'sangatpendek') as sangat_pendek,
                                sum(t_balita.hasil = 'normal') as normal,
                                sum(t_balita.hasil = 'sangatpendek') + sum(t_balita.hasil = 'pendek')  as pendek_sangat_pendek,
                                ((sum(t_balita.hasil = 'sangatpendek') + sum(t_balita.hasil = 'pendek')) / COUNT(t_balita.hasil)) * 100  as pravelensi

                                FROM t_balita
                                RIGHT JOIN t_desa 
                                ON t_balita.kode_desa = t_desa.kd_desa
                                RIGHT JOIN t_puskes
                                ON t_balita.id_puskes = t_puskes.id_puskes
                                RIGHT JOIN t_kecamatan
                                ON t_desa.kd_kecamatan = t_kecamatan.kd_kecamatan
                                WHERE t_balita.tgl_pengukuran BETWEEN '$tglawal' AND '$tglakhir'
                                GROUP BY t_balita.kode_desa");

        // return view('cetak-sebaranpertanggal-pdf', compact('sebaranpertanggal','periode'));
        
        return view('cetak-pertanggal-pdf')->with([
            'cetakpertanggal' => $cetakpertanggal,  
        ]);
        view()->share('data', $cetakpertanggal);

        
    }

    public function cetakpertanggalall(){

        $cetakpertanggal= DB::table('t_balita AS b')     
        ->select(DB::raw('COUNT(b.hasil) as total'),
                 DB::raw('sum(b.hasil = "pendek") as total_pendek'),
                 DB::raw('sum(b.hasil = "sangatpendek") as sangat_pendek'),
                 DB::raw('sum(b.hasil = "sangatpendek") + sum(b.hasil = "pendek")  as pendek_sangat_pendek'),
                 DB::raw('((sum(b.hasil = "sangatpendek") + sum(b.hasil = "pendek")) / COUNT(b.hasil)) * 100  as pravelensi'),   
                           'd.nama_desa',
                           'k.nama_kecamatan',
                           'b.tgl_pengukuran',
                           'b.id_periode',
                           'p.nama_puskes',
                           'p.id_puskes',
                           'dp.nama_periode'
                          )
                          ->groupBy('b.kode_desa')
                          ->join('t_periode as dp', 'b.id_periode', '=', 'dp.id_periode')
                          ->rightjoin('t_puskes as p', 'b.id_puskes', '=', 'p.id_puskes')
                          ->rightjoin('t_desa as d', 'b.kode_desa', '=', 'd.kd_desa')
                          ->rightjoin('t_kecamatan as k', 'd.kd_kecamatan', '=', 'k.kd_kecamatan')
                          ->rightjoin('users as u', 'u.id_puskesmas', '=', 'p.id_puskes')
                        ->orderBy('b.kode_desa', 'desc')
        ->get();
        // $cetakpertanggal = DB::select("SELECT t_desa.nama_desa, t_kecamatan.nama_kecamatan, t_balita.tgl_pengukuran, t_puskes.nama_puskes,
        //                         t_puskes.id_puskes,
        //                         COUNT(t_balita.hasil) as total,
        //                         sum(t_balita.hasil = 'pendek') as total_pendek,
        //                         sum(t_balita.hasil = 'sangatpendek') as sangat_pendek,
        //                         sum(t_balita.hasil = 'normal') as normal,
        //                         sum(t_balita.hasil = 'sangatpendek') + sum(t_balita.hasil = 'pendek')  as pendek_sangat_pendek,
        //                         ((sum(t_balita.hasil = 'sangatpendek') + sum(t_balita.hasil = 'pendek')) / COUNT(t_balita.hasil)) * 100  as pravelensi

        //                         FROM t_balita
        //                         RIGHT JOIN t_desa 
        //                         ON t_balita.kode_desa = t_desa.kd_desa
        //                         RIGHT JOIN t_puskes
        //                         ON t_balita.id_puskes = t_puskes.id_puskes
        //                         RIGHT JOIN t_kecamatan
        //                         ON t_desa.kd_kecamatan = t_kecamatan.kd_kecamatan
        //                         WHERE t_balita.tgl_pengukuran BETWEEN '$tglawal' AND '$tglakhir'
        //                         GROUP BY t_balita.kode_desa");

        // return view('cetak-sebaranpertanggal-pdf', compact('sebaranpertanggal','periode'));
        
        return view('cetak-pertanggal-pdf')->with([
            'cetakpertanggal' => $cetakpertanggal,  
        ]);
        view()->share('data', $cetakpertanggal);

        
    }
    


}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Puskes;
use App\models\Desa;

use App\models\Pravelensi;
use Illuminate\Support\Facades\DB;
use PDF;
use App\Exports\InputpravelensiExport;
use Maatwebsite\Excel\Facades\Excel;




class InputpravelensiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pravelensi = DB::select('SELECT t_kecamatan.nama_kecamatan, t_puskes.nama_puskes, t_puskes.alamat, t_pravelensi.id_puskes,t_pravelensi.id_pravelensi, t_pravelensi.total_balita, t_pravelensi.pendek, t_pravelensi.sangat_pendek, t_pravelensi.total_pendek_sangat, t_desa.nama_desa,
        t_pravelensi.tgl_input,
        CAST((total_pendek_sangat / total_balita ) * 100 as FLOAT)  as pravelensi
        FROM t_pravelensi
        RIGHT JOIN t_puskes
        ON t_pravelensi.id_puskes = t_puskes.id_puskes
        RIGHT JOIN t_desa
        ON t_pravelensi.kd_desa = t_desa.kd_desa
        RIGHT JOIN t_kecamatan
        ON t_puskes.kd_kecamatan = t_kecamatan.kd_kecamatan
        WHERE id_pravelensi');
        // $pravelensi = pravelensi::all();
        $puskes = Puskes::all();
        $fpravelensi = Pravelensi::all();
        $desa = Desa::all();
        // $pravelensi = Pravelensi::all();
        return view('inputpravelensi')->with([
            'pravelensi' => $pravelensi,
            'fpravelensi' => $fpravelensi,
            'desa' => $desa,
            'puskes' => $puskes
        ]);
    }

    //          /**
    //  * Display a listing of the resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function inputpravelensiexport($filterkecamatan)
    // {
    //     return Excel::download(new InputpravelensiExport($filterkecamatan),'data-pravelensi.xlsx');
    // }

                 /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function inputpravelensiexport($tglawal,$tglakhir)
    {
        return Excel::download(new InputpravelensiExport($tglawal ,$tglakhir),'data-pravelensi.xlsx');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pravelensi = Pravelensi::get();
        $puskes = Puskes::get();
        $desa = Desa::get();
        return view('tambahinputpravelensi')->with([
            'pravelensi' => $pravelensi,
            'desa' => $desa,
            'puskes' => $puskes
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $validatedData = $request->validate([

        //     'id_puskes' => 'required',
        //     'total_balita' => 'required',
        //     'pendek' => 'required',
        //     'sangat_pendek' => 'required',
        //     'total_pendek_sangat' => 'required',
        // ]);

        // Pravelensi::create($validatedData);
        // return redirect('/inputpravelensi')->with('success', 'Data Berhasil Di Tambahkan');

        Pravelensi::create([
            'id_puskes' => $request->id_puskes,
            'total_balita' => $request->total_balita,
            'pendek' => $request->pendek,
            'sangat_pendek' => $request->sangat_pendek,
            'total_pendek_sangat' => $request->total_pendek_sangat,
            'tgl_input' => $request->tgl_input,
            'kd_desa' => $request->kd_desa,

        ]);

        return redirect('/inputpravelensi')->with('success', 'data berhasil tertambah');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_pravelensi)
    {
        $pravelensi = Pravelensi::find($id_pravelensi);
        $puskes = Puskes::all();
        $desa = Desa::all();
        return view('ubahinputpravelensi')->with([
            'pravelensi' => $pravelensi,
            'desa' => $desa,
            'puskes' => $puskes
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_pravelensi)
    {

         $pravelensi = Pravelensi::find($id_pravelensi);
        $puskes = Puskes::all();
        $desa = Desa::all();
        return view('ubahinputpravelensi')->with([
            'pravelensi' => $pravelensi,
            'desa' => $desa,
            'puskes' => $puskes
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_pravelensi)
    {
        $pravelensi = Pravelensi::find($id_pravelensi);
        $pravelensi->id_puskes = $request->id_puskes;
        $pravelensi->kd_desa = $request->kd_desa;
        $pravelensi->total_balita = $request->total_balita;
        $pravelensi->pendek = $request->pendek;
        $pravelensi->sangat_pendek = $request->sangat_pendek;
        $pravelensi->total_pendek_sangat = $request->total_pendek_sangat;
        $pravelensi->tgl_input = $request->tgl_input;


        $pravelensi->update();

        return redirect('/inputpravelensi')->with('success', 'Data Berhasil Di Ubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_pravelensi)
    {
        $pravelensi = Pravelensi::find($id_pravelensi);
        $pravelensi->delete();
        return back()->with('success', 'Data Berhasil Di Hapus');
    }



    public function cetaklaporan($tglawal,$tglakhir){

        $filterlaporan = DB::select("SELECT t_kecamatan.nama_kecamatan, t_puskes.nama_puskes, t_puskes.alamat, t_pravelensi.id_puskes,t_pravelensi.id_pravelensi, t_pravelensi.total_balita, t_pravelensi.pendek, t_pravelensi.sangat_pendek, t_pravelensi.total_pendek_sangat,
        CAST((total_pendek_sangat / total_balita ) * 100 as FLOAT)  as pravelensi
        FROM t_pravelensi
        RIGHT JOIN t_puskes
        ON t_pravelensi.id_puskes = t_puskes.id_puskes
        RIGHT JOIN t_kecamatan
        ON t_puskes.kd_kecamatan = t_kecamatan.kd_kecamatan
        WHERE t_pravelensi.tgl_input BETWEEN '$tglawal' AND '$tglakhir'
        ");

        // $filterlaporan= DB::table('t_balita AS b')     
        // ->select(          
        //                   'b.nama_balita',
        //                    'j.jenis_kelamin',
        //                    'b.tgl_lahir',
        //                    'b.bb_lahir',
        //                    'b.tb_lahir',
        //                    'b.nama_ortu',
        //                    'k.nama_kecamatan',
        //                    'p.nama_puskes',
        //                    'd.nama_desa',
        //                    'b.alamat',
        //                    'b.tgl_pengukuran',
        //                    'b.bb',
        //                    'b.tb',
        //                    'b.hasil',
        //                    'b.tgl_pengukuran'

        //                   )
        //                   ->groupBy('k.nama_kecamatan','d.nama_desa','b.tgl_pengukuran','p.nama_puskes','kode_desa','b.nama_balita','j.jenis_kelamin',
                          
        //                   'b.tgl_lahir',
        //                   'b.bb_lahir',
        //                   'b.tb_lahir',
        //                   'b.nama_ortu',
        //                   'k.nama_kecamatan',
        //                   'p.nama_puskes',
        //                   'd.nama_desa',
        //                   'b.alamat',
        //                   'b.tgl_pengukuran',
        //                   'b.bb',
        //                   'b.tb',
        //                   'b.hasil',
        //                   'b.tgl_pengukuran'
                          
        //                             )
        //                   ->rightjoin('t_puskes as p', 'b.id_puskes', '=', 'p.id_puskes')
        //                   ->rightjoin('t_jenkel as j', 'b.id_jenis_kelamin', '=', 'j.id_jk')
        //                   ->rightjoin('t_desa as d', 'b.kode_desa', '=', 'd.kd_desa')
        //                   ->rightjoin('t_kecamatan as k', 'd.kd_kecamatan', '=', 'k.kd_kecamatan')
        //                   ->whereBetween('tgl_pengukuran',[$tglawal,$tglakhir])
        //                   ->orderBy('p.nama_puskes', 'desc')
        // ->get();
        return view('inputpravelensi-pdf', compact('filterlaporan'));
        view()->share('filterlaporan', $filterlaporan);
    }

    public function laporanall(){
        $filterlaporan = DB::select("SELECT t_kecamatan.nama_kecamatan, t_puskes.nama_puskes, t_puskes.alamat, t_pravelensi.id_puskes,t_pravelensi.id_pravelensi, t_pravelensi.total_balita, t_pravelensi.pendek, t_pravelensi.sangat_pendek, t_pravelensi.total_pendek_sangat,
        CAST((total_pendek_sangat / total_balita ) * 100 as FLOAT)  as pravelensi
        FROM t_pravelensi
        RIGHT JOIN t_puskes
        ON t_pravelensi.id_puskes = t_puskes.id_puskes
        RIGHT JOIN t_kecamatan
        ON t_puskes.kd_kecamatan = t_kecamatan.kd_kecamatan
        WHERE id_pravelensi
        ");
        // $filterlaporan = DB::table('t_balita AS b')     
        // ->select(          'b.nama_balita',
        //                     'j.jenis_kelamin',
        //                     'b.tgl_lahir',
        //                     'b.bb_lahir',
        //                     'b.tb_lahir',
        //                     'b.nama_ortu',
        //                     'k.nama_kecamatan',
        //                     'p.nama_puskes',
        //                     'd.nama_desa',
        //                     'b.alamat',
        //                     'b.tgl_pengukuran',
        //                     'b.bb',
        //                     'b.tb',
        //                     'b.hasil',
        //                     'b.tgl_pengukuran'
        //                   )
        //                 //   ->groupBy('k.nama_kecamatan','d.nama_desa','b.tgl_pengukuran','p.nama_puskes','kode_desa','b.nama_balita')
        //                 ->groupBy('k.nama_kecamatan','d.nama_desa','b.tgl_pengukuran','p.nama_puskes','kode_desa','b.nama_balita','j.jenis_kelamin','b.tgl_lahir','b.bb_lahir','b.tb_lahir',
        //                         'b.nama_ortu',
        //                         'k.nama_kecamatan',
        //                         'p.nama_puskes',
        //                         'd.nama_desa',
        //                         'b.alamat',
        //                         'b.tgl_pengukuran',
        //                         'b.bb',
        //                         'b.tb',
        //                         'b.hasil',
        //                         'b.tgl_pengukuran')

        //                 ->rightjoin('t_jenkel as j', 'b.id_jenis_kelamin', '=', 'j.id_jk')
        //                   ->rightjoin('t_puskes as p', 'b.id_puskes', '=', 'p.id_puskes')
        //                   ->rightjoin('t_desa as d', 'b.kode_desa', '=', 'd.kd_desa')
        //                   ->rightjoin('t_kecamatan as k', 'd.kd_kecamatan', '=', 'k.kd_kecamatan')
        //                   ->orderBy('p.nama_puskes', 'desc')
        // ->get();
                   return view('inputpravelensi-pdf', compact('filterlaporan'));
                   view()->share('filterlaporan', $filterlaporan);

                //    $pdf = PDF::loadview('cetak-laporan-pdf',['filterlaporan'=>$filterlaporan]);
                //    return $pdf->download('cetak-laporan-pdf');
    }
}

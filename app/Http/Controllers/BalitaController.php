<?php

namespace App\Http\Controllers;

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
use Illuminate\Support\Facades\Auth;


class BalitaController extends Controller
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

        return view('balita', [ 'balita' =>$balita]);
        
        return view('balita')->with([
            'balita' => $balita,
            'periode' => $periode

        ]);
    }

        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function penderita()
    {

        $penderita = Balita::all();

        return view('penderita', [ 'penderita' =>$penderita]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('tambahbalita');
          // return view('tambahpuskes');
        // return view('tambahdesa');
        $puskes = Puskes::with('user')->where('id_puskes', Auth::user()->id_puskesmas)->get();
        // @if ($item->puskes->id_puskes == Auth::user()->id_puskesmas)

        $balita = Balita::get();

        $desa = Desa::get();
        $periode = Periode::get();


        // $status = Status::get();

        return view('tambahbalita', compact('puskes','desa','balita','periode'));
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Balita::create([
            'nama_balita' => $request->nama_balita,
            'id_jenis_kelamin' => $request->jenis_kelamin,
            'tgl_lahir' => $request->tgl_lahir,
            'tb_lahir' => $request->tb_lahir,
            'bb_lahir' => $request->bb_lahir,
            'nama_ortu' => $request->nama_ortu,
            'id_puskes' => $request->id_puskes,
            'kode_desa' => $request->kode_desa,
            'alamat' => $request->alamat,
            'tgl_pengukuran' => $request->tgl_pengukuran,
            'tb' => $request->tb,
            'bb' => $request->bb,
            'lila' => $request->lila,
            'tambah_kecamatan' => $request->tambah_kecamatan,
            'hasil' => $request->hasil,
            'id_periode' => $request->id_periode,

        ]);

        return redirect('/balita')->with('success', 'data berhasil tertambah');
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
        $balita = Balita::find($id_balita);
        $puskes = Puskes::all();
        $desa = Desa::all();


        return view('ubahbalita', compact('balita','puskes','desa'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_balita)
    {
        $balita = Balita::find($id_balita);
        $balita->nama_balita = $request->nama_balita;
        $balita->id_jenis_kelamin = $request->jenis_kelamin;
        $balita->tgl_lahir = $request->tgl_lahir;
        $balita->tb_lahir = $request->tb_lahir;
        $balita->bb_lahir = $request->bb_lahir;
        $balita->nama_ortu = $request->nama_ortu;
        $balita->id_puskes = $request->id_puskes;
        $balita->kode_desa = $request->kode_desa;
        $balita->alamat = $request->alamat;
        $balita->tgl_pengukuran = $request->tgl_pengukuran;
        $balita->tb = $request->tb;
        $balita->bb = $request->bb;
        $balita->lila = $request->lila;
        $balita->tambah_kecamatan = $request->tambah_kecamatan;
        $balita->hasil = $request->hasil;
        $balita->update();

        return redirect('/balita')->with('success', 'Data Berhasil Di Ubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_balita)
    {
        $balita = Balita::find($id_balita);
        $balita->delete();
        return back()->with('success', 'Data Berhasil Di Hapus');
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



    public function cetakpenderita($tglawal,$tglakhir){
        $cetakpenderita= DB::table('t_balita AS b')     
        ->select(          'b.nama_balita',
                           'b.tgl_pengukuran',
                           'k.nama_kecamatan',
                           'd.nama_desa',
                           'p.nama_puskes'
                          )
                          ->groupBy('k.nama_kecamatan','d.nama_desa','b.tgl_pengukuran','p.nama_puskes','kode_desa','b.nama_balita')
                          ->rightjoin('t_puskes as p', 'b.id_puskes', '=', 'p.id_puskes')
                          ->rightjoin('t_desa as d', 'b.kode_desa', '=', 'd.kd_desa')
                          ->rightjoin('t_kecamatan as k', 'd.kd_kecamatan', '=', 'k.kd_kecamatan')
                          ->whereBetween('tgl_pengukuran',[$tglawal,$tglakhir])
                          ->orderBy('p.nama_puskes', 'desc')
                   ->get();
        return view('cetak-penderita-pdf', compact('cetakpenderita'));
        view()->share('cetakpenderita', $cetakpenderita);
    }

    public function cetakall(){
        $cetakpenderita= DB::table('t_balita AS b')     
        ->select(          'b.nama_balita',
                           'b.tgl_pengukuran',
                           'k.nama_kecamatan',
                           'd.nama_desa',
                           'p.nama_puskes'
                          )
                          ->groupBy('k.nama_kecamatan','d.nama_desa','b.tgl_pengukuran','p.nama_puskes','kode_desa','b.nama_balita')
                          ->rightjoin('t_puskes as p', 'b.id_puskes', '=', 'p.id_puskes')
                          ->rightjoin('t_desa as d', 'b.kode_desa', '=', 'd.kd_desa')
                          ->rightjoin('t_kecamatan as k', 'd.kd_kecamatan', '=', 'k.kd_kecamatan')
                          ->orderBy('p.nama_puskes', 'desc')
                   ->get();
        return view('cetak-penderita-pdf', compact('cetakpenderita'));
        view()->share('cetakpenderita', $cetakpenderita);
    }
}
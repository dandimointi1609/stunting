<?php

namespace App\Http\Controllers;

use App\models\Jenis_Kelamin;
use App\models\Balita;
use App\models\Puskes;
use App\models\Desa;
use App\User;

use App\models\Kecamatan;
use App\Exports\PenderitaExport;
use PDF;
use App\models\Periode;
use Illuminate\Support\Facades\DB;



use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\Models;
// use App\Http\Controllers\Models;

class BalitaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   

        // $balita = DB::table('t_balita AS b')     
        // ->select(           'b.nama_balita', 
        //                     'b.tgl_pengukuran',
        //                     'b.id_balita',
        //                     'k.nama_kecamatan',
        //                     'd.nama_desa',
        //                     'u.id',
        //                     'p.nama_puskes'
        //                   )
        //                   ->rightjoin('t_puskes as p', 'b.id_puskes', '=', 'p.id_puskes')
        //                   ->rightjoin('t_desa as d', 'b.kode_desa', '=', 'd.kd_desa')
        //                   ->rightjoin('t_kecamatan as k', 'd.kd_kecamatan', '=', 'k.kd_kecamatan')
        //                   ->rightjoin('users as u', 'p.user_id', '=', 'u.id')
        //                   ->where('p.user_id')
        //            ->get();

        // $balita = Puskes::all();
        // $user = User::all();
        // echo Auth::user()->id;
        // die;
        $puskes = Puskes::with('user')->where('user_id',Auth::user()->id)->get(); 
        // dd($puskes); 
        $balita = Balita::with('puskes','desa','user')->get();
        // dd($balita);
        // dd($balita);

        // $balita = Balita::with('user','desa')->get();


        // $balita = Balita::all();
        // $kecamatan = Kecamatan::all();
        // $balita = Puskes::with('user')->where('user_id', Auth::user()->id)->firstOrFail();
        // $balita = Puskes::with(['user','balita'])->where('nama_puskes')->firstOrFail();
        
        // dd($balita);

        $periode = Periode::all();
        // $balita = Balita::all();

        // $user = User::all();
        // $periode = Periode::all();

        // return view('balita', [ 'balita' =>$balita]);
        
        return view('balita')->with([
            'balita' => $balita,
            'puskes' => $puskes,
            'periode' => $periode


        ]);
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
        // $puskes = Puskes::get();
        $puskes = Puskes::with('user')->where('user_id',Auth::user()->id)->get(); 
        // print_r($puskes[0]->id_puskes);
        // die;
        $desa = Desa::get();
        $balita = Balita::get();

        // $status = Status::get();

        return view('tambahbalita', compact('puskes','desa','balita'));
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // $validatedData = new Balita;

        // $validatedData = $request->validate([
        //     'nama_balita' => 'required',
        //     'id_jenis_kelamin' => 'required',
        //     'tgl_lahir' => 'required',
        //     'tb_lahir' => 'required',
        //     'bb_lahir' => 'required',
        //     'nama_ortu' => 'required',
        //     'id_puskes' => 'required',
        //     'kode_desa' => 'required',
        //     'alamat' => 'required',
        //     'tgl_pengukuran' => 'required',
        //     'tb' => 'required',
        //     'bb' => 'required',
        //     'lila' => 'required',
        //     'tambah_kecamatan' => 'required',
        //     'hasil' => 'required'

        // ]);

        // $validatedData->save();
        // return back();

        $validatedData = $request->validate([
            'nama_balita' => 'required',
            'id_jenis_kelamin' => 'required',
            'tgl_lahir' => 'required',
            'tb_lahir' => 'required',
            'bb_lahir' => 'required',
            'nama_ortu' => 'required',
            'id_puskes' => 'required',
            'kode_desa' => 'required',
            'alamat' => 'required',
            'tgl_pengukuran' => 'required',
            'tb' => 'required',
            'bb' => 'required',
            'lila' => 'required',
            'tambah_kecamatan' => 'required',
            'hasil' => 'required'
        ]);

        Balita::create($validatedData);
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

        return redirect('/balita');
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
        return back();
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

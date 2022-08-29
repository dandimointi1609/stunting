<?php

namespace App\Http\Controllers;

use App\models\Jenis_Kelamin;
use App\models\Balita;
use App\models\Puskes;
use App\models\Desa;
use App\models\Kecamatan;


use Illuminate\Http\Request;

class BalitaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //  return view('balita');
        $balita = Balita::all();

        return view('balita', [ 'balita' =>$balita]);
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
        $puskes = Puskes::get();
        $desa = Desa::get();

        // $status = Status::get();

        return view('tambahbalita', compact('puskes','desa'));
       
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
            'hasil' => $request->hasil,
        ]);

        return redirect('/balita');
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
}

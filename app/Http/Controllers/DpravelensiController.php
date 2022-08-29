<?php

namespace App\Http\Controllers;

use App\models\Kecamatan;
use App\models\Desa;
use App\models\Puskes;
use App\models\Balita;
use Illuminate\Http\Request;

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

        return view('dpravelensi', [ 'dpravelensi' =>$puskes]);

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
}

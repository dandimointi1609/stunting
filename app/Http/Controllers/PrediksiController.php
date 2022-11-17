<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Prediksi;


class PrediksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $prediksi = Prediksi::all();
       return view('prediksi')->with(['prediksi' => $prediksi]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
                $prediksi = Prediksi::get();
                return view('tambahprediksi', compact('prediksi'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $validatedData = $request->validate([

            'bln_thn' => 'required',
            'd_aktual' => 'required',
        ]);

        Prediksi::create($validatedData);
        return redirect('/prediksi')->with('success', 'Data Berhasil Di Tambahkan');
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
    public function edit($id_prediksi)
    {
                $prediksi = Prediksi::find($id_prediksi);
                return view('ubahprediksi', compact('prediksi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_prediksi)
    {
        $prediksi = Prediksi::find($id_prediksi);
        $prediksi->bln_thn = $request->bln_thn;
        $prediksi->d_aktual = $request->d_aktual;
        $prediksi->update();

        return redirect('/prediksi')->with('success', 'Data Berhasil Di Ubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_prediksi)
    {
        $prediksi = Prediksi::find($id_prediksi);
        $prediksi->delete();
        return back()->with('success', 'Data Berhasil Di Hapus');
    }
}

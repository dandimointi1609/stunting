<?php

namespace App\Http\Controllers;

use App\models\Kecamatan;
use App\models\Desa;
use App\models\KecamatanModel;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Str;
use Illuminate\Support\Facades\Storage;
// use Illuminate\Http\Request::getClien;

// use file;
class KecamatanController extends Controller
{ 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->KecamatanModel= new KecamatanModel();
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kecamatan = Kecamatan::all();
        $results = $this->KecamatanModel->allLokasi();
        return view('kecamatan')->with([
            'kecamatan' => $kecamatan,
            'lokasi' => $results,
        ]);
    }

         /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function kecamatan()
    {
        $results = $this->KecamatanModel->allData();
        return json_encode($results);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function lokasik($kd_kecamatan='')
    {
        $results = $this->KecamatanModel->getlokasi($kd_kecamatan);
        return json_encode($results);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tambahkecamatan');
       
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

            'kd_kecamatan' => 'required',
            'no_kecamatan' => 'required',
            'nama_kecamatan' => 'required',
            'kd_kecamatan' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'geojson' => 'required',
        ]);


        
		// menyimpan data file yang diupload ke variabel $file
		if($geojson = $request->file('geojson')){
 
                // nama file
        echo 'File Name: '.$geojson->getClientOriginalName();
        echo '<br>';

                // ekstensi file
        echo 'File Extension: '.$geojson->getClientOriginalExtension();
        echo '<br>';

                // real path
        echo 'File Real Path: '.$geojson->getRealPath();
        echo '<br>';

                // ukuran file
        echo 'File Size: '.$geojson->getSize();
        echo '<br>';

                // tipe mime
        echo 'File Mime Type: '.$geojson->getMimeType();

                // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'post-images';

        

            // upload file
            $validatedData['geojson'] = $geojson->storeAS($tujuan_upload,$geojson->getClientOriginalName());
        }
 
        Kecamatan::create($validatedData);
        return redirect('/kecamatan')->with('success', 'data berhasil tertambah');

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
    public function edit($kd_kecamatan)
    {

        $kecamatan = Kecamatan::find($kd_kecamatan);
        return view('ubahkecamatan', compact('kecamatan'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $kd_kecamatan)
    {

        $kecamatan = Kecamatan::find($kd_kecamatan);
        $kecamatan->kd_kecamatan = $request->kd_kecamatan;
        $kecamatan->no_kecamatan = $request->no_kecamatan;
        $kecamatan->nama_kecamatan = $request->nama_kecamatan;
        $kecamatan->longitude = $request->longitude;
        $kecamatan->latitude = $request->latitude;
        $kecamatan->geojson = $request->geojson;

        
        $kecamatan->update();

        return redirect('/kecamatan')->with('success', 'Data Berhasil Di Ubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kecamatan $kecamatan)
    {
        if($kecamatan->geojson){
            Storage::delete($kecamatan->geojson);

        }
        Kecamatan::destroy($kecamatan->kd_kecamatan);

        // $file = Kecamatan::find($kecamatan);
        // File::delete('storage/post-images' .$file->geojson);
        // $file->delete();
        
        // $kecamatan = Kecamatan::where('kd_kecamatan',$kd_kecamatan)->first();
		// File::delete('assets\ambil'.$kecamatan->geojson);

        // 	// hapus data
		// Kecamatan::where('kd_kecamatan',$kd_kecamatan)->delete();

        // $kecamatan->delete();


        return back()->with('success', 'Data Berhasil Di Hapus');
    }
}

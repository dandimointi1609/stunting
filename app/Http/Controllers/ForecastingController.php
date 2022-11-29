<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Prediksi;
use App\models\Forecasting;
use App\models\RamalanModel;
// use DB;
use Illuminate\Support\Facades\DB;




class ForecastingController extends Controller
{

        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->RamalanModel= new RamalanModel();
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $forecasting = Forecasting::all();


        $querytampil = $this->RamalanModel->allPrediksi();
        $n_alpha = $this->RamalanModel->allAlpha();
        $querysum = $this->RamalanModel->allSum();
        $querydaktual = $this->RamalanModel->allAktual();
        $querybulan = $this->RamalanModel->allBulan();



		//untuk menentukan nilai peramalan pertama
        $resultquery = ($querysum);
        $hasilsum = ($resultquery);   

        $resultquery = ($querytampil);
        $d_perkiraan = "";
        $count = ($resultquery)->count();
        $loop = 0;
        $sum_abs_err = 0;
        $sum_abs_err2 = 0;
        $sum_abs_err_percent = 0;
        


        
        return view('forecasting')->with(['querytampil' => $querytampil,
                                          'n_alpha' => $n_alpha,
                                          'querysum' => $querysum,
                                          'resultquery' => $resultquery,
                                          'd_perkiraan' =>$d_perkiraan,
                                          'hasilsum' => $hasilsum,
                                          'count' => $count,
                                          'sum_abs_err' => $sum_abs_err,
                                          'sum_abs_err2' => $sum_abs_err2,
                                          'sum_abs_err_percent' => $sum_abs_err_percent,
                                          'loop' => $loop,
                                          'querydaktual' =>$querydaktual,
                                          'querybulan' =>$querybulan,
                                          'forecasting' => $forecasting
 
                                        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit($id_alpha)
    {
          // return view('editkecamatan');
          $forecasting = Forecasting::find($id_alpha);
        //   $kecamatan = Kecamatan::all();
          
          return view('ubahalpha', compact('forecasting'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_alpha)
    {
        $forecasting = Forecasting::find($id_alpha);
        
        $forecasting->nilai_alpha = $request->nilai_alpha;
        $forecasting->id_alpha = $request->id_alpha;



        

        $forecasting->update();

        return redirect('/forecasting')->with('success', 'Data Berhasil Di Ubah');
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

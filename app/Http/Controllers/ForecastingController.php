<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Prediksi;
use App\models\Forecasting;
use App\models\RamalanModel;
use DB;




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
        // $forecasting = Forecasting::all();
        // $prediksi = Prediksi::all();

        $querytampil = $this->RamalanModel->allPrediksi();
        $queryalpha = $this->RamalanModel->allAlpha();
        $querysum = $this->RamalanModel->allSum();

        
        return view('forecasting')->with(['querytampil' => $querytampil,
                                            'queryalpha' => $queryalpha,
                                            'querysum' => $querysum
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
    public function edit($id)
    {
        //
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
        //
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

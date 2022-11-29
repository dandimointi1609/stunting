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

  
        // $tes = Prediksi::where('d_aktual'); 
        // dd($tes);
        $prediksi = Prediksi::all();

            $users = DB::select("SELECT bln_thn, SUM(d_aktual) as peramalan,
            SUM(d_aktual) OVER (ORDER BY d_aktual, id_prediksi) as tes,
            LAG(d_aktual) OVER (PARTITION BY bln_thn ORDER BY id_prediksi) as LagVal1,
            (d_aktual) - SUM(d_aktual) / COUNT(d_aktual) as tampil_error,
            (d_aktual) - SUM(d_aktual) / COUNT(d_aktual) as abs,
            (d_aktual) - SUM(d_aktual) / COUNT(d_aktual)  as squared,
            ((d_aktual) - SUM(d_aktual) / COUNT(d_aktual)) / d_aktual * 100 as abserror
            FROM t_prediksi
            GROUP BY id_prediksi,bln_thn,d_aktual");
            // dd($users);

            $tes = DB::select('
            WITH t_prediksi
            AS
            (SELECT id_prediksi,bln_thn,d_aktual,
            d_aktual + LEAD(d_aktual) over (ORDER BY id_prediksi) as perkiraan
            FROM t_prediksi)

            SELECT id_prediksi, bln_thn,d_aktual,
            d_aktual + LEAD(d_aktual) over (ORDER BY id_prediksi) AS total_aktual,
            perkiraan / 2  as data_perkiraan
            From t_prediksi;
            ');
            // dd($tes);

            




        //     $prediksi = DB::table('t_prediksi')     
        //     ->select(DB::raw('sum(d_aktual)  as peramalan'),
        //             DB::raw('sum(d_aktual) / COUNT(d_aktual) + 0.2 * ((d_aktual) - SUM(d_aktual) / COUNT(d_aktual)) as tes'),
        //             DB::raw('(d_aktual) - SUM(d_aktual) / COUNT(d_aktual) as tampil_error'),
        //             DB::raw('(d_aktual) - SUM(d_aktual) / COUNT(d_aktual) as abs'),
        //             DB::raw('(d_aktual) - SUM(d_aktual) / COUNT(d_aktual)  as squared'),
        //             DB::raw('((d_aktual) - SUM(d_aktual) / COUNT(d_aktual)) / d_aktual * 100 as abserror'),
        //             'bln_thn','d_aktual')
        //           ->groupBy('id_prediksi','bln_thn','d_aktual')
        //     // ->take(12)
        //    ->get();
            // dd($users);
                    



        $tampil = DB::select("SELECT id_prediksi, bln_thn, d_aktual
        FROM t_prediksi");

        // $tampil = $users;   

  
        $forecasting = Forecasting::all();
        $cast1 = Prediksi::find(1);
        $cast2 = Prediksi::find(2);
        $sum = Prediksi::sum('d_aktual');
        $count = Prediksi::count('d_aktual');

        $peramalan = $sum / $count;
        //RUMURS ERROR
        $pr2 =  $cast1->d_aktual - $peramalan;
        //SQUARED
        $pangkat1 = pow($pr2,2);
        //ABSOLUTE
        $abs = abs($pr2);
        //FORECAST
        $peramalan2 = ($pr2 * 0.2) + $peramalan;
        //ABS ERROR
        $abserror1 = $abs / $cast1->d_aktual * 100;
        
        //RUMUS ERROR
        $perkiraan = $cast2->d_aktual - $peramalan2;
        //SQUARED
        $pangkat2 = pow($perkiraan,2);
        //ABS
        $abs2 = abs($perkiraan);
        //FORECAST
        $perkiraan2 = ($perkiraan * 0.2) + $peramalan2;

        
        //TOTAL ABS
        $totalabs = $abs+$abs2;

        //TOTAL SQUARED
        $totalsquared = $pangkat1+$pangkat2;

        //ABS ERROR
        $abserror = $abs2 / $cast2->d_aktual * 100;

         //TOTAL ABSERROR
         $totalabserror = $abserror+$abserror1;

         //MAD
         $mad = $totalabs / $count ;

         //MSE
         $mse = $totalsquared / $count;

         //MAPPE
         $mappe = $totalabserror / $count;

        // dd($mappe);
        

        

        $querytampil = $this->RamalanModel->allPrediksi();
        $n_alpha = $this->RamalanModel->allAlpha();
        $querysum = $this->RamalanModel->allSum();
        // dd($querysum);
        $sum = Prediksi::sum('d_aktual');
        $row= Prediksi::all('id_prediksi','d_aktual')->first();
        $alpha = Forecasting::all('id_alpha','nilai_alpha')->first();



        

        $resultquery = ($sum);
		$hasilsum = ($resultquery);
        // dd($hasilsum);
		$resultquery = ($querytampil);
		$d_perkiraan = "";
		$h_perkiraan = "";
        $count = count($resultquery);
        $loop = 0;
        $sum_abs_err = 0;
        $sum_abs_err2 = 0;
        $sum_abs_err_percent = 0;


        $loop = $loop+1;
        if($loop == $count) {
            echo "</table></div>";
		    $d_aktual_next = $cast2;
            dd($d_aktual_next);
        }
        

        
        return view('forecasting')->with(['querytampil' => $querytampil,'n_alpha' => $n_alpha,'querysum' => $querysum,'mappe' => $mappe,
                                            'mse' => $mse,'mad' => $mad,'totalabserror' => $totalabserror,'abserror' =>$abserror,'totalsquared' =>$totalsquared,
                                            'perkiraan2' => $perkiraan2,
                                            'abs2' =>$abs2,
                                            'pangkat2' =>$pangkat2,
                                            'pangkat1' =>$pangkat1,
                                            'perkiraan' =>$perkiraan,
                                            'abserror1' =>$abserror1,
                                            'peramalan2' =>$peramalan2,
                                            'abs' =>$abs,
                                            'pr2' =>$pr2,
                                            'peramalan' =>$peramalan,
                                            'count' =>$count,
                                            'sum' =>$sum,
                                            'cast1' =>$cast1,
                                            'cast2' =>$cast2,
                                            // 'users' =>$users,
                                            'forecasting' =>$forecasting,
                                            'tampil' => $tampil,
                                            'prediksi' =>$prediksi,
                                            'h_perkiraan' => $h_perkiraan,
                                            'row' => $row,                                   
                                            'sum' => $sum,
                                            'row' => $row,
                                            'alpha' => $alpha,
                                            'resultquery' => $resultquery,
                                            'hasilsum' =>$hasilsum,
                                            'd_perkiraan' => $d_perkiraan,
                                            'h_perkiraan' => $h_perkiraan,
                                            'count' => $count,
                                            'loop' => $loop,
                                            'sum_abs_err' => $sum_abs_err,
                                            'sum_abs_err2' => $sum_abs_err2,
                                            'sum_abs_err_percent' => $sum_abs_err_percent,
                                            'users' => $users


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

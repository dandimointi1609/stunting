<?php

namespace App\models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet\Calculation\MathTrig\Sum;

class RamalanModel extends Model      
{
   public function allPrediksi(){
      $querytampil = DB::table('t_prediksi')
          ->select('id_prediksi','bln_thn','d_aktual')
          ->get();
          return $querytampil;
   }

   public function allAlpha(){
     $queryalpha = DB::table('t_alpha')     
        ->select('id_alpha','nilai_alpha')
        ->where('id_alpha', 'A1')
         ->get();
         return $queryalpha;
    }

    public function allSum(){
      $querysum = DB::table('t_prediksi')     
         ->select(DB::raw('sum(d_aktual) as total')
                  )
          ->get();
          return $querysum;
     }

   
}


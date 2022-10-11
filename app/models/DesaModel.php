<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DesaModel extends Model
{
    public function allData(){
        $result = DB::table('t_desa')
             ->select('kd_desa','nama_desa','kd_kecamatan','latitude','longitude')
             ->get();
             return $result;

      }
   
      public function allDesa(){
        $result = DB::table('t_desa')     
           ->select('kd_desa','nama_desa','kd_kecamatan','latitude','longitude')
            ->get();
            return $result;
       }
      
   
      public function getlokasi($kd_desa=''){
         $result = DB::table('t_desa')
        ->select('kd_desa','nama_desa','kd_kecamatan','latitude','longitude')
           ->where('kd_desa',$kd_desa)
           ->get();
           return $result;
      } 
}

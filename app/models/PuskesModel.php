<?php

namespace App\models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\models\Kecamatan;
use App\models\Desa;
use App\models\Puskes;
use App\models\Balita;


class PuskesModel extends Model      
{
   public function allData(){
     $result = DB::table('t_puskes')
          ->select('id_puskes','nama_puskes','alamat','kd_kecamatan','status','latitude','longitude')
          ->get();
          return $result;
   }

   public function allPuskes(){
     $result = DB::table('t_puskes')     
        ->select('id_puskes','nama_puskes','alamat','kd_kecamatan','status','latitude','longitude')
         ->get();
         return $result;
    }
   

   public function getlokasi($id_puskes=''){
      $result = DB::table('t_puskes')
     //    ->select('kd_kecamatan','nama_kecamatan','latitude','longitude')
     ->select('id_puskes','nama_puskes','alamat','kd_kecamatan','status','latitude','longitude')
        ->where('id_puskes',$id_puskes)
        ->get();
        return $result;
   } 
}


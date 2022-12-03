<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class LaporanModel extends Model
{
    public function allData(){
        $result = DB::table('t_puskes')
             ->select('id_puskes','nama_puskes','alamat','kd_kecamatan','status','latitude','longitude')
             ->get();
             return $result;
      }

      public function allLaporan(){
        $data= DB::table('t_balita AS b')     
        ->select(DB::raw('sum(b.hasil) as total'),
                 DB::raw('sum(b.hasil = "pendek") as total_pendek'),
                 DB::raw('sum(b.hasil = "sangatpendek") as sangat_pendek'),
                 DB::raw('sum(b.hasil = "sangatpendek") + sum(b.hasil = "pendek")  as pendek_sangat_pendek'),
                 DB::raw('((sum(b.hasil = "sangatpendek") + sum(b.hasil = "pendek")) / COUNT(b.hasil)) * 100  as pravelensi'),   
                           'd.nama_desa',
                           'k.nama_kecamatan',
                           'b.tgl_pengukuran',
                           'b.id_periode',
                           'p.nama_puskes',
                           'dp.nama_periode'
                          )
                          ->groupBy('b.kode_desa')
                          ->join('t_periode as dp', 'b.id_periode', '=', 'dp.id_periode')
                          ->rightjoin('t_puskes as p', 'b.id_puskes', '=', 'p.id_puskes')
                          ->rightjoin('t_desa as d', 'b.kode_desa', '=', 'd.kd_desa')
                          ->rightjoin('t_kecamatan as k', 'd.kd_kecamatan', '=', 'k.kd_kecamatan')
                          ->orderBy('b.kode_desa', 'desc')
        ->get();
        return $data;
      }
}

<?php

namespace App\models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\models\Kecamatan;
use App\models\Desa;
use App\models\Puskes;
use App\models\Balita;


class TitikModel extends Model      
{
   public function allData(){
    $result = DB::table('t_kecamatan')   
    ->select(
             'kd_kecamatan', 
             'nama_kecamatan',
             'longitude',
             'latitude'
             )
        ->get();
        return $result;
   }

   public function allLokasi(){  
     $result = DB::table('t_kecamatan as k')     
    ->select(DB::raw('count(hasil) as total'),
           DB::raw('sum(b.hasil = "pendek") as total_pendek, k.kd_kecamatan'),
           DB::raw('sum(b.hasil = "sangatpendek") as sangat_pendek, k.kd_kecamatan'),
            'k.kd_kecamatan', 
            'k.nama_kecamatan',
            'd.nama_desa'
            )
            ->rightjoin('t_puskes as p', 'k.kd_kecamatan', '=', 'p.kd_kecamatan')
            ->join('t_balita as b', 'p.id_puskes', '=', 'b.id_puskes')
            ->join('t_periode as dp', 'b.id_periode', '=', 'dp.id_periode')
            ->rightjoin('t_desa as d', 'b.kode_desa', '=', 'd.kd_desa')
            ->groupBy('k.kd_kecamatan','k.nama_kecamatan','d.nama_desa')
            ->where('dp.status','1')

       ->get();
         return $result;
    }

    public function allPencarian(){  
     $result = DB::table('t_kecamatan as k')     
    ->select(DB::raw('count(hasil) as total'),
           DB::raw('sum(b.hasil = "pendek") as total_pendek, k.kd_kecamatan'),
           DB::raw('sum(b.hasil = "sangatpendek") as sangat_pendek, k.kd_kecamatan'),
            'k.kd_kecamatan', 
            'k.nama_kecamatan'
            )
            ->rightjoin('t_puskes as p', 'k.kd_kecamatan', '=', 'p.kd_kecamatan')
            ->join('t_balita as b', 'p.id_puskes', '=', 'b.id_puskes')
            ->rightjoin('t_desa as d', 'b.kode_desa', '=', 'd.kd_desa')
            ->groupBy('k.kd_kecamatan','k.nama_kecamatan')
       ->get();
         return $result;
    }
   
   public function getlokasi($kd_kecamatan=''){
    $result = DB::table('t_kecamatan as k')     
    ->select(DB::raw('count(hasil) as total'),
           DB::raw('sum(b.hasil = "pendek") as total_pendek, k.kd_kecamatan'),
           DB::raw('sum(b.hasil = "sangatpendek") as sangat_pendek, k.kd_kecamatan'),
            'k.kd_kecamatan', 
            'k.nama_kecamatan',
            'k.longitude',
            'k.latitude'
            )
            ->where('k.kd_kecamatan',$kd_kecamatan)
            ->rightjoin('t_puskes as p', 'k.kd_kecamatan', '=', 'p.kd_kecamatan')
            ->join('t_balita as b', 'p.id_puskes', '=', 'b.id_puskes')
            ->join('t_periode as dp', 'b.id_periode', '=', 'dp.id_periode')
            ->rightjoin('t_desa as d', 'b.kode_desa', '=', 'd.kd_desa')
            ->groupBy('k.kd_kecamatan','k.nama_kecamatan','k.longitude','k.latitude')
            ->where('dp.status','1')

       ->get();
        return $result;
     }


     public function getGrafik($kd_kecamatan=''){
     //  $result = DB::table('t_desa as d')     
     //  ->select(DB::raw('count(hasil) as jumlah'),
     //         DB::raw('sum(b.hasil = "pendek") as total_pendek, k.kd_kecamatan'),
     //         DB::raw('sum(b.hasil = "sangatpendek") as sangat_pendek, k.kd_kecamatan'),
     //          'kd_desa',
     //          'nama_desa'
     //          )
     //          ->where('k.kd_kecamatan',$kd_kecamatan)
     //          ->join('t_balita as b', 'd.kd_desa', '=', 'b.kode_desa')
     //          ->join('t_kecamatan as k', 'd.kd_kecamatan', '=', 'k.kd_kecamatan')
     //          ->groupBy('kd_desa','kd_kecamatan','nama_desa')
     //     ->get();
     $result = DB::select("select count(hasil) as jumlah, sum(b.hasil = 'pendek') as total_pendek, k.kd_kecamatan, sum(b.hasil = 'sangatpendek') as sangat_pendek, k.kd_kecamatan, `kd_desa`, `nama_desa` from `t_desa` as `d` inner join `t_balita` as `b` on `d`.`kd_desa` = `b`.`kode_desa` inner join `t_kecamatan` as `k` on `d`.`kd_kecamatan` = `k`.`kd_kecamatan` where `k`.`kd_kecamatan` = '$kd_kecamatan' group by `kd_desa`, `kd_kecamatan`, `nama_desa`");
          return $result;
       }
 
}


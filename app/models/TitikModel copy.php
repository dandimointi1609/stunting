<?php

namespace App\models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
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
           DB::raw('((sum(b.hasil = "sangatpendek") + sum(b.hasil = "pendek")) / COUNT(b.hasil)) * 100  as pravelensi'),
            'k.kd_kecamatan', 
            'k.nama_kecamatan',
            'd.nama_desa'
            )
            ->rightjoin('t_puskes as p', 'k.kd_kecamatan', '=', 'p.kd_kecamatan')
            ->join('t_balita as b', 'p.id_puskes', '=', 'b.id_puskes')
          //   ->join('t_periode as dp', 'b.id_periode', '=', 'dp.id_periode')
            ->rightjoin('t_desa as d', 'b.kode_desa', '=', 'd.kd_desa')
            ->groupBy('k.kd_kecamatan','k.nama_kecamatan','d.nama_desa')
          //   ->where('dp.status','1')
          //   ->whereMonth('b.tgl_pengukuran') = MONTH(now())
               // ->whereMonth('b.tgl_pengukuran', '=', '02')
            ->whereYear('b.tgl_pengukuran', Carbon::now()->year)


       ->get();
       
     //   $result = DB::select("SELECT t_desa.nama_desa, t_kecamatan.nama_kecamatan, t_balita.tgl_pengukuran, t_puskes.nama_puskes,
     //    t_puskes.id_puskes,
     //    COUNT(t_balita.hasil) as total,
     //    sum(t_balita.hasil = 'pendek') as pendek,
     //    sum(t_balita.hasil = 'sangatpendek') as sangat_pendek,
     //    sum(t_balita.hasil = 'normal') as normal,
     //    sum(t_balita.hasil = 'sangatpendek') + sum(t_balita.hasil = 'pendek')  as pendek_sangat_pendek,
     //    ((sum(t_balita.hasil = 'sangatpendek') + sum(t_balita.hasil = 'pendek')) / COUNT(t_balita.hasil)) * 100  as pravelensi
        
     //    FROM t_balita
     //    RIGHT JOIN t_desa 
     //    ON t_balita.kode_desa = t_desa.kd_desa
     //    RIGHT JOIN t_puskes
     //    ON t_balita.id_puskes = t_puskes.id_puskes
     //    RIGHT JOIN t_kecamatan
     //    ON t_desa.kd_kecamatan = t_kecamatan.kd_kecamatan
     //    WHERE MONTH(t_balita.tgl_pengukuran) = MONTH(now())
     //    GROUP BY t_balita.kode_desa")

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
          //   ->join('t_periode as dp', 'b.id_periode', '=', 'dp.id_periode')
            ->rightjoin('t_desa as d', 'b.kode_desa', '=', 'd.kd_desa')
            ->groupBy('k.kd_kecamatan','k.nama_kecamatan','k.longitude','k.latitude')
          //   ->where('dp.status','1')
            ->whereYear('b.tgl_pengukuran', Carbon::now()->year)


       ->get();
        return $result;
     }


     public function getGrafik($kd_kecamatan=''){
      $result = DB::table('t_desa as d')     
      ->select(DB::raw('count(hasil) as jumlah'),
             DB::raw('sum(b.hasil = "pendek") as total_pendek, k.kd_kecamatan'),
             DB::raw('sum(b.hasil = "sangatpendek") as sangat_pendek, k.kd_kecamatan'),
              'kd_desa',
              'nama_desa'
              )
              ->where('k.kd_kecamatan',$kd_kecamatan)
               ->whereYear('b.tgl_pengukuran', Carbon::now()->year)
              ->join('t_balita as b', 'd.kd_desa', '=', 'b.kode_desa')
              ->join('t_kecamatan as k', 'd.kd_kecamatan', '=', 'k.kd_kecamatan')
              ->groupBy('kd_desa','kd_kecamatan','nama_desa')
         ->get();
     
     // $result = DB::select("select count(hasil) as jumlah, sum(b.hasil = 'pendek') as total_pendek, k.kd_kecamatan, sum(b.hasil = 'sangatpendek') as sangat_pendek, k.kd_kecamatan, `kd_desa`, `nama_desa` from `t_desa` as `d` inner join `t_balita` as `b` on `d`.`kd_desa` = `b`.`kode_desa` inner join `t_kecamatan` as `k` on `d`.`kd_kecamatan` = `k`.`kd_kecamatan` where `k`.`kd_kecamatan` = '$kd_kecamatan' group by `kd_desa`, `kd_kecamatan`, `nama_desa`");
          return $result;
       }

       public function getPravelensi(){  
  
        $result = DB::select('SELECT t_kecamatan.nama_kecamatan, t_puskes.nama_puskes, t_puskes.alamat, t_pravelensi.id_puskes,t_pravelensi.id_pravelensi, t_pravelensi.total_balita, t_pravelensi.pendek, t_pravelensi.sangat_pendek, t_pravelensi.total_pendek_sangat, t_desa.nama_desa,t_pravelensi.tgl_input
        CAST((total_pendek_sangat / total_balita ) * 100 as FLOAT)  as pravelensi
        FROM t_pravelensi
        RIGHT JOIN t_puskes
        ON t_pravelensi.id_puskes = t_puskes.id_puskes
        RIGHT JOIN t_desa
        ON t_pravelensi.kd_desa = t_desa.kd_desa
        RIGHT JOIN t_kecamatan
        ON t_puskes.kd_kecamatan = t_kecamatan.kd_kecamatan');
        return $result;
    
    }
 
}


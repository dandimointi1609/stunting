<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\models\Kecamatan;
use App\models\Desa;
use App\models\Puskes;
use App\models\Balita;

class GrafikModel extends Model
{

public function allLokasi(){  
  
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


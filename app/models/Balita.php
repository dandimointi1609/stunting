<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Balita extends Model
{
    protected $table = 't_balita';
    protected $primaryKey = 'id_balita';
    protected $fillable = ['nama_balita','id_jenis_kelamin','tgl_lahir','bb_lahir','tb_lahir','nama_ortu','kode_desa','id_puskes','alamat','tgl_pengukuran','tb','bb','lila','tambah_kecamatan','hasil','id_periode'];
    public $timestamps = false;

    public function jenis_kelamin()
        {
            return $this->belongsTo('\App\Jenis_Kelamin', 'id_jenis_kelamin');
        }

    public function periode()
        {
            return $this->belongsTo('\App\models', 'id_periode');
        }

    public function puskes()
        {
            return $this->belongsTo('\App\models\Puskes', 'id_puskes');
        }

    public function desa()
        {
            return $this->belongsTo('\App\models\Desa', 'kode_desa');
        }

    public function penderita()
        {
            return $this->belongsTo('\App\models\Penderita', 'id_puskes');
        }

        
    public function user()
    {
        return $this->belongsTo('\App\user', 'user_id');
    }

}
    
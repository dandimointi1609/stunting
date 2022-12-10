<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Desa extends Model
{
    protected $table = 't_desa';
    protected $primaryKey = 'kd_desa';
protected $fillable = ['kd_desa','nama_desa','kd_kecamatan','latitude','longitude'];
    public $timestamps = false;

    public function kecamatan()
        {
            return $this->belongsTo('\App\models\Kecamatan', 'kd_kecamatan');
        }

        public function puskes()
        {
            return $this->hashOne('\App\Puskes');
        }

        public function balita()
        {
            return $this->hasOne('App\models\Balita', 'kd_desa');
        }

        public function pravelensi()
        {
            return $this->hasOne('App\models\Pravelensi', 'kd_desa');
        }

}



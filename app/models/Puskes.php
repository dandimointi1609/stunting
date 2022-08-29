<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Puskes extends Model
{
    protected $table = 't_puskes';
    protected $primaryKey = 'id_puskes';
    protected $fillable = ['nama_puskes','alamat','kd_kecamatan','id_puskes','status','latitude','longitude'];
    public $timestamps = false;

    public function kecamatan()
        {
            return $this->belongsTo('\App\models\Kecamatan', 'kd_kecamatan');
        }

        public function desa()
        {
            return $this->belongsTo('\App\models\Desa', 'kd_desa');
        }

        public function balita()
        {
            return $this->hasMany('App\models\Balita','id_puskes');
        }

        public function penderita()
        {
            return $this->hasOne('App\models\Balita','id_puskes');
        }
}

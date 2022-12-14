<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Puskes extends Model
{
    protected $table = 't_puskes';
    protected $primaryKey = 'id_puskes';
    protected $fillable = ['nama_puskes','alamat','kd_kecamatan','latitude','longitude'];
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
            return $this->hasOne('App\models\Balita', 'id_puskes');
        }

        public function pravelensi()
        {
            return $this->hasOne('App\models\Pravelensi', 'id_puskes');
        }

        public function penderita()
        {
            return $this->hasOne('App\models\Balita','id_puskes');
        }

        public function user()
        {
            return $this->hasOne('App\user','id_puskesmas');
        }

        // public function user()
        // {
        //    return $this->belongsTo('App\User', 'user_id');
        // }
}

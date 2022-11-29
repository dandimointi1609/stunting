<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model   
{
    protected $table = 't_kecamatan';
    protected $primaryKey = 'kd_kecamatan';
    protected $fillable = ['kd_kecamatan','no_kecamatan','nama_kecamatan','longitude','latitude','geojson'];
    public $timestamps = false;

    public function desa()
    {
        return $this->hasOne('App\models\Desa');
    }

    public function puskes()
    {
        return $this->hasOne('App\models\Puskes');
    }
}

<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Periode extends Model
{
    protected $table = 't_periode';
    protected $primaryKey = 'id_periode';
    protected $fillable = ['nama_periode','tgl_awal','tgl_akhir','jenis_periode','status'];
    public $timestamps = false;

    public function balita()
    {
        return $this->hasOne('App\models\Balita');
    }

}



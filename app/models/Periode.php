<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Periode extends Model
{
    protected $table = 't_periode';
    protected $primaryKey = 'kd_periode';
protected $fillable = ['nama_periode','tgl_awal','tgl_akhir','jenis_periode'];
    public $timestamps = false;


}



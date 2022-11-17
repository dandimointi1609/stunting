<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Prediksi extends Model
{
    protected $table = 't_prediksi';
    protected $primaryKey = 'id_prediksi';
    protected $fillable = ['bln_thn','d_aktual'];
    public $timestamps = false;
}

<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Forecasting extends Model
{
    protected $table = 't_alpha';
    protected $primaryKey = 'id_alpha';
    protected $fillable = ['nilai_alpha'];
    public $timestamps = false;
}

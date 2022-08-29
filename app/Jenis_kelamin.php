<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jenis_Kelamin extends Model
{
    protected $table = 't_jenkel';
    protected $primaryKey = 'id_jk';
    public $timestamps = false;

    public function balita()
    {
        return $this->hasOne('App\Balita');
    }
}

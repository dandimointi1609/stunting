<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Pravelensi extends Model
{
    protected $table = 't_pravelensi';
    protected $primaryKey = 'id_pravelensi';
    protected $fillable = ['id_puskes','total_balita','pendek','sangat_pendek','total_pendek_sangat','tgl_input','kd_desa'];
    public $timestamps = false;

    public function puskes()
        {
            return $this->belongsTo('\App\models\Puskes', 'id_puskes');
        }
    
        public function desa()
        {
            return $this->belongsTo('\App\models\Desa', 'kd_desa');
        }
}

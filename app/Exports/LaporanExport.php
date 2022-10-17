<?php

namespace App\Exports;

use App\models\Kecamatan;
use App\models\Desa;
use App\models\Puskes;
use App\models\Balita;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Withheadings;
use Illuminate\Support\Facades\DB;



class LaporanExport implements FromCollection, Withheadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function headings (): array
    {
        return [

            'No',
            'Nama Balita',
            'Jenis Kelamin',
            'Kecamatan',
            'Desa',
            'Puseksmas'
        ];        
    }


    public function collection()
    {
        $puskes = DB::table('t_balita AS b')     
        ->select(          'b.nama_balita',
                           'b.tgl_pengukuran',
                           'k.nama_kecamatan',
                           'd.nama_desa',
                           'j.jenis_kelamin',
                           'p.nama_puskes'
                          )
                        //   ->groupBy('k.nama_kecamatan','d.nama_desa','b.tgl_pengukuran','p.nama_puskes','kode_desa','b.nama_balita')
                        ->groupBy('k.nama_kecamatan','d.nama_desa','b.tgl_pengukuran','p.nama_puskes','kode_desa','b.nama_balita','j.jenis_kelamin')
                        ->rightjoin('t_jenkel as j', 'b.id_jenis_kelamin', '=', 'j.id_jk')
                          ->rightjoin('t_puskes as p', 'b.id_puskes', '=', 'p.id_puskes')
                          ->rightjoin('t_desa as d', 'b.kode_desa', '=', 'd.kd_desa')
                          ->rightjoin('t_kecamatan as k', 'd.kd_kecamatan', '=', 'k.kd_kecamatan')
                          ->orderBy('p.nama_puskes', 'desc')
                   ->get();
        $xport[] = [

            'No',
            'Nama Balita',
            'Jenis Kelamin',
            'Kecamatan',
            'Desa',
            'Puseksmas'
        ];

        $no = 1;
        foreach ($puskes as $key){
            $export[] = [

                'No' => $no,
                'Nama Balira' => $key->nama_balita,
                'Jenis Kelamin'=> $key->jenis_kelamin,
                'kecamatan' => $key->nama_kecamatan,
                'Desa' => $key->nama_desa,
                'Puskesmas'=> $key->nama_puskes,
            ];
            $no++;
        }
        return collect($export);
    }

}
<?php

namespace App\Exports;

use App\models\Kecamatan;
use App\models\Desa;
use App\models\Puskes;
use App\models\Balita;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Withheadings;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;




class PenderitaExport implements FromCollection, Withheadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function headings (): array
    {
        return [
            'No',
            'Kecamatan',
            'Puskesmas',
            'Desa/Kelurahan',
            'Sangat Pendek',
            'Pendek',
            'Total Balita sangat pendek + pendek',
            'Pravelensi'
        ];        
    }


    public function collection()
    {
        $tglawal = request()->input('tglawal') ;
        $tglakhir   = request()->input('tglakhir') ;
        $puskes = DB::table('t_balita AS b')     
         ->select(DB::raw('count(b.hasil) as total'),
                  DB::raw('sum(b.hasil = "pendek") as total_pendek'),
                  DB::raw('sum(b.hasil = "sangatpendek") as sangat_pendek'),
                            'd.nama_desa',
                            'k.nama_kecamatan',
                            'p.nama_puskes'
                           )
                           ->groupBy('k.nama_kecamatan','d.nama_desa','p.nama_puskes','kode_desa')
                           ->rightjoin('t_puskes as p', 'b.id_puskes', '=', 'p.id_puskes')
                           ->rightjoin('t_desa as d', 'b.kode_desa', '=', 'd.kd_desa')
                           ->rightjoin('t_kecamatan as k', 'd.kd_kecamatan', '=', 'k.kd_kecamatan')    
                           ->whereBetween('tgl_pengukuran',[$tglawal,$tglakhir])
                           ->orderBy('p.nama_puskes', 'desc')
                    ->get();
        $xport[] = [

            'No',
            'Kecamatan',
            'Puskesmas',
            'Desa/Kelurahan',
            'Sangat Pendek',
            'Pendek',
            'Total Balita sangat pendek + pendek',
            'Pravelensi',
        ];

        $no = 1;
        foreach ($puskes as $key){
            $export[] = [

                'No' => $no,
                'Kecamatan' => $key->nama_kecamatan,
                'Puskesmas'=> $key->nama_puskes,
                'Desa/Kelurahan' => $key->nama_desa,
                'Sangat Pendek' => $key->total_pendek,
                'Pendek'=> $key->sangat_pendek,
                'Total Balita sangat pendek + pendek' => $key->total,
                'Pravelensi' => $key->total,
            ];
            $no++;
        }
        return collect($export);
    }

}
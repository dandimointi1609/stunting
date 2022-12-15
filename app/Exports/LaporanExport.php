<?php

namespace App\Exports;

use App\models\Kecamatan;
use App\models\Desa;
use App\models\Puskes;
use App\models\Balita;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Withheadings;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

// class LaporanExport implements FromCollection, Withheadings
class LaporanExport implements FromCollection, Withheadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function headings (): array
    {
        return [

            'No',
            'Nama',
            'Jk',
            'Tgl Lahir',
            'Bb Lahir',
            'Tb Lahir',
            'Nama Ortu',
            'Kec',
            'Puskesmas',
            'Desa/Kel',
            'Alamat',
            'Tgl Pengukuran',
            'Berat',
            'Tinggi',
            'TB/U',
            'Periode'
        ];        
    }




    public function collection()
    {
        $puskes = DB::table('t_balita AS b')     
        ->select('b.nama_balita','j.jenis_kelamin','b.tgl_lahir',
                        'b.bb_lahir','b.tb_lahir','b.nama_ortu',
                        'k.nama_kecamatan','p.nama_puskes',
                        'd.nama_desa', 'b.alamat','b.tgl_pengukuran',
                        'b.bb','b.tb','b.hasil','b.tgl_pengukuran'
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
            'Nama',
            'Jk',
            'Tgl Lahir',
            'Bb Lahir',
            'Tb Lahir',
            'Nama Ortu',
            'Kec',
            'Puskesmas',
            'Desa/Kel',
            'Alamat',
            'Tgl Pengukuran',
            'Berat',
            'Tinggi',
            'TB/U'
            // 'Periode'
        ];

        $no = 1;
        foreach ($puskes as $key){
            $export[] = [

                'No' => $no,
                'Nama Balira' => $key->nama_balita,
                'Jenis Kelamin'=> $key->jenis_kelamin,
                'Tgl Lahir'=> $key->tgl_lahir,
                'Bb Lahir'=> $key->bb_lahir,
                'Tb Lahir'=> $key->tb_lahir,
                'Nama Ortu'=> $key->nama_ortu,
                'kecamatan' => $key->nama_kecamatan,
                'Puskesmas'=> $key->nama_puskes,
                'Desa' => $key->nama_desa,
                'Alamat'=> $key->alamat,
                'Tgl Pengukuran'=> $key->tgl_pengukuran,
                'Berat'=> $key->bb,
                'Tinggi'=> $key->tb,
                'TB/U'=> $key->hasil,
            ];
            $no++;
        }
        return collect($export);
    }

}
<?php

namespace App\Exports;
use App\Models\Pravelensi;
// use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
// use DB;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;

class PenderitaExport implements FromView
{
     /**
     * @return \Illuminate\Support\Collection
     */
        
     protected $tglawal;
     protected $tglakhir;

    public function __construct()
    {
        // $tglawal = $keyword;
        // $tglakhir   = $keyword;
        // $this->tgl_input = $keyword;
        // $this->tgl_input = $keyword;
        // $this->nama_kecamatan = $keyword;
        // $this->tgl_pengukuran = $keyword;
        // $this->tgl_pengukuran = $keyword;
    }

    public function view(): View
    {
        return view('excel.penderita-excel', [

            'data' =>  DB::table('t_balita AS b')     
            ->select('b.nama_balita','j.jenis_kelamin','b.tgl_lahir',
                        'b.bb_lahir','b.tb_lahir','b.nama_ortu',
                        'k.nama_kecamatan','p.nama_puskes',
                        'd.nama_desa', 'b.alamat','b.tgl_pengukuran',
                        'b.bb','b.tb','b.hasil','b.tgl_pengukuran',
                        'p.id_puskes'
                    )
                    // ->groupBy('k.nama_kecamatan','d.nama_desa','b.tgl_pengukuran','p.nama_puskes','kode_desa','b.nama_balita','j.jenis_kelamin')
                    ->rightjoin('t_jenkel as j', 'b.id_jenis_kelamin', '=', 'j.id_jk')
                      ->rightjoin('t_puskes as p', 'b.id_puskes', '=', 'p.id_puskes')
                      ->rightjoin('t_desa as d', 'b.kode_desa', '=', 'd.kd_desa')
                      ->rightjoin('t_kecamatan as k', 'd.kd_kecamatan', '=', 'k.kd_kecamatan')
                      ->orderBy('p.nama_puskes', 'desc')
            // ->where('k.nama_kecamatan', $this->nama_kecamatan)
            // ->whereBetween('tgl_pengukuran', [$this->tgl_pengukuran,$this->tgl_pengukuran])


            ->get()

        ]);
    }

    // /**
    // * @return \Illuminate\Support\Collection
    // */
    // public function collection()
    // {
    //     //
    // }
}

<?php

namespace App\Exports;

use App\Models\Pravelensi;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Support\Facades\DB;

// use DB;
// use Maatwebsite\Excel\Concerns\FromCollection;

class LaporanpravelensiExportall implements FromView
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function __construct()
    {
        // $tglawal = $keyword;
        // $tglakhir   = $keyword;
        // // $this->tgl_input = $keyword;
        // $this->tgl_input = $keyword;
        // $this->tgl_input = $keyword;
    }
    public function view(): View
    {
        return view('excel.laporan-pravelensi-excel', [
            'data' => DB::select('SELECT t_kecamatan.nama_kecamatan, t_puskes.nama_puskes, t_puskes.alamat, t_pravelensi.id_puskes,t_pravelensi.id_pravelensi, t_pravelensi.total_balita, t_pravelensi.pendek, t_pravelensi.sangat_pendek, t_pravelensi.total_pendek_sangat, t_desa.nama_desa,
            t_pravelensi.tgl_input,
            CAST((total_pendek_sangat / total_balita ) * 100 as FLOAT)  as pravelensi
            FROM t_pravelensi
            RIGHT JOIN t_puskes
            ON t_pravelensi.id_puskes = t_puskes.id_puskes
            RIGHT JOIN t_desa
            ON t_pravelensi.kd_desa = t_desa.kd_desa
            RIGHT JOIN t_kecamatan
            ON t_puskes.kd_kecamatan = t_kecamatan.kd_kecamatan
            WHERE id_pravelensi')
        ]);
    }
}

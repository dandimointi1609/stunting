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

class GpravelensiExport implements FromView
{
         /**
     * @return \Illuminate\Support\Collection
     */
    public function __construct(string $keyword)
    {
        $tglawal = $keyword;
        $tglakhir   = $keyword;
        // $this->tgl_input = $keyword;
        // $this->tgl_input = $keyword;
        $this->nama_kecamatan = $keyword;
    }

    public function view(): View
    {
        return view('excel.gpravelensi-excel', [
            'data' => DB::table('t_pravelensi as g')     
            ->select(DB::raw('(g.total_pendek_sangat / g.total_balita) * 100  as pravelensi'),
             'p.nama_puskes',
             'k.kd_kecamatan', 
             'k.nama_kecamatan',
             'g.tgl_input',
             'g.total_balita',
             'g.pendek',
             'g.sangat_pendek',
             'g.total_pendek_sangat',
             'd.nama_desa',
             'd.nama_desa'
             )
             ->rightjoin('t_puskes as p', 'g.id_puskes', '=', 'p.id_puskes')
             ->rightjoin('t_desa as d', 'g.kd_desa', '=', 'd.kd_desa')
             ->rightjoin('t_kecamatan as k', 'p.kd_kecamatan', '=', 'k.kd_kecamatan')
             ->where('k.nama_kecamatan', $this->nama_kecamatan)
             ->groupBy('id_pravelensi')
             ->orderBy('k.nama_kecamatan')
            ->get()

        ]);
    }
}

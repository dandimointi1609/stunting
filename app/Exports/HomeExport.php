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

class HomeExport implements FromView
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
        return view('excel.homesebaran-excel', [
            // 'data' => Pravelensi::where('tgl_input', $this->tgl_input, $this->tgl_input)->get()
            // 'data' => Pravelensi::where('tgl_input', Between)->get()
            // 'data' => Pravelensi::whereBetween('tgl_input',[$this->tgl_input,$this->tgl_input])->get()
            // 'data' => DB::table('t_balita AS b')     
            //             ->select(DB::raw('count(b.hasil) as total'),
            //                     DB::raw('sum(b.hasil = "pendek") as total_pendek'),
            //                     DB::raw('sum(b.hasil = "sangatpendek") as sangat_pendek'),
            //                    'd.nama_desa',
            //                    'k.nama_kecamatan',
            //                    'p.nama_puskes'
            //                   )
            //                   ->groupBy('k.nama_kecamatan','d.nama_desa','p.nama_puskes','kode_desa')
            //                   ->rightjoin('t_puskes as p', 'b.id_puskes', '=', 'p.id_puskes')
            //                   ->rightjoin('t_desa as d', 'b.kode_desa', '=', 'd.kd_desa')
            //                   ->rightjoin('t_kecamatan as k', 'd.kd_kecamatan', '=', 'k.kd_kecamatan')    
            //                   ->where('k.nama_kecamatan', $this->nama_kecamatan)
            //                   ->orderBy('p.nama_puskes', 'desc')
            // ->get()

            'data' =>  DB::table('t_balita AS b')     
            ->select('b.nama_balita','j.jenis_kelamin','b.tgl_lahir',
                        'b.bb_lahir','b.tb_lahir','b.nama_ortu',
                        'k.nama_kecamatan','p.nama_puskes',
                        'd.nama_desa', 'b.alamat','b.tgl_pengukuran',
                        'b.bb','b.tb','b.hasil','b.tgl_pengukuran'
                    )
            ->rightjoin('t_puskes as p', 'b.id_puskes', '=', 'p.id_puskes')
            ->rightjoin('t_jenkel as j', 'b.id_jenis_kelamin', '=', 'j.id_jk')
            ->rightjoin('t_desa as d', 'b.kode_desa', '=', 'd.kd_desa')
            ->rightjoin('t_kecamatan as k', 'd.kd_kecamatan', '=', 'k.kd_kecamatan')
            ->where('k.nama_kecamatan', $this->nama_kecamatan)

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

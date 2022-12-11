<?php

namespace App\Exports;

use App\Models\Pravelensi;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
// use DB;
use Illuminate\Support\Facades\DB;


class HomeExport implements FromView
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function __construct(string $keyword,$keyword1)
    {

        $this->nama_kecamatan = $keyword;
        $this->tgl_pengukuran = $keyword;
        $this->tgl_pengukuran = $keyword1;
        // $keyword = $this->tgl_pengukuran;
        // $keyword1 = $this->tgl_pengukuran ;
    }
    public function view(): View
    {
        return view('excel.homesebaran-excel', [

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
                        ->whereBetween('b.tgl_pengukuran', [$this->tgl_pengukuran,$this->tgl_pengukuran])
                        ->where('k.nama_kecamatan', $this->nama_kecamatan)

                        ->get()

        ]);
    }
}

// class InputpravelensiExport implements FromQuery
// {
//     /**
//      * @return \Illuminate\Support\Collection
//      */
//     public function __construct(string $keyword)
//     {
//         $this->id_puskes = $keyword;
//     }
//     public function query()
//     {
//         return Pravelensi::query()->where('id_puskes', 'like', '%' . $this->id_puskes . '%');
//     }
// }

class InputpravelensiExport implements FromCollection
{
    
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // return Pravelensi::all();
        $tglawal = request()->input('tglawal') ;
        $tglakhir   = request()->input('tglakhir') ;
        
        return DB::table('t_balita AS b')     
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
                        ->whereBetween('b.tgl_pengukuran', [$tglawal,$tglakhir])
                        // ->where('k.nama_kecamatan', $this->nama_kecamatan)

                        ->get();

        // return Registration::with('user')
        //     ->whereBetween('event_date', [ $startDate, $endDate ] )
        //     ->get();
    }
}

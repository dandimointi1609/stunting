<?php

namespace App\Exports;

use App\Models\Pravelensi;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use DB;

class InputpravelensiExportall implements FromView
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
        return view('excel.pravelensi-excel', [
            'data' => Pravelensi::all()
            // 'data' => Pravelensi::where('tgl_input', Between)->get()
            // 'data' => Pravelensi::whereBetween('tgl_input',[$this->tgl_input,$this->tgl_input])->get()

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

// class InputpravelensiExport implements FromCollection
// {
    
//     /**
//     * @return \Illuminate\Support\Collection
//     */
//     public function collection()
//     {
//         return Pravelensi::all();
//     }
// }

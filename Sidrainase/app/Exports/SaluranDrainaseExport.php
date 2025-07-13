<?php

namespace App\Exports;

use App\Models\salurandrainase;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;


class SaluranDrainaseExport implements FromView
{
    public function view(): View
    {
        $data = array(
            'salurandrainase' => salurandrainase::get(),
            'tanggal' => now()->format('d-m-Y'),
        );
        return view('admin.salurandrainase.excel',$data);
    }
}
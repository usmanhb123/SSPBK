<?php

namespace App\Exports;

use App\Models\Users;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class HarianExport implements FromView
{
    
    public function view(): View
    {
        $data['time'] = date('Y-m-d');
        $data['data_dokter'] = Users::where('user_role_id', '!=', 4)->get();

        return view('exports.data_absen_harian', $data);
    }
}
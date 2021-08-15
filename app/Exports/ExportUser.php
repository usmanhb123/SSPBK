<?php

namespace App\Exports;

use App\Models\Data_work_section;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

use Maatwebsite\Excel\Concerns\Exportable;

class ExportUser implements FromView
{
    use Exportable;

    public function __construct(int $id)
    {
        $this->id = $id;
    }

    
    public function view(): View
    {
        $data['time'] = date('Y-m-d');
        $data['data_ws'] = Data_work_section::find($this->id);

        return view('exports.user_ws', $data);
    }
}
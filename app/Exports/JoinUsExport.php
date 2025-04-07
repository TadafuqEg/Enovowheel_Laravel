<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\Models\JoinUs;

class JoinUsExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function headings(): array
    {
        return [
            'Email',
           
            // Add more column headings here as needed
        ];
    }
    public function collection()
    {
        return JoinUs::select('email')->get();
    }
}

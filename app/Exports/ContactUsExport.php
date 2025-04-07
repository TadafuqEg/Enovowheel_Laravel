<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\Models\ContactUs;

class ContactUsExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function headings(): array
    {
        return [
            'Name',
            
            'Phone Number',
            'Governorate',
            'Delegation',
            'City'
            // Add more column headings here as needed
        ];
    }
    public function collection()
    {
        return ContactUs::select('name','phone','state','area','city')->get();
    }
}

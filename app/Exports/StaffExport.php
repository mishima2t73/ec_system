<?php

namespace App\Exports;

use App\Models\Admin;
use Maatwebsite\Excel\Concerns\FromCollection;

class StaffExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        
       // return Admin::all();
       return Admin::select('id','name','email')->get();

    }
    public function headings():array
    {
        return [
            '#',
            'name',
            'email',
            'email_verified_at',
            'remember_token',
            'created_at',
            'updated_at',
        ];
    }
    public function title(): string{

		return 'staff_list';

	}
}

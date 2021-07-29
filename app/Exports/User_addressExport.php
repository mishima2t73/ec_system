<?php

namespace App\Exports;

use App\Models\user_address;
use Maatwebsite\Excel\Concerns\FromCollection;

class User_addressExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return user_address::all();
    }
}

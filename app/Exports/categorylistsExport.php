<?php

namespace App\Exports;

use App\Models\categorylist;
use Maatwebsite\Excel\Concerns\FromCollection;

class categorylistsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return categorylist::all();
    }
}

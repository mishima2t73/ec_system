<?php

namespace App\Exports;

use App\Models\Productsale;
use Maatwebsite\Excel\Concerns\FromCollection;

class Product_salesExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Productsale::all();
    }
}

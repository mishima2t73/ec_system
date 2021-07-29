<?php

namespace App\Exports;

use App\Models\Product_sales_details;
use Maatwebsite\Excel\Concerns\FromCollection;

class Product_sales_detailsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Product_sales_details::all();
    }
}

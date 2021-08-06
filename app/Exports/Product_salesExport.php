<?php

namespace App\Exports;

use App\Models\Product_sale;
use Maatwebsite\Excel\Concerns\FromCollection;

class Product_salesExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $product_sale = new Product_sale;
        return $product_sale->all();
    }
}

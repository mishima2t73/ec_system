<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Imports\AddressImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\StaffExport; 
use App\Imports\StaffImport; 
use App\Exports\ProductsExport; 
use App\Imports\ProductsImport; 


class ExcelController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index(){
        return view('admin/excel/index');
    }
    public function staff_export(Request $request)
    {
        //$excategory = $request->input("excategory","StaffExport");
        $format = $request->input("exformat");
        //dd($format);
        return Excel::download(new StaffExport,'staffs.'.$format);
        //return Excel::download(new StaffExport,'staffs.csv');
    }
    public function staff_import(Request $request)
    {
        $file = $request->file('inputFile');
        //dd($file);
        Excel::Import(new StaffImport,$file);
        return view('admin/excel/index');
    }
    public function product_export(Request $request)
    {
        $format = $request->input("exformat");
        return Excel::download(new ProductsExport,'products.'.$format);
        //return Excel::download(new StaffExport,'staffs.csv');

    }
    public function product_import(Request $request)
    {
        $file = $request->file('inputFile');
        //dd($file);
        Excel::Import(new ProductImport,$file);
        return view('admin/excel/index');
    }
    public function category_list_export(Request $request)
    {
        $format = $request->input("exformat");
        return Excel::download(new categorylistsExport,'products.'.$format);
        //return Excel::download(new StaffExport,'staffs.csv');
    }
    public function category_list_import(Request $request)
    {
        $file = $request->file('inputFile');
        //dd($file);
        Excel::Import(new categorylistsImport,$file);
        return view('admin/excel/index');
    }
    public function product_sales_export(Request $request)
    {
        $format = $request->input("exformat");
        return Excel::download(new product_salesExport,'products.'.$format);
        //return Excel::download(new StaffExport,'staffs.csv');
    }
    public function product_sales_import(Request $request)
    {
        $file = $request->file('inputFile');
        //dd($file);
        Excel::Import(new Product_salesImport,$file);
        return view('admin/excel/index');
    }

    public function product_sales_details_export(Request $request)
    {
        $format = $request->input("exformat");
        return Excel::download(new product_salesdetails_Export,'products.'.$format);
        //return Excel::download(new StaffExport,'staffs.csv');
    }
    public function product_sales_details_import(Request $request)
    {
        $file = $request->file('inputFile');
        //dd($file);
        Excel::Import(new Product_salesdetails_Import,$file);
        return view('admin/excel/index');
    }

}

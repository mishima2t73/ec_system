<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Imports\AddressImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\StaffExport; 
use App\Imports\StaffImport; 


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
    public function export()
    {
        $format = "xlsx";
        return Excel::download(new StaffExport,'staffs.'.$format);
        //return Excel::download(new StaffExport,'staffs.csv');
    }
    public function import(Request $request)
    {
        $file = $request->file('file');
        Excel::Import(new StaffImport,$file);
        return view('admin/excel/index');
    }
    public function test (){
        $filename = "staffs.xlsx";
        Excel::import(new StaffImport,$filename);
         
    }
}

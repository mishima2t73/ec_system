<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;

class StaffsController extends Controller
{
    //ログイン確認処理？要確認
    public function __construct()
    {
        $this->middleware('auth:admin');
        
    }


    public function staff_list(Request $request){
        //$sortname = "created_at";
        if($request->sortname){
            $sortname = $request->sortname;    
        }
        else{
            $sortname = "id";
        }
        //$sortname = $request->sortname;
        if($request->order){
            $order = $request->order;
        }
        else{$order = "asc";}
        //$staffs = User::all();
        $staffs = User::orderBy($sortname,$order)->paginate(10);
        //$productspage = product::orderBy($sortname,'asc')->paginate(5);
        //return view('product/product_list',compact("products","sortname","order"));
        return view('admin/staff/staff_list',compact("staffs","sortname","order"));
    }
}

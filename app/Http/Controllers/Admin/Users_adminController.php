<?php

namespace App\Http\Controllers\Admin;
use App\User;
use Illuminate\Http\Request;

class Users_adminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
        
    }
    public function user_list(Request $request){
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
        $users = User::orderBy($sortname,$order)->paginate(10);
        //$productspage = product::orderBy($sortname,'asc')->paginate(5);
        //return view('product/product_list',compact("products","sortname","order"));
        return view('admin/user/user_list',compact("users","sortname","order"));
    }
}

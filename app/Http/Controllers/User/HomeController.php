<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\MustVerifyEmail as MustVerifyEmailContract;
use Illuminate\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\User;
use App\user_address;

class HomeController extends Controller
{
    public function __construct(){
        $this->middleware('auth:user');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        return view('user.mypage.home');
    }
    public function account_show(Request $request)
    {
        
        //$user = DB::user_address();
        $id = Auth::user()->id;
        //dd($id);

        //$user_data = User::where('id',$id)->get();
        $user_data = User::find($id);
        $user_data2 = user_address::find($id);
        //dd($user_data,$user_data2);
        return view('user.mypage.account',compact("user_data","user_data2"));
    }
    public function account_form(Request $request)
    {
        $id = Auth::user()->id;
        //dd($id);
        //$user_data = User::where('id',$id)->get();
        $user_data = User::find($id);
        $user_data2 = user_address::find($id);
        //dd($user_data,$user_data2);
        return view('user.mypage.account_update',compact("user_data","user_data2"));
    }

}

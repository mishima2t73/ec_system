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
use App\Http\Requests\account_update_request;

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
    public function account_update(account_update_request $request)
    {
        $id = Auth::user()->id;
        $user_data = User::find($id);
        $user_data2 = user_address::find($id);
        
        $re_data =  $request->all();
        //$tel_data = ;
        //dd($re_data);
        //dd($user_data,$re_data);
        unset($re_data['_token']);
        //mailは確認処理が必要なのでとりあえず削除
        unset($re_data['email']);
        $user_data->fill($re_data)->save();
        unset($re_data['name']);
        //dd($re_data);
        $user_data2->fill($re_data)->save();
        return redirect('user/mypage/account')->with('flash_message_account', 'アカウント情報を変更しました');
    }
    public function password_form(){
        return view('user/mypage/password_update');
        
        
    }
    public function user_password_update(Request $request){
        $re_data =  $request->all();
        $new_password =  Hash::make($re_data['password']);
        $id = Auth::user()->id;
        $user_data = User::find($id);

        dd($user_data,$re_data);
        //password' => Hash::make($data['password']),
        
        if($re_data['password']==$user_data['password']){

        }
    }

}

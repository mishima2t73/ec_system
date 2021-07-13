<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\MustVerifyEmail as MustVerifyEmailContract;
use Illuminate\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\User;
use App\user_address;
use App\Http\Requests\account_update_request;
use App\Http\Requests\address_update_request;
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
        unset($re_data['_token']);
        //dd($re_data);
        $form_old_password =  $re_data['old_password'];
        $new_password = $re_data['password'];
        $new_password2 = $re_data['password2'];
        $id = Auth::user()->id;
        $user_data = User::find($id);
        $old_password = $user_data['password'];
        //dd($re_data,$form_old_password,$old_password);
        if(!(Hash::check($form_old_password, \Auth::user()->password))){
            return redirect('user/mypage/password_form')->with('flash_message_password', 'パスワードの変更に失敗しました。');    
        }
        if($new_password == $new_password2 ){
            //$user_data2->fill($re_data)->save();
            //dd($new_password);
            $user_data->fill(["password"=>Hash::make($new_password)])->save();
            return redirect('user/mypage')->with('flash_message_password', 'パスワードを変更しました。');
        }
        return redirect('user/mypage/password_form')->with('flash_message_password', 'パスワードの変更に失敗しました。');
    }
    public function address_up_form(Request $request)
    {
        $id = Auth::user()->id;
        //dd($id);
        $user_data = user_address::find($id);
        //dd($user_data);
        return view('user.mypage.address_update',compact("user_data"));
    }
    public function address_update(address_update_request $request)
    {
        $id = Auth::user()->id;
        $user_data2 = user_address::find($id);
        //$user_data = $user_data2;
        $re_data =  $request->all();
        //$tel_data = ;
        unset($re_data['_token']);
    
        //dd($re_data,$user_data2);
        \DB::enableQueryLog();
        //$user_data2->fill($re_data)->save();
        //$user_data2->fill($re_data)->save();
        $user_data2->update(
            ['post_code'=>$re_data['post_code']],
            ['prefectures'=>$re_data['prefecture']],
            ['city'=>$re_data['city']],
            ['address'=>$re_data['address']],
            ['address2'=>$re_data['address2']],
            
        );
        //dd(\DB::getQueryLog(),$user_data2,$re_data);
        //dd($user_data2->fill($re_data)->tosql(),$user_data2->getBindings());
        //$user_data2->fill([])->save();
        //$user_data2->update([$user_data2]);
        $user_data2 = user_address::find($id);
        return redirect('user/mypage')->with('flash_message_account', '住所情報を変更しました');
    }

}

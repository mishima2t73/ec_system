<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\facades\Auth;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */

    //protected $redirectTo = '/home';
    protected $redirectTo =     RouteServiceProvider::ADMIN_HOME    ;

/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }
    //guard
    protected function guard(){
        return Auth::guard('admin');
    }
    //login
    public function showLoginForm(){
        return view('admin.auth.login');
    }

    //ログアウト
    public function logout(Request $request){
        Auth::guard('admin')->logout();
        return $this->loggedOut($request);
    }
    public function loggedOut(Request $request){
        return redirect(route('admin.login'));
    }

}

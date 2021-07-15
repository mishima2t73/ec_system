<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContactMail;
use  Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    
    //入力画面
    public function input()
    {
        $hash = array(
            'title'=>'お問い合わせ',
            'subtitle'=>'入力画面',
        );
        $makerlist = DB::table('categorylist')->where('category','maker')->get('value');
        
        return view('shop.contact.form',compact('makerlist'))->with($hash);
    }

    //確認画面
    public function confirm(request $request)
    {
        $hash = array(
            'request'=>$request,
            'title' => 'お問い合わせ',
            'subtitle' => '確認画面',
        );
        $makerlist = DB::table('categorylist')->where('category','maker')->get('value');
        return view('shop.contact.confirm',compact('makerlist'))->with($hash);
    }

    public function finish(Request $request)
    {
        $contact = $request;

        Mail::to($contact->email)->send(new ContactMail($contact));

        $hash = array(
            'title' => 'お問い合わせ',
            'subtitle' => '完了画面',
        );
        $makerlist = DB::table('categorylist')->where('category','maker')->get('value');
        return view('shop.contact.finish',compact('makerlist'))->with($hash);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContactMail;
use  Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    //入力画面
    public function input()
    {
        $hash = array(
            'title'=>'お問い合わせ',
            'subtitle'=>'入力画面',
        );
        return view('shop.contact.form')->with($hash);
    }

    //確認画面
    public function confirm(request $request)
    {
        $hash = array(
            'request'=>$request,
            'title' => 'お問い合わせ',
            'subtitle' => '確認画面',
        );
        return view('shop.contact.confirm')->with($hash);
    }

    public function finish(Request $request)
    {
        $contact = $request;

        Mail::to($contact->email)->send(new ContactMail($contact));

        $hash = array(
            'title' => 'お問い合わせ',
            'subtitle' => '完了画面',
        );

        return view('shop.contact.finish')->with($hash);
    }
}

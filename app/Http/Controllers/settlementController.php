<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Costomer;
use Stripe\Charge;

class settlementController extends Controller
{
    public function index(){
        return view ('index');
    }
    //
    public function settlement(Request $Request){
        try{
            Stripe::setApiKey(env('STRIPE_SECRET'));

            $customer=Customer::create(array(
                'email'=>$request->atripeEmail,
                'source'=>$request->stripeToken
            ));
            $charge=Charge::create(array(
                'customer'=>$customer->id,
                'amount'=>1000,
                'currency'=>'jpy'
            ));
            return redirect()->route('complete');
        }
        catch(Exception $e){
            return $e->getMessage();
        }
    }
    public function complete()
    {
        return view('complete');
    }
}

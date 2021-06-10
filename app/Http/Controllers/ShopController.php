<?php

namespace App\Http\Controllers;
use App\product;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;

class ShopController extends Controller
{
    //top
    public function topview(Request $request){
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
        

        //$products = product::all();
        $products = product::orderBy($sortname,$order)->paginate(9);
        //$productspage = product::orderBy($sortname,'asc')->paginate(5);
        //return view('product/product_list',compact("products","sortname","order"));
        //dd($sortname,$order);
        return view('/shop/top',compact("products","sortname","order"));
    }
    //商品詳細 Route::get('shop/product/{id}','ShopController@showproduct_data')->name('showproduct_data');
    public function showproduct_data($id){
        $product_data = product::find($id);
        return view('shop/shop_product_data',[
            'product'=>$product_data
        ]);
    }

}

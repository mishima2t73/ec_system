<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\product;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;

class ShopController extends Controller
{
    //top
    public function topview(Request $request){
        $category = $request->input('category', 'default');
        $subcategory = $request->input('subcategory', '');
        $sortname = $request->input('sortname','id');
        $order = $request->input('order','desc');
        //dd($subcategory);
        if($category == "default"){
            $products = DB::table('products');
            $products = Product::orderBy($sortname,$order)
                                    ->paginate(9);
        }
        if($category == "maker" || $category == "CPU" ){
            $products = Product::where($category,$subcategory)
                                ->orderBy($sortname,$order)
                                ->paginate(9);
        }
        if($category == "price" || $category == "display || $category == hdd_ssd" ){
            $products = Product::wherebetween($category,$subcategory)
                                ->orderBy($sortname,$order)
                                ->paginate(9);
            $subcategory = "pricebet";
        }
        //dd($products);                
        
        return view('/shop/top',compact("products","sortname","order","category","subcategory"));
    }
    public function shop_category(Request $request){
        
        return view('/shop/top',compact("products","sortname","order"));      
    }
    
    //商品詳細 Route::get('shop/product/{id}','ShopController@showproduct_data')->name('showproduct_data');
    public function showproduct_data($id){
        $product_data = product::find($id);
        return view('shop/shop_product_data',[
            'product'=>$product_data
        ]);
    }
     /*
        if ($request->session()->has('id')){
            return view('shop/product{$id}',['error'=>'既にこの商品はカートに入っています。']);
        }else{
            $request->session()->put(['cartlist',$cartdata]);
        }
        */
    //cart in 
    public function shop_cartin(Request $request){
        $session_productid = $request->id;
        $session_productquantity = $request->quantity;
        //$cartdata = [session()->get('cartlist')];
        //$search = in_array($request->session('id'=>$id));
        $cartdata = compact("session_productid","session_productquantity");
       //'cartdata',
        $request->session()->push('cartlist',$cartdata);
        //dd($request->session()->get('cartlist'));
        //dd($request->session()->all());
        return redirect('/shop/product/'.$session_productid)->with('flash_message','カートに商品を追加しました。');        
    }
    public function cart_delete_single($id){
        //product::destroy($id);
        return redirect('/shop/cart');
    }
    public function cart_delete($id){
        session()->forget('cartlist');
        return redirect('/shop/cart');
    }

    public function shop_cartshow(Request $request){
        dd($request->session()->all());
        $cartdata= $request->session()->get('cartlist');
        $SessionProductId = array_column($cartData, 'SessionProductId');
        $SessionProductQuantity = array_column($cartData, 'SessionProductQuantity');
        //dd($cart);
       //$products = product::find();
       return view('/shop/cart',["cart"=>$cart]);
    }
    public function company_show(){
        return view('/shop/company');
    }
    public function shopping_info(){
        return view('/shop/shop_info');
    }
}

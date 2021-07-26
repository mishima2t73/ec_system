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
        /*if (!$request->session()->exists('category_list')){
            $makerlist = DB::table('categorylist')->where('category','maker')->get('value');
            $request->session()->put('category_list',$makerlist);
        }*/

        $category = $request->input('category', 'default');
        $subcategory = $request->input('subcategory', 'default');
        $sortname = $request->input('sortname','id');
        $order = $request->input('order','desc');
        //$makerlist = DB::table('makerlist')->where('display','1')->get('maker');
        $makerlist = DB::table('categorylists')->where('category','maker')->get('value');

        //dd($subcategory,$makerlist);
        if($category == "default"){
            //$products = DB::table('products');
            $products = Product::orderBy($sortname,$order)
                                    ->paginate(9);
        }
        if($category == "maker"){
            $products = Product::where($category,$subcategory)
                                ->orderBy($sortname,$order)
                                ->paginate(9);
        }
        if($category == "price" || $category == "display" || $category == "hdd_ssd_space" ){
            $products = Product::wherebetween($category,$subcategory)
                                ->orderBy($sortname,$order)
                                ->paginate(9);
            //$subcategory = "sub";
        }
        if($category == "cpu" ){
            $products = Product::where($category,'like',"%$subcategory%")
                                ->orderBy($sortname,$order)
                                ->paginate(9);
        //dd($products);           
        }
        //dd($products->isEmpty());
        

        //dd($products);                
        
        return view('/shop/top',compact("products","sortname","order","category","subcategory","makerlist"));
    }

    public function shop_category(Request $request){
        
        return view('/shop/top',compact("products","sortname","order"));      
    }
    
    //商品詳細 Route::get('shop/product/{id}','ShopController@showproduct_data')->name('showproduct_data');
    public function showproduct_data($id){
        //$makerlist = DB::table('makerlist')->where('display','1')->get('maker');
        $makerlist = DB::table('categorylist')->where('category','maker')->get('value');
        //dd($makerlist,$categorylist);
        $product_data = product::find($id);
        return view('shop/shop_product_data',[
            'product'=>$product_data,'makerlist'=>$makerlist]);
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
        //dd($request->session()->all());
        //dd($cartlist);
        $cartdata= $request->session()->get('cartlist');
        //dd($cartdata);
        $SessionProductId = array_column($cartdata, 'SessionProductId');
        $SessionProductQuantity = array_column($cartdata, 'SessionProductQuantity');
        //dd($cart);
       //$products = product::find();
        return view('/shop/cart',["cartdata"=>$cartdata]);
    }
    public function company_show(){
        $makerlist = DB::table('categorylist')->where('category','maker')->get('value');
        return view('/shop/company',compact('makerlist'));
    }
    public function shopping_info(){
        $makerlist = DB::table('categorylist')->where('category','maker')->get('value');
        return view('/shop/shop_info',compact('makerlist'));
    }
}

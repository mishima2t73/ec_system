<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\product;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    //ログイン確認処理？要確認
    public function __construct()
    {
        $this->middleware('auth:admin');
        
    }
    public function index()
    {
        //$id = Auth::id();
        return view('admin.home');
    }

    public function product_index(Request $request)
    {
        $sessionUser=User::find($request->session()->get('user_id'));

        if($request->session()->has('cartdata')){
            $cartdata=array_values($request->session()->get('cartdata'));
        
        foreach($cartdata as $index =>$data){
            $data['product_name']=$product[$index]->product_name;
            $data['category_name']=$product[$index]['category']->category_name;
            $data['price']=$product[$index]->price;
            $data['itemprice']=$data['price']*$data['session_quantity'];
        
        unset($data);
        }
        return view('cart.cartlist',compact('sessionUser','cartdata','totalprice'));
    }else{
        return view('cart.no_cart_list',['user'=>Auth::user()]);
        return view('cart.cartlist',compact('sessionUser','cartdata','totalprice'));
    }
}
    //list
    public function product_list(Request $request)
    {
        $sortname = $request->input('sortname','id');
        $order = $request->input('order','desc');


        //$products = product::all();
        $products = DB::table('products');
        $products = product::orderBy($sortname,$order)->paginate(8);
        $product=product::find($sessionProductId);
        //$productspage = product::orderBy($sortname,'asc')->paginate(5);
        return view('admin/product/product_list',compact("products","sortname","order"));
    }

    public function remove(Request $request){
        $sessioncartdata=$request->session()->get('cartdata');

        $removecartItem=[
            ['session_products_id'=>$request->products_id,
            'session_quantity=>$request->product_quantity']
        ];
        $removeCompletedcartdata=array_udiff($sessioncartdata,$removecarItem,function($sessioncartdata,$removecartItem){
            $result1=$sessioncartdata['session_products_id']-$removecartItem['session_products_id'];
            $reslut2=$sessioncartdata['session_quantity']-$removecartItem['session_quantity'];
            $request->session()->put('cartdata',$removeCompletedcartdata);
            $cartdata=$request->session()->get('cartdata');
            if($request->session()->has('cartdata')){
                return redirect()->route('cartlist.index');
            }
            return view('products.no_cart_list',['user'=>Auth::user()]);
            return $result1+$result2;
        });

        $request->session()->put('cartdata',$removeCompletedcatdata);
        $cartdata=$request->session()->get('cartdata');

        if($request->session()->has('cartdata')){
            return redirect()->route('cartlist.index');
        }
        return view('products.no_cart_list',['user'=>Auth::user()]);
    }
    public function store(Request $request){
        $cartdata = $request->session()->get('cartdata');
        $$carbonNow=carbon::now();

        $order=new \App\Order;
        $order->user_id=Auth::user()->id;
        $order->order_date=$now;
        $order->order_number=rand();
        Auth::user()->orders()->save($order);
        $savedOrder=Order::where('order_number',$order)->latest()->first();
        $cavedOverId=$saveOrder->pluck('id')->toArray();

        foreach($cartdata as $data){
            $orderDetail = new \App\OrderDetail;
            $orderDetail->product_id=data['session_prodocts_id'];
            $orderDetail->order_id=$savedOverId[0];
            $orderDetail->shipment_status_id=3;
            $orderDetail->order_quantity=$data['session_quantity'];
            $orderDetail->shipment_date=$now;
            Auth::user()->orderDetail()->save($orderDetail);
        }
        $request->session()->forget('cartdata');
        return view('products/purchase_completed',compact('order'));
    }
    //data @param int $id 商品詳細
    public function product_data($id)
    {
        $product_data = product::find($id);
        return view('admin/product/product_data',[
            'product'=>$product_data
        ]);
    }
    //add show
    public function product_addshow()
    {
        return view('admin/product/product_add');
    }
    //product_store ProductRequest
    public function exe_store(ProductRequest $request)
    {
        if ($request){
            return view('admin.home');
        }
        
        $product = $request->all();
        if($file = $request->uploadfile){
            $file_name = time() . $file->getClientOriginalName();
            $target_path = public_path('uploads/');
            $file->move($target_path, $file_name);
        }else{
            $file_name = "";
        }
        $product = $product + array('image'=>$file_name);
        //dd($file);
        //dd($product);
        //$product->image = $file_name;

        \DB::beginTransaction();
        //try{
            product::create($product);
            \DB::commit();
            /*
        }catch(\throwable $e){
            \DB::rollback();
            //abort(500);
        }
        */
        return redirect('/product/product_list');

    }
    //update show product_updateshow
    public function product_updateshow($id){
        $product_data = product::find($id);
        return view('admin/product/product_update',[
            'product'=>$product_data
        ]);
    }
    public function addcart(Request $request){
        $cartdata=[
            'session_products_id'=>$request->products_id,
            'session_quantity'=>$request->product_quentity,
        ];
        if(!$request->session()->has('cartdata')){
            $request->session()->push('cartdata',$cartdata);
        }else{
            $sessioncartdata=$request->session()->get('cartdata');

            $issameProductId=false;
            foreach($sessiondata as $index=>$sessiondata){
                if($sessiondata['session_products_id']===$cartdata['session_products_id']){
                $issameproductId=true;
                $quantity=$sessiondata['session_quentity']+$cartdata['session_quantity'];
                $request->session()->put('cartdata.'.$index.'.session_quentity',$quantity);
                break;
            }
        }
        if($issameproductId===false){
            $request->session()->push('cartdata',$cartdata);
        }
    }
    $request->session()->put('users_id',($request->users_id));
    return redirect()->route('cartlist.index');
}
    //update
    public function product_update(ProductRequest $request){
        $id= $request->id;
        $pdata = product::find($id);
        $fdata = $request->all();
        //dd($file = $request->uploadfile);
        unset($fdata['_token']);
        if($request->uploadfile != NULL){
            $file = $request->uploadfile;
            $file_name = time() . $file->getClientOriginalName();
            $target_path = public_path('uploads/');
            $file->move($target_path, $file_name);
            $fdata = $fdata + array('image'=>$file_name);
        }else{
            unset($fdata['uploadfile']);
        }
        //dd($fdata);
        //$user->fill($request->all())->save();
        $pdata->fill($fdata)->save();
        //product::update($id);
     return redirect('product/'.$id);

    }
    //delete
    public function product_delete($id){
        product::destroy($id);
        return redirect('admin//product/product_list');
    }
    //wordpressテスト　Route::get('/test', 'ProductController@wptest')->name('wptest');
    public function wptest(){
        return view('admin//product/product_test');
    }

}

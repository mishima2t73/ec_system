<?php

namespace App\Http\Controllers;
use App\product;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        
    }
    public function index()
    {
        //$id = Auth::id();
        return view('home');
    }
    //list
    public function product_list(Request $request)
    {
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
        $products = product::orderBy($sortname,$order)->paginate(5);
        //$productspage = product::orderBy($sortname,'asc')->paginate(5);
        return view('product/product_list',compact("products","sortname","order"));
    }

    //data @param int $id 商品詳細
    public function product_data($id)
    {
        $product_data = product::find($id);
        return view('product/product_data',[
            'product'=>$product_data
        ]);
    }
    //add show
    public function product_addshow()
    {
        return view('product/product_add');
    }
    //product_store ProductRequest
    public function exe_store(ProductRequest $request)
    {
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
        return view('product/product_update',[
            'product'=>$product_data
        ]);
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
    //削除
    public function product_delete($id){
        product::destroy($id);
        return redirect('/product/product_list');
    }
    //wordpressテスト　Route::get('/test', 'ProductController@wptest')->name('wptest');
    public function wptest(){
        return view('/product/product_test');
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\product;
use App\categorylist;
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
    //list
    public function product_list(Request $request)
    {
        $sortname = $request->input('sortname','id');
        $order = $request->input('order','desc');


        //$products = product::all();
        $products = DB::table('products');
        $products = product::orderBy($sortname,$order)->paginate(8);
        //$productspage = product::orderBy($sortname,'asc')->paginate(5);
        return view('admin/product/product_list',compact("products","sortname","order"));
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
        $makerlist = DB::table('categorylist')->where('category','maker')->get('value');
        $oslist = DB::table('categorylist')->where('category','os')->get('value');
        return view('admin/product/product_add',compact('makerlist','oslist'));
    }
    //product_store ProductRequest
    public function exe_store(ProductRequest $request){
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
        return redirect('admin/product/product_list');
    }
    public function product_setting_show(){
        $makerlist = DB::table('categorylists')->where('category','maker')->get();
        $oslist = DB::table('categorylists')->where('category','os')->get();
        //dd($makerlist,$oslist);
        return view('admin/product/product_setting',compact('makerlist','oslist'));
    }
    public function product_setting_add(Request $request){
        $category = $request->all();
        $count = DB::table('categorylists')->where('category',$request->category)->count();
        $category['sort']= $count;
        //dd($category,$count);
        //$value = $request->input('value');
        $category_list =new \App\categorylist;
        
            \DB::beginTransaction();
                categorylist::create($category);
            \DB::commit();
        return redirect('/admin/product/setting');
    }
    public function product_setting_delete(Request $request){
        //dd($request);
        categorylist::destroy($request->id);
        return redirect('admin/product/setting');
    }

    public function product_setting_sort(){
        //並び替え
        //ずれるカテゴリー
        //$request->u_id;
    }
    
    //wordpressテスト　Route::get('/test', 'ProductController@wptest')->name('wptest');
    public function wptest(){
        return view('admin/product/product_test');
    }

}

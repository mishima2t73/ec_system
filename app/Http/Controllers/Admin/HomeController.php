<?php

namespace App\Http\Controllers\Admin;

use App\Product_sale;
use App\Product_sales_detail;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Carbon\Carbon;
use App\Date;



class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //今日
        $today = Carbon::today();
        $tomorrow = Carbon::tomorrow();
        $today_sales = number_format(Product_sale::whereBetween('created_at',[$today,$tomorrow])->
                                                                            sum("sales_amount"));
        $today_count = number_format(Product_sale::whereBetween('created_at',[$today,$tomorrow])->
                                                                            count());
        //昨日
        $yesterday = Carbon::yesterday();
        $yesterday_sales = number_format(Product_sale::whereBetween('created_at',[$yesterday,$today])->
                                                                            sum("sales_amount"));
        $yesterday_count = number_format(Product_sale::whereBetween('created_at',[$yesterday,$today])->
                                                                            count());
        //月初 
        $to_month= Carbon::now()->firstOfMonth();
        //月末 次月の一秒前
        $month_end = Carbon::now()->endOFMonth();
        //今月売上
        $month_sales = number_format(Product_sale::whereBetween('created_at',[$to_month,$month_end])->sum("sales_amount"));
        $month_count = number_format(Product_sale::whereBetween('created_at',[$to_month,$month_end])->count());
        return view('admin.home',compact('today_sales','today_count','yesterday_sales','yesterday_count','month_sales','month_count'));
    }
    
    public function sales_show(Request $request)
    {
        $sortname = $request->input('sortname','created_at');
        $order = $request->input('order','desc');
        //今日
        //$today = Carbon::now();
        //月初 
        $to_month= Carbon::today()->firstOfMonth();
        //月末 
        $month_end = Carbon::today()->endOFMonth();

        //指定があればそちらを優先、無ければ今日
        if (!empty($request['s_date']) && !empty($request['e_date'])) {
            //ハッシュタグの選択された20xx/xx/xx ~ 20xx/xx/xxのレポート情報を取得
            $s_date = $request['s_date'];
            //dd($s_date);
            $s_date = Carbon::parse($s_date);
            //dd($s_date);
            $s_month = $s_date->month;
            $e_date = $request['e_date'];
            
            $e_date = Carbon::parse($e_date);
            $e_month = $e_date->month;
            
        }elseif(!empty($request['s_date']) && empty($request['e_date'])){
             //ハッシュタグの選択された20xx/xx/xx ~ 20xx/xx/xxのレポート情報を取得
             $s_date = $request['s_date'];
             $s_date = Carbon::parse($s_date);
             //dd($s_date);
             $s_month = $s_date->month;
             $e_date = $request['e_date'];
             
             $e_date = $month_end;
             $e_month = $e_date->month;
        } 
        else {
            //リクエストデータがなければ今月の売上表示
            $s_date = $to_month;
            $e_date = $month_end;
            $s_month = $to_month->month;
            $e_month = $month_end->month;
        }
        $products_list = Product_sale::whereBetween('created_at',[$s_date,$e_date])->orderBy($sortname,$order)->get();
        $month_sum = number_format(Product_sale::whereBetween('created_at',[$s_date,$e_date])->sum("sales_amount"));
 
        $products = new LengthAwarePaginator(
            $products_list->forPage($request->page,9),
            count($products_list),
            9,
            $request->page,
            array('path'=>$request->url())
        );
        //dd($products);
        //dd($month_sum);
        return view('admin.sale.sales',compact('products','sortname','order','s_date','e_date','month_sum'));
    }

    public function product_sale_detail($sales_number)
    {
        //$products_page = Product_sale::orderBy($sortname,$order)->paginate(9);
        //合計金額
        $sales = Product_sales_detail::where('sales_number',$sales_number)->get();

        //dd($sales);
        return view('admin.sale.detail',compact('sales'));
    }




    
    public function test_buypage()
    {
        //
        return view('admin.test_buy');
    }
    public function test_buy()
    {
        //
        return view('admin.test_buy');
    }
}

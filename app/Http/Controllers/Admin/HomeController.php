<?php

namespace App\Http\Controllers\Admin;

use App\Product_sale;
use App\Product_sales_detail;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Carbon\Carbon;


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
        //今日
        //$today = Carbon::now();
        //月初 
        $to_month= Carbon::today()->firstOfMonth();
        //月末 次月の一秒前
        $month_end = Carbon::today()->endOFMonth();
        //指定があればそちらを優先、無ければ今日
        $s_date = $request->input('s_date',$to_month);
        $month = $s_date->month;
        //指定か今月末
        $e_date = $request->input('e_date',$month_end);
        //Carbon::create(date())->endOfMonth();
        //dd($s_date,$e_date);
        $sortname = $request->input('sortname','created_at');
        $order = $request->input('order','desc');

        //売上一覧表示
        //$products = DB::table('product_sales');
        $products_list = Product_sale::whereBetween('created_at',[$s_date,$e_date])->orderBy($sortname,$order)->get();
        //dd($products_list);
        //$products_amount = $products_list->pluck('sales_amount');
        //dd($products_amount);
        //$products_page = Product_sale::orderBy($sortname,$order)->paginate(9);
        
        $products = new LengthAwarePaginator(
            $products_list->forPage($request->page,9),
            count($products_list),
            9,
            $request->page,
            array('path'=>$request->url())
        );
        //dd($products);
        $month_sum = number_format(Product_sale::whereBetween('created_at',[$s_date,$e_date])->sum("sales_amount"));
       
        //dd($month_sum);
        return view('admin.sale.sales',compact('products','sortname','order','month','month_sum'));
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

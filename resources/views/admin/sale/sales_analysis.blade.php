@extends('layouts.admin')

@section('content')
<div class="container">
    
    <h2>売上一覧</h2>
    <p>
        {{$s_date->month}}月{{$s_date->day}}日から{{$e_date->month}}月{{$e_date->day}}の売上：    
       
        {{$month_sum}}円 <span class="px-5">  注文件数：{{$products->total()}} </span></p>
    <form action="#" method = "GET" class="form-group m-1">
    売上表示範囲指定: <input type="date" name = "s_date">～
                    <input type="date" name = "e_date">
                    <button type="submit" class="btn btn-primary">検索</button>
                    
    </form>
    <button type="submit" class="btn btn-secondary m-1" onclick="location.href='/admin/sals?s_date={{\Carbon\Carbon::today()->firstOfMonth()}}&e_date={{\Carbon\Carbon::today()->endOFMonth()}}'">
        今月</button>
        <button type="submit" class="btn btn-secondary m-1" onclick="location.href='/admin/sals?s_date={{\Carbon\Carbon::today()->firstOfMonth()->subMonth()}}&e_date={{\Carbon\Carbon::today()->firstOfMonth()->subMonth()->endOFMonth()}}'">
        先月</button>
        <button type="submit" class="btn btn-secondary m-1" onclick="location.href='/admin/sals?s_date={{\Carbon\Carbon::today()->firstOfMonth()->subMonth(2)}}&e_date={{\Carbon\Carbon::today()->firstOfMonth()->subMonth(2)->endOFMonth()}}'">
            先々月</button>
    <div class="list-group-item">
        <div class="row">
            <div class="col-sm-3 text-center">売上日</div>
            <div class="col-sm-3 text-center">明細番号</div>
            <div class="col-sm-2 text-center">顧客番号</div>
            <div class="col-sm-2 text-center">名前</div>
            <div class="col-sm-2 text-center">金額</div>
        </div>
    </div>
    <div>
    </div>
            @foreach ($products as $product)
            <div class = "list-group-item">
                <div class = "row justify-content-center">
                    <div class = "col-sm-3 text-center">{{ $product->created_at->format('Y/m/d') }}</div>
                    <div class = "col-sm-3 text-center">
                        <a href="/admin/sales/{{ $product->sales_number}}">
                        {{ $product->sales_number}}
                        </a>
                    </div>
                    <div class = "col-sm-2 text-center">{{ $product->user_id}}</div>
                    <div class = "col-sm-2 text-center">{{ $product->user_name}}</div>
                    <div class = "col-sm-2 text-center">￥{{ number_format($product->sales_amount)}}</div>
                </div>
            </div>
            @endforeach
        <br>
    <div class = "col-md-4 offset-md-4">
        {{$products->appends(request()->input())->links()}}
    </div>
</div>




@endsection
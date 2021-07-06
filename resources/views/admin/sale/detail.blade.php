@extends('layouts.admin')

@section('content')
<div class="container">
    <div class = "card">
        <div class="card-body">
            <h2>受注データ明細</h2>
            <br>
            <div class="row">
                <div class="col-3">注文番号：{{$sales[0]->sales_number}}</div>
                <div class="col-6">注文日時：{{$sales[0]->created_at}}</div>
            </div>
            <div class="row">
                <div class="col-4">ユーザーID：{{$sales[0]->user_id}}</div>
                <div class="col-4">ユーザー名：</div>
                <div class="col-4">メールアドレス：</div>
            </div>
            <br>
            <h3>住所情報</h3>
            <div class="row">
                <div class="col-4">郵便番号</div>
                <div class="col-4">国</div>
                <div class="col-4">県</div>
                <div class="col-4">data</div>
                <div class="col-4">data</div>
            </div>
            
            <br>
            <h3>商品情報</h3>
            <div class="row">
                @foreach ($sales as $item)
                <div class ="col-4">
                <ul class="list-group list-group-flush border"> 
                <li class="list-group-item h4">商品ID:{{$item->product_id}}</li>
                <li class="list-group-item">商品名:{{$item->product_name}}</li>
                <li class="list-group-item">個数:{{$item->quantity}}</li> 
                <li class="list-group-item">価格:{{$item->product_price}}</li>    
                </ul>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

@endsection
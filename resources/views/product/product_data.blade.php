@extends('layouts.app')

@section('content')
<div class ="container">
    <h2>商品詳細</h2>
        <div class = "list-group-item">
            <div>
                <div><img src="src='upload'"width ="100" alt=""></div>
            <div >商品番号：{{ $product->id}} </div>
            <div >{{ $product->name}}</div>
            <div >メーカー:{{ $product->maker}}</div>
            <div >型番:{{ $product->model_id}}</div>
            <div >価格:{{ $product->price}}</div>
            <div >在庫:{{ $product->stock}}</div>

            <div >CPU:{{ $product->cpu}}</div>
            <div >メモリ:{{ $product->memory}}</div>
            <div >HDD/SSD:{{ $product->hdd_ssd}}</div>
            <div >容量:{{ $product->hdd_ssd_space}}</div>
            <div >ドライブ:{{ $product->drive}}</div>
            <div >ディスプレイ:{{ $product->display}}</div>
            
            <div >登録日:{{ $product->created_at}}:</div>
            <div >更新日:{{ $product->updated_at}}</div>
            </div>
        </div>
        <div class = "row ">
            <!-- <a href="/product/{{ $product->id}}"  >{{ $product->name}} -->
            <div class = "col-sm-2"><button type="submit" class="btn btn-secondary m-1" onclick="location.href='/product/{{$product->id}}/edit'">変更</button></div>
            
            <div class = "col-sm-2"><button type="submit" class="btn btn-secondary m-1" onclick="">削除</button></div>
        </div>
</div>
@endsection

@extends('layouts.shop')

@section('content')
<div class ="container">
    <h2>中古PC</h2>
        <div class = "list-group-item p-5">
            <div class = "row justify-content-center">
                <div class = "col-3"><img src="/uploads/{{$product->image}}"width ="200" alt=""></div>
            <div class = "col-5" >
                <div ><h2>{{ $product->name}}</h2></div>
                <h3>価格:{{ $product->price}}円（税込）</h3>
                <div ><h3> {{ $product->maker}}</h3></div>
                <form method="POST" action="{{route('shop_cartin')}}">
                @csrf
                在庫：{{$product->stock}}
                <select class="form-control" id="quantity" name = "quantity"style= "width:100px;">
                    @for ($i = 1; $i <= $product->stock; $i++)
                        <option value = "{{$i}}">{{$i}}</option>
                    @endfor
                  </select>
                <input type="hidden" value= '{{$product->id}}'name = 'id'>
                <button type="submit" class="btn btn-secondary m-1" onclick="" >カートに入れる</button>
                
                </form>    
            </div>
            </div>
            <div >型番:{{ $product->model_id}}</div>
            <div >CPU:{{ $product->cpu}}</div>
            <div >メモリ:{{ $product->memory}}</div>
            <div >HDD/SSD:{{ $product->hdd_ssd}}</div>
            <div >容量:{{ $product->hdd_ssd_space}}</div>
            <div >ドライブ:{{ $product->drive}}</div>
            <div >ディスプレイ:{{ $product->display}}</div>
            <div >その他:{{ $product->remarks}}</div>
        </div>
</div>
@endsection

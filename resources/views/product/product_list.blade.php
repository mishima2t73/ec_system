@Auth
@extends('layouts.app')

@section('content')
   
<div class ="container-fluid" style="width:90%">
    <div class = "row">
        <div class = "col-sm-2">
            
            <div class = "list-group">
            <ul>
                <h3>並べ替え</h3>
                <li class="list-group-item">
                    <a href="/product/product_list?sortname=id">商品ID</a>
                </li>
                <li class="list-group-item">
                    <a href="/product/product_list?sortname=name">商品名</a>
                </li>
                <li class="list-group-item">
                    <a href="/product/product_list?sortname=price">価格</a>
                </li>
            </ul>
            <ul>
                <li class="list-group-item">
                    <a href="/product/product_list?sortname={{$sortname}}&order=asc">昇順</a>
                </li>
                <li class="list-group-item">
                    <a href="/product/product_list?sortname={{$sortname}}&order=desc">降順</a>
                </li>
            </ul>
            </div>
        </div>
    <div class = "col">
    <h2>商品一覧</h2>
    <button type="submit" class="btn btn-secondary m-1" onclick="location.href='/product/product_add'">
        商品登録
    </button>
    @foreach ($products as $product)
    <div class = "list-group-item">
        <div class = "row">
            
            <div class = "col-sm-1">番号：{{ $product->id}} </div>
            <div class = "col-sm-2"><a href="/product/{{ $product->id}}"  >
                {{ $product->name}}
            </a></div>
            <div class = "col-sm-2">価格:{{ $product->price}}</div>
            <div class = "col-sm-1">在庫:{{ $product->stock}}</div>
            <div class = "col-sm-2">登録日:{{ $product->created_at}}:</div>
            <div class = "col-sm-2">更新日:{{ $product->updated_at}}</div>
            <div class = "col-sm-1">
                    <button type="submit" class = "btn btn-secondary m-1" onclick="location.href='/product/update/{{$product->id}}'">更新</button>
                </div>
                
            <div class = "col-sm-1">
            <form action="{{route('product_delete',$product->id)}}" method="post" onsubmit="return checkDelete()">
                @csrf
                <button type="submit" class = "btn btn-danger">削除</button>
            </form>
            </div>
        </div>
    
    </div>
@endforeach

    <div class = "col-md-4 offset-md-4">
        {{$products->appends(['sort'=>$sortname,'order'=>$order])->links()}}
    </div>
   
</div>
</div>
<script>
    function checkDelete(){
        if(window.confirm('商品を削除してよろしいですか？')){
            return true;
        }else{
            return false;
            }
    }
</script>
@endsection
@endAuth
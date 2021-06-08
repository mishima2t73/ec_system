@extends('layouts.sho')
 


@section('content')
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
    <div class ="container">
        @foreach ($products as $i => $product)
            @if ($i % 3 == 0)
                <div class = "row m-4 text-center" >        
            @endif
            <div class="col align-items-center bg-white" >
                    @if ($product->image == 0)
                        <div class="image-col"><img src="/uploads/NO-IMAGE.png"  alt=""></div>    
                    @else
                        <div class="image-col"><img src="/uploads/{{$product->image}}"    alt=""></div>
                    
                    @endif
                    <div ><a href= "/product/{{ $product->id}}">{{ $product->name}}</a></div>
                    <div>￥{{ $product->price}}</div>
                    <div>{{ $product->cpu}}</div>
            </div>
            @if ($i == 2 || $i == 5 ||$i == 8 || $i == count($products))
                </div>
            @endif
        
        @endforeach
        <div class = "row ">
            <div class = "col-md-5 offset-md-5 align-items-center">
                {{$products->appends(['sort'=>$sortname,'order'=>$order])->links()}}
            </div>
        </div>
    </div>
</div>
</div>
@endsection
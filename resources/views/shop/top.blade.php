@extends('layouts.sho')
 


@section('content')
<div class = "row">
    <div class = "col-sm-2">
        
        <div class = "list-group">
        <ul>
            <h3>並べ替え</h3>
            <li class="list-group-item">
                <a href="/top?sortname=id">商品ID</a>
            </li>
            <li class="list-group-item">
                <a href="/top?sortname=name">商品名</a>
            </li>
            <li class="list-group-item">
                <a href="/top?sortname=price">価格</a>
            </li>
        </ul>
        <ul>
            <li class="list-group-item">
                <a href="/top?sortname={{$sortname}}&order=asc">昇順</a>
            </li>
            <li class="list-group-item">
                <a href="/top?sortname={{$sortname}}&order=desc">降順</a>
            </li>
        </ul>
        </div>
    </div>
<div class = "col">
    <div class ="container">
        @php
            $c = 0;
        @endphp
        @foreach ($products as $i => $product)
            @if ($c % 3 == 0)
                <div class = "row m-4 text-center" >        
            @endif
            <div class="col align-items-center bg-white" >
                    @if ($product->image == 0)
                    <a href= "/product/{{ $product->id}}">
                        <div class="image-col"><img src="/uploads/NO-IMAGE.png"  alt=""></div>
                    </a>    
                    @else
                    <a href= "/product/{{ $product->id}}">
                        <div class="image-col"><img src="/uploads/{{$product->image}}" alt=""></div>
                    </a>
                        
                    
                    @endif
                    <div ><a href= "/product/{{ $product->id}}">{{ $product->name}}</a></div>
                    <div>￥{{ $product->price}}</div>
                    <div>{{ $product->cpu}}</div>
            </div>
            @if ($c == 2 || $c == 5 ||$c == 8 )
                </div>
            @endif
        @php
            $c=$c+1;
        @endphp
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
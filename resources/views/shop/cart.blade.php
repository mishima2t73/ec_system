@extends('layouts.shop')
@section('content')
    カート
    <div class = "container">
        @foreach ($product as $i => $product)
        <div class="col align-items-center bg-white" >
            @if ($product->image == 0)
            <a href= "shop/product/{{ $product->id}}">
                <div class="image-col"><img src="/uploads/NO-IMAGE.png"  alt=""></div>
            </a>    
            @else
            <a href= "shop/product/{{ $product->id}}">
                <div class="image-col"><img src="/uploads/{{$product->image}}" alt=""></div>
            </a>
                
            
            @endif
            <div ><a href= "shop/product/{{ $product->id}}">{{ $product->name}}</a></div>
            <div>￥{{ $product->price}}</div>
            <div>{{ $product->cpu}}</div>
    </div>
        @endforeach
        <div class= "">
            
        </div>
    </div>
@endsection
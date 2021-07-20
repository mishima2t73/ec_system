@extends('layouts.shop')
 


@section('content')


<div class = "row">
    <div class = "col-sm-2">   
        <div class = "list-group">
        <ul>
            <h3>並べ替え</h3>
            <li class="list-group-item">
                <a href="{{route('top',['category'=>$category,'subcategory'=>$subcategory,'sortname'=>'id'])}}">商品ID</a>
            </li>
            <li class="list-group-item">
                <a href="{{route('top',['category'=>$category,'subcategory'=>$subcategory,'sortname'=>'name'])}}">商品名</a>
            </li>
            <li class="list-group-item">
                <a href="{{route('top',['category'=>$category,'subcategory'=>$subcategory,'sortname'=>'price'])}}">価格</a>
            </li>
        </ul>
        <ul>
            <li class="list-group-item">
                <a href="{{route('top',['category'=>$category,'subcategory'=>$subcategory,'sortname'=>$sortname,'order'=>'asc'])}}">昇順</a>
            </li>
            <li class="list-group-item">
                <a href="{{route('top',['category'=>$category,'subcategory'=>$subcategory,'sortname'=>$sortname,'order'=>'desc'])}}">降順</a>
            </li>
        
        <li class="list-group-item">

        <a href='../kensaku_index.blade.php'>検索🔍</a>

        </li>
        </ul>
        
        </div>
    </div>
<div class = "col">
    <div class ="container">
        <h3>中古PC </h3>
        <div>
            {{$category}}
        </div>
        <div class = "sort">
            @if ($sortname == 'id')
            商品ID
        @elseif($sortname == 'name')
            名前
        @else
            価格
        @endif

        @if ($order == "asc")
            昇順
        @else
            降順
        @endif
        
        </div>
        @php
            $c = 0;
        @endphp
        @foreach ($products as $i => $product)
            @if ($c % 3 == 0)
                <div class = "row m-4 text-center" >        
            @endif
            <div class="col-4 align-items-center bg-white" >
                    @if ($product->image == 0)
                    <a href= "shop/product/{{ $product->id}}">
                        <div class="image-col"><img src="/uploads/NO-IMAGE.png"  alt=""></div>
                    </a>    
                    @else
                    <a href= "shop/product/{{ $product->id}}">
                        <div class="image-col"><img  style="max-width: 110px" src="/uploads/{{$product->image}}" alt=""></div>
                    </a>
                    @endif
                    <div ><a href= "shop/product/{{ $product->id}}">{{ $product->name}}</a></div>
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
        
    </div>  
    <div class="">
        <div class = "row ">
            <div class = "col-md-5 offset-md-5 align-items-center">
                @if ($products->isEmpty()== false)
                {{$products->appends(['sort'=>$sortname,'order'=>$order])->links()}}    
                @else
                該当する商品がありません。
                @endif
                
            </div>
        </div>
    </div>
    </div>
</div>

@endsection
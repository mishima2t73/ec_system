@extends('layouts.shop')

@section('content')

    <main>
        <div class="container">
            <div class="jumbotton bg-white">
                <h1 class="text-center">商品詳細</h1>
                <h3 class="my-4 text-center">
                    @if(isset($product->product_name))
                        {{$product->product_name}}
                    @endif
                </h3>
                <div class="offset-sm-3">
                    <p class="offset-sm-6">
                        型番:
                        @if(isset($category_name->category_name))
                            {{$category_name->category_name}}
                        @endif
                    </p>
                    <p>商品説明</p>
                    <p>
                        @if(isset($product->description))
                            {{$product->price}}
                        @endif
                        円
                    </p>
                </div>
                
                {!! Form::open(['route'=>['addcart.post','class'=>'d-inline']])!!}
                {{Form::hidden('products_id',$product->id)}}
                {{Form::hidden('users_id',$user->id)}}
                <input ~~name="product_quentity"~~>

                <div class="form-row justify-content-center">
                {!! Form::larabel('prodqty','購入個数',['class'=>mt-1])!!}
                <div class="form-group">
                    {!!Form::submit('カートへ',['class'=>btn btn-primary])!!}
                </div>
            </div>
        {!!Form::clone()!!}

    <div>
<div>
</main>

@endsection
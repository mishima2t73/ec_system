@extends('layouts.app')

@section('content')
<div class ="container">
    <div>
        <h2>ショップ画面</h2>
    </div>
</div>
@foreach ($products as $product)
<div>
    <div><img src="" alt=""></div>
    <div><a href="/product/{{ $product->id}}">{{ $product->name}}
    </a></div>
</div>

@endforeach
@endsection
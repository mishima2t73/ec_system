
@extends('layouts.shop')

@section('content')
<div class="container">
    <div class = "bg-white m-3 p-4">
        <h3>アカウント情報</h3>
        <form action=""method = "post">
        <div class = "form-group p-3">
            <div class = "col p-3 bg-light">お名前：<input type="text"class = "form-control" value="{{ $user_data->name}}"></div>
            <div class = "col p-3 bg-light">メールアドレス：<input type="text"class = "form-control" value="{{ $user_data->email}}"> </div>
            <div class = "col p-3 bg-light">電話番号：<input type="text"class = "form-control" value="{{ $user_data2->tel}}"> </div>
        </div>
        </form>
        
    </div>
</div>
@endsection
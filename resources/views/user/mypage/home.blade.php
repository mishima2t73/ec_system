@extends('layouts.shop_simple')

@section('content')
<div class="container">

    <div class = "bg-white m-3 p-3">
        <h3>ホーム（仮）</h3>
        @if (session('flash_message_password'))
            <div class="alert alert-primary">
                {{ session('flash_message_password') }}
            </div>
        @endif
        <button type="submit" class="btn btn-secondary m-1"  onclick="location.href='{{route('user_account')}}'">
            アカウント情報
        </button>
        <button type="submit" class="btn btn-secondary m-1"  onclick="location.href='{{route('user_address')}}'">
            住所確認・変更
        </button>
        <button type="submit" class="btn btn-secondary m-1"  onclick="location.href=''">
            支払方法
        </button>
        <button type="submit" class="btn btn-secondary m-1"  onclick="location.href=''">
            注文履歴
        </button>
        <h3 class="my-3">お知らせ</h3>
        <div class="　bg-light w-50">
            
            <div class="list-group-item">
            <div class="m-1"><a href="">お知らせが</a></div>
            <div class="m-1"><a href="">表示されます</a></div>
            </div>
        </div>
    </div>
</div>
@endsection
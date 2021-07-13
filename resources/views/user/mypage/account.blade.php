@extends('layouts.shop_simple')

@section('content')
<div class="container">
    <div class = "bg-white m-3 p-4">
        <h3>アカウント情報</h3>
        @if (session('flash_message_account'))
            <div class="alert alert-primary">
                {{ session('flash_message_account') }}
            </div>
        @endif

        <main class="mt-4">
            @yield('content')
        </main>
        <div class = "list-group-item p-3">
            <div class = "col p-2">お名前：{{ $user_data->name}} </div>
            <div class = "col p-2">性別：{{ $user_data2->gender}} </div>
            <div class = "col p-2">メールアドレス：{{ $user_data->email}} </div>
            <div class = "col p-2">電話番号：{{ $user_data2->tel}} </div>
        </div>
        <div class = "list-group-item ">
            <button type="submit" class="btn btn-secondary m-1"  onclick="location.href='{{route('user_account_form')}}'">
                アカウント情報変更
            </button>
        </div>
        <div class = "list-group-item"> 
            <button type="submit" class="btn btn-secondary m-1"  onclick="location.href='{{route('user_password_form')}}'">
                パスワード変更
            </button>
        </div>
        <div class = "list-group-item">
            登録住所の変更は<a href="">こちら</a>
        </div>
    </div>
</div>
@endsection
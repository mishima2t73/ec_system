@extends('layouts.shop_simple')

@section('content')
<div class="container">
    <div class = "bg-white m-3 p-4">
        <h3>登録住所情報</h3>
        @if (session('flash_message_address'))
            <div class="alert alert-primary">
                {{ session('flash_message_address') }}
            </div>
        @endif

        <main class="mt-4">
            @yield('content')
        </main>
        <div class = "list-group-item p-3">
            <div class = "col p-2">〒{{ $user_address->post}} </div>
            <div class = "col p-2">{{ $user_address->prefectures}}{{ $user_address->city}}{{ $user_address->address}} </div>
            <div class = "col p-2">{{ $user_address->address2}} </div>
            <div class = "col p-2">電話番号：{{ $user_address->email}} </div>
            
        </div>
        <div class = "list-group-item ">
            <button type="submit" class="btn btn-secondary m-1"  onclick="location.href='{{route('user_adderss_up')}}'">
                住所変更
            </button>
        </div>
        
    </div>
</div>
@endsection
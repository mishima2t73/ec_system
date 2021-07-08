@extends('layouts.shop')

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
        <button type="submit" class="btn btn-secondary m-1"  onclick="location.href=''">
            住所確認・変更
        </button>
        <button type="submit" class="btn btn-secondary m-1"  onclick="location.href=''">
            支払方法
        </button>
        <button type="submit" class="btn btn-secondary m-1"  onclick="location.href=''">
            注文履歴
        </button>

    </div>
</div>
@endsection
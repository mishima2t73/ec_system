
@extends('layouts.shop')

@section('content')
<div class="container">
    <div class = "bg-white m-3 p-4">
        <h3>パスワード変更</h3>
        @if (session('flash_message_password'))
            <div class="alert alert-danger">
                {{ session('flash_message_password') }}
            </div>
        @endif
        <form action="{{route('user_password_update')}}"method = "post" onsubmit="return checkSubmit()">
            @csrf
        <div class = "form-group p-3">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class = "col p-3 bg-light">現在のパスワード：<input type="password"class = "form-control" name = "old_password" ></div>
            <div class = "col p-3 bg-light">新しいパスワード：<input type="password"class = "form-control" name = "password" > </div>
            <div class = "col p-3 bg-light">新しいパスワードをもう一度入力してください：<input type="password"class = "form-control" name = "password2"> </div>
            <button type="submit" class="btn btn-secondary m-1" >
                変更
            </button>
        </div>
        </form>
        
    </div>
</div>
<script>
    function checkSubmit(){
        if(window.confirm('変更してよろしいですか？')){
            return true;
        }else{
            return false;
            }
    }
</script>
@endsection
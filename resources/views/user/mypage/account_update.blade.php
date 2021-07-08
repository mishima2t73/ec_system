
@extends('layouts.shop')

@section('content')
<div class="container">
    <div class = "bg-white m-3 p-4">
        <h3>アカウント情報</h3>
        <form action="{{route('user_account_update')}}"method = "post" onsubmit="return checkSubmit()">
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
            <div class = "col p-3 bg-light">お名前：<input type="text"class = "form-control" name = "name" value="{{ $user_data->name}}"></div>
            <div class = "col p-3 bg-light">メールアドレス：<input type="text"class = "form-control" name = "email" value="{{ $user_data->email}}"> </div>
            <div class = "col p-3 bg-light">電話番号：<input type="text"class = "form-control" name = "tel" value="{{ $user_data2->tel}}"> </div>
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
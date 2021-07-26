@extends('layouts.app')

@section('content')
<div class ="container">
    <div class="maker-list p-3">
        <h2 class="pt-3">メーカー追加</h2>
        メーカー一覧
        <ul class = "list-goup w-50" >
        @foreach ($makerlist as $maker)
            <li class="list-group-item">{{$maker->value}}</li>
        @endforeach
        </ul>
        追加 
        <form action="{{route('product_list_add')}}" method="post" class="w-50" onsubmit="return checkSubmit('追加')" >
            @csrf
            <input type="hidden" name="category" value = "maker">
            <input type="text" class="form-control  m-3 p-3" name = "value">
            ショップのカテゴリー一覧に表示しますか？
            <div class="form-check">
                <input type="radio" name="display" value="1" class="form-check-input"id = "yes" checked>
                <label for="yes" class="form-check-label">はい</label>
            </div>
            <div class="form-check">
                <input type="radio" name="display" value="0" class="form-check-input"id = "no">
                <label for="no" class="form-check-label">いいえ</label>
            </div>
            
            <button type="submit" class ="btn btn-primary m-3 p-3" >カテゴリー登録</button>
        </form>
        <h2 class="pt-3">カテゴリー削除</h3>
        <form action="{{route("product_list_delete")}}" method="post" onsubmit="return checkSubmit('削除')">
            @csrf
            削除したいメーカーを選択してください。
            <input type="hidden" name="category" value = "maker" >
            <select  name = "id" class="form-control w-25" style="">
                @foreach ($makerlist as $maker)
            <option value="{{$maker->id}}">{{$maker->value}}</option>
            @endforeach
            </select>
            <button type="submit" class ="btn btn-primary m-3 p-3" >カテゴリー削除</button>
        </form>
    </div>

    <div class="os-list">
        <h2 class="pt-3">OS追加</h2>
        <ul class = "list-goup w-50" >
            @foreach ($oslist as $os)
                <li class="list-group-item">{{$os->value}}</li>
            @endforeach
            </ul>
        <form action="{{route('product_list_add')}}"method = "post">
            @csrf
            <input type="hidden" name="category" value = "os">
            <input type="text" class="form-control  m-3 p-3" name = "value">
            ショップのOSカテゴリー一覧に表示しますか？
            <div class="form-check">
                <input type="radio" name="display" value="1" class="form-check-input"id = "yes_2" checked>
                <label for="yes_2" class="form-check-label">はい</label>
            </div>
            <div class="form-check">
                <input type="radio" name="display" value="0" class="form-check-input"id = "no_2">
                <label for="no_2" class="form-check-label">いいえ</label>
            </div>
            <button type="submit" class ="btn btn-primary m-3 p-3" >カテゴリー登録</button>
        </form>
        <h3 class="pt-3">OSカテゴリー削除</h3>
        <form action="{{route("product_list_delete")}}" method="post" onsubmit="return checkSubmit('削除')">
            @csrf
            削除したいOSを選択してください。
            <input type="hidden" name="category" value = "os" >
            <select  name="id" class="form-control w-25" style="">
                @foreach ($oslist as $os)
            <option value="{{$os->id}}">{{$os->value}}</option>
            @endforeach
            </select>
            <button type="submit" class ="btn btn-primary m-3 p-3" >カテゴリー削除</button>
        </form>
    </div>
</div>
<script>
    function checkSubmit($sub){
        if(window.confirm($sub + 'してよろしいですか？')){
            return true;
        }else{
            return false;
            }
    }
</script>
@endsection
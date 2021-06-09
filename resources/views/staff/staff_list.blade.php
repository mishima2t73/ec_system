@Auth
@extends('layouts.app')

@section('content')
   
<div class ="container-fluid" style="width:90%">
    <div class = "row">
        <div class = "col-sm-2">
            
            <div class = "list-group">
            <ul>
                <h3>並べ替え</h3>
                <li class="list-group-item">
                    <a href="/staff/staff_list?sortname=id">スタッフID</a>
                </li>
                <li class="list-group-item">
                    <a href="/staff/staff_list?sortname=name">名前</a>
                </li>
            </ul>
            <ul>
                <li class="list-group-item">
                    <a href="/staff/staff_list?sortname={{$sortname}}&order=asc">昇順</a>
                </li>
                <li class="list-group-item">
                    <a href="/staff/staff_list?sortname={{$sortname}}&order=desc">降順</a>
                </li>
            </ul>
            </div>
        </div>
    <div class = "col">
    <h2>スタッフ一覧</h2>
    <button type="submit" class="btn btn-secondary m-1" onclick="location.href='{{ route('register') }}'">
        スタッフ登録
    </button>
    @foreach ($staffs as $staff)
    <div class = "list-group-item">
        <div class = "row">        
            <div class = "col-sm-1">番号：{{ $staff->id}} </div>
            <div class = "col-sm-2"><a href="/staff/{{ $staff->id}}"  >
                {{ $staff->name}}
            </a></div>
            <div class = "col-sm-3">メールアドレス:{{ $staff->email}}</div>
            <div class = "col-sm-2">登録日:{{ $staff->created_at}}:</div>
            <div class = "col-sm-2">更新日:{{ $staff->updated_at}}</div>
            <div class = "col-sm-1">
                    <button type="submit" class = "btn btn-secondary m-1" onclick="location.href='/staff/update/{{$staff->id}}'">更新</button>
                </div>
                
            <div class = "col-sm-1">
            <form action="#" method="post" onsubmit="return checkDelete()">
                @csrf
                <button type="submit" class = "btn btn-danger">削除</button>
            </form>
            </div>
        </div>
    
    </div>
@endforeach

    <div class = "col-md-4 offset-md-4">
        {{$staffs->appends(['sort'=>$sortname,'order'=>$order])->links()}}
    </div>
   
</div>
</div>
<script>
    function checkDelete(){
        if(window.confirm('商品を削除してよろしいですか？')){
            return true;
        }else{
            return false;
            }
    }
</script>
@endsection
@endAuth
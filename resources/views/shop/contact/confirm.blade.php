@extends('layouts.shop')
@section('content')
<div class="container ">
    <h2>お問い合わせ 確認画面</h2>
    <p>～説明～</p>
     <form method="POST" class = "bg-white">
        @csrf
         <div class="form-row ">
             <div class = "col-3">
                <label for="lastName">名字:</label>
                {{ $request->last_name}}
                <input type="hidden" name = "last_name" value="{{ $request->last_name}}">
             </div>
             <div class = "col-3">
                <label for="firstName">名前:</label>
                {{ $request->first_name}}
                <input type="hidden" name = "first_name" value="{{ $request->first_name}}">
             </div>
         </div>
         <br>
         <div class = "form-group">
             <div class="">
                <label for="email">email:</label>
                {{ $request->email}}
                <input type="hidden" name = "email" value="{{ $request->email}}">
             </div>
         </div>
         <div class = "form-group">
             <label for="Textarea">お問い合わせ内容</label><br>
             {{ $request->note}}
             <input type="hidden" name = "note" value="{{ $request->note}}">
        </div>
         <div class = "from-group row">
            <div class = "col">
                <button type="submit" class = "btn btn-primary btn-block">確認</button>
            </div>
         </div>
     </form>
</div>
@endsection

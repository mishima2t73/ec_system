@extends('layouts.shop')
@section('content')
<div class="container">
    <h2>お問い合わせ</h2>
    <p>～説明～</p>
     <form method="POST">
         {{method_field('patch')}}
        @csrf
         <div class="form-row">
             <div class = "col-3">
                <label for="lastName">名字</label>
                <input type="text" name = "last_name" class = "form-control" id = "lastName" placeholder = "名字" required>
             </div>
             <div class = "col-3">
                <label for="firstName">名前</label>
                <input type="text" name = "first_name" class = "form-control" id = "firstName" placeholder = "名前" required>
             </div>
         </div>
         <br>
         <div class = "form-group">
             <div class="">
                <label for="email">email</label>
                <input type="text" name = "email" class="form-control" id = "email">
             </div>
         </div>
         <div class = "form-group">
             <label for="Textarea">お問い合わせ内容</label>
             <textarea class="form-control" name="note" id="Textarea" cols="30" rows="10"></textarea>
         </div>
         <div class = "from-group row">
            <div class = "col">
                <button type="submit" class = "btn btn-primary btn-block">確認</button>
            </div>
         </div>
     </form>
</div>
@endsection

@extends('layouts.shop')
@section('content')
<div class="container">
     <form method = "post" action="">
        @csrf
         <div class="form-row">
             <div class = "col">
                <label for="lastName">名字</label>
                <input type="text" name = "last_name" class = "form-control" id = "lastName" placeholder = "名字" required>
             </div>
             <div class = "col">
                <label for="firstName">名前</label>
                <input type="text" name = "first_name" class = "form-control" id = "firstName" placeholder = "名前" required>
             </div>
         </div>

         <div class = "form-group">
             <label for="Textarea">お問い合わせ</label>
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

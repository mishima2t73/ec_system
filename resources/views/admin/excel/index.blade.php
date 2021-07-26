@extends('layouts.admin')

@section('content')
<div class="container bg-white">
    <h2>アップロード、ダウンロード</h2>
    <p>excelファイルを使用した、スタッフの追加や、ＤＢデータのダウンロードができます。</p>
    <h3 class="">スタッフ</h3>
    <h4>一括追加</h4>
    <form method="POST" action="{{route('excel_import')}}" enctype="multipart/form-data" class="">
        @csrf
        <div class="form-group">
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="inputFile">
                <label class="custom-file-label" for="inputFile">Choose file</label>
            </div>
        </div>
        <button type="submit" class="btn btn-secondary">アップロード</button>
    </form>
    <br>
    <h4>エクスポート</h4>
    <a href="{{route('staff_export')}}">ダウンロード</a>
    
</div>
   
@endsection
@extends('layouts.admin')

@section('content')
<div class="container bg-white">
    <h2>アップロード、ダウンロード</h2>
    <p>excelファイルを使用した、スタッフの追加や、ＤＢデータのダウンロードができます。</p>
    <div>
        <h3 class="">・スタッフ</h3>
        <h4>追加</h4>
        <form method="POST" action="{{route('staff_import')}}" enctype="multipart/form-data" class="">
            @csrf
            <div class="form-group">
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="inputFile" name = "inputFile">
                    <label class="custom-file-label" for="inputFile">Choose file</label>
                </div>
            </div>
            <button type="submit" class="btn btn-secondary">アップロード</button>
        </form>
        <br>
        <h4>書き出し</h4>
        <form action="{{route('staff_export')}}" method="post">
            @csrf
        <select name="exformat" id="">
            <option value="xlsx">xlsx(excel)</option>
            <option value="csv">csv</option>
            <option value="xls">xls</option>
            <option value="html">html</option>
        </select>
        <button class="btn">ダウンロード</button>    
        </form>
        <a href="{{route('staff_export')}}">ダウンロード</a>
    </div>
   <br>
    <div>
        <h3 class="">・商品一覧</h3>
        <h4>追加</h4>
        <form method="POST" action="{{route('product_import')}}" enctype="multipart/form-data" class="">
            @csrf
            <div class="form-group">
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="inputFile" name = "inputFile">
                    <label class="custom-file-label" for="inputFile">Choose file</label>
                </div>
            </div>
            <button type="submit" class="btn btn-secondary">アップロード</button>
        </form>
        <br>
        <h4>書き出し</h4>
        <form action="{{route('product_export')}}" method="post">
            @csrf
        <select name="exformat" id="">
            <option value="xlsx">xlsx(excel)</option>
            <option value="csv">csv</option>
            <option value="xls">xls</option>
            <option value="html">html</option>
        </select>
        <button class="btn">ダウンロード</button>    
        </form>
        
    </div>
    <br>
    <div>
        <h3 class="">・商品売上</h3>
        <h4>追加</h4>
        <form method="POST" action="{{route('product_sales_import')}}" enctype="multipart/form-data" class="">
            @csrf
            <div class="form-group">
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="inputFile" name = "inputFile">
                    <label class="custom-file-label" for="inputFile">Choose file</label>
                </div>
            </div>
            <button type="submit" class="btn btn-secondary">アップロード</button>
        </form>
        <br>
        <h4>書き出し</h4>
        <form action="{{route('product_sales_export')}}" method="post">
            @csrf
        <select name="exformat" id="">
            <option value="xlsx">xlsx(excel)</option>
            <option value="csv">csv</option>
            <option value="xls">xls</option>
            <option value="html">html</option>
        </select>
        <button class="btn">ダウンロード</button>    
        </form>
        
    </div>
    <br>
    <div>
        <h3 class="">・売上詳細</h3>
        <h4>追加</h4>
        <form method="POST" action="{{route('product_sales_details_import')}}" enctype="multipart/form-data" class="">
            @csrf
            <div class="form-group">
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="inputFile" name = "inputFile">
                    <label class="custom-file-label" for="inputFile">Choose file</label>
                </div>
            </div>
            <button type="submit" class="btn btn-secondary">アップロード</button>
        </form>
        <br>
        <h4>書き出し</h4>
        <form action="{{route('product_sales_details_export')}}" method="post">
            @csrf
        <select name="exformat" id="">
            <option value="xlsx">xlsx(excel)</option>
            <option value="csv">csv</option>
            <option value="xls">xls</option>
            <option value="html">html</option>
        </select>
        <button class="btn">ダウンロード</button>    
        </form>
        
    </div>
</div>
   
@endsection
@extends('layouts.app')

@section('content')
<div class ="container">
    <h2>商品登録</h2>
    <form enctype="multipart/form-data" method="POST" action="{{route('product.product_store')}}" onsubmit="return checkSubmit()">
        @csrf
        <div class = "form-group">
            <label for="name">商品名</label>
            <input id = "name" name = "name" type="text" class = "form-control">
            
            @if ($errors->has('name'))
                <div class = "test-danger">
                    {{$errors->first('name')}}
                </div>
            @endif
        </div>
        <div class = row>
            <div class = "form-group col">
                <label for="maker">メーカー</label>
                <input id = "maker" name ="maker" type="text" class = "form-control">
                @if ($errors->has('maker'))
                    <div class = "test-danger">
                        {{$errors->first('maker')}}
                    </div>
                @endif
            </div>
            <div class = "form-group col">
                <label for="model_id">型番</label>
                <input id = "model_id" name = "model_id" type="text" class = "form-control">
                @if ($errors->has('model_id'))
                    <div class = "test-danger">
                        {{$errors->first('model_id')}}
                    </div>
                @endif
            </div>
            <div class = "form-group col">
                <label for="os">OS</label>
                <input id = "os" type="text" name ="os" class = "form-control">
                @if ($errors->has('os'))
                    <div class = "test-danger">
                        {{$errors->first('os')}}
                    </div>
                @endif
            </div>
        </div>
        <div class = "row">
            <div class = "form-group col">
                <label for="price">価格</label>
                <div style="width:30%">
                    <input id = "price" name = "price" type="text" class = "form-control">
                </div>
                @if ($errors->has('price'))
                    <div class = "test-danger">
                        {{$errors->first('price')}}
                    </div>
                @endif
            </div>
            <div class = "form-group col">
                <label for="stock">在庫</label>
                <div style="width:30%">
                    <input id = "stock" name = "stock" type="text" class = "form-control">
                </div>
                @if ($errors->has('stock'))
                    <div class = "test-danger">
                        {{$errors->first('stock')}}
                    </div>
                @endif
            </div>
        </div>

        <div class = "row">
            <div class = "form-group col">
                <label for="cpu">CPU</label>
                    <input id = "cpu" name = "cpu" type="text" class = "form-control">
                @if ($errors->has('cpu'))
                    <div class = "test-danger">
                        {{$errors->first('cpu')}}
                    </div>
                @endif
            </div>
            <div class = "form-group col">
                <label for="memory">メモリ</label>               
                    <input id = "memory" name = "memory" type="text" class = "form-control">
                @if ($errors->has('memory'))
                    <div class = "test-danger">
                        {{$errors->first('memory')}}
                    </div>
                @endif
            </div>
            <div class = "form-group col">
                <label for="graphic">グラフィック</label>
                    <input id = "graphic" name = "graphic" type="text" class = "form-control">
                @if ($errors->has('graphic'))
                    <div class = "test-danger">
                        {{$errors->first('graphic')}}
                    </div>
                @endif
            </div>
        </div>
        <div class = "row">
            <div class="form-group col">
                <label for="hdd_ssd">HDD SSD</label>
                <select class="form-control" id="hdd_ssd" name = "hdd_ssd">
                  <option value = "HDD">HDD</option>
                  <option value = "SSD">SSD</option>
                </select>
              </div>
            <div class = "form-group col">
                <label for="hdd_ssd_space">容量</label>
                    <input id = "hdd_ssd_space" name = "hdd_ssd_space" type="text" class = "form-control">
                @if ($errors->has('hdd_ssd_space'))
                    <div class = "test-danger">
                        {{$errors->first('hdd_ssd_space')}}
                    </div>
                @endif
            </div>
            <div class = "form-group col">
                <label for="display">ディスプレイ</label>
                    <input id = "display" name = "display" type="text" class = "form-control">
                @if ($errors->has('display'))
                    <div class = "test-danger">
                        {{$errors->first('display')}}
                    </div>
                @endif
            </div>
            <div class = "form-group col">
                <label for="drive">ドライブ</label>
                    <input id = "drive" name = "drive" type="text" class = "form-control">
                @if ($errors->has('drive'))
                    <div class = "test-danger">
                        {{$errors->first('drive')}}
                    </div>
                @endif
            </div>
        </div>
        <div class = "row">
            <div class = "form-group col">
                <label for="attached">付属品</label>
                    <input id = "attached" name = "attached" type="text" class = "form-control">
                @if ($errors->has('attached'))
                    <div class = "test-danger">
                        {{$errors->first('attached')}}
                    </div>
                @endif
            </div>
            <div class = "form-group col">
                <label for="condition">PCタイプ</label>
                <select class="form-control" id="pctype" name = "pctype">
                    <option>デスクトップPC</option>
                    <option>ノートPC</option>
                  </select>
            </div>
        </div>
        <div class = "form-group">
            <label for="condition">状態</label>
            <select class="form-control" id="condition" name = "condition">
                <option>良</option>
                <option>問題有</option>
              </select>
        </div>

        <div class = "form-group">
            <label for="remarks">備考</label>
            <textarea  id="remarks" name = "remarks" class = "form-control"  rows="3"></textarea>
            @if ($errors->has('remarks'))
                <div class = "test-danger">
                    {{$errors->first('remarks')}}
                </div>
            @endif
        </div>

        <div class = "form-group ">
                <label for="new_product">新着商品表示</label>
                <select class="form-control" id="new_product" name = "new_product" style= "width:200px;">
                    <option value = "0">表示する</option>
                    <option value = "1">表示しない</option>
                  </select>
        </div>
        <div class = "form-group ">
            <label for="image">画像選択（仮）</label>
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="image" name ="image" aria-describedby="inputGroupFileAddon01">
                <label class="custom-file-label" for="inputGroupFile">Choose file</label>
              </div>
        </div>
        <div class="imagePreview"></div>
                    <div class="input-group">
                        <label class="input-group-btn">
                            <span class="btn btn-primary">
                                Choose File<input type="file" style="display:none" class="uploadFile">
                            </span>
                        </label>
                        <input type="text" class="form-control" readonly="">
                    </div>
    
          <input type="hidden" name = "staff_id" value="{{Auth::id()}}">
        <div>
            <div>
                <label for="date">公開日</label>
                <input type="date" name="release_at" id="date"　value= {{date('Y-m-d')}}>
            </div>
        </div>
        <div class="mt-5">
            <button type="submit" class ="btn btn-primary">登録</button>
        </div>
     
    </form>
</div>
<script>
    function checkSubmit(){
        if(window.confirm('登録してよろしいですか？')){
            return true;
        }else{
            return false;
            }
    }
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script>
    $(document).on('change', ':file', function() {
        var input = $(this),
        numFiles = input.get(0).files ? input.get(0).files.length : 1,
        label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
        input.parent().parent().next(':text').val(label);

        var files = !!this.files ? this.files : [];
        if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support
        if (/^image/.test( files[0].type)){ // only image file
            var reader = new FileReader(); // instance of the FileReader
            reader.readAsDataURL(files[0]); // read the local file
            reader.onloadend = function(){ // set image data as background of div
                input.parent().parent().parent().prev('.imagePreview').css("background-image", "url("+this.result+")");
            }
        }
    });
    </script>
@endsection

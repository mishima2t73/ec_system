@extends('layouts.app')

@section('content')
<div class ="container">

    <h2>商品情報更新</h2>
    <div class = "col-sm-2">
        <button type="submit" class="btn btn-secondary m-1" onclick="location.href='/product/product_list'" >商品一覧へ</button>
    </div>
        <div class = "list-group-item">
        <form action="{{route('product_update')}}" method="POST">
            @csrf
            <div>
                
                <div >商品番号：{{ $product->id}}
                <input type="hidden" name="id" value="{{$product->id}}">
                </div>
                <div class="input-group-prepend">
                    <div>商品名<input type="text"  name="name" id="name" value= "{{ $product->name}}"class="form-control">
                    </div>
                </div>
                <div class="input-group-prepend">
                    <div>メーカー<input type="text" list = "maker" name="maker" id="maker" value= "{{ $product->maker}}"class="form-control">
                    </div>例：HP Panasonic 東芝 Dell Lenovo Apple </div>
                <div class="input-group-prepend">
                  <div>型番<input type="text" name="model_id" id="model_id" value= "{{ $product->model_id}}"class="form-control"></div></div>
                <div class="input-group-prepend">
                   <div>価格<input type="text" name="price" id="price" value= "{{ $product->price}}"class="form-control"></div></div>
                <div class="input-group-prepend">
                    <div>在庫<input type="text" name="stock" id="stock" value= "{{ $product->stock}}"class="form-control"></div></div>
                <div class="input-group-prepend">
                  <div >CPU<input type="text" name="cpu" id="cpu" value= "{{ $product->cpu}}"class="form-control"></div></div>
                <div class="input-group-prepend">
                  <div >メモリ:<input type="text" name="memory" id="memory" value= "{{ $product->memory}}"class="form-control"></div></div>
                <div class="from-group">
                <label for="condition">HDD/SSD</label>
                <select class="form-control" id="hdd_ssd" name = "hdd_ssd" value = "{{ $product->hdd_ssd}}">
                    <option 
                    @if ($product->hdd_ssd == "HDD")
                            selectid="selected"
                    @endif>HDD
                </option>
                    <option
                    @if ($product->hdd_ssd == "SSD")
                            selected="selected"
                    @endif
                    >SSD</option>
                    </select>
                </div>
                <div class="input-group-prepend">
                
                   <div >容量<input type="text" name="hdd_ssd_space" id="hdd_ssd_space" value= "{{ $product->hdd_ssd_space}}"class="form-control"></div></div>
                <div class="input-group-prepend">
                    <div >ドライブ<input type="text" name="drive" id="drive" value= "{{ $product->drive}}"class="form-control"></div></div>
                <div class="input-group-prepend">
                    <div >ディスプレイ<input type="text" name="display" id="display" value= "{{ $product->display}}"class="form-control"></div></div>
                <div class="from-group">
                    <label for="condition">PCタイプ</label>
                    <select class="form-control" id="pctype" name = "pctype" value = "{{ $product->pctype}}">
                        <option>デスクトップPC</option>
                        <option>ノートPC</option>
                      </select>
                </div>
                <div class = "form-group">
                    <label for="remarks">備考</label>
                    <textarea  id="remarks" name = "remarks" class = "form-control"  rows="3">{{$product->remarks}}</textarea>
                    @if ($errors->has('remarks'))
                        <div class = "test-danger">
                            {{$errors->first('remarks')}}
                        </div>
                    @endif
                </div>
                <div >登録日:{{ $product->created_at}}:</div>
                <div >更新日:{{ $product->updated_at}}</div>
                <div class = "col-sm-2">
                    <button type="submit" class="btn btn-secondary m-1" >変更</button>
                </div>
                </div>
            </div>
        </div>
            <!-- <a href="/product/{{ $product->id}}"  >{{ $product->name}} -->
        </form>

        <form action="" method="post">
            <div class = "form-group">
            <div class = "col"><button type="submit" class="btn btn-secondary m-1" onclick="">削除</button>
            </div>
        </form>
        </div>
</div>
@endsection

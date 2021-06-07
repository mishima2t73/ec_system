@extends('layouts.app')

@section('content')
<div class ="container-fluid" style="width:90%">
    <div class="row justify-content-center" >
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">管理画面トップ</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h3>売上</h3>
                    <div class = "row m-3 border-bottom">

                        <div class = "col-sm-4">今日</div><div class = "col-sm-4">個数：1</div><div class="col-sm-4">金額：10000</div>
                        
                        <div class = "col-sm-4">昨日</div><div class = "col-sm-4">個数：2</div><div class="col-sm-4">金額：63292</div>

                        <div class = "col-sm-4">今月</div><div class = "col-sm-4">個数：32</div><div class="col-sm-4">金額：142000</div>
                    </div>
                    <button type="submit" class="btn btn-secondary m-1" onclick="location.href=''">
                        売上詳細
                    </button>

                    <h3 class ="h3 mt-3">商品管理</h3>
                    <div class="row">
                       <div class="col-2">
                            <button type="submit" class="btn btn-secondary m-1" onclick="location.href='/product/product_add'">
                                商品登録
                            </button>
                        </div>
                        <div class="col-2">
                            <button type="submit" class="btn btn-secondary m-1" onclick="location.href='/product/product_list'">
                                商品一覧
                            </button>
                        </div>
                    </div>

                    <h3 class ="h3 mt-3">スタッフ</h3>
                    <div class="row">
                        <div class="col-sm-2" style="padding-right: 10px">
                            <button type="submit" class="btn btn-secondary m-1"  onclick="location.href='{{ route('register') }}'">
                                スタッフ一覧
                            </button>
                        </div>
                        <div class="col-sm-2">
                            <button type="submit" class="btn btn-secondary m-1" onclick="location.href='{{ route('register') }}'">
                                スタッフ登録
                            </button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

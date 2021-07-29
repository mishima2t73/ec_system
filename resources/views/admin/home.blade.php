@extends('layouts.admin')

@section('content')
<div class ="container-fluid" style="width:90%">
    <div class="row justify-content-center" >
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">ECショップ管理システム</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div>
                        <h3>売上</h3>
                        <div class = "row m-3 border-bottom">

                            <div class = "col-sm-4">今日</div><div class = "col-sm-4">個数：{{$today_count}}</div><div class="col-sm-4" id = "today_sales">金額：{{$today_sales}}円</div>
                            
                            <div class = "col-sm-4">昨日</div><div class = "col-sm-4">個数：{{$yesterday_count}}</div><div class="col-sm-4" id = "yesterday_sales">金額：{{$yesterday_sales}}円</div>

                            <div class = "col-sm-4">今月</div><div class = "col-sm-4">個数：{{$month_count}}</div><div class="col-sm-4" id = "month_sales">金額：{{$month_sales}}円</div>
                            <input type="hidden" id="month_sales_1" value = "{{$sales[0]}}">
                            <input type="hidden" id="month_sales_2" value = "{{$sales[1]}}">
                            <input type="hidden" id="month_sales_3" value = "{{$sales[2]}}">
                            <input type="hidden" id="month_sales_4" value = "{{$sales[3]}}">
                         
                        </div>
                        <button type="submit" class="btn btn-secondary m-1" onclick="location.href='{{route('sales_show')}}'">
                            売上一覧・注文明細
                        </button>
                        <button type="submit" class="btn btn-secondary m-1" onclick="location.href=''">
                            売上分析
                        </button>
                    </div>
                    <div class="row">
                        <div class = "col-5">
                            <h3 class ="h3 mt-3">商品管理</h3>
                            <div class="row">
                            <div class="col-sm-5">
                                    <button type="submit" class="btn btn-secondary m-1" onclick="location.href='{{route('product.product_add')}}'">
                                        商品登録
                                    </button>
                                </div>
                                <div class="col-sm-5">
                                    <button type="submit" class="btn btn-secondary m-1" onclick="location.href='{{route('product.product_list')}}'">
                                        商品一覧
                                    </button>
                                </div>
                            </div>
                            <h3 class ="h3 mt-3">配送設定</h3>
                            <div class="row">
                                <div class="col-sm-5" style="padding-right: 10px">
                                    <button type="submit" class="btn btn-secondary m-1"  onclick="location.href='{{ route('staff_list') }}'">
                                        配送設定一覧
                                    </button>
                                </div>
                                <div class="col-sm-5">
                                    <button type="submit" class="btn btn-secondary m-1" onclick="location.href='{{ route('admin.register') }}'">
                                        日程登録
                                    </button>
                                </div>

                            </div>
                            <h3 class ="h3 mt-3">スタッフ</h3>
                            <div class="row">
                                <div class="col-sm-5" style="padding-right: 10px">
                                    <button type="submit" class="btn btn-secondary m-1"  onclick="location.href='{{ route('staff_list') }}'">
                                        スタッフ一覧
                                    </button>
                                </div>
                                <div class="col-sm-5">
                                    <button type="submit" class="btn btn-secondary m-1" onclick="location.href='{{ route('admin.register') }}'">
                                        スタッフ登録
                                    </button>
                                </div>
                            </div>
                            <h3 class ="h3 mt-3">顧客関連</h3>
                            <div class="row">
                                <div class="col-sm-5" style="padding-right: 10px">
                                    <button type="submit" class="btn btn-secondary m-1"  onclick="location.href='{{ route('user_list') }}'">
                                        顧客一覧
                                    </button>
                                </div>
                            </div>
                            <h3 class="h3 mt-3">各種データ管理</h3>
                            <div class="row">
                                <div class="col-sm-8">
                                <button type="submit" class="btn btn-secondary m-1" onclick="location.href='{{ route('excel_index') }}'">
                                    エクスポート・インポート
                                </button>
                                </div>
                            </div>
                        </div>
                        <div class = "col-6">
                            <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.4/Chart.min.js"></script>
                            <div>
                                <canvas id="stage">

                                </canvas>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
            
        </div>
        
    </div>
    
</div>
@endsection

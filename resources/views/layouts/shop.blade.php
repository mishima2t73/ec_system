<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', '@sol-management') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="{{ asset('css/shoptop.css') }}" rel="stylesheet">

    <!-- Styles -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body style="background-color:#e5e9ee">
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                
                <a class="navbar-brand" href="{{ url('/top') }}">
                    {{ config('app.name', '@sol-management') }}
                </a>
                
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->

                    <ul class = "navbar-nav ml-auto">
                        <li class = "nav-item"> 
                            <a class = "nav-link" href="{{ url('/top') }}">商品一覧</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                メーカー
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                @foreach ($makerlist as $item)
                                <a class="dropdown-item" href="{{route('top',['category'=>'maker','subcategory' => $item->value])}}">{{$item->value}}</a>    
                                @endforeach
                                <a class="dropdown-item" href="{{route('top',['category'=>'maker','subcategory' => 'その他'])}}">その他</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                価格
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{route('top',['category'=>'price','subcategory' => [0,30000]])}}">～3万</a>
                                <a class="dropdown-item" href="{{route('top',['category'=>'price','subcategory' => [30000,100000]])}}">3万～10万</a>
                                <a class="dropdown-item" href="{{route('top',['category'=>'price','subcategory' => [100000,1000000]])}}">10万</a>
                                
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                画面サイズ
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{route('top',['category'=>'display','subcategory' => [11.0,13.0]])}}">11～12.5</a>
                                <a class="dropdown-item" href="{{route('top',['category'=>'display','subcategory' => [13.0,14.0]])}}">13～14</a>
                                <a class="dropdown-item" href="{{route('top',['category'=>'display','subcategory' => [15.0,16.0]])}}">15～15.6</a>
                                <a class="dropdown-item" href="{{route('top',['category'=>'display','subcategory' => [17.0,30.0]])}}">17～</a>
                                
                            </div>
                        </li>
                    
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                CPU
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{route('top',['category'=>'cpu','subcategory' => "celeron"])}}">celeron</a>
                                <a class="dropdown-item" href="{{route('top',['category'=>'cpu','subcategory' => "i3"])}}">Core i3</a>
                                <a class="dropdown-item" href="{{route('top',['category'=>'cpu','subcategory' => "i5"])}}">Core i5</a>
                                <a class="dropdown-item" href="{{route('top',['category'=>'cpu','subcategory' => "i7"])}}">Core i7</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{route('top',['category'=>'cpu','subcategory' => "AMD"])}}">Ryzen</a>
                                
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                HDD/SSD
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{route('top',['category'=>'hdd_ssd_space','subcategory' => [32,128]])}}">～128GB</a>
                                <a class="dropdown-item" href="{{route('top',['category'=>'hdd_ssd_space','subcategory' => [129,256]])}}">128GB～256GB</a>
                                <a class="dropdown-item" href="{{route('top',['category'=>'hdd_ssd_space','subcategory' => [256,480]])}}">256GB～480GB</a>
                                <a class="dropdown-item" href="{{route('top',['category'=>'hdd_ssd_space','subcategory' => [480,0]])}}">480GB～</a>
                                <a class="dropdown-item" href="{{route('top',['category'=>'hdd_ssd_space','subcategory' => [1,20]])}}">1TB～</a>
                                
                            </div>
                        </li>
                    </ul>
                    <ul class="navbar-nav mr-auto">

                    </ul>
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <a class="nav-link" href="{{route('show_cart')}}"><span class="material-icons-outlined">
                            <img src="/icon/outline_shopping_cart_black_24dp.png" alt="cart">
                            </span></a>
                        @if (Auth()->check())
                        <a class="nav-link" href="{{route('user_mypage')}}">
                            Mypage
                        </a>
                        @endif

                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('user.login') }}">{{ __('ログイン') }}</a>
                            </li>
                            @if (Route::has('user.register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('user.register') }}">{{ __('登録') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} さん<span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('user.logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('user.logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                        
                    </ul>
                </div>
            </div>
            
        </nav>

        <main class="py-5">
            @yield('content')
        </main>
    

</div>
<footer class="fixed-bottom bg-white">
    <div class="container-fluid">
        <div class="row justify-content-center" style="margin-right:0px,margin-left:0px;">
            <div class="col-2 text-center "><a class = "btn" href="{{route('company')}}">会社概要</a></div><div class="col-2 text-center"><a class = "btn" href="{{route('shop_contact')}}">お問い合わせ</a></div>
            <div class="col-2 text-center "><a class = "btn" href="{{route('shop_info')}}">送料</a></div><div class="col-2 text-center"><a class = "btn" href="{{route('shop_info')}}">支払方法</a></div>
        </div>
    </div>
    
</footer>
<!--
<footer class="footer bg-white border-top"　>
    <div class= "container ">
        <div class = "row  ">
            <div class="col-3 text-center ">会社概要</div>
            <div class ="col-3 text-center">お問い合わせ</div>
            <div class = "col-3 text-center">送料</div>
            <div class = "col-3 text-center">支払方法</div>
        </div>
    </div>
</footer>
-->
</body>
</html>

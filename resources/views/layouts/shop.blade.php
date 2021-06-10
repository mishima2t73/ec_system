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
<body>
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
                        <li class = "nav-link">商品一覧</li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                メーカー
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#">dell</a>
                                <a class="dropdown-item" href="#">Panasonic</a>
                                <a class="dropdown-item" href="#">Dynabook</a>
                                <div class="dropdown-divider"></div>
                                
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                価格
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#">～2万</a>
                                <a class="dropdown-item" href="#">3万～10万</a>
                                <a class="dropdown-item" href="#">10万～</a>
                                <div class="dropdown-divider"></div>
                                
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                画面サイズ
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#">11～12.5</a>
                                <a class="dropdown-item" href="#">13～14</a>
                                <a class="dropdown-item" href="#">15～15.6</a>
                                <a class="dropdown-item" href="#">17～</a>
                                <div class="dropdown-divider"></div>
                                
                            </div>
                        </li>
                    
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                CPU
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#">Core i3</a>
                                <a class="dropdown-item" href="#">Core i5</a>
                                <a class="dropdown-item" href="#">Core i7</a>
                                <a class="dropdown-item" href="#">Ryzen</a>
                                
                                <div class="dropdown-divider"></div>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                HDD/SSD
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#">～128GB</a>
                                <a class="dropdown-item" href="#">128GB～256GB</a>
                                <a class="dropdown-item" href="#">256GB～480GB</a>
                                <a class="dropdown-item" href="#">480GB～</a>
                                <div class="dropdown-divider"></div>
                            </div>
                        </li>
                    </ul>
                    <ul class="navbar-nav mr-auto">

                    </ul>
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <a class="nav-link" href="#"><span class="material-icons-outlined">
                            <img src="/icon/outline_shopping_cart_black_24dp.png" alt="">
                            </span></a>
                        <a class="nav-link" href="{{ url('/home') }}">
                            home
                        </a>
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('ログイン') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <!--<li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('登録') }}</a>
                                </li>-->
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
            
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    
    <footer class="footer bg-white border-top"　style = "padding:20px;">
        <div class= "container ">
            <div class = "row  ">
                <div class="col-3 text-center ">会社概要</div>
                <div class ="col-3 text-center">お問い合わせ</div>
                <div class = "col-3 text-center">送料</div>
                <div class = "col-3 text-center">支払方法</div>
            </div>
        </div>
    </footer>
</div>
</body>
</html>

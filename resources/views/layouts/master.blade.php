<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="keywords" content="Кактусы, купить кактус, суккуленты, купить суккуленты ">
        <meta name="description" content="Cactus hub">


        <title>Интернет Магазин: @yield('title')</title>

        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <script src="{{ asset('/js/jquery.min.js') }}"></script>
        <script src="{{ asset('/js/bootstrap.min.js') }}"></script>
        <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/starter-template.css') }}" rel="stylesheet">
    </head>
    <body>
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <a class="navbar-brand" href="{{ route('welcome') }}"><img class="logo" src="{{ asset('img/Logo_1.png') }}" alt="no_logo"></a>
                </div>
                <div id="navbar" class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li @routeactive('index')><a href="{{ route('index') }}">Все товары</a></li>
                        <li @routeactive('categor*')><a href="{{ route('categorys') }}">Категории</a></li>
                        <li @routeactive('basket*')><a href="{{ route('basket') }}">В корзину</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        @guest
                        <li><a href="{{ route('login') }}">Войти</a></li>
                        @if (Route::has('register'))
                            <li><a href="{{ route('register') }}">Регистрация</a></li>
                        @endif
                        @else
                            @if(Auth::user()->name == 'admin')
                            <li><a href="{{ route('orders') }}">Админка</a></li>
                            @endif
                            <li><a href="{{ route('dashboard') }}">Личный кабинет</a></li>
                        @endif   
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container">
            <div class="starter-template">
                @if(session()->has('success'))
                    <p class="alert alert-success">{{ session()->get('success') }}</p>
                @endif
                @if(session()->has('warning'))
                    <p class="alert alert-warning">{{ session()->get('warning') }}</p>
                @endif

                @yield('content')
            </div>
        </div>
    </body>
</html>
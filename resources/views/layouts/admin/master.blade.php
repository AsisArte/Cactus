<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Админка: @yield('title')</title>

    <!-- Scripts -->
    <script src="{{ asset('/js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/admin.css') }}" rel="stylesheet">
</head>
<body>
<div id="app">
    <nav class="navbar navbar-default navbar-expand-md navbar-light navbar-laravel">
        <div class="container">
            <a class="navbar-brand" href="{{ route('welcome') }}">Вернуться на сайт</a>

            <div id="navbar" class="collapse navbar-collapse">
                <ul class="nav navbar-nav">

                    <li><a href="{{ route('categories') }}">Категории</a></li>
                    <li><a href="{{ route('index') }}">Товары</a>
                    <li><a href="{{ route('orders') }}">Заказы</a></li>
                </ul>

                @guest
                    <ul class="nav navbar-nav navbar-right">
                        <li class="nav-item"><a href="{{ route('login') }}">Войти</a></li>
                        @if (Route::has('register'))
                            <li class="nav-item"><a href="{{ route('register') }}">Регистрация</a></li>
                        @endif
                        @else
                        <ul class="nav navbar-nav navbar-right">
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                               data-toggle="dropdown"
                               aria-haspopup="true" aria-expanded="false" v-pre> Администратор: {{ Auth::user()->name }}</a>
                        </li>
                    </ul>
                        @endif
            </div>
        </div>
    </nav>

    <div class="py-4">
        <div class="container">
            <div class="row justify-content-center">
                @yield('content')
            </div>
        </div>
    </div>
</div>
</body>
</html>
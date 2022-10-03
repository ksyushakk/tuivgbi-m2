<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Мой интернет магазин</title>
        <link rel="stylesheet" href="/public/assets/css/bootstrap.css">
        <script src="/public/assets/js/bootstrap.bundle.js"></script>
    </head>
<body>
<nav class="navbar navbar-expand-lg bg-light">
        <a class="navbar-brand" href="#">интернет магазин</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Главная</a>
                </li>
                @guest()
                <li class="nav-item">
                    <a class="nav-link" href="{{route('login')}}">Авторизация</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('register')}}">Регистрация</a>
                </li>
                @endguest
                @auth
                    <li class="nav-item"><a class="nav-link disabled">Мои заказы</a></li>
                    <li class="nav-item"><a class="nav-link disabled">Мой аккаунт</a></li>
                    @if(Auth::user()->role == 'admin')
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Администрирование
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{route('admin.product.create')}}">Добавить товар</a></li>
                                <li><a class="dropdown-item" href="{{route('admin.product.index')}}">Все товары</a></li>
                                <li><a class="dropdown-item" href="#">Просмотр заказов</a></li>
                                <li><a class="dropdown-item" href="#">Пользователи</a></li>
                            </ul>
                        </li>
                    @endif
                    <li class="nav-item"><a class="nav-link" href={{route('logout')}}>Выход</a></li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
    @yield('content')
</body>
</html>

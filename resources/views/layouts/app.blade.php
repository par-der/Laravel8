<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <!-- Fonts -->
    <link href="{{ mix('/css/app.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <nav class="navbar navbar-expand bg-light navbar-light">
        <div class="container-fluid">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link menu-link {{ $mainLink }} "
                       href="{{ route('home') }}">Главная страница</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link {{ $articleLink }} "
                       href="{{ route('article.index') }}">Каталог статей</a>
                </li>
            </ul>
            <a class="d-flex justify-content-end " href="https://github.com/rageserg">
                <i class="bi bi-github" style="font-size: 2rem; color: #000000;"></i>
            </a>
        </div>
    </nav>
    @yield('hero')
    @yield('content')
    @yield('vue')
</div>
</body>
</html>

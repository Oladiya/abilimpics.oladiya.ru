<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{asset('assets/css/main.css')}}">
</head>
<body>
    <header>
        <nav>
            <ul>
                @if(\Illuminate\Support\Facades\Auth::check())
                    <?php $user = \Illuminate\Support\Facades\Auth::user() ?>
                    {{ $user['fio'] }}
                    <li><a href="{{route('user.logout')}}">Выйти</a></li>
                @else
                    <li><a href="{{route('user.login')}}">Войти</a></li>
                    <li><a href="{{route('user.reg')}}">Регистрация</a></li>
                @endif
            </ul>
        </nav>
    </header>
    <main>
        @yield('content')
    </main>
    <footer>

    </footer>
    @vite(['resources/js/app.js'])
</body>
</html>

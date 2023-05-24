<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} - @yield('title')</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <link rel="stylesheet" href="{{asset('assets/css/main.css')}}">
    <link rel="icon" type="image/png" sizes="128x128" href="{{asset('assets/img/logo.png')}}">
</head>
<body>
    <div id="app" class="text-bg-success text-black">
        <header>
            <nav class="navbar navbar-expand-md navbar-light shadow-sm my-nav">
                <div class="container">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <div class="logo">
                            <img src="{{ asset('assets/img/logoza.png') }}" alt="{{ config('app.name', __('Flora')) }}">
                        </div>

    {{--                    <svg width="200" height="50">--}}
    {{--                        <pattern id="pattern" width="100%" height="100%">--}}
    {{--                            <image xlink:href="{{ asset('assets/img/logoza.svg') }}" width="200" height="100" preserveAspectRatio="xMidYMin slice"></image>--}}
    {{--                        </pattern>--}}
    {{--                        < href="{{ asset('assets/img/logoza.png') }}" width="200" height="50" fill="url(#pattern)"></>--}}
    {{--                    </svg>--}}

    {{--                    <div class="logo-svg"></div>--}}

                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav me-auto">

                        </ul>

                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ms-auto">
                            <!-- Authentication Links -->
                            @guest
                                @if (Route::has('login'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('login') }}">{{ __('Sign in') }}</a>
                                    </li>
                                @endif

                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </li>
                                @endif
                            @else
                                @if(\Illuminate\Support\Facades\Auth::user()->can('viewAny', \App\Models\User::class))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{route('user.admin')}}">{{ __('Admin Panel') }}</a>
                                    </li>
                                @endif

                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->fio }}
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>
                                        <a class="dropdown-item" href="{{ route('user.ls') }}">
                                            {{ __('Personal Area') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>
        </header>

        <main class="py-4">
            @yield('content')
        </main>

        <footer>
            <p>&copy; 2023</p>
        </footer>
    </div>
</body>
</html>

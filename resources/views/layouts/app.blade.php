<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ 'Drop of Life' }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/jquery-3.4.1.js') }}" ></script>
    <script src="{{ asset('js/bootstrap-input-spinner.js') }}"></script>
    <script src="{{ asset('js/menu-script.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,700,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/card.css') }}">
    <link rel="stylesheet" href="{{ asset('css/menu.css') }}">

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <i class="fas fa-tint"> D</i>{{ 'rop of Life' }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Conexion') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Inscription') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item">
                                <a href="{{ route('home') }}" class="nav-link d-flex justify-content-end">
                                    <img src="https://img.icons8.com/ios-filled/24/636363/home.png"/>
                                </a>
                            </li>
                            <li class="nav-item dropdown">
                                <a href="#" id="notificationDropdown" class="nav-link d-flex justify-content-end" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <img src="https://img.icons8.com/ios-filled/24/636363/appointment-reminders.png"/>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right notification-bar" aria-labelledby="notificationDropdown">
                                    <a class="dropdown-item d-flex justify-content-between" href="/{{auth()->user()->id}}/planning">
                                        <img src="https://img.icons8.com/material-sharp/24/636363/task-planning.png"/>{{ __('Blood request') }}
                                    </a>
                                    <a class="dropdown-item d-flex justify-content-between" href="/{{auth()->user()->id}}/planning">
                                        <img src="https://img.icons8.com/material-sharp/24/636363/task-planning.png"/>{{ __('Blood request') }}
                                    </a>
                                    <a class="dropdown-item d-flex justify-content-between" href="/{{auth()->user()->id}}/planning">
                                        <img src="https://img.icons8.com/material-sharp/24/636363/task-planning.png"/>{{ __('Blood request') }}
                                    </a>
                                    
                                </div>
                                
                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item d-flex justify-content-between" href="/{{auth()->user()->id}}/planning">
                                        {{ __('Planning') }}<img src="https://img.icons8.com/material-sharp/24/636363/task-planning.png"/>
                                    </a>
                                    <a class="dropdown-item d-flex justify-content-between" href="/{{auth()->user()->id}}/setting">
                                        {{ __('Paramètre') }}<img src="https://img.icons8.com/material-sharp/24/636363/settings.png"/>
                                    </a>
                                    <a class="dropdown-item d-flex justify-content-between" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                  document.getElementById('logout-form').submit();">
                                     {{ __('Logout') }}<img src="https://img.icons8.com/metro/24/636363/logout-rounded.png"/>
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
           @auth
        <div class="menu-layout" id="menu-layout">
            <div class="menu-button" id="menu-bd">
                <i class="fas fa-bars icons-bd icons-bd-main"></i>
            </div>
            <a href="{{route('home') }}">
                <div class="home-bd bd-prop">
                    <i class="fas fa-home icons-bd"></i>
                </div>
            </a>
            <a href="{{route('request.create') }}">
                <div class="about-bd bd-prop">
                    <i class="fas fa-paper-plane icons-bd"></i>
                </div>
            </a>
            <a href="{{route('request.create') }}">
                <div class="contact-bd bd-prop">
                    <i class="fas fa-tint icons-bd"></i>
                </div>
            </a>
        </div>
        @endauth
    </div>
</body>
</html>

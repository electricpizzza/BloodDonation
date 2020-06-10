<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ 'Drop of Life' }}</title>

    <!-- Scripts -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://momentjs.com/downloads/moment-with-locales.js"></script>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
                   
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css" />

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.43/css/bootstrap-datetimepicker.min.css"> 
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.43/css/bootstrap-datetimepicker-standalone.css"> 
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.43/js/bootstrap-datetimepicker.min.js"></script>
    
    <script src="/js/app.js"></script>
    <script src="/js/jquery-3.4.1.js" ></script>
    <script src="/js/bootstrap-input-spinner.js"></script>
    <script src="/js/menu-script.js"></script>

    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v6.0"></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,700,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">
    <link href="/css/card.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/menu.css">
    <link rel="stylesheet" href="/css/themeCal.css">

</head>
<body>
    <div id="app">

        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/home') }}">
                    <i class="fas fa-tint text-danger"> D</i>{{ 'rop of Life' }}
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
                                    @if (auth()->user()->unreadNotifications->where('type','App\Notifications\InNotif')->count()!=0)
                                    <span class="badge badge-danger badge-pill m-1 p-1" id="notifCount">{{auth()->user()->unreadNotifications->where('type','App\Notifications\InNotif')->count()}}</span>
                                    @endif
                                </a>
                                <!------Notifications------>
                                <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script> 
                                <script src="https://js.pusher.com/5.1/pusher.min.js"></script>
                                
                                <div class="dropdown-menu dropdown-menu-right notif-bd" aria-labelledby="notificationDropdown" id="notifications">
                                    @if (auth()->user()->notifications->where('type','App\Notifications\InNotif')->count()==0)
                                        <p class="bg-light m-2 p-1" style="text-align:center">Vous n'avez aucune notification</p>
                                    @endif
                                    @foreach (auth()->user()->notifications->where('type','App\Notifications\InNotif') as $notification)
                                        @if ($notification->read_at!=null)
                                        <a class="notif-bd-bloodr w-100 btn bg-light" id="{{$notification->id}}" href="/bloodrequest/{{$notification['data']['id']}}">
                                            <div class="d-inline float-left notif-icon w-25">
                                                <i class="fas fa-tint"></i>
                                                <span class="notif-date d-block">{{$notification->created_at}}</span>
                                            </div>
                                            <div class="d-inline float-right notif-info w-75 pr-1 pt-1">
                                                <strong class="notif-username">{{$notification['data']['sender_name']}}</strong>
                                                <span class="notif-info text-dark"> a publier un demand de sang type : <strong>{{$notification['data']['bloodType']}}</strong>
                                                </span>
                                            </div>
                                        </a> 
                                        @else    
                                    <form  action="/notifications/{{$notification->id}}/{{$notification['data']['id']}}" method="POST"  >
                                    <button type="submit" class="notif-bd-bloodr w-100 btn bg-info" id="{{$notification->id}}" href="/bloodrequest/{{$notification['data']['id']}}">
                                        @csrf                                        
                                        <div class="d-inline float-left notif-icon w-25">
                                            <i class="fas fa-tint"></i>
                                            <span class="notif-date d-block">{{$notification->created_at}}</span>
                                        </div>
                                        <div class="d-inline float-right notif-info w-75 pr-1 pt-1">
                                            <strong class="notif-username">{{$notification['data']['sender_name']}}</strong>
                                            <span class="notif-info text-dark"> a publier un demand de sang type : <strong>{{$notification['data']['bloodType']}}</strong>
                                                <span class="badge badge-danger">New</span>
                                            </span>
                                        </div>
                                    </button>
                                    </form>
                                    @endif
                                    @endforeach
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item d-flex justify-content-between" href="/planning">
                                        {{ __('Planning') }}<img src="https://img.icons8.com/material-sharp/24/636363/task-planning.png"/>
                                    </a>
                                    <a class="dropdown-item d-flex justify-content-between" href="/setting">
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
            <a href="{{route('more.show') }}">
                <div class="home-bd bd-prop">
                    <i class="fas fa-plus icons-bd"></i>
                </div>
            </a>
            <a href="{{route('message.show') }}">
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
        <div aria-live="polite"  id="toasts" aria-atomic="true" style="position: fix; min-height: 200px;">
            
        </div>
        <script async src="https://static.addtoany.com/menu/page.js"></script>
        <script src="/js/caleandar.js"></script>
        <script src="/js/demo.js"></script>
        @endauth
    </div>
    
</body>
</html>
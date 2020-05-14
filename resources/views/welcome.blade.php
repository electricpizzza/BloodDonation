<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
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
      <script src="https://momentjs.com/downloads/moment.js"></script>
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="{{ asset('js/jquery-3.4.1.js') }}" ></script>
        <script src="{{ asset('js/bootstrap-input-spinner.js') }}"></script>
        <script src="{{ asset('js/menu-script.js') }}"></script>
        <div id="fb-root"></div>
        <script async defer crossorigin="anonymous" src="https://connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v6.0"></script>
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
    
        <!-- Styles -->
        <style>
          
            .full-height {
                height: 90vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 100px;
                color:#ff6b95;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Conexion</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Inscription</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Drop of Life <img src="https://img.icons8.com/ios-filled/90/ff6b95/drop-of-blood.png"/>
                </div>
            </div>
        </div>
        <div class="col-12 p-5">

            @foreach ($content as $item)
                @switch($item['type'])
                    @case('request')
                    <div class="card m-2 card-bd-req card-bd">
                        <a class="card-head card-bd-head" href="/bloodrequest/{{$item['request']->id}}">
                            <img src="img/img.png" class="mt-4 m-3 float-left card-img-top rounded-circle" alt="...">
                            <h1 class="d-inline m-3 float-right blood-type">{{$item['request']->bloodType}}</h1>
                            <div class="mt-4 card-bd-info d-inline float-left">
                                <h3 class="m-0 card-username">{{$item['request']->user->name}}</h3>
                                <h6 class="card-ville"><strong>Ville - </strong>{{$item['request']->city}}</h6>
                            </div>
                        </a>
                        <div class="card-body card-bd-body float-left d-inline">
                            <p class="card-address"><b>Address : </b>{{$item['request']->address}}</p>
                            <p>{{$item['request']->description}}</p>
                            <div class="d-flex justify-content-between">
                                <div class="text-info deadline">{{$item['request']->deadline}}</div>
                                <div class="card-link d-flex">
                                    <a href="/bloodrequest/{{$item['request']->id}}"><i class="fas fa-paper-plane p-1"></i></a>
                                        <a href="#" id="notificationDropdown" class="dropdown d-flex justify-content-end" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                            <i class="fas fa-share-alt p-1"></i>
                                        </a>
                                        <!------share------>
                                        <div class="dropdown-menu dropdown-menu-right pl-1 pr-1" aria-labelledby="notificationDropdown">
                                            <small class="text-secondary">Partager :</small>
                                            <div class="a2a_kit a2a_kit_size_32 a2a_default_style">
                                                <a class="a2a_button_facebook" data-href="/bloodrequest/{{$item['request']->id}}"  data-href="/bloodrequest/{{$item['request']->id}}" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse" ></a>
                                                <a class="a2a_button_twitter" href="/bloodrequest/{{$item['request']->id}}"></a>
                                                <a class="a2a_button_whatsapp"></a>
                                                <a class="a2a_button_reddit" data-href="/bloodrequest/{{$item['request']->id}}"  href="https://www.reddit.com/submit?url=/bloodrequest/{{$item['request']->id}}"></a>
                                            </div>
                                        </div>                                
                                </div>
                            </div>
                        </div>
                    </div>
                        @break
                    @case('event')
                    <div class="card m-2 card-bd-event card-bd">
                        <div class="card-head card-bd-head">
                            <img src="img/img.png" class="mt-4 m-3 float-left card-img-top rounded-circle" alt="...">
                            <div class="mt-4 card-bd-info d-inline float-left">
                                <h3 class="m-0 card-username">{{!$item['event']->caravan ? $item['event']->association->name : 'Caravan De Paix'}}</h3>
                                <h6 class="card-ville"><strong>Ville - </strong>{{$item['event']->city}}</h6>
                            </div>
                        </div>
                        <div class="card-body card-bd-body float-left d-inline">
                            <h3>{{$item['event']->title}}</h3>
                            <p class="card-address"><b>Address : </b>{{$item['event']->address}}</p>
                            <p>{{$item['event']->description}}</p>
                            <p><strong>Du :</strong> {{$item['event']->dateStart}} - <strong>Jusqu'a :</strong> {{$item['event']->dateEnd}}</p>
                            <p><strong>Horaires :</strong> {{$item['event']->startsAt}} - {{$item['event']->endsAt}}</p>
                            <div class="d-flex justify-content-between">
                                <div class="card-link d-flex">
                                    <a href="/bloodrequest/{{$item['event']->id}}"><i class="fas fa-paper-plane p-1"></i></a>
                                        <a href="#" id="notificationDropdown" class="dropdown d-flex justify-content-end" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                            <i class="fas fa-share-alt p-1"></i>
                                        </a>
                                        <!------share------>
                                        <div class="dropdown-menu dropdown-menu-right pl-1 pr-1" aria-labelledby="notificationDropdown">
                                            <small class="text-secondary">Partager :</small>
                                            <div class="a2a_kit a2a_kit_size_32 a2a_default_style">
                                                <a class="a2a_button_facebook" data-href="/bloodrequest/{{$item['event']->id}}"  data-href="/bloodrequest/{{$item['event']->id}}" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse" ></a>
                                                <a class="a2a_button_twitter" href="/bloodrequest/{{$item['event']->id}}"></a>
                                                <a class="a2a_button_whatsapp"></a>
                                                <a class="a2a_button_reddit" data-href="/bloodrequest/{{$item['event']->id}}"  href="https://www.reddit.com/submit?url=/bloodrequest/{{$item['event']->id}}"></a>
                                            </div>
                                        </div>                                
                                </div>
                            </div>
                        </div>
                    </div> 
                        @break
                    @case('post')
                    <div class="card m-2 card-bd-post card-bd">
                        <div class="card-head card-bd-head">
                            <img src="img/img.png" class="mt-4 m-3 float-left card-img-top rounded-circle" alt="...">
                            <div class="mt-4 card-bd-info d-inline float-left">
                                <h3 class="m-0 card-username">{{!$item['post']->caravan ? $item['post']->association->name : 'Caravan De Paix'}}</h3>
                            </div>
                        </div>
                        <div class="card-body card-bd-body float-left d-inline">
                            <h3 class="font-weight-bold">{{$item['post']->title}}</h3>
                            <div class="media">
                                <div class="d-flex flex-column justify-content-around" href="#">
                                      <img class="mt-2" width="100%" src="{{$item['post']->image?? ''}}" alt="">
                                      <p class="m-3">{{$item['post']->description}}</p>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between">
                                <div class="text-primary"></div>
                                <div style="font-size:20px">
                                    <a href=""><i class="fas fa-paper-plane p-1"></i></a>
                                    <a href=""><i class="fas fa-share-alt p-1"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                        @break
                    @default
                        
                @endswitch
            @endforeach

        </div>
    </body>
    <script>
    const deadlines = document.querySelectorAll(".deadline");
    moment.locale('fr');
    for (let index = 0; index < deadlines.length; index++) {
        const element = deadlines[index];
        let date = $(element).html().replace(" ","T")
        date = new Date(date);
        $(element).html(moment(date, "YYYYMMDD").fromNow());
    }

    </script>
</html>

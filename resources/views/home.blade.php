@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

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
                                    <a href="/bloodrequest/{{$item['request']->id}}"><i class="fas fa-paper-plane p-2"></i></a>
                                        <a href="#" id="notificationDropdown" class="dropdown d-flex justify-content-end" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                            <i class="fas fa-share-alt p-2"></i>
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
                                    <a href="/bloodrequest/{{$item['event']->id}}"><i class="fas fa-paper-plane p-2"></i></a>
                                        <a href="#" id="notificationDropdown" class="dropdown d-flex justify-content-end" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                            <i class="fas fa-share-alt p-2"></i>
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
                                <div style="font-size:20px" class="d-flex justify-content-between">
                                    <a href=""><i class="fas fa-paper-plane p-2"></i></a>
                                    <a href=""><i class="fas fa-share-alt p-2"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                        @break
                    @default
                        
                @endswitch
            @endforeach
            <ul class="pagination justify-content-center p-3">
                <?=$content->links()?>
           </ul>
        </div>
        <div class="col-md-4 col-0 mt-md-0 mt-5">
            <h5 class="title p-2 title-map-bd">À Votre Proximité</h5>
            <div class="card border-danger map-border-bd">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d52903.799325112115!2d-5.018457391753897!3d34.03136498642301!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd9f8c6226db926f%3A0x3587f35f71c2da72!2sRegional%20Center%20De%20Transfusion%20Sanguine!5e0!3m2!1sen!2sma!4v1585951899761!5m2!1sen!2sma" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
              <div class="card-body">
                <h4 class="card-title text-center map-text-bd"><i class="fas fa-map-marker-alt"></i> Center Regional De Transfusion Sanguine</h4>
                <hr>
                <div class="card-columns d-flex flex-column">
                    <div class="card-caravane-title mb-3">
                        Caravan le plus proche
                    </div>
                    <a href="/caravan/1" class="container-fluid profile-section p-0">
                        <div class="row justify-content-left align-items-left p-0">
                            <div class="col-lg-12">
                                <img class="cov-img text-center" src="https://image.freepik.com/free-vector/teamwork-blood-donor-illustration_10045-362.jpg" alt="">
                                <img class="pdp-img rounded-circle p-0 m-0" src="https://thumbs.dreamstime.com/b/ambulance-badge-icon-simple-glyph-flat-vector-blood-donation-icons-ui-ux-website-mobile-application-white-179923520.jpg" alt="">
                            </div>
                        </div>
                        <div class="row p-0 m-0">
                            <div class="col-lg-12 justify-content-center align-items-center p-0">
                                <h1 class="text-center profile-name">Caravan de Paix</h1>
                            </div>
                        </div>
                        <div class="row stat-profile pl-2 m-0 text-center">
                            <div class="col-lg-4">
                                <h4>5</h4>
                                Mombres
                            </div>
                            <div class="col-lg-4">
                                <h4>10</h4>
                                Publicités
                            </div>
                            <div class="col-lg-4">
                                <h4>2</h4>
                                Announces
                            </div>
                        </div>
                        <div class="row text-center align-items-center justify-content-center">
                            <div class="col-lg-10">
                                <p class="desc-profile">
                                    Ville : Fes <br>
                                    Address : Place florence Ville Nouvelle, Fes <br>
                                    Actualement  : <span class="ai-font-bold text-success">Ouvert</span> <br>
                                </p>
                            </div>
    
                        </div>
                    </a>
                </div>
              </div>
            </div>
        </div>
    </div>
</div>
@endsection

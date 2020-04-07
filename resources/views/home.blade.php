@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @foreach ($requests as $request)
            <div class="card m-2 card-bd-req card-bd">
                <div class="card-head card-bd-head">
                    <img src="img/img.png" class="mt-4 m-3 float-left card-img-top rounded-circle" alt="...">
                    <h1 class="d-inline m-3 float-right blood-type">{{$request->bloodType}}</h1>
                    <div class="mt-4 card-bd-info d-inline float-left">
                        <h3 class="m-0 card-username">{{$request->user->name}}</h3>
                        <h6 class="card-ville">{{$request->city}}</h6>
                    </div>
                </div>
                <div class="card-body card-bd-body float-left d-inline">
                    <p class="card-address"><b>Address : </b>{{$request->address}}</p>
                    <p>{{$request->description}}</p>
                    <div class="d-flex justify-content-between">
                        <div class="text-info deadline">{{$request->deadline}}</div>
                        <div class="card-link d-flex">
                            <a href=""><i class="fas fa-paper-plane p-1"></i></a>
                                <a href="#" id="notificationDropdown" class="dropdown d-flex justify-content-end" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <i class="fas fa-share p-1"></i>
                                </a>
                                <!------share------>

                                <div class="dropdown-menu dropdown-menu-right pl-1 pr-1" aria-labelledby="notificationDropdown">
                                    <small class="text-secondary">Partager :</small>
                                   <div class="d-flex justify-content-between ">
                                    <div class="fb-share-button" data-href="/bloodrequest/{{$request->id}}" data-layout="button" data-size="small"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Partager</a></div>
                                    <div class="twitter"><a href="/bloodrequest/{{$request->id}}" class="twitter-share-button" data-show-count="false">Tweet</a><script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script></div>
                                    <div class=""><script src="https://platform.linkedin.com/in.js" type="text/javascript">lang: en_US</script><script type="IN/Share" data-url="/bloodrequest/{{$request->id}}"></script></div>
                                   </div>
                                </div>
                                
                        </div>
                    </div>
                </div>
            </div>
            
            @endforeach
            {{-- <div class="card m-2 card-bd-post card-bd">
                <div class="card-head card-bd-head">
                    <img src="img/img.png" class="mt-4 m-3 float-left card-img-top rounded-circle" alt="...">
                    <h1 class="d-inline m-3 float-right blood-type">O-</h1>
                    <div class="mt-4 card-bd-info d-inline float-left">
                        <h3 class="m-0 card-username">ZAKARAIE DINAR</h3>
                        <h6 class="card-ville">Fès-Boulemane</h6>
                    </div>
                </div>
                <div class="card-body card-bd-body float-left d-inline">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquid reprehenderit velit, nostrum laboriosam
                    dolores impedit magnam facilis, odio corrupti adipisci enim suscipit. Asperiores cumque ex vitae eos aliquam
                    modi minus.
                    <div class="d-flex justify-content-between">
                        <div class="text-primary">{{$request->created_at}}</div>
                        <div style="font-size:20px">
                            <a href=""><i class="fas fa-paper-plane p-1"></i></a>
                            <a href=""><i class="fas fa-share p-1"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card m-2 card-bd-event card-bd">
                <div class="card-head card-bd-head">
                    <img src="img/img.png" class="mt-4 m-3 float-left card-img-top rounded-circle" alt="...">
                    <h1 class="d-inline m-3 float-right blood-type">O-</h1>
                    <div class="mt-4 card-bd-info d-inline float-left">
                        <h3 class="m-0 card-username">ZAKARAIE DINAR</h3>
                        <h6 class="card-ville">Fès-Boulemane</h6>
                    </div>
                </div>
                <div class="card-body card-bd-body float-left d-inline">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquid reprehenderit velit, nostrum laboriosam
                    dolores impedit magnam facilis, odio corrupti adipisci enim suscipit. Asperiores cumque ex vitae eos aliquam
                    modi minus.
                    <div class="d-flex justify-content-between">
                        <div class="text-primary">{{$request->created_at}}</div>
                        <div style="font-size:20px">
                            <a href=""><i class="fas fa-paper-plane p-1"></i></a>
                            <a href=""><i class="fas fa-share p-1"></i></a>
                        </div>
                    </div>
                </div>
            </div> --}}
            <div class="col ml-md-5"><?=$requests->render()?></div>
        </div>
        <div class="col-md-4 col-0 mt-md-0 mt-5">
            <h5 class="title p-2">À Votre Proximité</h5>
            <div class="card border-danger">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d52903.799325112115!2d-5.018457391753897!3d34.03136498642301!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd9f8c6226db926f%3A0x3587f35f71c2da72!2sRegional%20Center%20De%20Transfusion%20Sanguine!5e0!3m2!1sen!2sma!4v1585951899761!5m2!1sen!2sma" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
              <div class="card-body">
                <h4 class="card-title">Center Regional De Transfusion Sanguine</h4>
                <div class="card-columns d-flex flex-column">
                    <div class="card m-2">
                        <img class="card-img-top rounded-circle p-2" src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcSukbkHjs8RepwNOoLjukeWTRPtZHK6Kjtlg71ZiD_a6r33arPH&usqp=CAU" alt="">
                        <div class="card-body">
                            <h4 class="card-title">Hay Al Addarissa</h4>
                            <a href=""><p class="card-text">Plus...</p></a>
                        </div>
                    </div>
                    <div class="card m-2">
                        <img class="card-img-top rounded-circle p-2" src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcS4xxAh-BjRwjYn66pKlZKzVUye77zEArdAtkHtTkWV-DxpRyaE&usqp=CAU" alt="">
                        <div class="card-body">
                            <h4 class="card-title">Title</h4>
                            <a href=""><p class="card-text">Text</p></a>
                        </div>
                    </div>
                    <div class="card m-2">
                        <img class="card-img-top rounded-circle p-2" src="https://images.glaciermedia.ca/polopoly_fs/1.23109277.1512072497!/fileImage/httpImage/image.jpg_gen/derivatives/landscape_804/blood-donor.jpg"alt="">
                        <div class="card-body">
                            <h4 class="card-title">Title</h4>
                            <a href=""><p class="card-text">Text</p></a>
                        </div>
                    </div>
                </div>
              </div>
            </div>
        </div>
    </div>
</div>
@endsection

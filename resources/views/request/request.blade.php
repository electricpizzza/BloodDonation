@extends('layouts.app')

@section('content')
<div class="container post-bd mt-5">
    <div class="row pt-5">
        <div class="col-lg-2 text-center">
            <img class="photo-bd-post rounded-circle w-75" src="/img/img.png"/>
        </div>
        <div class="col-lg-6">
            <h1 class="username-bd-post">{{$request->user->name}}</h1>
            <h4 class="ville-bd-post"><strong>Ville - </strong>{{$request->city}}</h4>
        </div>
        <div class="col-lg-4">
            <h1 class="float-right pr-5 bloodt-bd-post">
                <i class="drop-bd fas fa-tint"></i>
                <span class="bloodl-bd" id="bloodtype">{{$request->bloodType}}</span>
            </h1>
        </div>
    </div>
    <div class="row pt-4">
        <div class="col-lg-10 ml-4">
            <div class="speech-bubble-bd p-3">
                <p class="card-address"><b>Address : </b>{{$request->address}}</p>
                <p class="h-50">{{$request->description}} .</p>
                <p class="date-bd float-right deadline">{{$request->deadline}}</p>
            </div>
        </div>

    </div>
    <form action="/messagerie/{{$request->id}}" method="post">
        @csrf
        <div class="row pt-4 pb-4">
                <div class="col-lg-8 pl-5">
                    <input type="text" class="replay-bd-post form-control" name="message" placeholder="Répondre a Cette Demande ...">
                </div>
                <div class="col-lg-2">
                    <input type="submit" class="form-control ajouter-bd-post" value="Envoyer">
                </div>
            <div class="col-lg-2 btn">
                <a href="#" id="shareDropdown" class="dropdown d-flex justify-content-end" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    <i class="fas fa-share-alt share-bd-post float-right pr-3"></i>
                </a>
                <!------share------>
                <div class="dropdown-menu dropdown-menu-right pl-1 pr-1" aria-labelledby="shareDropdown">
                    <small class="text-secondary">Partager :</small>
                    <div class="a2a_kit a2a_kit_size_32 a2a_default_style">
                        <a class="a2a_button_facebook" data-href="/bloodrequest/{{$request->id}}"  data-href="/bloodrequest/{{$request->id}}" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse" ></a>
                        <a class="a2a_button_twitter" href="/bloodrequest/{{$request->id}}"></a>
                        <a class="a2a_button_whatsapp"></a>
                        <a class="a2a_button_reddit" data-href="/bloodrequest/{{$request->id}}"  href="https://www.reddit.com/submit?url=/bloodrequest/{{$request->id}}"></a>
                    </div>
                </div>
        </div>
            </div>
        </div>
    </form>
</div>
@endsection

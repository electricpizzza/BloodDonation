@extends('layouts.app')
@section('content')
    <div class="container chat-bd ">
        <div class="row">
            <div class="col-lg-4 chat-users-bd">
                <h1 class="chat-header pt-3 text-center">
                    Liste des utilisateurs
                </h1>
                <div class="users-liste-bd pt-5">
                    <div class="container user-bd">
                        @foreach ($conversations as $conversation)
                            <a href="/inbox/{{$conversation->id}}" class="row single-user-bd p-2 my-2">
                                <div class="col-lg-4 text-right">
                                    <img src="/img/img.png" class="rounded-circle img-fluid w-75" alt="">
                                </div>
                                <div class="col-lg-8">
                                    @if ($conversation->user == auth()->user())
                                        <h5 class="username-chat-bd">{{\App\Bloodrequest::find($conversation->blood_request_id)->user->name}}</h5>
                                    @else                                
                                        <h5 class="username-chat-bd">{{$conversation->user->name}}</h5>
                                    @endif
                                    <h6 class="ville-chat-bd is-connected">
                                        <i class="fas fa-record-vinyl"></i> Maintenant à Fez</h6>
                                </div>
                            </a>
                        @endforeach
                    {{-- <div class="row single-user-bd p-2 my-2">
                        <div class="col-lg-4 text-right">
                            <img src="/img/img.png" class="rounded-circle img-fluid w-75" alt="">
                        </div>
                        <div class="col-lg-8">
                            <h5 class="username-chat-bd">Ahmed Safa</h5>
                            <h6 class="ville-chat-bd is-deconnected">
                                <i class="fas fa-record-vinyl"></i> Indisponible</h6>
                        </div>
                    </div>
                    <div class="row single-user-bd p-2 my-2">
                        <div class="col-lg-4 text-right">
                            <img src="/img/img.png" class="rounded-circle img-fluid w-75" alt="">
                        </div>
                        <div class="col-lg-8">
                            <h5 class="username-chat-bd">Zakariae Sghir</h5>
                            <h6 class="ville-chat-bd is-deconnected">
                                <i class="fas fa-record-vinyl"></i> Indisponible</h6>
                        </div>
                    </div>
                    <div class="row single-user-bd p-2 my-2">
                        <div class="col-lg-4 text-right">
                            <img src="/img/img.png" class="rounded-circle img-fluid w-75" alt="">
                        </div>
                        <div class="col-lg-8">
                            <h5 class="username-chat-bd">Otmane Ansari</h5>
                            <h6 class="ville-chat-bd is-deconnected">
                                <i class="fas fa-record-vinyl"></i> Indisponible</h6>
                        </div>
                    </div> --}}
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 pt-3 chat-with-bd">
                            <h1 class="text-center chat-with-name-bd"> <span class="chat-ca-bd"> Conversation Avec -
                                </span> {{$conversation_curent->user->name ?? ''}}</h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 pt-3 mt-1 chat-section-bd ">
                            <div class="container" id="conversation">
                        @if ($messages!=null)
                        @foreach ($messages as $message)
                            @if ($message->user_id==auth()->user()->id)
                            <div class="row my-3 main-user">
                                <div class="col-lg-6"></div>
                                <div class="col-lg-6 pt-2 main-user-bubble">
                                    <span class="message-bd pl-3">
                                        {{$message->message}} 
                                    </span>
                                    <h6 class="text-right massage-time-bd">
                                        {{$message->created_at}} 
                                    </h6>
                                </div>
                              </div>
                            @else       
                                    <div class="row my-3 other-user">
    
                                        <div class="col-lg-1 pt-2 other-user-img">
                                            <img src="/img/img.png" class="w-100  rounded-circle" alt="">
                                        </div>
                                        <div class="col-lg-6 pt-2 other-user-bubble">
                                            <span class="message-bd pl-3">
                                                {{$message->message}} 
                                            </span>
                                            <h6 class="text-right massage-time-bd">
                                                {{$message->created_at}} 
                                            </h6>
                                        </div>
                                        <div class="col-lg-5"></div>
                                    </div>
                            @endif
                        @endforeach
                        @endif
                    </div>
                    <script> $('body').ready(function () {
                        $('#conversation').scrollTop($('#conversation').height());
                    }); </script>
                </div>
                    </div>
                        <div class="row">
                            <div class="col-lg-9 pt-3 mt-1 chat-message-bd">
                                <input type="text" id="message" name="message" class="form-control envoi-message-bd" placeholder="Envoi un message">
                            </div>
                            <div class="col-lg-3 pt-3 mt-1 chat-message-bd">
                                <button type="button"  id="send" onclick="send({{$conversation_curent->id ?? null}})" class=" send-icon-bd"><i class="fas fa-paper-plane"></i></button>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
     <script src="https://js.pusher.com/6.0/pusher.min.js"></script>
     <script>
   
       // Enable pusher logging - don't include this in production
       Pusher.logToConsole = true;
   
       var pusher = new Pusher('45e85e66fe60a9c29dc9', {
         cluster: 'eu'
       });
   
       var channel = pusher.subscribe('message-channel{{auth()->user()->id}}');
       channel.bind('Message', function(data) {
        console.log(data);
        let now = new Date().toLocaleTimeString();
    let bubble = ` <div class="row my-3 other-user">
    
    <div class="col-lg-1 pt-2 other-user-img">
        <img src="/img/img.png" class="w-100  rounded-circle" alt="">
    </div>
    <div class="col-lg-6 pt-2 other-user-bubble">
        <span class="message-bd pl-3">
            ${data.message.message} 
        </span>
        <h6 class="text-right massage-time-bd">
            ${now} 
        </h6>
    </div>
    <div class="col-lg-5"></div>
</div>`;
          $('#conversation').append(bubble);
          $('#conversation').scrollTop($('#conversation').height());
       });
     </script>
@endsection

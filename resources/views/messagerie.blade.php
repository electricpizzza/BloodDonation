@extends('layouts.app')
@section('content')
    <div class="container chat-bd ">
        <div class="row">
            <div class="col-4 chat-users-bd">
                <h1 class="chat-header pt-3 text-center">
                    Discussions
                </h1>
                <div class="users-liste-bd pt-5">
                    <div class="container user-bd" id="conversationusr">
                        @foreach ($conversations as $conversation)
                            <a href="/inbox/{{$conversation->id}}" class="row single-user-bd p-2 my-2" id="conversation{{$conversation->id}}">
                                <div class="col-lg-4 text-right">
                                    <img src="/img/img.png" class="rounded-circle img-fluid w-75" alt="">
                                </div>
                                <div class="col-lg-8">
                                    <h5 class="username-chat-bd">
                                    @if ($conversation->user == auth()->user())
                                        {{\App\Bloodrequest::find($conversation->blood_request_id)->user->name}}
                                    @else                                
                                        {{$conversation->user->name}} 
                                    @endif
                                    
                                    {{-- @foreach (auth()->user()->unreadNotifications->where('type','App\Notifications\MessageNotif') as $item)
                                    @if ($item['data']['id']==$conversation->messages->last()->id)
                                        <span class="badge badge-danger" id="new{{$conversation->id}}">New</span>
                                    @endif
                                    @endforeach --}}
                                    </h5>
                                    <h6 class="ville-chat-bd is-connected">
                                        <i class="fas fa-record-vinyl"></i> Maintenant à {{$conversation->user->city}}
                                      </h6>
                                </div>
                            </a>
                        @endforeach
                     <div class="row single-user-bd p-2 my-2">
                        <div class="col-lg-4 text-right">
                            <img src="/img/img.png" class="rounded-circle img-fluid w-75" alt="">
                        </div>
                        <div class="col-lg-8">
                            <h5 class="username-chat-bd">Ahmed Safa  <span class="badge badge-danger" id="new">New</span></h5>
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
                    </div> 
                    </div>
                </div>
            </div>
            <div class="col-8">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 pt-3 chat-with-bd">
                           @if ($conversation_curent!=null)
                           @if ($conversation_curent->user == auth()->user())
                           <h1 class="text-center chat-with-name-bd"> <span class="chat-ca-bd"> Conversation Avec -
                                {{\App\Bloodrequest::find($conversation_curent->blood_request_id)->user->name}}
                           @else
                           <h1 class="text-center chat-with-name-bd"> <span class="chat-ca-bd"> Conversation Avec -
                           </span> {{$conversation_curent->user->name ?? ''}}</h1>
                           @endif
                           @endif
                            
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
    
                                        <div class="m-1 other-user-img">
                                            <img src="/img/img.png" class="rounded-circle" width="30px" alt="">
                                        </div>
                                        <div class="col pt-2 other-user-bubble">
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

                </div>
                    </div>
                        <div class="row">
                            <div class="col-9 pt-3 mt-1 chat-message-bd">
                                <input type="text" id="message" autocomplete="off" name="message" onkeyup="enter(event)" class="form-control envoi-message-bd" placeholder="Envoyer un message">
                            </div>
                            <div class="col-3 pt-3 mt-1 chat-message-bd">
                                <button type="button"  id="send" onclick="send({{$conversation_curent->id ?? null}})" class=" send-icon-bd"><i class="fas fa-paper-plane"></i></button>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
     <script src="https://js.pusher.com/6.0/pusher.min.js"></script>
     <script>
          // $('#conversation').scrollTop($("#conversation").height());
         $("#message").keyup(function (e) { 
        console.log($(this).val());
  
        });
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

       function enter(event) { 
        if (event.keyCode==13) {
            send('{{$conversation_curent->id ?? null}}}');
            var objDiv = document.getElementById("conversation");
            objDiv.scrollTop = objDiv.scrollHeight ;
            }
        }
 
     </script>
@endsection

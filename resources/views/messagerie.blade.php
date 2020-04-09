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
                    @foreach ($bloodrequests as $item)
                        @foreach ($item->conversations()->get() as $converssation)
                            <div class="row single-user-bd p-2 my-2">
                                <div class="col-lg-4 text-right">
                                    <img src="/img/img.png" class="rounded-circle img-fluid w-75" alt="">
                                </div>
                                <div class="col-lg-8">
                                    <h5 class="username-chat-bd">{{\App\User::find($converssation->user_id)->name}}</h5>
                                    <h6 class="ville-chat-bd is-connected">
                                        <i class="fas fa-record-vinyl"></i> Maintenant à Fez</h6>
                                </div>
                            </div>
                        @endforeach
                    @endforeach
                    @foreach ($inboxMsg as $item)
                    <div class="row single-user-bd p-2 my-2">
                        <div class="col-lg-4 text-right">
                            <img src="/img/img.png" class="rounded-circle img-fluid w-75" alt="">
                        </div>
                        <div class="col-lg-8">
                            <h5 class="username-chat-bd">{{\App\BloodRequest::find($item->blood_request_id)->user->name}}</h5>
                            <h6 class="ville-chat-bd is-connected">
                                <i class="fas fa-record-vinyl"></i> Disponible</h6>
                        </div>
                    </div>
                    @endforeach
                    <div class="row single-user-bd p-2 my-2">
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
                    </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 pt-3 chat-with-bd">
                            <h1 class="text-center chat-with-name-bd"> <span class="chat-ca-bd"> Conversation Avec -
                                </span> Hamid Dawssi</h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 pt-3 mt-1 chat-section-bd ">
                            <div class="container" id="conversation">
                                
                                <div class="row my-3 other-user">

                                    <div class="col-lg-1 pt-2 other-user-img">
                                        <img src="/img/img.png" class="w-100  rounded-circle" alt="">
                                    </div>
                                    <div class="col-lg-6 pt-2 other-user-bubble">
                                        <span class="message-bd pl-3">
                                            Salam j'ai le type A+ et je peux donner 
                                        </span>
                                        <h6 class="text-right massage-time-bd">
                                            11:00 PM 09-04-20
                                        </h6>
                                    </div>
                                    <div class="col-lg-5"></div>
                                </div>
                                
                            </div>
                        </div>
                    </div>

                        <div class="row">
                            <div class="col-lg-9 pt-3 mt-1 chat-message-bd">
                                <input type="text" id="message" class="form-control envoi-message-bd" placeholder="Envoi un message">
                            </div>
                            <div class="col-lg-3 pt-3 mt-1 chat-message-bd">
                                <button type="button"  id="send" class=" send-icon-bd"><i class="fas fa-paper-plane"></i></button>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
@endsection

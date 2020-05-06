@extends('layouts.app')

@section('content')
<div class="container">
    <div class="container-fluid profile-bd mt-1 pt-3">
        <div class="row">
            <div class="col-lg-4">
                <div class="container-fluid profile-section p-0">
                    <div class="row justify-content-left align-items-left p-0">
                        <div class="col-lg-12">
                            <img class="cov-img text-center" src="coverture.png" alt="">
                            <img class="pdp-img rounded-circle p-0 m-0" src="https://thumbs.dreamstime.com/b/ambulance-badge-icon-simple-glyph-flat-vector-blood-donation-icons-ui-ux-website-mobile-application-white-179923520.jpg" alt="">
                        </div>
                    </div>
                    <div class="row p-0 m-0">
                        <div class="col-lg-12 justify-content-center align-items-center p-0">
                            <a href="/caravan/{{$caravan->id}}/edit" class="modif-prof-bd p-2">Modifier le Profile</a>
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
                            <p class="desc-profile">Lorem ipsum dolor sit amet consectetur, adipisicing elit.
                                Perspiciatis, odio? Labore
                                perferendis distinctio harum architecto consequuntur? Nisi nesciunt ea soluta nihil quia
                                deserunt consequuntur temporibus, ipsa, ut ex voluptas necessitatibus?</p>
                        </div>

                    </div>
                </div>



            </div>
            <div class="col-lg-8">
                {{$elments}}
                <div class="container-fluid profile-section p-5">
                    <div class="card m-2 card-bd-post card-bd">
                        <div class="card-head card-bd-head">
                            <img src="img/img.png" class="mt-4 m-3 float-left card-img-top rounded-circle" alt="...">
                            <div class="mt-4 card-bd-info d-inline float-left">
                                <h3 class="m-0 card-username">Association Amal</h3>
                                <h6 class="card-ville">Fès-Boulemane</h6>
                            </div>
                        </div>
                        <div class="card-body card-bd-body float-left d-inline">
                            <div class="media">
                                <a class="d-flex align-self-bottom" href="#">
                                      <img width="100%" src="https://ichef.bbci.co.uk/news/1024/cpsprodpb/182FF/production/_107317099_blooddonor976.jpg" alt="">
                                </a>
                            </div>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquid reprehenderit velit, nostrum laboriosam
                            dolores impedit magnam facilis, odio corrupti adipisci enim suscipit. Asperiores cumque ex vitae eos aliquam
                            modi minus.
                            <div class="d-flex justify-content-between">
                                <div class="text-primary">in 12 days</div>
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
                                <div class="text-primary">in 5 days</div>
                                <div style="font-size:20px">
                                    <a href=""><i class="fas fa-paper-plane p-1"></i></a>
                                    <a href=""><i class="fas fa-share p-1"></i></a>
                                </div>
                            </div>
                        </div>
                    </div> 
                </div>

            </div>

        </div>



    </div>
</div>
@endsection

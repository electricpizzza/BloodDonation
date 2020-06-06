@extends('layouts.app')

@section('content')
<div class="container">
    <div class="container assoc_profile mb-5">
        <div class="row header_assoc text-center">
            <div class="col-lg-12 p-0 m-0 text-center">
                <img src="/img/cover_assoc.png" alt="" class="cover-assoc w-100">
                @if (auth()->user()==null||auth()->user()->association==null||$association->id!=auth()->user()->association->id)
                @else
                <a href="modif_assoc.html" class="edit_assoc rounded-circle px-2"><i class="fas fa-cog"></i></a>
                @endif
                <img src="/img/photo_assoc.png" alt="" class="rounded-circle photo_assoc">
                <h1 class="assoc_name">Association Al Amal</h1>
                <p class="assoc_desc">{{$association->description}} </p>

            </div>
        </div>
        <div class="row body_assoc">
            <div class="col-lg-12 p-0 m-0">
                <div class="container assoc_posts">
                    <nav>
                        <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                            <a class="nav-item nav-link active nav-switch" id="nav-public-tab" data-toggle="tab"
                                href="#nav-publicite" role="tab" aria-controls="nav-publicite"
                                aria-selected="true">Publicité</a>
                            <a class="nav-item nav-link nav-switch" id="nav-info-tab" data-toggle="tab" href="#nav-info"
                                role="tab" aria-controls="nav-info" aria-selected="false">Information</a>
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-publicite" role="tabpanel"
                            aria-labelledby="publicite">
                            <div class="card m-2 card-bd-event card-bd">
                                <div class="card-head card-bd-head">
                                    <img src="/img/photo_assoc.png" class="mt-4 m-3 float-left card-img-top rounded-circle" alt="...">
                                    <h1 class="d-inline m-3 float-right blood-type">O-</h1>
                                    <div class="mt-4 card-bd-info d-inline float-left">
                                        <h3 class="m-0 card-username">Association Amal</h3>
                                        <h6 class="card-ville">Marrakech</h6>
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
                            <div class="card m-2 card-bd-post card-bd">
                                <div class="card-head card-bd-head">
                                    <img src="/img/cover_assoc.png" class="mt-4 m-3 float-left card-img-top rounded-circle" alt="...">
                                    <div class="mt-4 card-bd-info d-inline float-left">
                                        <h3 class="m-0 card-username">Caravan de Paix</h3>
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
                            
                        </div>
                        <div class="tab-pane fade" id="nav-info" role="tabpanel" aria-labelledby="nav-info">
                            <div class="container mt-5">
                                <div class="row justify-content-center">
                                    <div class="col-lg-8">
                                        <table class="table table-info-assoc">

                                            <tr>
                                                <td class="big-txt-assoc">
                                                    </h3>Directeur(rice)</h3>
                                                </td>
                                                <td>
                                                    <img src="http://amalnonprofit.org/wp-content/uploads/2015/09/staff-nora.jpg" alt=""
                                                        class="d-inline rounded-circle director-img">
                                                    <h5 class="d-inline ml-3">{{$association->director}}</h5>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="big-txt-assoc">
                                                    </h3>Description</h3>
                                                </td>
                                                <td>
                                                    {{$association->description}}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="big-txt-assoc">
                                                    </h3>Adresse</h3>
                                                </td>
                                                <td>
                                                    {{$association->address}}
                                                </td>

                                            </tr>
                                            <tr>
                                                <td class="big-txt-assoc">
                                                    </h3>Site Web</h3>
                                                </td>
                                                <td>
                                                    <a href="{{$association->website}}" target="_blank" rel="noopener noreferrer">{{$association->website}}</a>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
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

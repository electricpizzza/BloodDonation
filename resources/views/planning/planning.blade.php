@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-4">
            <div class="container-fluid profile-section p-0">
                <div class="row justify-content-left align-items-left p-0">
                    <div class="col-lg-12">
                        <img class="cov-img text-center" src="https://image.freepik.com/free-vector/teamwork-blood-donor-illustration_10045-362.jpg" alt="">
                        <img class="pdp-img rounded-circle p-0 m-0" src="/img/img.png" alt="">
                    </div>
                </div>
                <div class="row p-0 m-0">
                   
                </div>
                <div class="row stat-profile pl-2 m-0 text-center">
                    <div class="col-6">
                        <h4>{{$planning->nbDons??0}}</h4>
                        Dons
                    </div>
                    <div class="col-6">
                        <h4>{{$user->bloodRequests->count()??0}}</h4>
                        Demandes
                    </div>
                </div>
                <div class="row text-center align-items-center justify-content-center">
                    <div class="col-lg-10">
                        <p class="desc-profile">
                            Type de Snag : {{$user->bloodType??null}} <br>
                            Ville : <b class="text-capitalize">{{$user->city??null}}</b> <br>
                            Prochain Don  : <span id="nextDonation" class="ai-font-bold text-danger text-capitalize"></span> <br>
                        </p>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="container-fluid  profile-section h-100 p-5">
                <div id="caleandar">

                </div>
            </div>
        </div>
    </div>
</div>
@if ($planning==null)
<div id="myModal" class="modal fade">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Information Suplimentaire</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="d-flex justify-content-center">
                <img src="/img/img.png" class="rounded-circle m-4" width="100px" height="100px" alt="">
            </div>
            <form method="POST" action="/planning" class="modal-body">
                @csrf
                <div class="form-group row">
                    <div class="col">
                        <select id="bloodType" type="bloodType" class="custom-select @error('bloodType') is-invalid @enderror" name="bloodType" value="{{ old('bloodType') }}" required autocomplete="bloodType">
                            <option value="NaN" disabled selected>Choisir Votre Type de Son</option>
                            <option value="A+">A positive (A+)</option>
                            <option value="A-">A negative (A-)</option>
                            <option value="B+">B positive (B+)</option>
                            <option value="B-">B negative (B-)</option>
                            <option value="O+">O positive (O+)</option>
                            <option value="O-">O negative (O-)</option>
                            <option value="AB+">AB positive (AB+)</option>
                            <option value="AB-">AB negative (AB-)</option>
                        </select>

                        @error('bloodType')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col">
                        <input id="city" type="city" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ old('city') }}" required autocomplete="city"  placeholder="Ville">

                        @error('city')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col">
                        <input id="latestDonation" type="text"  class="form-control @error('latestDonation') is-invalid @enderror" name="latestDonation" value="{{ old('latestDonation')}}" required autocomplete="latestDonation"  placeholder="La Dernier Don (yyyy/mm/dd)">

                        @error('latestDonation')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <script type="text/javascript">
                    $(function () {
                        $('#latestDonation').datetimepicker();
                    });
                </script>

                <div class="form-group row">
                    <div class="col">
                        <select id="timePeriod" type="timePeriod" class="custom-select @error('timePeriod') is-invalid @enderror" name="timePeriod" value="{{ old('timePeriod') }}" required autocomplete="timePeriod">
                            <option value="NaN" disabled selected>Choisir La Periode Entre Vos Dons</option>
                            <option value="3">3 Mois</option>
                            <option value="4">4 Mois</option>
                            <option value="5">5 Mois</option>
                            <option value="6">6 Mois</option>
                            <option value="7">7 Mois</option>
                            <option value="8">8 Mois</option>
                            <option value="9">9 Mois</option>
                            <option value="10">10 Mois</option>
                            <option value="11">11 Mois</option>
                            <option value="12">12 Mois</option>
                        </select>

                        @error('timePeriod')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="form-group row mb-0">
                        <div class="col d-flex justify-content-center">
                            <button type="submit" class="btn btn-danger btn-md creer mt-4">
                                {{ __('Enregistrer') }}
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
    <script>
     $(document).ready(function(){
        $("#myModal").modal('show');
    });
    </script>
@endif
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <link rel="stylesheet" href="css/registerStyle.css">
    <div class="container mt-4 mb-5 contBack">
        <div class="row justify-content-center">
            <h1 class="inscTitle mb-4 ml-4 mr-4">Inscription</h1>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-6 bodyreg text-center order-sm-2 order-lg-2">
                <img src="img/registerImg.png" alt="" class="img-fluid inscImg mb-4 mt-4">
                <div class="conMsg">
                    <span class="deja ">Vous avez déjà un compte?</span><br> <a href="{{ route('login') }}"
                        class="connecter">Se Connecter</a>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-6 bodyreg justify-content-center text-center order-sm-1 order-lg-1">
                <form method="POST" action="{{ route('register') }}" onsubmit="return validat(this);">
                    @csrf

                    <div class="form-group row">
                        <div class="col">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Nom & Prenom">

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Mot De Pass">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirmer Mot De Pass">
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary creer">
                                {{ __('Créer Compte') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

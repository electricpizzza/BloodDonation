@extends('layouts.app')

@section('content')
<div class="container">
    <link rel="stylesheet" href="css/loginStyle.css">
    <div class="container mt-4 mb-5 contBack">
        <div class="row justify-content-center">
            <h1 class="inscTitle mb-4 ml-4 mr-4">Connexion</h1>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-6 bodyreg text-center order-sm-2 order-lg-2">
                <img src="img/loginImg.png" alt="" class="img-fluid inscImg mb-4 mt-4">
                <div class="conMsg">
                    <span class="deja ">Créer un Compte?</span><br> <a href="{{ route('register') }}"
                        class="connecter">S'inscrire</a>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-6 bodyreg justify-content-center text-center order-sm-1 order-lg-1 mt-lg-5">
                    <form method="POST" action="{{ route('login') }}"  onsubmit="return validat(this);">
                        @csrf

                        <div class="form-group row">
                            <div class="col">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Address Email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Mot De Pass">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary creer mt-4">
                                    {{ __('Connexion') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link connecter" href="{{ route('password.request') }}">
                                        {{ __('Mot De Passe Oublié?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
            </div>
        </div>

    </div>
</div>
@endsection

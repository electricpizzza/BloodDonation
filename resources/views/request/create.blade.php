@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
    <link rel="stylesheet" href="../css/loginStyle.css">
        <div class="col-md-8 contBack">
            <h1 class="title">Créer Une Demande</h1>
            <form method="POST" action="/request" >
                @csrf
                <div class="form-group row">
                    <div class="col">
                        <select id="bloodType" type="bloodType" class="custom-select custom-select @error('bloodType') is-invalid @enderror" name="bloodType" value="{{ old('bloodType') }}" required autocomplete="bloodType">
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
                        <input id="address" type="address" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address"  placeholder="Address">

                        @error('address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col">
                        <input id="deadline" type="text"  class="form-control @error('deadline') is-invalid @enderror" name="deadline" value="{{ old('deadline')}}" required autocomplete="deadline"  placeholder="La Date Limite (yyyy/mm/dd)">

                        @error('deadline')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <script type="text/javascript">
                    $(function () {
                        $('#deadline').datetimepicker();
                    });
                </script>
                <div class="form-group row">
                    <div class="col">
                        <textarea cols="30" rows="7" id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description"  required placeholder="description">{{ old('description') }}</textarea>
                        @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row mb-0">
                    <div class="col d-flex justify-content-center offset-md-5">
                        <button type="submit" class="btn btn-primary creer mt-4">
                            {{ __('Creer') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @foreach ($requests as $item)
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are in : {{auth()->user()->city}}!<br>
                    Your role : {{auth()->user()->roll}}!<br>
                    Your email : {{auth()->user()->email}}!<br>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection

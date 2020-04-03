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
        <div class="col-md-4 col-0 mt-md-0 mt-5">
            <h5 class="title p-2">À Votre Proximité</h5>
            <div class="card border-danger">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d52903.799325112115!2d-5.018457391753897!3d34.03136498642301!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd9f8c6226db926f%3A0x3587f35f71c2da72!2sRegional%20Center%20De%20Transfusion%20Sanguine!5e0!3m2!1sen!2sma!4v1585951899761!5m2!1sen!2sma" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
              <div class="card-body">
                <h4 class="card-title">Center Regional De Transfusion Sanguine</h4>
                <div class="card-columns d-flex flex-column">
                    <div class="card m-2">
                        <img class="card-img-top rounded-circle p-2" src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcSukbkHjs8RepwNOoLjukeWTRPtZHK6Kjtlg71ZiD_a6r33arPH&usqp=CAU" alt="">
                        <div class="card-body">
                            <h4 class="card-title">Hay Al Addarissa</h4>
                            <a href=""><p class="card-text">Plus...</p></a>
                        </div>
                    </div>
                    <div class="card m-2">
                        <img class="card-img-top rounded-circle p-2" src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcS4xxAh-BjRwjYn66pKlZKzVUye77zEArdAtkHtTkWV-DxpRyaE&usqp=CAU" alt="">
                        <div class="card-body">
                            <h4 class="card-title">Title</h4>
                            <a href=""><p class="card-text">Text</p></a>
                        </div>
                    </div>
                    <div class="card m-2">
                        <img class="card-img-top rounded-circle p-2" src="https://images.glaciermedia.ca/polopoly_fs/1.23109277.1512072497!/fileImage/httpImage/image.jpg_gen/derivatives/landscape_804/blood-donor.jpg"alt="">
                        <div class="card-body">
                            <h4 class="card-title">Title</h4>
                            <a href=""><p class="card-text">Text</p></a>
                        </div>
                    </div>
                </div>
              </div>
            </div>
        </div>
    </div>
</div>
@endsection

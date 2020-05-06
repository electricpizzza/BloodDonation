@extends('layouts.app')

@section('content')
<div class="container">
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
                            <img class="pdp-img rounded-circle p-0 m-0" src="pdp.png" alt="">
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
                <div class="container-fluid profile-section p-5">
                    <h2 class="title-profile">Modification de Profile</h2>
                    <form action="" class="pb-5">
                        <input type="text" class="form-control mt-5" placeholder="Nom de profile">
                        <input type="text" class="form-control desc-prof-edit mt-5" placeholder="Description">
                        <label for="" class="pdp-change mt-5">Choissiez une photo de profile</label>
                        <div class="input-group pdp-upload ">

                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroupFileAddon01">Photo de Profile</span>
                            </div>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="inputGroupFile01"
                                    aria-describedby="inputGroupFileAddon01">
                                <label class="custom-file-label" for="inputGroupFile01">Choissiez l'image</label>
                            </div>
                        </div>
                        <label for="" class="pdp-change mt-5">Choissiez une image de couverture</label>
                        <div class="input-group cov-upload mb-5">

                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroupFileAddon01">La Couverture</span>
                            </div>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="inputGroupFile01"
                                    aria-describedby="inputGroupFileAddon01">
                                <label class="custom-file-label" for="inputGroupFile01">Choissiez l'image</label>
                            </div>
                        </div>
                        <input type="submit" class="float-right btn-confirm " value="Confirmer les changement">
                    </form>
                </div>

            </div>

        </div>



    </div>
</div>
@endsection

</div>
@endsection

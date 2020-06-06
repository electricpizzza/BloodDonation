
@extends('layouts.app')

@section('content')
<div class="container">
    <section id="tabs" class="project-tab">
        <div class="container va-conta py-3">
            <h1 class="titreQes text-center">Vous Êtes ?</h1>
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <nav>
                        <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                            <a class="nav-item title-Header nav-link active" id="nav-home-tab" data-toggle="tab"
                                href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Caravane</a>
                            <a class="nav-item nav-link title-Header" id="nav-profile-tab" data-toggle="tab"
                                href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">
                                Association</a>
                        </div>
                    </nav>
                    <div class="tab-content caravane-tab" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
                            aria-labelledby="nav-home-tab">
                            <form action="" class="pt-5">

                                <label for="matricule" class="inp-text my-2">Matricule</label>
                                <input type="text" class="inpt-ctrl form-control" name="matricule" id="matC"
                                    placeholder="Ex: BD542694">
                                <label for="matricule" class="inp-text my-2">Résponsable</label>
                                <input type="text" class="inpt-ctrl form-control" name="resp" id="respC"
                                    placeholder="Ex: XXX XXX">
                                <input type="submit" value="Vérifier" class="verifier-btn my-5">
                            </form>
                            <img src="/img/van.png" alt="" class="img-van">



                        </div>
                        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                            <form action="/" method="POST">

                                <div class="container assoc-creation mt-3 p-4 mb-3 justify-content-center">
                                    <img src="/img/assos.png" alt="" class="assocpik w-50">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="noma" class="titles">Nom d'association</label>
                                                <input class="form-control inpt-assoc" type="text" name="noma" id="noma"
                                                    placeholder="Ex : Al Amel" />
                                            </div>

                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="direct" class="titles">Directeur(rice)</label>
                                                <input class="form-control inpt-assoc" type="text" name="direct"
                                                    id="direct" placeholder="Ex : Rachid XXXX" />
                                            </div>

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="sitew" class="titles">Site Web (optionnel)</label>
                                                <input class="form-control inpt-assoc" type="url" name="sitew"
                                                    id="sitew" placeholder="Ex : www.alamel.assoc.ma" />
                                            </div>

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="descAssoc" class="titles">Description</label>
                                                <textarea class="form-control" name="descAssoc" id="descAssoc" rows="2"
                                                    placeholder="Ex: Association de santé ..."></textarea>
                                            </div>

                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="adreAssoc" class="titles">Adresse</label>
                                                <textarea class="form-control" name="adreAssoc" id="adreAssoc" rows="2"
                                                    placeholder="Ex: AV 6 Rue XXX , Fez "></textarea>
                                            </div>

                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-lg-11 align-text-bottom">
                                            <button type="submit" class="Creer mt-4 float-right px-5">Ajouter</button>
                                        </div>
                                    </div>

                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

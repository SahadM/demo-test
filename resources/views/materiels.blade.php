@extends('layouts.template')

@section('content')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Gestion des materiels</h1>        
    </div>

    <div id="notification" class="alert alert-info mt-5" role="alert">
    Saisissez du materiel ci-dessous
    </div>

   
    <form id="formMateriel" action="{{ route('add_materiel') }}" method="post">
        {{ csrf_field() }}
        <div class="mb-3">
            <label for="materielNomInput" class="form-label">Nom du materiel</label>
            <input type="text" name="nom" class="form-control" id="materielNomInput">
        </div>
        <div class="mb-3">
            <label for="materielPrixInput" class="form-label">Prix du materiel</label>
            <input type="number" min="1" name="prix" class="form-control" id="materielPrixInput">
        </div>
        <button type="submit" class="btn btn-primary">Ajouter un materiel</button>
    </form>

    <hr>

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Liste des materiels</h1>
    </div>

    @if($materiels->count())
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Nom</th>
                    <th scope="col">Prix</th>
                    <th scope="col">Supprimer</th> 
                </tr>
            </thead>
            <tbody>
            @foreach($materiels as $materiel)
                <tr>
                    <th scope="row">{{$materiel->nom}}</th>
                    <td>{{$materiel->prix}} €</td>
                    <td>
                        <a href="{{ route('delete_materiel', ['id' => $materiel->id]) }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                        </svg>
                        </a>
                    </td>
                </tr>
            @endforeach
                
            </tbody>
        </table>

    @else
        <div class="alert alert-info mt-5" role="alert">
            Aucun materiel de saisi pour le moment !
        </div>
    @endif

</main>
<script type="text/javascript" src="{{ URL::asset('js/materiel.js') }}"></script>

@endsection


{{-- 
<ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item" role="presentation">
        <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Home</button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Profile</button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact-tab-pane" type="button" role="tab" aria-controls="contact-tab-pane" aria-selected="false">Contact</button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link" id="disabled-tab" data-bs-toggle="tab" data-bs-target="#disabled-tab-pane" type="button" role="tab" aria-controls="disabled-tab-pane" aria-selected="false" disabled>Disabled</button>
    </li>
</ul>
<div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">AAA</div>
    <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">BBB</div>
    <div class="tab-pane fade" id="contact-tab-pane" role="tabpanel" aria-labelledby="contact-tab" tabindex="0">CCC</div>
    <div class="tab-pane fade" id="disabled-tab-pane" role="tabpanel" aria-labelledby="disabled-tab" tabindex="0">DDD</div>
</div>
--}}


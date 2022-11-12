@extends('layouts.template')

@section('content')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Gestion des clients</h1>
    </div>

    <div id="notification" class="alert alert-info mt-5" role="alert">
        Saisissez un client ci-dessous
    </div>

    
    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">
                Ajouter un client
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">
                Liste des clients
            </button>
        </li>
    </ul>


    <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">
            <form id="formClient" action="{{ route('add_client') }}" method="post">
                {{ csrf_field() }}
                <div class="mb-3">
                    <label for="clientNomInput" class="form-label">Nom</label>
                    <input type="text" name="nom" class="form-control" id="clientNomInput">
                </div>
                <div class="mb-3">
                    <label for="clientPrenomInput" class="form-label">Prénom</label>
                    <input type="text" name="prenom" class="form-control" id="clientPrenomInput">
                </div>
                <div class="mb-3">
                    <label for="clientEmailInput" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" id="clientEmailInput">
                </div>
                <div class="mb-3">
                    <label for="clientCodePostalInput" class="form-label">Code postal</label>
                    <input type="email" name="code_postal" class="form-control" id="clientCodePostalInput">
                </div>
                <div class="mb-3">
                    <label for="clientVilleInput" class="form-label">Ville</label>
                    <input type="email" name="ville" class="form-control" id="clientVilleInput">
                </div>
                <button type="submit" class="btn btn-primary">Ajouter un client</button>
            </form>
        

        </div>

        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">
            @if ($clients->count())
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Nom</th>
                        <th scope="col">Prénom</th>
                        <th scope="col">Email</th>
                        <th scope="col">Code postal</th> 
                        <th scope="col">Ville</th>  
                        <th scope="col">Supprimer</th>  
                    </tr>
                </thead>
                <tbody>
                @foreach($clients as $client)
                    <tr>
                        <th scope="row">{{$client->nom}}</th>
                        <td>{{$client->prenom}}</td>
                        <td>{{$client->email}}</td>
                        <td>{{$client->code_postal}}</td>
                        <td>{{$client->ville}}</td>
                        <td>
                            <a href="{{ route('delete_client', ['id' => $client->id]) }}">
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
                    Aucun client de saisi pour le moment !
                </div>
            @endif
        </div>

    </div>





 
</main>
<script type="text/javascript" src="{{ URL::asset('js/client.js') }}"></script>

@endsection
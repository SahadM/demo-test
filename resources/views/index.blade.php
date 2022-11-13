@extends('layouts.template')

@section('content')
<style>
.sub-row{
    background: #f1f1f1
}
.hidden {
  display:none;
}
</style>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Assignation materiel client</h1>
    </div>

    <div id="notification" class="hide alert alert-info mt-5" role="alert">
    Assigner un matériel à un client<br>
    @if($message = Session::get('message'))
        {{$message}}
    @endif
    </div>

    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">
                Assigner un materiel à un client
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">
                Listes des materiels par client
            </button>
        </li>
    </ul>

    <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">
            <form id="formMaterielClient" action="{{ route('add_materiel_client') }}" method="post">
                {{ csrf_field() }}
                <div class="mb-3">
                    <label for="clientInput" class="form-label">Client</label>
                    <select name="client_id" class="form-select" aria-label="Default select example">
                        <option value="" selected>Sélectionner le client</option>
                        @foreach($clients as $client)
                             <option value="{{$client->id}}">{{$client->nom}} {{$client->prenom}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="nomMaterielInput" class="form-label">Nom du matériel</label>
                    <select name="materiel_id" class="form-select" aria-label="Default select example">
                        <option value="" selected>Sélectionner le matériel</option>
                        @foreach($materiels as $materiel)
                            <option value="{{$materiel->id}}">{{$materiel->nom}} - {{$materiel->prix}}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Assigner</button>
            </form>
        </div>

        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">
            @if ($table_lien->count())
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col" colspan="4">Client</th>
                    </tr>
                </thead>
                <tbody>

          

                @foreach($table_lien as $lien)
                    <tr>
                        <th scope="col" colspan="4">   
                            <button type="button" class="btn btn-secondary btn-sm" data-toggle="collapsing-{{$lien->id}}">
                                Afficher / Cacher
                            </button>                       
                            <span>&nbsp;{{$lien->nom}} {{$lien->prenom}}</span>
                        </th>
                    </tr>
                  
                    {{-- <tr class="collapsing-{{$lien->id}} collapse out"> --}}
                    <tr class="collapsing-{{$lien->id}} sub-row collapse out hidden">
                        <th scope="col"></th>
                        <th scope="col">Materiel</th>
                        <th scope="col">Prix</th>
                        <th scope="col">Soustraire</th>
                    </tr>
 
                    @foreach($lien->materiels as $materiel)
                        <tr class="collapsing-{{$lien->id}} sub-row collapse out hidden">
                            <td>#</td>
                            <td>{{$materiel->nom}}</td>
                            <td>{{number_format($materiel->prix, 2, ',', ' ')}} €</td>
                            <td>
                                <a href="{{ route('delete_client_materiel', ['id' => $materiel->pivot->lien_id]) }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                    </svg>
                                </a>
                            </td>
                        </tr>
                    @endforeach

                    </div>
                @endforeach
                </tbody>
            </table>

            @else
                <div class="alert alert-info mt-5" role="alert">
                    Aucun client n'a de matériels
                </div>
            @endif

        </div>

    </div>

</main>

<script type="text/javascript" src="{{ URL::asset('js/index.js') }}"></script>

@endsection

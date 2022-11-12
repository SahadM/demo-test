@extends('layouts.template')

@section('content')
<style>
.sub-row{
    background: #f1f1f1
}
</style>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    
   {{--
<div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div>
</div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>

    --}}     
    
    
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Assignation materiel client</h1>
    </div>

    <div id="notification" class="hide alert alert-info mt-5" role="alert">
    Assigner un matériel à un client
    </div>

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
        <button type="submit" class="btn btn-primary">Ajouter</button>
    </form>

    <hr>

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Liste des clients ayant des materiels</h1>
    </div>

  
    @if ($table_lien->count())
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Client</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
            @foreach($table_lien as $lien)
                <tr>
                    <th scope="row">{{$lien->nom}} {{$lien->prenom}}</th>
                    {{--
                    <td>
                        <a href="#" data-bs-title="Default tooltip">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                            </svg>
                        </a>
                    </td>
                     --}}
                </tr>

                <tr class="sub-row"><th scope="col" colspan="2">Matériel</th></th>
                @foreach($lien->materiels as $materiel)
                <tr class="sub-row">
                    <td>{{$materiel->nom}} - {{number_format($materiel->prix, 2, ',', ' ')}} €</td>
                    <td></td>
                </tr>
                @endforeach

            @endforeach
            </tbody>
        </table>
    @else
        <div class="alert alert-info mt-5" role="alert">
            Aucun client n'a de matériels
        </div>
    @endif
    </main>

    <script type="text/javascript" src="{{ URL::asset('js/index.js') }}"></script>

@endsection
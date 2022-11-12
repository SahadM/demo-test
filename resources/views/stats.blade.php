@extends('layouts.template')

@section('content')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Etats ventes par clients</h1>
    </div>

    <div class="alert alert-info mt-5" role="alert">
    Aperçu des performances par clients
    </div>

    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">
                Clients qui ont plus de 30 materiels vendus
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">
                Totaux des materiels vendus par clients
            </button>
        </li>
    </ul>

    <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">
            @if ($table_1->count())
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Client</th>
                            <th scope="col">Email</th>
                            <th scope="col">Code postal</th>
                            <th scope="col">Ville</th>
                            <th scope="col">Nombre de materiel</th>
                            <th scope="col">Total prix materiel</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($table_1 as $ligne)
                            <tr>
                                <th scope="row">{{$ligne->nom}} {{$ligne->prenom}}</th>
                                <td>{{$ligne->email}}</td>
                                <td>{{$ligne->code_postal}}</td>
                                <td>{{$ligne->ville}}</td>
                                <td>{{$ligne->nb_materiel}}</td>                      
                                <td>{{number_format($ligne->total_prix_materiel, 2, ',', ' ')}} €</td>                           
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            @else
                <div class="alert alert-info mt-5" role="alert">
                Aucun résultat pour le moment !
                </div>
           
            @endif

        </div>

        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">
            @if ($table_2->count())
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Client</th>
                        <th scope="col">Email</th>
                        <th scope="col">Code postal</th>
                        <th scope="col">Ville</th>
                        <th scope="col">Nombre de materiel</th>
                        <th scope="col">Total prix materiel</th>
                        <th scope="col">Rentabilité</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($table_2 as $ligne)                      
                        <tr style="{{ ($ligne->est_rentable === 'oui') ? 'background:#cbf9c0ee;': '' }}">
                            <th scope="row">{{$ligne->nom}} {{$ligne->prenom}}</th>
                            <td>{{$ligne->email}}</td>
                            <td>{{$ligne->code_postal}}</td>
                            <td>{{$ligne->ville}}</td>        
                            <td>{{$ligne->nb_materiel}}</td>               
                            <td>{{number_format($ligne->total_prix_materiel, 2, ',', ' ')}} €</td>
                            <td>{{$ligne->est_rentable}}</td>                       
                        </tr>
                    @endforeach
                </tbody>
            </table>

        @else
            <div class="alert alert-info mt-5" role="alert">
            Aucun résultat pour le moment !
            </div>
       
        @endif

        </div>

    </div>

</main>

@endsection
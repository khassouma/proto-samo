@extends('layouts.app')

@section('title')
{{$dossier->dg}}
@endsection

@section('content')
<br /><br /><br />
<div class="conatiner-fluid content-inner mt-n5 py-0">
        <div class="bd-example m-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dossiers') }}">Dossiers</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('add.dossier') }}">Ajouter un dossiers</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{$dossier->dg}}</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-sm-6 col-lg-6">
                <div class="card">
                  <div class="card-header d-flex justify-content-between">
                            <div class="header-title">
                                <h4 class="card-title">{{$dossier->tiers_payant}}</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">DG: {{$dossier->dg}}</li>
                                <li class="list-group-item">Feuilles: {{$dossier->nombre_fiches}} </li>
                                <li class="list-group-item">Type: {{strtoupper($dossier->type)}}</li>
                                <li class="list-group-item">Categorie: {{strtoupper($dossier->categorie)}}</li>
                                <li class="list-group-item">Equipe: {{$dossier->chef_equipe_id}}</li>
                                <li class="list-group-item">Probleme: {{ $dossier->has_issue ? 'OUI' : 'NON' }}</li>
                                <li class="list-group-item">Recepetion:  {{ \Carbon\Carbon::parse($dossier->date_reception)->format('d/m/y') }}</li>
                                <li class="list-group-item">Validation:  {{ \Carbon\Carbon::parse($dossier->date_validation)->format('d/m/y') }}</li>
                            </ul>
                            <a href="{{ route('update.dossier.view', $dossier->id) }}" class="btn btn-primary m-2">Modifier le dossier</a>
                        </div>
                    </div>
            </div>
            <div class="col-sm-6 col-lg-6">
                <div class="card">

                    <div class="card-body">
                        <h5 class="card-title">Commentaire</h5>
                        <p class="card-text"> {{ $dossier->has_issue ?  $dossier->issue_note : 'Aucun commentaire' }}</p>
                    </div>
                </div>
            </div>
        </div>
</div>

@endsection

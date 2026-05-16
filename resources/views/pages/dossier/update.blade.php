@extends('layouts.app')

@section('title')
    Modiffier dossier {{ $dossier->dg }}
@endsection

@section('content')
    <br /><br /><br />

    <div class="conatiner-fluid content-inner mt-n5 py-0">
        <div class="bd-example m-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dossiers') }}">Dossiers</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Ajouter un dossier</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-sm-12 col-lg-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Modification</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" enctype="multipart/form-data" action="{{ route('update.dossier', $dossier) }}">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label class="form-label" for="">Equipe</label>
                                <input type="text" class="form-control" name="team"
                                    value="{{ Auth::user()->team_id }}" disabled>
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="">DG</label>
                                <input type="text" name="dg" class="form-control" value="{{ $dossier->dg }}"
                                    maxlength="5" placeholder="Sans le DG" required>
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="">Tiers payant</label>
                                <input type="text" name="tiers_payant" class="form-control"
                                    value="{{ $dossier->tiers_payant }}" placeholder="P200/C238/H1">
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="">Nombre de feuilles</label>
                                <input type="number" name="nombre_fiches" class="form-control"
                                    value="{{ $dossier->nombre_fiches }}" required>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Note du problème</label>
                                <textarea name="issue_note" class="form-control" rows="4"
                                    placeholder="{{ $dossier->has_issue ? 'Décrire le problème...' : 'Aucun probleme' }}">{{ old('issue_note', $dossier->has_issue ?  $dossier->issue_note : '') }}</textarea>
                            </div>
                            <div class="form-group">
                                <label>
                                    <input type="hidden" name="has_issue" value="0">
                                    <input type="checkbox" name="has_issue" value="1"
                                        {{ old('has_issue', $dossier->has_issue) ? 'checked' : '' }}>

                                    A un problème
                                </label>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Statut</label>

                                <div class="form-check d-block">
                                    <input class="form-check-input" type="radio" name="statut" value="non_liquide"
                                        {{ old('statut', $dossier->statut) == 'non_liquide' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="">
                                        Non liquider
                                    </label>
                                </div>

                                <div class="form-check d-block">
                                    <input class="form-check-input" type="radio" name="statut" value="en_liquidation"
                                        {{ old('statut', $dossier->statut) == 'en_liquidation' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="">
                                        En liquidation
                                    </label>
                                </div>

                                <div class="form-check d-block">
                                    <input class="form-check-input" type="radio" name="statut" value="pre_controle"
                                        {{ old('statut', $dossier->statut) == 'pre_controle' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="">
                                        Pre-controle
                                    </label>
                                </div>

                                <div class="form-check d-block">
                                    <input class="form-check-input" type="radio" name="statut" value="valide"
                                        {{ old('statut', $dossier->statut) == 'valide' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="">
                                        OPSIS
                                    </label>
                                </div>

                                <div class="form-check d-block">
                                    <input class="form-check-input" type="radio" name="statut" value="archive"
                                        {{ old('statut', $dossier->statut) == 'archive' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="">
                                        Archiver
                                    </label>
                                </div>


                            </div>

                            <div class="form-group">
                                <label class="form-label">Categories</label>

                                <div class="form-check d-block">
                                    <input class="form-check-input" type="radio" name="categorie" value="normal"
                                        {{ old('categorie', $dossier->categorie) == 'normal' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="normal">
                                        Normal
                                    </label>
                                </div>

                                <div class="form-check d-block">
                                    <input class="form-check-input" type="radio" name="categorie" value="cscom"
                                        {{ old('categorie', $dossier->categorie) == 'cscom' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="cscom_csref">
                                        CSCom/CSRef
                                    </label>
                                </div>

                                <div class="form-check d-block">
                                    <input class="form-check-input" type="radio" name="categorie" value="hopital"
                                        {{ old('categorie', $dossier->categorie) == 'hopital' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="hopital">
                                        Hopital
                                    </label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Types</label>

                                <div class="form-check d-block">
                                    <input class="form-check-input" type="radio" name="type" value="pharmacie"
                                        {{ old('type', $dossier->type) == 'pharmacie' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="pharmacie">
                                        Pharmacies
                                    </label>
                                </div>

                                <div class="form-check d-block">
                                    <input class="form-check-input" type="radio" name="type" value="examens"
                                        {{ old('type', $dossier->type) == 'examens' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="examen">
                                        Examens
                                    </label>
                                </div>

                                <div class="form-check d-block">
                                    <input class="form-check-input" type="radio" name="type" value="soins"
                                        {{ old('type', $dossier->type) == 'soins' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="soins">
                                        Soins
                                    </label>
                                </div>

                            </div>

                            <button type="submit" class="btn btn-primary">Modifier</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection

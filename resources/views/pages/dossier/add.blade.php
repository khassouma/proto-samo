@extends('layouts.app')

@section('title')
Ajouter un dossier
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
                                <h4 class="card-title">Ajouter un dossier</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <form method="POST" enctype="multipart/form-data" action="{{route('store.dossier')}}">
                                @csrf
                                <div class="form-group">
                                    <label class="form-label" for="">Equipe</label>
                                    <input type="text" class="form-control"  name="team" value="{{Auth::user()->team_id}}" disabled>
                                </div>

                                <div class="form-group">
                                    <label class="form-label" for="">DG</label>
                                    <input type="text" name="dg" class="form-control" value="{{ old('dg') }}"  maxlength="5" placeholder="Sans le DG" required  >
                                </div>

                                <div class="form-group">
                                    <label class="form-label" for="">Tiers payant</label>
                                    <input type="text" name="tiers_payant" class="form-control" value="{{ old('tiers_payant') }}" placeholder="P200/C238/H1" >
                                </div>

                                <div class="form-group">
                                    <label class="form-label" for="">Nombre de feuilles</label>
                                    <input type="number" name="nombre_fiches" class="form-control" value="{{ old('nombre_fiches') }}"  required>
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Categories</label>

                                    <div class="form-check d-block">
                                    <input class="form-check-input" type="radio" name="categorie" id="normal" value="normal" checked>
                                    <label class="form-check-label" for="normal">
                                        Normal
                                    </label>
                                </div>

                                <div class="form-check d-block">
                                    <input class="form-check-input" type="radio" name="categorie" value="cscom" id="cscom_csref">
                                    <label class="form-check-label" for="cscom_csref">
                                        CSCom/CSRef
                                    </label>
                                </div>

                                <div class="form-check d-block">
                                    <input class="form-check-input" type="radio" name="categorie" value="hopital" id="hopital">
                                    <label class="form-check-label" for="hopital">
                                        Hopital
                                    </label>
                                </div>

                                <div class="form-group">
                                        <label class="form-label">Types</label>

                                        <div class="form-check d-block">
                                        <input class="form-check-input" type="radio" name="type" value="pharmacie" id="pharmacie" checked>
                                        <label class="form-check-label" for="pharmacie">
                                            Pharmacies
                                        </label>
                                    </div>
                                    <div class="form-check d-block">
                                        <input class="form-check-input" type="radio" value="examens" name="type" id="examen">
                                        <label class="form-check-label" for="examen">
                                            Examens
                                        </label>
                                    </div>

                                    <div class="form-check d-block">
                                        <input class="form-check-input" type="radio" value="soins" name="type" id="soins">
                                        <label class="form-check-label" for="soins">
                                            Soins
                                        </label>
                                    </div>

                                </div>

                                <button type="submit" class="btn btn-primary">Ajouter</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>

@endsection

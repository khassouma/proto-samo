@extends('layouts.app')

@section('title')
    Archives
@endsection

@section('content')
    <br /><br /><br />

    <div class="conatiner-fluid content-inner mt-n5 py-0">
        <div class="bd-example  m-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dossiers') }}">Dossiers</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Archives</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    @if (Session::has('status'))
                        <div class="alert alert-success">
                            {{ Session::get('status') }}
                        </div>
                    @endif
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Suivie des dossiers archiver</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        {{-- <p>Images in Bootstrap are made responsive with <code>.img-fluid</code>. <code>max-width: 100%;</code> and <code>height: auto;</code> are applied to the image so that it scales with the parent element.</p> --}}
                        <div class="table-responsive">
                            <table id="datatable" class="table table-striped" data-toggle="data-table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Tiers payant</th>
                                        <th>DG</th>
                                        <th>type</th>
                                        <th>categories</th>
                                        <th>Nombre de feuilles</th>
                                        <th>Statut</th>
                                        <th>date_reception</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($dossiers as $dossier)
                                        <tr class="{{ $dossier->has_issue ? 'table-warning' : '' }}">
                                            <td>{{ $dossier->id }}</td>
                                            <td>{{ $dossier->tiers_payant }}</td>
                                            <td>{{ $dossier->dg }}</td>
                                            <td>{{ $dossier->type }}</td>
                                            <td>{{ $dossier->categorie }}</td>
                                            <td>{{ $dossier->nombre_fiches }}</td>
                                            <td>{{ $dossier->statut }}</td>
                                            <td>{{ \Carbon\Carbon::parse($dossier->date_reception)->format('d/m/y') }}</td>
                                            <td>
                                                <div class="flex align-items-center list-user-action">
                                                    <a class="btn btn-sm btn-icon btn-success" data-bs-toggle="tooltip"
                                                        data-bs-placement="top" title="Voir"
                                                        href=" {{ route('show.dossier.view', $dossier->id) }} ">
                                                        <span class="btn-inner">
                                                            <svg class="icon-20" width="20" viewBox="0 0 24 24"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                                    d="M15.1614 12.0531C15.1614 13.7991 13.7454 15.2141 11.9994 15.2141C10.2534 15.2141 8.83838 13.7991 8.83838 12.0531C8.83838 10.3061 10.2534 8.89111 11.9994 8.89111C13.7454 8.89111 15.1614 10.3061 15.1614 12.0531Z"
                                                                    stroke="currentColor" stroke-width="1.5"
                                                                    stroke-linecap="round" stroke-linejoin="round"></path>
                                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                                    d="M11.998 19.355C15.806 19.355 19.289 16.617 21.25 12.053C19.289 7.48898 15.806 4.75098 11.998 4.75098H12.002C8.194 4.75098 4.711 7.48898 2.75 12.053C4.711 16.617 8.194 19.355 12.002 19.355H11.998Z"
                                                                    stroke="currentColor" stroke-width="1.5"
                                                                    stroke-linecap="round" stroke-linejoin="round"></path>
                                                            </svg>
                                                        </span>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Tiers-payant</th>
                                        <th>DG</th>
                                        <th>type</th>
                                        <th>categories</th>
                                        <th>Nombre de feuilles</th>
                                        <th>Status</th>
                                        <th>date_reception</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

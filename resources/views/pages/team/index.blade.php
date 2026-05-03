@extends('layouts.app')

@section('title')
    Equipe
@endsection

@section('content')
    <br /><br /><br />
    <div class="conatiner-fluid content-inner mt-n5 py-0">
        @if (Session::has('status'))
            <div class="alert alert-success">
                {{ Session::get('status') }}
            </div>
        @endif
        <div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div class="header-title">
                                <h4 class="card-title">Equipe {{ Auth::user()->name }}</h4>
                            </div>
                            <div>
                                <span>
                                    {{-- <button type="button" class="btn btn-primary"><a class="nav-link "
                                            href="{{ route('add.member') }}"><span
                                                class="item-name">Ajouter</span></a></button> --}}
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#staticBackdrop">
                                       Ajouter un membre
                                    </button>
                                </span>
                            </div>
                        </div>
                        <div class="card-body px-0">
                            <div class="table-responsive">
                                <table id="user-list-table" class="table table-striped" role="grid"
                                    data-bs-toggle="data-table">
                                    <thead>
                                        <tr class="ligth">
                                            <th>#</th>
                                            <th>Matricule</th>
                                            <th>Nom</th>
                                            <th>Role</th>
                                            <th style="min-width: 100px">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($members as $member)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td class="">{{ $member->matricule }}</td>
                                                <td>{{ $member->name }}</td>
                                                <td>{{ $member->role }}</td>
                                                <td>
                                                    <div class="flex align-items-center list-user-action">
                                                        <a class="btn btn-sm btn-icon btn-danger" data-bs-toggle="tooltip"
                                                            data-bs-placement="top" title="Supprimer">
                                                            <span class="btn-inner">
                                                                <form action="{{ route('delete.member', $member->id) }}"
                                                                    method="POST" style="display:inline;">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit"
                                                                        class="btn p-0 border-0 bg-transparent text-white text-decoration-none">
                                                                        <svg class="icon-20" width="20"
                                                                            viewBox="0 0 24 24" fill="none"
                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                            stroke="currentColor">
                                                                            <path
                                                                                d="M19.3248 9.46826C19.3248 9.46826 18.7818 16.2033 18.4668 19.0403C18.3168 20.3953 17.4798 21.1893 16.1088 21.2143C13.4998 21.2613 10.8878 21.2643 8.27979 21.2093C6.96079 21.1823 6.13779 20.3783 5.99079 19.0473C5.67379 16.1853 5.13379 9.46826 5.13379 9.46826"
                                                                                stroke="currentColor" stroke-width="1.5"
                                                                                stroke-linecap="round"
                                                                                stroke-linejoin="round">
                                                                            </path>
                                                                            <path d="M20.708 6.23975H3.75"
                                                                                stroke="currentColor" stroke-width="1.5"
                                                                                stroke-linecap="round"
                                                                                stroke-linejoin="round"></path>
                                                                            <path
                                                                                d="M17.4406 6.23973C16.6556 6.23973 15.9796 5.68473 15.8256 4.91573L15.5826 3.69973C15.4326 3.13873 14.9246 2.75073 14.3456 2.75073H10.1126C9.53358 2.75073 9.02558 3.13873 8.87558 3.69973L8.63258 4.91573C8.47858 5.68473 7.80258 6.23973 7.01758 6.23973"
                                                                                stroke="currentColor" stroke-width="1.5"
                                                                                stroke-linecap="round"
                                                                                stroke-linejoin="round"></path>
                                                                        </svg>
                                                                    </button>
                                                                </form>
                                                            </span>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="{{ route('add.member') }}">
                            @csrf
                            <div class="list-group">
                                @foreach ($users as $user)
                                    <div class="form-check d-block">
                                        <input class="form-check-input" type="checkbox" name="users[]"
                                            id="user_{{ $user->id }}" value="{{ $user->id }}">
                                        <label class="form-check-label" for="user_{{ $user->id }}">
                                            {{ $user->name }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>

                            <button type="submit" class="btn btn-primary mt-3">
                                Ajouter
                            </button>
                        </form>
                    </div>
                    {{-- <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Understood</button>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
@endsection

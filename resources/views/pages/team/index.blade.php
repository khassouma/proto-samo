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
        @if ($user->isChefEquipe())
            @include('partials.team-management')
        @else
            @include('partials.team-management-chef')
        @endif

    </div>
@endsection

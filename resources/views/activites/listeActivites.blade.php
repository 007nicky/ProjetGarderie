@extends('principale.app')
@section('content')

    {{-- Si des infos ont bien été modifiés --}}
    @if ($message = Session::get('success'))
        <div class="mb-3 text-danger">
            <p>{{ $message }}</p>
        </div>
    @endif
    {{-- Recuperer la liste des activites et afficher --}}
    <br class="mb-4">
    <strong> Liste des activites:</strong>
    @if ($activites->count())
        @foreach ($activites as $activite)
            <br>
            <a href="{{ route('pageActivite', $activite) }}">{{ $activite->nom }}</a>
            {{-- <a href="{{ route('formationsEducatrice') }}">Ajouter
                formation/specialistaion</a> --}}
            <a href="{{ route('inscrireenfant', $activite) }}">Inscrire enfant</a>

        @endforeach
    @else
        <p>Pas d'activite</p>
    @endif




@endsection

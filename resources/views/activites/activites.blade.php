@extends('principale.app')
@section('content')

    Vous etes dans Espace Activites


    @if ($activite->count())

        <p>Nom: {{ $activite->nom }}</p>

        <p>Type: {{ $activite->type }}</p>

        <p>Description: {{ $activite->description }}</p>

        <p>Nom de places max: {{ $activite->places }}</p>

        <p>Prix: {{ $activite->prix }}$</p>

        <p>Debut: {{ $activite->date_debut }} {{ $activite->heure_debut }}</p>

        <p>Fin: {{ $activite->date_fin }} {{ $activite->heure_fin }}</p>

        <p>Educatrice en charge: {{ $activite->educatrice->name }}</p>


        <p>Liste des enfants inscrits: @foreach ($activite->enfant as $enfant)
                <p>{{ $enfant->name }} {{ $enfant->lastname }}
                </p>
            @endforeach
        </p>

        <a class="btn btn-outline-primary mr-2" href="{{ route('modifieractivite', $activite) }}">Modifier details</a>

    @else
        <p>Inexistant</p>
    @endif


    @yield('activitecontent')

@endsection

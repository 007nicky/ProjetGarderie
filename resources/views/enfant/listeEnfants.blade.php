@extends('principale.app')
@section('content')

    {{-- Si des infos ont bien été modifiés --}}
    @if ($message = Session::get('success'))
        <div class="mb-3 text-danger">
            <p>{{ $message }}</p>
        </div>
    @endif

    {{-- Recuperer la liste des enfants et afficher --}}
    <br class="mb-4">
    @if ($enfants->count())

        <div class="card mx-auto" style="width: 18rem;">
            <p class="fw-bold"> Liste des enfants:</p>
            <ul class="list-group list-group-flush">

                @foreach ($enfants as $enfant)
                    <br>
                    <li class="list-group-item"><a href="{{ route('pageEnfant', $enfant) }}">{{ $enfant->name }}
                            {{ $enfant->lastname }}</a></li>

                @endforeach
            </ul>

        </div>
    @else
        <p>Pas d'enfants</p>
    @endif

@endsection

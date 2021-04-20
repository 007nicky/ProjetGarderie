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
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Nom</th>
                    <th scope="col"></th>
                </tr>
            </thead>

            @foreach ($activites as $activite)
                <br>
                <tbody>
                    <tr>
                        <td> <a href="{{ route('pageActivite', $activite) }}">{{ $activite->nom }}</a>
                        </td>
                        <td> <a href="{{ route('inscrireenfant', $activite) }}">Inscrire enfant</a></td>
                    </tr>

                </tbody>


            @endforeach
        </table>

    @else
        <p>Pas d'activite</p>
    @endif




@endsection

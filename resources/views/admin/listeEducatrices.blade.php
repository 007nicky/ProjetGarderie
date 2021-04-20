@extends('admin.admin')
@section('admincontent')

    {{-- Si des infos ont bien été modifiés --}}
    @if ($message = Session::get('success'))
        <div class="mb-3 text-danger">
            <p>{{ $message }}</p>
        </div>
    @endif
    {{-- Recuperer la liste des educatrice et afficher --}}
    <br class="mb-4">
    @if ($educatrices->count())




        <div class="card position-absolute top-50 start-50 translate-middle" style="width: 18rem;">
            <strong> Liste des educatrices:</strong>

            <ul class="list-group list-group-flush">

                @foreach ($educatrices as $educatrice)
                    <br>

                    <li class="list-group-item"><a
                            href="{{ route('pageEducatrice', $educatrice) }}">{{ $educatrice->name }}
                            {{ $educatrice->lastname }}</a></li>

                @endforeach
            </ul>

        </div>

    @else
        <p>Pas d'educatrices</p>
    @endif

@endsection

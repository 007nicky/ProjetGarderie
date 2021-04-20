@extends('principale.app')
@section('content')

    {{-- Afficher les erreurs envoyes par le controlleur si les identifiants sont invalides --}}
    @if (session('status'))
        <div class="mb-3 text-danger">
            {{ session('status') }}
        </div>
    @endif

    {{-- Formulaire d'authentification --}}
    <form class="mx-auto" action="{{ route('logineducatrice') }}" method="post" novalidate>
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Prenom</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Prenom de l'educatrice"
                value="{{ old('name') }}" required>

            <div class="invalid-feedback">
                Champ Vide ou invalide
            </div>

        </div>

        <div class="mb-3">
            <label for="lastname" class="form-label">Nom</label>
            <input type="text" class="form-control" name="lastname" id="lastname" placeholder="Nom de l'educatrice"
                value="{{ old('lastname') }}" required>

            <div class="invalid-feedback">
                Champ Vide ou invalide
            </div>

        </div>


        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" name="password" id="password" placeholder="Mot de passe" required>

            <div class="invalid-feedback">
                Champ Vide ou invalide
            </div>
        </div>

        <div class="mb-3">
            <input type="checkbox" name="remember" id="remember">
            <label for="remember">
                Me garder connecté
            </label>
        </div>

        <button type="submit" class="btn btn-primary">Se connecter</button>
    </form>
@endsection

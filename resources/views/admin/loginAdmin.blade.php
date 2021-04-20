@extends('principale.app')
@section('content')

    {{-- Afficher les erreurs envoyes par le controlleur si les identifiants sont invalides --}}
    @if (session('status'))
        <div class="mb-3 text-danger">
            {{ session('status') }}
        </div>
    @endif

    {{-- Formulaire d'authentification --}}
    <form class="mx-auto" action="{{ route('login') }}" method="post" novalidate>
        @csrf

        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" name="username" id="username" placeholder="Admin username"
                value="{{ old('username') }}" required>

            <div class="invalid-feedback">
                Champ Vide ou invalide
            </div>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" name="password" id="password" placeholder="Your password" required>

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

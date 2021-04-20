@extends('admin.admin')
@section('admincontent')

    {{-- Afficher les erreurs de validation que retourne le controlleur s'il y en a --}}
    @if ($errors->any())
        <div class="mb-3 text-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="container-md bg-light  shadow-lg p-4 mb-3">
        <!-- Modal body SignUp -->
        <div class="d-flex justify-content-center ">
            <form action="{{ route('registereducatrice') }}" method="POST">
                @csrf
                <div class="form-row">
                    <h2 class="text-centre">Création d'un compte Éducatrice</h2>
                </div>
                <br>
                <h4 class="text-left text-muted">Information sur l'éducatrice</h4>
                <!-- Nom et prenom-->
                <div class="form-row">
                    <div class="col">
                        <input type="text" class="form-control" id="name" placeholder="Prénom" name="name" required>
                        <div class="valid-feedback">Valider.</div>
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" id="lastname" placeholder="Nom" name="lastname" required>
                        <div class="valid-feedback">Valider.</div>
                    </div>
                </div>
                <!-- Date de naissance et Sexe-->

                <br>
                <div class="form-row">
                    <div class="col">
                        <span class="text-muted"><i class=" fa fa-calendar"> </i> Date de naissance</span>
                        <input type="date" class="form-control" id="date_naissance" placeholder="AAAA/MM/JJ"
                            name="date_naissance" required>
                    </div>


                    <br>
                    <div class="mb-1">
                        <input class="form-check-input" type="radio" name="sexe" id="masculin" value="homme">
                        <label class="form-check-label" for="masculin">
                            Masculin
                        </label>
                    </div>
                    <div class="mb-3">
                        <input class="form-check-input" type="radio" name="sexe" id="feminin" value="femme" checked>
                        <label class="form-check-label" for="feminin">
                            Feminin
                        </label>
                    </div>
                </div>
                <br>
                <div class="form-row">
                    <span for="date_embauche" class="text-muted">Date d'embauche</span>

                    <input type="date" class="form-control" name="date_embauche" id="date_embauche"
                        placeholder="Date d'embauche de l'educatrice" value="{{ old('lastname') }}" required>

                </div>
                <!-- Formations et specialisations-->

                <br>
                <div class="form-row">
                    <span for="formation" class="text-muted">Formations</span>
                    <input type="text" class="form-control" name="formation" id="formation"
                        placeholder="Ajouter une formation" value="{{ old('formation') }}" required>

                </div>

                <br>
                <div class="form-row">
                    <span for="specialisation" class="text-muted">Specialisations</span>
                    <input type="text" class="form-control" name="specialisation" id="specialisation"
                        placeholder="Ajouter une specialisation" value="{{ old('specialisation') }}" required>

                </div>


                <br>
                <div class="form-row">
                    <input type="password" class="form-control" name="password" id="password" placeholder="Mot de passe"
                        required>

                    <div class="invalid-feedback">
                        Champ Vide ou invalide
                    </div>

                </div>

                <div class="form-row">
                    <input type="password" class="form-control" name="password_confirmation" id="password_confirmation"
                        placeholder="Repeat Your password" required>


                </div>

                <br>
                <!-- Bouton soumetre-->
                <div class="">
                    <button type="submit" name="signup" class="btn btn-success btn-block">Créer un compte</button>
                </div>
            </form>
        </div>
    </div>
@endsection

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- CSS only -->
    <link rel="stylesheet" href="{{ asset('css/detailsEnfants.css') }}" />
    <title>D&eacute;tails Enfant</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
        body {
            margin: 0;
            font-family: Arial;
            background-image: url({{ asset('garderie1.jpg') }});
        }

        .topnav {
            overflow: hidden;
            background-color: #333;
        }

        .topnav a {
            float: left;
            display: block;
            color: #f2f2f2;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
            font-size: 17px;
        }

        .active {
            background-color: #4CAF50;
            color: white;
        }

        .topnav .icon {
            display: none;
        }

        .dropdown {
            float: left;
            overflow: hidden;
        }

        .dropdown .dropbtn {
            font-size: 17px;
            border: none;
            outline: none;
            color: white;
            padding: 14px 16px;
            background-color: inherit;
            font-family: inherit;
            margin: 0;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
        }

        .dropdown-content a {
            float: none;
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            text-align: left;
        }

        .topnav a:hover,
        .dropdown:hover .dropbtn {
            background-color: #555;
            color: white;
        }

        .dropdown-content a:hover {
            background-color: #ddd;
            color: black;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        @media screen and (max-width: 600px) {

            .topnav a:not(:first-child),
            .dropdown .dropbtn {
                display: none;
            }

            .topnav a.icon {
                float: right;
                display: block;
            }
        }

        @media screen and (max-width: 600px) {
            .topnav.responsive {
                position: relative;
            }

            .topnav.responsive .icon {
                position: absolute;
                right: 0;
                top: 0;
            }

            .topnav.responsive a {
                float: none;
                display: block;
                text-align: left;
            }

            .topnav.responsive .dropdown {
                float: none;
            }

            .topnav.responsive .dropdown-content {
                position: relative;
            }

            .topnav.responsive .dropdown .dropbtn {
                display: block;
                width: 100%;
                text-align: left;
            }

        }

    </style>

</head>

<body>

    <section>
        <div class="topnav" id="myTopnav">
            <a class="active" href="{{ route('acceuil') }}"><i class="fa fa-home"></i></a>
            @if (Auth::guard('educatrice')->check())

                <a href="{{ route('ajouteractivite') }}">Ajouter
                    activite</a>
                <a href="{{ route('listeactivites') }}">Liste
                    activites</a>


                <a href="{{ route('ajouterenfant') }}">Ajouter enfant </a>

                <a href="{{ route('listenfants') }}">Liste
                    enfants</a>

            @elseif (Auth::guard('admin')->check())

                <a href="{{ route('ajouteractivite') }}">Ajouter
                    activite</a>
                <a href="{{ route('listeactivites') }}">Liste
                    activites</a>


                <a href="{{ route('registereducatrice') }}">Ajouter
                    educatrice</a>

                <a href="{{ route('listeducatrices') }}">Liste
                    educatrices</a>


                <a href="{{ route('ajouterenfant') }}">Ajouter
                    enfant</a>
                <a href="{{ route('listenfants') }}">Liste
                    enfants</a>

            @endif
        </div>

        <div class="container-md bg-light  shadow-lg p-4 mb-3">
            <!-- Modal body SignUp -->
            <div class="d-flex justify-content-center ">
                <form action="{{ route('ajouterenfant') }}" method="POST">
                    @csrf
                    <div class="form-row">
                        <h2 class="text-centre">Création d'un compte Enfant</h2>
                    </div>
                    <br>
                    <h4 class="text-left text-muted">Information sur l'enfant</h4>
                    <!-- Nom et prenom-->
                    <div class="form-row">
                        <div class="col">
                            <input type="text" class="form-control" id="name" placeholder="Prénom" name="name" required>
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" id="lastname" placeholder="Nom" name="lastname"
                                required>
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
                        <div class="col">
                            <input class="form-check-input" type="radio" name="sexe" id="masculin" value="homme">
                            <span class="form-check-label" for="masculin">
                                Masculin
                            </span>
                        </div>
                        <div class="col">
                            <input class="form-check-input" type="radio" name="sexe" id="feminin" value="femme" checked>
                            <span class="form-check-label" for="feminin">
                                Feminin
                            </span>
                        </div>
                    </div>
                    <br>

                    <!-- Vaccins et allergies-->

                    <div class="form-row">

                        <span for="vaccins" class="text-muted">Les vaccins</span>

                        @if ($vaccins->count())
                            <p>
                                @foreach ($vaccins as $vaccin)

                                    <input type="checkbox" name="vaccins[]" value="{{ $vaccin->description }}">
                                    {{ $vaccin->description }}

                                @endforeach
                            </p>

                            <div class="col">
                                <input type="text" class="form-control" name="vaccin" id="vaccin"
                                    placeholder="Ajouter un vaccin" value="{{ old('vaccin') }}">

                            </div>
                        @else
                            <div class="col">
                                <label for="vaccin" class="form-label">Ajouter un vaccin</label>
                                <input type="text" class="form-control" name="vaccin" id="vaccin"
                                    placeholder="Description du vaccin" value="{{ old('vaccin') }}">

                            </div>
                        @endif

                    </div>


                    <br>
                    <div class="form-row">

                        <span for="allergies" class="text-muted">Les allergies</span>

                        @if ($allergies->count())
                            <p>
                                @foreach ($allergies as $allergie)

                                    <input type="checkbox" name="allergies[]" value="{{ $allergie->description }}">
                                    {{ $allergie->description }}

                                @endforeach
                            </p>

                            <div class="col">
                                <input type="text" class="form-control" name="allergie" id="allergie"
                                    placeholder="Ajouter une allergie" value="{{ old('allergie') }}">

                            </div>
                        @else
                            <div class="col">
                                <label for="vaccin" class="form-label">Ajouter une allergie</label>
                                <input type="text" class="form-control" name="allergie" id="allergie"
                                    placeholder="Description de l'allergie" value="{{ old('allergie') }}">

                            </div>
                        @endif

                    </div>
                    <br>

                    <!-- Problemes comportements et contraintes medicales-->
                    <div class="form-row">

                        <span for="comportement" class="text-muted">Les problemes comportementaux de l'enfant</span>
                        <div class="col">
                            <input type="text" class="form-control" name="comportement" id="comportement"
                                placeholder="Ajouter un type de probleme" value="{{ old('comportement') }}">

                            <div class="invalid-feedback">
                                Champ Vide ou invalide
                            </div>
                        </div>

                        <div class="col">
                            <textarea class="form-control" name="descriptioncomportement" id="descriptioncomportement"
                                placeholder="Description du probleme"
                                required>{{ old('descriptioncomportement') }}</textarea>

                        </div>

                    </div>

                    <br>
                    <div class="form-row">

                        <span for="cmedicale" class="text-muted"> Les contraintes medicales de l'enfant</span>

                        <div class="col">
                            <input type="text" class="form-control" name="cmedicale" id="cmedicale"
                                placeholder="Ajouter une contrainte medicale" value="{{ old('cmedicale') }}"
                                required>
                        </div>

                        <div class="col">
                            <textarea class="form-control" name="descriptioncmedicale" id="descriptioncmedicale"
                                placeholder="Description de la contrainte"
                                required>{{ old('descriptioncmedicale') }}</textarea>
                        </div>

                    </div>
                    <br>

                    <!-- Educatrices-->
                    <div class="form-row">
                        <span for="educatrices" class="text-muted">Assigner une educatrice</span>
                        @if ($educatrices->count())

                            <select name="educatrices" id="educatrices">
                                @foreach ($educatrices as $educatrice)

                                    <option value="{{ $educatrice->id }}">{{ $educatrice->name }}
                                        {{ $educatrice->lastname }}
                                    </option>
                                @endforeach

                            </select>

                        @else
                            <p>Pas d'educatrices</p>
                        @endif

                    </div>

                    <br>

                    <!-- Programmes-->
                    <div class="form-row">

                        <span for="programmes" class="text-muted">Choisir un programme</span>

                        <select name="programmes" id="programmes">
                            <option value="">Selectionner un programme</option>
                            <option value="Programme 1">Programme 1</option>
                            <option value="Programme 2">Programme 2</option>
                            <option value="Programme 3">Programme 3</option>
                            <option value="Programme 4">Programme 4</option>
                        </select>

                        <div class="invalid-feedback">
                            Champ Vide ou invalide
                        </div>
                    </div>

                    <br>

                    <!--<p>Coordonnées Tuteur/Recuperateurs</p>-->
                    <div class="form-row">
                        <span class="text-muted">Coordonnées Tuteur Principale</span>

                        <input type="text" class="form-control" name="tuteurname" id="tuteurname" placeholder="Nom"
                            value="{{ old('tuteurname') }}" required>
                        <input type="text" class="form-control" name="tuteurlastname" id="tuteurlastname"
                            placeholder="Prenom" value="{{ old('tuteurlastname') }}" required>
                        <input type="text" class="form-control" name="tuteuremail" id="tuteuremail" placeholder="Email"
                            value="{{ old('tuteuremail') }}" required>
                        <input type="text" class="form-control" name="tuteurphone" id="tuteurphone"
                            placeholder="Telephone" value="{{ old('tuteurphone') }}" required>

                        <div class="mb-1">
                            <input class="form-check-input" type="radio" name="tuteur" id="principale"
                                value="principale" checked>
                            <span class="form-check-label" for="principale">
                                Tuteur principale
                            </span>
                        </div>
                        <div class="mb-3">
                            <input class="form-check-input" type="radio" name="tuteur" id="secondaire"
                                value="secondaire" disabled>
                            <span class="form-check-label" for="secondaire">
                                Tuteur secondaire
                            </span>
                        </div>

                    </div>

                    <br>

                    <div class="form-row">
                        <span class="text-muted">Coordonnées Récuperateur</span>

                        <input type="text" class="form-control" name="recuperateurname" id="recuperateurname"
                            placeholder="Nom" value="{{ old('recuperateurname') }}" required>
                        <input type="text" class="form-control" name="recuperateurlastname" id="recuperateurlastname"
                            placeholder="Prenom" value="{{ old('recuperateurlastname') }}" required>
                        <input type="text" class="form-control" name="recuperateuremail" id="recuperateuremail"
                            placeholder="Email" value="{{ old('recuperateuremail') }}" required>
                        <input type="text" class="form-control" name="recuperateurphone" id="recuperateurphone"
                            placeholder="Telephone" value="{{ old('recuperateurphone') }}" required>


                        <div class="invalid-feedback">
                            Champ Vide ou invalide
                        </div>
                    </div>



                    <br>
                    <!-- Bouton soumetre-->
                    <div class="">
                        <button type="submit" name="signup" class="btn btn-success btn-block">Créer un compte</button>
                    </div>
                </form>
            </div>
        </div>

    </section>
</body>

</html>


{{-- <br class="mb-4">
    <strong> Liste des vaccins:</strong>
    @if ($vaccins->count())
        @foreach ($vaccins as $vaccin)
            <br>
            <a href="">{{ $vaccin->description }}</a>

            <span>{{ $vaccin->enfant->count() }}</span>

        @endforeach
    @else
        <p>Pas de vaccin</p>
    @endif --}}



{{-- Formulaire d'enregistrement, juste un prototype --}}
{{-- <form class="" action="{{ route('ajouterenfant') }}" method="post" novalidate>
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Prenom</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Prenom de l'enfant"
                    value="{{ old('name') }}" required>

                <div class="invalid-feedback">
                    Champ Vide ou invalide
                </div>

            </div>

            <div class="mb-3">
                <label for="lastname" class="form-label">Nom</label>
                <input type="text" class="form-control" name="lastname" id="lastname" placeholder="Nom de l'enfant"
                    value="{{ old('lastname') }}" required>

                <div class="invalid-feedback">
                    Champ Vide ou invalide
                </div>

            </div>


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

            <div class="mb-3">
                <label for="date_naissance" class="form-label">Date de naissance</label>
                <input type="date" class="form-control" name="date_naissance" id="date_naissance"
                    placeholder="Date de naissance de l'enfant" value="{{ old('date_naissance') }}" required>

                <div class="invalid-feedback">
                    Champ Vide ou invalide
                </div>
            </div>

            <div class="mb-3">

                <label for="vaccins" class="form-label"><strong> Les vaccins</strong></label><br>

                @if ($vaccins->count())
                    @foreach ($vaccins as $vaccin)

                        <label><input type="checkbox" name="vaccins[]" value="{{ $vaccin->description }}">
                            {{ $vaccin->description }}</label> <br>

                    @endforeach

                    <div class="mb-3">
                        <input type="text" class="form-control" name="vaccin" id="vaccin"
                            placeholder="Ajouter un vaccin" value="{{ old('vaccin') }}" required>

                        <div class="invalid-feedback">
                            Champ Vide ou invalide
                        </div>
                    </div>
                @else
                    <div class="mb-3">
                        <label for="vaccin" class="form-label">Ajouter un vaccin</label>
                        <input type="text" class="form-control" name="vaccin" id="vaccin"
                            placeholder="Description du vaccin" value="{{ old('vaccin') }}" required>

                        <div class="invalid-feedback">
                            Champ Vide ou invalide
                        </div>
                    </div>
                @endif

            </div>

            <div class="mb-3">

                <label for="allergies" class="form-label"><strong> Les allergies</strong></label><br>

                @if ($allergies->count())
                    @foreach ($allergies as $allergie)

                        <label><input type="checkbox" name="allergies[]" value="{{ $allergie->description }}">
                            {{ $allergie->description }}</label> <br>

                    @endforeach

                    <div class="mb-3">
                        <input type="text" class="form-control" name="allergie" id="allergie"
                            placeholder="Ajouter une allergie" value="{{ old('allergie') }}" required>

                        <div class="invalid-feedback">
                            Champ Vide ou invalide
                        </div>
                    </div>
                @else
                    <div class="mb-3">
                        <label for="vaccin" class="form-label">Ajouter une allergie</label>
                        <input type="text" class="form-control" name="allergie" id="allergie"
                            placeholder="Description de l'allergie" value="{{ old('allergie') }}" required>

                        <div class="invalid-feedback">
                            Champ Vide ou invalide
                        </div>
                    </div>
                @endif

            </div>

            <div class="mb-3">

                <label for="comportement" class="form-label"><strong> Les problemes comportementaux de
                        l'enfant</strong></label><br>

                <div class="mb-3">
                    <input type="text" class="form-control" name="comportement" id="comportement"
                        placeholder="Ajouter un type de probleme" value="{{ old('comportement') }}" required>

                    <div class="invalid-feedback">
                        Champ Vide ou invalide
                    </div>
                </div>

                <div class="mb-3">
                    <textarea class="form-control" name="descriptioncomportement" id="descriptioncomportement"
                        placeholder="Description du probleme"
                        required>{{ old('descriptioncomportement') }}</textarea>

                    <div class="invalid-feedback">
                        Champ Vide ou invalide
                    </div>
                </div>

            </div>

            <div class="mb-3">

                <label for="cmedicale" class="form-label"><strong> Les contraintes medicales de
                        l'enfant</strong></label><br>

                <div class="mb-3">
                    <input type="text" class="form-control" name="cmedicale" id="cmedicale"
                        placeholder="Ajouter une contrainte medicale" value="{{ old('cmedicale') }}" required>

                    <div class="invalid-feedback">
                        Champ Vide ou invalide
                    </div>
                </div>

                <div class="mb-3">
                    <textarea class="form-control" name="descriptioncmedicale" id="descriptioncmedicale"
                        placeholder="Description de la contrainte"
                        required>{{ old('descriptioncmedicale') }}</textarea>

                    <div class="invalid-feedback">
                        Champ Vide ou invalide
                    </div>
                </div>

            </div>

            <div class="mb-3">

                <label for="educatrices" class="form-label"><strong>Assigner une educatrice</strong></label><br>

                @if ($educatrices->count())

                    <select name="educatrices" id="educatrices">
                        @foreach ($educatrices as $educatrice)

                            <option value="{{ $educatrice->id }}">{{ $educatrice->name }}
                                {{ $educatrice->lastname }}
                            </option>
                        @endforeach

                    </select>

                @else
                    <p>Pas d'educatrices</p>
                @endif

                <div class="invalid-feedback">
                    Champ Vide ou invalide
                </div>
            </div>

            <div class="mb-3">

                <label for="programmes" class="form-label"><strong>Choisir un programme</strong></label><br>

                <select name="programmes" id="programmes">
                    <option value="">Selectionner un programme</option>
                    <option value="Programme 1">Programme 1</option>
                    <option value="Programme 2">Programme 2</option>
                    <option value="Programme 3">Programme 3</option>
                    <option value="Programme 4">Programme 4</option>
                </select>

                <div class="invalid-feedback">
                    Champ Vide ou invalide
                </div>
            </div>

            <p>Coordonnées Tuteur Principale</p>

            <div class="mb-3">
                <input type="text" class="form-control" name="tuteurname" id="tuteurname" placeholder="Nom"
                    value="{{ old('tuteurname') }}" required>
                <input type="text" class="form-control" name="tuteurlastname" id="tuteurlastname" placeholder="Prenom"
                    value="{{ old('tuteurlastname') }}" required>
                <input type="text" class="form-control" name="tuteuremail" id="tuteuremail" placeholder="Email"
                    value="{{ old('tuteuremail') }}" required>
                <input type="text" class="form-control" name="tuteurphone" id="tuteurphone" placeholder="Telephone"
                    value="{{ old('tuteurphone') }}" required>

                <div class="mb-1">
                    <input class="form-check-input" type="radio" name="tuteur" id="principale" value="principale"
                        checked>
                    <label class="form-check-label" for="principale">
                        Tuteur principale
                    </label>
                </div>
                <div class="mb-3">
                    <input class="form-check-input" type="radio" name="tuteur" id="secondaire" value="secondaire"
                        disabled>
                    <label class="form-check-label" for="secondaire">
                        Tuteur secondaire
                    </label>
                </div>

                <div class="invalid-feedback">
                    Champ Vide ou invalide
                </div>
            </div>

            <p>Coordonnées Récuperateur</p>
            <div class="mb-3">
                <input type="text" class="form-control" name="recuperateurname" id="recuperateurname" placeholder="Nom"
                    value="{{ old('recuperateurname') }}" required>
                <input type="text" class="form-control" name="recuperateurlastname" id="recuperateurlastname"
                    placeholder="Prenom" value="{{ old('recuperateurlastname') }}" required>
                <input type="text" class="form-control" name="recuperateuremail" id="recuperateuremail"
                    placeholder="Email" value="{{ old('recuperateuremail') }}" required>
                <input type="text" class="form-control" name="recuperateurphone" id="recuperateurphone"
                    placeholder="Telephone" value="{{ old('recuperateurphone') }}" required>


                <div class="invalid-feedback">
                    Champ Vide ou invalide
                </div>
            </div>


            <button type="submit" class="btn btn-primary">Ajouter Enfant</button>
        </form> --}}

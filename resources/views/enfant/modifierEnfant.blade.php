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
                <form action="{{ route('modifierenfant', $enfant) }}" method="POST">
                    @csrf
                    <div class="form-row">
                        <h1 class="text-centre">D&eacute;tails Enfant</h1>
                    </div>
                    <br>
                    <h4 class="text-left text-muted">Information sur l'enfant</h4>
                    <!-- Nom et prenom-->
                    <div class="form-row">
                        <div class="col">
                            <input type="text" class="form-control" id="name" placeholder="Prénom" name="name"
                                value="{{ $enfant->name }}">
                        </div>

                        @error('name')
                            <p class="mb-3 text-danger">{{ $message }}</p>
                        @enderror

                        <div class="col">
                            <input type="text" class="form-control" id="lastname" placeholder="Nom" name="lastname"
                                value="{{ $enfant->lastname }}">
                        </div>

                        @error('lastname')
                            <p class="mb-3 text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <!-- Date de naissance et Sexe-->

                    <br>
                    <div class="form-row">
                        <div class="col">
                            <span class="text-muted"><i class=" fa fa-calendar"> </i> Date de naissance</span>
                            <input type="date" class="form-control" id="date_naissance" placeholder="AAAA/MM/JJ"
                                name="date_naissance" value="{{ $enfant->date_naissance }}">
                        </div>
                        @error('date_naissance')
                            <p class="mb-3 text-danger">{{ $message }}</p>
                        @enderror

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
                        @error('sexe')
                            <p class="mb-3 text-danger">{{ $message }}</p>
                        @enderror

                    </div>
                    <br>

                    <!-- Vaccins et allergies-->

                    <div class="form-row">
                        <div class="form-row">

                            <span for="vaccins" class="form-label"><strong> Liste des vaccins actuels de
                                    l'enfant</strong></span><br>

                            @if ($enfant->vaccin->count())
                                @foreach ($enfant->vaccin as $vaccin)

                                    <p>{{ $vaccin->description }} </p>

                                @endforeach
                            @endif

                        </div>
                        <span for="vaccins" class="text-muted"> Les autres vaccins</span>

                        @if ($vaccins->count())
                            <p>
                                @foreach ($vaccins as $vaccin)

                                    <input type="checkbox" name="vaccins[]" value="{{ $vaccin->description }}">
                                    {{ $vaccin->description }}

                                @endforeach
                            </p>
                            @error('vaccins')
                                <p class="mb-3 text-danger">{{ $message }}</p>
                            @enderror

                            <div class="col">
                                <input type="text" class="form-control" name="vaccin" id="vaccin"
                                    placeholder="Ajouter un vaccin non listé" value="{{ old('vaccin') }}">

                            </div>
                        @else
                            <div class="col">
                                <span for="vaccin" class="form-label">Ajouter un vaccin</span>
                                <input type="text" class="form-control" name="vaccin" id="vaccin"
                                    placeholder="Description du vaccin" value="{{ old('vaccin') }}">

                            </div>
                        @endif
                        @error('vaccin')
                            <p class="mb-3 text-danger">{{ $message }}</p>
                        @enderror

                    </div>


                    <br>
                    <div class="form-row">
                        <div class="form-row">

                            <span for="allergies" class="form-label"><strong> Liste des allergies actuelles de
                                    l'enfant</strong></span><br>

                            @if ($enfant->allergie->count())
                                @foreach ($enfant->allergie as $allergie)

                                    <p>{{ $allergie->description }} </p>

                                @endforeach
                            @endif

                        </div>
                        <span for="allergies" class="text-muted">Les autres allergies</span>

                        @if ($allergies->count())
                            <p>
                                @foreach ($allergies as $allergie)

                                    <input type="checkbox" name="allergies[]" value="{{ $allergie->description }}">
                                    {{ $allergie->description }}

                                @endforeach
                            </p>
                            @error('allergies')
                                <p class="mb-3 text-danger">{{ $message }}</p>
                            @enderror
                            <div class="col">
                                <input type="text" class="form-control" name="allergie" id="allergie"
                                    placeholder="Ajouter une allergie" value="{{ old('allergie') }}">

                            </div>
                        @else
                            <div class="col">
                                <span for="allergie" class="form-label">Ajouter une allergie</span>
                                <input type="text" class="form-control" name="allergie" id="allergie"
                                    placeholder="Description de l'allergie" value="{{ old('allergie') }}">

                            </div>
                        @endif
                        @error('vaccin')
                            <p class="mb-3 text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <br>

                    <!-- Problemes comportements et contraintes medicales-->
                    <div class="form-row">
                        <div class="form-row">
                            <span for="comportement" class="form-label"><strong> Liste des problemes comportementaux de
                                    l'enfant</strong></span><br>

                            @if ($enfant->comportement->count())
                                @foreach ($enfant->comportement as $comportement)

                                    <p>{{ $comportement->type }}: {{ $comportement->description }} </p>

                                @endforeach
                            @endif
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" name="comportement" id="comportement"
                                placeholder="Ajouter un type de probleme" value="{{ old('comportement') }}">

                            <div class="invalid-feedback">
                                Champ Vide ou invalide
                            </div>
                        </div>
                        @error('comportement')
                            <p class="mb-3 text-danger">{{ $message }}</p>
                        @enderror

                        <div class="col">
                            <textarea class="form-control" name="descriptioncomportement" id="descriptioncomportement"
                                placeholder="Description du probleme">{{ old('descriptioncomportement') }}</textarea>

                        </div>
                        @error('descriptioncomportement')
                            <p class="mb-3 text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <br>
                    <div class="form-row">
                        <div class="form-row">
                            <span for="cmedicale" class="form-label"><strong> Liste des contraintes medicales de
                                    l'enfant</strong></span><br>

                            @if ($enfant->contrainteMedicale->count())
                                @foreach ($enfant->contrainteMedicale as $cmedicale)
                                    <p>{{ $cmedicale->type }}: {{ $cmedicale->description }} </p>
                                @endforeach
                            @endif
                        </div>

                        <div class="col">
                            <input type="text" class="form-control" name="cmedicale" id="cmedicale"
                                placeholder="Ajouter une contrainte medicale" value="{{ old('cmedicale') }}">
                        </div>
                        @error('cmedicale')
                            <p class="mb-3 text-danger">{{ $message }}</p>
                        @enderror

                        <div class="col">
                            <textarea class="form-control" name="descriptioncmedicale" id="descriptioncmedicale"
                                placeholder="Description de la contrainte">{{ old('descriptioncmedicale') }}</textarea>
                        </div>
                        @error('descriptioncmedicale')
                            <p class="mb-3 text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <br>

                    <!-- Educatrices-->
                    <div class="form-row">
                        <span for="educatrices" class="form-label"><strong>Changer educatrice</strong></span><br>
                        <p>Educatrice actuelle: {{ $enfant->educatrice->name }}
                            {{ $enfant->educatrice->lastname }}</P>
                        @if ($educatrices->count())

                            <select name="educatrices" id="educatrices">
                                <option value="{{ $enfant->educatrice->id }}" selected>
                                    Selectionner éducatrice</option>
                                @foreach ($educatrices as $educatrice)

                                    <option value="{{ $educatrice->id }}">{{ $educatrice->name }}
                                        {{ $educatrice->lastname }}
                                    </option>
                                @endforeach

                            </select>

                        @else
                            <p>Pas d'educatrices</p>
                        @endif
                        @error('educatrices')
                            <p class="mb-3 text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <br>

                    <!-- Programmes-->
                    <div class="form-row">

                        <span for="programmes" class="text-muted">Changer de programme</span>

                        <select name="programmes" id="programmes">
                            <option value="{{ $enfant->programme }}">Selectionner un programme</option>
                            <option value="Programme 1">Programme 1</option>
                            <option value="Programme 2">Programme 2</option>
                            <option value="Programme 3">Programme 3</option>
                            <option value="Programme 4">Programme 4</option>
                        </select>
                        @error('programmes')
                            <p class="mb-3 text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <br>

                    <!-- Bouton soumetre-->
                    <div class="buttonBox">
                        <button type="submit" name="signup" class=" buttonconfirm ">Soumettre</button>
                    </div>
                </form>
            </div>
        </div>

    </section>

</body>

</html>

{{-- <!DOCTYPE html>
<html>

<head>
    <title>D&eacute;tails Enfant</title>
    <link rel="stylesheet" href="{{ asset('css/detailsEnfants.css') }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
    <div class="topnav" id="myTopnav">
        <a class="active" href="#home"><i class="fa fa-home"></i></a>
        <a href="#news">Nouvelles</a>

        <div class="dropdown">
            <button class="dropbtn">Ajout
                <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
                <a href="#">Activité</a>


            </div>
        </div>
        <div class="dropdown">
            <button class="dropbtn">Créer
                <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
                <a href="#">Compte enfant</a>
                <a href="#">Compte éducatrice</a>

            </div>
        </div>
        <div class="dropdown">
            <button class="dropbtn">Modifier
                <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
                <a href="#">Détail enfant </a>
                <a href="#">Détail éducatrice</a>

            </div>
        </div>

        <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
    </div>

    <div class="behindBox">

        <h1>D&eacute;tails Enfant</h1>
        <div class="whiteBox">
            <!--<h2>Ins&eacute;rer l'ID de l'enfant recherch&eacute;</h2>
            <div class="rechercheBox">
                <label for="txtID">Id Enfant:</label> <input type="text" id="txtRecherche" name="txtRecherche">
                <input type="button" class="buttonRecherche" value="Recherche" />
            </div>-->

            <form name="detailForm" action="{{ route('modifierenfant', $enfant) }}" method="post">
                @csrf
                <div class="detailBox">


                    <label for="name">Prenom:</label> <input type="text" id="name" name="name"
                        value="{{ $enfant->name }}">
                    <label for="lastname">Nom:</label> <input type="text" id="lastname" name="lastname"
                        value="{{ $enfant->lastname }}"> <br> <br>
                    <label for="date_naissance">Date de Naissance:</label> <input type="text" id="date_naissance"
                        name="date_naissance" value="{{ $enfant->date_naissance }}">
                    <label for="sexe">Sexe : </label>
                    <input type="radio" id="masculin" name="sexe" value="homme"> <label for="masculin">M</label>
                    <input type="radio" id="feminin" name="sexe" value="femme">
                    <label for="feminin">F</label> <br> <br>

                    <label for="educatrices">Educatrice Assign&eacute;e:</label> <input type="text" id="educatrices"
                        name="educatrices" value="{{ $enfant->educatrice->id }}"><br> <br>



                    <div class="mb-3">
                        <label for="allergie">Les allergies: </label> <br> <textarea id="allergie" name="allergie"
                            rows="10" cols="30">     @if ($enfant->allergie->count())
                            @foreach ($enfant->allergie as $allergie)
                                {{ $allergie->description }}
                            @endforeach
                        @endif </textarea> <br> <br>

                    </div>


                    <div class="mb-3">
                        <label for="vaccin">Liste des vaccination: </label> <br> <textarea id="vaccin" name="vaccin"
                            rows="10" cols="30">@if ($enfant->vaccin->count())
                            @foreach ($enfant->vaccin as $vaccin)
                                {{ $vaccin->description }}
                            @endforeach
                        @endif </textarea> <br>
                    </div>


                    <div class="mb-3">
                        <div class="mb-3">
                            <label for="cmedicale">Contraintes m&eacute;dicales: </label> <br>
                            <textarea id="cmedicale" name="cmedicale" rows="10" cols="30">  @if ($enfant->contrainteMedicale->count())
                                    @foreach ($enfant->contrainteMedicale as $cmedicale)
                                        {{ $cmedicale->type }}
                                    @endforeach
                                @endif
                            </textarea> <br> <br>
                        </div>
                        <div class="mb-3">
                            <label for="cmedicale">Description de la contraintes m&eacute;dicales: </label> <br>
                            <textarea id="descriptioncmedicale" name="descriptioncmedicale" rows="10" cols="30">@if ($enfant->contrainteMedicale->count())
                                    @foreach ($enfant->contrainteMedicale as $cmedicale)
                                        {{ $cmedicale->description }}
                                    @endforeach
                                @endif </textarea>
                            <br> <br>
                        </div>
                    </div>

                    <div class="mb-3">
                        <div class="mb-3">
                            <label for="comportement">Problemes comportementaux: </label> <br>
                            <textarea id="comportement" name="comportement" rows="10" cols="30"> @if ($enfant->comportement->count())
                                    @foreach ($enfant->comportement as $comportement)
                                        {{ $comportement->type }}
                                    @endforeach
                                @endif</textarea> <br>
                        </div>
                        <div class="mb-3">
                            <label for="descriptioncomportement">Description du Problemes comportementaux: </label> <br>
                            <textarea id="descriptioncomportement" name="descriptioncomportement" rows="10" cols="30"> @if ($enfant->comportement->count())
                                    @foreach ($enfant->comportement as $comportement)
                                        {{ $comportement->description }}
                                    @endforeach
                                    @endif</textarea> <br>
                        </div>
                    </div>

                    <!--<h3>Tuteur/tutrice principal</h3>
                    <label for="txtNom">Nom:</label> <input type="text" id="txtNom" name="txtRecherche">
                    <label for="txtPrenom">Prenom:</label> <input type="text" id="txtPrenom" name="txtRecherche">
                    <br><br>
                    <label for="txtRue">Rue:</label> <input type="text" id="txtRue">
                    <label for="txtVille">Ville:</label> <input type="text" id="txtVille"> <br><br>
                    <label for="txtProvince">Province:</label> <input type="text" id="txtProvince">
                    <label for="txtPostal">Code Postal:</label> <input type="text" id="txtPostal" placeholder="K1K 1K1">
                    <br><br>
                    <label for="txtCourriel">Adresse courriel:</label> <input type="text" id="txtCourriel"
                        placeholder="abcd@gmail.com">
                    <label for="txtTelephone">T&eacute;l&eacute;phone:</label> <input type="text" id="txtTelephone"
                        placeholder="(123) 456-7890">
                    <h3>Tuteur/tutrice secondaire</h3>
                    <label for="txtNom">Nom:</label> <input type="text" id="txtNom" name="txtRecherche">
                    <label for="txtPrenom">Prenom:</label> <input type="text" id="txtPrenom" name="txtRecherche">
                    <br><br>
                    <label for="txtRue">Rue:</label> <input type="text" id="txtRue">
                    <label for="txtVille">Ville:</label> <input type="text" id="txtVille"> <br><br>
                    <label for="txtProvince">Province:</label> <input type="text" id="txtProvince">
                    <label for="txtPostal">Code Postal:</label> <input type="text" id="txtPostal" placeholder="K1K 1K1">
                    <br><br>
                    <label for="txtCourriel">Adresse courriel:</label> <input type="text" id="txtCourriel"
                        placeholder="abcd@gmail.com">
                    <label for="txtTelephone">T&eacute;l&eacute;phone:</label> <input type="text" id="txtTelephone"
                        placeholder="(123) 456-7890">-->
                </div>

                <div class="buttonBox">
                    <button type="submit" class="buttonconfirm">Soumettre</button>
                </div>

            </form>

        </div>
    </div>
</body>

</html> --}}

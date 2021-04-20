<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>D&eacute;tails Educatrice</title>

    <!-- CSS only -->
    <link rel="stylesheet" href="{{ asset('css/educatrice.css') }}" />

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
            @if (Auth::guard('admin')->check())

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
                <form action="{{ route('modifiereducatrice', $educatrice) }}" method="POST">
                    @csrf
                    <div class="form-row">
                        <h1 class="text-centre">D&eacute;tails Educatrice</h1>
                    </div>
                    <br>
                    <h4 class="text-left text-muted">Information sur l'éducatrice</h4>
                    <!-- Nom et prenom-->
                    <div class="form-row">
                        <div class="col">
                            <input type="text" class="form-control" id="name" placeholder="Prénom" name="name"
                                value="{{ $educatrice->name }}">
                            @error('name')
                                <p class="mb-3 text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" id="lastname" placeholder="Nom" name="lastname"
                                value="{{ $educatrice->lastname }}">
                            @error('lastname')
                                <p class="mb-3 text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <!-- Date de naissance et Sexe-->

                    <br>
                    <div class="form-row">
                        <div class="col">
                            <span class="text-muted"><i class=" fa fa-calendar"> </i> Date de naissance</span>
                            <input type="date" class="form-control" id="date_naissance" placeholder="AAAA/MM/JJ"
                                name="date_naissance" value="{{ $educatrice->date_naissance }}">
                            @error('date_naissance')
                                <p class="mb-3 text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <br>
                        <div class="mb-1">
                            <input class="form-check-input" type="radio" name="sexe" id="masculin" value="homme">
                            <span class="form-check-label" for="masculin">
                                Masculin
                            </span>
                        </div>
                        <div class="mb-3">
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
                    <div class="form-row">
                        <span for="date_embauche" class="text-muted">Date d'embauche</span>

                        <input type="date" class="form-control" name="date_embauche" id="date_embauche"
                            placeholder="Date d'embauche de l'educatrice" value="{{ $educatrice->date_embauche }}">
                        @error('date_embauche')
                            <p class="mb-3 text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <!-- Formations et specialisations-->

                    <br>
                    <div class="form-row">
                        <span for="formation" class="text-muted">Formations: </span>

                        @if ($educatrice->formations->count())
                            @foreach ($educatrice->formations as $formation)

                                {{ $formation->description }},

                            @endforeach
                            <input type="text" class="form-control" name="formation" id="formation"
                                placeholder="Ajouter une formation" value="{{ old('formation') }}">

                        @endif
                        @error('formation')
                            <p class="mb-3 text-danger">{{ $message }}</p>
                        @enderror

                    </div>


                    <br>
                    <div class="form-row">
                        <span for="specialisation" class="text-muted">Specialisations: </span>

                        @if ($educatrice->specialisations->count())
                            @foreach ($educatrice->specialisations as $specialisation)

                                {{ $specialisation->description }},


                            @endforeach

                            <input type="text" class="form-control" name="specialisation" id="specialisation"
                                placeholder="Ajouter une specialisation" value="{{ old('specialisation') }}">
                        @endif
                        @error('specialisation')
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

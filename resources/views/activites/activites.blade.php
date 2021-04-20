<!DOCTYPE html>
<html>
<title>page edu</title>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
        body {
            margin: 0;
            font-family: Arial;
            background-image: url("garderie1.jpg");
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

            <ul class="nav justify-content-end">
                <li> <a href="{{ route('modifieractivite', $activite) }}">Modifier details</a>
                </li>
            </ul>

        @endif

    </div>

    @if (Auth::guard('admin')->check() || Auth::guard('educatrice')->check())
        @if ($activite->count())

            <div class="container-fluid text-center">
                <div class="row content">
                    <div class="col-sm-2 sidenav">
                        <h1>{{ $activite->nom }}</h1>
                        <img class="img-responsive"
                            src="https://images.unsplash.com/photo-1596464716127-f2a82984de30?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80"
                            width="200" height="200">
                    </div>

                    <div class="col-sm-8 text-left">
                        <br>
                        <p>Nom: {{ $activite->nom }}</p>

                        <p>Type: {{ $activite->type }}</p>

                        <p>Description: {{ $activite->description }}</p>

                        <p>Nom de places max: {{ $activite->places }}</p>

                        <p>Prix: {{ $activite->prix }}$</p>

                        <p>Debut: {{ $activite->date_debut }} {{ $activite->heure_debut }}</p>

                        <p>Fin: {{ $activite->date_fin }} {{ $activite->heure_fin }}</p>

                        <p>Educatrice en charge: {{ $activite->educatrice->name }}</p>


                        <hr>

                        <div style="padding-left:16px">

                            <p>Liste des enfants inscrits: @foreach ($activite->enfant as $enfant)
                                    <p>{{ $enfant->name }} {{ $enfant->lastname }}
                                    </p>
                                @endforeach
                            </p>

                        </div>


                        <br>
                        <hr>

                    </div>
                    <div class="col-sm-2 sidenav">

                    </div>
                </div>
            </div>

            <footer class="container-fluid text-center">
                <h4></h4>
            </footer>

        @else
            <p>Pas d'activites</p>
        @endif
    @endif



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous">
    </script>
    <script>
        function myFunction() {
            var x = document.getElementById("myTopnav");
            if (x.className === "topnav") {
                x.className += " responsive";
            } else {
                x.className = "topnav";
            }
        }

    </script>

    @yield('educatricecontent')

</body>

</html>

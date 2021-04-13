{{-- @extends('principale.app')
@section('content')

    Vous etes dans Espace enfant

    <a class="btn btn-outline-primary mr-2" href="{{ route('ajouterenfant') }}">Ajouter enfant</a>
    <a class="btn btn-outline-primary mr-2" href="{{ route('listenfants') }}">Liste enfants</a>
    <br>

    @if ($enfant->count())

        <p>{{ $enfant->name }} {{ $enfant->lastname }}</p>

        <p>{{ $enfant->sexe }}</p>

        <p>Programme choisi: {{ $enfant->programme }}</p>


        <p>{{ $enfant->date_naissance }}</p>

        <p>Educatrice assignée: {{ $enfant->educatrice->name }}</p>

        <p>Inscrit le: {{ $enfant->created_at }}</p>

        <p>Tuteur principale: @foreach ($enfant->tuteurs as $tuteur)
                @if ($tuteur->type == 'principale'){{ $tuteur->name }}
                    <a class="btn btn-outline-primary mr-2"
                        href="{{ route('modifierDetailsTuteur', [$tuteur, $enfant]) }}">Modifier</a>
                @endif
            @endforeach

        </p>

        <p>Tuteur secondaire: @foreach ($enfant->tuteurs as $tuteur)
                @if ($tuteur->type == 'secondaire'){{ $tuteur->name }}
                    <a class="btn btn-outline-primary mr-2"
                        href="{{ route('modifierDetailsTuteur', [$tuteur, $enfant]) }}">Modifier</a>
                @else

                    <a class="btn btn-outline-primary mr-2"
                        href="{{ route('modifierDetailsTuteur', [$tuteur, $enfant]) }}">Ajouter</a>

                @endif
            @endforeach
        </p>

        <p>Liste des récupérateurs:
            @if ($enfant->recuperateurs->count())
                @foreach ($enfant->recuperateurs as $recuperateur)
                    {{ $recuperateur->name }}
                @endforeach
                <a class="btn btn-outline-primary mr-2"
                    href="{{ route('modifierDetailsRecuperateur', $enfant) }}">Ajouter</a>
            @endif
        </p>

        <p>Liste des vaccins: @foreach ($enfant->vaccin as $vaccin)
                {{ $vaccin->description }}
            @endforeach
        </p>

        <p>Liste des allergies: @foreach ($enfant->allergie as $allergie)
                {{ $allergie->description }}
            @endforeach
        </p>

        <p>Liste des problemes comportementaux: @foreach ($enfant->comportement as $comportement)
                {{ $comportement->type }}:{{ $comportement->description }}
            @endforeach
        </p>

        <p>Liste des contraintes medicales: @foreach ($enfant->contrainteMedicale as $cmedicale)
                {{ $cmedicale->type }}:{{ $cmedicale->description }}
            @endforeach
        </p>

        <p>Historique d'incidence de l'enfant:
            @foreach ($enfant->incidents as $incident)
                <p>{{ $incident->date_incident }} - {{ $incident->heure_incident }}
                    {{ $incident->type }}:{{ $incident->description }}</p>
            @endforeach
        </p>

        @if (Auth::guard('admin')->check())
            <p>Historique de paiements de l'enfant:
                @foreach ($enfant->paiements as $paiement)
                    <p>{{ $paiement->date_paiement }} - {{ $paiement->heure_paiement }}
                        {{ $paiement->montant }}$ - Activite:
                        {{ $ac = $activites->where('id', $paiement->activites_id)->first()->nom }}

                    </p>
                @endforeach
            </p>
        @endif

        <a class="btn btn-outline-primary mr-2" href="{{ route('modifierenfant', $enfant) }}">Modifier détails</a><br>



        <label for="formulaireincidence" class="form-label"><strong>Ajouter une incidence</strong></label>
        <form class="" action="{{ route('modifierincidence', $enfant) }}" method="post" name="formulaireincidence"
            novalidate>
            @csrf

            <div class="mb-3">

                <div class="mb-3">
                    <label for="date_incidence" class="form-label">Date de l'incidence</label>
                    <input type="date" class="form-control" name="date_incidence" id="date_incidence"
                        placeholder="Date de l'incidence" value="{{ old('date_incidence') }}" required>

                    <div class="invalid-feedback">
                        Champ Vide ou invalide
                    </div>
                </div>

                <div class="mb-3">
                    <label for="heure_incidence" class="form-label">Heure de l'incidence</label>
                    <input type="time" class="form-control" name="heure_incidence" id="heure_incidence"
                        placeholder="Heure de l'incidence" value="{{ old('heure_incidence') }}" required>

                    <div class="invalid-feedback">
                        Champ Vide ou invalide
                    </div>
                </div>


                <div class="mb-3">
                    <textarea class="form-control" name="description_incidence" id="description_incidence"
                        placeholder="Description de l'incidence" required>{{ old('description_incidence') }}</textarea>

                    <div class="invalid-feedback">
                        Champ Vide ou invalide
                    </div>
                </div>

            </div>

            <button type="submit" class="btn btn-primary">Ajouter Incidence</button>
        </form>


        @if (Auth::guard('admin')->check())
            <label for="formulairepaiement" class="form-label"><strong>Ajouter un paiement</strong></label>
            <form class="" action="{{ route('ajouterpaiement', $enfant) }}" method="post" name="formulairepaiement"
                novalidate>
                @csrf

                <div class="mb-3">


                    <div class="mb-3">
                        <label for="montant" class="form-label">Montant payé</label>
                        <input type="text" class="form-control" name="montant" id="montant" placeholder="0.00"
                            value="{{ old('montant') }}" required>

                        <div class="invalid-feedback">
                            Champ Vide ou invalide
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="date_paiement" class="form-label">Date du paiement</label>
                        <input type="date" class="form-control" name="date_paiement" id="date_paiement"
                            placeholder="Date du paiement" value="{{ old('date_paiement') }}" required>

                        <div class="invalid-feedback">
                            Champ Vide ou invalide
                        </div>
                    </div>


                    <div class="mb-3">
                        <label for="heure_paiement" class="form-label">Heure du paiement</label>
                        <input type="time" class="form-control" name="heure_paiement" id="heure_paiement"
                            placeholder="Heure du paiement" value="{{ old('heure_paiement') }}" required>

                        <div class="invalid-feedback">
                            Champ Vide ou invalide
                        </div>
                    </div>


                    <div class="mb-3">

                        <label for="activites" class="form-label"><strong>Choisir l'activité</strong></label><br>

                        @if ($activites->count())

                            <select name="activites" id="activites">
                                @foreach ($activites as $activite)
                                    <option value="{{ $activite->id }}">{{ $activite->nom }}</option>
                                @endforeach

                            </select>

                        @else
                            <p>Pas d'activites</p>
                        @endif

                        <div class="invalid-feedback">
                            Champ Vide ou invalide
                        </div>
                    </div>

                </div>

                <button type="submit" class="btn btn-primary">Ajouter paiement</button>
            </form>
        @endif


    @else
        <p>Pas d'enfants</p>
    @endif

    @yield('enfantcontent')

@endsection --}}
<!DOCTYPE html>
<html lang="en">

<head>
    <title>
        @if ($enfant->count()) {{ $enfant->name }} {{ $enfant->lastname }}
        @endif
    </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
        /* Remove the navbar's default margin-bottom and rounded borders */
        .navbar {
            margin-bottom: 0;
            border-radius: 0;
        }

        /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
        .row.content {
            height: 100%
        }

        /* Set gray background color and 100% height */
        .sidenav {
            padding-top: 20px;
            background-color: #f1f1f1;
            height: 100%;
            min-height: 1000px;
        }

        /* Set black background color, white text and some padding */
        footer {
            background-color: #555;
            color: white;
            padding: 15px;
        }

        /* On small screens, set height to 'auto' for sidenav and grid */
        @media screen and (max-width: 767px) {
            .sidenav {
                height: auto;
                padding: 15px;
            }

            .row.content {
                height: auto;
            }
        }

    </style>
</head>

<body>

    @if ($enfant->count())
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="{{ route('acceuil') }}">Acceuil</a>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav">
                        <li><a href="{{ route('listeactivites') }}">Activit&eacute;s</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a class="btn btn-outline-primary mr-2"
                                href="{{ route('modifierenfant', $enfant) }}"><strong>Modifier
                                    détails de {{ $enfant->name }} {{ $enfant->lastname }}</strong></a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container-fluid text-center">
            <div class="row content">
                <div class="col-sm-2 sidenav">
                    <h1>{{ $enfant->name }} {{ $enfant->lastname }}</h1>
                    <img class="img-responsive" src="" width="200" height="200">
                </div>

                <div class="col-sm-8 text-left">
                    <br>
                    <p>Date de Naissance : {{ $enfant->date_naissance }}</p>
                    <p>Sexe : {{ $enfant->sexe }}</p>
                    <p>Programme choisi :{{ $enfant->programme }} </p>
                    <p>Éducatrice(s) Assign&eacute;e : {{ $enfant->educatrice->name }}</p>
                    <p>Coordonn&eacute;e tuteur(tutrice) principale : @foreach ($enfant->tuteurs as $tuteur)
                            @if ($tuteur->type == 'principale'){{ $tuteur->name }}
                                <a class="btn btn-outline-primary mr-2"
                                    href="{{ route('modifierDetailsTuteur', [$tuteur, $enfant]) }}">Modifier</a>
                            @endif
                        @endforeach</p>
                    <p>Coordonn&eacute;e tuteur(tutrice) secondaire :

                        @foreach ($enfant->tuteurs as $tuteur)
                            <a class="btn btn-outline-primary mr-2"
                                href="{{ route('modifierDetailsTuteur', [$tuteur, $enfant]) }}">Modifier</a>

                        @endforeach
                    </p>
                    <hr>
                    <p>Contraintes M&eacute;dicales</p>
                    <p>
                        @foreach ($enfant->contrainteMedicale as $cmedicale)
                            {{ $cmedicale->type }}:{{ $cmedicale->description }}
                        @endforeach
                    </p>

                    <hr>
                    <p>Problemes comportementaux</p>
                    <p>
                        @foreach ($enfant->comportement as $comportement)
                            {{ $comportement->type }}:{{ $comportement->description }}
                        @endforeach
                    </p>

                    <hr>
                    <p>Allergies</p>
                    <p>
                        @foreach ($enfant->allergie as $allergie)
                            {{ $allergie->description }}
                        @endforeach
                    </p>
                    <hr>
                    <p>Liste de vaccination</p>
                    <p>
                        @foreach ($enfant->vaccin as $vaccin)
                            {{ $vaccin->description }}
                        @endforeach
                    </p>


                    <hr>
                    <h4>Historique d'incidents</h4>
                    <p>
                        @foreach ($enfant->incidents as $incident)
                            {{ $incident->date_incident }} - {{ $incident->heure_incident }}:<br>
                            {{ $incident->description }}<br><br>
                        @endforeach
                    </p>

                    @if (Auth::guard('admin')->check())
                        <p>Historique de paiements de l'enfant:
                            @foreach ($enfant->paiements as $paiement)
                                <p>{{ $paiement->date_paiement }} - {{ $paiement->heure_paiement }}
                                    {{ $paiement->montant }}$ - Activite:
                                    {{ $ac = $activites->where('id', $paiement->activites_id)->first()->nom }}

                                </p>
                            @endforeach
                        </p>
                    @endif

                    <!-- Formulaire incidence -->

                    <label for="formulaireincidence" class="form-label">
                        <h4>Ajouter un incident</h4>
                    </label>
                    <form class="" action="{{ route('modifierincidence', $enfant) }}" method="post"
                        name="formulaireincidence" novalidate>
                        @csrf

                        <div class="mb-3">

                            <div class="mb-3">
                                <label for="date_incidence" class="form-label">Date de l'incidence</label>
                                <input type="date" class="form-control" name="date_incidence" id="date_incidence"
                                    placeholder="Date de l'incidence" value="{{ old('date_incidence') }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="heure_incidence" class="form-label">Heure de l'incidence</label>
                                <input type="time" class="form-control" name="heure_incidence" id="heure_incidence"
                                    placeholder="Heure de l'incidence" value="{{ old('heure_incidence') }}" required>
                            </div>


                            <div class="mb-3">
                                <textarea class="form-control" name="description_incidence" id="description_incidence"
                                    placeholder="Description de l'incidence"
                                    required>{{ old('description_incidence') }}</textarea>
                            </div>

                        </div>
                        <button type="submit" class="btn btn-success">Ajouter Incidence</button>
                    </form>
                    <hr>

                    <!-- Formulaire paiement -->
                    @if (Auth::guard('admin')->check())

                        <label for="formulairepaiement" class="form-label"><strong>Ajouter un paiement</strong></label>
                        <form class="" action="{{ route('ajouterpaiement', $enfant) }}" method="post"
                            name="formulairepaiement" novalidate>
                            @csrf

                            <div class="mb-3">


                                <div class="mb-3">
                                    <label for="montant" class="form-label">Montant payé</label>
                                    <input type="text" class="form-control" name="montant" id="montant"
                                        placeholder="0.00" value="{{ old('montant') }}" required>

                                    <div class="invalid-feedback">
                                        Champ Vide ou invalide
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="date_paiement" class="form-label">Date du paiement</label>
                                    <input type="date" class="form-control" name="date_paiement" id="date_paiement"
                                        placeholder="Date du paiement" value="{{ old('date_paiement') }}" required>

                                    <div class="invalid-feedback">
                                        Champ Vide ou invalide
                                    </div>
                                </div>


                                <div class="mb-3">
                                    <label for="heure_paiement" class="form-label">Heure du paiement</label>
                                    <input type="time" class="form-control" name="heure_paiement" id="heure_paiement"
                                        placeholder="Heure du paiement" value="{{ old('heure_paiement') }}" required>

                                    <div class="invalid-feedback">
                                        Champ Vide ou invalide
                                    </div>
                                </div>


                                <div class="mb-3">

                                    <label for="activites" class="form-label"><strong>Choisir
                                            l'activité</strong></label><br>

                                    @if ($activites->count())

                                        <select name="activites" id="activites">
                                            @foreach ($activites as $activite)
                                                <option value="{{ $activite->id }}">{{ $activite->nom }}</option>
                                            @endforeach

                                        </select>

                                    @else
                                        <p>Pas d'activites</p>
                                    @endif

                                    <div class="invalid-feedback">
                                        Champ Vide ou invalide
                                    </div>
                                </div>

                            </div>

                            <button type="submit" class="btn btn-success">Ajouter paiement</button>
                        </form>
                    @endif

                    <br>
                    <hr>
                    <h4>Liste des contacts</h4>
                    <p>
                        @if ($enfant->recuperateurs->count())
                            @foreach ($enfant->recuperateurs as $recuperateur)
                                {{ $recuperateur->name }}
                            @endforeach
                            <a class="btn btn-outline-primary mr-2"
                                href="{{ route('modifierDetailsRecuperateur', $enfant) }}">Ajouter</a>
                        @endif
                    </p>

                </div>
                <div class="col-sm-2 sidenav">

                </div>
            </div>
        </div>

        <footer class="container-fluid text-center">
            <h4></h4>
        </footer>

    @else
        <p>Pas d'enfants</p>
    @endif

</body>

</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Garderie</title>

    <!-- CSS only -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"
        integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand" href="{{ route('acceuil') }}">
            <img src="{{ asset('images/logo2.png') }}" alt="Logo" style="width:50%;">
        </a>
        <!-- Container wrapper -->
        <div class="container-fluid">
            <!-- Toggle button -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCenteredExample"
                aria-controls="navbarCenteredExample" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>

            <!-- Collapsible wrapper -->
            <div class="collapse navbar-collapse justify-content-center" id="navbarCenteredExample">

            </div>
            <!-- Collapsible wrapper -->
        </div>
        <!-- Container wrapper -->
    </nav>

    <div class="nomEnseignant">
        <h2 for="name">Bonjour M. </h2>
    </div>

    <div class="testbox">
        <form class="" action="{{ route('inscrireenfant', $activite) }}" method="post" novalidate>
            @csrf
            <div class="banner">
                <h1>Gestionnaire d'activité</h1>
            </div>
            <br>

            <div class="item">

                <label for="enfants" class="form-label">Liste des enfants admissibles</label><br>

                @if ($enfants->count())

                    <select name="enfants" id="enfants">
                        @foreach ($enfants as $enfant)

                            <option value="{{ $enfant->id }}">{{ $enfant->name }}
                                {{ $enfant->lastname }}
                            </option>
                        @endforeach
                    </select>

                @else
                    <p>Pas d'enfant</p>
                @endif
            </div>


            <div class="item">
                <p>Programme de l'enfant: {{ $enfant->programme }}</p>

                <div class="invalid-feedback">
                    Champ Vide ou invalide
                </div>
            </div>

            <div class="flax">

                <div class="item">
                    <input class="form-check-input" type="radio" name="paiement" id="paye" value="paye">
                    <label class="form-check-label" for="paye">
                        Payé
                    </label>
                </div>
                <div class="item">
                    <input class="form-check-input" type="radio" name="paiement" id="impaye" value="impaye">
                    <label class="form-check-label" for="impaye">
                        Non payé
                    </label>
                </div>
            </div>

            <div class="flax">
                <div class="mb-1">
                    <input class="form-check-input" type="radio" name="admissibilite" id="admissible"
                        value="admissible">
                    <label class="form-check-label" for="admissible">
                        Admissible
                    </label>
                </div>
                <div class="mb-3">
                    <input class="form-check-input" type="radio" name="admissibilite" id="inadmissible"
                        value="inadmissible">
                    <label class="form-check-label" for="inadmissible">
                        Non admissible
                    </label>
                </div>
            </div>


            <div class="item">

                <label for="note" class="form-label"><strong> Notes specifiques/contre indications</strong></label><br>

                <div class="mb-3">
                    <textarea class="form-control" name="note" id="note" placeholder="Laisser une note"
                        required>{{ old('note') }}</textarea>

                    <div class="invalid-feedback">
                        Champ Vide ou invalide
                    </div>
                </div>

            </div>


            <p style="margin-left:30px;"><small>0/100 caractères</small></p>
            <div class="btn-block">
                <button type="submit">Enregistrer</button>
            </div>
        </form>
    </div>

</body>
<div class='container-fluid'>
    <div class="card">
        <div class="heading text-center">
            <div class="head1">Garderie du soleil</div>
            <p class="bdr"></p>
        </div>
        <div class="card-body">
            <div class="row m-0 pt-5">
                <div class="card col-12 col-md-3">
                    <div class="card-content"><i class="fas fa-user-graduate fa-3x"></i></i>
                        <div class="card-title"> FUTUR LEADER </div>
                        <p><small>La réussite de votre enfant est garantie chez nous</small></p>
                    </div>
                </div>
                <div class="card col-12 col-md-3">
                    <div class="card-content"> <i class="far fa-handshake fa-3x"></i>
                        <div class="card-title"> GARANTIE </div>
                        <p><small>Nous offrons les meilleurs services de garderie depuis 20ans</small></p>
                    </div>
                </div>
                <div class="card col-12 col-md-3">
                    <div class="card-content"> <i class="fas fa-mobile-alt fa-3x"></i>
                        <div class="card-title"> SUIVIE JOURNALIER </div>
                        <p><small>Suivez en tout temps la progression de votre enfant</small></p>
                    </div>
                </div>
                <div class="card col-12 col-md-3">
                    <div class="card-content"> <i class="fas fa-dice fa-3x"></i>
                        <div class="card-title"> ACTIVITES INTERACTIVES </div>
                        <p><small>Nos activités aident à développer les compétences de votre enfant</small></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer row m-0" id="lastfooter">
            <p> <label> <i class="fas fa-phone fa-rotate-90 text-primary"></i> </label> 800-000-0000</p>
            <div>
                <p> <small class="follow-text">NOUS SUIVRE</small> <label class="footer-right"> <i
                            class="fab fa-instagram"></i> <i class="fab fa-facebook-square"></i> <i
                            class="fab fa-linkedin"></i> <i class="fab fa-twitter-square"></i> </label> </p>
            </div>
        </div>
    </div>
</div>

</html>


{{-- @extends('principale.app')
@section('content')

    Ajouter enfant a l'activité

    <section>

        <form class="" action="{{ route('inscrireenfant', $activite) }}" method="post" novalidate>
            @csrf

            <div class="mb-3">

                <label for="enfants" class="form-label"><strong>Liste des enfants admissibles</strong></label><br>

                @if ($enfants->count())

                    <select name="enfants" id="enfants">
                        @foreach ($enfants as $enfant)

                            <option value="{{ $enfant->id }}">{{ $enfant->name }}
                                {{ $enfant->lastname }}
                            </option>
                        @endforeach
                    </select>

                @else
                    <p>Pas d'enfant</p>
                @endif

                <div class="invalid-feedback">
                    Champ Vide ou invalide
                </div>
            </div>

            <div class="mb-3">
                <p>Programme de l'enfant: {{ $enfant->programme }}</p>

                <div class="invalid-feedback">
                    Champ Vide ou invalide
                </div>
            </div>

            <div class="mb-1">
                <input class="form-check-input" type="radio" name="paiement" id="paye" value="paye">
                <label class="form-check-label" for="paye">
                    Payé
                </label>
            </div>
            <div class="mb-3">
                <input class="form-check-input" type="radio" name="paiement" id="impaye" value="impaye">
                <label class="form-check-label" for="impaye">
                    Non payé
                </label>
            </div>


            <div class="mb-3">

                <label for="note" class="form-label"><strong> Notes specifiques/contre indications</strong></label><br>

                <div class="mb-3">
                    <textarea class="form-control" name="note" id="note" placeholder="Laisser une note"
                        required>{{ old('note') }}</textarea>

                    <div class="invalid-feedback">
                        Champ Vide ou invalide
                    </div>
                </div>

            </div>


            <div class="mb-1">
                <input class="form-check-input" type="radio" name="admissibilite" id="admissible" value="admissible">
                <label class="form-check-label" for="admissible">
                    Admissible
                </label>
            </div>
            <div class="mb-3">
                <input class="form-check-input" type="radio" name="admissibilite" id="inadmissible" value="inadmissible">
                <label class="form-check-label" for="inadmissible">
                    Non admissible
                </label>
            </div>



            <button type="submit" class="btn btn-primary">Creer activite</button>
        </form>
    </section>


@endsection --}}

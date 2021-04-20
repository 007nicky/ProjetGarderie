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

    <style>
        .banner {
            background-image: url({{ asset('images/11.jpeg') }});
        }

        .bannerParticipant {
            background-image: url({{ asset('images/2.jpg') }});
        }

        .bannerJeu {
            background-image: url({{ asset('images/4.jpg') }});
        }

        .bannerSortie {
            background-image: url({{ asset('images/5.jpg') }});
        }

        .bannerListe {
            background-image: url({{ asset('images/8.jpg') }});
        }

    </style>

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
        <form class="" action="{{ route('ajouteractivite') }}" method="post" novalidate>
            @csrf
            <div class="banner">
                <h1>Gestionnaire d'activité</h1>
            </div>
            <br>

            <div class="item">
                <label for="name">Nom de l'activité<span>*</span></label>
                <input id="name" type="text" name="name" required />
            </div>


            <div class="item">
                <label for="activites" class="form-label">Type d'activite</label><br>
                <select name="activites" id="activites">
                    <option value="">Selectionner une activité</option>
                    <option value="Jeux">Jeux</option>
                    <option value="Sortie">Sortie</option>
                </select>
            </div>

            <div class="item">
                <label for="descriptionactivite" class="form-label"> Description de
                    l'activite</label><br>

                <div class="mb-3">
                    <textarea class="form-control" name="descriptionactivite" id="descriptionactivite"
                        placeholder="Description de l'Activite" required>{{ old('descriptionactivite') }}</textarea>

                </div>
            </div>

            <div class="item">
                <label for="places" class="form-label">Nombre de participants</label>
                <input type="text" class="form-control" name="places" id="places" placeholder="Nombre maximal de places"
                    value="{{ old('places') }}" required>
            </div>

            <div class="item">
                <label for="educatrices" class="form-label">Instructeur en charge</label><br>
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


            <div class="item">
                <label for="prix" class="form-label">Tarif</label>
                <input type="text" class="form-control" name="prix" id="prix" placeholder="0.00"
                    value="{{ old('prix') }}" required>

                <div class="invalid-feedback">
                    Champ Vide ou invalide
                </div>
            </div>

            <div class="flax">
                <div class="item">
                    <label for="date_debut" class="form-label">Date de debut de l'activite</label>
                    <input type="date" class="form-control" name="date_debut" id="date_debut"
                        placeholder="Date de debut de l'activite" value="{{ old('date_debut') }}" required>

                    <div class="invalid-feedback">
                        Champ Vide ou invalide
                    </div>
                </div>

                <div class="item">
                    <label for="heure_debut" class="form-label">Heure de debut de l'activit</label>
                    <input type="time" class="form-control" name="heure_debut" id="heure_debut"
                        placeholder="Heure de debut de l'activite" value="{{ old('heure_debut') }}" required>

                    <div class="invalid-feedback">
                        Champ Vide ou invalide
                    </div>
                </div>


                <div class="item">
                    <label for="date_fin" class="form-label">Date de fin de l'activite</label>
                    <input type="date" class="form-control" name="date_fin" id="date_fin"
                        placeholder="Date de fin de l'activite" value="{{ old('date_fin') }}" required>

                    <div class="invalid-feedback">
                        Champ Vide ou invalide
                    </div>
                </div>

                <div class="item">
                    <label for="heure_fin" class="form-label">Heure de fin de l'activit</label>
                    <input type="time" class="form-control" name="heure_fin" id="heure_fin"
                        placeholder="Heure de fin de l'activite" value="{{ old('heure_fin') }}" required>

                    <div class="invalid-feedback">
                        Champ Vide ou invalide
                    </div>
                </div>
            </div>

            <div class="item">
                <label for="descriptioncontrainte" class="form-label"> Contraintes de l'activité (laisser vide
                    si non applicable)</label><br>
                <div class="mb-3">
                    <textarea class="form-control" name="descriptioncontrainte" id="descriptioncontrainte"
                        placeholder="Description des contraintes"
                        required>{{ old('descriptioncontrainte') }}</textarea>

                    @error('descriptioncontrainte')
                        <p class="mb-3 text-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <p style="margin-left:30px;"><small>0/100 caractères</small></p>
            <div class="btn-block">
                <button type="submit" href="#">Créer une activité</button>
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

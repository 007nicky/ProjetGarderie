<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Garderie</title>

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>

<body>

    Planifier une activité

    <section>

        <form class="" action="{{ route('modifieractivite', $activite) }}" method="post" novalidate>
            @csrf

            <div class="mb-3">

                <label for="name" class="form-label">Nom de l'activité</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Nom de l'activité"
                    value="{{ $activite->nom }}" required>

                @error('name')
                    <p class="mb-3 text-danger">{{ $message }}</p>
                @enderror

            </div>

            <div class="mb-3">
                <label for="activites" class="form-label"><strong>Changer le type d'activite ou
                        ignorer</strong></label><br>
                <p><strong>Activite actuelle: </strong>{{ $activite->type }}</p>


                <select name="activites" id="activites">
                    <option value="{{ $activite->type }}" selected>Selectionner une activité</option>
                    <option value="Jeux">Jeux</option>
                    <option value="Sortie">Sortie</option>
                </select>

                @error('activites')
                    <p class="mb-3 text-danger">{{ $message }}</p>
                @enderror

            </div>

            <div class="mb-3">

                <label for="descriptionactivite" class="form-label"><strong> Description de
                        l'activite</strong></label><br>

                <div class="mb-3">
                    <textarea class="form-control" name="descriptionactivite" id="descriptionactivite"
                        placeholder="Description de l'Activite" required>{{ $activite->description }}</textarea>

                    @error('descriptionactivite')
                        <p class="mb-3 text-danger">{{ $message }}</p>
                    @enderror
                </div>

            </div>

            <div class="mb-3">
                <label for="places" class="form-label">Nombre maximal de places</label>
                <input type="text" class="form-control" name="places" id="places" placeholder="Nombre maximal de places"
                    value="{{ $activite->places }}" required>

                @error('places')
                    <p class="mb-3 text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="prix" class="form-label">Prix de participation</label>
                <input type="text" class="form-control" name="prix" id="prix" placeholder="0.00"
                    value="{{ $activite->prix }}" required>

                @error('prix')
                    <p class="mb-3 text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">

                <div class="mb-3">
                    <label for="date_debut" class="form-label">Date de debut de l'activite</label>
                    <input type="date" class="form-control" name="date_debut" id="date_debut"
                        placeholder="Date de debut de l'activite" value="{{ $activite->date_debut }}" required>

                    @error('date_debut')
                        <p class="mb-3 text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="heure_debut" class="form-label">Heure de debut de l'activite</label>
                    <input type="time" class="form-control" name="heure_debut" id="heure_debut"
                        placeholder="Heure de debut de l'activite" value="{{ old('heure_debut') }}" required>

                    @error('heure_debut')
                        <p class="mb-3 text-danger">{{ $message }}</p>
                    @enderror
                </div>


                <div class="mb-3">
                    <label for="date_fin" class="form-label">Date de fin de l'activite</label>
                    <input type="date" class="form-control" name="date_fin" id="date_fin"
                        placeholder="Date de fin de l'activite" value="{{ $activite->date_fin }}" required>

                    @error('date_fin')
                        <p class="mb-3 text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="heure_fin" class="form-label">Heure de fin de l'activite</label>
                    <input type="time" class="form-control" name="heure_fin" id="heure_fin"
                        placeholder="Heure de fin de l'activite" value="{{ old('heure_fin') }}" required>

                    @error('heure_fin')
                        <p class="mb-3 text-danger">{{ $message }}</p>
                    @enderror
                </div>

            </div>

            <div class="mb-3">

                <label for="descriptioncontrainte" class="form-label"><strong> Contraintes de l'activité (laisser vide
                        si non applicable)</strong></label><br>

                <div class="mb-3">
                    <textarea class="form-control" name="descriptioncontrainte" id="descriptioncontrainte"
                        placeholder="Description des contraintes" required>{{ $activite->contraintes }}</textarea>

                    @error('descriptioncontrainte')
                        <p class="mb-3 text-danger">{{ $message }}</p>
                    @enderror
                </div>

            </div>

            <div class="mb-3">

                <label for="educatrices" class="form-label"><strong>Changer l'educatrice en charge ou
                        ignorer</strong></label><br>
                <p><strong>Educatrice actuellement en charge: </strong>{{ $activite->educatrice->name }}</p>


                @if ($educatrices->count())

                    <select name="educatrices" id="educatrices">
                        <option value="{{ $activite->educatrice->id }}" selected>Selectionner une educatrice</option>
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


            <button type="submit" class="btn btn-primary">Modifier activite</button>
        </form>
    </section>

</body>

</html>

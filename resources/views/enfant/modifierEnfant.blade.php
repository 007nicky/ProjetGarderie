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

    <section>
        <a class="navbar-brand" href="{{ route('acceuil') }}">Garderie</a>



        {{-- Formulaire d'enregistrement, juste un prototype --}}
        <form class="" action="{{ route('modifierenfant', $enfant) }}" method="post" novalidate>
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Prenom</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Prenom de l'enfant"
                    value="{{ $enfant->name }}" required>

                <div class="invalid-feedback">
                    Champ Vide ou invalide
                </div>

            </div>

            <div class="mb-3">
                <label for="lastname" class="form-label">Nom</label>
                <input type="text" class="form-control" name="lastname" id="lastname" placeholder="Nom de l'enfant"
                    value="{{ $enfant->lastname }}" required>

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
                <input class="form-check-input" type="radio" name="sexe" id="feminin" value="femme">
                <label class="form-check-label" for="feminin">
                    Feminin
                </label>
            </div>


            <div class="mb-3">
                <label for="date_naissance" class="form-label">Date de naissance</label>
                <input type="date" class="form-control" name="date_naissance" id="date_naissance"
                    placeholder="Date de naissance de l'enfant" value="{{ $enfant->date_naissance }}" required>

                <div class="invalid-feedback">
                    Champ Vide ou invalide
                </div>
            </div>

            <div class="mb-3">

                <label for="vaccins" class="form-label"><strong> Liste des vaccins actuels de
                        l'enfant</strong></label><br>

                @if ($enfant->vaccin->count())
                    @foreach ($enfant->vaccin as $vaccin)

                        <p>{{ $vaccin->description }} </p>

                    @endforeach
                @endif

            </div>

            <div class="mb-3">

                <label for="vaccins" class="form-label"><strong> Ajouter un autre vaccin</strong></label><br>

                @if ($vaccins->count())
                    @foreach ($vaccins as $vaccin)

                        <label><input type="checkbox" name="vaccins[]" value="{{ $vaccin->description }}">
                            {{ $vaccin->description }}</label> <br>

                    @endforeach

                    <div class="mb-3">
                        <input type="text" class="form-control" name="vaccin" id="vaccin"
                            placeholder="Ajouter un vaccin non listé" value="{{ old('vaccin') }}" required>

                        <div class="invalid-feedback">
                            Champ Vide ou invalide
                        </div>
                    </div>
                @else
                    <div class="mb-3">
                        <label for="vaccin" class="form-label"><strong>Ajouter un vaccin</strong></label>

                        <input type="text" class="form-control" name="vaccin" id="vaccin"
                            placeholder="Description du vaccin" value="{{ old('vaccin') }}" required>

                        <div class="invalid-feedback">
                            Champ Vide ou invalide
                        </div>
                    </div>
                @endif

            </div>

            <div class="mb-3">

                <label for="educatrices" class="form-label"><strong>Changer educatrice</strong></label><br>
                <p>Educatrice actuelle: {{ $enfant->educatrice->name }} {{ $enfant->educatrice->lastname }}</P>
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


            <button type="submit" class="btn btn-primary">Modifier</button>
        </form>


    </section>

</body>

</html>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire avec Bootstrap et Couleurs Spécifiques</title>
    <!-- Lien vers Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f5f5dc; /* Couleur de fond beige */
            font-family: 'Garamond', serif;
        }
        .form-container {
            background-color: #fff8dc; /* Blanc antique */
            border: 1px solid #d2b48c; /* Bordure couleur marron clair */
            padding: 20px;
            border-radius: 8px;
        }
        .form-group label {
            color: #5a4a3b; /* Couleur marron pour les labels */
        }
        .form-control {
            border-color: #d2b48c; /* Bordure marron clair pour les inputs */
        }
        .btn-custom {
            background-color: #5a4a3b; /* Couleur marron pour le bouton */
            color: #ffffff; /* Couleur blanche pour le texte du bouton */
        }
        .btn-custom:hover {
            background-color: #3b2a1a; /* Couleur marron foncé pour le bouton au survol */
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <div class="form-container">
        <h2>Modifier Livre</h2>
        <form action="/modifie_sauvegarde_L/{{$livre->id}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="titre">Titre</label>
                <input type="text" class="form-control" name="titre" id="titre" value="{{$livre->titre}}">
            </div>
            <div class="form-group">
                <label for="isbn">ISBN</label>
                <input type="text" class="form-control" name="isbn" id="isbn" value="{{$livre->isbn}}">
            </div>
            <div class="form-group">
                <label for="auteur">Auteur</label>
                <input type="text" class="form-control" name="auteur" id="auteur" value="{{$livre->auteur}}">
            </div>
            <div class="form-group">
                <label for="editeur">Éditeur</label>
                <input type="text" class="form-control" name="editeur" id="editeur" value="{{$livre->editeur}}">
            </div>
            <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" name="disponible" id="disponible" value="disponible" checked>
                <label class="form-check-label" for="disponible">Disponible</label>
            </div>
            <div class="form-group">
                <label for="image">Image</label>
                <input type="text" class="form-control" name="image" id="image" value="{{$livre->image}}">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" name="description" id="description" cols="30" rows="10">{{$livre->description}}</textarea>
            </div>
            <div class="form-group">
                <label for="rayon_id">Rayon</label>
                <select class="form-control" id="rayon_id" name="rayon_id" required>
                    @foreach($rayons as $rayon)
                        <option value="{{ $rayon->id }}">{{ $rayon->libelle }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="categorie_id">Catégorie</label>
                <select class="form-control" id="categorie_id" name="categorie_id" required>
                    @foreach($categories as $categorie)
                        <option value="{{ $categorie->id }}">{{ $categorie->libelle }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-custom">Envoyer</button>
        </form>
    </div>
</div>

<!-- Lien vers Bootstrap JS et jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Livre</title>
    <!-- Lien vers Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>

.custom-div {
            color: white; /* Texte en marron foncé */
            background-color:#5a4a3b; /* Couleur de fond beige */
            padding: 1rem;
            border-radius: 5px;
            text-align: center;
        }
        .custom-div .nav-link {
            color: #5a4a3b;
        }
        .custom-div .nav-link:hover {
            color: #3b2a1a;
        }
             .navbar-custom {
            background-color: #f5f5dc;
        }
        .navbar-custom .nav-link {
            color: #5a4a3b;
        }
        .navbar-custom .nav-link:hover {
            color: #3b2a1a;
        }
        .navbar-custom .btn-dark {
            background-color: #5a4a3b;
            border-color: #5a4a3b;
        }
        .navbar-custom .btn-dark:hover {
            background-color: #3b2a1a;
            border-color: #3b2a1a;
        }
        body {

            color: #5a4a3b;
            font-family: 'Garamond', serif;
        }
        .navbar-custom {

            background-color: #f5f5dc;
        }
        .navbar-custom .nav-link {
            color: #5a4a3b;
        }
        .navbar-custom .nav-link:hover {
            color: #3b2a1a;
        }
        .navbar-custom .btn-dark {
            background-color: #5a4a3b;
            border-color: #5a4a3b;
        }
        .navbar-custom .btn-dark:hover {
            background-color: #3b2a1a;
            border-color: #3b2a1a;
        }
        .form-container {
            background-color: #f5f5dc;
            border: 1px solid #e0e0e0;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-top: 20px;
        }
        .btn-custom {
            background-color: #5a4a3b;
            color: white;
        }
        .btn-custom:hover {
            background-color: #3b2a1a;
            color: white;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-custom" style="border-bottom: solid #3b2a1a; position: fixed; display: flex; width: 100%; z-index: 1000; top: 0;">
        <a class="navbar-brand" style="color: #3b2a1a; font-weight: 600; margin-top: 0;" href="#">Livram</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/">Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/livre">Livres</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/categorie">Catégories</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/rayon">Rayons</a>
                </li>
                <li class="nav-item">
                    @if (Auth::check())
                    <a class="nav-link" href="/profil">Profil</a>
                    @endif
                </li>
            </ul>
            @if (Auth::guest())
            <a class="btn btn-dark ml-3" href="/login">Connexion</a>
            @endif
            @if(Auth::check())
            <form action="{{ route('logout') }}" method="POST" role="search">
            @csrf
            @method('DELETE')
            <button class="btn btn-dark ml-3" type="submit">Deconnexion</button>
            </form>
            @endif
        </div>
    </nav>

    <div class="container ">
 <div style="display: flex; height:5rem;" >

   </div>
    <div class="container col-8 border border-secondary-subtle p-2">
        <div class="custom-div">
            <h5>Ajouter un livre</h5>
        </div>
<br>


                        <form action="/modifie_sauvegarde_L/{{{$livre->id}}}" method="POST" class="container ">

                            @csrf
                            <div class="d-flex justify-content-between gap-1">
                                <div class="form-group">
                                    <label for="titre">Titre</label>
                                    <input type="text" class="form-control" id="titre" name="titre" placeholder="Entrez le titre" value="{{$livre->titre}}">
                                </div>
                                <div class="form-group">
                                    <label for="isbn">ISBN</label>
                                    <input type="text" class="form-control" id="isbn" name="isbn" placeholder="Entrez l'ISBN" value="{{$livre->isbn}}">
                                </div>

                            </div>

                            <div class="d-flex justify-content-between gap-1">
                                <div class="form-group">
                                    <label for="auteur">Auteur</label>
                                    <input type="text" class="form-control" id="auteur" name="auteur" placeholder="Entrez l'auteur" value="{{$livre->auteur}}">
                                </div>
                                <div class="form-group">
                                    <label for="editeur">Editeur</label>
                                    <input type="text" class="form-control" id="editeur" name="editeur" placeholder="Entrez l'éditeur" value="{{$livre->editeur}}">
                                </div>
                            </div>

                            <div class="form-group">

                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="disponible" id="disponible" value="disponible"  >
                                    <label class="form-check-label" for="disponible">Disponible</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="image">Image</label>
                                <input type="text" class="form-control" id="image" name="image"  placeholder="Entrez le lien de l'image" value="{{$livre->image}}">
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control" id="description" name="description" rows="6" placeholder="Entrez la description">{{$livre->description}}</textarea>
                            </div>

                            <div class="d-flex justify-content-between gap-1" >
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
                            </div>

                            <button type="submit" class="btn btn-dark ml-3">Envoyer</button>
                        </form>

        </div>
    </div>
    <div class="" style="text-align: center; background:#3b2a1a; color:#f5f5dc;padding:0.8rem; margin-top:5rem;">
        <p>&copy; 2024 Livram Tous droits réservés.</p>
        <h6 style="color: rgb(183, 176, 176);">by M<span style="color:#f5f5dc;">BARRO</span>DI</h6>

    </div>
    <!-- Lien vers Bootstrap JS et jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

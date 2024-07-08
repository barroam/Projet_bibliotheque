
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Modifier Rayon</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            color: #5a4a3b;
        }
        .card {
            background-color: #f5f5dc;
            border: 1px solid #e0e0e0;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
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
        label {
            color: #5a4a3b;
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
        .custom-div {
            color: white; /* Texte en blanc */
            background-color: #5a4a3b; /* Couleur de fond marron foncé */
            padding: 1rem;
            border-radius: 5px;
            text-align: center;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-custom" style="border-bottom:solid #3b2a1a; position: fixed; display: flex; width: 100%; z-index: 1000; top: 0;">
        <a class="navbar-brand" style="color: #3b2a1a; font-weight: 600; margin-top:0;" href="#">Livram</a>
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

    <div class="container">
        <div style="display: flex; height:5rem;"></div>

        <div class="container mt-5 border border-secondary-subtle p-2">
            <div class="custom-div">
                <h5>Modifier Categorie</h5>
            </div>
            <br>
            <form action="/modifie_sauvegarde_c/{{$categorie->id}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="libelle">Nom du Rayon</label>
                    @if(session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                    @endif
                    <input type="hidden" name="id" id="id" value="{{$categorie->id}}" >
                    <input type="text" class="form-control" name="libelle" id="libelle" placeholder="Entrez le nom du rayon" value="{{$categorie->libelle}}">
                </div>
                <div class="form-group">
                    <label for="partie">Direction</label>
                    <textarea  type="text" class="form-control" name="description" id="description" placeholder="Entrez la direction"  rows="10">{{$categorie->description}}</textarea>

                </div>
                <button type="submit" class="btn btn-dark ml-3">Envoyer</button>
            </form>
        </div>
    </div>

    <div class="" style="text-align: ce

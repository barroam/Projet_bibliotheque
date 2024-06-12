<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Lien vers FontAwesome pour les icônes -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <style>
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
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-custom" style="border-bottom:solid #3b2a1a; position: fixed; display: flex; width: 100%; z-index: 1000; " >
        <a class="navbar-brand" style="color: #3b2a1a; font-weight: 600 ; " href="#">Livram</a>
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
            <form action="{{route('logout')}}" method="POST" role="search">
            @csrf
            @method('DELETE')
            <button class="btn btn-dark ml-3" type="submit" >Deconnexion</button>
            </form>
          @endif
        </div>
    </nav>
   <div class="container d-flex flex-wrap" >

    <div class="container col-12 " style="margin-top:5.2rem; ">
        <style>
            .custom-title {
                font-family: 'Arial', sans-serif;
                color: #3b2a1a; /* Marron foncé */
                text-align: center;
                margin-bottom: 30px;
                padding: 10px;
                border-bottom: 2px solid #5a4a3b; /* Ligne sous le titre */
                display: inline-block;
            }
        </style>







                <h1 class="custom-title">Catégories</h1>
                <div class="row">
                    @foreach ($categories as $categorie)
                    <div class="col-md-4">
                        <div class="card custom-card">
                            <div class="card-body">
                                <h4 class="card-title">{{ $categorie->libelle }}</h4>
                                <p class="card-text">{{ $categorie->description }}</p>
                            </div>
                            <div class="card-footer">
                                @if (Auth::check())
                                <a href="/modifie_C/{{ $categorie->id }}" class="btn btn-sm">Modifier</a>
                                <a href="/supprime_C/{{ $categorie->id }}" class="btn btn-sm">Supprimer</a>
                                @endif
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>





   </div>
   <style>
    .custom-title {
        font-family: 'Arial', sans-serif;
        color: #3b2a1a; /* Marron foncé */
        text-align: center;
        margin-bottom: 30px;
        padding: 10px;
        border-bottom: 2px solid #5a4a3b; /* Ligne sous le titre */
        display: inline-block;
    }
    .custom-card {
        background-color: #f5f5dc; /* Couleur de fond beige */
        color: #5a4a3b; /* Texte en marron foncé */
        border: 1px solid #e0e0e0;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        margin-bottom: 20px;
        transition: transform 0.2s, box-shadow 0.2s;
    }
    .custom-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    }
    .custom-card .card-header {
        background-color: #e0e0e0; /* Couleur de fond gris clair pour l'en-tête */
        color: #3b2a1a; /* Texte en marron plus foncé */
        border-bottom: 1px solid #d3d3d3;
    }
    .custom-card .btn {
        background-color: #5a4a3b;
        color: white;
        border: none;
    }
    .custom-card .btn:hover {
        background-color: #3b2a1a;
        color: white;
    }
</style>

<!-- Lien vers les scripts JavaScript de Bootstrap -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

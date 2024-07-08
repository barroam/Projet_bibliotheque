<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de Livres</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <style>
        .table thead th {
            background-color: #5a4a3b; /* Couleur de l'en-tête */
            color: white;
        }
        .table tbody tr:nth-child(odd) {
            background-color: #f2f2f2; /* Couleur des lignes impaires */
        }
        .table tbody tr:nth-child(even) {
            background-color: #ffffff; /* Couleur des lignes paires */
        }
        .table {
            border: 1px solid #5a4a3b; /* Couleur des bordures */
        }
        .btn-custom {
            background-color: #5a4a3b;
            color: white;
        }
        .btn-custom:hover {
            background-color: #3b2a1a;
        }
        .custom-card {
            background-color: #f5f5dc; /* Couleur de fond beige */
            color: #5a4a3b; /* Texte en marron foncé */
            border: 1px solid #e0e0e0;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-bottom: 20px;
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
        .pagination .page-item.active .page-link {
            background-color: #5a4a3b;
            border-color: #5a4a3b;
        }
        .pagination .page-link {
            color: #5a4a3b;
        }
        .pagination .page-link:hover {
            color: #3b2a1a;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-custom" style="border-bottom:solid #3b2a1a; position: fixed; display: flex; width: 100%; z-index: 1000;" >
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
   <div style="display: flex; height:6rem;" >
   </div>
    <div class="container " style="">
        <button class="btn btn-custom mb-3" style="float: right; " onclick="goBack()"><i class="fas fa-arrow-left" style="color:#f5f5dc; font-size:1.5rem;"></i> </button>
        <h2>Liste des Livres</h2>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Titre</th>
                        <th>Auteur</th>
                        <th>Disponibilité</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($livres as $livre)
                    <tr >
                        <td><img src="{{$livre->image}}" alt="Image du livre" style="max-width: 100px;"></td>
                        <td>{{$livre->titre}}</td>
                        <td>{{$livre->auteur}}</td>
                        <td>{{$livre->disponible}}</td>
                        <td>
                            <a href="/details/{{$livre->id}}"  class="btn btn-custom btn-sm m-1" title="Voir"><i class="fas fa-eye"></i></button>
                            <a href="/livre_modifie/{{$livre->id}}" class="btn btn-custom btn-sm m-1" title="Modifier"><i class="fas fa-edit"></i></button>
                            <a href="/supprime_L/{{$livre->id}}"class="btn btn-custom btn-sm m-1" title="Supprimer"><i class="fas fa-trash-alt"></i></button>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
    <div style="color: #5a4a3b">
        {{$livres->links()}}
    </div>
    <div class="" style="text-align: center; background:#3b2a1a; color:#f5f5dc;padding:0.8rem; margin-top:4rem;">
        <p>&copy; 2024 Livram Tous droits réservés.</p>
        <h6 style="color: rgb(183, 176, 176);">by M<span style="color:#f5f5dc;">BARRO</span>DI</h6>
    </div>
    <script>
        function goBack() {
            window.history.back();
        }
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

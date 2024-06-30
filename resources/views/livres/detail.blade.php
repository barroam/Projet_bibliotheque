


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Lien vers FontAwesome pour les icônes -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">

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

   <div class="container d-flex flex-wrap" >

    <div class="container col-12 " style="margin-top:5.2rem; ">

        <div class="card mt-3 border-0 shadow " style="background-color: #f5f5dc;">
            <div class="row g-0">
                <div class="col-md-5">
                    <img src="{{$livre->image}}" class="img-fluid rounded-start" alt="{{$livre->titre}}">
                </div>
                <div class="col-md-7" style="font-size: 1.1rem">
                    <div class="card-body">
                        <h5 class="card-title mb-0">{{$livre->titre}}</h5>
                        <span class="badge bg-dark text-light">{{$livre->disponible }}</span>
                        <hr class="my-2">
                        <p class="card-text"><strong>ISBN:</strong> {{$livre->isbn}}</p>
                        <p class="card-text"><strong>Auteur:</strong> {{$livre->auteur}}</p>
                        <p class="card-text"><strong>Editeur:</strong> {{$livre->editeur}}</p>
                            <p class="card-text"><strong>Catégorie:</strong> {{$livre->categorie->libelle }}</p>
                            <p class="card-text"><strong>Rayon:</strong> {{$livre->rayon->libelle}}</p>
                        <hr class="my-2">
                    </div>
                </div>
            </div>
            <div class=" m-2">
                <div class=" m-2">
                    <h5 style="margin: 1.5rem" class="card-text">{{$livre->description}}</h5>
                </div>
            </div>


        </div>





   </div>

<style>
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

</style>
</body>
</html>

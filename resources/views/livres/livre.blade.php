


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

   <div class=" d-flex flex-wrap " style="" >
    @if(session('livre'))
    <div class="alert alert-success">
        {{ session('livre') }}
    </div>
    @endif

        <div id="livres" class="container-fluid my-5 py-5 ">
            <h1 class="text-center">Liste des livres</h1>
            <div class="container">
                <div class="row text-center " style="display: flex; flex-wrap: wrap; gap:2rem;" >
                    @foreach ($livres as $livre)
                    <div  style= "width: 22.1rem; height: 26.5rem;" >
                        <div class="card h-100" style="background:#f5f5dc;">
                            <img style="width: 22rem; height: 15rem; object-fit:cover; background:#f5f5dc;" src="{{$livre->image}}"  alt="Book 3">
                            <span class="badge rounded-1 text-light "style="position: relative; font-size:1rem;  display:flex; justify-self: start; margin:-1.8rem 1rem 1rem 0.5rem; background-color:#5a4a3b; padding: 0.2rem 0.5rem; height: auto; width: 6rem;" >{{$livre->disponible}}</span>
                            <div class="card-body" style="">
                                <h5 class="card-title">{{$livre->titre}}</h5>

                                <p>{{ Illuminate\Support\Str::limit($livre['description'], 70) }}</p>
                                <a href="/details/{{$livre->id}}"> <i class="fa-solid fa-circle-info" style="z-index: 1000; color:#3b2a1a;font-size:2rem; float: right;"></i></a>

                            </div>
                        </div>

                    </div>
                    @endforeach
                </div>
            </div>
            <div class="m-4" >
                {{$livres->links()}}
            </div>
        </div>
   </div>

   <div class="" style="text-align: center; background:#3b2a1a; color:#f5f5dc;padding:0.8rem; margin-top:5rem;">
    <p>&copy; 2024 Livram Tous droits réservés.</p>
    <h6 style="color: rgb(183, 176, 176);">by M<span style="color:#f5f5dc;">BARRO</span>DI</h6>

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

</body>
</html>

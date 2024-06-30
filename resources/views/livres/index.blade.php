



<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Lien vers FontAwesome pour les icônes -->
   <link rel="stylesheet" href="">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body{
            background-color: #f5f5dc;
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
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-custom" style="border-bottom:solid #3b2a1a; position: fixed; display: flex; width: 100%; z-index: 1000; top: 0;" >
        <a class="navbar-brand" style="color: #3b2a1a; font-weight: 600 ;margin-top:0; " href="#">Livram</a>
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
    <!-- la banierre -->
    <div class="jumbotron jumbotron-fluid text-center banner" style="background-color: #5a4a3b; margin-top:3.6rem;">
        <div class="container">
            <h1 style="color: #f5f5dc;" >Bienvenue au dans Livram</h1>
            <p class="lead" style="color: #f5f5dc;">Explorez une vaste collection de livres et trouvez vos prochains favoris.</p>
        </div>
    </div>
<!-- la partie du livre -->

    <div id="livres" class="container-fluid my-5 py-5 ">
        <h2 class="text-center">Livres</h2>
        <div class="container">

            <div class="row text-center " style="display: flex; flex-wrap: wrap; gap:2rem;" >
                @foreach ($livres as $livre)
                <div  style= "width: 22.1rem; height: 26.5rem;" >
                    <div class="card h-100" style="backgrounf:#f5f5dc;">
                        <img style="width: 22rem; height: 15rem; object-fit:cover; backgrounf:#f5f5dc;" src="{{$livre->image}}"  alt="Book 3">
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
    </div>

    <!-- le partie des catégories -->
    <h2 class="text-center">Catégories</h2>
    <div class="container">
    <div class="container-fluid my-5 py-5" style="display: flex; flex-wrap: wrap; gap:2rem; align-items:center;" >
        @foreach ($categories as $categorie)
        <div class="" style="width: 21rem; ">
            <div class="card custom-card">
                <div class="card-body">
                    <h4 class="card-title">{{ $categorie->libelle }}</h4>
                    <p class="card-text">{{ $categorie->description }}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
   </div>

       <!-- le partie des catégories -->
       <h2 class="text-center">Rayons</h2>
       <div class="container">
       <div class="container-fluid my-5 py-5" style="display: flex; flex-wrap: wrap; gap:2rem; align-items:center;" >
           @foreach ($rayons as $rayon)
           <div class="" style="width: 21rem; ">
               <div class="card custom-card">
                   <div class="card-body">
                       <h4 class="card-title">{{ $rayon->libelle }}</h4>
                       <p class="card-text">{{ $rayon->partie }}</p>
                   </div>
               </div>
           </div>
           @endforeach
       </div>
      </div>



   <div style="position: relative; width: 100%; height: 0; padding-top: 33.3333%;
   padding-bottom: 0; box-shadow: 0 2px 8px 0 rgba(63,69,81,0.16);overflow: hidden;
    will-change: transform;">
    <iframe loading="lazy" style="position: absolute; width: 100%; height: 100%; top: 0; left: 0; border: none; padding: 0;margin: 0;"
      src="https:&#x2F;&#x2F;www.canva.com&#x2F;design&#x2F;DAGHzLu0rBI&#x2F;zbocI5REj7mK9CJ1R4JuIQ&#x2F;view?embed" allowfullscreen="allowfullscreen" allow="fullscreen">
    </iframe>
  </div>
   </div>

   <div class="" style="text-align: center; background:#3b2a1a; color:#f5f5dc;padding:0.8rem;">
    <p>&copy; 2024 Livram Tous droits réservés.</p>
    <h6 style="color: rgb(183, 176, 176);">by M<span style="color:#f5f5dc;">BARRO</span>DI</h6>

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

        background-color:#fff; /* Couleur de fond beige */
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

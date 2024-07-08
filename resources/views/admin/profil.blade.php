<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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


<div class="cont">
    <!-- la navbar-->

<div class="box1">

    <ul class="nav flex-column">
        <li class="nav-item">
            <a class="nav-link" style="font-size: 1.2rem; margin-top:0.5rem;" href="#"><i class="fas fa-tachometer-alt"></i> <strong> Dashboard</strong> </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('list_livre')}}"><i class="fas fa-book"></i> Livres</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('list_categorie')}}"><i class="fas fa-th-list"></i> Categories</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('list_rayon')}}"><i class="fas fa-store"></i> Rayons</a>
        </li>
    </ul>
</div>

    <!-- conteneur element-->
<div class="box2">

    @if ($errors->any())
    <div class="alert text-light" style="display: flex;position:fixed;z-index:1000; width:70%; background:#5a4a3b;border:0.1rem solid #000; " >

        <div ><a href="/profil" style="float:right; position:fixed; margin-left:64%; text-decoration:none; color:#fff; font-weight:bolder;font-size:1.3rem; ">OK</a>
            </div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="container col-6 border border-secondary-subtle p-2">
        <div class="custom-div">
            <h5>Ajouter un livre</h5>
        </div>
<br>


                        <form action="/sauvegarde_livre" method="POST" class="container ">

                            @csrf
                            <div class="d-flex justify-content-between gap-1">
                                <div class="form-group">
                                    <label for="titre">Titre</label>
                                    <input type="text" class="form-control" id="titre" name="titre" placeholder="Entrez le titre">
                                </div>
                                <div class="form-group">
                                    <label for="isbn">ISBN</label>
                                    <input type="text" class="form-control" id="isbn" name="isbn" placeholder="Entrez l'ISBN">
                                </div>

                            </div>

                            <div class="d-flex justify-content-between gap-1">
                                <div class="form-group">
                                    <label for="auteur">Auteur</label>
                                    <input type="text" class="form-control" id="auteur" name="auteur" placeholder="Entrez l'auteur">
                                </div>
                                <div class="form-group">
                                    <label for="editeur">Editeur</label>
                                    <input type="text" class="form-control" id="editeur" name="editeur" placeholder="Entrez l'éditeur">
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
                                <input type="text" class="form-control" id="image" name="image"  placeholder="Entrez le lien de l'image">
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control" id="description" name="description" rows="3" placeholder="Entrez la description"></textarea>
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
   <div class="col-5" style="margin-top: -3rem;">
    <div class="container mt-5 border border-secondary-subtle  p-2">
        <div class="custom-div">
            <h5>Ajouter une catégorie </h5>

        </div>
        <br>
        <!-- Formulaire pour ajouter une catégorie -->
        <form action="/ajout/sauvegarde_categorie" method="post">
            @csrf

            <div class="form-group">
                <label for="libelle">Nom du Catégorie</label>
                <input type="text" class="form-control" name="libelle" id="libelle" placeholder="Entrez le nom de la catégorie">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <input type="text" class="form-control" name="description" id="description" placeholder="Entrez la description">
            </div>
            <button type="submit" class="btn btn-dark ml-3">Envoyer</button>
        </form>

    </div>

    <!--formulaie pour ajouter un rayon -->


     <div class="container mt-5 border border-secondary-subtle p-2">
        <div class="custom-div">
            <h5>Ajouter un rayon</h5>

        </div>
        <br>
            <form action="/ajout/sauvegarde" method="post">
                @csrf
                <div class="form-group">
                    <label for="libelle">Nom du Rayon</label>
                    @if(session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
                    <input type="text" class="form-control" name="libelle" id="libelle" placeholder="Entrez le nom du rayon">
                </div>
                <div class="form-group">
                    <label for="partie">Direction</label>
                    <input type="text" class="form-control" name="partie" id="partie" placeholder="Entrez la direction">
                </div>
                <button type="submit" class="btn btn-dark ml-3">Envoyer</button>
            </form>

   </div>



</div>
</div>

</body>
<style>
    .cont{
display: flex;

    }
.box1{
    margin-top:3.65rem ;
    width: 15%;
   margin-bottom: 2rem;
    height: 100vw;
   position: fixed;
}
.box1 {
    background-color: #f5f5dc;
    border-right: solid #3b2a1a;

}

.box1 .nav-link {
    color: #5a4a3b;
    margin-bottom: 10px;
}

.box1 .nav-link:hover {
    color: #3b2a1a;
}
.box2{
    margin-top: 5rem;
   margin-left: 16rem;
    padding: 1.2rem;
    width: 84%;
     display:flex ;
     justify-content: space-around;
     gap: 1rem;
     height: auto;
     align-items: flex-start;
}

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
</style>
</html>

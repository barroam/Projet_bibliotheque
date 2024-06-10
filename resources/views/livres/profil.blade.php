<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>


<nav class="navbar navbar-expand-lg navbar-book-theme">
    <a class=" navbar-brand" href="#">
        Bibliothèque
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="#">Accueil</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/profil">profil</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Auteurs</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">À propos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Contact</a>
            </li>
        </ul>
    </div>
</nav>
    <h1>hello word </h1>



<!--formulaie pour ajouter un catégorie -->
<form action="/ajout/sauvegarde_categorie" method="post">
    @csrf
<div>
    <label for="libelle" > nom du catégorie</label>
    <input type="text" name="libelle" id="libelle" >
</div>
<div>
    <label for="description" >description</label>
    <input type="text" name="description" id="description" >
    <button type="submit">envoyer</button>
</div>

</form>
<br>
<hr>
<br>
<!--formulaie pour ajouter un rayon -->
<form action="/ajout/sauvegarde" method="post">
    @csrf
<div>
<label for="libelle" >nom du rayon</label>
    <input type="text" name="libelle" id="libelle" >
</div>
<div>
    <label for="partie">direction</label>
    <input type="text" name="partie" id="partie" >
    <button type="submit">envoyer</button>
</div>
</form>

<h1>Rayon</h1>
<div>
    @foreach ($rayons as $rayon)
    <h4>   {{$rayon->partie}}</h4>

 <p>
    {{$rayon->libelle}}
 </p>
<a href="/modifie_R/{{$rayon->id}}">Modifer</a>
<a href="/supprime_R/{{$rayon->id}}">Supprimer</a>
<hr>
    @endforeach
</div>

<h1>catgorie</h1>
<div>
    @foreach ($categories as $categorie)
    <p>
       {{$categorie->libelle}}
    </p>
    <h4>   {{$categorie->description}}</h4>
    <a href="/modifie_C/{{$categorie->id}}">Modifer</a>
<a href="/supprime_C/{{$categorie->id}}">Supprimer</a>
<hr>
    @endforeach
</div>






<form action="/sauvegarde_livre" method="POST">
  @csrf
    <div>
        <label for="titre" >Titre</label>
            <input type="text" name="titre" id="titre" >
        </div>
     <div>
            <label for="isbn" >ISBN</label>
                <input type="text" name="isbn" id="isbn" >
     </div>
     <div>
                <label for="auteur" >Auteur</label>
                    <input type="text" name="auteur" id="auteur" >
      </div>
     <div>
                    <label for="editeur" >Editeur</label>
                        <input type="text" name="editeur" id="editeur" >
     </div>

  <div>
    <label for="disponible">Disponible</label>
    <input type="checkbox" name="disponible" id="disponible" value="disponible" checked>
  </div>
  <div>
    <label for="image" >Image</label>
        <input type="text" name="image" id="image" value="disponible">
  </div>
  <div>
  <textarea name="description" id="description" cols="30" rows="10">
  </textarea>
  </div>

  <div>
    <label for="rayon_id">Rayon</label>
    <select id="rayon_id" name="rayon_id" required>
        @foreach($rayons as $rayon)
            <option value="{{ $rayon->id }}">{{ $rayon->libelle }}</option>
        @endforeach
    </select>
 </div>
<div>
    <label for="categorie_id">Categorie</label>
        <select id="categorie_id" name="categorie_id" required>
            @foreach($categories as $categorie)
                <option value="{{ $categorie->id }}">{{ $categorie->libelle }}</option>
            @endforeach
        </select>
</div>

<button type="submit">Envoyer</button>

</form>


<div>
 @foreach ($livres as $livre)

 <h4>{{$livre->auteur}}</h4>
 <h4>{{$livre->description}}</h4>
 <h4>{{$livre->disponible}}</h4>
 <h4>{{$livre->editeur}}</h4>
 <h4>{{$livre->image}}</h4>
<h4>{{$categorie->libelle}}</h4>
<h4>{{$rayon->libelle}}</h4>
<a href="/livre_modifie/{{$livre->id}}">modifier</a>
<a href="/supprime_L/{{$livre->id}}">Supprimer</a>
<hr>
 @endforeach

</div>

</body>
</html>

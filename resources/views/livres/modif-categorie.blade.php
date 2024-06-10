<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
   <h1>modifie</h1>

   <form action="/modifie_sauvegarde_c/{{$categorie->id}}" method="post">
    @csrf
    {{-- <input type="hidden" name="id" id="id" value="{{$categorie->id}}" > --}}
    <p>{{$categorie->id}}</p>
<div>
<label for="libelle" >nom du categorie</label>
    <input type="text" name="libelle" id="libelle" value="{{$categorie->libelle}}" required>
</div>
<div>
    <label for="description">description</label>
    <input type="text" name="description" id="description" value="{{$categorie->description}}" required>
    <button type="submit">envoyer</button>
</div>
</form>

</body>
</html>

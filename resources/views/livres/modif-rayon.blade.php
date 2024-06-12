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

   <form action="/modifie_sauvegarde" method="post">
    @csrf
    <input type="hidden" name="id" id="id" value="{{$rayon->id}}" >
    <p>{{$rayon->id}}</p>
<div>
<label for="libelle" >nom du rayon</label>
    <input type="text" name="libelle" id="libelle" value="{{$rayon->libelle}}" >
</div>
<div>
    <label for="partie">direction</label>
    <input type="text" name="partie" id="partie" value="{{$rayon->partie}}">
    <button type="submit">envoyer</button>
</div>
</form>

</body>
</html>

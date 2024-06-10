<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body> {{$livre->id}}
    <form action="/modifie_sauvegarde_L/{{$livre->id}}" method="POST">
        @csrf
          <div>
              <label for="titre" >Titre</label>
                  <input type="text" name="titre" id="titre" value ="{{$livre->titre}}">
              </div>
           <div>
                  <label for="isbn" >ISBN</label>
                      <input type="text" name="isbn" id="isbn" value=" {{$livre->isbn}} ">
           </div>
           <div>
                      <label for="auteur" >Auteur</label>
                          <input type="text" name="auteur" id="auteur" value=" {{$livre->auteur}}" >
            </div>
           <div>
                          <label for="editeur" >Editeur</label>
                              <input type="text" name="editeur" id="editeur" value=" {{$livre->editeur}} ">
           </div>

        <div>
          <label for="disponible">Disponible</label>
          <input type="checkbox" name="disponible" id="disponible" value="disponible" checked>
        </div>
        <div>
          <label for="image" >Image</label>
              <input type="text" name="image" id="image" value="{{$livre->image}}">
        </div>
        <div>
        <textarea name="description" id="description" cols="30" rows="10"> {{$livre->description}}
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
                      <option value="{{ $categorie->id }}"> {{ $categorie->libelle }}</option>
                  @endforeach
              </select>
      </div>

      <button type="submit">Envoyer</button>

      </form>

</body>
</html>

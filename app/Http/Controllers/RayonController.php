<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Rayon;


class RayonController extends Controller
{
    // la methode pour ajouter un Rayon
    public function ajouter_rayons( Request $request){
       //la validation de l'ajout
        $request->validate([
            'id' => 'nullable|exists:rayons,id',
            'libelle' => 'required|string|max:255',
            'partie' => 'required|string|max:255',
        ]);
  $rayons = Rayon::create($request->all());
   return redirect ('/profil');
    }

    //la methode pour modifier un rayon
    public function modifie_rayons($id){
         $rayon = Rayon::findorfail($id);
         return view('livres.modif-rayon',compact('rayon'));
    }
 //la methode pour enregistrer la modification
    public function sauvegarde_modife_rayons (Request $request) {
        //la validation des données
    $request->validate([
        'libelle' => 'required|string|max:255',
        'partie' => 'required|string|max:255',
    ]);

    // Utiliser update pour mettre à jour ou créer le rayon
       $rayon = Rayon::findOrfail($request->id);
        $rayon->libelle = $request->libelle ;
        $rayon->partie = $request->partie ;
        $rayon->update();
    return redirect('profil');
}

  public function supprime_rayons ($id){
          $rayon = Rayon::find($id);
          $rayon->delete();
     return redirect ('profil');
  }






}

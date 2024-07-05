<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Rayon;


class RayonController extends Controller
{
    public function affiche_rayons (){

            $rayons = Rayon::all();
            return view ('/livres.rayon',compact('rayons',));
           }
    // la methode pour ajouter un Rayon
    public function ajouter_rayons( Request $request){
            // Définition des messages de validation personnalisés par attribut
    $messages = [
        'id.exists' => 'Le rayon sélectionné n\'existe pas.',
        'libelle.required' => 'Le champ Libellé est requis.',
        'libelle.string' => 'Le champ Libellé doit être une chaîne de caractères.',
        'libelle.max' => 'Le champ Libellé ne peut pas dépasser :max caractères.',

        'partie.required' => 'Le champ Partie est requis.',
        'partie.string' => 'Le champ Partie doit être une chaîne de caractères.',
        'partie.max' => 'Le champ Partie ne peut pas dépasser :max caractères.',
    ];
        //la validation de l'ajout
        $request->validate([
            'id' => 'nullable|exists:rayons,id',
            'libelle' => 'required|string|max:255',
            'partie' => 'required|string|max:255',
        ],$messages);
  $rayons = Rayon::create($request->all());
   return redirect ('/rayon');
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
    return redirect('/rayon');
}

  public function supprime_rayons ($id){
          $rayon = Rayon::find($id);
          $rayon->delete();
     return redirect ('/rayon');
  }






}

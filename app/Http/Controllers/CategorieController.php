<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categorie;

class CategorieController extends Controller
{
         // la methode pour ajouter les categories
    public function ajouter_categories (Request $request){
        $request->validate ([
            'libelle' => 'required|string|max:255',
            'description' => 'required|string|max:255',
        ]);

        $categories = Categorie::create($request->all());
        return redirect ('profil');
    }
   // la methode pour affiche la vue modification et son id
    public function modifie_categories($id){
        $categorie = Categorie::findorfail($id);
      return view ('/livres.modif-categorie',compact('categorie'));
    }

    // la methode pour enregistrer la modification d'une categorie
//     public function sauvegarde_modife_categories(Request $request , Categorie $categorie){
//         // Pour la validation

//         //Pour l'stockage et l'enregistrement dans la base de donnée
//         $categorie->libelle = $request->libelle;
//      $categorie->description = $request->description;
//      $categorie->update();
//         return redirect('profil');
//  }
   public function sauvegarde_modife_categories (Request $request ,$id) {
   $categorie = Categorie::find($id);
    $categorie->update($request->all());
    return redirect('/categorie');
   }

   //la methode pour supprimer une categorie
   public function supprime_categories($id){
     $categorie = Categorie::find($id);
     $categorie->delete();
     return redirect('/categorie');
   }
    public function affiche_categories(){
        $categories = Categorie::all();
        return view ('/livres.categorie',compact('categories',));
    }




}

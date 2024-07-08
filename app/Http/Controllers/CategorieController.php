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
        return redirect ('list_categorie');
    }
   // la methode pour affiche la vue modification et son id
    public function modifie_categories($id){
        $categorie = Categorie::findorfail($id);
      return view ('categories.modif-categorie',compact('categorie'));
    }


   public function sauvegarde_modife_categories (Request $request ,$id) {
   $categorie = Categorie::find($id);
    $categorie->update($request->all());
    return redirect('/list_categorie');
   }

   //la methode pour supprimer une categorie
   public function supprime_categories($id){
     $categorie = Categorie::find($id);
     $categorie->delete();
     return redirect()->back();
   }
   
    public function affiche_categories(){
        $categories = Categorie::all();
        return view ('/categories.categorie',compact('categories',));
    }

    public function list_categorie(){
    $categories = Categorie::paginate(6);
    return view ('/admin.list_categorie',compact('categories',));
    }




}

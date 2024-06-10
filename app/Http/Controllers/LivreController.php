<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use \App\Models\Livre;
use App\Models\Rayon;
use App\Models\Categorie;

class LivreController extends Controller
{
    //la fonction pour afficher la page d'accueil
    public function accueil (){
        return view ('livres.index');
    }

    //la fonction pour afficher la page profil de l'administrateur
    public function profil(){
        return view('livres.profil');
    }

    //la fonction affiche

    public function affiche_all (){
    $livres = Livre::all();
       $categories = Categorie::all();
        $rayons = Rayon::all();
        return view ('/livres.profil',compact('categories','rayons','livres'));
       }

    public function Ajouter_livres(Request $request){
        $request->validate([

            'titre' => 'required|string',
            'isbn' => 'required|integer',
            'auteur' => 'required|string',
            'editeur' => 'required|string',
            'disponible' => 'nullable',
            'image' => 'required|string',
            'description' => 'required|string',

        ]);
        $disponible = $request->disponible === 'disponible' ? 'disponible' : 'emprunté';
        $request['disponible'] = $disponible;

        $livres = Livre::create($request->all());

        return redirect ('profil');
    }

    //la  methode pour afficher la modification
    public function modifie_livres($id){
        $livre = Livre::findorfail($id);
        $categories = Categorie::all();
        $rayons = Rayon::all();
        return view('/livres/modif-livre',compact('livre','categories', 'rayons'));
    }

    //la methode pour sauvegarder le modifications d'un livre
    public function sauvegarde_modifie_livres(Request $request , $id){
        $request->validate([
            'titre' => 'required|string',
           'isbn' => 'required|integer',
            'auteur' => 'required|string',
            'editeur' => 'required|string',
         'disponible' => 'nullable',
           'image' => 'required|string',
            'description' => 'required|string',

        ]);
        $disponible = $request->disponible === 'disponible' ? 'disponible' : 'emprunté';
        $request['disponible'] = $disponible;
        $livre = Livre::find($id);
        $livre->update($request->all());

        return redirect ('profil');
    }
    //la route pour la suppression 
    public function supprime_livres($id){
        $livre = Livre::findorfail($id);
        $livre->delete();
         return redirect()->back();

    }



}

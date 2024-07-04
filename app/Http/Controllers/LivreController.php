<?php

namespace App\Http\Controllers;


use App\Models\Rayon;
use \App\Models\Livre;
use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LivreController extends Controller
{
    //la fonction pour afficher la page d'accueil
    public function accueil (){
        $livres = Livre::all();
        $categories = Categorie::all();
         $rayons = Rayon::all();
        return view ('livres.index',compact('categories','rayons','livres'));
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

    public function affiche_livres(){
        $livres = Livre::all();
           $categories = Categorie::all();
            $rayons = Rayon::all();
            return view ('/livres.livre',compact('categories','rayons','livres'));
           }

    public function Ajouter_livres(Request $request){
        $messages = [
            'titre.required' => 'Le champ Titre est requis.',
            'titre.string' => 'Le champ Titre doit être une chaîne de caractères.',
            'titre.max' => 'Le champ Titre ne peut pas dépasser :max caractères.',

            'isbn.required' => 'Le champ ISBN est requis.',
            'isbn.string' => 'Le champ ISBN doit être une chaîne de caractères.',
            'isbn.max' => 'Le champ ISBN ne peut pas dépasser :max caractères.',

            'auteur.required' => 'Le champ Auteur est requis.',
            'auteur.string' => 'Le champ Auteur doit être une chaîne de caractères.',
            'auteur.max' => 'Le champ Auteur ne peut pas dépasser :max caractères.',

            'editeur.required' => 'Le champ Éditeur est requis.',
            'editeur.string' => 'Le champ Éditeur doit être une chaîne de caractères.',
            'editeur.max' => 'Le champ Éditeur ne peut pas dépasser :max caractères.',

            'description.required' => 'Le champ Description est requis.',
            'description.string' => 'Le champ Description doit être une chaîne de caractères.',

            'image.string' => 'Le champ Image doit être une chaîne de caractères.',

            'rayon_id.required' => 'Le champ Rayon est requis.',
            'rayon_id.exists' => 'La sélection pour le champ Rayon n\'est pas valide.',

            'categorie_id.required' => 'Le champ Catégorie est requis.',
            'categorie_id.exists' => 'La sélection pour le champ Catégorie n\'est pas valide.'
        ];

        $request->validate([

            'titre' => 'required|string',
            'isbn' => 'required|integer',
            'auteur' => 'required|string',
            'editeur' => 'required|string',
            'disponible' => 'nullable',
            'image' => 'required|string',
            'description' => 'required|string',

        ],$messages);

        $disponible = $request->disponible == 'disponible' ? 'disponible' : 'emprunté';
        $request['disponible'] = $disponible;

        $livres = Livre::create($request->all());

        return redirect ('livre')->with('livre', 'Ajouter avec succès.');
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
        $disponible = $request->disponible == 'disponible' ? 'disponible' : 'emprunté';
        $request['disponible'] = $disponible;
        $livre = Livre::find($id);
        $livre->update($request->all());

        return redirect ('livre');
    }
    //la methode  pour la suppression
    public function supprime_livres($id){
        $livre = Livre::findorfail($id);
        $livre->delete();
         return redirect()->back();
    }
    // la methode pour affiche le details d'un livre
    public function affiche_details($id){
       // $livre = Livre::find($id)->get();;
       // $categorie = Categorie::find($id);
       // $livre=$categorie;
       // $rayon = Rayon::find($id);
      //  $livre=$rayon;
      $livre = Livre::with(['categorie', 'rayon'])->find($id);
      return view('livres.detail', compact('livre'));
           }

           public function search(Request $request)
           {
               $query = $request->input('query');

               $livres = Livre::where('titre', 'like', "%$query%")
                              ->orWhere('auteur', 'like', "%$query%")
                              ->get();

               return view('livres.search', compact('livres', 'query'));
           }

}

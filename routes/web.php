<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LivreController;
use App\Http\Controllers\RayonController;
use App\Http\Controllers\CategorieController;


{
    //afficher tous les tables(livre,categorie,rayon)
      Route::get('profil',[LivreController::class,'affiche_all'])->middleware('auth');

    //LIVRE
    //la route du page d'accueil
    Route::get('/',[LivreController::class,'accueil']);
    //la route pour ajouter un livre
    Route::post('/sauvegarde_livre',[LivreController::class,'Ajouter_livres'])->middleware('auth');
    //la route pour modifier livre
    Route::get('livre_modifie/{id}',[LivreController::class,'modifie_livres'])->middleware('auth');
    //la route pour modifier sauvegarde livre
    Route::post('/modifie_sauvegarde_L/{id}',[LivreController::class,'sauvegarde_modifie_livres']);
    //la route pour la suppresion livre
    Route::get('/supprime_L/{id}',[LivreController::class,'supprime_livres'])->middleware('auth');
    //la route pour affiche les livres
    Route::get('/livre',[LivreController::class,'affiche_livres']);
    //la route pour la page details
    Route::get('/details/{id}',[LivreController::class,'affiche_details']);

    //CATEGORIE
    //la route pour ajouter catégorie
    Route::post('/ajout/sauvegarde_categorie',[CategorieController::class,'ajouter_categories'])->middleware('auth');
    //la route pour modifier categorie
    Route::get('modifie_C/{id}',[CategorieController::class,'modifie_categories'])->middleware('auth');
    //la route pour modifier sauvegarder
    Route::post('/modifie_sauvegarde_c/{id}',[CategorieController::class,'sauvegarde_modife_categories'])->middleware('auth');;
    //la route pour supprimer categorie
    Route::get('supprime_C/{id}',[CategorieController::class,'supprime_categories'])->middleware('auth');;
    //la route pour afficher une catégorie
    Route::get('/categorie',[CategorieController::class,'affiche_categories']);


    //RAYON
    //la route pour ajouter un rayon
    Route::post('/ajout/sauvegarde',[RayonController::class,'ajouter_rayons'])->middleware('auth');;
    //la route pour modifier un rayon
    Route::get('modifie_R/{id}',[RayonController::class,'modifie_rayons'])->middleware('auth');
    //la route pour sauvegarder un rayon modifier
    Route::post('/modifie_sauvegarde',[RayonController::class,'sauvegarde_modife_rayons'])->middleware('auth');;
    //la route pour supprimer un rayon
    Route::get('supprime_R/{id}',[RayonController::class,'supprime_rayons'])->middleware('auth');
  //la route pour afficher rayon
   Route::get('/rayon',[RayonController::class,'affiche_rayons']);


 //la route de l'enregistrement d'un admin
 Route::get('/register',[AuthController::class,'register'])->name('register')->middleware('auth');

 Route::post('/register',[AuthController::class,'registerPost'])->name('registers');

 Route::get('/login',[AuthController::class,'login'])->name('login');

 Route::post('/login',[AuthController::class,'loginPost'])->name('loginPost');
  //la route pour la deconnexion
  Route::delete('/logout',[AuthController::class,'logout'])->name('logout');

Route::get('/search',[LivreController::class, 'search'])->name('search');

Route::get('list_livre',[LivreController::class,'list_livre'])->name('list_livre')->middleware('auth');
Route::get('list_rayon',[RayonController::class,'list_rayon'])->name('list_rayon')->middleware('auth');
Route::get('list_categorie',[CategorieController::class,'list_categorie'])->name('list_categorie')->middleware('auth');

}




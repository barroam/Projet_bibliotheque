<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LivreController;
use App\Http\Controllers\RayonController;
use App\Http\Controllers\CategorieController;


{
    //afficher tous les tables(livre,categorie,rayon)
      Route::get('profil',[LivreController::class,'affiche_all']);

    //LIVRE
    //la route du page d'accueil
    Route::get('/',[LivreController::class,'accueil']);
    //la route pour ajouter un livre
    Route::post('/sauvegarde_livre',[LivreController::class,'Ajouter_livres']);
    //la route pour modifier livre
    Route::get('livre_modifie/{id}',[LivreController::class,'modifie_livres']);
    //la route pour modifier sauvegarde livre
    Route::post('/modifie_sauvegarde_L/{id}',[LivreController::class,'sauvegarde_modifie_livres']);
    //la route pour la suppresion livre
    Route::get('/supprime_L/{id}',[LivreController::class,'supprime_livres']);



    //CATEGORIE
    //la route pour ajouter catégorie
    Route::post('/ajout/sauvegarde_categorie',[CategorieController::class,'ajouter_categories']);
    //la route pour modifier categorie
    Route::get('modifie_C/{id}',[CategorieController::class,'modifie_categories']);
    //la route pour modifier sauvegarder
    Route::post('/modifie_sauvegarde_c/{id}',[CategorieController::class,'sauvegarde_modife_categories']);
    //la route pour supprimer categorie
    Route::get('supprime_C/{id}',[CategorieController::class,'supprime_categories']);



    //RAYON
    //la route pour ajouter un rayon
    Route::post('/ajout/sauvegarde',[RayonController::class,'ajouter_rayons']);
    //la route pour modifier un rayon
    Route::get('modifie_R/{id}',[RayonController::class,'modifie_rayons']);
    //la route pour sauvegarder un rayon modifier
    Route::post('/modifie_sauvegarde',[RayonController::class,'sauvegarde_modife_rayons']);
    //la route pour supprimer un rayon
    Route::get('supprime_R/{id}',[RayonController::class,'supprime_rayons']);









}




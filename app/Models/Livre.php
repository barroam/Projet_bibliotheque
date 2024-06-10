<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livre extends Model
{
    use HasFactory;
    protected $fillable =[
         'titre',
            'isbn',
            'auteur',
            'editeur',
            'disponible',
            'image',
            'description',
            'categorie_id',
            'rayon_id',
    ];

   public function categorie():BelongsTo{
        return $this->belongsTo(Categorie::class);
   }
   public function rayon():BelongsTo{
    return $this->belongsTo(Rayon::class);
}


}

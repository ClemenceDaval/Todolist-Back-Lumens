<?php

namespace App\Models;

// on importe le coreCodel de lumen
use Illuminate\Database\Eloquent\Model;

//ici mon modèle Category hérite du "coreModele "Model"

class Category extends Model {
    // Sans le préciser, Eloquent va chercher dans la table categories
    // => Category au pluriel


    public function tasks(){
        // cette methode définit le lien / la relation entre les deux tables
        return $this->hasMany('App\Models\Task');
    }

}

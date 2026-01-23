<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inscription extends Model
{
    protected $fillable = [
        'nom',
        'prenom',
        'adresse',
        'age',
        'sexe',
        'cin',
        'telephone',
        'email',
        'mots_de_passe',
        
    ];
}

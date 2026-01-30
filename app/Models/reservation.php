<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = [
        'nom',
        'email',
        'np',
        'telephone',
        'date',
        'heure_debut',
        'heure_fin',
        'type_evenement'
    ];
}

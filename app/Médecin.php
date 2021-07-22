<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Médecin extends Model
{
    protected $fillable = [
        'nom','prenom'
    ];
}

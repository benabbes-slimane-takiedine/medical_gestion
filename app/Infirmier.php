<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Infirmier extends Model
{
    protected $fillable = [
        'nom','prenom'
    ];
}

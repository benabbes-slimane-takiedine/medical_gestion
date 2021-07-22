<?php

namespace App;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use SoftDeletes;
    public function user(){
        return $this->belongsTo('App\User');
    }
}

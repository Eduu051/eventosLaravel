<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Esdeveniment extends Model
{
    public function categoria(){
        return $this->belongsTo(Categoria::class);
    }

    public function user(){
        return $this->belongsToMany(User::class, 'esdeveniment_user');
    }
}

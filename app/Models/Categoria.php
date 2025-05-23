<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table = 'categories';

    public function esdeveniments(){
        return $this->hasMany(Esdeveniment::class, 'category_id');
    }
}

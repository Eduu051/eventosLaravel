<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Esdeveniment extends Model
{
    use HasFactory;

    /**
     * Mass assignable attributes
     *
     * @var array
     */
    protected $fillable = [
        'nombre',
        'descripcion',
        'fecha_evento',
        'hora',
        'max_personas',
        'edad_minima',
        'imagen',
        'category_id',
    ];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'category_id');
    }

    public function user()
    {
        return $this->belongsToMany(User::class, 'esdeveniment_user');
    }
}

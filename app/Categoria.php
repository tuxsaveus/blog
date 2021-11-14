<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table = 'categorias';
    protected $fillable = [
        'nombre', 'descripcion'
    ];

    public function publicaciones()
    {
        return $this->hasMany(Publicacion::class);
    }
}

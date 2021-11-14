<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Publicacion extends Model
{
    protected $table = 'publicaciones';
    protected $fillable = [
        'titulo', 'categoria_id', 'articulo','activo','eliminado_el'
    ];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }
}

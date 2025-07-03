<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table = 'categorias';

    public function subcategorias()
    {
        return $this->hasMany(Subcategoria::class, 'id_categoria');
    }

    public function maquinarias()
    {
        return $this->hasMany(Maquinaria::class, 'id_categoria');
    }
}

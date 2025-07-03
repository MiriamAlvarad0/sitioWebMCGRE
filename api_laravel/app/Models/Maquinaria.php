<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use App\Models\Subasta;
      

class Maquinaria extends Model
{
    // Define la tabla en la base de datos que representa este modelo
    protected $table = 'maquinaria';

    // Relación: cada maquinaria pertenece a una categoría
    public function categoria()
    {
        // Relación de muchos a uno (belongsTo)
        // 'id_categoria' es la clave foránea en la tabla maquinaria que apunta a categorias.id
        return $this->belongsTo(Categoria::class, 'id_categoria');
    }

    // Relación: cada maquinaria pertenece a una subcategoría
    public function subcategoria()
    {
        // Relación de muchos a uno (belongsTo)
        // 'id_subcategoria' es la clave foránea en maquinaria hacia subcategorias.id
        return $this->belongsTo(Subcategoria::class, 'id_subcategoria');
    }

    public function subastaActiva(): HasOne
{
    return $this->hasOne(Subasta::class, 'id_maquinaria', 'id')
                ->where('fecha_fin', '>=', now())
                ->orderBy('fecha_fin', 'asc');
}

    




    
    // Relación: maquinaria puede tener muchos proveedores (y viceversa)
    public function proveedores()
    {
        // Relación muchos a muchos (belongsToMany)
        // Usa tabla pivote 'maquinaria_proveedor' con claves foráneas id_maquinaria y id_proveedor
        // También trae el campo extra 'link' de la tabla pivote
        return $this->belongsToMany(Proveedor::class, 'maquinaria_proveedor', 'id_maquinaria', 'id_proveedor')
                    ->withPivot('link');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    protected $table = 'proveedores';

    public function maquinarias()
{
    return $this->belongsToMany(Maquinaria::class, 'maquinaria_proveedor', 'id_proveedor', 'id_maquinaria')
                ->withPivot('link');
}

}

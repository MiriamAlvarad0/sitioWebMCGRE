<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subasta extends Model
{
    protected $table = 'subastas';

    public function maquinaria()
    {
        return $this->belongsTo(Maquinaria::class, 'id_maquinaria', 'id');
    }
}

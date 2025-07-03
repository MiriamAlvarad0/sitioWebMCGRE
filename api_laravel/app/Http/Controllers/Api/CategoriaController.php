<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Categoria;

class CategoriaController extends Controller
{
    public function index()
    {
        // Devuelve todas las categorías con sus subcategorías
        $categorias = Categoria::with('subcategorias')->get();
        return response()->json($categorias);
    }
    
}

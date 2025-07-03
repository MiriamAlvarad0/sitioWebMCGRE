<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Subasta;

class SubastaController extends Controller
{
    public function subastasActivas()
    {
        $hoy = now()->toDateString();

        $subastas = Subasta::with('maquinaria.categoria', 'maquinaria.subcategoria')
            ->whereDate('fecha_inicio', '<=', $hoy)
            ->whereDate('fecha_fin', '>=', $hoy)
            ->get();

        return response()->json($subastas);
    }

     // Método para obtener todas las subastas con su maquinaria, categoría y subcategoría
    public function index()
    {
        $subastas = Subasta::with('maquinaria.categoria', 'maquinaria.subcategoria')
            ->get();

        return response()->json($subastas);
    }

}

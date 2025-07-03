<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Models\Maquinaria;
use Illuminate\Support\Facades\DB; 
use App\Models\Subasta;

class MaquinariaController extends Controller
{
    // 1. categorias()
    // Devuelve todas las categorías junto con sus subcategorías.
    public function categorias()
    {
        $categorias = Categoria::with('subcategorias')->get();
        return response()->json($categorias);
    }

    // 2. maquinarias(Request $request)
    // Devuelve las maquinarias disponibles, opcionalmente filtradas por categoría y/o subcategoría.
    public function maquinarias(Request $request)
    {
        $query = Maquinaria::with(['categoria', 'subcategoria'])->where('disponible', true);

        if ($request->has('categoria')) {
            $categoriaNombre = $request->query('categoria');
            $query->whereHas('categoria', function ($q) use ($categoriaNombre) {
                $q->where('nombre', $categoriaNombre);
            });
        }

        if ($request->has('subcategoria')) {
            $subcategoriaNombre = $request->query('subcategoria');
            $query->whereHas('subcategoria', function ($q) use ($subcategoriaNombre) {
                $q->where('nombre', $subcategoriaNombre);
            });
        }

        $maquinarias = $query->get();

        return response()->json($maquinarias);
    }

    // 3. show($id)
    // Devuelve la maquinaria con id = $id junto con su categoría, subcategoría, subasta activa y proveedores.
    // Si no existe, devuelve error 404.
    public function show($id)
    {
        $maquinaria = Maquinaria::with(['categoria', 'subcategoria', 'subastaActiva', 'proveedores'])
            ->find($id);

        if (!$maquinaria) {
            return response()->json(['message' => 'Maquinaria no encontrada'], 404);
        }

        return response()->json($maquinaria);
    }

    // 4. inventarioSinSubasta(Request $request)
    // Devuelve las maquinarias disponibles que NO tienen subasta activa, filtradas opcionalmente por categoría y/o subcategoría.
    public function inventarioSinSubasta(Request $request)
    {
        $query = Maquinaria::with(['categoria', 'subcategoria'])
            ->where('disponible', true)
            ->whereDoesntHave('subastaActiva');  // Solo sin subasta activa

        if ($request->has('categoria')) {
            $categoriaNombre = $request->query('categoria');
            $query->whereHas('categoria', function ($q) use ($categoriaNombre) {
                $q->where('nombre', $categoriaNombre);
            });
        }

        if ($request->has('subcategoria')) {
            $subcategoriaNombre = $request->query('subcategoria');
            $query->whereHas('subcategoria', function ($q) use ($subcategoriaNombre) {
                $q->where('nombre', $subcategoriaNombre);
            });
        }

        $maquinarias = $query->get();

        return response()->json($maquinarias);
    }

    // 5. maquinariaConProveedores(Request $request)
    // Devuelve maquinarias disponibles que tienen proveedores asociados, opcionalmente filtradas por categoría y/o subcategoría.
    public function maquinariaConProveedores(Request $request)
    {
        $query = Maquinaria::with(['categoria', 'subcategoria', 'proveedores'])
            ->where('disponible', true)
            ->whereHas('proveedores'); // solo con proveedores

        if ($request->has('categoria') && $request->categoria) {
            $categoria = $request->categoria;
            $query->whereHas('categoria', function ($q) use ($categoria) {
                $q->where('nombre', $categoria);
            });
        }

        if ($request->has('subcategoria') && $request->subcategoria) {
            $subcategoria = $request->subcategoria;
            $query->whereHas('subcategoria', function ($q) use ($subcategoria) {
                $q->where('nombre', $subcategoria);
            });
        }

        $maquinarias = $query->get();

        return response()->json($maquinarias);
    }

    // 6. maquinariaBasica($id)
    // Devuelve la maquinaria con id = $id con su categoría y subcategoría, sin más relaciones.
    // Si no existe, error 404.
    public function maquinariaBasica($id)
    {
        $maquinaria = Maquinaria::with(['categoria', 'subcategoria'])->find($id);

        if (!$maquinaria) {
            return response()->json(['message' => 'Maquinaria no encontrada'], 404);
        }

        return response()->json($maquinaria);
    }

   
}

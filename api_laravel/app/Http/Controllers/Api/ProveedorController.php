<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Proveedor; // Importa el modelo

class ProveedorController extends Controller
{
    // Devuelve todos los proveedores con su maquinaria relacionada
    public function index()
    {
        $proveedores = Proveedor::with('maquinarias')->get();
        return response()->json($proveedores);
    }

    // Devuelve un proveedor con su maquinaria por ID
    public function show($id)
    {
        $proveedor = Proveedor::with('maquinarias')->findOrFail($id);
        return response()->json($proveedor);
    }
}

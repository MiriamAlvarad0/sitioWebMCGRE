<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\SubcategoriaController;
use App\Http\Controllers\Api\MaquinariaController;
use App\Http\Controllers\Api\SubastaController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/categorias', [MaquinariaController::class, 'categorias']);

// Ruta principal para maquinarias con o sin subasta
Route::get('/maquinarias', [MaquinariaController::class, 'maquinarias']);

// Nueva ruta para inventario sin subasta
Route::get('/maquinarias/sin-subasta', [MaquinariaController::class, 'inventarioSinSubasta']);

Route::get('/maquinarias/{id}', [MaquinariaController::class, 'show']);

Route::get('/subcategorias', [SubcategoriaController::class, 'index']);

//me muestra mi inventario pero sin subasta
Route::get('/maquinarias/sin-subasta', [MaquinariaController::class, 'inventarioSinSubasta']);


//me muestra mi subastas que estan activas
Route::get('/subastas/activas', [SubastaController::class, 'subastasActivas']);

//me muestra las maquinas de proveedor
Route::get('/maquinarias-proveedores', [MaquinariaController::class, 'maquinariaConProveedores']);

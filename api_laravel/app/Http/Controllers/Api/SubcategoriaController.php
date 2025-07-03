<?php

namespace App\Http\Controllers\Api;

use App\Models\Subcategoria;
use App\Http\Controllers\Controller;

class SubcategoriaController extends Controller
{
    public function index() {
        return response()->json(Subcategoria::with('categoria')->get());
    }
}


<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
     /**
     * Muestra una lista de todas las categorías.
     */
    public function index()
    {
        $categories = Category::all();  // Obtiene todas las categorías de la base de datos
        return view('categories.index', compact('categories'));  // Devuelve la vista con las categorías
    }
}

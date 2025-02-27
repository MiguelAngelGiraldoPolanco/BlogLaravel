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
    public function show(Category $category)
    {
        $posts = $category->posts()->where('is_approved', true)->orderBy('created_at', 'desc')->get();

        return view('categories.show', compact('category', 'posts'));
    }
}

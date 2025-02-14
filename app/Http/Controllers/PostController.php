<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Str;

class PostController extends Controller
{
    use AuthorizesRequests;
    /**
     * Muestra la lista de posts del usuario autenticado.
     */
    public function index()
    {
        $posts = Post::query()->orderBy('created_at', 'desc')->paginate(10);

        return view('posts.index', compact('posts'));
    }

    /**
     * Muestra el formulario para crear un nuevo post.
     */
    public function create()
    {
        $categories = Category::all(); // Recuperar todas las categorías
        return view('posts.create', compact('categories'));
    }

    /**
     * Guarda un nuevo post en la base de datos.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'categories' => 'required|array', // Asegurar que se seleccionen categorías
            'categories.*' => 'exists:categories,id' // Asegurar que las categorías seleccionadas existen
        ]);
    
        // Verificar si el usuario está autenticado
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Debes iniciar sesión para crear un post.');
        }
    
        // Crear el post manualmente asegurando la relación con el usuario
        $post = new Post();
        $post->title = $request->title;
        $post->content = $request->content;
        $post->user_id = Auth::id(); // Asignar el ID del usuario autenticado
        $post->save();
    
        // Asignar categorías al post
        $post->categories()->attach($request->categories);
    
        return redirect()->route('posts.index')->with('success', 'Post creado con éxito.');
    }

    /**
     * Muestra un post específico.
     */
    public function show(Post $post)
{
    session(['post_id' => $post->id]);
    $comments = $post->comments()->orderBy('created_at', 'desc')->get();
    return view('posts.show', compact('post', 'comments'));
}

    /**
     * Muestra el formulario de edición de un post.
     */
    public function edit(Post $post)
    {
        $this->authorize('update', $post);
        return view('posts.edit', compact('post'));
    }

    /**
     * Actualiza un post en la base de datos.
     */
    public function update(Request $request, Post $post)
    {
        $this->authorize('update', $post);

        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
        ]);

        $post->update([
            'title' => $request->title,
            'content' => $request->content,
        ]);

        return redirect()->route('posts.index')->with('success', 'Post actualizado con éxito.');
    }

    /**
     * Elimina un post de la base de datos.
     */
    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);
        $post->delete();
        return redirect()->route('posts.index')->with('success', 'Post eliminado con éxito.');
    }
    public function pendingPosts()
    {
        $posts = Post::where('is_approved', false)->orderBy('created_at', 'desc')->paginate(10);

        return view('posts.pending', compact('posts'));
    }

    // Aprobar un post específico
    public function approvePost(Post $post)
    {
        $post->is_approved = true;
        $post->save();

        return redirect()->route('posts.pending')->with('success', 'Post aprobado con éxito.');
    }
    public function latest()
    {
        $posts = Post::where('is_approved', true) // Filtrar solo aprobados
        ->orderBy('created_at', 'desc')
        ->limit(10)
        ->get();

        return view('posts.latest', compact('posts')); // Asegúrate de tener una vista 'posts.latest'
    }
}

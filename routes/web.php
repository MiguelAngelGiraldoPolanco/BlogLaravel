<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;



Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create'); // Crear post
Route::post('/posts', [PostController::class, 'store'])->name('posts.store');

Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index'); // Categorías existentes

Route::get('/latest-posts', [PostController::class, 'latest'])->name('posts.latest'); // Últimos posts

Route::get('/posts/pending', [PostController::class, 'pendingPosts'])->name('posts.pending');
Route::post('/posts/{post}/approve', [PostController::class, 'approvePost'])->name('posts.approve');

Route::get('/categories/{category}', [CategoryController::class, 'show'])->name('categories.show');

Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');

Route::post('/posts/{post}/comments', [CommentController::class, 'store'])->name('comments.store');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('posts', PostController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('comments', CommentController::class);

      // Rutas de aprobación de posts (sin middleware de admin, la verificación será en el controlador)
//       Route::get('/posts/pending', [PostController::class, 'pendingPosts'])->name('posts.pending');
//       Route::post('/posts/{post}/approve', [PostController::class, 'approvePost'])->name('posts.approve');
//  
 });
 
require __DIR__.'/auth.php';

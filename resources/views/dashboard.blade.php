@extends('layouts.app')

@section('title', 'Inicio')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Bienvenido a Mi Blog</h1>
    <p class="mt-4">Explora los últimos posts y categorías disponibles.</p>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 mt-8">
        <!-- Sección de Últimos Posts -->
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-xl font-semibold mb-4">Últimos Posts</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                @php
                    $latestPosts = \App\Models\Post::where('is_approved', true)->orderBy('created_at', 'desc')->limit(5)->get();
                @endphp
                @foreach ($latestPosts as $post)
                    <div class="relative h-48 bg-cover bg-center rounded-lg overflow-hidden" style="background-image: url('{{ asset('img/post.jpg') }}');">
                        <a href="{{ route('posts.show', $post) }}" class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-50 text-white text-lg font-bold hover:bg-opacity-75 transition duration-300">
                            <div>
                                <h3 class="text-xl">{{ $post->title }}</h3>
                                <p class="text-sm">{{ Str::limit($post->content, 50) }}</p>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Sección de Categorías -->
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-xl font-semibold mb-4">Categorías</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                @php
                    $categories = \App\Models\Category::all();
                @endphp
                @foreach ($categories as $category)
                    <div class="relative h-48 bg-cover bg-center rounded-lg overflow-hidden" style="background-image: url('{{ asset('img/cat.jpg' ) }}');">
                        <a href="{{ route('categories.show', $category) }}" class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-50 text-white text-lg font-bold hover:bg-opacity-75 transition duration-300">
                            {{ $category->name }}
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Sección de Información del Blog -->
    <div class="mt-8">
        <h2 class="text-xl font-semibold mb-4">Sobre el Blog</h2>
        <p>Este blog es un espacio donde compartimos artículos interesantes sobre diversos temas. Nuestro objetivo es proporcionar contenido de calidad que sea útil y entretenido para nuestros lectores.</p>
    </div>
@endsection
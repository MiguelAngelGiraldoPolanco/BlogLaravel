@extends('layouts.app')

@section('title', $category->name)

@section('content')
    <div class="container">
        <h1 class="text-2xl font-bold mb-4">{{ $category->name }}</h1>

        @if ($posts->isEmpty())
            <p class="text-gray-500">No hay posts en esta categoría.</p>
        @else
            <div class="space-y-4">
                @foreach ($posts as $post)
                    <div class="border p-4 rounded bg-white shadow">
                        <h2 class="text-xl font-bold">{{ $post->title }}</h2>
                        <p class="text-gray-700">{{ Str::limit($post->content, 150) }}</p>
                        <p class="text-sm text-gray-500">
                            Creado por: {{ $post->user->name ?? 'Usuario desconocido' }} - 
                            
                        </p>
                        <a href="{{ route('posts.show', $post) }}" class="text-blue-500 hover:underline">Leer más</a>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection
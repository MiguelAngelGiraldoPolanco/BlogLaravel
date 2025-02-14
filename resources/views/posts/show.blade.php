@extends('layouts.app')

@section('title', $post->title)

@section('content')
    <div class="container">
        <h1 class="text-3xl font-bold mb-4">{{ $post->title }}</h1>
        <p class="text-gray-700 mb-4">{{ $post->content }}</p>
        <p class="text-sm text-gray-500 mb-4">
            Creado por: {{ $post->user->name ?? 'Usuario desconocido' }} - 
        </p>

        <!-- Sección de comentarios -->
        <h2 class="text-2xl font-bold mb-4">Comentarios</h2>

        @if ($comments->isEmpty())
            <p class="text-gray-500">No hay comentarios en este post.</p>
        @else
            <div class="space-y-4">
                @foreach ($comments as $comment)
                    <div class="border p-4 rounded bg-white shadow">
                        <p class="text-gray-700">{{ $comment->content }}</p>
                        <p class="text-sm text-gray-500">
                            Comentado por: {{ $comment->user->name ?? 'Usuario desconocido' }} - 
                        </p>
                    </div>
                @endforeach
            </div>
        @endif

        <!-- Formulario para agregar un nuevo comentario -->
        @auth
            <form action="{{ route('comments.store', $post) }}" method="POST" class="mt-6">
                @csrf
                <label for="content" class="block font-bold">Agregar un comentario:</label>
                <textarea name="content" id="content" class="border rounded p-2 w-full" rows="3" required></textarea>
                
                <button type="submit" class="w-full text-black border-2 border-solid border-black py-3 rounded-lg hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    Comentar
                </button>
            </form>
        @else
            <p class="text-gray-500 mt-4">Debes <a href="{{ route('login') }}" class="text-blue-500 hover:underline">iniciar sesión</a> para comentar.</p>
        @endauth
    </div>
@endsection
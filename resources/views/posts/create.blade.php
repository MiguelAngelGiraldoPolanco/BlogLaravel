@extends('layouts.app')

@section('title', 'Crear Post')

@section('content')
    <h1 class="text-2xl font-bold mb-6">Crear un Nuevo Post</h1>
    
    <form action="{{ route('posts.store') }}" method="POST" class="bg-white p-6 rounded-lg shadow-md">
        @csrf

        <div class="mb-4">
            <label for="title" class="block font-bold mb-2">Título:</label>
            <input type="text" name="title" id="title" class="border rounded p-2 w-full" required>
        </div>

        <div class="mb-4">
            <label for="content" class="block font-bold mb-2">Contenido:</label>
            <textarea name="content" id="content" class="border rounded p-2 w-full" rows="5" required></textarea>
        </div>

        <div class="mb-4">
            <label for="categories" class="block font-bold mb-2">Categorías:</label>
            <select name="categories[]" id="categories" class="border rounded p-2 w-full" multiple required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="w-full bg-slate-700 text-white py-3 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
            Publicar
        </button>
    </form>
@endsection
@extends('layouts.app')

@section('content')
    <div class="max-w-2xl mx-auto bg-white p-6 rounded-lg shadow">
        <h1 class="text-2xl font-bold mb-4">{{ $post->title }}</h1>
        <p class="text-gray-700">{{ $post->content }}</p>
        <p class="text-sm text-gray-500 mt-4">Creado por: {{ $post->user->name ?? 'Usuario desconocido' }} - {{ \Carbon\Carbon::parse($post->created_at)->diffForHumans() }}</p>
        
        <div class="mt-6 flex gap-4">
            <form action="{{ route('posts.approve', $post) }}" method="POST">
                @csrf
                <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Aprobar</button>
            </form>
            <a href="{{ route('posts.pending') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Volver</a>
        </div>
    </div>
@endsection
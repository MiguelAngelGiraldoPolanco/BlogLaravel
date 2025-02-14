@extends('layouts.app')

@section('title', 'Últimos Posts')

@section('content')
    <h1 class="text-2xl font-bold">Últimos Posts</h1>

    @if($posts->isEmpty())
        <p class="mt-4 text-gray-600">No hay posts en el blog.</p>
    @else
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 mt-4">
            @foreach($posts as $post)
                <div class="border rounded-lg p-4 bg-white shadow-md">
                    <h2 class="text-xl font-semibold mb-2">
                        <a href="{{ route('posts.show', $post->id) }}" class="text-blue-500 hover:underline">{{ $post->title }}</a>
                    </h2>
                    <p class="text-gray-700 mb-4">{{ Str::limit($post->content, 100) }}</p>
                    <a href="{{ route('posts.show', $post->id) }}" class="text-blue-500 hover:underline">Leer más</a>
                </div>
            @endforeach
        </div>
    @endif
@endsection
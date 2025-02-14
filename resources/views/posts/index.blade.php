@extends('layouts.app')

@section('title', 'Posts')

@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <h1 class="text-2xl font-bold">Posts</h1>
    
    <ul class="mt-4">
        @foreach($posts as $post)
            <li class="border-b py-2">
                <a href="{{ route('posts.show', $post) }}" class="text-blue-500 hover:underline">{{ $post->title }}</a>
            </li>
        @endforeach
    </ul>
@endsection
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-2xl font-bold mb-4">Posts Pendientes de Aprobación</h1>

        @if (session('success'))
            <div class="bg-green-200 text-green-800 p-2 mb-4 rounded">
                {{ session('success') }}
            </div>
        @endif

        @if (Auth::check() && Auth::user()->is_admin)
            @if ($posts->isEmpty())
                <p class="text-gray-500">No hay posts pendientes de aprobación.</p>
            @else
                <div class="space-y-4">
                    @foreach ($posts as $post)
                        <div class="border p-4 rounded bg-white shadow">
                            <h2 class="text-xl font-bold">{{ $post->title }}</h2>
                            <p class="text-gray-700">{{ Str::limit($post->content, 150) }}</p>
                            <p class="text-sm text-gray-500">
                                Creado por: {{ $post->user->name ?? 'Usuario desconocido' }} - 
                           </p>

                            <form action="{{ route('posts.approve', $post) }}" method="POST" class="mt-2">
                                @csrf
                                <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Aprobar</button>
                            </form>
                        </div>
                    @endforeach
                </div>

                <div class="mt-4">
                    {{ $posts->links() }}  {{-- Paginación --}}
                </div>
            @endif
        @else
            <p class="text-red-500">Acceso denegado.</p>
        @endif
    </div>
@endsection
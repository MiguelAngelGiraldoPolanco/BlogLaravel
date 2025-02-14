@extends('layouts.app')

@section('title', 'Categorías')

@section('css')
    @vite('resources/css/app.css')
@endsection

@section('content')
    <h1 class="text-2xl font-bold">Categorías Disponibles</h1>
    
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 mt-4">
        <div class="relative h-48 bg-cover bg-center rounded-lg overflow-hidden" style="background-image: url('{{ asset('img/tec.jpg') }}');">
            <a href="{{ route('categories.show', 1) }}" class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-50 text-white text-lg font-bold hover:bg-opacity-75 transition duration-300">
                Tecnologia
            </a>
        </div>
        <div class="relative h-48 bg-cover bg-center rounded-lg overflow-hidden" style="background-image: url('{{ asset('img/ia.jpg') }}');">
            <a href="{{ route('categories.show', 2) }}" class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-50 text-white text-lg font-bold hover:bg-opacity-75 transition duration-300">
                Inteligencia Artificial
            </a>
        </div>
        <div class="relative h-48 bg-cover bg-center rounded-lg overflow-hidden" style="background-image: url('{{ asset('img/crip.jpg') }}');">
            <a href="{{ route('categories.show', 3) }}" class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-50 text-white text-lg font-bold hover:bg-opacity-75 transition duration-300">
                Criptomonedas
            </a>
        </div>
        <div class="relative h-48 bg-cover bg-center rounded-lg overflow-hidden" style="background-image: url('{{ asset('img/inv.jpg') }}');">
            <a href="{{ route('categories.show', 4) }}" class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-50 text-white text-lg font-bold hover:bg-opacity-75 transition duration-300">
                Inversiones
            </a>
        </div>
        <div class="relative h-48 bg-cover bg-center rounded-lg overflow-hidden" style="background-image: url('{{ asset('img/tra.jpg') }}');">
            <a href="{{ route('categories.show', 5) }}" class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-50 text-white text-lg font-bold hover:bg-opacity-75 transition duration-300">
                Analisis de Mercados
            </a>
        </div>
        <div class="relative h-48 bg-cover bg-center rounded-lg overflow-hidden" style="background-image: url('{{ asset('img/not.jpg') }}');">
            <a href="{{ route('categories.show', 6) }}" class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-50 text-white text-lg font-bold hover:bg-opacity-75 transition duration-300">
                Noticias Financieras
            </a>
        </div>
    </div>
@endsection
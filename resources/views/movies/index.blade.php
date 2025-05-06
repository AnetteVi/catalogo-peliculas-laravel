@extends('layouts.app')

@section('content')
<style>
    body {
        background-color: #121212;
        color: #fff;
    }

    .toolbar {
        background-color: #1f1f1f;
        padding: 30px 0 40px;
        text-align: center;
        border-bottom: none;
        margin-bottom: 40px;
    }

    .toolbar-title {
        font-size: 2.5rem;
        font-weight: bold;
        margin-bottom: 10px;
    }

    .divider-line {
        height: 2px;
        width: 60%;
        background-color: #444;
        margin: 0 auto 25px auto;
        border-radius: 5px;
    }

    .filters {
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
        gap: 30px;
    }

    .nav-pills .nav-link {
        border-radius: 20px;
        color: #fff;
        padding: 8px 20px;
        transition: background-color 0.2s;
        text-decoration: none;
    }

    .nav-pills .nav-link.active {
        background-color: #f44336;
    }

    .btn-add {
        background-color: #28a745;
        border-radius: 30px;
        padding: 12px 30px;
        font-size: 1.1rem;
        margin: 0 auto 60px auto;
        color: white;
        display: block;
        text-align: center;
        transition: background-color 0.2s;
        text-decoration: none;
        width: fit-content;
    }

    .btn-add:hover {
        background-color: #218838;
        color: white;
        text-decoration: none;
    }

    .card {
        background-color: #1e1e1e;
        border-radius: 12px;
        overflow: hidden;
        transition: transform 0.2s ease;
        display: flex;
        flex-direction: row;
        gap: 15px;
    }

    .card:hover {
        transform: scale(1.02);
        box-shadow: 0 10px 20px rgba(255, 255, 255, 0.1);
    }

    .card-img-top {
        width: 200px;
        height: auto;
        object-fit: cover;
    }

    .card-title {
        color: #ffffff;
        font-size: 1.1rem;
    }

    .card-footer {
        background-color: transparent;
    }
</style>

<div class="container">

    {{-- Toolbar completa con título y filtros --}}
    <div class="toolbar">
        <h1 class="toolbar-title">🎬 Catálogo de Películas</h1>
        <div class="divider-line"></div>
        <div class="filters nav nav-pills">
            <a class="nav-link {{ request('filter') == null ? 'active' : '' }}" href="{{ route('movies.index') }}">Todas</a>
            <a class="nav-link {{ request('filter') == 'anteriores' ? 'active' : '' }}" href="{{ route('movies.index', ['filter' => 'anteriores']) }}">Anteriores</a>
            <a class="nav-link {{ request('filter') == 'proximos' ? 'active' : '' }}" href="{{ route('movies.index', ['filter' => 'proximos']) }}">Próximos</a>
            <a class="nav-link {{ request('filter') == 'actuales' ? 'active' : '' }}" href="{{ route('movies.index', ['filter' => 'actuales']) }}">Actuales</a>
        </div>
    </div>

    {{-- Botón agregar película centrado --}}
    <div class="text-center">
        <a href="{{ route('movies.create') }}" class="btn btn-add">+ Agregar nueva película</a>
    </div>

    {{-- Tarjetas de películas --}}
    @if($movies->count() > 0)
        <div class="row g-4">
            @foreach ($movies as $movie)
                <div class="col-12">
                    <div class="card shadow-sm border-0 h-100">
                        @if($movie->picture)
                            <img src="{{ $movie->picture }}" class="card-img-top" alt="{{ $movie->name }}">
                        @endif
                        <div class="card-body p-3">
                            <h5 class="card-title">{{ $movie->name }}</h5>
                            <small class="text-muted d-block mb-2">{{ $movie->classification }} | 🎬 {{ $movie->release_date }}</small>
                            <p class="card-text text-light small">{{ $movie->description }}</p>
                            <div class="text-end">
                                <a href="{{ route('movies.edit', $movie) }}" class="btn btn-sm btn-outline-warning me-1">Editar</a>
                                <form action="{{ route('movies.destroy', $movie) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger" onclick="return confirm('¿Eliminar esta película?')">Eliminar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <p class="text-center mt-5">No hay películas registradas todavía.</p>
    @endif
</div>
@endsection

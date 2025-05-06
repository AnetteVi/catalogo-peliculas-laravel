@extends('layouts.app')

@section('content')
<div class="container mt-5 text-white">
    <h1 class="mb-4">✏️ Editar Película</h1>

    <form action="{{ route('movies.update', $movie) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Nombre</label>
            <input type="text" name="name" class="form-control" value="{{ $movie->name }}" required>
        </div>

        <div class="mb-3">
            <label for="classification" class="form-label">Clasificación</label>
            <input type="text" name="classification" class="form-control" value="{{ $movie->classification }}" required>
        </div>

        <div class="mb-3">
            <label for="release_date" class="form-label">Fecha de Estreno</label>
            <input type="date" name="release_date" class="form-control" value="{{ $movie->release_date }}" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Descripción</label>
            <textarea name="description" class="form-control" rows="4" required>{{ $movie->description }}</textarea>
        </div>

        <button type="submit" class="btn btn-success">💾 Guardar cambios</button>
        <a href="{{ route('movies.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection

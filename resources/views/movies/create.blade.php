@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Agregar nueva película</h1>

    <form action="{{ route('movies.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Nombre</label>
            <input type="text" class="form-control" name="name" required>
        </div>

        <div class="mb-3">
            <label for="classification" class="form-label">Clasificación</label>
            <input type="text" class="form-control" name="classification" required>
        </div>

        <div class="mb-3">
            <label for="release_date" class="form-label">Fecha de estreno</label>
            <input type="date" class="form-control" name="release_date" required>
        </div>

        <div class="mb-3">
            <label for="season" class="form-label">Temporada (si aplica)</label>
            <input type="text" class="form-control" name="season">
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Reseña general</label>
            <textarea class="form-control" name="description" rows="3" required></textarea>
        </div>

        <div class="mb-3">
            <label for="picture" class="form-label">URL de imagen (opcional)</label>
            <input type="text" class="form-control" name="picture">
        </div>

        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="{{ route('movies.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection

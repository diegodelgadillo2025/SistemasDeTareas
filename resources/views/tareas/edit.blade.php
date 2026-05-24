@extends('layouts.tareas')

@section('title', 'Editar Tarea')

@section('content')
    <h1>Editar tarea</h1>

    @if ($errors->any())
        <ul class="errors">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('tareas.update', $tarea) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Título:</label>
        <input type="text" name="titulo" value="{{ old('titulo', $tarea->titulo) }}">

        <label>Descripción:</label>
        <textarea name="descripcion">{{ old('descripcion', $tarea->descripcion) }}</textarea>

        <label class="checkbox">
            <input type="checkbox" name="completada" value="1" {{ $tarea->completada ? 'checked' : '' }}>
            Marcar como completada
        </label>

        <button class="btn btn-primary" type="submit">Actualizar tarea</button>
    </form>

    <br>

    <a class="btn btn-secondary" href="{{ route('tareas.index') }}">Volver</a>
@endsection
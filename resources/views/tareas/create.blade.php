@extends('layouts.tareas')

@section('title', 'Crear Tarea')

@section('content')
    <h1>Crear nueva tarea</h1>

    @if ($errors->any())
        <ul class="errors">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('tareas.store') }}" method="POST">
        @csrf

        <label>Título:</label>
        <input type="text" name="titulo" value="{{ old('titulo') }}">

        <label>Descripción:</label>
        <textarea name="descripcion">{{ old('descripcion') }}</textarea>

        <button class="btn btn-primary" type="submit">Guardar tarea</button>
    </form>

    <br>

    <a class="btn btn-secondary" href="{{ route('tareas.index') }}">Volver</a>
@endsection
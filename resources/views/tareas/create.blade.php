@extends('layouts.tareas')

@section('title', 'Crear Tarea')

@section('content')
    <div class="form-header">
        <div>
            <h1>Crear nueva tarea</h1>
            <p>Registra una actividad para organizar tu día.</p>
        </div>

        <a class="btn btn-secondary" href="{{ route('tareas.index') }}">Volver</a>
    </div>

    @if ($errors->any())
        <ul class="errors">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form class="task-form" action="{{ route('tareas.store') }}" method="POST">
        @csrf

        <label>Título</label>
        <input type="text" name="titulo" placeholder="Ej: Estudiar Laravel" value="{{ old('titulo') }}">

        <label>Descripción</label>
        <textarea name="descripcion" placeholder="Describe brevemente la tarea">{{ old('descripcion') }}</textarea>

        <button class="btn btn-primary" type="submit">Guardar tarea</button>
    </form>
@endsection
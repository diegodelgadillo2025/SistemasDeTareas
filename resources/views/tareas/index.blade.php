@extends('layouts.tareas')

@section('title', 'Lista de Tareas')

@section('content')
    <div class="page-header">
        <div>
            <h1>Sistema de Tareas</h1>
            <p>Organiza tus actividades y controla tus pendientes.</p>
        </div>

         <a class="btn btn-primary" href="{{ route('tareas.create') }}">
            + Nueva tarea
        </a>
    </div>
    
    <form class="search-form" action="{{ route('tareas.index') }}" method="GET">
            <input
                type="text"
                name="buscar"
                placeholder="Buscar tarea por título..."
                value="{{ request('buscar') }}"
            >

            <button class="btn btn-primary" type="submit">
                Buscar
            </button>

            <a class="btn btn-secondary" href="{{ route('tareas.index') }}">
                Limpiar
            </a>
     </form>
        

       
   

    @if(session('success'))
        <p class="success">{{ session('success') }}</p>
    @endif

    <div class="filtros">
        <a class="btn btn-secondary" href="{{ route('tareas.index') }}">Todas</a>
        <a class="btn btn-secondary" href="{{ route('tareas.index', ['estado' => 'pendientes']) }}">Pendientes</a>
        <a class="btn btn-secondary" href="{{ route('tareas.index', ['estado' => 'completadas']) }}">Completadas</a>
    </div>

    <div class="tareas-lista">
        @forelse($tareas as $tarea)
            <div class="tarea-card {{ $tarea->completada ? 'card-completada' : 'card-pendiente' }}">
                <div class="tarea-info">
                    <h3>{{ $tarea->titulo }}</h3>
                    <p>{{ $tarea->descripcion }}</p>

                    <span class="badge {{ $tarea->completada ? 'badge-success' : 'badge-warning' }}">
                        {{ $tarea->completada ? '✔ Completada' : '⏳ Pendiente' }}
                    </span>
                </div>

                <div class="tarea-actions">
                    <a class="btn btn-edit" href="{{ route('tareas.edit', $tarea) }}">Editar</a>

                    @if(!$tarea->completada)
                        <form action="{{ route('tareas.completar', $tarea) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button class="btn btn-primary" type="submit">Completar</button>
                        </form>
                    @endif

                    <form action="{{ route('tareas.destroy', $tarea) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-delete" type="submit" onclick="return confirm('¿Eliminar esta tarea?')">
                            Eliminar
                        </button>
                    </form>
                </div>
            </div>
        @empty
            <div class="empty-state">
                <h3>No hay tareas registradas</h3>
                <p>Crea tu primera tarea para comenzar.</p>
            </div>
        @endforelse
    </div>
@endsection
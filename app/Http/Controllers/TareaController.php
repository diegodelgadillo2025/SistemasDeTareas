<?php

namespace App\Http\Controllers;

use App\Models\Tarea;
use Illuminate\Http\Request;

class TareaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
{
    $query = Tarea::where('user_id', auth()->id());

    if ($request->estado === 'pendientes') {
        $query->where('completada', false);
    }

    if ($request->estado === 'completadas') {
        $query->where('completada', true);
    }

    $tareas = $query->latest()->get();

    return view('tareas.index', compact('tareas'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view('tareas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $request->validate([
            'titulo' => 'required|string|max:100',
            'descripcion' => 'nullable|string|max:500',
        ]);

        Tarea::create([
    'user_id' => auth()->id(),
    'titulo' => $request->titulo,
    'descripcion' => $request->descripcion,
]);

        return redirect()->route('tareas.index')->with('success', 'Tarea creada correctamente.');
    
    }

   

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tarea $tarea)
    {
         return view('tareas.edit', compact('tarea'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tarea $tarea)
    {
         $request->validate([
            'titulo' => 'required|string|max:100',
            'descripcion' => 'nullable|string|max:500',
            'completada' => 'nullable|boolean',
        ]);

        $tarea->update([
            'titulo' => $request->titulo,
            'descripcion' => $request->descripcion,
            'completada' => $request->has('completada'),
        ]);

        return redirect()->route('tareas.index')->with('success', 'Tarea actualizada correctamente.');
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tarea $tarea)
    {
        $tarea->delete();

        return redirect()->route('tareas.index')->with('success', 'Tarea eliminada correctamente.');
    }

    public function completar(Tarea $tarea)
    {
        $tarea->update([
            'completada' => true,
        ]);

    return redirect()->route('tareas.index')->with('success', 'Tarea marcada como completada.');
}
}

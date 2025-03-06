<?php

namespace App\Http\Controllers;

use App\Models\Task; // Importa el modelo Task
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Obtener todas las tareas
        $tasks = Task::all();
        return view('tasks.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Mostrar el formulario para crear una nueva tarea
        return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'title' => 'required|max:255',
        ]);

        // Crear una nueva tarea
        Task::create([
            'title' => $request->title,
            'completed' => false, // Por defecto, la tarea no está completada
        ]);

        // Redirigir a la lista de tareas con un mensaje de éxito
        return redirect()->route('tasks.index')->with('success', 'Tarea creada correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Obtener la tarea por su ID
        $task = Task::findOrFail($id);
        return view('tasks.show', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Obtener la tarea por su ID para editarla
        $task = Task::findOrFail($id);
        return view('tasks.edit', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validar los datos del formulario
        $request->validate([
            'title' => 'required|max:255',
            'completed' => 'boolean',
        ]);

        // Obtener la tarea por su ID y actualizarla
        $task = Task::findOrFail($id);
        $task->update([
            'title' => $request->title,
            'completed' => $request->completed ?? false, // Si no se envía, se asume false
        ]);

        // Redirigir a la lista de tareas con un mensaje de éxito
        return redirect()->route('tasks.index')->with('success', 'Tarea actualizada correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Obtener la tarea por su ID y eliminarla
        $task = Task::findOrFail($id);
        $task->delete();

        // Redirigir a la lista de tareas con un mensaje de éxito
        return redirect()->route('tasks.index')->with('success', 'Tarea eliminada correctamente.');
    }
}

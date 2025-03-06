<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Tareas</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Lista de Tareas</h1>
        <a href="{{ route('tasks.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">Crear Nueva Tarea</a>

        <ul class="bg-white shadow rounded-lg p-4">
            @foreach ($tasks as $task)
                <li class="border-b py-2 flex justify-between items-center">
                    <span>{{ $task->title }} - {{ $task->completed ? 'Completada' : 'Pendiente' }}</span>
                    <div>
                        <a href="{{ route('tasks.show', $task->id) }}" class="text-blue-500 hover:text-blue-700">Ver</a>
                        <a href="{{ route('tasks.edit', $task->id) }}" class="text-green-500 hover:text-green-700 ml-2">Editar</a>
                        <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:text-red-700 ml-2">Eliminar</button>
                        </form>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</body>
</html>

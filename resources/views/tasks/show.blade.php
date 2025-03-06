<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles de Tarea</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Detalles de Tarea</h1>

        <div class="bg-white shadow rounded-lg p-6">
            <h2 class="text-xl font-semibold">{{ $task->title }}</h2>
            <p class="mt-2">Estado: {{ $task->completed ? 'Completada' : 'Pendiente' }}</p>
            <p class="mt-2">Creada: {{ $task->created_at->format('d/m/Y H:i') }}</p>
            <p class="mt-2">Última actualización: {{ $task->updated_at->format('d/m/Y H:i') }}</p>

            <div class="mt-6 flex space-x-4">
                <a href="{{ route('tasks.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded">Volver</a>
                <a href="{{ route('tasks.edit', $task->id) }}" class="bg-blue-500 text-white px-4 py-2 rounded">Editar</a>
                <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">Eliminar</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>

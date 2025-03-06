<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Tarea</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Editar Tarea</h1>
        <form action="{{ route('tasks.update', $task->id) }}" method="POST" class="bg-white shadow rounded-lg p-4">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="title" class="block text-gray-700">Título</label>
                <input type="text" name="title" id="title" class="w-full px-4 py-2 border rounded-lg" value="{{ $task->title }}" required>
            </div>
            <div class="mb-4">
                <label for="completed" class="block text-gray-700">Completada</label>
                <input type="checkbox" name="completed" id="completed" value="1" {{ $task->completed ? 'checked' : '' }}>
                <span>Marcar como completada</span>
            </div>
            <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Actualizar</button>
        </form>
    </div>
</body>
</html>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Tarea</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Crear Nueva Tarea</h1>
        <form action="{{ route('tasks.store') }}" method="POST" class="bg-white shadow rounded-lg p-4">
            @csrf
            <div class="mb-4">
                <label for="title" class="block text-gray-700">Título</label>
                <input type="text" name="title" id="title" class="w-full px-4 py-2 border rounded-lg" required>
            </div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Crear</button>
        </form>
    </div>
</body>
</html>

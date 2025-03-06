<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id(); // Columna de ID automático
            $table->string('title'); // Columna para el título de la tarea (string)
            $table->boolean('completed')->default(false); // Columna para el estado de la tarea (boolean, valor por defecto: false)
            $table->timestamps(); // Columnas created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks'); // Elimina la tabla si se revierte la migración
    }
};

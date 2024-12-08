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
        Schema::create('surveys', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Título de la encuesta
            $table->text('description')->nullable(); // Descripción de la encuesta
            $table->boolean('is_active')->default(true); // Si la encuesta está activa
            $table->timestamp('start_date')->nullable(); // Fecha de inicio
            $table->timestamp('end_date')->nullable(); // Fecha de finalización
            $table->timestamps(); // Para las fechas de creación y actualización
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surveys');
    }
};

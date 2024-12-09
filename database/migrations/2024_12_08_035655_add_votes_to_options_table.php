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
        Schema::create('options', function (Blueprint $table) {
            $table->id();
            $table->foreignId('survey_id')->constrained()->onDelete('cascade');  // Relación con Survey
            $table->string('text'); // El texto de la opción
            $table->integer('votes')->default(0);  // Columna de votos, por defecto en 0
            $table->timestamps();  // Para las fechas de creación y actualización
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('options');
    }
};

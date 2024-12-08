<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    use HasFactory;

    // Definir los campos que son asignables masivamente
    protected $fillable = [
        'title',        // Título de la encuesta
        'description',  // Descripción de la encuesta
        'is_active',    // Estado de la encuesta (si está activa o no)
        'start_date',   // Fecha de inicio
        'end_date',     // Fecha de finalización
    ];

    // Relación uno a muchos con las opciones
    public function options()
    {
        return $this->hasMany(Option::class);
    }
}

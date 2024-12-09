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

    /**
     * Relación uno a muchos con las opciones
     * Cada encuesta puede tener múltiples opciones
     */
    public function options()
    {
        return $this->hasMany(Option::class);
    }

    /**
     * Método para verificar si la encuesta está activa
     * Esto se basa en las fechas de inicio y fin, así como el estado 'is_active'
     */
    public function isActive()
    {
        $now = now();

        return $this->is_active && 
               ($this->start_date ? $now->greaterThanOrEqualTo($this->start_date) : true) && 
               ($this->end_date ? $now->lessThanOrEqualTo($this->end_date) : true);
    }
}

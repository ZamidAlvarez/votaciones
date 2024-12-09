<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    use HasFactory;

    // Definir los campos que son asignables masivamente
    protected $fillable = [
        'text',         // Texto de la opción
        'survey_id',    // ID de la encuesta relacionada
        'votes',        // Número de votos
    ];

    // Relación inversa con la encuesta
    public function survey()
    {
        return $this->belongsTo(Survey::class);
    }
}

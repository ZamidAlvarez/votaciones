<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    use HasFactory;

    // Definir los campos que son asignables masivamente
    protected $fillable = [
        'survey_id',    // ID de la encuesta a la que pertenece esta opción
        'text',         // El texto de la opción (por ejemplo, la respuesta)
    ];

    // Relación inversa con Survey (Una opción pertenece a una encuesta)
    public function survey()
    {
        return $this->belongsTo(Survey::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    // Si el nombre de la tabla no sigue la convención de pluralización, puedes especificarlo
    // protected $table = 'votes';

    // Definir los campos que se pueden asignar masivamente
    protected $fillable = ['user_id', 'survey_id', 'option_id'];

    // Definir las relaciones con los otros modelos

    // Relación con el modelo Survey
    public function survey()
    {
        return $this->belongsTo(Survey::class);
    }

    // Relación con el modelo Option
    public function option()
    {
        return $this->belongsTo(Option::class);
    }

    // Relación con el modelo User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Survey;
use App\Models\Option;
use Illuminate\Http\Request;

class SurveyController extends Controller
{
    // Método para mostrar los resultados de la encuesta
    public function showResults($surveyId)
    {
        // Obtener la encuesta junto con las opciones
        $survey = Survey::with('options')->find($surveyId);
        
        // Verificar si la encuesta existe
        if (!$survey) {
            return redirect()->route('home')->with('error', 'Encuesta no encontrada.');
        }

        // Contar los votos por cada opción
        $results = $survey->options->map(function($option) {
            // Aquí asumes que tienes una columna 'votes' en la tabla 'options'
            return [
                'option' => $option->text, 
                'votes' => $option->votes, // Contar los votos para cada opción
                'percentage' => $option->votes / $option->survey->options->sum('votes') * 100 // Calcular el porcentaje de votos
            ];
        });

        // Devolver la vista con los resultados
        return view('results', compact('survey', 'results'));
    }
}

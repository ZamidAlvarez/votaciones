<?php

namespace App\Http\Controllers;

use App\Models\Survey;
use App\Models\Option;
use App\Models\Vote;  // Importamos el modelo Vote
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class SurveyController extends Controller
{
    // Mostrar todas las encuestas creadas
    public function index()
    {
        $surveys = Survey::all();
        return view('home', compact('surveys'));
    }

    // Mostrar la vista para crear una nueva encuesta
    public function create()
    {
        return view('survey.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:500',
            'options' => 'required|array|min:1|max:5',
            'options.*' => 'required|string|max:255',
        ]);

        // Crear la encuesta
        $survey = Survey::create([
            'title' => $request->title,
            'description' => $request->description,
        ]);

        // Crear las opciones asociadas
        foreach ($request->options as $optionText) {
            $survey->options()->create([
                'text' => $optionText,
                'votes' => 0,
            ]);
        }

        return redirect()->route('home')->with('success', 'Encuesta creada correctamente.');
    }

    // Mostrar los resultados de la encuesta
    public function showResults($surveyId)
    {
        $survey = Survey::with('options')->find($surveyId);

        if (!$survey) {
            return redirect()->route('home')->with('error', 'Encuesta no encontrada.');
        }

        $totalVotes = $survey->options->sum('votes');

        $results = $survey->options->map(function ($option) use ($totalVotes) {
            $percentage = $totalVotes > 0 ? ($option->votes / $totalVotes) * 100 : 0;
            return [
                'option' => $option->text,
                'votes' => $option->votes,
                'percentage' => $percentage,
            ];
        });

        return view('results', compact('survey', 'results'));
    }

    // Método para mostrar la vista de votación
    public function showVoteForm($surveyId)
    {
        $survey = Survey::with('options')->find($surveyId);

        if (!$survey) {
            return redirect()->route('home')->with('error', 'Encuesta no encontrada.');
        }

        return view('survey.vote', compact('survey'));
    }

    // Método para registrar el voto
    public function vote(Request $request, $surveyId)
{
    $survey = Survey::with('options')->find($surveyId);

    if (!$survey) {
        return redirect()->route('home')->with('error', 'Encuesta no encontrada.');
    }

    // Validar que se haya seleccionado una opción
    $request->validate([
        'option_id' => 'required|exists:options,id',
    ]);

    // Obtener la opción seleccionada
    $option = Option::find($request->option_id);

    // Verificar si el usuario ya ha votado en esta encuesta
    $existingVote = Vote::where('user_id', Auth::id())
                        ->where('survey_id', $survey->id)
                        ->first();

    if ($existingVote) {
        return redirect()->route('survey.results', ['surveyId' => $surveyId])
                         ->with('error', 'Ya has votado en esta encuesta.');
    }

    // Aumentar el número de votos de la opción seleccionada
    $option->votes += 1;
    $option->save();

    // Registrar el voto en la tabla votes
    Vote::create([
        'user_id' => Auth::id(),  // Asegúrate de que el usuario esté autenticado
        'survey_id' => $survey->id,
        'option_id' => $option->id,
    ]);

    // Redirigir al usuario a la página de resultados
    return redirect()->route('survey.results', ['surveyId' => $surveyId])
                     ->with('success', 'Tu voto ha sido registrado correctamente.');
}

}

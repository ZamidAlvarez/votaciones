@extends('layouts.app')

@section('content')
    <link href="{{ asset('css/vote.css') }}" rel="stylesheet">

    <div class="vote-survey-container">
        <div class="vote-survey-card">
            <h2>{{ $survey->title }}</h2>
            <p>{{ $survey->description }}</p>

            <!-- Verifica si hay opciones -->
            @if($survey->options->count() > 0)
                <!-- Formulario para votar -->
                <form action="{{ route('survey.vote', ['surveyId' => $survey->id]) }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label for="option_id">Elige una opción para votar:</label><br>

                        @foreach ($survey->options as $option)
                            <div class="form-check">
                                <input 
                                    class="form-check-input" 
                                    type="radio" 
                                    name="option_id" 
                                    id="option{{ $option->id }}" 
                                    value="{{ $option->id }}"
                                    required
                                >
                                <label class="form-check-label" for="option{{ $option->id }}">
                                    {{ $option->text }}
                                </label>
                            </div>
                        @endforeach
                    </div>

                    <button type="submit" class="btn btn-primary">Votar</button>
                </form>
            @else
                <p>No hay opciones disponibles para esta encuesta.</p>
            @endif

            <br>
            <!-- Botón para ver los resultados -->
            <a href="{{ route('survey.results', ['surveyId' => $survey->id]) }}" class="btn btn-secondary">Ver Resultados</a>
            <br><br>

            <!-- Botón para regresar -->
            <a href="{{ route('home') }}" class="btn btn-secondary">Regresar</a>
        </div>
    </div>
@endsection

@extends('layouts.app')

@section('content')
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <div class="container">
        <h2>Bienvenido al sistema de votación</h2>
        <p>¡Estás autenticado correctamente!</p>

        <!-- Enlace para crear nueva encuesta -->
        <a href="{{ route('survey.create') }}" class="btn btn-primary">Crear Nueva Encuesta</a>

        <h3>Encuestas Disponibles</h3>
        
        <!-- Tabla para mostrar todas las encuestas -->
        <table class="table table-bordered mt-4">
            <thead>
                <tr>
                    <th>Título</th>
                    <th>Descripción</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($surveys as $survey)
                    <tr>
                        <td>{{ $survey->title }}</td>
                        <td>{{ $survey->description }}</td>
                        <td>
                            <!-- Enlace para votar en la encuesta -->
                            <a href="{{ route('survey.vote', ['surveyId' => $survey->id]) }}" class="btn btn-success">Votar</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <br>
        <!-- Botón para cerrar sesión con el mismo estilo -->
        <form action="{{ route('logout') }}" method="POST" class="mt-4">
            @csrf
            <button type="submit" class="btn btn-primary">Cerrar Sesión</button>
        </form>
    </div>
@endsection

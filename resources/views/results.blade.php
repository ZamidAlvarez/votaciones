@extends('layouts.app')

@section('content') 
    <link href="{{ asset('css/results.css') }}" rel="stylesheet">

    <div class="container">
        <h2>Resultados de la Encuesta: {{ $survey->title }}</h2>

        @if(count($results) > 0)
            <table class="table table-bordered mt-4">
                <thead>
                    <tr>
                        <th>Opción</th>
                        <th>Votos</th>
                        <th>Porcentaje</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($results as $result)
                        <tr>
                            <td>{{ $result['option'] }}</td>
                            <td>{{ $result['votes'] }}</td>
                            <td>{{ number_format($result['percentage'], 2) }}%</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>No hay resultados para mostrar. Aún no se han registrado votos.</p>
        @endif

        <br>
        <a href="{{ route('home') }}" class="btn btn-secondary">Regresar</a>
    </div>
@endsection

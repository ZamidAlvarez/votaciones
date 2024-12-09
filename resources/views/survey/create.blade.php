@extends('layouts.app')

@section('content')
    <link href="{{ asset('css/create.css') }}" rel="stylesheet">

    <div class="create-survey-container">
        <div class="create-survey-card">
            <h2>Crear Nueva Encuesta</h2>

            <form action="{{ route('survey.create') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="title">Título de la encuesta:</label>
                    <input type="text" name="title" id="title" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="description">Descripción:</label>
                    <textarea name="description" id="description" class="form-control" rows="3" required></textarea>
                </div>

                <div class="form-group">
                    <label for="num_options">¿Cuántas opciones tendrá la encuesta? (1 a 5)</label>
                    <select name="num_options" id="num_options" class="form-control" required>
                        @for ($i = 1; $i <= 5; $i++)
                            <option value="{{ $i }}">{{ $i }}</option>
                        @endfor
                    </select>
                </div>

                <div id="options-container" class="mt-3">
                    <!-- Aquí se generarán dinámicamente los campos de las opciones -->
                </div>

                <button type="submit" class="btn btn-primary mt-3">Crear Encuesta</button>
            </form>
        </div>
    </div>

    <script>
        document.getElementById('num_options').addEventListener('change', function () {
            const container = document.getElementById('options-container');
            container.innerHTML = ''; // Limpiar el contenedor

            const numOptions = parseInt(this.value, 10);
            for (let i = 1; i <= numOptions; i++) {
                const div = document.createElement('div');
                div.classList.add('form-group');
                div.innerHTML = `
                    <label for="option_${i}">Opción ${i}:</label>
                    <input type="text" name="options[]" id="option_${i}" class="form-control" required>
                `;
                container.appendChild(div);
            }
        });
    </script>
@endsection

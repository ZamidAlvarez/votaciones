<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultados de la Encuesta</title>
</head>
<body>
    <h1>Resultados de la Encuesta: {{ $survey->title }}</h1>
    <p>{{ $survey->description }}</p>

    <table border="1">
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

</body>
</html>

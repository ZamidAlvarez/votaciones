<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/welcome.css') }}" rel="stylesheet">
    <title>Bienvenido</title>
</head>
<body>
    <div class="welcome-container">
        <div class="welcome-card">
            <h1>Bienvenido al Sistema de Votación</h1>
            <p>Por favor, elige una opción:</p>
            <div class="options">
                <a href="{{ route('login') }}" class="btn">Iniciar sesión</a>
                <a href="{{ route('register') }}" class="btn">Registrarse</a>
            </div>
        </div>
    </div>
</body>
</html>

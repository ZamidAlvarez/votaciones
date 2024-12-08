@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Iniciar sesión</h2>
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <label for="email">Correo:</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" required>

            @error('email')
                <div class="error">{{ $message }}</div>
            @enderror

            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="password" required>

            @error('password')
                <div class="error">{{ $message }}</div>
            @enderror

            <button type="submit">Iniciar sesión</button>
        </form>
    </div>
@endsection

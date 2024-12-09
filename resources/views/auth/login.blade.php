@extends('layouts.app')

@section('content')
    <link href="{{ asset('css/login.css') }}" rel="stylesheet">

    <div class="login-container">
        <div class="login-card">
            <h2>Iniciar sesión</h2>
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="email">Correo:</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" required>
                    @error('email')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password">Contraseña:</label>
                    <input type="password" id="password" name="password" required>
                    @error('password')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn">Iniciar sesión</button>
            </form>
        </div>
    </div>
@endsection

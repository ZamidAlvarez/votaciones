@extends('layouts.app')

@section('content')
    <link href="{{ asset('css/register.css') }}" rel="stylesheet">

    <div class="register-container">
        <div class="register-card">
            <h2>Registrarse</h2>
            <form action="{{ route('register') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Nombre:</label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}" required>
                    @error('name')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>
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
                <div class="form-group">
                    <label for="password_confirmation">Confirmar Contraseña:</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" required>
                </div>
                <button type="submit" class="btn">Registrar</button>
            </form>
        </div>
    </div>
@endsection

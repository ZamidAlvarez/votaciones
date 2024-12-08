<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // Método para mostrar el formulario de login
    public function showForm()
    {
        return view('auth.login');  // Retorna la vista del formulario de login
    }

    // Método para autenticar al usuario
    public function login(Request $request)
    {
        // Validación de los datos del formulario
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        // Intento de autenticar al usuario
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // Si la autenticación es exitosa, redirige a la página principal
            return redirect()->route('home');  // Puedes cambiar 'home' por cualquier ruta que desees
        }

        // Si la autenticación falla, redirige de nuevo al login con un error
        return back()->withErrors(['email' => 'Las credenciales son incorrectas.']);
    }
}

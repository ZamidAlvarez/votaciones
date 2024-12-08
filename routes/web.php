<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\SurveyController;

Route::get('/', function () {
    return view('welcome');
});

// Ruta para mostrar el formulario de registro
Route::get('register', [RegisterController::class, 'showForm'])->name('register');

// Ruta para registrar al usuario
Route::post('register', [RegisterController::class, 'register']);

// Ruta para mostrar el formulario de login
Route::get('login', [LoginController::class, 'showForm'])->name('login');

// Ruta para hacer login
Route::post('login', [LoginController::class, 'login']);

// Ruta para mostrar los resultados de la encuesta
Route::get('/survey/{surveyId}/results', [SurveyController::class, 'showResults'])->name('survey.results');

// Ruta para la página principal después del login o registro
Route::get('home', function () {
    return view('home');  // Esta vista puede ser la que tú decidas mostrar
})->name('home');

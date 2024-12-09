<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\SurveyController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('index'); 
});

// Ruta para mostrar el formulario de registro
Route::get('register', [RegisterController::class, 'showForm'])->name('register');

// Ruta para registrar al usuario
Route::post('register', [RegisterController::class, 'register']);

// Ruta para mostrar el formulario de login
Route::get('login', [LoginController::class, 'showForm'])->name('login');

// Ruta para hacer login
Route::post('login', [LoginController::class, 'login']);

// Ruta para mostrar todas las encuestas creadas
Route::get('home', [SurveyController::class, 'index'])->name('home');

// Ruta para crear una nueva encuesta
Route::get('survey/create', [SurveyController::class, 'create'])->name('survey.create');
Route::post('survey/create', [SurveyController::class, 'store']);

// Ruta para mostrar los resultados de la encuesta
Route::get('/survey/{surveyId}/results', [SurveyController::class, 'showResults'])->name('survey.results');

// Ruta para mostrar la vista de votación (GET)
Route::get('/survey/{surveyId}/vote', [SurveyController::class, 'showVoteForm'])->name('survey.vote.form');

// Ruta para votar en una opción (POST)
Route::post('/survey/{surveyId}/vote', [SurveyController::class, 'vote'])->name('survey.vote');

// Ruta para cerrar sesión
Route::post('logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');

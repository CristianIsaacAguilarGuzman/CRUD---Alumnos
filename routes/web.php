<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlumnoController; // Agregar esta línea

Route::get('/', function () {
    return view('welcome');
});

// Registrar las rutas del CRUD de alumnos
Route::resource('alumnos', AlumnoController::class);

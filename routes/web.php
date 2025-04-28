<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlumnoController; // Agregar esta línea
use App\Http\Controllers\SeccionController;


Route::get('/', function () {
    return view('welcome');
});

// Registrar las rutas del CRUD de alumnos
Route::resource('alumnos', AlumnoController::class);
Route::resource('secciones', SeccionController::class)->parameters(['secciones' => 'seccion']);
Route::post('secciones/{seccion}/asignar-alumnos', [SeccionController::class, 'asignarAlumnos'])->name('secciones.asignarAlumnos');

<?php

namespace App\Http\Controllers;

use App\Models\Seccion;
use App\Models\Alumno;
use Illuminate\Http\Request;

class SeccionController extends Controller
{
    public function index()
    {
        $secciones = Seccion::all();
        return view('secciones.index', compact('secciones'));
    }

    public function show(Seccion $seccion)
    {
        $alumnos = Alumno::all();
        return view('secciones.show', compact('seccion', 'alumnos'));
    }

    public function asignarAlumnos(Request $request, Seccion $seccion)
    {
        $seccion->alumnos()->syncWithoutDetaching($request->alumnos);
        return redirect()->route('secciones.show', $seccion)->with('success', 'Alumnos asignados correctamente.');
    }
}

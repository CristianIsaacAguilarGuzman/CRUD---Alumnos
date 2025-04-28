@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Sección: {{ $seccion->nombre }}</h1>

        {{-- Mensaje de éxito si hay --}}
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        {{-- Formulario para asignar alumnos --}}
        <form method="POST" action="{{ route('secciones.asignarAlumnos', $seccion->id) }}">
            @csrf
            <!-- Aquí pones tu select de alumnos -->
            <select name="alumnos[]" multiple>
                @foreach($alumnos as $alumno)
                    <option value="{{ $alumno->id }}">{{ $alumno->nombre }}</option>
                @endforeach
            </select>
            <button type="submit">Asignar alumnos</button>
        </form>

        {{-- Lista de alumnos inscritos --}}
        <h2 class="mt-5">Alumnos Inscritos</h2>
        @if ($seccion->alumnos->isEmpty())
            <p>No hay alumnos inscritos todavía.</p>
        @else
            <ul>
                @foreach ($seccion->alumnos as $alumno)
                    <li>{{ $alumno->nombre }} ({{ $alumno->correo }})</li>
                @endforeach
            </ul>
        @endif
    </div>
@endsection

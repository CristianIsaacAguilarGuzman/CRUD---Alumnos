@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Detalles del Alumno</h2>

    <div class="card">
        <div class="card-body">
            <h4 class="card-title">{{ $alumno->nombre }}</h4>
            <p><strong>Correo:</strong> {{ $alumno->correo }}</p>
            <p><strong>Fecha de Nacimiento:</strong> {{ $alumno->fecha_nacimiento }}</p>
            <p><strong>Ciudad:</strong> {{ $alumno->ciudad }}</p>
        </div>
    </div>

    <a href="{{ route('alumnos.index') }}" class="btn btn-secondary mt-3">Volver</a>
</div>
@endsection

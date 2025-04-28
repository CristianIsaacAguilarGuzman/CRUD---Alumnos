@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Secciones</h1>

        <ul>
            @foreach ($secciones as $seccion)
                <li>
                    <a href="{{ route('secciones.show', $seccion) }}">
                        {{ $seccion->nombre }}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
@endsection

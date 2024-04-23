@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Detalles de la Orden</h2>
        <p>Especial: {{ $orden->especial }}</p>
        <p>Fecha: {{ $orden->fecha }}</p>
        <!-- Mostrar otros detalles aquí según tu estructura de datos -->
        <!-- Por ejemplo: -->
        <!-- <p>Año Lectivo: {{ $orden->anio_lectivo }}</p> -->
        <!-- <p>Jornada: {{ $orden->jornada }}</p> -->
        <!-- <p>Mes: {{ $orden->mes }}</p> -->
        <!-- Ajusta esta parte según los campos de tu modelo GeneraOrdenes -->
    </div>
@endsection

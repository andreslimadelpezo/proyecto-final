@extends('layouts.app')
@section('content')

<div class="container text-center" style="color: red;">
    <h1>hola ordenes</h1>
</div>

<form action="{{ route('generarOrdenes') }}" method="POST" class="mt-4">
    @csrf

    <div class="form-group">
        <label for="anl_id">Periodo:</label>
        <select name="anl_id" id="anl_id" class="form-select">
            @foreach($periodos as $p)
            <option value="{{ $p->id }}">{{ $p->anl_descripcion }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="jor_id">Jornada:</label>
        <select name="jor_id" id="jor_id" class="form-select">
            @foreach($jornadas as $j)
            <option value="{{ $j->id }}">{{ $j->jor_descripcion }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="mes">Mes:</label>
        <select name="mes" id="mes" class="form-select">
            @foreach($meses as $key => $m)
            <option value="{{ $key }}">{{ $m }}</option>
            @endforeach
        </select>
    </div>

    <button type="submit" class="btn btn-danger btn-sm mt-3">GENERAR</button>
</form>



<table class="table">
    <tr>
        <th>Ordenes Generadas</th>
    </tr>

    <tr>
        <th>secuencial</th>
        <th>fecha</th>
        <th>año lectivo</th>
        <th>jornada</th>
        <th>mes</th>
        <th>acciones</th>
    </tr>
    @foreach($ordenes as $o)
        <tr>
            <td>{{$o->especial}}</td>
            <td>{{$o->fecha}}</td>
            <td>{{$o->anl_descripcion}}</td>
            <td>{{$o->jor_descripcion}}</td>
            <td>{{$o->mes}}</td>

            <td>
                <button class="btn btn-warning btn-sm mt-3">VER</button>
            </td>
        </tr>
        
    @endforeach
</table>

@endsection('content')

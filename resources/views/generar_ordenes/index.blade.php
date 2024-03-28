@extends('layouts.app')
@section('content')
@php
function nmesesTexto($nmes){
    $meses = [
        '1' => 'Enero',
        '2' => 'Febrero',
        '3' => 'Marzo',
        '4' => 'Abril',
        '5' => 'Mayo',
        '6' => 'Junio',
        '7' => 'Julio',
        '8' => 'Agosto',
        '9' => 'Septiembre',
        '10' => 'Octubre',
        '11' => 'Noviembre',
        '12' => 'Diciembre'
    ];
        return $meses[$nmes];
}
@endphp

<script>
    $(document).on("click",".btn_delete",function(){
        if( confirm("¿Seguro desea eliminar?") ){
            const secuencial=$(this).attr("secuencial");
            $("#secuencial").val(secuencial);
            $("#frmEliminar").submit();
        }
});
</script>

<form action="{{route('eliminaOrden')}}" method="POST" id="frmEliminar">
    @csrf
    <input type="hidden" id="secuencial" name="secuencial" value="0">
</form>
    

<div class="container text-center" style="color: red;">
    <h1>Hola órdenes</h1>
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
        <th>Órdenes Generadas</th>
    </tr>

    <tr>
        <th>Secuencial</th>
        <th>Fecha</th>
        <th>Año lectivo</th>
        <th>Jornada</th>
        <th>Mes</th>
        <th>Acciones</th>
    </tr>
    @foreach($ordenes as $o)
        <tr>
            <td>{{ $o->especial }}</td>
            <td>{{ $o->fecha }}</td>
            <td>{{ $o->anl_descripcion }}</td>
            <td>{{ $o->jor_descripcion }}</td>
            <td>{{ nmesesTexto($o->mes) }}</td>
            <td>
                <a ><button class="btn btn-warning btn-sm mt-3">VER</button></a>
                <a ><button class="btn btn-danger btn-sm mt-3 btn_delete" secuencial="{{ $o->especial }}">ELIMINAR</button></a>
            </td>
        </tr>
    @endforeach
</table>
@endsection

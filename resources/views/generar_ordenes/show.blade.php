@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="panel panel-info text-center text-bolder">
            <div class="panel-heading">
                ORDEN GENERADA #: {{ $sec }}
            </div>
            <div class="panel-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Cedula</th>
                            <th>Estudiante</th>
                            <th>Jorna/Curso/Paralelo</th>
                            <th>Valor a Pagar</th>
                            <th>Fecha Pago</th>
                            <th>Valor Pagado</th>
                            <th>Documento</th>
                            <th>Estado</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($datos as $d)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $d->est_cedula}}</td>
                                <td class="text-left">{{ $d->est_apellidos.' '.$d->est_nombres }}</td>
                                <td class="text-left">{{ $d->jor_descripcion.' '.$d->esp_descripcion.' '.$d->cur_descripcion.' '.$d->mat_paralelot}}</td>
                                <td>{{ $d->valor}}</td>
                                <td>{{ $d->fecha}}</td>
                                <td>{{ $d->vpagado}}</td>
                                <td>{{ $d->numero_documento}}</td>
                                <td>{{ $d->estado == 0 ? 'Pendiente' : 'Pagado' }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

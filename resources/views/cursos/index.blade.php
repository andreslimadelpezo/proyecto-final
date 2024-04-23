@extends('layouts.app')
@section('content')


<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<h1>ESTA ES LA VISTA INDEX DE CURSOS</h1>
<a href="{{route('cursos.create')}}" class="btn btn-info">Nuevo Curso</a>

<table class="table">
    <tr>
        <th>#</th>
        <th>titulo</th>
        <th>descripcion</th>
        <th>grupo</th>
        <th>estado</th>
        <th>acciones</th>
    </tr>

    @foreach($cursos as $c)
    <tr>
        <td>{{ $loop->iteration }}</td> 
        <td>{{$c->cur_titulo}} </td>
        <td>{{$c->cur_descripcion}} </td>
        <td>{{$c->cur_grupo}} </td>
        <td>{{$c->cur_estado==0?'Activo':'Inactivo'}} </td>

        <td>
            <div class="small  btn-group ">
            <a href="{{route('cursos.edit',$c->id)}} " class="btn btn-info btn-sm"><i class="bi bi-pencil-square"></i></a>

           
            <form action="{{route('cursos.destroy',$c->id)}}" method="POST" onsubmit="return confirm('desea eliminar el curso?')">
                @csrf  
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm"><i class="bi bi-trash3-fill"></i></button>

                </div>
            </form>
        </td>
    </tr>
    @endforeach

</table>

@endsection
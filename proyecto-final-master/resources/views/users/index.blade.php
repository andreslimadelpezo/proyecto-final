@extends('layouts.app')
@section('content')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<h1>ESTA ES LA VISTA INDEX DE CURSOS</h1>
<a href="{{route('users.create')}}" class="btn btn-info">Nuevo usuario</a>



<table class="table">
    <tr>
        <th>#</th>
        <th>usuario</th>
        <th>rol</th>
        <th>nombre</th>
        <th>telefonos</th>
        <th>email</th>
        <th>estado</th>
        <th>acciones</th>
    </tr>

    @foreach($users as $u)
    <tr>
        <td>{{ $loop->iteration }}</td> 
        <td>{{$u->name}} </td>
        <td>{{$u->rol_descripcion}}</td>
        <td>{{$u->usu_nombres}} </td>
        <td>{{$u->usu_telefono}} </td>
        <td>{{$u->email}} </td>
        <td>{{$u->usu_estado==1?'activo':'inactivo'}} </td>
   
    <td>
            <div class="small  btn-group ">
            <a href="{{route('users.edit',$u->usu_id)}}" class="btn btn-info btn-sm"><i class="bi bi-pencil-square"></i></a>

           
            <form action="{{route('users.destroy',$u->usu_id)}}" method="POST" onsubmit="return confirm('desea eliminar el curso?')">
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











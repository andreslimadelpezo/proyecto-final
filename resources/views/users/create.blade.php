@extends('layouts.app')
@section('content')

<div class="container">
 <h1>Crear usuario</h1>

 <form action="{{ route('users.store') }}" method="POST">
  @csrf
  <div class="mb-3">
    <label for="name" class="form-label">Nombre del usuario</label>
    <input type="text" class="form-control" value="" id="name" name="name" >
    

    <label for="rol_id" class="form-label">Seleccione un rol</label> <br>
    <select name="rol_id" class="form-select" >
    @foreach($roles as $r)
    <option class="form-label" value="{{$r->rol_id}}"> {{$r->rol_descripcion}} </option>
    @endforeach
    </select>

    <br>
    <label for="usu_nombres" class="form-label">Nombres y apellidos</label>
    <input type="text" class="form-control" value=""  id="usu_nombres" name="usu_nombres" >

    <label for="usu_telefono" class="form-label">Teléfono</label>
    <input type="text" class="form-control" value=""  id="usu_telefono" name="usu_telefono" >

    <label for="email" class="form-label">Correo</label>
    <input type="email" class="form-control" value=""  id="email" name="email" >


    <label for="password" class="form-label">Contraseña</label>
    <input type="password" class="form-control" value=""  id="password" name="password" >
    

  </div>
  <button type="submit" class="btn btn-primary">GUARDAR</button>
</form>

@endsection
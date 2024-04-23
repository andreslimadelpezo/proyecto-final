@extends('layouts.app')
@section('content')

<div class="container">
 <h1>Crear cursos</h1>

 <form action="{{ route('cursos.store') }}" method="POST">
  @csrf
  @include('cursos.fields');
</form>

@endsection
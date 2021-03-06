@extends('layouts.app')
@section('title', 'Añadir nuevo usuario')
@section('main')

<h2>Añadir nuevo usuario</h2>
<ol class="breadcrumb p-0">
    <li>
        <a href="#">Inicio</a>
    </li>
    <li>
        <a href="{{route('users.index')}}">Todos los usuarios</a>
    </li>
    <li class="text-muted">
        Nuevo usuario
    </li>
</ol>
<br>
<p class="lead">Los campos marcados con <code>(*)</code> son obligatorios</p>
@if (count($errors) > 0)
  <div class="alert alert-danger">
    <strong>Ooops!</strong> Hay algunos problemas al guardar el registro.<br><br>
    <ul>
       @foreach ($errors->all() as $error)
         <li>{{ $error }}</li>
       @endforeach
    </ul>
  </div>
@endif
<div class="card">
    <div class="card-header">
        <h4 class="card-title">Por favor, llena correctamente los campos a continuación</h4>
    </div>
    <form method="post" action="{{route('users.store')}}">
      {{ csrf_field() }}
    <div class="card-body">
          <div class="form-group row">
              <label for="staticEmail" class="col-sm-2 col-form-label">Nombre</label>
              <div class="col-sm-6">
                  <input type="text" class="form-control" name="name" placeholder="Escriba nombre del usuario">
              </div>
          </div>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-6">
                    <input type="email" class="form-control" name="email" placeholder="email@example.com">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-6">
                    <input type="password" class="form-control" name="password" placeholder="Password">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword" class="col-sm-2 col-form-label">Confirmar Password</label>
                <div class="col-sm-6">
                    <input type="password" class="form-control" name="confirm-password" placeholder="Password">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword" class="col-sm-2 col-form-label">Asignar roles</label>
                <div class="col-sm-6">
                  <select class="form-control multiple" name="roles">
                    <option value="">Seleccione</option>
                    @foreach ($roles as $key => $value)
                      <option value="{{$value->name}}">{{$value->name}}</option>
                    @endforeach
                  </select>
                </div>
            </div>
          </div>
      <div class="card-footer text-center">
          <button type="submit" class="btn btn-primary mr-2">Guardar</button>
          <a class="btn btn-secondary" href="{{ route('users.index') }}"> Volver</a>
      </div>
    </div>
  </form>
@endsection

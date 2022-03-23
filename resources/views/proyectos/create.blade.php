@extends('layouts.app')
@section('title', 'Añadir nuevo proyecto')
@section('main')
  <div class="row mb-3">
    <div class="col-md-6">
      <h1 class="h2 mb-0">Resumen de Proyectos</h1>
      <ol class="breadcrumb p-0">
        <li>
          <a href="#">Inicio</a>
        </li>
        <li>
          <a href="#">Todos los proyectos</a>
        </li>
        <li class="text-muted">
          nuevo
        </li>
      </ol>
    </div>
    <div class="col-md-6">
      <div class="text-right">
        <a href="purchase-order.html" class="btn btn btn-success">
          <i class="material-icons md-18 align-middle">add</i>
          <span class="align-middle">Nuevo Proyecto</span>
        </a>
      </div>
    </div>
  </div>
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
      </div>
      <div class="card-footer text-center">
          <button type="submit" class="btn btn-primary mr-2">Guardar</button>
          <a class="btn btn-secondary" href="{{ route('users.index') }}"> Volver</a>
      </div>
    </div>
  </form>
@endsection

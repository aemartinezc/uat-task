@extends('layouts.app')
@section('title', 'Añadir nuevo usuario')
@section('main')

<h2>Añadir nuevo usuario</h2>
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
{{--

<div class="card card-custom gutter-b">
    <div class="row justify-content-center">
      <div class="col-xl-9">
        <form method="post" action="{{route('users.store')}}">
          {{ csrf_field() }}
            <div class="card-body">
              <div class="form-group mb-8">
                @if (count($errors) > 0)
                  <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                       @foreach ($errors->all() as $error)
                         <li>{{ $error }}</li>
                       @endforeach
                    </ul>
                  </div>
                @endif
                <div class="alert alert-custom alert-default" role="alert">
                  <div class="alert-icon"><span class="svg-icon svg-icon-primary svg-icon-xl"><!--begin::Svg Icon | path:assets/media/svg/icons/Tools/Compass.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                      <rect x="0" y="0" width="24" height="24"></rect>
                      <path d="M7.07744993,12.3040451 C7.72444571,13.0716094 8.54044565,13.6920474 9.46808594,14.1079953 L5,23 L4.5,18 L7.07744993,12.3040451 Z M14.5865511,14.2597864 C15.5319561,13.9019016 16.375416,13.3366121 17.0614026,12.6194459 L19.5,18 L19,23 L14.5865511,14.2597864 Z M12,3.55271368e-14 C12.8284271,3.53749572e-14 13.5,0.671572875 13.5,1.5 L13.5,4 L10.5,4 L10.5,1.5 C10.5,0.671572875 11.1715729,3.56793164e-14 12,3.55271368e-14 Z" fill="#000000" opacity="0.3"></path>
                      <path d="M12,10 C13.1045695,10 14,9.1045695 14,8 C14,6.8954305 13.1045695,6 12,6 C10.8954305,6 10,6.8954305 10,8 C10,9.1045695 10.8954305,10 12,10 Z M12,13 C9.23857625,13 7,10.7614237 7,8 C7,5.23857625 9.23857625,3 12,3 C14.7614237,3 17,5.23857625 17,8 C17,10.7614237 14.7614237,13 12,13 Z" fill="#000000" fill-rule="nonzero"></path>
                    </g>
                  </svg><!--end::Svg Icon--></span></div>
                  <div class="alert-text">
                    Todos los campos son obligatorios
                  </div>
                </div>
              </div>
              <div class="form-group">
                  <strong>Nombre:</strong>
                  <input type="text" name="name" class="form-control" placeholder="Esciba su nombre" value="{{ old('name') }}">
              </div>
              <div class="form-group">
                  <strong>Email:</strong>
                  <input type="text" name="email" class="form-control" placeholder="email" value="{{ old('email') }}" >
              </div>
              <div class="form-group">
                  <strong>Contraseña:</strong>
                  <input type="password" name="password" class="form-control" placeholder="Esciba su contraseña" value="{{ old('password') }}">
              </div>
              <div class="form-group">
                  <strong>Confirmar Contraseña:</strong>
                  <input type="password" name="confirm-password" class="form-control" placeholder="Confirma tu contraseña" value="{{ old('confirm-password') }}">
              </div>
              <div class="form-group">
                  <strong>Asignar roles:</strong>
                  <select class="form-control multiple" name="roles">
                    <option value="">Seleccione</option>
                    @foreach ($roles as $key => $value)
                      <option value="{{$value->name}}">{{$value->name}}</option>
                    @endforeach
                  </select>
              </div>
              <div class="card-footer text-center">
                  <button type="submit" class="btn btn-primary mr-2">Guardar</button>
                  <a class="btn btn-secondary" href="{{ route('users.index') }}"> Volver</a>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div> --}}
@endsection

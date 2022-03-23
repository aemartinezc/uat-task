@extends('layouts.app')
@section('title', 'Añadir nuevo usuario')
@section('main')

  <div class="row mb-3">
    <div class="col-md-6">
      <h1 class="h2 mb-0">Resumen de Proyectos</h1>
      <ol class="breadcrumb p-0">
        <li>
          <a href="#">Inicio</a>
        </li>
        <li class="text-muted">
          Todos los proyectos
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
  <div class="card card-body p-2">
    <div class="row row-projects">
      <div class="col-lg-3 col-md-4 col-6">
        <i class="material-icons text-link-color md-36">dvr</i>
        <div class="mb-1">Total Proyectos</div>
        <h4 class="mb-0 ">6</h4>
      </div>
      <div class="col-lg-3 col-md-4 col-6">
        <i class="material-icons text-success md-36">cast</i>
        <div class="mb-1">Proyectos Activos</div>
        <h4 class="mb-0">4</h4>
      </div>
      <div class="col-lg-3 col-md-4 col-6">
        <i class="material-icons text-warning md-36">assistant_photo</i>
        <div class="mb-1">Tareas Totales</div>
        <h4 class="mb-0">2</h4>
      </div>
      <div class="col-lg-3 col-md-4 col-6">
        <i class="material-icons text-primary md-36">contacts</i>
        <div class="mb-1">Colaboradores</div>
        <h4 class="mb-0">4</h4>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="table-responsive">
      <table class="table table-projects mb-0">
        <thead>
          <tr>
            <th>Nombre</th>
            <th>Municipio</th>
            <th>Cliente</th>
            <th>Creado</th>
            <th>Estatus</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          @foreach ($proyectos as $key => $value)
            <tr>
              <td>
                <a href="{{route('projects.show', $value->id)}}">{{$value->nombre}}</a>
              </td>
              <td>
                  {{$value->municipio}}
              </td>
              <td>
                {{$value->dependencia}}
              </td>
              <td>
                {{$value->created_at}}
              </td>
              <td>
                <div class="badge badge-success">active</div>
              </td>
              <td>
                <div class="dropdown show">
                  <a class="btn btn-white btn-sm" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="material-icons md-18 align-middle">more_vert</i>
                  </a>

                  <div class="dropdown-menu">
                    <a class="dropdown-item" href="#">
                      <i class="material-icons md-14 align-middle">edit</i>
                      <span class="align-middle">Edit</span>
                    </a>
                    <a class="dropdown-item" href="#">
                      <i class="material-icons md-14 align-middle">content_copy</i>
                      <span class="align-middle">Crear una copia</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item text-danger" href="#">
                      <i class="material-icons md-14 align-middle">delete</i>
                      <span class="align-middle">Eliminar</span>
                    </a>
                  </div>
                </div>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
@endsection

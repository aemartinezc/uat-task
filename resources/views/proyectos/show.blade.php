@extends('layouts.app')
@section('title', 'Añadir nuevo proyecto')
@section('main')
  <?php
  setlocale(LC_TIME, 'es_ES.UTF-8');
  Carbon\Carbon::setLocale('es');
  $hoy = Carbon\Carbon::now();
  ?>
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
  <div class="row">
    <div class="col-lg-8">
      <div class="card">
        <div class="card-header">
          <div class="row align-items-center">
            <div class="col-lg-8">
              <h4 class="card-title">
                {{$proyecto->nombre}}
              </h4>
              <div class="text-muted">
                <span>Responsable: Mark Ups</span> |
                <span>Creado el : 18 Apr, 2018</span> |
                <span>última actualizacion: 18 Nov, 2018</span>
              </div>
            </div>
            <div class="col-lg-4 text-lg-right">
              <a href="#" class="btn btn-sm btn-white mr-1">
                <i class="material-icons md-18 align-middle">import_export</i>
                <small class="align-middle text-uppercase">Export</small>
              </a>
            </div>
          </div>
        </div>
        <div class="card-body">
          <div class="row">
            @foreach ($hitos as $key => $value)
              <div class="col-lg-4">
                <div class="doughnut-chart-wrapper">
                  <div class="doughnut-chart-text">
                    <div>
                      <h3 class="text-danger">{{count($value['tareas'])}}</h3>
                      <small>{{$value['nombre']}}</small>
                    </div>
                  </div>
                  {{-- @foreach ($value['tareas'] as $key => $dp)
                  @if ($dp['completado'] == 1)
                  @php
                  $total = $total + $dp['completado'];
                  $total = $total*100;
                @endphp
                {{$total}}
              @endif
            @endforeach --}}
            <canvas class="doughnut-chart" data-percent="66.6"></canvas>
          </div>
        </div>
      @endforeach
    </div>
    <div class="card-subtitle line-through text-muted text-center my-3">
      <span>Estatus del proyecto</span>
    </div>
    <div class="row mb-3">
      <div class="col-lg-12">
        <div class="d-flex justify-content-between mb-1">
          <span>Overall progress</span>
          <span class="text-primary">75%</span>
        </div>
        <div class="progress">
          <div class="progress-bar" style="width: 75%;" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
      </div>
      <div class="col-lg-12">
        <div class="mb-1">Bug fixing</div>
        <div class="progress">
          <div class="progress-bar bg-danger" style="width: 12%;" role="progressbar" aria-valuenow="12" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
      </div>
      <div class="col-lg-12">
        <div class="mb-1">Issues fixing</div>
        <div class="progress">
          <div class="progress-bar bg-warning" style="width: 49%;" role="progressbar" aria-valuenow="49" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
      </div>
      <div class="col-lg-12">
        <div class="mb-1">Tasks fixed</div>
        <div class="progress">
          <div class="progress-bar bg-success" style="width: 65%;" role="progressbar" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="card">
  <div class="card-header">
    <div class="d-flex align-items-center justify-content-between">
      <h4 class="card-title">Colaboradores</h4>
      <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#newCollaboratorModal">
        <i class="material-icons md-18 align-middle">add</i>
        <span class="align-middle text-uppercase">Add new</span>
      </a>
    </div>
  </div>
  <ul class="list-group list-group-flush">

    {{-- {{dd($grupos)}} --}}
    @foreach ($grupos as $key => $value)
      <li class="list-group-item bg-fade">
        <strong>{{$value['nombre']}}</strong>
      </li>
      @foreach ($value['rel'] as $key => $r)
        <li class="list-group-item py-3">
          <div class="media align-items-center">
            <img src="/assets/images/avatars/person-9.jpg" alt="Tara Knows" width="35" class="rounded-circle mr-2">
            <div class="media-body">
              <div>
                <a href="profile.html">{{get_user($r['id_usuario'])}}</a>
              </div>
              <div>

              </div>
              <div>Colaborador</div>
            </div>
            <a href="#" data-toggle="dropdown" aria-expanded="false">
              <i class="material-icons align-middle text-muted">more_horiz</i>
            </a>

            <div class="dropdown-menu dropdown-menu-right">
              <a class="dropdown-item" href="#">
                <i class="material-icons md-18 align-middle text-danger">block</i>
                <span class="align-middle">Block user</span>
              </a>
              <a class="dropdown-item" href="#">
                <i class="material-icons md-18 align-middle text-primary">check</i>
                <span class="align-middle">Follow</span>
              </a>
            </div>
          </div>
        </li>

      @endforeach
    @endforeach
  </ul>
</div>
</div>
<div class="col-lg-4">
  <div class="card">
    <div class="card-header">
      <div class="d-flex align-items-center justify-content-between">
        <h4 class="card-title">Últimas tareas</h4>
        <a href="#">
          <i class="material-icons md-18 align-middle">sync</i>
        </a>
      </div>
    </div>
    <ul class="list-group list-group-flush">
      @foreach ($tareasr as $key => $value)
        <li class="list-group-item">
          <div class="media align-items-center">
            <div class="text-muted mr-2">#{{$value->consecutivo}}</div>
            <div class="media-body">
              {{$value->tarea}}
            </div>
            <img src="/assets/images/avatars/person-1.jpg" alt="Andrew Robles" class="rounded-circle" width="35">
          </div>
        </li>
      @endforeach

      <li class="list-group-item text-center">
        <a href="project-tasks.html">Ver todas</a>
      </li>
    </ul>
  </div>
  <div class="card">
    <div class="card-header">
      <h4 class="card-title">Descripción</h4>
    </div>
    <div class="card-body">
      <p class="card-text">
        {{$proyecto->descripcion}}
      </p>
    </div>
  </div>
  <div class="card">
    <div class="card-header">
      <div class="d-flex align-items-center justify-content-between">
        <h4 class="card-title">Última actividad</h4>
        <a href="#">
          <i class="material-icons md-18 align-middle">sync</i>
        </a>
      </div>
    </div>
    <ul class="list-group list-group-flush">
      @foreach ($actividad as $key => $value)
        <li class="list-group-item py-3">
          <div class="media">
            <i class="material-icons md-18 align-middle mr-2 text-success">done</i>
            <div class="media-body">
              <a href="profile.html">
                {{get_user($value->id_usuario)}}
              </a> {{$value->accion}}
            </div>
            <div class="text-muted">
              {{ \Carbon\Carbon::parse($hoy)->diffForHumans($value->created_at) }}
            </div>
          </div>
        </li>
      @endforeach
    </ul>
  </div>
</div>
</div>
@endsection

@section('script')
  <script src="/assets/js/charts_project.js"></script>


@endsection

<div class="modal fade" id="newCollaboratorModal" tabindex="-1" role="dialog" aria-labelledby="newCollaboratorModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="newCollaboratorModalLabel">Add a new collaborator</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <div class="form-group">
            <label for="collaborator" class="mr-1">Name</label>
            <select class="custom-select form-control" id="collaborator">
              <option selected>None</option>
              <option value="1">Mark Ups</option>
              <option value="2">Karen Smith</option>
              <option value="3">Tara Knows</option>
              <option value="3">John Mix</option>
              <option value="3">Steven Young</option>
            </select>
          </div>
          <div class="form-group">
            <label>Role</label>
            <div class="btn-group-toggle" data-toggle="buttons" id="role">
              <label class="btn btn-primary active">
                <input type="checkbox" checked> Manager
              </label>
              <label class="btn btn-primary">
                <input type="checkbox"> Back-End
              </label>
              <label class="btn btn-primary">
                <input type="checkbox"> Front-End
              </label>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Add collaborator</button>
      </div>
    </div>
  </div>
</div>

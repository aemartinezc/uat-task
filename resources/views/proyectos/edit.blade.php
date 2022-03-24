@extends('layouts.app')
@section('title', 'tareas del proyecto')
@section('main')

    <!-- main content -->
    <div class="container-fluid">
        <!-- <div class="row align-items-center mb-3">
            <div class="col-md-8">
                <h1 class="h2 mb-0">Manage Project</h1>
                <ol class="breadcrumb p-0">
                    <li>
                        <a href="#">Dashboards</a>
                    </li>
                    <li>
                        <a href="projects.html">Projects</a>
                    </li>
                    <li class="text-muted">
                        Project
                    </li>
                </ol>
            </div>
            <div class="col-md-4 text-lg-right">
                <div class="form-group m-0">
                    <div class="input-group input-group--inline">
                        <div class="input-group-addon">
                            <i class="material-icons">search</i>
                        </div>
                        <input class="form-control" name="search" placeholder="Search task, user..." type="text">
                    </div>
                </div>
            </div>
        </div> -->
        <div class="card">
            <div class="card-header">
                <div class="d-flex align-items-center justify-content-between">
                    <h4 class="card-title">
                        Tareas del Proyecto
                    </h4>
                    <a href="/projects/{{$id}}" class="btn btn-sm btn-white">
                    <i class="material-icons md-18 align-middle">replay</i>
                    <small class="align-middle text-uppercase">Regresar</small>
                    </a>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table m-0">
                    <thead>
                        <tr class="bg-fade">
                            <!-- <th style="width: 80px;">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input check-sales" id="saleCheck1">
                                    <label class="custom-control-label align-middle" for="saleCheck1"></label>
                                </div>
                            </th> -->
                            <th>Tarea</th>
                            <th>Descripción</th>
                            <th>Prioridad</th>

                            <!-- <th class="text-center">Watchers</th> -->
                            <th class="text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach ($hitos as $key => $value)
                        <tr>
                            <td class="bg-fade" colspan="7">
                                <strong>{{$value['nombre']}}</strong>
                            </td>
                        </tr>
                          @foreach ($value['tareas'] as $dp)

                          <tr>
                              <td class="align-middle">
                                  <a href="#">{{$dp['tarea']}}</a>
                              </td>
                              <td class="align-middle">
                                  <div class="media">
                                      <div class="media-body">

                                          <div class="text-muted">
                                              {{$dp['descripcion']}}
                                          </div>
                                      </div>
                                  </div>
                              </td>
                              <td class="align-middle">

                                  @if($dp['prioridad'] == 1)
                                  <div class="badge badge-primary">BAJA</div>
                                  @elseif($dp['prioridad'] == 2)
                                  <div class="badge badge-warning">MEDIA</div>
                                  @else
                                  <div class="badge badge-danger">ALTA</div>
                                  @endif


                              </td>
                              <!-- <td class="align-middle">
                                  <div class="progress">
                                      <div class="progress-bar bg-success" role="progressbar" style="width: 68%" aria-valuenow="68" aria-valuemin="0" aria-valuemax="100"></div>
                                  </div>
                              </td> -->

                              <td class="align-middle text-center">
                                  <div class="dropdown show">
                                      <a class="btn btn-white btn-sm" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons md-18 align-middle">more_vert</i>
                                      </a>

                                      <div class="dropdown-menu">
                                          <a class="dropdown-item" href="#">
                                            <i class="material-icons md-14 align-middle">edit</i>
                                            <span class="align-middle">Edit</span>
                                          </a>
                                          <!-- <a class="dropdown-item" href="#">
                                            <i class="material-icons md-14 align-middle">content_copy</i>
                                            <span class="align-middle">Duplicate</span>
                                          </a>
                                          <a class="dropdown-item" href="#">
                                            <i class="material-icons md-14 align-middle">favorite_border</i>
                                            <span class="align-middle">Mark as favourite</span>
                                          </a> -->
                                          <div class="dropdown-divider"></div>
                                          <a class="dropdown-item text-danger" href="#">
                                            <i class="material-icons md-14 align-middle">delete</i>
                                            <span class="align-middle">Delete</span>
                                          </a>
                                      </div>
                                  </div>
                              </td>
                          </tr>
                          @endforeach
                        @endforeach

                    </tbody>
                </table>
            </div>
            <!-- <div class="card-body bg-fade">
                <div class="d-flex align-items-center justify-content-center">
                    <nav aria-label="Page navigation" class="mr-3">
                        <ul class="pagination m-0">
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Previous">
<span aria-hidden="true">&laquo;</span>
<span class="sr-only">Previous</span>
</a>
                            </li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Next">
<span aria-hidden="true">&raquo;</span>
<span class="sr-only">Next</span>
</a>
                            </li>
                        </ul>
                    </nav>
                    <div class="text-muted">1-10 of 200 tasks</div>
                </div>
            </div> -->
        </div>
    </div>


@endsection

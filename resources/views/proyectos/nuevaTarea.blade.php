@extends('layouts.app')
@section('title', 'Añadir nueva Tarea')
@section('main')

<h2>Añadir nuevo grupo</h2>
<ol class="breadcrumb p-0">
    <li>
        <a href="#">Inicio</a>
    </li>
    <li>
        <a href="/projects/{{$id}}/edit">Todos las Tareas</a>
    </li>
    <li class="text-muted">
        Nuevo Tarea
    </li>
</ol>
<br>
<p class="lead">Los campos marcados con <code>(*)</code> son obligatorios</p>

<div class="card">
    <div class="card-header">
        <h4 class="card-title">Por favor, llena correctamente los campos a continuación</h4>
    </div>
    <form class=" needs-validation" novalidate>
    <div class="card-body">
          <div class="form-group row">
              <label for="staticEmail" class="col-sm-2 col-form-label">Nombre </label>
              <div class="col-sm-6">
                  <input type="text" class="form-control" id="nombre" placeholder="Escriba nombre del grupo" value="@isset($tareas) {{ $tareas->tarea }} @endisset" required>
                  <div class="invalid-feedback">
                    Por favor ingrese nombre de la tarea
                  </div>
              </div>
          </div>
          <div class="form-group row">
              <label for="staticEmail" class="col-sm-2 col-form-label">Descripción </label>
              <div class="col-sm-6">
                <textarea id="descripcion" class="form-control" rows="8" cols="80" required>@isset($tareas) {{ $tareas->descripcion }} @endisset</textarea>
                  <div class="invalid-feedback">
                    Por favor ingrese descripción de la tarea
                  </div>
              </div>
          </div>
            <div class="form-group row">
                <label for="inputPassword" class="col-sm-2 col-form-label">Grupo</label>
                <div class="col-sm-6">
                  <select class="form-control multiple" id="grupo" required>
                    @isset($tareas)
                      <option value="{{$tareas->id_grupo}}">{{$tareas->obtenerGrupo->nombre}}</option>
                    @else
                      <option value="">Seleccione</option>
                    @endisset

                    @foreach ($grupos as $key => $value)
                      <option value="{{$value->id}}">{{$value->nombre}}</option>
                    @endforeach
                  </select>
                  <div class="invalid-feedback">
                    Por favor seleccione un proyecto
                  </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword" class="col-sm-2 col-form-label">Hito</label>
                <div class="col-sm-6">
                  <select class="form-control multiple" id="hito" required>
                    @isset($tareas)
                      <option value="{{$tareas->id_hito}}">{{$tareas->obtenerHito->nombre}}</option>
                    @else
                      <option value="">Seleccione</option>
                    @endisset

                    @foreach ($hitos as $key => $value)
                      <option value="{{$value->id}}">{{$value->nombre}}</option>
                    @endforeach
                  </select>
                  <div class="invalid-feedback">
                    Por favor seleccione un proyecto
                  </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword" class="col-sm-2 col-form-label">Prioridad</label>
                <div class="col-sm-6">
                  <select class="form-control multiple" id="prioridad" required>
                    @isset($tareas)

                      <option value="{{$tareas->prioridad}}"><?php
                        if ($tareas->prioridad == 1) {
                          echo 'BAJA';
                        }else if($tareas->prioridad == 2){
                          echo 'MEDIA';
                        }else if($tareas->prioridad == 3){
                          echo 'ALTA';
                        }
                       ?></option>
                    @else
                      <option value="">Seleccione</option>
                    @endisset
                    <option value="1">BAJA</option>
                    <option value="2">MEDIA</option>
                    <option value="3">ALTA</option>
                  </select>
                  <div class="invalid-feedback">
                    Por favor seleccione un proyecto
                  </div>
                </div>
            </div>
          </div>
      <div class="card-footer text-center">
          <a class="btn btn-primary mr-2" onclick="guardar()">Guardar</a>
          <a class="btn btn-secondary" href="/projects/{{$id}}/edit"> Volver</a>
      </div>
    </form>
</div>

<script type="text/javascript">
function guardar(){

var nombre = $('#nombre').val();
var grupo = $('#grupo').val();
var hito = $('#hito').val();
var descripcion = $('#descripcion').val();
var prioridad = $('#prioridad').val();

  var formData = new FormData();
  formData.append('id',{{ $id }});



  @isset($tareas)
  formData.append('id_tarea',{{ $id_tarea }});
  @endisset
  formData.append('nombre', nombre);
  formData.append('grupo', grupo);
  formData.append('hito', hito);
  formData.append('descripcion', descripcion);
  formData.append('prioridad', prioridad);
  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  var form = document.querySelectorAll('.needs-validation')
  //console.log(form)
  // Loop over them and prevent submission
  Array.prototype.slice.call(form)
    .forEach(function (form) {
      form.addEventListener('click', function (event) {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }else{
          ///////////////////////////////////////////////////////7
          $.ajax({

                 type:"POST", //si existe esta variable usuarios se va mandar put sino se manda post

                 url:"{{ ( isset($tareas) ) ? '/projects/update' : '/projects/createTarea' }}", //si existe usuarios manda la ruta de usuarios el id del usario sino va mandar usuarios crear
                 headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')//esto siempre debe ir en los ajax
                 },
                 data: formData,
                 processData: false,
                 contentType: false,
                 cache:false,
                  success:function(data){
                    if (data.success == 'Registro agregado satisfactoriamente') {
                        Swal.fire({
                            title: "",
                            text: data.success,
                            icon: "success",
                            buttonsStyling: false,
                            timer: 1500,
                            showConfirmButton: false,
                        }).then(function(result) {

                            if (result.value == true) {

                            }else{
                              location.href ="/projects/{{$id}}/edit";
                            }
                        })

                    }else if(data.success == 'Ha sido editado con éxito'){

                        Swal.fire({
                            title: "",
                            text: data.success,
                            icon: "success",
                            buttonsStyling: false,
                            timer: 1500,
                            showConfirmButton: false,
                        }).then(function(result) {

                            if (result.value == true) {

                            }else{
                              location.href ="/projects/{{$id}}/edit";
                            }
                        })
                    }



                  }
            });

          /////////////////////////////////////////////////////////
        }

        form.classList.add('was-validated')
      }, false)
    });


}
</script>
@endsection

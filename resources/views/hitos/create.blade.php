@extends('layouts.app')
@section('title', 'Añadir nuevo hito')
@section('main')

<h2>Añadir nuevo hito</h2>
<ol class="breadcrumb p-0">
    <li>
        <a href="#">Inicio</a>
    </li>
    <li>
        <a href="/hitos">Todos los hitos</a>
    </li>
    <li class="text-muted">
        Nuevo hito
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
              <label for="staticEmail" class="col-sm-2 col-form-label">Nombre</label>
              <div class="col-sm-6">
                  <input type="text" class="form-control" id="nombre" placeholder="Escriba nombre del hito" value="@isset($hito) {{ $hito->nombre }} @endisset" required>
                  <div class="invalid-feedback">
                    Por favor ingrese nombre del hito
                  </div>
              </div>
          </div>
            <div class="form-group row">
                <label for="inputPassword" class="col-sm-2 col-form-label">Proyecto</label>
                <div class="col-sm-6">
                  <select class="form-control multiple" id="id_proyecto" required>
                    @isset($hito)
                      <option value="{{$hito->id_proyecto}}">{{$hito->obtenerProyecto->nombre}}</option>
                    @else
                      <option value="">Seleccione</option>
                    @endisset

                    @foreach ($proyectos as $key => $value)
                      <option value="{{$value->id}}">{{$value->nombre}}</option>
                    @endforeach
                  </select>
                  <div class="invalid-feedback">
                    Por favor seleccione un proyecto
                  </div>
                </div>
            </div>
          </div>
      <div class="card-footer text-center">
          <a class="btn btn-primary mr-2" onclick="guardar()">Guardar</a>
          <a class="btn btn-secondary" href="/hitos"> Volver</a>
      </div>
    </form>
</div>

<script type="text/javascript">
function guardar(){

var nombre = $('#nombre').val();
var id_proyecto = $('#id_proyecto').val();


  var formData = new FormData();
   //formData.append('photo', $avatarInput[0].files[0]);

  @isset($hito)
  formData.append('id',{{ $hito->id }});
  @endisset
  formData.append('nombre', nombre);
  formData.append('id_proyecto', id_proyecto);


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

                 url:"{{ ( isset($hito) ) ? '/hitos/update' : '/hitos/create' }}", //si existe usuarios manda la ruta de usuarios el id del usario sino va mandar usuarios crear
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
                              location.href ="/hitos";
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
                              location.href ="/hitos";
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

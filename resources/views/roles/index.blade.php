@extends('layouts.app')
@section('title', 'Roles y Permisos')
@section('estilos')
	<link href="/assets/plugins/custom/datatables/datatables.bundle.css?v=7.0.6" rel="stylesheet" type="text/css"/>
@endsection
@section('main')
	@if ($message = Session::get('success'))
		<div class="alert alert-success">
			<p>{{ $message }}</p>
		</div>
	@endif
  <div class="card card-custom gutter-b">
		<div class="card-header flex-wrap py-3">
			<div class="card-title">
				<h3 class="card-label">
					Roles y permisos
				</h3>
			</div>
			<div class="card-toolbar">
				<!--begin::Dropdown-->				<!--begin::Button-->
				<a href="{{route('roles.create')}}" class="btn btn-primary font-weight-bolder">
					<span class="svg-icon svg-icon-md"><!--begin::Svg Icon | path:assets/media/svg/icons/Design/Flatten.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
						<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
							<rect x="0" y="0" width="24" height="24"/>
							<circle fill="#000000" cx="9" cy="15" r="6"/>
							<path d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z" fill="#000000" opacity="0.3"/>
						</g>
					</svg><!--end::Svg Icon--></span>	Añadir nuevo
				</a>
				<!--end::Button-->
		</div>
		<div class="card-body">
			<!--begin: Datatable-->
			<table class="table table-bordered table-checkable" id="roles">
				<thead>
					<tr>
						<th>ID</th>
						<th>Nombre</th>
						<th>Fecha</th>
						<th>Acciones</th>
					</tr>
				</thead>
			</table>
			<!--end: Datatable-->
		</div>
	</div>
</div>
	<!--end::Card-->
@endsection

  @section('scripts')
  	<script src="/assets/plugins/custom/datatables/datatables.bundle.js?v=7.0.6"></script>

  	<script>
  	$(document).ready(function() {
  	    var table = $('#roles').DataTable({
  	    processing: true,
  	    serverSide: true,
  	    ajax: {
  	      url: "{{ route('roles.index') }}",
  	    },
  	    language: {
  	            "sProcessing":    "Procesando...",
  	            "lengthMenu": "Mostrando _MENU_ registros por página",
  	            "zeroRecords": "No hay registros para mostrar - sorry :(",
  	            "info": "Página _PAGE_ de _PAGES_",
  	            "infoEmpty": "No hay registros disponibles",
  	            "infoFiltered": "(filtrado de _MAX_ registros totales)",
  	            "sSearch":        "Buscar:",
  	            "oPaginate": {
  	                "sFirst":    "Primero",
  	                "sLast":    "Último",
  	                "sNext":    "Siguiente",
  	                "sPrevious": "Anterior"
  	              },
  	            "sLoadingRecords": "Cargando...",
  	        },
  	    columns: [
  	      { data: 'id', name: 'id', visible: false},
  	      { data: 'name', name: 'name'},
          { data: 'fecha', name: 'fecha' },
  	      { data: 'action', name: 'action', orderable: false},
  	    ],
  	    order: []
  	  });

  	});
  	</script>

  @endsection

{{--
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Roles del sistema</h2>
        </div>
        <div class="pull-right">
        @can('role-create')
            <a class="btn btn-success" href="{{ route('roles.create') }}"> Create New Role</a>
            @endcan
        </div>
    </div>
</div>


@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif


<table class="table table-bordered">
  <tr>
     <th>No</th>
     <th>Nombre</th>
     <th width="280px">Acciones</th>
  </tr>
    @foreach ($roles as $key => $role)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $role->name }}</td>
        <td>
            <a class="btn btn-info" href="{{ route('roles.show',$role->id) }}">Show</a>

                <a class="btn btn-primary" href="{{ route('roles.edit',$role->id) }}">Edit</a>
        </td>
    </tr>
    @endforeach
</table>


{!! $roles->render() !!}

@endsection --}}

@extends('layouts.app')
@section('title', 'Usuarios')
@section('main')
	<!--begin::Card-->
	@if ($message = Session::get('success'))
		<div class="alert alert-success">
			<p>{{ $message }}</p>
		</div>
	@endif
	<h2>Usuarios</h2>
	<hr>
	<div class="card">
		<div class="card-header">
			<h4 class="card-title">
				Listado de usuarios
			</h4>
			<div class="text-right">
				<a href="{{route('users.create')}}" type="button" class="btn btn-primary btn-sm">Añadir nuevo</a>
			</div>
		</div>
		<div class="py-4">
			<div class="table-responsive">
				<table class="table table-bordered table-checkable" id="usuarios">
					<thead>
						<tr>
							<th>ID</th>
							<th>Nombre</th>
							<th>Correo</th>
							<th>Fecha</th>
						</tr>
					</thead>
				</table>
			</div>
		</div>
	</div>
	@endsection

	@section('script')
		<script src="assets/vendor/jquery.dataTables.js"></script>
		<script src="assets/vendor/dataTables.bootstrap4.js"></script>
		<script>
		$(document).ready(function() {
		    var table = $('#usuarios').DataTable({
		    processing: true,
		    serverSide: true,
		    ajax: {
		      url: "{{ route('users.index') }}",
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
		      { data: 'id', name: 'id'},
		      { data: 'name', name: 'name'},
		      { data: 'email', name: 'email' },
		      { data: 'created_at', name: 'created_at' },
		    ],
		    order: []
		  });

		});
		</script>

	@endsection

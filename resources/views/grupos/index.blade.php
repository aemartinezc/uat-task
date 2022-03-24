@extends('layouts.app')
@section('title', 'Grupos')
@section('main')

	<h2>Grupos</h2>
	<ol class="breadcrumb p-0">
	    <li>
	        <a href="#">Inicio</a>
	    </li>
	    <li class="text-muted">
	        Todos los grupos
	    </li>
	</ol>
	<br>
	<hr>
	<div class="card">
		<div class="card-header">
			<h4 class="card-title">
				Listado de grupos
			</h4>
			<div class="text-right">
				<a href="/grupos/create" type="button" class="btn btn-primary btn-sm">Añadir nuevo</a>
			</div>
		</div>
		<div class="py-4">
			<div class="table-responsive">
				<table class="table table-bordered table-checkable" id="grupos">
					<thead>
						<tr>
							<th>Nombre</th>
							<th>Proyecto</th>
							<th>Acciones</th>
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
		var table = '';
		$(document).ready(function() {
		    table = $('#grupos').DataTable({
		    processing: true,
		    serverSide: true,
		    ajax: {
		      url: "/grupos",
		    },
		    language: { url: "https://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json" },
		    columns: [
		      { data: 'nombre', name: 'nombre'},
		      { data: 'id_proyecto', name: 'id_proyecto'},
					{ data: 'acciones', name: 'acciones', searchable: false, orderable:false, width: '60px', class: 'acciones' }
		    ],
				createdRow: function ( row, data, index ) {
		        $(row).find('.ui.dropdown.acciones').dropdown();
		      },
		    order: []
		  });

		});

		function eliminar(id){
				//console.log(id);
				var id_user = id;
				Swal.fire({
							title: "¿Estas seguro?",
							text: "No podrás revertir esto!",
							icon: "warning",
							showCancelButton: true,
							confirmButtonText: "Si, bórralo!"
					}).then(function(result) {
							if (result.value) {

								$.ajax({

									 type:"Delete",

									 url:"/grupos/borrar",
									 headers: {
										'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
									 },
									 data:{
									id_user:id_user,
									 },

										success:function(data){
											Swal.fire("Excelente!", data.success, "success").then(function(){ table.ajax.reload(); });

										}


								});


							}
					})
				}
		</script>

	@endsection

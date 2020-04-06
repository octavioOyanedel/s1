<div>

	<div class="table-responsive">
		<table class="table table-striped table-hover table-sm">
			<thead>
				<tr>
					<th></th>
	                <th></th>
	                <th></th>
					@foreach (obtenerCabederasTablas($tabla) as $nombre => $clase)
						<th class="{{ $clase }}"><b>{{ $nombre }}</b></th>
					@endforeach
				</tr>
			</thead>
			<tbody>
				@foreach ($coleccion as $item)
					<tr>
						<td class="text-center"><a title="Ver" class="p-2 text-primary" href=""><i class="fas fa-eye"></i></a></td>
						<td class="text-center"><a title="Editar" class="p-2 text-warning" href=""><i class="fas fa-pen"></i></a></td>
						<td class="text-center"><a title="Eliminar" class="p-2 text-danger" href=""><i class="fas fa-trash"></i></a></td>
						@include(obtenerRutaContenidoTabla($tabla))
					</tr>
				@endforeach				
			</tbody>
		</table>
	</div>
		<!-- Paginación -->
	<div class="paginacion">
		{{ $coleccion->links() }}			
	</div>

</div>
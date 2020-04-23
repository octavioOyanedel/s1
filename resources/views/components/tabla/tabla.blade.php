<div>
	<div class="table-responsive">
		<table class="table table-striped table-hover table-sm">
			<thead>
				<tr>
					<th></th>
	                <th></th>
	                <th></th>
					@switch($tabla)
					    @case('prestamos')
			                <th></th>

					        @break
					@endswitch
					@foreach (obtenerCabederasTablas($tabla) as $nombre => $clase)
						<th class="{{ $clase }}"><b>{{ $nombre }}</b></th>
					@endforeach
				</tr>
			</thead>
			<tbody>
				@foreach ($coleccion as $item)
					<tr>
						<td class="text-center"><a title="Ver" class="p-2 text-primary" href="{{ route($ver, $item->id) }}"><i class="fas fa-eye"></i></a></td>
						<td class="text-center"><a title="Editar" class="p-2 text-warning" href="{{ route($editar, $item->id) }}"><i class="fas fa-pen"></i></a></td>
						<td class="text-center"><a title="Eliminar" class="p-2 text-danger" href="{{ route($eliminar, $item->id) }}"><i class="fas fa-trash"></i></a></td>
						@switch($tabla)
						    @case('prestamos')
						    	<td class="text-center">
							    	@if ($item->metodo_id === 2 && $item->estado_id === 2)
										<a title="Abonar" class="p-2 text-success" href="{{ route($abonar, ['id'=>$item->id]) }}"><i class="fas fa-money-bill-alt"></i></a>
							    	@endif
						    	</td>
						        @break
						@endswitch						
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
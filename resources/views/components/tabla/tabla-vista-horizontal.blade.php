<div>
	<div class="table-responsive">
		<table class="table table-striped table-hover table-sm">
			<thead>
				<tr>
					@foreach (obtenerCabederasTablasVistas($tabla) as $cabecera => $nombre)
						@if ($cabecera === 'N° Cuota')
							<th class="text-center ancho-columna"><b>{{ $cabecera }}</b></th>
						@else
							<th class="text-center"><b>{{ $cabecera }}</b></th>
						@endif						
					@endforeach		
				</tr>			
			</thead>
			<tbody>
				@foreach ($coleccion as $index => $cuota)
					@include(obtenerRutaContenidoTabla($tabla))
				@endforeach	
				<tr>
					<th class="text-right" colspan="2"><b>Total</b></th>
					<td class="text-center">{{ $total }}</td>
				</tr>										
			</tbody>
		</table>
	</div>
</div>
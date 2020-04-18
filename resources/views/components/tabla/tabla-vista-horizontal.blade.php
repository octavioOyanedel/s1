<div>
	<div class="table-responsive">
		<table class="table table-striped table-hover table-sm">
			<thead>
				<tr>
					@foreach (obtenerCabederasTablasVistas($tabla) as $cabecera => $nombre)
						<th class="text-center"><b>{{ $cabecera }}</b></th>
					@endforeach		
				</tr>			
			</thead>
			<tbody>
				@foreach ($coleccion as $index => $cuota)
					@include(obtenerRutaContenidoTabla($tabla))
				@endforeach						
			</tbody>
		</table>
	</div>
</div>
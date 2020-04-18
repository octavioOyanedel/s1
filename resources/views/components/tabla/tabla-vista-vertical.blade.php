<div>
	<div class="table-responsive">
		<table class="table table-striped table-hover table-sm">
			<thead></thead>
			<tbody>
				@foreach (obtenerCabederasTablasVistas($tabla) as $cabecera => $nombre)
					@include(obtenerRutaContenidoTabla($tabla))
				@endforeach								
			</tbody>
		</table>
	</div>
</div>
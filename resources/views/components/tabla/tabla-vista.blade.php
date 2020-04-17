<div>
	<div class="table-responsive">
		<table class="table table-striped table-hover table-sm">
			<thead></thead>
			<tbody>
				@foreach (obtenerCabederasTablasVistas($tabla) as $cabecera => $nombre)
					@if ($tabla === 'prestamo')
						<tr>
							<th>{{ $cabecera }}</th>
							<td>{{ $coleccion[$nombre] }}</td>
						</tr>
					@endif
					@if ($tabla === 'cuota')
						@php $index = 0; @endphp
						<tr>
							<th>{{ $cabecera }}</th>
							<td>{{ $coleccion[$index] }}</td>
						</tr>
					@endif
				@endforeach				
			</tbody>
		</table>
	</div>
</div>
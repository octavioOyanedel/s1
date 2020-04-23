<p class="h6 mb-4 mt-4"><b>Resumen Préstamo</b></p>
<div>
	<div class="table-responsive">
		<table class="table table-striped table-hover table-sm">
			<thead></thead>
			<tbody>
				<tr>
					<th><b>Nombre</b></th>
					<td>{{ $socio->nombre1 }} {{ $socio->nombre2 }} {{ $socio->apellido1 }} {{ $socio->apellido2 }}</td>				
				</tr>	
				<tr>
					<th><b>Rut</b></th>
					<td>{{ $socio->rut }}</td>					
				</tr>
				<tr>
					<th><b>Fecha Solicitud</b></th>
					<td>{{ $prestamo->fecha }}</td>						
				</tr>				
				<tr>
					<th><b>N° Egreso</b></th>
					<td>{{ $prestamo->registro }}</td>						
				</tr>
				<tr>
					<th><b>Cheque</b></th>
					<td>{{ $prestamo->cheque }}</td>					
				</tr>
				<tr>
					<th><b>Monto</b></th>
					<td>{{ $prestamo->monto }}</td>						
				</tr>					
			</tbody>
		</table>
	</div>
</div>
<p class="h6 mb-4 mt-4"><b>Abonos</b></p>
@if ($prestamo->sumarAbonos($prestamo) > 0)
	<div>
		<div class="table-responsive">
			<table class="table table-striped table-hover table-sm">
				<thead>
					<tr>
						<th class=""><b>Fecha</b></th>	
						<th class="text-center"><b>Monto</b></th>
					</tr>			
				</thead>
				<tbody>
					@foreach ($abonos as $abono)
						<tr>
							<td class="">{{ $abono->fecha }}</td>						
							<td class="text-center">{{ $abono->monto }}</td>
						</tr>
					@endforeach	
					<tr>
						<td class="text-right"><b>Total</b></td>
						<td class="text-center"><b>{{ $prestamo->sumarAbonos($prestamo) }}</b></td>
					</tr>
					<tr>
						<td class="text-right"><b>Por Pagar</b></td>
						<td class="text-center"><b>{{ $prestamo->monto - $prestamo->sumarAbonos($prestamo) }}</b></td>
					</tr>															
				</tbody>
			</table>
		</div>
	</div>
@else
	<div class="alert alert-warning text-center" role="alert">
	    <i class="fas fa-exclamation-triangle"></i>&nbsp;&nbsp;&nbsp;&nbsp;Préstamo sin abonos.
	</div>
@endif

<p class="h6 mb-4 mt-4"><b>Abonar</b></p>
<tr>
	<th><b>{{ $cabecera }}</b></th>
	@if ($nombre === 'nombre')
		<td>{{ $coleccion['nombre1'].' '.$coleccion['nombre2'].' '.$coleccion['apellido1'].' '.$coleccion['apellido2'] }}</td>	
	@else
		<td>{{ $coleccion[$nombre] }}</td>	
	@endif		
</tr>
<tr>
	<th class="ancho-columna"><b>{{ $cabecera }}</b></th>

	@switch($nombre)
	@case('interes_id')
    	<td>{{ $coleccion->renta->valor }}</td>
    @break
	@case('fecha_pago')
	    @if ($coleccion[$nombre] === null)
	    	<td title="No Aplica">N/A</td>	
	    @else
			<td>{{ $coleccion[$nombre] }}</td>
	    @endif
    @break
	@case('cuotas')
	    @if ($coleccion[$nombre] === null)
	    	<td title="No Aplica">N/A</td>	
	    @else
			<td>{{ $coleccion[$nombre] }}</td>
	    @endif
    @break
	@case('total')
    	<td>{{ $total }}</td>
    @break    
	@default
	    <td>{{ $coleccion[$nombre] }}</td>	
	@endswitch		

</tr>
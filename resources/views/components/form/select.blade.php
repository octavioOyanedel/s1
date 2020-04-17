<div>
	<!-- label obligatorio -->
	@error($nombre)
	    <div class="error-login alert alert-danger alerta-forms" role="alert">
	        {{ $message }}
	    </div>
	@else
		@if($label != 'no' && $obligatorio === 'si')
			<label for="{{ $id }}">{{ $label }} <span title="Campo obligatorio.">*</span></label>
		@else
			<label for="{{ $id }}">{{ $label }}</label>
		@endif	   
	@enderror
	<!-- Select -->
	<select name="{{ $nombre }}" id="{{ $id }}" class="browser-default custom-select margen-abajo {{ $tamano }}" @if ($obligatorio === 'si') required="required" @endif>
		<option value="" selected>...</option>

		@if ($excepcion === 'genero') <!-- Carga de generos -->
			@if ($keyObjeto != '')
					<option value="Dama" {{ estaSelected(obtenerObjeto($objetos, $keyObjeto)[$nombre], 'Dama') }}>Dama</option>
					<option value="Varón" {{ estaSelected(obtenerObjeto($objetos, $keyObjeto)[$nombre], 'Varón') }}>Varón</option>
			@else
				<option value="Dama" {{ estaSelected(old($nombre), 'Dama') }}>Dama</option>
				<option value="Varón" {{ estaSelected(old($nombre), 'Varón') }}>Varón</option>
			@endif
		@elseif ($excepcion === 'cuotas') <!-- Carga de cuotas -->

			@if ($keyObjeto === '' && old($nombre) === null)
				<!-- carga normal sin old o editar -->
				@for ($i = 1; $i <= 24; $i++)
                    <option value="{{ $i }}">{{ $i }}</option>
                @endfor
			@endif
			@if (old($nombre) != null)
				<!-- carga old -->
				<option value="{{ $i }}" {{ estaSelected(old($nombre), $i) }}>{{ $i }}</option> 
			@endif
			@if ($keyObjeto != '' && old($nombre) === null)
				<!-- carga editar -->
				<option value="{{ $i }}" {{ estaSelected($i, obtenerObjeto($objetos, $keyObjeto)[$nombre]) }}>{{ $i }}</option>
			@endif			

		@else
			@foreach (obtenerColeccion($colecciones, $keyColeccion) as $item) <!-- Carga de otros selects -->
				@if ($keyObjeto === '' && old($nombre) === null)
					<!-- carga normal sin old o editar -->
					<option value="{{ $item->id }}">{{ obtenerNombreRegistro($item, $nombre) }}</option>
				@endif
				@if (old($nombre) != null)
					<!-- carga old -->
					<option value="{{ $item->id }}" {{ estaSelected(old($nombre), $item->id) }}>{{ obtenerNombreRegistro($item, $nombre) }}</option>
				@endif
				@if ($keyObjeto != '' && old($nombre) === null)
					<!-- carga editar -->
					<option value="{{ $item->id }}" {{ estaSelected($item->id, obtenerObjeto($objetos, $keyObjeto)[$nombre]) }}>{{ obtenerNombreRegistro($item, $nombre) }}</option>
				@endif				
			@endforeach				
		@endif	
	</select>	
</div>
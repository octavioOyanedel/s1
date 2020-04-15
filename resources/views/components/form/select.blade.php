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

		@if ($excepcion === 'genero')
			@if ($keyObjeto != '')
					<option value="Dama" {{ estaSelected(obtenerObjeto($objetos, $keyObjeto)[$nombre], 'Dama') }}>Dama</option>
					<option value="Varón" {{ estaSelected(obtenerObjeto($objetos, $keyObjeto)[$nombre], 'Varón') }}>Varón</option>
			@else
				<option value="Dama" {{ estaSelected(old($nombre), 'Dama') }}>Dama</option>
				<option value="Varón" {{ estaSelected(old($nombre), 'Varón') }}>Varón</option>
			@endif
		@else
			@foreach (obtenerColeccion($colecciones, $keyColeccion) as $item)
				@if ($keyObjeto === '' && old($nombre) === null)
					<!-- carga normal sin old o editar -->
					<option value="{{ $item->id }}">{{ $item->nombre }}</option>
				@endif
				@if (old($nombre) != null)
					<!-- carga old -->
					<option value="{{ $item->id }}" {{ estaSelected(old($nombre), $item->id) }}>{{ $item->nombre }}</option>
				@endif
				@if ($keyObjeto != '' && old($nombre) === null)
					<!-- carga editar -->
					<option value="{{ $item->id }}" {{ estaSelected($item->id, obtenerObjeto($objetos, $keyObjeto)[$nombre]) }}>{{ $item->nombre }}</option>
				@endif				
			@endforeach				
		@endif	
	</select>	
</div>
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
	<select name="{{ $nombre }}" id="{{ $id }}" class="browser-default custom-select {{ $tamano }}">
		<option selected>...</option>
		@foreach (obtenerColeccion($colecciones, $keyColeccion) as $item)
			
			@if ($keyObjeto === '' && old($nombre) === null)
				<!-- carga normal sin old o editar -->
				<option value="{{ $item->id }}">{{ $item->nombre }}</option>
			@else
				@if (old($nombre) != null)
					<!-- carga old -->
					<option value="{{ $item->id }}" {{ estaSelected(old($nombre), obtenerObjeto($objetos, $keyObjeto)->id) }}>{{ $item->nombre }}</option>
				@else
					<!-- carga editar -->
					<option value="{{ $item->id }}" {{ estaSelected($item->id, obtenerObjeto($objetos, $keyObjeto)->id) }}>{{ $item->nombre }}</option>
				@endif
			@endif	

		@endforeach			
	</select>	
</div>





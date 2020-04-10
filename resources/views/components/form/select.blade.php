<div>
	@if($label != 'no')
		@if($obligatorio === 'si')
			<label for="{{ $id }}">{{ $label }} <span title="Campo obligatorio.">*</span></label>
		@else
			<label for="{{ $id }}">{{ $label }}</label>
		@endif
	@endif	
	<select name="{{ $nombre }}" id="{{ $id }}" class="browser-default custom-select {{ $tamano }}">
		<option selected>...</option>
		@foreach (obtenerColeccion($colecciones, $keyColeccion) as $item)
			<option value="{{ $item->id }}">{{ $item->nombre }}</option>
		@endforeach
	</select>	
</div>
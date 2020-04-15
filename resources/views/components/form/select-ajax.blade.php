<div>
	<!-- Select hijo -->
	<label for="{{ $id }}">{{ $label }}</label>			
	<select name="{{ $nombre }}" id="{{ $id }}" class="browser-default custom-select custom-select-sm margen-abajo" @if ($obligatorio === 'si') required="required" @endif>
		<option value="" selected>...</option>

	</select>
	<input type="hidden" id="{{ $idOld }}" value="{{ old($nombre) }}">
</div>
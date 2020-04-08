<div>
	<input type="{{ $tipo }}" name="{{ $nombre }}" id="{{ $id }}" class="form-control {{ $margen }} {{ $tamano }} @error($nombre) is-invalid @enderror" placeholder="{{ $placeholder }}" value="{{ old($nombre) }}" @if ($obligatorio === 'si') required @endif />
</div>
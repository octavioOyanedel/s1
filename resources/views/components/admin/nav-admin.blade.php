<div>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
        	<li class="breadcrumb-item" title="Mantenedor"><i class="text-primary fas fa-cog"></i></li>
			@foreach (obtenerEnlacesAdmin($enlaces) as $nombre => $ruta)
				<li class="breadcrumb-item"><a href="{{ route($ruta) }}">{{ $nombre }}</a></li> 
			@endforeach
        </ol>

		<!-- Botón agregar -->
		<form method="GET" action="{{ route($enlaceBoton) }}">
			<button type="submit" title="Agregar {{ $nombreBoton }}" class="boton-agregar float-right btn btn-default btn-sm"><i class="fas fa-plus"></i></button>
		</form>
		

    </nav>
</div>
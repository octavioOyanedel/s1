<div>
	<form method="GET" action="{{ route('home') }}">
		<div class="contenedor-filtro mb-2">
			<div class="exportar">
				<a class="registros-excel text-success" title="Exportar a planilla excel" href=""><b><i class="excel fas fa-file-excel"></i> Exportar {{ $total }} Registros.</b></a>
			</div>

			<div class="cantidad">
				<select id="cantidad" class="custom-select custom-select-sm" name="cantidad">
					<option selected>Cant.</option>
					@foreach (obtenerCantidadesFiltro($filtro) as $valor)
						<option value="{{ $valor }}">{{ $valor }}</option>  
					@endforeach
				</select>	
			</div>
			<div class="campo">
				<select id="columna" class="custom-select custom-select-sm" name="columna">
					<option selected>Columna</option>
					@foreach (obtenerCamposParaFiltro($filtro) as $nombre => $valor)
						<option value="{{ $valor }}">{{ $nombre }}</option>  
					@endforeach
				</select>		
			</div>
			<div class="orden">
				<select id="orden" class="custom-select custom-select-sm" name="orden">
					<option selected>Orden</option>
					<option value="ASC">Asc.</option>
					<option value="DESC">Desc.</option>
				</select>		
			</div>
			<div class="boton"><button class="btn btn-sm btn-primary">Filtar</button></div>
			<!-- Complementar filtrado -->
			<input class="form-control" type="hidden" name="campo" value="{{ Request()->campo }}"> 
			<input class="form-control" type="hidden" name="page" value="{{ Request()->page }}"> 
		</div>
	</form>
</div>
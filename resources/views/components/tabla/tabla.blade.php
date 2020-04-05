<div>
	<p class="h4 mb-2">{{ strtoupper($titulo) }} <a class="text-success float-right" href=""><i title="Exportar a planilla Excel." class="align-middle excel fas fa-file-excel"></i></a></p>
	<span><b>8777</b> Socios registrados.</span>

	<form class="mt-4 mb-4" method="GET" action="">
		<div class="form-row">
			<div class="col-md-3 col-sm-12">
				<select id="cantidad" class="custom-select custom-select-sm mb-2" name="cantidad">
					<option selected>Cantidad</option>
					<option value="10">10</option>
					<option value="20">20</option>
					<option value="50">50</option>
					<option value="100">100</option>
				</select>
			</div>
			<div class="col-md-3 col-sm-12">
				<select id="columna" class="custom-select custom-select-sm mb-2" name="columna">
					<option selected>Columna</option>
					<!-- Campos de filtro -->


				</select>
			</div>
			<div class="col-md-3 col-sm-12">
				<select id="orden" class="custom-select custom-select-sm mb-2" name="orden">
					<option selected>Orden</option>
					<option value="ASC">Ascendente</option>
					<option value="DESC">Descendente</option>
				</select>
			</div>  
			<div class="col-md-3 col-sm-12">
				<!-- Last name -->
				<button id="filtro" type="submit" class="btn btn-sm btn-block btn-blue mb-2 mt-0 mr-0 filtro">Filtrar</button>
			</div>       
		</div>

		<!-- Complemento filtro -->
		<input class="form-control" type="hidden" name="campo" value="">    
		<input class="form-control" type="hidden" name="page" value="">    
	</form> 

	<div class="table-responsive">
		<table class="table table-striped table-hover table-sm">
			<thead>
				<tr>
					<th></th>
	                <th></th>
	                <th></th>
	                <th><b>Nombre</b></th>
	                <th class="text-center"><b>Género</b></th>
	                <th class="text-center"><b>Rut</b></th>
	                <th class="text-center"><b>Fecha Ingreso Sind1</b></th>
	                <th><b>Número Socio</b></th>
	                <th><b>Correo</b></th>
	                <th class="text-center"><b>Anexo</b></th>
	                <th class="text-center"><b>Celular</b></th>
	                <th><b>Sede</b></th>
	                <th><b>Área</b></th>
	                <th><b>Cargo</b></th>
				</tr>
			</thead>
			<tbody>
				@foreach ($socios as $socio)
					<tr>
						<td class="text-center"><a title="Ver" class="p-2 text-primary" href=""><i class="fas fa-eye"></i></a></td>
						<td class="text-center"><a title="Editar" class="p-2 text-warning" href=""><i class="fas fa-pen"></i></a></td>
						<td class="text-center"><a title="Eliminar" class="p-2 text-danger" href=""><i class="fas fa-trash"></i></a></td>
						<td>{{ $socio->apellido1 }} {{ $socio->apellido2 }} {{ $socio->nombre1 }} {{ $socio->nombre2 }}</td>
						<td class="text-center">{{ $socio->genero }}</td>
						<td class="text-center">{{ $socio->rut }}</td>
						<td class="text-center">{{ $socio->fecha_sind1 }}</td>
						<td class="text-center">{{ $socio->numero }}</td>
						<td>{{ $socio->correo }}</td>
						<td class="text-center">{{ $socio->anexo }}</td>
						<td class="text-center">{{ $socio->celular }}</td>
						<td>{{ $socio->sede_id }}</td>
						<td>{{ $socio->area_id }}</td>
						<td>{{ $socio->cargo_id }}</td>
					</tr>
				@endforeach				
			</tbody>
		</table>

	</div>

	<!-- Paginación -->
	<div class="paginacion">
		{{ $socios->links() }}			
	</div>
	
</div>
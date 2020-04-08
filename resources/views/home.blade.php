@extends('layouts.app')

@section('content')
<div class="ml-4 mr-4">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <p class="text-center h4 mb-4 mt-4"><b>Listado Socios</b></p>

			@if ($total > 0 && $total_consulta > 0)
	            <x-filtro filtro="socios" :total="$total_consulta"/>
	            <!-- Tabla listar socios -->
	            <x-tabla :coleccion="$coleccion" tabla="socios" />
	            <!-- Tabla listar socios -->
            @else
				<div class="alert alert-warning text-center" role="alert">
					<i class="fas fa-exclamation-triangle"></i> No existen registros.
				</div>
            @endif
            
        </div>
    </div>
</div>
@endsection

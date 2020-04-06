@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <p class="text-center h4 mb-4 mt-4"><b>LISTADO SOCIOS</b></p>

			@if ($total > 0)
	            <x-filtro filtro="socios" :total="$total"/>
	            <!-- Tabla listar socios -->
	            <x-tabla :coleccion="$coleccion" tabla="socios" />
	            <!-- Tabla listar socios -->
            @else
				<div class="alert alert-warning text-center" role="alert">
					<i class="fas fa-exclamation-triangle"></i> No existen registros almacenados para este módulo.
				</div>
            @endif
            
        </div>
    </div>
</div>
@endsection

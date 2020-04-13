@extends('layouts.app')

@section('content')
<div class="ml-4 mr-4">
    <div class="row justify-content-center">
        <div class="col-md-12">
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item"><a href="#">Library</a></li>
    <li class="breadcrumb-item active">Data</li>
  </ol>
</nav>
            <p class="text-center h4 mb-4 mt-4"><b>Listado Socios</b></p>

			@if ($total > 0 && $total_consulta > 0)
	            <x-filtro action="home" filtro="socios" :total="$total_consulta"/>
	            <!-- Tabla listar socios -->
	            <x-tabla :coleccion="$coleccion" tabla="socios" />
	            <!-- Tabla listar socios -->
            @else
				<div class="alert alert-warning text-center" role="alert">
					<i class="fas fa-exclamation-triangle"></i>&nbsp;&nbsp;&nbsp;&nbsp;No existen registros.
				</div>
            @endif
            
        </div>
    </div>
</div>
@endsection

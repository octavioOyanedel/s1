@extends('layouts.app')

@section('content')
<div class="ml-4 mr-4">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <!-- Administración módulo -->
            <x-nav-admin enlaces="socios" nombreBoton="Socio" enlaceBoton="socios.create"/>
           
            <p class="h4 mb-4 mt-4"><b>Listado Socios</b></p>

			@if ($total > 0 && $total_consulta > 0)
	            <x-filtro action="home" filtro="socios" :total="$total_consulta"/>
	            <!-- Tabla listar socios -->
	            <x-tabla :coleccion="$coleccion" tabla="socios" ver="home" editar="socios.edit" eliminar="home" abonar="" estado=""/>
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

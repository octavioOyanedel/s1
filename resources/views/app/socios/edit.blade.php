@extends('layouts.app')

@section('content')
    <div class="contenedor-editar">

    <!-- Contenedor formulario -->
        <div></div>
        <div>
            <!-- Default form editar usuario -->
			<x-form tipo="editar" :objetos="$objetos" modulo="socio" :colecciones="$colecciones" alineacion="" metodo="post" action="socio_update" csrf="put" titulo="Editar Socio" contenido="editar_socio" />
            <!-- Default form editar usuario -->
        </div>
        <div></div>
        
    </div>
@endsection
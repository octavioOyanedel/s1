@extends('layouts.app')

@section('content')
    <div class="contenedor-editar">

    <!-- Contenedor formulario -->
        <div></div>
        <div>
            <!-- Default form editar prestamo -->
			<x-form tipo="editar" :objetos="$objetos" modulo="prestamo" :colecciones="$colecciones" alineacion="" metodo="post" action="prestamo_update" csrf="put" titulo="Editar Préstamo" contenido="editar_prestamo" />
            <!-- Default form editar prestamo -->
        </div>
        <div></div>
        
    </div>
@endsection
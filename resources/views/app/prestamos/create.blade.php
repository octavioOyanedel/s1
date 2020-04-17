@extends('layouts.app')

@section('content')
    <div class="contenedor-editar">

    <!-- Contenedor formulario -->
        <div></div>
        <div>
            <!-- Default form crear usuario -->
			<x-form tipo="" objetos="" modulo="" :colecciones="$colecciones" alineacion="" metodo="post" action="crear_prestamo" csrf="post" titulo="Solicitar Préstamo" contenido="crear_prestamo" />
            <!-- Default form crear usuario -->
        </div>
        <div></div>
        
    </div>
@endsection
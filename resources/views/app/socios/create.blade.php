@extends('layouts.app')

@section('content')
    <div class="contenedor-editar">

    <!-- Contenedor formulario -->
        <div></div>
        <div>
            <!-- Default form crear socio -->
			<x-form tipo="" objetos="" modulo="" :colecciones="$colecciones" alineacion="" metodo="post" action="crear_socio" csrf="post" titulo="Incorporar Socio" contenido="crear_socio" />
            <!-- Default form crear socio -->
        </div>
        <div></div>
        
    </div>
@endsection
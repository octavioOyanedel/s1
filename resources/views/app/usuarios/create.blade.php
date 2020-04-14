@extends('layouts.app')

@section('content')
    <div class="contenedor-editar">

    <!-- Contenedor formulario -->
        <div></div>
        <div>
            <!-- Default form crear usuario -->
			<x-form tipo="" objetos="" modulo="" :colecciones="$colecciones" alineacion="" metodo="post" action="crear_usuario" csrf="post" titulo="Crear Usuario" contenido="crear_usuario" />
            <!-- Default form crear usuario -->
        </div>
        <div></div>
        
    </div>
@endsection
@extends('layouts.app')

@section('content')
    <div class="contenedor-editar">

    <!-- Contenedor formulario -->
        <div></div>
        <div>
            <!-- Default form editar usuario -->
			<x-form tipo="" objetos="" modulo="usuario" :colecciones="$colecciones" alineacion="" metodo="post" action="crear_usuario" csrf="post" titulo="Crear Usuario" contenido="crear_usuario" />
            <!-- Default form editar usuario -->
        </div>
        <div></div>
        
    </div>
@endsection
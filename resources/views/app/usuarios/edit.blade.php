@extends('layouts.app')

@section('content')
    <div class="contenedor-editar">

    <!-- Contenedor formulario -->
        <div></div>
        <div>
            <!-- Default form editar usuario -->
			<x-form :objetos="$objetos" :colecciones="$colecciones" alineacion="" metodo="post" action="user_update" csrf="put" titulo="Editar Usuario" contenido="editar_usuario" />
            <!-- Default form editar usuario -->
        </div>
        <div></div>
        
    </div>
@endsection
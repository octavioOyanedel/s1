@extends('layouts.app')

@section('content')

    <div class="contenedor-editar">

    <!-- Contenedor formulario -->
        <div></div>
        <div>
            <!-- Default form editar usuario -->
			<x-form tipo="" objetos="" modulo="usuario" colecciones="" alineacion="" metodo="post" action="password_update" csrf="put" titulo="Cambiar Contraseña" contenido="cambiar_contraseña" />
            <!-- Default form editar usuario -->
        </div>
        <div></div>
        
    </div>
@endsection
@extends('layouts.app')

@section('content')
    <div class="contenedor-reset">

    <!-- Contenedor formulario -->
        <div></div>
        <div>
            <!-- Default form reset -->
            <x-form colecciones="" objetos="" alineacion="text-center" metodo="post" action="reset" csrf="post" titulo="Recuperar Contraseña" contenido="reset" />
            <!-- Default form reset -->
        </div>
        <div></div>
        
    </div>
@endsection

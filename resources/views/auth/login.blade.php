@extends('layouts.app')

@section('content')
    <div class="contenedor-login">

    <!-- Contenedor formulario -->
        <div></div>
        <div>
            <!-- Default form login -->
            <x-form colecciones="" objetos="" alineacion="text-center" metodo="post" action="login" csrf="post" titulo="Iniciar Sesión" contenido="login" />
            <!-- Default form login -->
        </div>
        <div></div>
        
    </div>
@endsection

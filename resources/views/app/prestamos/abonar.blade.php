@extends('layouts.app')

@section('content')
    <div class="contenedor-editar">

    <!-- Contenedor formulario -->
        <div></div>
        <div>
            <!-- Default form abonar -->
			<x-form tipo="" objetos="" modulo="" colecciones="" alineacion="" metodo="post" action="abonar" csrf="post" titulo="Abonar Monto" contenido="abonar" />
            <!-- Default form abonar -->
        </div>
        <div></div>
        
    </div>
@endsection
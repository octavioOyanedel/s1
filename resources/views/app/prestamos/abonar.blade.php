@extends('layouts.app')

@section('content')
    <div class="contenedor-editar">

        <!-- Contenedor formulario -->
        <div></div>
        <div>
            <!-- Default form abonar -->
    		<x-form tipo="editar" :objetos="$objetos" modulo="prestamo" :colecciones="$colecciones" alineacion="" metodo="post" action="abonar" csrf="post" titulo="Abonar Monto" contenido="abono" />
            <!-- Default form abonar -->
        </div>
        <div></div>
        
    </div>
@endsection
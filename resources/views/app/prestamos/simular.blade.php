@extends('layouts.app')

@section('content')
<div class="ml-4 mr-4">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <!-- Administración módulo -->

            <p class="h4 mb-4 mt-4"><b>Simulación Préstamo</b></p>

			<p class="h6 mb-4 mt-4"><b>Socio</b></p>
			<x-tabla-vista-vertical tabla="socio_prestamo" :coleccion="$socio" :total="$total"/>

			<p class="h6 mb-4 mt-4"><b>Préstamo</b></p>
        	<x-tabla-vista-vertical tabla="prestamo_vista_v" :coleccion="$prestamo" :total="$total"/>

        	@if ($cuotas != null)
        		<p class="h6 mb-4 mt-4"><b>Cuotas</b></p>
        		<x-tabla-vista-horizontal tabla="prestamo_vista_h" :coleccion="$cuotas" :total="$total"/>
        	@endif
        	
        	<!-- Formulario oculto envío de préstamo y cuotas  -->
            @include('layouts.inc.form.prestamo.simular')
            
        </div>
    </div>
</div>
@endsection
@extends('layouts.app')

@section('content')
<div class="ml-4 mr-4">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <!-- Administración módulo -->
    
            <p class="h4 mb-4 mt-4"><b>Simulación Préstamo</b></p>
			       
        	<x-tabla-vista tabla="prestamo" :coleccion="$prestamo"/>
        	@if ($cuotas != null)
        		<x-tabla-vista tabla="cuotas" :coleccion="$cuotas"/>
        	@endif
        	
            
        </div>
    </div>
</div>
@endsection
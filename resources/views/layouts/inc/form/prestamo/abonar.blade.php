@php
	$socio = obtenerObjeto($objetos, 'socio');
	$prestamo = obtenerObjeto($objetos, 'prestamo');
	$abonos = obtenerColeccion($colecciones, 'abonos');
@endphp

<!-- Resúmen préstamo -->
@include('layouts.inc.abonar.resumen')

<!-- Mensaje campos obligatorios -->
@include('layouts.inc.mensajes.obligatorio')

<!-- Fecha solicitud -->
<x-input label="Fecha Abono" tipo="date" nombre="fecha" id="fecha" margen="mb-4" tamano="form-control-sm" valor="" placeholder="Ej. 01-01-2020" obligatorio="si"/>

<!-- Monto -->
<x-input label="Monto a Abonar" tipo="text" nombre="monto" id="monto" margen="mb-4" tamano="form-control-sm" valor="" placeholder="Ej. 40000" obligatorio="si"/>

<input type="hidden" name="fecha_solicitud" value="{{ $prestamo->fecha }}">
<input type="hidden" name="prestamo_id" value="{{ $prestamo->id }}">

<!-- Botón formulario -->
<button class="btn btn-info btn-block mt-0 btn-sm" type="submit">Abonar</button>
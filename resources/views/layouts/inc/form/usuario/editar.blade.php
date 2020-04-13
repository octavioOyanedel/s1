@php
	$usuario = obtenerObjeto($objetos, 'usuario');
@endphp

<div class="alert alert-info alerta-forms" role="alert">
	<b>*</b> Campos obligatorios.
</div>

<!-- Primer nombre -->
<x-input label="Primer Nombre" tipo="text" nombre="nombre1" id="nombre1" margen="mb-4" tamano="form-control-sm" :valor="$usuario->nombre1" placeholder="Nombre" obligatorio="si"/>

<!-- Segundo nombre -->
<x-input label="Segundo Nombre" tipo="text" nombre="nombre2" id="nombre2" margen="mb-4" tamano="form-control-sm" :valor="$usuario->nombre2" placeholder="Nombre" obligatorio="no"/>

<!-- Apellido paterno -->
<x-input label="Apellido Paterno" tipo="text" nombre="apellido1" id="apellido1" margen="mb-4" tamano="form-control-sm" :valor="$usuario->apellido1" placeholder="Apellido" obligatorio="si"/>

<!-- Apellido materno -->
<x-input label="Apellido Materno" tipo="text" nombre="apellido2" id="apellido2" margen="mb-4" tamano="form-control-sm" :valor="$usuario->apellido2" placeholder="Apellido" obligatorio="no"/>

<!-- Email -->
<x-input label="Correo" tipo="email" nombre="email" id="email" margen="mb-4" tamano="form-control-sm" :valor="$usuario->email" placeholder="sind1@pucv.cl" obligatorio="si"/>

<!-- Privilegio -->
<x-select keyColeccion="privilegios" :colecciones="$colecciones" keyObjeto="usuario" :objetos="$objetos" label="Privilegio" nombre="privilegio_id" id="privilegio_id" tamano="custom-select-sm" obligatorio="si"/>

<!-- Sign in button -->
<button class="btn btn-info btn-block my-4 btn-sm" type="submit">Editar</button>
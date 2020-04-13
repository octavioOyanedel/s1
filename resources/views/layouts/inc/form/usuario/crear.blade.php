<!-- Mensaje campos obligatorios -->
@include('layouts.inc.mensajes.obligatorio')

<!-- Mensaje descripción contraseña -->
@include('layouts.inc.mensajes.password')

<!-- Primer nombre -->
<x-input label="Primer Nombre" tipo="text" nombre="nombre1" id="nombre1" margen="mb-4" tamano="form-control-sm" valor="" placeholder="Nombre" obligatorio="si"/>

<!-- Segundo nombre -->
<x-input label="Segundo Nombre" tipo="text" nombre="nombre2" id="nombre2" margen="mb-4" tamano="form-control-sm" valor="" placeholder="Nombre" obligatorio="no"/>

<!-- Apellido paterno -->
<x-input label="Apellido Paterno" tipo="text" nombre="apellido1" id="apellido1" margen="mb-4" tamano="form-control-sm" valor="" placeholder="Apellido" obligatorio="si"/>

<!-- Apellido materno -->
<x-input label="Apellido Materno" tipo="text" nombre="apellido2" id="apellido2" margen="mb-4" tamano="form-control-sm" valor="" placeholder="Apellido" obligatorio="no"/>

<!-- Email -->
<x-input label="Correo" tipo="email" nombre="email" id="email" margen="mb-4" tamano="form-control-sm" valor="" placeholder="sind1@pucv.cl" obligatorio="si"/>

<!-- Contraseña nueva -->
<x-input label="Nueva Contraseña" tipo="password" nombre="password" id="password" margen="mb-4" tamano="form-control-sm" valor="" placeholder="" obligatorio="si"/>

<!-- Contraseña confirmar -->
<x-input label="Confirmar Contraseña" tipo="password" nombre="confirmar" id="confirmar" margen="mb-4" tamano="form-control-sm" valor="" placeholder="" obligatorio="si"/>

<!-- Privilegio -->
<x-select keyColeccion="privilegios" :colecciones="$colecciones" keyObjeto="" objetos="" label="Privilegio" nombre="privilegio_id" id="privilegio_id" tamano="custom-select-sm" obligatorio="si"/>

<!-- Sign in button -->
<button class="btn btn-info btn-block my-4 btn-sm" type="submit">Crear</button>
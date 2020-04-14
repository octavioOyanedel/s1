<!-- Mensaje campos obligatorios -->
@include('layouts.inc.mensajes.obligatorio')

<!-- Mensaje descripción contraseña -->
@include('layouts.inc.mensajes.password')

<!-- Contraseña actual -->
<x-input label="Contraseña Actual" tipo="password" nombre="actual" id="actual" margen="mb-4" tamano="form-control-sm" valor="" placeholder="" obligatorio="si"/>

<!-- Contraseña nueva -->
<x-input label="Nueva Contraseña" tipo="password" nombre="nueva" id="nueva" margen="mb-4" tamano="form-control-sm" valor="" placeholder="" obligatorio="si"/>

<!-- Contraseña confirmar -->
<x-input label="Confirmar Contraseña" tipo="password" nombre="confirmar" id="confirmar" margen="mb-4" tamano="form-control-sm" valor="" placeholder="" obligatorio="si"/>

<!-- Sign in button -->
<button class="btn btn-info btn-block mt-0 btn-sm" type="submit">Cambiar</button>
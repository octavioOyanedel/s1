<div class="alert alert-info alerta-forms" role="alert">
	<b>*</b> Campos obligatorios.
</div>

<div class="alert alert-warning alerta-forms" role="alert">
	Requisitos contraseña:
	<ul>
		<li>La contraseña debe poseer entre 8 y 15 caracteres.</li>
		<li>Se permiten sólo caracteres alfanuméricos.</li>
	</ul>
</div>

<!-- Contraseña actual -->
<x-input label="Contraseña Actual" tipo="password" nombre="actual" id="actual" margen="mb-4" tamano="form-control-sm" valor="" placeholder="" obligatorio="si"/>

<!-- Contraseña nueva -->
<x-input label="Nueva Contraseña" tipo="password" nombre="nueva" id="nueva" margen="mb-4" tamano="form-control-sm" valor="" placeholder="" obligatorio="si"/>

<!-- Contraseña confirmar -->
<x-input label="Confirmar Contraseña" tipo="password" nombre="confirmar" id="confirmar" margen="mb-4" tamano="form-control-sm" valor="" placeholder="" obligatorio="si"/>

<!-- Sign in button -->
<button class="btn btn-info btn-block my-4 btn-sm" type="submit">Cambiar</button>
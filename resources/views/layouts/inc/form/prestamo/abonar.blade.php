<!-- Mensaje campos obligatorios -->
@include('layouts.inc.mensajes.obligatorio')

<!-- registro -->
<x-input label="N° Egreso" tipo="text" nombre="egreso" id="egreso" margen="mb-4" tamano="form-control-sm" valor="" placeholder="Ej. 123" obligatorio="si"/>

<!-- Monto -->
<x-input label="Monto" tipo="text" nombre="monto" id="monto" margen="mb-4" tamano="form-control-sm" valor="" placeholder="Ej. 40000" obligatorio="si"/>

<!-- Botón formulario -->
<button class="btn btn-info btn-block mt-0 btn-sm" type="submit">Abonar</button>
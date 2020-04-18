<!-- Mensaje campos obligatorios -->
@include('layouts.inc.mensajes.obligatorio')

<!-- Rut -->
<x-input label="Rut" tipo="text" nombre="rut" id="rut" margen="mb-4" tamano="form-control-sm" valor="" placeholder="11222333k" obligatorio="si"/>

<!-- Fecha solicitud -->
<x-input label="Fecha Solicitud" tipo="date" nombre="fecha" id="fecha" margen="mb-4" tamano="form-control-sm" valor="" placeholder="01-01-2020" obligatorio="si"/>

<!-- Numero de egreso -->
<x-input label="N° Egreso" tipo="text" nombre="registro" id="registro" margen="mb-4" tamano="form-control-sm" valor="" placeholder="123" obligatorio="si"/>

<!-- Cuenta -->
<x-select keyColeccion="cuentas" :colecciones="$colecciones" keyObjeto="" objetos="" label="Cuenta" nombre="banca_id" id="banca_id" tamano="custom-select-sm" obligatorio="si" excepcion=""/>

<!-- Método de pago -->
<x-select keyColeccion="metodos" :colecciones="$colecciones" keyObjeto="" objetos="" label="Forma Pago" nombre="metodo_id" id="metodo_id" tamano="custom-select-sm" obligatorio="si" excepcion=""/>

<!-- Cheque -->
<x-input label="Cheque" tipo="text" nombre="cheque" id="cheque" margen="mb-4" tamano="form-control-sm" valor="" placeholder="12345678" obligatorio="si"/>

<!-- Monto -->
<x-input label="Monto" tipo="text" nombre="monto" id="monto" margen="mb-4" tamano="form-control-sm" valor="" placeholder="40000" obligatorio="si"/>

<!-- Interés -->
<x-select keyColeccion="intereses" :colecciones="$colecciones" keyObjeto="" objetos="" label="Interés" nombre="renta_id" id="renta_id" tamano="custom-select-sm" obligatorio="si" excepcion=""/>

<div class="fecha-pago">
	<!-- Fecha solicitud -->
	<x-input label="Fecha Pago" tipo="date" nombre="fecha_pago" id="fecha_pago" margen="mb-4" tamano="form-control-sm" valor="" placeholder="01-01-2020" obligatorio="no"/>
</div>

<div class="cuotas">
	<!-- Cuotas -->
	<x-select keyColeccion="" colecciones="" keyObjeto="" objetos="" label="Cuotas" nombre="cuotas" id="cuotas" tamano="custom-select-sm" obligatorio="no" excepcion="cuotas"/>
</div>

<!-- Botón formulario -->
<button class="btn btn-info btn-block mt-0 btn-sm" type="submit">Simular</button>
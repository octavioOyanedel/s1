<!-- Mensaje campos obligatorios -->
@include('layouts.inc.mensajes.obligatorio')

<!-- Rut -->
<x-input label="Rut" tipo="text" nombre="rut" id="rut" margen="mb-4" tamano="form-control-sm" valor="" placeholder="11222333k" obligatorio="si"/>

<!-- Numero de socio -->
<x-input label="N° Socio" tipo="text" nombre="numero" id="numero" margen="mb-4" tamano="form-control-sm" valor="" placeholder="123" obligatorio="si"/>

<!-- Primer nombre -->
<x-input label="Primer Nombre" tipo="text" nombre="nombre1" id="nombre1" margen="mb-4" tamano="form-control-sm" valor="" placeholder="Nombre" obligatorio="si"/>

<!-- Segundo nombre -->
<x-input label="Segundo Nombre" tipo="text" nombre="nombre2" id="nombre2" margen="mb-4" tamano="form-control-sm" valor="" placeholder="Nombre" obligatorio="no"/>

<!-- Apellido paterno -->
<x-input label="Apellido Paterno" tipo="text" nombre="apellido1" id="apellido1" margen="mb-4" tamano="form-control-sm" valor="" placeholder="Apellido" obligatorio="si"/>

<!-- Apellido materno -->
<x-input label="Apellido Materno" tipo="text" nombre="apellido2" id="apellido2" margen="mb-4" tamano="form-control-sm" valor="" placeholder="Apellido" obligatorio="no"/>

<!-- Género -->
<x-select keyColeccion="" colecciones="" keyObjeto="" objetos="" label="Género" nombre="genero" id="genero" tamano="custom-select-sm" obligatorio="si" excepcion="genero"/>

<!-- Fecha nacimiento -->
<x-input label="Fecha Nacimiento" tipo="date" nombre="fecha_nac" id="fecha_nac" margen="mb-4" tamano="form-control-sm" valor="" placeholder="01-01-2020" obligatorio="no"/>

<!-- Celular -->
<x-input label="Celular" tipo="text" nombre="celular" id="celular" margen="mb-4" tamano="form-control-sm" valor="" placeholder="911223344" obligatorio="no"/>

<!-- Correo -->
<x-input label="Correo" tipo="email" nombre="correo" id="correo" margen="mb-4" tamano="form-control-sm" valor="" placeholder="sind1@pucv.cl" obligatorio="no"/>

<!-- Fecha pucv -->
<x-input label="Fecha Ingreso PUCV" tipo="date" nombre="fecha_pucv" id="fecha_pucv" margen="mb-4" tamano="form-control-sm" valor="" placeholder="01-01-2020" obligatorio="no"/>

<!-- Anexo -->
<x-input label="Anexo" tipo="text" nombre="anexo" id="anexo" margen="mb-4" tamano="form-control-sm" valor="" placeholder="3093" obligatorio="no"/>

<!-- Fecha sind1 -->
<x-input label="Fecha Ingreso Sind1" tipo="date" nombre="fecha_sind1" id="fecha_sind1" margen="mb-4" tamano="form-control-sm" valor="" placeholder="01-01-2020" obligatorio="no"/>

<!-- Comuna -->
<x-select keyColeccion="comunas" :colecciones="$colecciones" keyObjeto="" objetos="" label="Comuna" nombre="comuna_id" id="comuna_id" tamano="custom-select-sm" obligatorio="si" excepcion=""/>

<!-- Ciudad -->
<x-select-ajax keyObjeto="" objetos="" nombre="urbe_id" id="urbe_id" label="Ciudad" idOld="old_urbe" idEditar="" obligatorio="no"/>

<!-- Dirección -->
<x-input label="Dirección" tipo="text" nombre="direccion" id="direccion" margen="mb-4" tamano="form-control-sm" valor="" placeholder="Av. Brasil 2950" obligatorio="no"/>

<!-- Sede -->
<x-select keyColeccion="sedes" :colecciones="$colecciones" keyObjeto="" objetos="" label="Sede" nombre="sede_id" id="sede_id" tamano="custom-select-sm" obligatorio="si" excepcion=""/>

<!-- Área -->
<x-select-ajax keyObjeto="" objetos="" nombre="area_id" id="area_id" label="Área" idOld="old_area" idEditar="" obligatorio="no"/>

<!-- Cargo -->
<x-select keyColeccion="cargos" :colecciones="$colecciones" keyObjeto="" objetos="" label="Cargo" nombre="cargo_id" id="cargo_id" tamano="custom-select-sm" obligatorio="si" excepcion=""/>

<!-- Nacionalidad -->
<x-select keyColeccion="ciudadanias" :colecciones="$colecciones" keyObjeto="" objetos="" label="Nacionalidad" nombre="ciudadania_id" id="ciudadania_id" tamano="custom-select-sm" obligatorio="si" excepcion=""/>

<!-- Botón formulario -->
<button class="btn btn-info btn-block mt-0 btn-sm" type="submit">Incorporar</button>
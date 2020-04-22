<?php


/**
 * Descripción: obtener cabeceras y su respectiva clase de aliniamiento
 * Entrada/s: string nombre de tabla
 * Salida: arreglo asociativo con nombre y clase
 */
function obtenerCabederasTablas($nombre)
{
	switch ($nombre) {
		case "socios":
			return array('Nombre'=>'','Género'=>'text-center','Rut'=>'text-center','Fecha Ingreso Sind1'=>'text-center','Número Socio'=>'text-center','Correo'=>'','Anexo'=>'text-center','Celular'=>'text-center','Sede'=>'','Área'=>'','Cargo'=>'');
		break;	
		case "usuarios":
			return array('Nombre'=>'','Correo'=>'','Permisos'=>'');
		break;	
		case "prestamos":
			return array('Estado'=>'','Rut'=>'','Fecha'=>'','N° Egreso'=>'','Cuenta'=>'','Forma Pago'=>'','N° Egreso'=>'','Cheque'=>'','Monto'=>'');
		break;	
	}
}

/**
 * Descripción: obtener cabeceras y su respectiva clase de aliniamiento
 * Entrada/s: string nombre de tabla
 * Salida: arreglo asociativo con nombre y clase
 */
function obtenerCabederasTablasVistas($nombre)
{
	switch ($nombre) {
		case "socio_prestamo":
			return array('Nombre'=>'nombre','Rut'=>'rut');
		break;		
		case "prestamo_vista_v":
			return array('Fecha'=>'fecha','N° Egreso'=>'registro','Cuenta'=>'banca_id','Forma Pago'=>'metodo_id','Cheque'=>'cheque','Monto'=>'monto','Fecha Pago'=>'fecha_pago','Cuotas'=>'cuotas');
		break;
		case "prestamo_vista_h":
			return array('N° Cuota'=>'numero','Fecha Pago'=>'fecha','Monto'=>'monto');
		break;		
	}
}

/**
 * Descripción: obtener ruta para carga dinámica de ncontenido tabla
 * Entrada/s: string nombre de enlace
 * Salida: arreglo asociativo con nombre y clase
 */
function obtenerRutaContenidoTabla($nombre)
{
	switch ($nombre) {
		case "socios":
			return 'layouts.inc.socio.contenido_tabla_socios';
		break;	
		case "usuarios":
			return 'layouts.inc.usuario.contenido_tabla_usuarios';
		break;
		case "prestamos":
			return 'layouts.inc.prestamo.contenido_tabla_prestamos';
		break;
		case "prestamo_vista_v":
			return 'layouts.inc.prestamo.contenido_tabla_vista_v_prestamos';
		break;
		case "prestamo_vista_h":
			return 'layouts.inc.prestamo.contenido_tabla_vista_h_prestamos';
		break;
		case "socio_prestamo":
			return 'layouts.inc.prestamo.contenido_tabla_prestamo_socio';
		break;				
	}
}
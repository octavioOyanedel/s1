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
	}
}
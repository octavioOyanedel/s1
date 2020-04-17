<?php


/**
 * Descripción: obtener nombre de enlace y rutas para nav administracion
 * Entrada/s: string nombre de enlace
 * Salida: arreglo asociativo con nombre y ruta
 */
function obtenerEnlacesAdmin($nombre)
{
	switch ($nombre) {
		case "socios":
			return array('Área'=>'home','Cargo'=>'home','Ciudad'=>'home','Comuna'=>'home','Estado'=>'home','Nacionalidad'=>'home','Sede'=>'home');
		break;	
		case "usuarios":
			return array('Permisos'=>'home');
		break;		
	}
}
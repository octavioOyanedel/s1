<?php


/**
 * Descripción: obtener nombre de enlace y rutas para navbar
 * Entrada/s: string nombre de enlace
 * Salida: arreglo asociativo con nombre y ruta
 */
function obtenerEnlacesNav($nombre)
{
	switch ($nombre) {
		case "usuario":
			return array('Actualizar datos de usuario'=>'editar_usuario','Cambiar contraseña'=>'editar_contraseña','Salir'=>'logout');
		break;		
		case "socios":
			return array('Incorporar'=>'home','Listar'=>'home','Buscar'=>'home','Agregar carga'=>'home','Agregar estudio'=>'home');
		break;
		case "préstamos":
			return array('Solicitar'=>'home','Listar'=>'home','Buscar'=>'home');
		break;
		case "contabilidad":
			return array('Registrar'=>'home','Listar'=>'home','Buscar'=>'home','Conciliación'=>'home','Anular'=>'home');
		break;
		case "estadísticas":
			return array('Sede - Área'=>'home','Comuna - Ciudad'=>'home','Cargo'=>'home','Incorporación - Desvinculación'=>'home','Nacionalidad'=>'home','Estudios'=>'home','Cargas'=>'home');
		break;
		case "administración":
			return array('Socios'=>'home','Usuarios'=>'usuarios.index','Estudios'=>'home','Préstamos'=>'home','Contabilidad'=>'home','Historial'=>'home');
		break;		
	}
}
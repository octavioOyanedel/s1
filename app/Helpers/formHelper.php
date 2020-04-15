<?php

use Illuminate\Http\Request;

/**
 * Descripción: Obtener ruta para completar csrf según formulario
 * Entrada/s: string con nombre de método de formularios
 * Salida: string con ruta de include con csrf
 */
function obtenerCsrf($nombre)
{
	switch ($nombre) {
	    case "put":
	        return 'layouts.inc.csrf.put';
	        break;
	    case "delete":
	        return 'layouts.inc.csrf.delete';
	        break;	        
	    default:
	        return 'layouts.inc.csrf.post';
	}
}

/**
 * Descripción: Obtener ruta de atributo action
 * Entrada/s: string con nombre de formulario
 * Salida: string con nombre de ruta
 */
function obtenerAction($nombre)
{
	switch ($nombre) {
	    case "login":
	        return 'login';
	        break;
	    case "reset":
	        return 'password.email';
	        break;
	    case "user_update":
	        return 'usuarios.update';
	        break;
	    case "password_update":
	        return 'camniar_contraseña'; 
	        break;	
	    case "crear_usuario":
	        return 'usuarios.store'; 
	        break;
	    case "crear_socio":
	        return 'socios.store'; 
	        break;
	    case "socio_update":
	        return 'socios.update';	        	         	        	                
	}
}

/**
 * Descripción: Obtener ruta con contenido de formulario
 * Entrada/s: string con nombre de formulario
 * Salida: string con nombre de ruta
 */
function obtenerContenido($nombre)
{
	switch ($nombre) {
	    case "login":
	        return 'layouts.inc.form.auth.login';
	        break;
	    case "reset":
	        return 'layouts.inc.form.auth.reset';
	        break;	 
	    case "editar_usuario":
	        return 'layouts.inc.form.usuario.editar';
	        break;	 
	    case "cambiar_contraseña":
	        return 'layouts.inc.form.usuario.password';
	        break;
	    case "crear_usuario":
	        return 'layouts.inc.form.usuario.crear';
	        break;
	    case "crear_socio":
	        return 'layouts.inc.form.socio.crear';
	        break;
	    case "editar_socio":
	        return 'layouts.inc.form.socio.editar';
	        break;	 	        	                               
	}
}

/**
 * Descripción: Obtener método de formulario
 * Entrada/s: string con nombre de método de formulario
 * Salida: string con método
 */
function obtenerMetodo($nombre)
{
	return ($nombre === 'get') ? "GET" : "POST";
}


/**
 * Descripción: Obtener valor por defecto input
 * Entrada/s: valor old y value
 * Salida: valor correspondiente
 */
function obtenerValorInput($old, $valor)
{
	if($old != null){
		return $old;
	}else{
		return $valor;
	}
}


/**
 * Descripción: Obtener colección para poblar select
 * Entrada/s: array asociativo de colecciones
 * Salida: coleccion Collection
 */
function obtenerColeccion($colecciones, $nombre)
{
	if($colecciones != null){
		return $colecciones[$nombre];
	}	
}

/**
 * Descripción: Obtener objetos
 * Entrada/s: array asociativo de objetos
 * Salida: objeto
 */
function obtenerObjeto($objetos, $nombre)
{
	if($objetos != null){
		return $objetos[$nombre];
	}
}


/**
 * Descripción: Otorga dinámicamente di option lleva atributo selected 
 * Entrada/s: string campo old
 * Salida: string selected o string vacío
 */
function estaSelected($id, $idObjeto)
{

	if($id != '' && $id != null && $idObjeto != '' && $idObjeto != null){
		if(intval($id) === intval($idObjeto)){
			return 'selected';
		}
	}
	return '';
}


/**
 * Descripción: Obtener id desde parametro requestUri de request
 * Entrada/s: string requestUri
 * Salida: int id
 */
function obtenerIdDesdeRequestUri($ruta)
{
	return intval(substr(strrchr($ruta,"/"),1));
}



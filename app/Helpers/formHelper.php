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
	    case "editar_usuario":
	        return 'usuarios';
	        break;	                
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


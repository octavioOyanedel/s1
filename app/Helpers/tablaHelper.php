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
			return array('Fecha'=>'fecha','N° Egreso'=>'registro','Cuenta'=>'banca_id','Forma Pago'=>'metodo_id','Cheque'=>'cheque','Monto'=>'monto','Interés'=>'renta_id','Total'=>'total','Fecha Pago'=>'fecha_pago','Cuotas'=>'cuotas');
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

/**
 * Descripción: Agregar puntos y guión medio a rut
 * Entrada/s: string valor rut
 * Salida: string rut formateado
 */
function formatoRut($valor)
{
    $rut = $valor;
    $largo = strlen($rut);
    $largoFinal = 0;
    $arrayRutFormato = array();
    $rutFinal = "";
    //obtener largo total para poblar nuevo array
    if ($largo == 9) {
        //si largo es 9 nuevo largo sera de 11 0-11 = 12
        $largoFinal = 12;
    } else {
        //si largo es 9 nuevo largo sera de 10 0-10 = 11
        $largoFinal = 11;
    }
    //formato inicial de array
    for ($i = 0; $i < $largoFinal; $i++) {
        if ($i == $largoFinal - 2) {
            array_push($arrayRutFormato, "-");
        } else {
            array_push($arrayRutFormato, ".");
        }
    }
    //convertir rut en array
    $arrayRut = str_split($rut);
    //recorrer array para construir nuevo array
    for ($i = 0; $i < $largoFinal; $i++) {
        if ($largo == 9) {
            if ($i >= 0 && $i <= 1) {
                $arrayRutFormato[$i] = $arrayRut[$i];
            }
            if ($i >= 3 && $i <= 5) {
                $arrayRutFormato[$i] = $arrayRut[$i - 1];
            }
            if ($i >= 7 && $i <= 9) {
                $arrayRutFormato[$i] = $arrayRut[$i - 2];
            }
            if ($i == 11) {
                $arrayRutFormato[$i] = $arrayRut[$i - 3];
            }
        } else {
            if ($i == 0) {
                $arrayRutFormato[$i] = $arrayRut[$i];
            }
            if ($i >= 2 && $i <= 4) {
                $arrayRutFormato[$i] = $arrayRut[$i - 1];
            }
            if ($i >= 6 && $i <= 8) {
                $arrayRutFormato[$i] = $arrayRut[$i - 2];
            }
            if ($i == 10) {
                $arrayRutFormato[$i] = $arrayRut[$i - 3];
            }
        }
    }
    //convertir array en string
    $rutFinal = implode("", $arrayRutFormato);
    $valor = $rutFinal;
    return $valor;
}

/**
 * Descripción: Formateado de valores
 * Entrada/s: int valor
 * Salida: string valor formateado $5.000
 */
function formatoMoneda($valor)
{
    return '$'.number_format($valor, 0, 3, '.');
}
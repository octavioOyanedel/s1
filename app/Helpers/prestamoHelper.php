<?php

/**
 * Descripción: obtener arreglo cuotas segun modelo de negocio
 * Entrada/s: int numero de cuotas, date fecha de solicitud e int monto
 * Salida: arreglo asociativo con numero de cuota, fecha y monto
 */
function crearArregloCuotas($numero_cuotas, $fecha_solicitud, $monto)
{
    $cuotas = $numero_cuotas;
    $fecha = $fecha_solicitud;
    $dia_pago = 25;
    $year_inicio = 0;
    $mes_inicio = 0;
    $fecha_cuota = '';
    $array_fecha_cuota = array();
    $mes_pago = '';
    $montoConInteres = ((2 / 100) * $monto) + $monto;
    $montoCouta = $montoConInteres / $cuotas;
    $coleccion = array();
    //obtener año, mes y dia
    $year = substr($fecha,0,-6);
    $mes = substr($fecha,5,-3);
    $dia = substr($fecha,8);
    $year_pago = $year + 0; //casteo a entreo
    //mes de inicio
    if($dia < 15){
        $mes_inicio = $mes + 0; //casteo a entero
    }else{
        //inicio mes siguiente
        $mes_inicio = $mes + 1;
        if($mes_inicio == 13){
            $mes_inicio = 1;
            $year_pago++;
        }
    }
    $year_inicio = $year;
    $mes_pago = (string)$mes_inicio;
    //loop cuotas
    for($i = 0; $i < $cuotas; $i++){
        if($mes_pago > 12){
            $mes_pago = 1;
            $year_pago++;
        }

        if($mes_pago < 10){
            $mes_pago = '0'.$mes_pago;
        }

        $fecha_cuota = $year_pago.'-'.$mes_pago.'-'.$dia_pago;
        array_push($coleccion,array('numero' => $i + 1, 'fecha' => formatoFecha($fecha_cuota), 'monto' => $montoCouta));

        $mes_pago++;
    }
    return $coleccion;
}

/**
 * Descripción: obtener string fecha formateada a dd-mm-yyyy
 * Entrada/s: string con fecha
 * Salida: string formateado o string vacío
 */
function formatoFecha($valor)
{
    if($valor != null && $valor != ''){
        $bloque = explode('-', $valor);
        return $nuevaFecha = $bloque[2] . '-' . $bloque[1] . '-' . $bloque[0];
    }else{
        return '';
    }
}
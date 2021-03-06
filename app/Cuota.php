<?php

namespace App;

use App\Cuota;
use App\Prestamo;
use Illuminate\Database\Eloquent\Model;

class Cuota extends Model
{
    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
        'fecha','numero','monto','prestamo_id','estado',
    ];


    /*******************************************************************************************
    /************************************ Relaciones *******************************************
    /******************************************************************************************/



    

    /*******************************************************************************************
    /************************************ Métodos Estáticos ************************************
    /*******************************************************************************************

    /**
     * Descripción: Guardar cuotas de préstamo
     * Entrada/s: prestamo de tipo Prestamo
     * Salida: boolean
     */
    static public function agregarCuotasPrestamo(Prestamo $prestamo, $tipo)
    {
        //dd((int)$prestamo->renta->valor);
        $cuotas = $prestamo->cuotas;
        $fecha = $prestamo->fecha;
        $monto = $prestamo->monto;
        $dia_pago = 25;
        $year_pago = 0;
        $year_inicio = 0;
        $mes_inicio = 0;
        $fecha_cuota = '';
        $array_fecha_cuota = array();
        if($tipo === 'con_interes'){
            $montoCalculado = (((int)$prestamo->renta->getRawOriginal('valor') / 100) * $monto) + $monto;
        }else{
            $montoCalculado = $monto;
        }
        
        $montoCouta = $montoCalculado / $cuotas;

        //obtener año, mes y dia
        $year = substr($fecha,0,-6);
        $mes = substr($fecha,5,-3);
        $dia = substr($fecha,8);

        $year_pago = $year;

        //mes de inicio
        if($dia < 15){
            $mes_inicio = $mes;
        }else{
            //inicio mes siguiente
            $mes_inicio = $mes + 1;
            if($mes_inicio == 13){
                $mes_inicio = 1;
                $year_pago++;
            }
        }

        $year_inicio = $year;
        $mes_pago = $mes_inicio;

        //loop cuotas
        for($i = 0; $i < $cuotas; $i++){

            if($mes_pago > 12){
                $mes_pago = 1;
                $year_pago++;
            }

            $fecha_cuota = (string)$year_pago.'-'.$mes_pago.'-'.$dia_pago;

            $cuota = new Cuota;
            $cuota->fecha = $fecha_cuota;
            $cuota->numero = $i + 1;
            $cuota->monto = $montoCouta;
            $cuota->prestamo_id = $prestamo->id;
            $cuota->save();
            $mes_pago++;
        }
    }
}

<?php

namespace App;

use App\cuotas;
use Illuminate\Database\Eloquent\Model;

class Prestamo extends Model
{
    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
        'fecha','registro','banca_id','cheque','monto','cuotas','metodo_id','renta_id','estado_id','fecha_pago','tipo_id','socio_id',
    ];

    /*******************************************************************************************
    /************************************ Relaciones *******************************************
    /******************************************************************************************/
    
    /**
     * Relación hasMany
     * Un préstamo tiene/posee muchos/as cuotas
     */
    public function cuotas()
    {
        return $this->hasMany('App\Cuota');
    }
   
    /*******************************************************************************************
    /************************************ Métodos Estáticos ************************************
    /******************************************************************************************/

    /**
     * Descripción: Obtener último préstamo
     * Entrada/s: 
     * Salida: Prestamo
     */
    static public function obtenerUltimo()
    {
    	return Prestamo::all()->last();
    }

    /**
     * Descripción: Comprobar si existen cuotas pagadas en préstamo
     * Entrada/s: Prestamo $prestamo
     * Salida: boolean
     */
    static public function cuotasPagadas(Prestamo $prestamo)
    {
        return $prestamo->cuotas()->where('estado_id','=','1')->count();
    }
    
    /**
     * Descripción: Sumar monto de cuotas pagadas
     * Entrada/s: Prestamo $prestamo
     * Salida: int suma
     */
    static public function sumarCuotasPagadas(Prestamo $prestamo)
    {
        return $prestamo->cuotas()->where('estado_id','=','1')->sum('monto');
    }

    /**
     * Descripción: Eliminar cuotas de prestamo
     * Entrada/s: Prestamo $prestamo
     * Salida: 
     */
    static public function eliminarCuotas(Prestamo $prestamo)
    {
        return $prestamo->cuotas()->delete();
    }       
}

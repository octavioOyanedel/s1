<?php

namespace App;

use App\Cuota;
use App\Renta;
use App\Socio;
use Illuminate\Database\Eloquent\Model;

class Prestamo extends Model
{
    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
        'id','fecha','registro','banca_id','cheque','monto','cuotas','metodo_id','renta_id','estado_id','fecha_pago','tipo_id','socio_id',
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


    /**
     * Relación belongsTo
     * Esta/e préstamo pertenece a un/a socio
     */
    public function socio()
    {
        return $this->belongsTo('App\Socio');
    }
    

    /**
     * Relación belongsTo
     * Esta/e préstamo pertenece a un/a renta
     */
    public function renta()
    {
        return $this->belongsTo('App\Renta');
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
     * Descripción: Sumar todas las cuotas
     * Entrada/s: Prestamo $prestamo
     * Salida: int suma
     */
    static public function sumaTotalCuotas(Prestamo $prestamo)
    {
        return $prestamo->cuotas()->sum('monto');
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

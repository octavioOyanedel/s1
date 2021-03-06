<?php

namespace App;

use App\Abono;
use App\Banca;
use App\Banco;
use App\Cuota;
use App\Renta;
use App\Socio;
use App\Estado;
use App\Metodo;
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

    /**
     * Relación belongsTo
     * Esta/e préstamo pertenece a un/a estado
     */
    public function estado()
    {
        return $this->belongsTo('App\Estado');
    }
    
    /**
     * Relación belongsTo
     * Esta/e préstamo pertenece a un/a abono
     */
    public function abonos()
    {
        return $this->hasMany('App\Abono');
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
    * Descripción: Obtener suma total de abonos para préstamo
    * Entrada/s: Prestamo $prestamo
    * Salida: int suma o cero
    */
    static public function sumarAbonos(Prestamo $prestamo)
    {
        return $prestamo->abonos()->where('prestamo_id','=',$prestamo->id)->sum('monto');
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

    /*******************************************************************************************
    /************************************ Accessors ********************************************
    /******************************************************************************************/

    /**
     * Descripción: Obtener cuenta formateada
     * Entrada/s: int id
     * Salida: string cuenta
     */
    public function getBancaIdAttribute($value)
    {
        $banca = Banca::findOrFail($value);
        return Cuenta::findOrfail($banca->cuenta_id)->nombre.' N° '.$banca->numero.' '.Banco::findOrfail($banca->banco_id)->nombre;
    }

    /**
     * Descripción: Obtener forma de pago
     * Entrada/s: int id
     * Salida: string cuenta
     */
    public function getMetodoIdAttribute($value)
    {
        return Metodo::findOrfail($value)->nombre;
    }

    /**
     * Descripción: Obtener valor formateado
     * Entrada/s: int valor
     * Salida: string valor formateado $50.000
     */
    public function getMontoAttribute($value)
    {
        return formatoMoneda($value);
    }    

    /**
     * Descripción: Interés formateado
     * Entrada/s: int id
     * Salida: string valor formateado 2%
     */
    public function getRentaIdAttribute($value)
    {
        return Renta::findOrFail($value)->valor.'%';
    }      
}

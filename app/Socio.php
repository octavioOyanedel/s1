<?php

namespace App;

use App\Area;
use App\Sede;
use App\Cargo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Socio extends Model
{
    use SoftDeletes;

    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
        'rut','nombre1','nombre2','apellido1','apellido2','genero','fecha_nac','celular','correo','comuna_id','urbe_id','direccion','ciudadania_id','fecha_pucv','sede_id','area_id','cargo_id','anexo','fecha_sind1','numero','categoria',
    ];   

    /********************************************************************************
     * SCOPES BUSQUEDA NAV
     *******************************************************************************/ 
    	
    /**
     * scope búsqueda de apellido paterno
     */
    public function scopeApellido1($query, $campo)
    {
        if($campo != null){
            return $query->orWhere('apellido1', 'LIKE', "%$campo%");
        }
    }

    /*******************************************************************************************
    /************************************ Métodos Estáticos ************************************
    /******************************************************************************************/

    /**
     * Descripción: Comprobar que campo sea único y no exita repetido en tabla
     * Entrada/s: valor del campo
     * Salida: boolean
     */
    static public function esUnico($valor, $atributo)
    {
        $campos = Socio::pluck($atributo)->all();
        foreach ($campos as $campo) {
            if($campo === $valor){
                // falso ya que no es único
                return false;
            }
        }
        //verdadero ya que si es un valor único
        return true;
    }

    /**
     * Descripción: Obtener id socio dado un rut
     * Entrada/s: string rut
     * Salida: socio
     */
    static public function obtenerSociConRut($rut)
    {
        return Socio::where('rut','=',$rut)->first();
    }    

    /*******************************************************************************************
    /************************************ Accessors ********************************************
    /******************************************************************************************/

    /**
     * Descripción: Obtener rut formateado
     * Entrada/s: string rut
     * Salida: string rut formateado 11.222.333-k
     */
    public function getRutAttribute($value)
    {
        return formatoRut($value);
    }

    /**
     * Descripción: Obtener nombre sede
     * Entrada/s: int id
     * Salida: string nombre
     */
    public function getSedeIdAttribute($value)
    {
        return Sede::findOrFail($value)->nombre;
    }

    /**
     * Descripción: Obtener nombre área
     * Entrada/s: int id
     * Salida: string nombre
     */
    public function getAreaIdAttribute($value)
    {
        return Area::findOrFail($value)->nombre;
    }

    /**
     * Descripción: Obtener nombre cargo
     * Entrada/s: int id
     * Salida: string nombre
     */
    public function getCargoIdAttribute($value)
    {
        return Cargo::findOrFail($value)->nombre;
    }        
	        
}

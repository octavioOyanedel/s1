<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carga extends Model
{
    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
        'nombre1','nombre2','apellido1','apellido2','parentesco_id','socio_id',
    ];
}

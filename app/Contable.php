<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contable extends Model
{
    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
        'concepto_id','user_id','monto','registro','tipo_id','cheque','detalle','fecha','banca_id',
    ];
}

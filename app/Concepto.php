<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Concepto extends Model
{
    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
        'socio_id','criterio_id','consejero_id','externo_id',
    ];
}

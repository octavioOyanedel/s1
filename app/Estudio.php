<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estudio extends Model
{
    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
        'grado_id','titulo','socio_id',
    ];
}

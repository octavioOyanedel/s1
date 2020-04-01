<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Externo extends Model
{
    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
        'nombre',
    ];
}

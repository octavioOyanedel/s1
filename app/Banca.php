<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Banca extends Model
{
    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
        'numero','cuenta_id','banco_id',
    ];
}

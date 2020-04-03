<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sede extends Model
{
    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
        'nombre',
    ];


    /**
     * Relación hasMany
     * Una sede tiene/posee muchos/as áreas
     */
    public function areas()
    {
        return $this->hasMany(Area::class);
    }
    
}

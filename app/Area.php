<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
        'nombre','sede_id',
    ];

    /**
     * Relación belongsTo
     * Esta/e área pertenece a un/a sede
     */
    public function sede()
    {
        return $this->belongsTo('App\Sede');
    }
    
}

<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Tabla extends Component
{
    public $coleccion;
    public $tabla;  
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($coleccion, $tabla)
    {
        $this->coleccion = $coleccion;
        $this->tabla = $tabla;        
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.tabla.tabla');
    }
}

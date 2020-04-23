<?php

namespace App\View\Components;

use Illuminate\View\Component;

class TablaVistaVertical extends Component
{
    public $tabla;
    public $coleccion;
    public $total;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($tabla, $coleccion, $total)
    {
        $this->tabla = $tabla;
        $this->coleccion = $coleccion;
        $this->total = $total; 
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.tabla.tabla-vista-vertical');
    }
}

<?php

namespace App\View\Components;

use Illuminate\View\Component;

class TablaVista extends Component
{
    public $tabla;
    public $coleccion;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($tabla, $coleccion)
    {
        $this->tabla = $tabla;
        $this->coleccion = $coleccion;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.tabla.tabla-vista');
    }
}

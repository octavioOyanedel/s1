<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Tabla extends Component
{
    public $coleccion;
    public $tabla;  
    public $ver;
    public $editar;
    public $eliminar;
    public $abonar;
    public $estado;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($coleccion, $tabla, $ver, $editar, $eliminar, $abonar, $estado)
    {
        $this->coleccion = $coleccion;
        $this->tabla = $tabla;
        $this->ver = $ver; 
        $this->editar = $editar; 
        $this->eliminar = $eliminar;
        $this->abonar = $abonar; 
        $this->estado = $estado;   
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

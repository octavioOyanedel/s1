<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Boton extends Component
{
    public $tipo;
    public $margen;
    public $nombre;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($tipo,$margen,$nombre)
    {
        $this->tipo = $tipo;
        $this->margen = $margen;
        $this->nombre = $nombre;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.form.boton');
    }
}

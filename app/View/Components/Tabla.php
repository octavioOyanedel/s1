<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Tabla extends Component
{
    public $socios;
    public $titulo;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($socios, $titulo)
    {
        $this->socios = $socios;
        $this->titulo = $titulo;
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

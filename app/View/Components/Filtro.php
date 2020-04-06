<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Filtro extends Component
{
    public $filtro;
    public $total;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($filtro, $total)
    {
        $this->filtro = $filtro;
        $this->total = $total;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.tabla.filtro');
    }
}

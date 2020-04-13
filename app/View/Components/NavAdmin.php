<?php

namespace App\View\Components;

use Illuminate\View\Component;

class NavAdmin extends Component
{
    public $enlaces;
    public $nombreBoton;
    public $enlaceBoton;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($enlaces, $nombreBoton, $enlaceBoton)
    {
        $this->enlaces = $enlaces;
        $this->nombreBoton = $nombreBoton;
        $this->enlaceBoton = $enlaceBoton;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.admin.nav-admin');
    }
}

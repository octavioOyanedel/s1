<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Form extends Component
{
    public $csrf;
    public $action;
    public $metodo;
    public $titulo;
    public $contenido;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($csrf, $action, $metodo, $titulo, $contenido)
    {
       $this->csrf = $csrf; 
       $this->action = $action;
       $this->metodo = $metodo;
       $this->titulo = $titulo;
       $this->contenido = $contenido; 
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.form.form');
    }
}

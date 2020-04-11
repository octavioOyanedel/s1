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
    public $alineacion;
    public $colecciones;
    public $objetos;
    public $modulo;
    public $tipo;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($csrf, $action, $metodo, $titulo, $contenido, $alineacion, $colecciones, $objetos, $modulo, $tipo)
    {
        $this->csrf = $csrf; 
        $this->action = $action;
        $this->metodo = $metodo;
        $this->titulo = $titulo;
        $this->contenido = $contenido; 
        $this->alineacion = $alineacion;
        $this->colecciones = $colecciones;
        $this->objetos = $objetos;
        $this->modulo = $modulo;
        $this->tipo = $tipo;
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

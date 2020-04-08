<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Input extends Component
{
    public $tipo;
    public $id;
    public $nombre;
    public $margen;
    public $tamano;
    public $valor;
    public $obligatorio;
    public $placeholder;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($tipo,$id,$nombre,$margen,$tamano,$valor,$obligatorio,$placeholder)
    {
        $this->tipo = $tipo;
        $this->id = $id;
        $this->nombre = $nombre;
        $this->margen = $margen;
        $this->tamano = $tamano;
        $this->valor = $valor;
        $this->obligatorio = $obligatorio;
        $this->placeholder = $placeholder;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.form.input');
    }
}

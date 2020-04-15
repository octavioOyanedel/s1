<?php

namespace App\Http\Controllers;

use App\Sede;
use App\Cargo;
use App\Socio;
use App\Comuna;
use App\Categoria;
use App\Ciudadania;
use App\Traits\CrudGenerico;
use Illuminate\Http\Request;
use App\Http\Requests\SocioRequest;

class SocioController extends Controller
{
    use CrudGenerico;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $comunas = Comuna::all();
        $ciudadanias = Ciudadania::all();
        $sedes = Sede::all();
        $cargos = Cargo::all();
        $categorias = Categoria::all();
        $colecciones = array('comunas' => $comunas,'ciudadanias' => $ciudadanias,'sedes' => $sedes,'cargos' => $cargos,'categorias' => $categorias);
        return view('app.socios.create', compact('colecciones'));        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SocioRequest $request)
    {
        $this->createGenerico($request, new Socio);
        return redirect('home')->with('status', 'Socio Incorporado!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Socio  $socio
     * @return \Illuminate\Http\Response
     */
    public function show(Socio $socio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Socio  $socio
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $socio = Socio::findorfail($id);
        $comunas = Comuna::all();
        $ciudadanias = Ciudadania::all();
        $sedes = Sede::all();
        $cargos = Cargo::all();
        $categorias = Categoria::all();
        $objetos = array('socio' => $socio);
        $colecciones = array('comunas' => $comunas,'ciudadanias' => $ciudadanias,'sedes' => $sedes,'cargos' => $cargos,'categorias' => $categorias);
        return view('app.socios.edit', compact('colecciones','objetos'));        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Socio  $socio
     * @return \Illuminate\Http\Response
     */
    public function update(SocioRequest $request, $id)
    {
        $this->updateGenerico($request, Socio::findOrFail($id));
        return redirect('home')->with('status', 'Socio Actualizado!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Socio  $socio
     * @return \Illuminate\Http\Response
     */
    public function destroy(Socio $socio)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\User;
use App\Privilegio;
use App\Traits\CrudGenerico;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UsuarioRequest;

class UserController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {

    }    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UsuarioRequest $request, $id)
    {
        $this->updateGenerico($request, User::findOrFail($id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function editar()
    {	
    	$usuario = Auth::user();
    	$privilegios = Privilegio::all();
    	$colecciones = array('privilegios' => $privilegios);
    	$objetos = array('usuario' => $usuario);
    	return view('app.usuarios.edit', compact('usuario','objetos','colecciones'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function editarPassword()
    {   
        $usuario = Auth::user();
        $privilegios = Privilegio::all();
        $colecciones = array('privilegios' => $privilegios);
        $objetos = array('usuario' => $usuario);
        return view('app.usuarios.password', compact('usuario','objetos','colecciones'));
    }

}

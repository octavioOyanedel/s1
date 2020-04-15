<?php

namespace App\Http\Controllers;

use App\User;
use App\Privilegio;
use App\Traits\CrudGenerico;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UsuarioRequest;
use App\Http\Requests\PasswordRequest;

class UserController extends Controller
{
	use CrudGenerico;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $cantidad = obtenerCantidad($request);
        $columna = obtenerColumna($request);
        $orden = obtenerOrden($request);
        //$campo = obtenerCampo($request);

        //TODO: crear scopes

        $coleccion = User::orderBy($columna, $orden)
        ->paginate($cantidad)->appends([
            'cantidad' => $cantidad,
            'columna' => $columna,
            'orden' => $orden,
        ]);
        $total_consulta = $coleccion->total();
        $total = User::all()->count();
        return view('app.usuarios.index', compact('coleccion','total','total_consulta'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $privilegios = Privilegio::all();
        $colecciones = array('privilegios' => $privilegios);
        return view('app.usuarios.create', compact('colecciones'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsuarioRequest $request)
    {
        $request['password'] = Hash::make($request->password);
        $this->createGenerico($request, new User);
        return redirect('usuarios')->with('status', 'Usuario Agregado!');
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
        return redirect('home')->with('status', 'Usuario Actualizado!');
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
        return view('app.usuarios.password');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function updatePassword(PasswordRequest $request)
    {
        $usuario = Auth::user();
        $usuario->password = Hash::make($request->nueva);
        $usuario->update();
        return redirect('home')->with('status', 'Contraseña Actualizada!');
    }

}

<?php

namespace App\Http\Controllers;

use App\Socio;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {        
        $cantidad = obtenerCantidad($request);
        $columna = obtenerColumna($request);
        $orden = obtenerOrden($request);
        $campo = obtenerCampo($request);

        $coleccion = Socio::orderBy($columna, $orden)
        ->apellido1($campo)
        ->paginate($cantidad)->appends([
            'campo' => $campo,
            'cantidad' => $cantidad,
            'columna' => $columna,
            'orden' => $orden,
        ]);
        $total_consulta = $coleccion->total();
        $total = Socio::all()->count();
        return view('home', compact('coleccion','total','total_consulta'));
    }
}

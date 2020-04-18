<?php

namespace App\Http\Controllers;

use App\Banca;
use App\Cuota;
use App\Socio;
use App\Metodo;
use App\Prestamo;
use App\Traits\CrudGenerico;
use Illuminate\Http\Request;
use App\Http\Requests\PrestamoRequest;


class PrestamoController extends Controller
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
         
        $coleccion = Prestamo::orderBy($columna, $orden)
        ->paginate($cantidad)->appends([
            'cantidad' => $cantidad,
            'columna' => $columna,
            'orden' => $orden,
        ]);
        $total_consulta = $coleccion->total();
        $total = Prestamo::all()->count();
        return view('app.prestamos.index', compact('coleccion','total','total_consulta'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cuentas = Banca::all();
        $metodos = Metodo::all();
        $colecciones = array('cuentas' => $cuentas,'metodos' => $metodos);
        return view('app.prestamos.create', compact('colecciones'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->createGenerico($request, new Prestamo);
        $prestamo = Prestamo::obtenerUltimo();
        //1 - obtener prestamo almacenado
        //2 - comprobar si existen cuotas, ssi guardar cuotas
        if($request->cuotas != null && $request->cuotas > 0){
            Cuota::agregarCuotasPrestamo($prestamo);
        }
        //3 - almacenar registro contable
        return redirect('prestamos')->with('status', 'Préstamo Registrado!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Prestamo  $prestamo
     * @return \Illuminate\Http\Response
     */
    public function show(Prestamo $prestamo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Prestamo  $prestamo
     * @return \Illuminate\Http\Response
     */
    public function edit(Prestamo $prestamo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Prestamo  $prestamo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Prestamo $prestamo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Prestamo  $prestamo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Prestamo $prestamo)
    {
        //
    }

    /**
     * Simulacion de préstamo.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function simular(PrestamoRequest $request)
    {
        $socio = Socio::obtenerSociConRut($request->rut);
        $prestamo = new Prestamo;
        $prestamo->fill($request->toArray());
        $prestamo->fill(['socio_id'=>$socio->id]);
        $cuotas = null;
        if($prestamo->cuotas != null){
            $cuotas = crearArregloCuotas($prestamo->cuotas, $prestamo->fecha, $prestamo->monto);
            //dd($cuotas[0]);
        }
        return view('app.prestamos.simular', compact('prestamo','cuotas','socio'));
    }
    
}

<?php

namespace App\Http\Controllers;

use App\Abono;
use App\Socio;
use App\Prestamo;
use App\Traits\CrudGenerico;
use Illuminate\Http\Request;
use App\Http\Requests\AbonoRequest;

class AbonoController extends Controller
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
    public function store(AbonoRequest $request)
    {
        $prestamo = Prestamo::findOrFail($request->prestamo_id);
        $suma = Prestamo::sumarAbonos($prestamo);
        if($prestamo->monto - ($suma + $request->monto) === 0){
            // Pagar préstamo
            // Preparar Request con datos de prestamo
            $prestamo->estado_id = 1; // 1 préstamo pagado
            $prestamo->update();
            $this->createGenerico($request, new Abono);
            return redirect('prestamos')->with('status', 'Prestamo Pagado!');
        }
        $this->createGenerico($request, new Abono);
        return redirect('prestamos')->with('status', 'Abono Agregado!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Abono  $abono
     * @return \Illuminate\Http\Response
     */
    public function show(Abono $abono)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Abono  $abono
     * @return \Illuminate\Http\Response
     */
    public function edit(Abono $abono)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Abono  $abono
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Abono $abono)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Abono  $abono
     * @return \Illuminate\Http\Response
     */
    public function destroy(Abono $abono)
    {
        //
    }

    /**
     * Form abonar a depósito.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function abono(Request $request)
    {
        $prestamo = Prestamo::findOrFail($request->id);
        $socio = Socio::obtenerSociConRut($prestamo->socio->rut);
        $objetos = array('prestamo' => $prestamo,'socio' => $socio);
        $abonos = Abono::all();
        $colecciones = array('abonos' => $abonos);
        $total = Prestamo::sumarAbonos($prestamo);
        return view('app.prestamos.abonar', compact('objetos','colecciones'));
    }
  
}

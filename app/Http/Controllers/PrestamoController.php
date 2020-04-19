<?php

namespace App\Http\Controllers;

use App\Banca;
use App\Cuota;
use App\Renta;
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
        $intereses = Renta::all();
        $colecciones = array('cuentas' => $cuentas,'metodos' => $metodos,'intereses' => $intereses);
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
    public function edit($id)
    {
        $prestamo = Prestamo::findOrFail($id);
        $cuentas = Banca::all();
        $metodos = Metodo::all();
        $intereses = Renta::all();
        $colecciones = array('cuentas' => $cuentas,'metodos' => $metodos,'intereses' => $intereses);
        $objetos = array('prestamo' => $prestamo);
        return view('app.prestamos.edit', compact('objetos','colecciones'));    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Prestamo  $prestamo
     * @return \Illuminate\Http\Response
     */
    public function update(PrestamoRequest $request, $id)
    {
        // metodo_id 1 D.P.P. 2 DEP
        $prestamo = Prestamo::findOrFail($id);
        // Comprobar tipo de cambio
        if($prestamo->getOriginal('metodo_id') != $request->metodo_id){
            if($request->metodo_id === '2'){
                if(Prestamo::cuotasPagadas($prestamo) != 0){
                    $nuevo_monto = $prestamo->monto - Prestamo::sumarCuotasPagadas($prestamo);
                    $request['monto'] = $nuevo_monto;
                    $request['cuotas'] = null;
                    Prestamo::eliminarCuotas($prestamo);
                    $this->updateGenerico($request, $prestamo);
                    return redirect('prestamos')->with('status', 'Prestamo Actualizado!');                    
                }else{
                    Prestamo::eliminarCuotas($prestamo);
                    $this->updateGenerico($request, $prestamo);
                    return redirect('prestamos')->with('status', 'Prestamo Actualizado!');  
                }
            }else{
                if($prestamo->abono != null){
                    $nuevo_monto = $prestamo->monto - $prestamo->abono;
                    $request['monto'] = $nuevo_monto;
                    $request['fecha_pago'] = null;
                    Cuota::agregarCuotasPrestamo($prestamo);
                    $this->updateGenerico($request, $prestamo);
                    return redirect('prestamos')->with('status', 'Prestamo Actualizado!');                    
                }else{
                    Cuota::agregarCuotasPrestamo($prestamo);
                    $this->updateGenerico($request, $prestamo);
                    return redirect('prestamos')->with('status', 'Prestamo Actualizado!');   
                }
            }
        }
        if($prestamo->cuotas != $request->cuotas){
            if(Prestamo::cuotasPagadas($prestamo) != 0){
                $nuevo_monto = $prestamo->monto - Prestamo::sumarCuotasPagadas($prestamo);
                $request['monto'] = $nuevo_monto;
                $request['cuotas'] = null;
                Prestamo::eliminarCuotas($prestamo);
                $this->updateGenerico($request, $prestamo);
                return redirect('prestamos')->with('status', 'Prestamo Actualizado!');                    
            }else{
                Prestamo::eliminarCuotas($prestamo);
                $this->updateGenerico($request, $prestamo);
                return redirect('prestamos')->with('status', 'Prestamo Actualizado!');  
            }
        }
        $this->updateGenerico($request, $prestamo);
        return redirect('prestamos')->with('status', 'Prestamo Actualizado!');
        // D.P.P a DEP.
            // Si existen cuotas pagadas
                // Calcular remanente
                // Eliminar cuotas 
                // Modificar monto
                // Modificar forma de pago
            // Si no exisisten cuotas pagadas
                // Eliminar cuotas 
                // Modificar monto
                // Modificar forma de pago
        // DEP. a D.P.P.
            // Si existe abono
                // Calcular remanente
                // Agregar cuotas 
                // Modificar monto
                // Modificar forma de pago
            // Si no existe abono
                // Agregar cuotas 
                // Modificar monto
                // Modificar forma de pago  
        // Camnio de cuotas REP.  
            // Calcular remanente
            // Agregar nuevas cuotas 
            // Modificar monto
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

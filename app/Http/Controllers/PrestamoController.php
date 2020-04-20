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
//dd($request);
        // Se crea préstamo con datos de request
        $objeto = new Prestamo;
        $objeto->fill(['id'=>$id]);
        $objeto->fill($request->except('_token','_method'));
        //dd($objeto);

        // metodo_id 1 D.P.P. 2 DEP
        $prestamo = Prestamo::findOrFail($id);
        $nuevo_monto = $request->monto;

        // Si hay cambio de metodo
        if($prestamo->getOriginal('metodo_id') != $request->metodo_id){
            // DPP a DEP
            if($request->metodo_id === '2'){                
                // Si hay cuotas pagadas
                if(Prestamo::cuotasPagadas($prestamo) != 0){
                    //dd('hay cuotas pagadas');
                    $nuevo_monto = $prestamo->monto - Prestamo::sumarCuotasPagadas($prestamo);                
                }
                //dd('no hay cuotas pagadas');
                $request['cuotas'] = null;  
                Prestamo::eliminarCuotas($prestamo);
            // DEP a DPP
            }else{
                // Si hay abono
                if($prestamo->abono != null){
                    $nuevo_monto = $prestamo->monto - $prestamo->abono;
                }
                $request['fecha_pago'] = null;

                Cuota::agregarCuotasPrestamo($objeto);  
            }
        }
        // Si hay cambio de cuotas "repactaciones"
        if($prestamo->cuotas != $request->cuotas){
            if(Prestamo::cuotasPagadas($prestamo) != 0){
                $nuevo_monto = $prestamo->monto - Prestamo::sumarCuotasPagadas($prestamo);
                $request['cuotas'] = null;                             
            }
            Prestamo::eliminarCuotas($prestamo); 
            Cuota::agregarCuotasPrestamo($objeto); 
        }
        $request['monto'] = $nuevo_monto;
        $this->updateGenerico($request, $prestamo);
        return redirect('prestamos')->with('status', 'Prestamo Actualizado!');
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
        }
        return view('app.prestamos.simular', compact('prestamo','cuotas','socio'));
    }
    
}

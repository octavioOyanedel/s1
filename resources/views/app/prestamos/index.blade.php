@extends('layouts.app')

@section('content')
<div class="ml-4 mr-4">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <!-- Administración módulo -->

                      
            <p class="h4 mb-4 mt-4"><b>Listado Préstamos</b></p>
            
            @if ($total > 0 && $total_consulta > 0)
                <x-filtro action="prestamos.index" filtro="prestamos" :total="$total_consulta"/>
                <!-- Tabla listar usuarios -->
                <x-tabla :coleccion="$coleccion" tabla="prestamos" ver="home" editar="prestamos.edit" eliminar="home" abonar="abono" estado="home"/>
                <!-- Tabla listar usuarios -->
            @else
                <div class="alert alert-warning text-center" role="alert">
                    <i class="fas fa-exclamation-triangle"></i>&nbsp;&nbsp;&nbsp;&nbsp;No existen registros.
                </div>
            @endif            
            
        </div>
    </div>

</div>
@endsection
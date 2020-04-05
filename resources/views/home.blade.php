@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            
                <!-- Tabla listar socios -->
                <x-tabla :socios="$socios" titulo="listado de Socios" />
                <!-- Tabla listar socios -->
            
        </div>
    </div>
</div>
@endsection

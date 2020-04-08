@extends('layouts.app')

@section('content')
<div class="contenedor-reset">
<!-- Contenedor formulario -->
    <div></div>
    <div>
        <!-- Default form login -->
        <form class="text-center border border-light p-5" method="POST" action="{{ route('password.email') }}">

            @csrf

            <p class="h4 mb-4"><b>Recuperar Contraseña</b></p>

            @error('email')
                <div class="error-login alert alert-danger" role="alert">
                    {{ $message }}
                </div>
            @enderror

            <!-- Email -->
            <x-input tipo="email" nombre="email" id="email" margen="mb-4" tamano="form-control-sm" valor="" placeholder="Correo" obligatorio="si"/>

            <!-- Sign in button -->
            <x-boton tipo="submit" margen="my-4" nombre="Recuperar" />

        </form>
        <!-- Default form login -->
    </div>
    <div></div>
</div>
@endsection

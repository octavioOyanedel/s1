@extends('layouts.app')

@section('content')
<div class="contenedor-login">

<!-- Contenedor formulario -->
    <div></div>
    <div>
        <!-- Default form login -->
        <form class="text-center border border-light p-5" method="POST" action="{{ route('login') }}">

            @csrf

            <p class="h4 mb-4"><b>Iniciar Sesión</b></p>

            @error('email')
                <div class="error-login alert alert-danger" role="alert">
                    {{ $message }}
                </div>
            @enderror

            <!-- Email -->
            <x-input tipo="email" nombre="email" id="email" margen="mb-4" tamano="form-control-sm" valor="" placeholder="Correo" obligatorio="si"/>

            <!-- Password -->
            <x-input tipo="password" nombre="password" id="password" margen="mb-4" tamano="form-control-sm" valor="" placeholder="Contraseña" obligatorio="si"/>

            <div class="d-flex justify-content-around">
                <div>
                    <!-- Forgot password -->
                    <a href="{{ route('password.request') }}">Recuperar contraseña</a>
                </div>
            </div>

            <!-- Sign in button -->
            <x-boton tipo="submit" margen="my-4" nombre="Ingresar" />

            <!-- Social -->
            <p class="redes-sociales">Redes sociales:</p>

            <a href="#" class="mx-2" role="button"><i class="fab fa-facebook-f light-blue-text"></i></a>

        </form>
        <!-- Default form login -->
    </div>
    <div></div>
</div>
@endsection

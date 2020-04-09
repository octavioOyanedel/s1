@error('email')
    <div class="error-login alert alert-danger" role="alert">
        {{ $message }}
    </div>
@enderror

<!-- Email -->
<x-input tipo="email" nombre="email" id="email" margen="mb-4" tamano="form-control-sm" valor="" placeholder="Correo" obligatorio="si"/>

<!-- Sign in button -->
<button class="btn btn-info btn-block my-4" type="submit">Recuperar</button>

<div class="d-flex justify-content-around">
    <div>
        <!-- Forgot password -->
        <a href="{{ route('login') }}">Ir a inicio de sesión</a>
    </div>
</div>  
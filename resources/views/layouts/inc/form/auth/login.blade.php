@error('email')
    <div class="error-login alert alert-danger" role="alert">
        {{ $message }}
    </div>
@enderror

<!-- Email -->
<x-input tipo="email" nombre="email" id="email" margen="mb-4" tamano="" valor="" placeholder="Correo" obligatorio="si"/>

<!-- Password -->
<x-input tipo="password" nombre="password" id="password" margen="mb-4" tamano="" valor="" placeholder="Contraseña" obligatorio="si"/>

<div class="d-flex justify-content-around">
    <div>
        <!-- Forgot password -->
        <a href="{{ route('password.request') }}">Recuperar contraseña</a>
    </div>
</div>

<!-- Sign in button -->
<button class="btn btn-info btn-block my-4" type="submit">Ingresar</button>

<!-- Social -->
<p class="redes-sociales">Redes sociales:</p>

<a href="#" class="mx-2" role="button"><i class="fab fa-facebook-f light-blue-text"></i></a>
<div>

    <!-- formulario -->  
    <form class="{{ $alineacion }} border border-light p-5" method="{{ $metodo }}" action="{{ route(obtenerAction($action)) }}">

		<!-- csrf -->
        @include(obtenerCsrf($csrf))
		<!-- título -->
        <p class="h4 mb-4 text-center"><b>{{ $titulo }}</b></p>
		<!-- contenido -->
        @include(obtenerContenido($contenido))

    </form>

</div>
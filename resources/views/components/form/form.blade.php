<div>

    <!-- formulario -->  
    <form class="{{ $alineacion }} border border-light p-5" method="{{ $metodo }}" @if($tipo === 'editar') action="{{ route(obtenerAction($action), obtenerObjeto($objetos, $modulo)->id) }}"@else action="{{ route(obtenerAction($action)) }}"@endif>

		<!-- csrf -->
        @include(obtenerCsrf($csrf))
		<!-- título -->
        <p class="h4 mb-4 text-center"><b>{{ $titulo }}</b></p>

		<!-- contenido -->
        @include(obtenerContenido($contenido))

    </form>

</div>


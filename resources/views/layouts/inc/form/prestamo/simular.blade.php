<form method="post" action="{{ route('prestamos.store') }}">
    @csrf
    <input type="hidden" name="fecha" value="{{ $prestamo->fecha }}">
    <input type="hidden" name="registro" value="{{ $prestamo->registro }}">
    <input type="hidden" name="banca_id" value="{{ $prestamo->banca_id }}">
    <input type="hidden" name="metodo_id" value="{{ $prestamo->metodo_id }}">
    <input type="hidden" name="cheque" value="{{ $prestamo->cheque }}">
    <input type="hidden" name="monto" value="{{ $prestamo->monto }}">
    <input type="hidden" name="fecha_pago" value="{{ $prestamo->fecha_pago }}">
    <input type="hidden" name="cuotas" value="{{ $prestamo->cuotas }}">
    <input type="hidden" name="socio_id" value="{{ $prestamo->socio_id }}">
    <!-- Botón formulario -->
    <button class="btn btn-info btn-block mt-0 btn-sm" type="submit">Solicitar</button>
</form>
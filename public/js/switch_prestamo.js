$(window).on('load',function(){

	ocultarTodo();
	var valor = null;

	$('#metodo_id').change(function(){
		valor = $('#metodo_id option:selected').val();
		switch(valor) {
			case '1':
				obligatorio($('#cuotas')); //elemento 
				mostrar($('.cuotas')); // contenedor
				noObligatorio($('#fecha_pago')); //elemento
				ocultar($('.fecha-pago')); // contenedor
				limpiar($('#fecha_pago'));
			break;
			case '2':
				noObligatorio($('#cuotas')); //elemento
				ocultar($('.cuotas')); // contenedor
				limpiar($('#cuotas'));
				obligatorio($('#fecha_pago')); //elemento
				mostrar($('.fecha-pago')); // contenedor
			break;
			default:
				ocultarTodo();
				limpiarTodo();
		}

	});

	function mostrar(elemento){
		elemento.fadeIn();
	}

	function ocultar(elemento){
		elemento.hide();
	}

	function ocultarTodo(){
		ocultar($('.fecha-pago'));
		ocultar($('.cuotas'));
	}

	function obligatorio(elemento){
		elemento.attr('required','true');
	}

	function noObligatorio(elemento){
		elemento.removeAttr('required');
	}

	function limpiar(elemento){
		elemento.val('');
	}

	function limpiarTodo(){
		$("#cuotas").val('');
		$("#fecha_pago").val('');	
	}
});
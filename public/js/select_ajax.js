$(window).on('load',function(){

	//Comprobar que tipo de página se ha cargado para completar selec dinámico
	//inmediatamente despues de carga de DOM
	
	//valor editar
	var valor_comuna = $('#comuna_id option:selected').val();
	var valor_sede = $('#sede_id option:selected').val();

	//old
	var valor_old_urbe = $('#old_urbe').val();
	var valor_old_area = $('#old_area').val();

	if(comprobarValor(valor_comuna) || comprobarValor(valor_old_urbe)){
		cargaAjax($('#urbe_id'), 'ciudades', valor_comuna)
	}

	if(comprobarValor(valor_sede) || comprobarValor(valor_old_area)){
		cargaAjax($('#area_id'), 'areas', valor_sede)
	}





	/************************
	 * FUNCIONES
	 ************************/

	function cargaAjax(elemento, nombre, id){

		$.ajaxSetup({
			headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}}
		);

		$.ajax({
			method: 'GET',
			dataType: 'json',
			url: obtenerRuta(nombre),
			data: {id: id},
			success: function(respuesta){		
				var ids = Object.values(respuesta);
				var nombres = Object.keys(respuesta);
				limpiarSelect(elemento);
				for (var i = 0; i < ids.length; i++) {
					if(parseInt(id) === parseInt(ids[i])){
						elemento.append('<option value='+ids[i]+' selected>'+nombres[i]+'</option>');
					}else{
						elemento.append('<option value='+ids[i]+'>'+nombres[i]+'</option>');	
					}					
				}
			},
			error: function(respuesta){
				console.log('error');
			}
		});
	}



	function comprobarValor(valor) {
		if(valor === ''){
			return false;
		}
		return true;
	}

	function limpiarSelect(elemento){
		elemento.empty();
		elemento.append('<option value="" selected>...</option>');		
	}

	function obtenerRuta(nombre){
		switch(nombre) {
			case 'ciudades':
				return '/cargar_ciudades';
			break;
			case 'areas':
				return '/cargar_areas';
			break;
		}
	}

});

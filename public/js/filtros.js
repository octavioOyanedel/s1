$(window).on('load',function(){

    if(obtenerValorDesdeURL('cantidad') != null){
        $('#cantidad option:selected').removeAttr('selected');
        $('#cantidad option[value="'+obtenerValorDesdeURL('cantidad')+'"]').attr("selected","selected");
    }

    if(obtenerValorDesdeURL('columna') != null){
        $('#columna option:selected').removeAttr('selected');
        $('#columna option[value="'+obtenerValorDesdeURL('columna')+'"]').attr("selected","selected");
    }

    if(obtenerValorDesdeURL('orden') != null){
        $('#orden option:selected').removeAttr('selected');
        $('#orden option[value="'+obtenerValorDesdeURL('orden')+'"]').attr("selected","selected");
    }

    function obtenerValorDesdeURL(parametro){
        /**
            0: "?cantidad=10"
            1: "10"
            index: 28
            input: "http://laravel-lab.test/home?cantidad=10&columna=nombre&orden=ASC&campo=&page="
            groups: undefined
            length: 2
        */
        var results = new RegExp('[\?&]' +parametro+ '=([^&#]*)').exec(window.location.href);
        if(results != null){
            return results[1];
        }
        return null;
    }
});
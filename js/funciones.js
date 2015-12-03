/**
 * @author juan-carp
 */

function confirmarBaja(){
	var mensaje = 'Si pulsa el boton "Aceptar", se eliminará la tarea seleccionada';
	if (confirm(mensaje)){
		return true;
	}
	// redireccion a panel-productos
	window.location = 'index.php';
	return false;
}

function validar(){

    var titulo = document.getElementById("tra_titulo").value;
    var descripcion = document.getElementById("tra_description").value;
    var fechaFin = document.getElementById("tra_fecha_fin").value;


    if ( fechaFin == null || fechaFin.length > 10 || isNaN(parseInt(fechaFin)) || /^\s+$/.test(fechaFin) ){
        alert("Debe ingresar una fecha valida, y valor numerico");
        document.getElementById("tra_fecha_fin").focus();
        return false;
    } else if( titulo == null || titulo.length == 0 || titulo.length > 80 || /^\s+$/.test(titulo) ) {
        alert("Debe completar el campo titulo");
        document.getElementById("tra_titulo").focus();
        return false;
    } else if ( descripcion == null || descripcion.length == 0 || descripcion.length > 500 || /^\s+$/.test(descripcion) ) {
        alert("Debes completar el campo descripcion");
        document.getElementById("tra_description").focus();
        return false;
    } else {
        return true;
    }

}

function validarFormatoFecha(campo) {
    var RegExPattern = /^\d{1,2}\/\d{1,2}\/\d{2,4}$/;
    if ((campo.match(RegExPattern)) && (campo!='')) {
        return true;
    } else {
        return false;
    }
}

function existeFecha(fecha){
    var fechaf = fecha.split("/");
    var day = fechaf[0];
    var month = fechaf[1];
    var year = fechaf[2];
    var date = new Date(year,month,'0');
    if((day-0)>(date.getDate()-0)){
        return false;
    }
    return true;
}
function existeFecha2 (fecha) {
    var fechaf = fecha.split("/");
    var d = fechaf[0];
    var m = fechaf[1];
    var y = fechaf[2];
    return m > 0 && m < 13 && y > 0 && y < 32768 && d > 0 && d <= (new Date(y, m, 0)).getDate();
}

function validarFechaMenorActual(date){
    var x=new Date();
    var fecha = date.split("/");
    x.setFullYear(fecha[2],fecha[1]-1,fecha[0]);
    var today = new Date();

    if (x >= today)
        return false;
    else
        return true;
}
function validarFechaCorrectamente() {
    var fecha = document.getElementById("tra_fecha_fin").value;

    if (validarFormatoFecha(fecha)){
        if (existeFecha(fecha)) {
            if(existeFecha2(fecha)) {
                if (validarFechaMenorActual(fecha)) {
                    alert ("La fecha es menor a la actual");
                }
            }
        }
    }

}
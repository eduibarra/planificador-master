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

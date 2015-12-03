<?php

require "Class/Conexion.php";
require "Class/Planificador.php";

$titulo = "Formulario de modificacion de una tarea";


$tareaDetalle = new Planificador();
$fila_tarea = $tareaDetalle->detalleTarea();

$tra_id = $_GET['tra_id'];

include 'plantillas/cabecera.php';

?>

	<div class="container">
		<h2 class="centrado"><?php echo $titulo; ?></h2>
		<form action="editar_tarea.php" role="form" method="POST">
			<div class = "form-group">
				<label for="date">Fecha</label>
				<input type="date" id = "tra_fecha_fin" name = "tra_fecha_fin" class = "form-control" value="<?php echo $fila_tarea['tra_fecha_fin']?>">
			</div>

			<div class="form-group">
				<label for="title">Titulo</label>
				<input type="text" name = "tra_titulo" id = "tra_titulo" class="form-control" placeholder="Ingrese el titulo de la tarea" value="<?php echo $fila_tarea['tra_titulo'];?>">
			</div>

			<div class="form-group">
				<label for="description">Descripcion</label>
				<textarea class="form-control"  name="tra_descripcion" id="tra_description" cols="30" rows="10"><?php echo $fila_tarea['tra_descripcion'];?></textarea>
			</div>
			<div class="modal-footer">
				<input type="hidden" id="tra_id" name="tra_id" value="<?php echo $tra_id; ?>">
				<button class="btn btn-info center-block">Modificar Tarea</button>
			</div>
		</form>

	</div>

<?php include 'plantillas/pie.php'; ?>
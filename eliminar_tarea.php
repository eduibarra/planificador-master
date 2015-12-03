<?php

require "Class/Conexion.php";
require "Class/Planificador.php";

$titulo = "Panel de eliminacion de una tarea";

$tarea = new Planificador();
$mensaje = $tarea->borrarTarea();

include 'plantillas/cabecera.php';

?>

<div class="container">
	<h2 class="centrado"><?php echo $titulo; ?></h2>
	<h3 class="centrado"><?php echo $mensaje; header("refresh:2; url=index.php") ?></h3>

</div>
<?php include 'plantillas/pie.php'; ?>

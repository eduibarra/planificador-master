<?php 
$titulo="Modificacion de una tarea";
require 'Class/Conexion.php';
require 'Class/Planificador.php';

$modificarTarea = new Planificador();
$mensaje = $modificarTarea->editarTarea();


include 'plantillas/cabecera.php';
?>
<div class="container">

			<h1><?php echo $titulo; ?></h1>

        	<h3 class="centrado"><?php echo $mensaje;?></h3>

</div>
<?php include 'plantillas/pie.php' ?>
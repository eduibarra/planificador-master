<?php

require "Class/Conexion.php";
require "Class/Planificador.php";

$titulo = "Panel de Alta de una nueva Tarea";

$tarea = new Planificador();
$mensaje = $tarea->crearTarea();
d
?>




<?php
include 'plantillas/cabecera.php';
?>
<div class="container">

    <h1><?php echo $titulo; ?></h1>

        <h1 class="centrado"><?php echo $mensaje; header("refresh:2; url=index.php");?></h1>

</div>
<?php include 'plantillas/pie.php'; ?>
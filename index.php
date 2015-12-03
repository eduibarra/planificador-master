<?php
include 'plantillas/cabeceraUser.php';
require "login/validar.php";
$usuario_nombre = $_SESSION['usuario_nombre'];
$usuario_apellido = $_SESSION['usuario_apellido'];
$titulo = "Planificador de Tareas"
?>
<div class="container" id="wrapper">
    <div id="score" class="col-md-3">
        <a href="form_crear_tarea.php"><button class="btn btn-info">Crear tarea</button></a>
        <a href="historial.php"><button class="btn btn-info">Historial</button></a>
    </div>
    <?php include 'listadoDeTareas.php'; ?>
</div>
<?php include 'plantillas/pie.php'; ?>
























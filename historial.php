<?php

require "Class/Conexion.php";
require "Class/Planificador.php";
include 'plantillas/cabecera.php';

$titulo = "Historial";

$planificador = new Planificador();
$tareas = $planificador->mostrarTareas();
$cantidad = $planificador->getCantidad();

?>
<div class="container">

    <h1 class="centrado"><?php echo $titulo; ?></h1>
    <hr>
    <h3 class="centrado">Tareas Realizadas</h3>

    <table class="table">
        <thead>
        <tr>
            <th>titulo</th>
            <th>descripcion</th>
            <th>fecha</th>
        </tr>
        </thead>

        <?php foreach ($tareas as $fila){ ?>

        <tbody>
        <tr>
            <?php

            $colorEstadoRealizado = "alert-success";
            $colorEstadoVencido = "alert-danger";
            $colorEstadoEliminado = "alert-warning";

            if ($fila['tra_estado'] == 0){
                $estadoTarea = $colorEstadoEliminado;
            } else if ($fila['tra_estado'] == 2){
                $estadoTarea = $colorEstadoRealizado;
            } else if (($fila['tra_estado'] == 3)){
                $estadoTarea = $colorEstadoVencido;
            }

            ?>

                <td class="<?php echo $estadoTarea; ?>"><?php echo $fila['tra_titulo']; ?></td>
                <td class="<?php echo $estadoTarea; ?>"><?php echo $fila['tra_descripcion']; ?></td>
                <td class="<?php echo $estadoTarea; ?>"><?php echo $fila['tra_fecha']; ?></td>

        </tr>
        <?php
        }
        ?>
        </tbody>
        <tr>
            <td colspan="5" class="info"> Se han encontrado <?php echo $cantidad;  ?> registros </td>
        </tr>
    </table>

    <hr>
    <div id ="wrapper">
        <button class="btn btn-info center-block" onclick="return window.location = 'index.php';">Volver al inicio</button>
    </div>
    <hr>
</div>
<?php include 'plantillas/pie.php'; ?>

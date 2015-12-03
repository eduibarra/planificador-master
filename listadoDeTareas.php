<?php
$titulo = 'Listado de tareas';
require 'Class/Conexion.php';
require 'Class/Planificador.php';

$tarea = new Planificador();
$listado = $tarea->listarTarea();
$cantidad = $tarea->getCantidad();

$tareaDetalle = new Planificador();
$fila_tarea = $tareaDetalle->detalleTarea();

$fila_tarea['tra_id'];
$fecha = date('Y-m-d');

?>

<div class="container">
    <h1><?php echo $titulo;?></h1>
    <?php

    if ($cantidad == 0) {
        echo 'No hay tareas para realizar...';
    }
    else {
        ?>

        <div class="table-responsive">
            <table class = "table table-striped">
                <thead>
                <tr class="active">
                    <th class = "centrado">Titulo</th>
                    <th class = "centrado">Descripcion</th>
                    <th class = "centrado">Fecha Fin</th>
                    <th colspan="3" class = "centrado" >Editar/Eliminar/Compartir</th>
                    <th class="centrado">Confirmar Tarea</th>
                </tr>
                </thead>
                <tbody>
                <?php
                //Inicio de muestreo
                foreach ($listado as $fila){
                    ?>
                    <tr>
                        <?php

                        $colorEstadoVigente = "alert-info";

                        if ($fila['tra_fecha_fin'] !== $fecha){
                            $estadoTarea="";
                        } else {
                            $estadoTarea = $colorEstadoVigente;
                        }
                        ?>
                        <td class = "<?php echo $estadoTarea ; ?>"><?php echo $fila['tra_titulo']; ?></td>
                        <td class = "<?php echo $estadoTarea; ?>"><?php echo $fila['tra_descripcion']; ?></td>
                        <td class = "<?php echo $estadoTarea; ?>"><?php echo $fila['tra_fecha_fin']; ?></td>

                        <td class="text-center <?php echo $estadoTarea; ?>"><a href = "form_editar_tarea.php?tra_id=<?php echo $fila['tra_id']; ?>"><span class="btn btn-primary glyphicon glyphicon-pencil iconos text-center" title="edita tarea"></span></a></td>
                        <td class="text-center <?php echo $estadoTarea; ?>"><a href="form_eliminar_tarea.php?tra_id=<?php echo $fila['tra_id']; ?>" ><span class="btn btn-primary glyphicon glyphicon-trash iconos" title="eliminar tarea"></span></a></td>
                        <td class="text-center <?php echo $estadoTarea; ?>"><a href=""><span class="btn btn-primary glyphicon glyphicon-share" title="Compartir tarea"></span></a></td>
                        <td class="text-center <?php echo $estadoTarea; ?>"><a href=""><span class="btn btn-primary glyphicon glyphicon-bell" title="Confirmar tarea realizada"></span></a></td>
                    </tr>
                <?php } ?>
                </tbody>
                <tr>
                    <td colspan="7" class="info"> Se han encontrado <?php echo $cantidad;  ?> registros </td>
                </tr>

            </table>
        </div>

    <?php } ?>
</div>
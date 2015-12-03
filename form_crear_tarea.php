<?php
include 'plantillas/cabecera.php';
$titulo = "Formulario para crear una Tarea";
?>
    <div class="container">

        <h2 class="centrado"><?php echo $titulo; ?></h2>
        <form action="alta_tarea.php" role="form" method="post" onsubmit="return validar()">
            <div class = "form-group">
                <label for="date">Fecha</label>
                <input type="date" id = "tra_fecha_fin" name = "tra_fecha_fin" class = "form-control" >
            </div>

            <div class="form-group">
                <label for="title">Titulo</label>
                <input type="text" name = "tra_titulo" id = "tra_titulo" class="form-control" placeholder="Ingrese el titulo de la tarea" >
            </div>

            <div class="form-group">
                <label for="description">Descripcion</label>
                <textarea class="form-control"  name="tra_descripcion" id="tra_description" cols="30" rows="10"></textarea>
            </div>
            <hr>
            <div class="form-group">
                <input type="hidden" id="tra_id" name="tra_id">
                <button type="submit" class="btn btn-info center-block">Crear Tarea</button>
            </div>
        </form>

    </div>

<?php
include 'plantillas/pie.php';
?>
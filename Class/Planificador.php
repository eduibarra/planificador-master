<?php

class Planificador
{
    private $tra_id;
    private $tra_titulo;
    private $tra_descripcion;
    private $tra_fecha_fin;
    private $cantidad;
    private $tra_estado;

//*********** Metodo para crear una tarea *************************************************
    public function crearTarea()
    {

        //Creamos las variables de trabajo

        $tra_titulo = $_POST['tra_titulo'];
        $tra_descripcion = $_POST['tra_descripcion'];
        $tra_fecha_fin = $_POST['tra_fecha_fin'];

        $fecha = date('Y-m-d');

        //Generamos la conexion a la DB y el query
        //Generamos un try para conectarnos
        try {

            $link = Conexion::conectar();

        } catch (Exception $e) {

            echo "Error en la conexion a la base de datos ", $e;

        }

        $sql = "INSERT INTO tarea VALUES (NULL, :tra_titulo, :tra_descripcion, now(), :tra_fecha_fin, 1, null, null)";

        //Preparamos el query con la sentencia

        $stmt = $link->prepare($sql);

        //Bindeamos los datos para reemplazar los alias utilizados en el sql

        $stmt->bindParam("tra_titulo", $tra_titulo, PDO::PARAM_STR);
        $stmt->bindParam('tra_descripcion', $tra_descripcion, PDO::PARAM_STR);
        $stmt->bindParam('tra_fecha_fin', $tra_fecha_fin, PDO::PARAM_INT);

        /**
         * Hacemos la verificacion si se ejecuto con exito la tarea, en caso positivo se da el alta correctamente
         * sino nos retorna error
         */
        if ((!isset($tra_fecha_fin) || ($tra_fecha_fin < $fecha))) {

            header("refresh:3; url=index.php");
            return "¡¡ERROR!!   Tiene que ingresar una fecha igual o mayor a la fecha de hoy...";

        } else {

            if ($stmt->execute() == true) {

                return "Se ha Creado la tarea correctamente";
            } else {
                return "No se ha creado la tarea";
            }

        }
    }

    public function editarTarea()
    {
        $tra_id = $_POST['tra_id'];

        $tra_titulo = $_POST['tra_titulo'];
        $tra_descripcion = $_POST['tra_descripcion'];
        $tra_fecha_fin = $_POST['tra_fecha_fin'];
        $fecha = date('Y-m-d');

        try {

            $link = Conexion::conectar();

        } catch (Exception $e) {

            echo "Error en la conexion a la base de datos ", $e;

        }

        $sql = " UPDATE tarea SET tra_titulo = :tra_titulo, tra_descripcion = :tra_descripcion, tra_fecha_fin = :tra_fecha_fin
			 WHERE tra_estado = 1 ";

        $sql.= "AND tra_id = :tra_id";

        $stmt = $link->prepare($sql);

        $stmt->bindParam(":tra_titulo", $tra_titulo, PDO::PARAM_STR);
        $stmt->bindParam(":tra_descripcion", $tra_descripcion, PDO::PARAM_STR);
        $stmt->bindParam(":tra_fecha_fin", $tra_fecha_fin, PDO::PARAM_INT);
        $stmt->bindParam(":tra_id", $tra_id, PDO::PARAM_INT);

        if ((!isset($tra_fecha_fin)||($tra_fecha_fin < $fecha))) {

            header("refresh:3; url=form_editar_tarea.php?tra_id=".$tra_id);
            return "¡¡ERROR!!   Tiene que ingresar una fecha igual o mayor a la fecha de hoy...";

        } else {

            if ( $stmt->execute() == true){

                header("refresh:3; url=index.php");
                return "Se ha modificado con exito la tarea";
            }
            else {
                return "No se pudo ejecutar la modificacion correctamente";
            }
        }
    }

    public function borrarTarea()
    {
        $tra_id = $_POST['tra_id'];

        try {

            $link = Conexion::conectar();

        } catch (Exception $e) {
            echo "Error en la conexion a la base de datos ", $e;
        }

        $sql = " UPDATE tarea SET tra_estado = 0 WHERE tra_id = :tra_id";
        $stmt = $link->prepare($sql);
        $stmt->bindParam(":tra_id", $tra_id, PDO::PARAM_INT);

        if ($stmt->execute() == true){
            return "Se elimino la tarea con exito";
        } else {
            return "Hubo un error al eliminar la tarea";
        }
    }

    public function listarTarea()
    {
        try {

            $link = Conexion::conectar();

        } catch (Exception $e) {
            echo "No se puede conectar a la base de datos ", $e;
        }

        $sql = "SELECT tra_id, tra_titulo, tra_descripcion, tra_fecha_fin
			FROM tarea
			WHERE tra_estado = 1";
        $stmt = $link->prepare($sql);
        $stmt->execute();
        $this->setCantidad($stmt->rowCount());//$this->cantidad=$stmt->rowCount();
        $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $resultado;
    }

    public function detalleTarea(){

        @$tra_id = $_GET['tra_id'];

        try {

            $link = Conexion::conectar();
            $sql = "SELECT tra_id, tra_titulo, tra_descripcion, tra_fecha_fin FROM tarea WHERE tra_id = :tra_id";
            $stmt = $link->prepare($sql);
            $stmt->bindParam(":tra_id",$tra_id,PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);

        } catch (Exception $e) {
            echo "No se puede conectar a la base de datos, por favor verifique los datos ingresados ", $e;
        }
    }

    public function mostrarTareasRealizadas()
    {
        try{

            $link = Conexion::conectar();
            $sql = "SELECT tra_descripcion, tra_fecha, tra_titulo FROM tarea WHERE tra_estado = 1";
            $stmt = $link->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);

        } catch (Exception $e) {
            echo "No se puede conectar a la base de datos, por favor verifique los datos ingresados ", $e;
        }
    }

    public function mostrarTareas()
    {
        try{

            $link = Conexion::conectar();
            $sql = "SELECT tra_titulo, tra_descripcion, tra_fecha, tra_estado FROM tarea";
            $stmt = $link->prepare($sql);
            $stmt->execute();
            $this->setCantidad($stmt->rowCount());//$this->cantidad=$stmt->rowCount();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);

        } catch (Exception $e) {
            echo "No se puede conectar a la base de datos, por favor verifique los datos ingresados ", $e;
        }
    }

    public function mostrarTareasEliminadas()
    {
        try {

            $link = Conexion::conectar();
            $sql = "SELECT tra_descripcion, tra_fecha,tra_titulo FROM tarea WHERE tra_estado = 0";
            $stmt = $link->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);

        } catch (Exception $e) {

        }

    }

    public function actualizadorEstadoTarea(){

        $tra_fecha_fin = $_POST['tra_fecha_fin'];
        $fecha = date('Y-m-d');

       try {

           $link = Conexion::conectar();

           if ($tra_fecha_fin < $fecha){
               $sql = "UPDATE tarea SET tra_estado = 3";
           }

       } catch (Exception $e) {
           echo "No se puede conectar a la base de datos, por favor verifique los datos ingresados ", $e;
       }
    }

    /**
     * Getters y Setters
     */

    public function getTraTitulo()
    {
        return $this->tra_titulo;
    }
    public function setTraTitulo($tra_titulo)
    {
        $this->tra_titulo = $tra_titulo;
    }
    public function getTraDescripcion()
    {
        return $this->tra_descripcion;
    }
    public function setTraDescripcion($tra_descripcion)
    {
        $this->tra_descripcion = $tra_descripcion;
    }
    public function getTraFechaFin()
    {
        return $this->tra_fecha_fin;
    }
    public function setTraFechaFin($tra_fecha_fin)
    {
        $this->tra_fecha_fin = $tra_fecha_fin;
    }
    public function getCantidad()
    {
        return $this->cantidad;
    }
    public function setCantidad($cantidad)
    {
        $this->cantidad = $cantidad;
    }
    public function getTraId()
    {
        return $this->tra_id;
    }
    public function setTraId($tra_id)
    {
        $this->tra_id = $tra_id;
    }
}
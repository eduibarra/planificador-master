<?php


class Usuario
{
    private $usr_id;
    private $usr_nombre;
    private $usr_apellido;
    private $usr_email;
    private $usr_pass;

    public function altaUsuario(){

//        $usr_id = $_POST['usr_id'];
        $usr_nombre = $_POST['usr_nombre'];
        $usr_apellido = $_POST['usr_apellido'];
        $usr_email = $_POST['usr_email'];
        $usr_pass = $_POST['usr_pass'];

        try {

            $link = Conexion::conectar();
            $sql = "INSERT INTO usuarios (usr_id, usr_nombre, usr_apellido, usr_email, usr_pass)
                    VALUES (NULL , :usr_nombre, :usr_apellido, :usr_email, :usr_pass )";
            $stmt = $link->prepare($sql);
//            $stmt->bindParam(":usr_id", $usr_id, PDO::PARAM_INT);
            $stmt->bindParam(":usr_nombre", $usr_nombre, PDO::PARAM_STR);
            $stmt->bindParam(":usr_apellido", $usr_apellido, PDO::PARAM_STR);
            $stmt->bindParam(":usr_email", $usr_email, PDO::PARAM_STR);
            $stmt->bindParam(":usr_pass", $usr_pass, PDO::PARAM_STR);

            if($stmt->execute() == true){
                return "El alta se dio exitosamente";
            } else {
                return "No se realizo el alta correspondiente";
            }

        } catch (Exception $e) {
            echo "No se puede establecer la conexion con la base de datos",$e;
        }
    }

    /**
     * Getters y setters
     */

    public function getUsrId()
    {
        return $this->usr_id;
    }
    public function setUsrId($usr_id)
    {
        $this->usr_id = $usr_id;
    }
    public function getUsrNombre()
    {
        return $this->usr_nombre;
    }
    public function setUsrNombre($usr_nombre)
    {
        $this->usr_nombre = $usr_nombre;
    }
    public function getUsrApellido()
    {
        return $this->usr_apellido;
    }
    public function setUsrApellido($usr_apellido)
    {
        $this->usr_apellido = $usr_apellido;
    }
    public function getUsrEmail()
    {
        return $this->usr_email;
    }
    public function setUsrEmail($usr_email)
    {
        $this->usr_email = $usr_email;
    }
    public function getUsrPass()
    {
        return $this->usr_pass;
    }
    public function setUsrPass($usr_pass)
    {
        $this->usr_pass = $usr_pass;
    }
}
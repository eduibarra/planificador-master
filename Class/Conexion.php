<?php

class Conexion{

    const SERVER = 'localhost';
    const BASE = 'planificador';
    const USUARIO = 'root';
    const CLAVE = '';

    static $link;

    private function __construct(){}//no se puede utilizar new, porque no necesito crear un objeto

    static function conectar(){
        $opciones = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");

        self::$link = new PDO(
            'mysql:host='.self::SERVER.';dbname='.self::BASE, self::USUARIO, self::CLAVE, $opciones
        );
        self::$link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        return self::$link;
    }

}
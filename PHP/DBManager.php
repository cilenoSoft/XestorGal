<?php

require_once 'servicio.php';
class DBManager
{

    var $conect;
    private $url;
    private $uri;


    //Método constructor
    function DBManager()
    {
    }

    //Método que se encargará de verificar e realizar
    //a conexión co servicio
    function conexion()
    {
        try {
            $con = new servicio;
            if ($con) {
                $this->conect = $con;
                return true;
            }
            return false;
        } catch (Exception $e) {
            echo "Error conectando co servicio";
            exit();
        }
    }
}

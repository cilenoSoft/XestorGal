<?php


class DBManager
{

    var $conect;
    private $url;
    private $uri;


    //Método constructor
    function DBManager()
    {
        $this->url = "http://localhost/xestorgal-master/PHP/ImplementaServicio.php";

        $this->uri = "http://localhost/PHP/servicio";
    }

    //Método que se encargará de verificar e realizar
    //a conexión co servicio
    function conexion()
    {
        try {
            $con = new SoapClient("http://localhost/xestorgal-master/PHP/documentoWdsl.xml", array('location' => $this->url, 'uri' => $this->uri, 'soap_version' => SOAP_1_1));

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

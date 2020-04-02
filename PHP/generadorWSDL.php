<?php


require_once("servicio.php");

// Ruta a WSDLDocument

require_once("WSDLDocument.php");


$wsdl = new WSDLDocument(

    "Servicio",

    "http://localhost/xestorgal/servicio/servicio.php",

    "http://localhost/xestorgal/servicio"

);

echo $wsdl->saveXml();

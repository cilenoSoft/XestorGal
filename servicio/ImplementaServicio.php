<?php

require_once 'servicio.php';

$server = new SoapServer("http://localhost/xestorgal/servicio/documentoWdsl.xml");

$server->setClass('Servicio');

$server->handle();

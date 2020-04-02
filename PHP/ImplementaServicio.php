<?php

require_once 'servicio.php';

$server = new SoapServer("http://localhost/PHP/documentoWdsl.xml");

$server->setClass('Servicio');

$server->handle();

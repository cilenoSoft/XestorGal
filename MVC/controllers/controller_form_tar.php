<?php
if (!isset($_SESSION))
session_start();
require_once '../../PHP/sesion.php';
comprobaSesion();
require_once '../models/m_equipo.php';
require_once '../models/m_usuario.php';
$usuario = new Usuario;
$usuario->getDatosUsuario($_SESSION['idUsuario']);
$ruta = $_SESSION['rutaIMG'];
$login = $_SESSION['login'];
$loginImg = 'img_' . $_SESSION['login'];
$rol = $_SESSION['rol'];
$c_equipo = new Equipo;
$c_equipo->getEquipoID($_SESSION['equipo']);

require_once "../views/view_form_tar.php";

<?php
if (!isset($_SESSION))
session_start();
require_once '../../PHP/sesion.php';
comprobaSesion();
require_once '../models/m_usuario.php';
require_once '../models/m_equipo.php';

$usuario = new Usuario;
$usuario->getDatosUsuario($_SESSION['idUsuario']);
$ruta = $usuario->ruta;
$login = $_SESSION['login'];
$rol = $usuario->rol;
$equipo = new Equipo;
$equipo->getEquipo($_SESSION['nombreEquipo']);
$_SESSION['equipo'] = $equipo->id;
$loginImg = 'img_' . $usuario->login;
require_once("../views/view_equipo.php");

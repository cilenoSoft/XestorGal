<?php
if (!isset($_SESSION))
session_start();
require_once '../../PHP/sesion.php';
comprobaSesion();
require_once '../models/m_usuario.php';
$usuario = new Usuario;
$usuario->getDatosUsuario($_SESSION['idUsuario']);
$ruta = $_SESSION['rutaIMG'];
$login = $_SESSION['login'];
$loginImg = 'img_' . $_SESSION['login'];
$rol = $_SESSION['rol'];
require_once "../views/view_form_user.php";
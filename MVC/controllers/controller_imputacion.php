<?php
if (!isset($_SESSION))
session_start();
require_once '../../PHP/sesion.php';
comprobaSesion();
require_once '../models/m_usuario.php';
$usuario = new Usuario;
$idUsuario = $_SESSION['idUsuario'];
$usuario->getDatosUsuario($idUsuario);
$fecha = $_POST['FECHA'];
$nombreEquipo = $_SESSION['nombreEquipo'];

$horasImputadas = $usuario->getHorasImputacionUsuario($fecha);
$imputacion = $usuario->getimputacionUsuario($fecha);
require_once "../views/view_imputacion.php";
?>
<script>
    selTar();
</script>
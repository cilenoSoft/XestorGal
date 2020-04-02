<?php
if (!isset($_SESSION))
session_start();
require_once '../../PHP/sesion.php';
comprobaSesion();
require_once '../models/m_tarefas.php';
require_once '../models/m_usuario.php';
$usuario = new Usuario;
$usuario->getDatosUsuario($_SESSION['idUsuario']);
$idUsuario = $_SESSION['idUsuario'];
$tarefas = new Tarefas;
$idUsuario = $_SESSION['idUsuario'];
$ruta = $_SESSION['rutaIMG'];
$login = $_SESSION['login'];
$loginImg = 'img_' . $_SESSION['login'];
$rol = $_SESSION['rol'];
$estadosTarefa = $tarefas->getEstadosTarefa();
$tareafasFinalizadas = $tarefas->getTarefasUsuarioEstado($idUsuario, 'FINALIZADA');
require_once("../views/view_tar_fin.php");

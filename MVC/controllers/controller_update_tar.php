<?php
if (!isset($_SESSION))
    session_start();
require_once '../../PHP/sesion.php';
comprobaSesion();
require_once '../models/m_tarefas.php';


function insertaComentario($idTarefa, $idUsuario, $comentario, $equipo, $estado, $login)
{
    $c_tarefas = new Tarefas;

    date_default_timezone_set('Europe/Madrid');
    $fecha = 'Y-m-d H:i:s';
    $fechaActual = date($fecha);
    $comentario = trim($comentario, ' ');

    $resultado = $c_tarefas->insertaComentarioTarefa($idTarefa, $login, $comentario, $equipo, $fechaActual, $estado);
    if ($resultado) {
        echo 'OK';
    } else {
        echo 'KO';
    }
}

$idUsuario = $_SESSION['idUsuario'];
$equipo = $_SESSION['equipo'];
$idTarefa = $_POST['tarefa'];
$comentario = $_POST['comentario'];
$estado = $_POST['estado'];
$login = $_SESSION['login'];

insertaComentario($idTarefa, $idUsuario, $comentario, $equipo, $estado, $login);

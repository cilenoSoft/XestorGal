<?php
if (!isset($_SESSION))
session_start();
require_once '../../PHP/sesion.php';
comprobaSesion();
require_once '../models/m_tarefas.php';
require_once '../models/m_usuario.php';

function creaTarefaUsuario($login, $titulo, $descripcion, $usuarioTarefa)
{
    $c_usuario = new Usuario;

    $c_usuario->getDatosUsuarioLogin($login);
    $idEquipo = $_SESSION['equipo'];

    date_default_timezone_set('Europe/Madrid');
    $fecha = 'Y-m-d H:i:s';
    $fechaActual = date($fecha);

    $c_tarefas = new Tarefas;
    $inserta = $c_tarefas->insertaTarefa($titulo, $descripcion, $usuarioTarefa, $login, $c_usuario->id, $idEquipo, $fechaActual);
    if ($inserta)

        echo "Tarefa creada correctamente. ";
    else
        echo "Erro o crear a tarefa.";
}

$login = $_POST['user'];

if (isset($_SESSION['login']) && isset($_POST['tituloTarefa']) && isset($_POST['descripcionTarefa']) && isset($_POST['user'])) {
    $login = $_SESSION['login'];
    $titulo = $_POST['tituloTarefa'];
    $descripcion = $_POST['descripcionTarefa'];
    $usuarioAsignado = $_POST['user'];
    creaTarefaUsuario($login, $titulo, $descripcion, $usuarioAsignado);
} else {
    echo "Error, campos vacios.";
}

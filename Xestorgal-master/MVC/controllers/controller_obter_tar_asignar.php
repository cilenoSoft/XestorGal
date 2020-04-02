<?php
if (!isset($_SESSION))
session_start();
require_once '../../PHP/sesion.php';
comprobaSesion();
require_once '../models/m_tarefas.php';

$c_tarefas = new Tarefas;
$login = $_SESSION['login'];
$idUsuario = $_POST['idUsuario'];
$idEquipo = $_SESSION['equipo'];

$datos = $c_tarefas->getTarefasEquipo($idEquipo, 'SEN ASIGNAR');

if (!$datos) {
    echo 'Non se atoparon rexistros.';
} else {

    foreach ($datos as $tarefa) {
        $idTarefa = $tarefa->id;
        $fecha = $tarefa->fecha_creacion;
        $estado = $tarefa->estado;
        $descripcion = $tarefa->descripcion;
        $titulo = 'Titulo: ' . $tarefa->titulo;
        $fecha = 'Data: ' . $fecha . '  Estado: ' . $estado;
        echo "<p>$titulo</p>";
        echo '<p>Estado: ' . $estado . '</p>';
        echo "<p>$descripcion</p>";
        echo "<input type = 'hidden' id='userTar' value = '$idUsuario'>";
        echo "<button class='btn btn-primary asignaTarefa' value='$idTarefa'>Asignar</button>";
        echo "<div class='line'></div>";
    }
}

<?php
if (!isset($_SESSION))
session_start();
require_once '../../PHP/sesion.php';
comprobaSesion();
require_once '../models/m_usuario.php';


$c_usuario = new Usuario;
$idUsuario = $_POST['idUsuario'];

$c_usuario->getTarefasUsuario($idUsuario);

if (!$c_usuario->tarefas) {
    echo 'Non se atoparon rexistros.';
} else {
    foreach ($c_usuario->tarefas as $tarefa) {
        $idTarefa = $tarefa->id;
        $fecha = $tarefa->fecha_creacion;
        $estado = $tarefa->estado;
        $descripcion = $tarefa->descripcion;
        $titulo = 'Titulo: ' . $tarefa->titulo;
        echo "<p>$titulo</p>";
        echo '<p>Estado: ' . $estado . '</p>';
        echo "<p>$descripcion</p>";

        if ($tarefa->comentarios) {

            $comentario = $tarefa->ultimoComentario;
            echo '<p></p>';
            echo '<small>Ultimo comentario:</small>';
            echo '<p></p>';
            echo "<small>$comentario</small>";
            echo '<p></p>';
        }
        echo "<input type = 'hidden' id='userTar' value = '$idUsuario'>";
        echo "<button class='btn btn-primary desAsignaTarefa' value='$idTarefa'>Desasignar</button>";
        echo "<div class='line'></div>";
    }
}

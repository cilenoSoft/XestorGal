<?php
if (!isset($_SESSION))
session_start();
require_once '../../PHP/sesion.php';
comprobaSesion();

require_once '../models/m_tarefas.php';

$tar = $_POST['tar'];
$c_tarefas = new Tarefas;
$c_tarefas->getDatosTarefa($tar);

if (!$c_tarefas->comentarios) {
    echo 'Non se atoparon rexistros.';
} else {
    foreach ($c_tarefas->comentarios as $comentrioTar) {
        $fecha = $comentrioTar['FECHA'];
        $estado = $comentrioTar['ESTADO'];
        $comentario = $comentrioTar['COMENTARIO'];
        $usuario = 'Usuario: ' . $comentrioTar['LOGIN_USUARIO'];
        $fecha = 'Data: ' . $fecha . '  Estado: ' . $estado;
        echo "</br>";
        echo "<small>$fecha</small>";
        echo "</br>";
        echo "<small>$usuario</small>";
        echo "</br>";
        echo "<small>$comentario</small>";
        echo "<div class='line'></div>";
    }
}

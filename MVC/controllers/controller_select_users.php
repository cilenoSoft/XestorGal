<?php
if (!isset($_SESSION))
session_start();
require_once '../../PHP/sesion.php';
comprobaSesion();
require_once '../models/m_equipo.php';
require_once '../models/m_usuario.php';
$c_usuario = new Usuario;

$datos = $c_usuario->getUsuarios();
$numMembros = $_POST['numMembro'];

if (!$datos) {
    echo 'Non se atoparon usuarios';
} else {
    for ($i = 1; $i <= $numMembros; ++$i) {
        $usuarioSel = 'usuario_' . $i;
        echo "<label for='membroEquipo'>Membro " . $i . '</label>';
        echo "<select name='$usuarioSel' id='$usuarioSel' class='form-control'>";
        foreach ($datos as $fila) {
            $usuario = $fila['LOGIN'];
            echo "<option>$usuario</option>";
        }
        echo '</select>';
        echo "<span class='help-block' id='error'></span>";
    }
}

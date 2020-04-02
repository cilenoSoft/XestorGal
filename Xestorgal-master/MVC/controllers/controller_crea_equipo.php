<?php
if (!isset($_SESSION))
    session_start();
require_once '../../PHP/sesion.php';
comprobaSesion();
require_once '../models/m_equipo.php';
require_once '../models/m_usuario.php';

function creaEquipoUsuario($login, $nombre, $listaUsuariosEquipo)
{
    //establecemos a conexión
    $i = 1;
    $c_equipo = new Equipo;
    $c_usuario = new Usuario;
    $idUsuario = $_SESSION['idUsuario'];

    $idEquipo = $c_equipo->insertaEquipo($nombre, $idUsuario);
    $_SESSION['idEquipo'] = $idEquipo;
    if (!$idEquipo) {
    } else {
        foreach ($listaUsuariosEquipo as $usuarioAsignado) {
            if ($usuarioAsignado != null && $usuarioAsignado != '') {

                $idUsuarioAsig = $c_usuario->getDatosUsuarioLogin($usuarioAsignado)->id;

                $resultado = $c_equipo->insertaUsuarioEquipo($idUsuarioAsig, $idEquipo);
            }
            ++$i;
        }
    }
}

$login = $_SESSION['login'];
$nombre = $_POST['nombreEquipo'];

for ($i = 1; $i <= 10; ++$i) {
    $usuario = 'usuario_' . $i;
    if (!isset($_POST[$usuario])) {
        break;
    }

    $listaUsuariosEquipo[$i] = $_POST[$usuario];
    echo $_POST[$usuario];
}

/*
  $usuarioAsignado = $_POST['usuario'];
 */

creaEquipoUsuario($login, $nombre, $listaUsuariosEquipo);

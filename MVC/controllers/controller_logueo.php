<?php
require_once '../models/m_usuario.php';

$contraseñaCorrecta = false;

$login = $_POST['login'];
$pass = $_POST['password'];

$usuario = new Usuario;

$usuario->getDatosUsuarioLogin($login);

if (!$usuario->id) {
    echo 'KO';
} else {

    $passBD = $usuario->passEnc;
    $idUsuario =  $usuario->id;
    $rutaImg =  $usuario->ruta;
    $rol =  $usuario->rol;

    if (!$usuario->compruebaContrasena($pass)) {
        echo 'KO';
    }
}

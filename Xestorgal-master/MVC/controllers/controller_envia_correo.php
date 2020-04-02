<?php
if (!isset($_SESSION))
session_start();
require_once '../../PHP/sesion.php';
comprobaSesion();
require_once '../models/c_mailer.php';
require_once '../models/m_usuario.php';

function enviaCorreo($email, $login, $asunto, $contido)
{

    $c_mailer = new c_mailer();

    if ($c_mailer->enviaCorreoContacto($email, $login, $asunto, $contido)) {
        echo 'OK';
    } else {
        echo 'KO';
    }
}

$c_usuario = new Usuario;
$idUsuario = $_SESSION['idUsuario'];
$c_usuario->getDatosUsuario($idUsuario);
$email = $c_usuario->email;
$login = $c_usuario->login;
$asunto = $_POST['asunto'];
$contido = $_POST['contido'];
enviaCorreo($email, $login, $asunto, $contido);

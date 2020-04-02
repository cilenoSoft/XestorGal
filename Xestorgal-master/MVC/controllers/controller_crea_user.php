<?php
if (!isset($_SESSION))
session_start();
require_once '../../PHP/sesion.php';
comprobaSesion();
require_once '../models/m_equipo.php';
require_once '../models/m_usuario.php';

function generaPassAleatorio()
{
    $logitud = 8;
    $psswd = substr(md5(microtime()), 1, $logitud);

    return $psswd;
}

function insertaUsuario($login, $email, $rol)
{
    // Comprobación de que os contrasinais introducidos son correctos (validado tamén con jquery)

    //establecemos conexion coa bd


    $c_usuario = new Usuario;
    $datosLogin = $c_usuario->getDatosUsuarioEmail($email);
    $c_equipo = new Equipo;
    $datosEmail = $c_usuario->getDatosUsuarioLogin($login);
    $pass = generaPassAleatorio();

    if ($datosLogin || $datosEmail) {
        echo "KO";
    } else {
        //encriptamos o contrasinal introducido para insertalo na bd
        $passEnc = password_hash(
            base64_encode(
                hash('sha256', $pass, true)
            ),
            PASSWORD_DEFAULT
        );

        $insertaUsuario = $c_usuario->insertaUsuario($login, $passEnc, $email, 'USER');
        if ($insertaUsuario) {
            $idUsuario = $c_usuario->getDatosUsuarioLogin($login)->id;

            $equipo = $_SESSION['equipo'];

            $resultado = $c_equipo->insertaUsuarioEquipo($idUsuario, $equipo);

            if ($resultado) {
                echo 'Usuario creado correctamente.';
            } else {
                echo 'Erro ó rexistrar, tenteo de novo.';
            }
        } else {
            echo 'Erro ó rexistrar, tenteo de novo.';
        }
    }
}


$login = $_POST['login'];
$email = $_POST['email'];
$rol = $_POST['rol'];
insertaUsuario($login, $email, $rol);

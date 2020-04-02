<?php
if (!isset($_SESSION))
session_start();
require_once '../../PHP/sesion.php';
comprobaSesion();
require_once '../models/m_usuario.php';

function insertaUsuario($login, $pass, $email, $cPass, $rol)
{
    // Comprobación de que os contrasinais introducidos son correctos (validado tamén con jquery)
    if ($pass == $cPass) {
        //establecemos conexion coa bd

        $c_usuario = new Usuario;
        $datosEmail = $c_usuario->getDatosUsuarioEmail($email);
        $c_usuario = new Usuario;
        $datosLogin = $c_usuario->getDatosUsuarioLogin($login);

        if ($datosLogin || $datosEmail) {
            return "KO";
        } else {
            //encriptamos o contrasinal introducido para insertalo na bd
            $passEnc = password_hash(
                base64_encode(
                    hash('sha256', $pass, true)
                ),
                PASSWORD_DEFAULT
            );

            $resultado = $c_usuario->insertaUsuario($login, $passEnc, $email, $rol);

            if ($resultado != null) {
                echo "<script>alert('O usuario foi rexistrado correctamente, xa pode iniciar sesión.');</script>";
                header('Refresh: 1; URL=../../index.html');
            } else {
                echo "<script>alert('Erro ó rexistrar, tenteo de novo.');</script>";
                echo "<script>window.history.back();</script>";
            }
        }
    } else {
        echo "<script>alert('Os contrasinais non coinciden.');</script>";
        echo "<script>window.history.back();</script>";
    }
}

$login = $_POST['login'];
$email = $_POST['email'];
$pass = $_POST['password'];
$cPass = $_POST['cpassword'];
$rol = $_POST['rol'];
insertaUsuario($login, $pass, $email, $cPass, $rol);

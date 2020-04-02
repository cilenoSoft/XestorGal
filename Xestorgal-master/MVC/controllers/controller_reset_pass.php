<?php
if (!isset($_SESSION))
session_start();
require_once '../../PHP/sesion.php';
comprobaSesion();
require_once '../models/m_usuario.php';
require_once '../models/c_mailer.php';

$login = $_POST['login'];
$email = $_POST['email'];
$pass = generaPassAleatorio();

resetPass($login, $email, $pass);

function resetPass($login, $email, $pass)
{

    $c_usuario = new Usuario;

    $usuarioEmail = $c_usuario->getDatosUsuarioEmail($email);

    $c_usuario = new Usuario;

    $usuarioLogin = $c_usuario->getDatosUsuarioLogin($login);


    if ($usuarioEmail->id != $usuarioLogin->id) {
        echo '<script type="text/javascript">
        alert("Error, datos incorrectos.");
        window.history.back();
        </script>';
    } else {

        $resultado = $c_usuario->updatePassUser($pass);

        if ($resultado) {
            $c_mailer = new c_mailer;
            if ($c_mailer->enviaCorreoReseteoPassword($c_usuario->email, $pass)) {
                echo '<script type="text/javascript">
                    alert("Eviose un correo a \"' . $email . '\" co novo contrasinal.");
                    </script>';
                header('Refresh:0,url= ../../index.php');
            } else {
                echo '<script type="text/javascript">
                alert("Non se puido enviar o correo, tenteo de novo.");
                window.history.back();
                </script>';
            }
        } else {
            echo '<script type="text/javascript">
            alert("Erro o resetear o contrasinal.");
            window.history.back();
            </script>';
        }
    }
}

function generaPassAleatorio()
{
    $logitud = 8;
    $psswd = substr(md5(microtime()), 1, $logitud);
    return $psswd;
}

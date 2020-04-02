<?php
if (!isset($_SESSION))
session_start();
require_once '../../PHP/sesion.php';
comprobaSesion();
require_once '../models/m_usuario.php';
require_once '../models/c_mailer.php';

function cambiaContraseña($pass, $novaPass)
{

    $c_usuario = new Usuario;

    $c_usuario->getDatosUsuario($_SESSION['idUsuario']);

    if (!$c_usuario->id) {
        echo '<script type="text/javascript">
        alert("Error o obter os datos do usuario.");
        </script>';
    } else {
        $comprobaPass =  $c_usuario->comprobaPassUser($pass);

        if ($comprobaPass) {
            $resultado = $c_usuario->updatePassUser($novaPass);

            if ($resultado) {
                $c_mailer = new c_mailer;

                if ($c_mailer->enviaCorreoReseteoPassword($c_usuario->email, $pass)) {
                    echo '<script type="text/javascript">
                    alert("Cambiose o contrasinal correctamente.");
                    </script>';
                    header('Refresh:0,url= controller_conta.php');
                } else {
                    echo '<script type="text/javascript">
                alert("Non se puido enviar o correo, tenteo de novo.");
                </script>';
                    header('Refresh:0,url= ../html/form_cambia_pass.html');
                }
            }
        } else {
            echo '<script type="text/javascript">
            alert("Contrasinal incorrecto.");
            </script>';
            header('Refresh:0,url= ../controllers/form_cambia_pass.php');
        }
    }
}

$pass = $_POST['password'];
$novaPass = $_POST['password_new'];
cambiaContraseña($pass, $novaPass);

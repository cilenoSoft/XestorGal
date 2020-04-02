<?php
function comprobaSesion()
{
    if (!isset($_SESSION['login'])) {
        echo '<script>alert("Requirese iniciar sesión para continuar.");</script>';
        header('Refresh: 0; URL=../../index.html');
    }

    if (isset($_SESSION['tiempo'])) {
        //Teempo en segundos para dar vida a sesión.
        $tmpMaxInactivo = 600; //10min en este caso.

        //Calculamos o tempo de vida inactivo.
        $vida_session = time() - $_SESSION['tiempo'];

        //Compraración para redirixir a páxina de logueo, se a vida de sesión e maior o tempo marcado.
        if ($vida_session > $tmpMaxInactivo) {
            //Removemos sesión.
            session_unset();
            //Destruimos sesión.
            session_destroy();
            //Redirigimos pagina.
            echo '<script>alert("Esgotado o tempo de sesion, requirese iniciar sesión para continuar.");</script>';
            header('Refresh: 0; URL=../index.html');

            exit();
        }
    }
    //Activamos sesion tiempo.
    $_SESSION['tiempo'] = time();
}

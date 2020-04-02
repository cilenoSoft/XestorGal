<?php
if (!isset($_SESSION['equipo'])) {
        echo 'O usuario non pertence a ningún equipo.';
        exit();
}
?>
<!DOCTYPE html>
<html lang="es">

<head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="icon" href="#">
        <title>XestorGal</title>

        <!-- Bootstrap CSS CDN -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">

        <!-- Custom CSS -->
        <link rel="stylesheet" type="text/css" href="../../css/xestor.css">
        <link rel="stylesheet" type="text/css" href="../../css/tarefa.css">
        <link type="text/css" rel="stylesheet" href="../../css/sidebar.css">
        <link type="text/css" rel="stylesheet" href="../../css/navbar.css">

        <!-- Font Awesome JS -->
        <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous">
        </script>
        <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous">
        </script>

        <!-- JS -->
        <script src="../../js/xestor.js"></script>


        <!-- jQuery AJAX -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

        <!-- Popper.JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous">
        </script>

        <!-- Bootstrap JS -->
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous">
        </script>

</head>

<body>
        <script>
                sideVarCollapse();
        </script>
        <div class="wrapper">

                <?php require_once "view_sidebar.php"; ?>

                <div id="content">
                        <?php require_once "view_navbar.php"; ?>

                        <div id="pageContent">

                                <!-- Page Content  -->

                                <div class='row'>

                                        <!-- Tarefas Sin Asignar -->
                                        <div class='col-sm-6 col-md-6 col-lg-3'>
                                                <div class='hTareas'>Sen Asignar</div>

                                                <?php
                                                if ($tareafasSinAsignar)
                                                        foreach ($tareafasSinAsignar as $fila) {
                                                                $loginUsuario = "";
                                                                $tarefas = $fila;
                                                                require 'view_tarefa_eq.php';
                                                        }
                                                ?>
                                        </div>
                                        <!-- Fin tareafasSinAsignar -->

                                        <!-- Tarefas Pendentes -->
                                        <div class='col-sm-6 col-md-6 col-lg-3'>
                                                <div class='hTareas'>Pendentes</div>
                                                <?php
                                                if ($tareafasPendentes)
                                                        foreach ($tareafasPendentes as $fila) {
                                                                $idTarefa = $fila->id;
                                                                $tarefas = $fila;
                                                                $userTar = $tarefas->getUsuariosTarefa($idTarefa);

                                                                if ($userTar) {
                                                                        $user = new Usuario;

                                                                        $user->getDatosUsuario($userTar[0]);

                                                                        if (!$user->id) {
                                                                                echo "ERROR";
                                                                        } else {
                                                                                $ruta = $user->ruta;
                                                                                $loginUsuario = $user->login;

                                                                                require 'view_tarefa_eq.php';
                                                                        }
                                                                }
                                                        }
                                                ?>
                                        </div>
                                        <!-- Fin Tarefas Pendentes -->

                                        <!-- Tarefas En Proceso -->
                                        <div class='col-sm-6 col-md-6 col-lg-3'>
                                                <div class='hTareas'>En Proceso</div>
                                                <?php
                                                if ($tareafasEnProceso)
                                                        foreach ($tareafasEnProceso as $fila) {
                                                                $idTarefa = $fila->id;
                                                                $tarefas = $fila;
                                                                $userTar = $tarefas->getUsuariosTarefa($idTarefa);
                                                                if ($userTar) {
                                                                        $user = new Usuario;

                                                                        $user->getDatosUsuario($userTar[0]);

                                                                        if (!$user->id) {
                                                                                echo "ERROR";
                                                                        } else {
                                                                                $ruta = $user->ruta;
                                                                                $loginUsuario = $user->login;

                                                                                require 'view_tarefa_eq.php';
                                                                        }
                                                                }
                                                        }
                                                ?>
                                        </div>
                                        <!-- Fin Tarefas En Proceso -->

                                        <!-- Tarefas Finalizadas -->
                                        <div class='col-sm-6 col-md-6 col-lg-3'>
                                                <div class='hTareas'>Finalizadas</div>
                                                <?php
                                                if ($tareafasFinalizadas)
                                                        foreach ($tareafasFinalizadas as $fila) {
                                                                $idTarefa = $fila->id;
                                                                $tarefas = $fila;

                                                                $userTar = $tarefas->getUsuariosTarefa($idTarefa);

                                                                if ($userTar) {
                                                                        $user = new Usuario;

                                                                        $user->getDatosUsuario($userTar[0]);

                                                                        if (!$user->id) {
                                                                                echo "ERROR";
                                                                        } else {
                                                                                $ruta = $user->ruta;
                                                                                $loginUsuario = $user->login;

                                                                                require 'view_tarefa_eq.php';
                                                                        }
                                                                }
                                                        }
                                                ?>
                                        </div>
                                        <!-- Fin Tarefas Finalizadas -->

                                </div>
                                <script>
                                        creaHistorial();
                                </script>

                                <!-- Page Content  -->
                                <p></p>
                                <p></p>
                        </div>
                </div>
        </div>
</body>

</html>
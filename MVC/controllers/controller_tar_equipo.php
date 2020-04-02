<?php
if (!isset($_SESSION))
session_start();
require_once '../../PHP/sesion.php';
comprobaSesion();
require_once '../models/m_usuario.php';
require_once '../models/m_tarefas.php';
$usuario = new Usuario;
$usuario->getDatosUsuario($_SESSION['idUsuario']);
$ruta = $_SESSION['rutaIMG'];
$login = $_SESSION['login'];
$loginImg = 'img_' . $_SESSION['login'];
$rol = $_SESSION['rol'];

        if (!isset($_SESSION['equipo'])) {
                echo 'O usuario non pertence a ningún equipo.';
        } else {
                $equipo = $_SESSION['equipo'];

                $tarefas = new Tarefas;

                $tareafasEnProceso = $tarefas->getTarefasEquipo($equipo, 'EN PROCESO');

                $tarefas = new Tarefas;
                $tareafasSinAsignar = $tarefas->getTarefasEquipo($equipo, 'SEN ASIGNAR');

                $tarefas = new Tarefas;
                $tareafasPendentes = $tarefas->getTarefasEquipo($equipo, 'PENDENTE');

                $tarefas = new Tarefas;
                $tareafasFinalizadas =  $tarefas->getTarefasEquipo($equipo, 'FINALIZADA');
        }
        require_once "../views/view_tar_equipo.php";
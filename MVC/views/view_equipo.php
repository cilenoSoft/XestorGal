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
                <?php
                if (!isset($_SESSION['nombreEquipo'])) {
                    echo 'Non pertences a ningún equipo.';
                    exit();
                }
                ?>

                <div class="tz-gallery">
                    <?php echo "<div class='hTareas'>$equipo->nombre</div>"; ?>
                    <div class="row">

                        <?php
                        foreach ($equipo->usuarios as $usuario) {
                            require 'view_user_eq.php';
                        }
                        ?>
                    </div>
                </div>


                </br>
                <form id="engadirMembro-form" onsubmit="return false" action="#" method="POST">
                    <div class="form-body">
                        <div class="form-group" id="selectUsuarios">
                            <div class='row'>
                                <div class='col-3'>
                                    <label>Engadir Membro:</label>
                                    <select name='usuario_1' id='usuario1' class='form-control'>
                                        <?php
                                        $datos = $usuario->getUsuarios();
                                        if ($datos) {
                                            foreach ($datos as $fila) {
                                                $usuario = $fila['LOGIN'];
                                                echo "<option>$usuario</option>";
                                            }
                                        } else {
                                            echo "<option>Non se atoparon usuarios sen equipo.</option>";
                                        }
                                        ?>
                                    </select>
                                    <span class='help-block' id='error'></span>
                                </div>
                            </div>
                            <div class='form-footer'>
                                <?php
                                echo "<button type='submit' onclick='engadirMembro();' class='btn btn-info'>Engadir membro</button>";
                                ?>
                            </div>
                        </div>
                    </div>
                </form>
                <script>
                    modalAsignarTarefas();
                    modalTarefasAsignadas();
                </script>
                <!-- Page Content  -->
                <p></p>
                <p></p>
            </div>
        </div>
    </div>
</body>

</html>
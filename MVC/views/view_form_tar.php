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
    <link rel="stylesheet" type="text/css" href="../../css/forms.css">
    <link type="text/css" rel="stylesheet" href="../../css/sidebar.css">
    <link type="text/css" rel="stylesheet" href="../../css/navbar.css">

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous">
    </script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous">
    </script>

    <!-- JS -->

    <script src="../../js/xestor.js"></script>
    <script src="../../js/jquery-1.9.1.min.js"></script>
    <script src="../../js/jquery.validate.min.js"></script>
    <script src="../../js/jquery.validate.js"></script>

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
            <p></p>
            <!-- Page Content  -->
            <div id="pageContent">
                <div class="row">
                    <div class="col-12">
                        <div class="row justify-content-center align-items-center">
                            <div id="alerta">
                                <form id="tarefa-form" class="form-horizontal" onsubmit="return false" action="#">

                                    <h3 class="form_title">Crear Nova Tarefa!</h3>


                                    <div class="control-group">
                                        <label class="control-label">Titulo</label>
                                        <div class="controls">
                                            <input name="titulo" id="titulo" type="text" class="form-control">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>


                                    <div class="control-group">
                                        <label class="control-label" id="selectUsuarios">Asignar a usuario</label>

                                        <select name="usuario" id="usuario" class="form-control">

                                            <?php
                                            if (!$c_equipo->usuarios) {
                                                echo '<option>NA</option>';
                                            } else {
                                                echo '<option selected>NA</option>';
                                                foreach ($c_equipo->usuarios as $fila) {
                                                    $usuario = $fila->login;
                                                    echo "<option>$usuario</option>";
                                                }
                                            }
                                            ?>
                                        </select>

                                        <span class="help-block"></span>
                                    </div>


                                    <div class="control-group">
                                        <label class="control-label">Descripción</label>
                                        <textarea name='descripcion' id='descripcion' class="form-control" rows="3"></textarea>
                                    </div>

                                    <p></p>
                                    <div class="control-group">
                                        <div class="form-footer">
                                            <button class="btn btn-info crearTarefa" onclick="creaTarefa();"> Crear Tarefa </button>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- FIN Page Content  -->
            </div>
        </div>
</body>

</html>
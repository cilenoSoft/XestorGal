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
    <link rel="stylesheet" type="text/css" href="../../css/conta.css">
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
        textInput();
        selDate();
        sideVarCollapse();
        selTar();
    </script>
    <div class="wrapper">

        <?php require_once "view_sidebar.php"; ?>

        <div id="content">
            <?php require_once "view_navbar.php"; ?>
            <p></p>
            <div id="pageContent">

                <!-- Page Content  -->

                <div class="row">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-sm-3 col-md-2 col-lg-3 col-xl-1">
                                <?php
                                echo '<h3>' . strtoupper($login) . '</h3>';
                                ?>
                            </div>
                            <div class="col-1"></div>
                            <div class="col-sm-4 col-md-4 col-lg-4 col-xl-6">
                                <form id='formSubir' onsubmit="return false" action="#" method='post' enctype='multipart/form-data'>
                                    <input type="file" name="file-3" id="file-3" class="inputfile inputfile-3" data-multiple-caption="{count} archivos seleccionados" multiple />
                                    <label for="file-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="iborrainputfile" width="20" height="17" viewBox="0 0 20 17">
                                            <path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z">
                                            </path>
                                        </svg>
                                        <span class="iborrainputfile" id="textFile">Mudar foto</span>
                                        <row>
                                            <div class="col-sm-3">
                                                <input type='submit' id="enviar" onclick="subirImaxe();" class="btn btn-info is-hide" name='enviar' value='Enviar' />
                                            </div>
                                        </row>
                                    </label>
                                </form>
                            </div>
                        </div>

                        <div class="row">

                            <div class="imgConta col-12 col-lg-auto col-xl-auto">
                                <?php
                                echo "<img src='$ruta' class='img-responsive' alt='$loginImg'/>";
                                ?>
                            </div>

                            <div class="col-sm-12 col-md-12 col-lg-auto col-xl-auto">
                                <blockquote class="blockquote_User">
                                    <?php
                                    echo '<p>' . strtoupper($login) . '<small>&nbsp;&nbsp;(' . $rol . ')</small></p>';
                                    ?>
                                </blockquote>
                                <p> <i class="fas fa-envelope"></i>
                                    <?php
                                    echo $email;
                                    ?>
                                    <br /><br />
                                    <i class="fas fa-calendar"></i>
                                    <?php
                                    echo $fechaRexistro;
                                    ?>
                                </p>
                                <small>
                                    <a class="enlace cambiaPass" href="controller_cambia_pass.php">Mudar Contrasinal</a>
                                </small>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="row">

                    <div class="font-12 col-12">

                        <p></p>
                        <div class='hAct col-12'>Actividade recente
                        </div>

                        <small>Actividade de hoxe:</small>
                        <p></p>

                        <div id="actividade">
                            <?php
                            if ($actividades) {
                                echo '<table class="table table-hover">';
                                echo '<tr>';
                                echo  '<th>Titulo Tarefa</th>';
                                echo  '<th>Descripcion</th>';
                                echo  '<th>Comentario</th>';
                                echo  '<th>Estado</th>';
                                echo  '<th>Equipo</th>';
                                echo  '<th>Fecha</th>';
                                echo '</tr>';
                                foreach ($usuario->actividades as $actividade) {
                                    echo  '<tr>';
                                    echo  '<td>' . $actividade->tituloTarefa . '</td>';
                                    echo  '<td>' . $actividade->descripcion . '</td>';
                                    echo  '<td>' . $actividade->comentario . '</td>';
                                    echo  '<td>' . $actividade->estado . '</td>';
                                    echo  '<td>' . $actividade->nombreEquipo . '</td>';
                                    echo  '<td>' . $actividade->fecha . '</td>';
                                    echo  '</tr>';
                                }
                                echo '</table>';
                            }
                            ?>
                        </div>

                    </div>
                </div>

                <div class="row">

                    <div class="font-12 col-12">

                        <p></p>
                        <div class='hAct col-12'>Imputación de actividade
                        </div>

                        <label>
                            Seleccione unha data:
                            <input type="date" id="datepicker" />
                        </label>
                        <p></p>

                        <div id="imputacion">
                        </div>
                    </div>


                    <p></p>
                    <p></p>
                </div>
                <!-- FIN Content  -->
            </div>
        </div>
    </div>
</body>

</html>
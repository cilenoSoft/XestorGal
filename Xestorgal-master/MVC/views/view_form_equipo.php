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
    <script src="../../js/jquery-1.9.1.min.js"></script>
    <script src="../../js/jquery.validate.min.js"></script>
    <script src="../../js/jquery.validate.js"></script>
    <script src="../../js/formEquipo.js"></script>
    <script src="../../js/xestor.js"></script>

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
        creaSelect();
    </script>
    <div class="wrapper">

        <?php require_once "view_sidebar.php"; ?>

        <div id="content">
            <?php require_once "view_navbar.php"; ?>
            <p></p>
            <!-- Page Content  -->
            <div class="row">
                <div class="col-12">
                    <p></p>
                    <div class="row justify-content-center align-items-center">

                        <form class="form-horizontal" id="formCreaEq" onsubmit="return false" action="#" method="POST">
                            <h3 class="form_title">Crear Novo Equipo!</h3>


                            <div class="control-group">
                                <label class="control-label">Nombre</label>
                                <div class='controls'>
                                    <input id="nombreEquipo" name="nombreEquipo" type="text" class="form-control">
                                    <span class="help-block" id="error"></span>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">Numero de membros</label>
                                <input id="numMembros" name="numeroMembros" type="text" class="form-control">
                                <span class="help-block"></span>
                            </div>

                            <div class='control-group' id='selectUsuarios'>
                            </div>

                            <div class="control-group">
                                <button type="submit" id="botonCrearEquipo" class="btn btn-info" disabled>
                                    <span class="glyphicon glyphicon-log-in"></span> Crear Equipo
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- FIN Page Content  -->
            </div>
        </div>
</body>

</html>
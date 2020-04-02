<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <title>XestorGal</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">

    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="../../css/xestor.css">
    <!-- JS -->
    <script src="../../js/jquery-1.9.1.min.js"></script>
    <script src="../../js/jquery.validate.js"></script>
    <script src="../../js/register.js"></script>
    <script src="../../js/xestor.js"></script>

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>


</head>

<body>

    <div class="row">

        <div class="col-sm-6 col-md-4">
            <div class="volver">
                <button class="btn btn-info" onclick="volver()"><i class="fas fa-arrow-alt-circle-left"></i> Volver</button>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row justify-content-center align-items-center minh-80">
            <form class="form-horizontal" id="register-form" action="../controllers/controller_rexistra_usuario.php" method="POST">
                <div class="control-group">
                    <h2>Rexístrate!</h2>
                    <label class="control-label" for="inputName">Login :</label>
                    <div class="controls">
                        <input type="text" class="form-control" name="login" placeholder="Login">
                        <span class="help-block" id="error"></span>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="inputEmail">Email :</label>
                    <div class="controls">
                        <input type="text" class="form-control" name="email" placeholder="aaaa@gmail.com">
                        <span class="help-block" id="error"></span>
                    </div>
                </div>

                <div class="row">

                    <div class="form-group col-lg-6">
                        <div class="control-group">
                            <label class="control-label" for="inputPass">Contrasinal :</label>
                            <div class="controls">
                                <input type="password" class="form-control" name="password" id="password" placeholder="******">
                            </div>
                            <span class="help-block" id="error"></span>
                        </div>
                    </div>
                    <div class="form-group col-lg-6">
                        <div class="control-group">
                            <label class="control-label" for="inputCPass">Repita o contrasinal :</label>
                            <div class="controls">
                                <input type="password" class="form-control" name="cpassword" placeholder="******">
                                <span class="help-block" id="error"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-sm-6 col-md-4">
                        <label>Tipo de perfil:</label>
                        <div class="controls">
                            <select name="rol" class="form-control">
                                <option value="USER">USER</option>
                                <option value="MASTER">MASTER</option>
                            </select>
                            <span class="help-block" id="error"></span>
                        </div>
                    </div>


                </div>

                <div class="row">
                    <div class="control-group col-sm-6 col-md-4">
                        <div class="controls">
                            <button type="submit" id="rexistraUsuario" onclick="" class="btn btn-info">Enviar</button>
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>
</body>

</html>
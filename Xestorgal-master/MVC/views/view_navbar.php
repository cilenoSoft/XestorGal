<script>
    cambiarEquipo();
</script>
<nav class="navbar navbar-expand-lg .navbar-text ">
    <div class="container-fluid">

        <button type="button" id="sidebarCollapse" class="btn btn-info">
            <i class="fas fa-align-left"></i>
        </button>

        <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent">
            <i class="fas fa-align-justify"></i>
        </button>
        <div id="overlay">
            <div class="cv-spinner">
                <span class="spinner"></span>
            </div>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link tarEnCurso" href="controller_tar_user.php">As miñas tarefas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link tarEquipo" href="controller_tar_equipo.php">Tarefas do Equipo</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link crearTarefa" href="controller_form_tar.php">Crear Tarefa</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link equipo" href="controller_equipo.php">Equipo</a>
                </li>
                <li>
                    <?php
                    $usuario->obterEquipos();
                    ?>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- Sidebar  -->
<nav id="sidebar">
    <div class="sidebar-header">

        <h3 id='cabecera_navBar'>
            <a class='home conta' href='controller_conta.php'>XestorGal </a>
        </h3>
        <strong>XTR</strong>
        <?php
        echo "<img id='imgUsuario' src='$ruta' alt='$loginImg' width='200' />";
        echo '<span>' . $rol . '</span>';
        ?>
    </div>

    <ul class="list-unstyled components">
        <li class="active">
            <a class="conta" href="controller_conta.php">
                <i class="fas fa-home"></i> A miña conta
            </a>
        </li>
        <li>

            <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                <i class="fas fa-copy"></i> Tarefas
            </a>
            <ul class="collapse list-unstyled" id="pageSubmenu">
                <li>
                    <a class="tarEnCurso" href="controller_tar_user.php">As miñas tarefas</a>
                </li>
                <li>
                    <a class="tarFinalizadas" href="controller_tar_finalizadas.php">Tarefas Finalizadas</a>
                </li>
                <li>
                    <a class="crearTarefa" href="controller_form_tar.php">Crear Tarefas</a>
                </li>
            </ul>

            <a href="#pageSubmenu2" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                <i class="fas fa-users"></i> Equipo
            </a>
            <ul class="collapse list-unstyled" id="pageSubmenu2">
                <li>
                    <a class="equipo" href="controller_equipo.php">Equipo</a>
                </li>
                <li>
                    <a class="tarEquipo" href="controller_tar_equipo.php">Tarefas do Equipo</a>
                </li>
                <li>
                    <a class="crearEquipo" href="controller_form_equipo.php">Crear Equipo</a>
                </li>
                <li>
                    <a class="creaUser" href="controller_form_user.php">Crear Usuario</a>
                </li>
            </ul>
        </li>
        <li>
            <a class="contacto" href="controller_contacto.php">
                <i class="fas fa-envelope"></i> Contacto
            </a>
        </li>
        <li>
            <a href="../controllers/controller_pechar_sesion.php">
                <i class="fas fa-window-close"></i> Pechar Sesión
            </a>
        </li>
    </ul>


</nav>
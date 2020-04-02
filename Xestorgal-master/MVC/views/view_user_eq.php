<div class="col-lg-4">

    <?php
    echo "<a class='lightbox' href='" . $usuario->ruta . "'>";
    echo "<img src='" . $usuario->ruta . "' height='150' alt='$usuario->login' />";
    echo "</a>";
    ?>
    <blockquote class="blockquote_User">

        <?php echo strtoupper($usuario->login); ?>

        <small>

            <br /> <i class="fas fa-envelope"></i>

            <?php echo $usuario->email; ?>

            <br /> <i class="fas fa-user-tag"></i>

            <?php echo $usuario->rol; ?>

            <br /> <i class="fas fa-calendar"></i>
            <?php echo $usuario->fechaRexistro; ?>
        </small>

        <p></p>
        <!-- mostra as tarefas en estado SIN ASIGNAR para seleccionar unha e asignala o membro do equipo -->
        <button class='btn btn-primary verTarefas btn-asinTar' data-toggle='modal' data-target='#myModal' value='<?php $usuario->id; ?>'>Asignar tarefa</button>
        </button>
        <!-- modal no que se mostran as tarefas -->
        <?php include_once '../../html/asignarTarefas.html'; ?>

        <!-- mostra as tarefas en estado SIN ASIGNAR para seleccionar unha e asignala o membro do equipo -->
        <button class='btn btn-primary verTarefasAsignadas btn-asinTar' data-toggle='modal' data-target='#myModal2' value='<?php echo $usuario->id; ?>'>Tarefas Asignadas</button>
        </button>
        <!-- modal no que se mostran as tarefas -->
        <?php include_once '../../html/tarefasAsignadas.html'; ?>
    </blockquote>

    <p></p>
</div>
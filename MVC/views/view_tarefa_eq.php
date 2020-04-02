<div class='col-sm-6 col-md-6 col-lg-12 tarefas'>

    <div class='row'>

        <div class='col-sm-6 col-md-7 col-lg-7'>
            <h4 class="titulotarefas">
                <?php echo $tarefas->titulo; ?>
            </h4>
        </div>

        <div class='col-sm-12 col-md-6 col-lg-5'>
            <?php
            if ($loginUsuario != "") {
                echo "<img id='imgUsuario' src='$ruta' alt='$loginUsuario'/>";
            }
            ?>
        </div>

    </div>

    <div class='row'>
        <div class='col-12'>
            <p class="descripcionSmall">
                <?php echo $tarefas->descripcion; ?>
            </p>
        </div>
    </div>

    <div class='row'>
        <div class='col-sm-6 col-md-5 col-lg-6'>
            <input name="idtarefas" type="hidden" value=<?php echo $tarefas->id ?>>
            <button class='btn btn-info verHistorial verHistorialSmall' data-toggle='modal' data-target='#myModal' value=<?php echo $tarefas->id ?>>Ver Historial</button>

            <?php
            include '../../html/historialTarefas.html'; ?>
        </div>

    </div>

    <div class='row'>
        <div class='col-12'>
            <div class='line'></div>
        </div>
    </div>
</div>
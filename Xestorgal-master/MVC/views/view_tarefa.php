<div class='col-sm-6 col-md-12 col-lg-12 tarefa'>

    <div class='row'>
        <div class='col-sm-7 col-md-5 col-lg-7'>
            <h2 class="tituloTarefa"> <?php echo $tarefa->titulo; ?></h2>
        </div>

        <div class='col-sm-6 col-md-5 col-lg-5'>

            <input name="idTarefa" type="hidden" value="<?php echo $tarefa->id ?>">
            <button class='btn btn-info verHistorial' data-toggle='modal' data-target='#myModal' value="<?php echo $tarefa->id ?>">Ver Historial</button>
            <?php include '../../html/historialTarefas.html'; ?>
        </div>
    </div>

    <div class='row'>

        <div class='col-6'>
            <p class="descripcionSmall"><?php $tarefa->descripcion; ?></p>

        </div>
    </div>

    <div class='row'>

        <div class='col-6'>
            <p class="etiqueta descripcionSmall">Ultimo Comentario:</p>
        </div>
    </div>

    <div class='row'>

        <div class='col-6'>
            <?php
            if ($tarefa->ultimoComentario == null || $tarefa->ultimoComentario == '') {
                echo '<p class="descripcionSmall">Sin comentario</p>';
            } else {
                echo '<p class="descripcionSmall">' . $tarefa->ultimoComentario . '</p>';
            }
            ?>
        </div>
    </div>

    <form onsubmit='return false' action='#' method='post'>
        <div class='row'>
            <div class='col-sm-6 col-md-6 col-lg-5'>
                <p class="etiqueta descripcionSmall">Estado Actual:</p>
                <?php
                echo "<select name='estado' id='estado_$tarefa->id' class='form-control'>";

                foreach ($estadosTarefa as $est) {
                    $estadoTar = $est['ESTADO'];
                    if ($tarefa->estado == $estadoTar) {
                        echo "<option selected>$estadoTar</option>";
                    } else {
                        echo "<option>$estadoTar</option>";
                    }
                }
                echo "</select>";
                ?>
            </div>
        </div>

        <p></p>

        <div class='row'>

            <div class='col-6'>
                <p class="etiqueta descripcionSmall">Engadir comentario:</p>

            </div>
        </div>

        <div class='row'>

            <div class='col-9'>
                <?php
                echo "<textarea name='comentario' id='comentario_$tarefa->id' class='form-control textAreaComentario' rows='3'></textarea>";
                ?>

            </div>
        </div>

        <p></p>

        <div class='row'>
            <?php
            echo "<input name='tarefa' id='tarefa_$tarefa->id' type='hidden' value='$tarefa->id'>";
            ?>
            <div class='col-6'>

                <?php
                echo "<button type='submit' class='btn btn-info' onclick='updateTar($tarefa->id);'>Actualizar Tarefa</button>";
                ?>

            </div>
        </div>

    </form>

    <div class='row'>
        <div class='col-10'>
            <div class='line'></div>
        </div>
    </div>

</div>
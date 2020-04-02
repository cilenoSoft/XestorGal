<?php

if ($horasImputadas)
    echo "<small>Horas imputadas: $horasImputadas de 8 horas.<small>";
else
    echo "<small>Horas imputadas: 0 de 8 horas.<small>";

if ($imputacion) {

    echo '<table class="table table-hover tableImputacion">';
    echo '<tr>';
    echo '<th>Titulo Tarefa</th>';
    echo '<th>Estado</th>';
    echo '<th>Comentario</th>';
    echo '<th>Tempo(h)</th>';
    echo '<th>Data</th>';
    echo '<th>Equipo</th>';
    echo '</tr>';

    foreach ($imputacion as $imp) {
        echo '<tr>';
        echo '<td>' . $imp->tituloTarefa . '</<td>';
        echo '<td>' . $imp->estado . '</td>';
        echo '<td>' . $imp->comentario . '</td>';
        echo '<td>' . $imp->tempo . '</td>';
        echo '<td>' . $imp->fecha . '</td>';
        echo '<td>' . $imp->nombreEquipo . '</td>';
        echo '<tr>';
    }
} else {
    echo '<table class="table table-hover tableImputacion">';
    echo '<tr>';
    echo '<th>Titulo Tarefa</th>';
    echo '<th>Estado</th>';
    echo '<th>Comentario</th>';
    echo '<th>Tempo(h)</th>';
    echo '<th>Data</th>';
    echo '<th>Equipo</th>';
    echo '</tr>';
}
?>

<form id="form-rexistra-imputacion" onsubmit="return false" action="#" method="POST">
    <tr>
        <td>
            <select name="tarefas" id="selectTarefas" class="form-control custom-select sm-3">
                <?php
                foreach ($usuario->tarefas as $fila) {
                    $TAREFA = $fila->titulo;
                    echo "<option>$TAREFA</option>";
                }
                ?>
            </select>
        </td>
        <td>
            <input type="text" class="form-control" id="estado" name="estado" placeholder="EN PROCESO">
        </td>
        <td>
            <textarea class="form-control textAreaTable" id="comentario" name="comentario" placeholder="..."></textarea>
        </td>
        <td>
            <input type="text" class="form-control" id="tempo" name="tempo" placeholder="1">
        </td>
        <td>
            <?php echo '<input type="date" class="form-control" id="fecha" name="fecha" value="' . $fecha . '" readonly>'; ?>
        </td>
        <td>
            <?php echo '<input type="text" class="form-control" id="nombreEquipo" name="nombreEquipo" value="' . $nombreEquipo . '" readonly>' ?>
        </td>
    </tr>
    </table>
    <?php
    echo '<input type="text" class="form-control" id="idUsuario" name="idUsuario" value=" ' . $_SESSION['idUsuario'] . '" hidden>';
    echo '<input type="text" class="form-control" id="idEquipo" name="idEquipo" value=" ' . $_SESSION['equipo'] . ' " hidden>'; ?>
    <input class="btn btn-info" type="submit" name="enviarImputacion" value="Rexistrar Imputación" onclick="rexistraImputacion();">
</form>
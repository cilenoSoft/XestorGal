<?php
require_once("../../PHP/DBManager.php");

/**

 * Clase Tarefas

 * @author Diego Vázquez

 */
class Tarefas
{
    public $id;
    public $titulo;
    public $descripcion;
    public $estado;
    public $estadosTarefa;
    public $ultimoComentario;
    public $usuario_ultimo_estado;
    public $usuario_creador;
    public $fecha_creacion;
    public $fecha_ultima_modificacion;
    public $fechaFinalizacion;
    public $fechEntrega;
    public $equipo;
    public $comentarios = [];
    public $tarefasUsuario = [];
    public $tarefasEquipo = [];

    function Tarefas()
    {
    }

    /**

     * Devolve os datos dunha tarefa polo seu id
     * 

     * @param string $idTarefa

     * @return array

     */
    public function getDatosTarefa($idTarefa)
    {
        $con = new DBManager;
        if ($con->conexion() == true) {
            $datos = $con->conect->getDatosTarefa($idTarefa);
        }
        if (!$datos) {
            return null;
        } else {
            $this->id = $datos[0]['ID'];
            $this->titulo = $datos[0]['TITULO'];
            $this->descripcion = $datos[0]['DESCRIPCION'];
            $this->comentarios = $con->conect->getComentariosTarefa($idTarefa);
            if ($this->comentarios != null)
                $this->ultimoComentario = $this->comentarios[0]['COMENTARIO'];
            $this->estado = $datos[0]['ESTADO'];
            $this->usuario_ultimo_estado = $datos[0]['USUARIO_ULTIMO_ESTADO'];
            $this->usuario_creador = $datos[0]['USUARIO_CREADOR'];
            $this->fecha_creacion = $datos[0]['FECHA_CREACION'];
            $this->fecha_ultima_modificacion = $datos[0]['FECHA_ULTIMA_MODIFICACION'];
            $this->fechaFinalizacion = $datos[0]['FECHA_FINALIZACION'];
            $this->fechEntrega = $datos[0]['FECHA_ENTREGA'];
            $this->equipo = $datos[0]['EQUIPO'];
            return $this;
        }
    }


    /**

     * Devolve as tarefas en determinado estado dun equipo

     * 

     * @param string $idEquipo
     * @param string $estado

     * @return array

     */
    public function getTarefasEquipo($idEquipo, $estado)
    {

        $con = new DBManager;
        if ($con->conexion() == true) {
            $datos = $con->conect->getTarefasEquipo($idEquipo, $estado);
        }
        if (!$datos) {
            return null;
        } else {
            foreach ($datos as $dato) {
                $tarefa = new Tarefas;
                $tarefa->id = $dato['ID'];
                $tarefa->titulo = $dato['TITULO'];
                $tarefa->descripcion = $dato['DESCRIPCION'];
                $tarefa->comentarios = $con->conect->getComentariosTarefa($tarefa->id);
                if ($tarefa->comentarios != null)
                    $tarefa->ultimoComentario = $tarefa->comentarios[0]['COMENTARIO'];
                $tarefa->estado = $dato['ESTADO'];
                $tarefa->usuario_ultimo_estado = $dato['USUARIO_ULTIMO_ESTADO'];
                $tarefa->usuario_creador = $dato['USUARIO_CREADOR'];
                $tarefa->fecha_creacion = $dato['FECHA_CREACION'];
                $tarefa->fecha_ultima_modificacion = $dato['FECHA_ULTIMA_MODIFICACION'];
                $tarefa->fechaFinalizacion = $dato['FECHA_FINALIZACION'];
                $tarefa->fechEntrega = $dato['FECHA_ENTREGA'];
                $tarefa->equipo = $dato['EQUIPO'];
                $this->tarefasEquipo[] = $tarefa;
            }

            return  $this->tarefasEquipo;
        }
    }

    /**

     * Devolve as tarefas dun usuario nun determinado estado

     * 

     * @param string $login

     * @return array $tarefas

     */
    function getTarefasUsuarioEstado($idUsuario, $estado)
    {
        $con = new DBManager;
        if ($con->conexion() == true) {
            $this->tarefasUsuario = [];
            $datos = $con->conect->getTarefasUsuarioEstado($idUsuario, $estado);
        }
        if (!$datos) {
            return null;
        } else {
            foreach ($datos as $dato) {
                $tarefa = new Tarefas;
                $tarefa->id = $dato['ID'];
                $tarefa->titulo = $dato['TITULO'];
                $tarefa->descripcion = $dato['DESCRIPCION'];
                $tarefa->comentarios = $con->conect->getComentariosTarefa($tarefa->id);
                if ($tarefa->comentarios != null)
                    $tarefa->ultimoComentario = $tarefa->comentarios[0]['COMENTARIO'];
                $tarefa->estado = $dato['ESTADO'];
                $tarefa->usuario_ultimo_estado = $dato['USUARIO_ULTIMO_ESTADO'];
                $tarefa->usuario_creador = $dato['USUARIO_CREADOR'];
                $tarefa->fecha_creacion = $dato['FECHA_CREACION'];
                $tarefa->fecha_ultima_modificacion = $dato['FECHA_ULTIMA_MODIFICACION'];
                $tarefa->fechaFinalizacion = $dato['FECHA_FINALIZACION'];
                $tarefa->fechEntrega = $dato['FECHA_ENTREGA'];
                $tarefa->equipo = $dato['EQUIPO'];
                $this->tarefasUsuario[] = $tarefa;
            }
            return $this->tarefasUsuario;
        }
    }

    /**

     * Devolve os usuarios dunha tarefa polo ID de tarefa

     * 

     * @param string $idTarefa

     * @return array

     */
    public function getUsuariosTarefa($idTarefa)
    {

        $con = new DBManager;
        if ($con->conexion() == true) {
            $this->tarefasUsuario = [];
            $datos = $con->conect->getUsuariosTarefa($idTarefa);
        }
        if (!$datos) {
            return null;
        } else {
            return $datos;
        }
    }

    /**

     * Devolve os estados posibles das tarefas

     * 

     * @return array

     */
    public function getEstadosTarefa()
    {
        $con = new DBManager;
        if ($con->conexion() == true) {
            $this->tarefasUsuario = [];
            $datos = $con->conect->getEstadosTarefa();
        }
        if (!$datos) {
            return null;
        } else {
            $this->estadosTarefa = $datos;
            return $datos;
        }
    }

    //  INSERT
    /**

     * INSERT unha nova tarefa
     * 

     * @param string $titulo
     * @param string $descripcion
     * @param string $usuarioTarefa
     * @param string $login
     * @param string $idUsuario
     * @param string $idEquipo
     * @param string $idEquipo
          
     * @return boolean
      
     */
    public function insertaTarefa($titulo, $descripcion, $usuarioTarefa, $login, $idUsuario, $idEquipo, $fechaActual)
    {
        $con = new DBManager;
        if ($con->conexion() == true) {
            $this->tarefasUsuario = [];
            $datos = $con->conect->insertaTarefa($titulo, $descripcion, $usuarioTarefa, $login, $idUsuario, $idEquipo, $fechaActual);
        }
        if (!$datos) {
            return null;
        } else {
            return $datos;
        }
    }
    /**

     * Inserta un comentario para a tarefa

     * 

     * @param string $idTarefa
          
     * @param string $login 
          
     * @param string $comentario
          
     * @param string $equipo
          
     * @param string $fechaActual     
     
     * @param string $estado     
    
     * @return boolean

     */
    public function insertaComentarioTarefa($idTarefa, $login, $comentario, $equipo, $fechaActual, $estado)
    {
        $con = new DBManager;
        if ($con->conexion() == true) {
            $this->tarefasUsuario = [];
            $datos = $con->conect->insertaComentarioTarefa($idTarefa, $login, $comentario, $equipo, $fechaActual, $estado);
        }
        if (!$datos) {
            return null;
        } else {
            return $datos;
        }
    }

    //  UPDATE
    /**

     * UPDATE os datos dunha tarefa polo seu id
     * 

     * @param string $idTarefa


     */
    public function desAsignaTarefa($idTarefa, $userXestor)
    {
        $con = new DBManager;
        if ($con->conexion() == true) {
            $datos = $con->conect->desAsignaTarefa($idTarefa, $userXestor);
        }
        if (!$datos) {
            return null;
        } else {
            return $datos;
        }
    }

    /**

     * UPDATE os datos dunha tarefa polo seu id
     * 

     * @param string $idTarefa
     * @param string $estado
     
     * @return string
      
     */
    public function asignaTarefa($idTarefa, $userXestor, $idUsuarioAsignar)
    {
        $con = new DBManager;
        if ($con->conexion() == true) {
            $datos = $con->conect->asignaTarefa($idTarefa, $userXestor, $idUsuarioAsignar);
        }
        if (!$datos) {
            return null;
        } else {
            return $datos;
        }
    }


    /**

     * UPDATE os datos dunha tarefa polo seu id
     * 
     * 
     */
    function tarefa($ruta, $loginUsuario)
    {

        echo "<div class = 'col-sm-6 col-md-6 col-lg-12 tarefa'>";

        echo "<div class = 'row'>";

        echo "<div class = 'col-sm-6 col-md-7 col-lg-7'>";
        echo '<h2 class="tituloTarefa">' . $this->titulo . '</h2>';
        echo '</div>';

        echo "<div class = 'col-sm-12 col-md-6 col-lg-5'>";

        if ($loginUsuario != "") {
            echo "<img id='imgUsuario' src='$ruta' alt='$loginUsuario'/>";
        }
        echo '</div>';

        echo '</div>';

        echo "<div class = 'row'>";
        echo "<div class='col-sm-6 col-md-5 col-lg-6'>";
        echo '<input name="idTarefa" type="hidden" value="' . $this->id . '">';
        echo "<button class='btn btn-info verHistorial verHistorialSmall' data-toggle='modal' data-target='#myModal' value='$this->id'>Ver Historial</button>";
        include '../html/historialTarefas.html';
        echo '</div>';

        echo '</div>';

        echo "<div class='row'>";
        echo "<div class='col-12'>";
        echo '<p class="descripcionSmall">' . $this->descripcion . '<p>';
        echo '</div></div>';

        echo "<div class='row'>";
        echo "<div class='col-12'>";
        echo "<div class='line'></div>";
        echo '</div></div></div>';
    }

    function tarefa3()
    {

        echo "<div class = 'col-sm-6 col-md-6 col-lg-12 tarefa'>";

        echo "<div class = 'row'>";

        echo "<div class = 'col-sm-6 col-md-5 col-lg-5'>";
        echo '<h2 class="tituloTarefa">' . $this->titulo . '</h2>';
        echo '</div>';

        echo "<div class='col-sm-6 col-md-5 col-lg-6'>";
        echo '<input name="idTarefa" type="hidden" value="' . $this->id . '">';
        echo "<button class='btn btn-info verHistorial' data-toggle='modal' data-target='#myModal' value='$this->id'>Ver Historial</button>";
        include '../html/historialTarefas.html';
        echo '</div>';

        echo '</div>';

        echo "<div class='row'>";

        echo "<div class='col-sm-6 col-md-6 col-lg-5'>";

        echo '<blockquote class="blockquote_User">';
        echo '<small class="descripcionSmall"> Fecha fin: ' . $this->fechaFinalizacion . '</small>';
        echo '</blockquote>';
        echo '</div>';
        echo '</div>';

        echo "<div class='row'>";

        echo "<div class='col-6'>";
        echo '<p class="descripcionSmall">' . $this->descripcion . '</p>';

        echo '</div></div>';

        echo "<div class='row'>";

        echo "<div class='col-6'>";
        echo '<p class="etiqueta descripcionSmall">Ultimo Comentario:</p>';

        echo '</div></div>';

        echo "<div class='row'>";

        echo "<div class='col-6'>";
        if ($this->ultimoComentario == null || $this->ultimoComentario == '') {
            echo '<p class="descripcionSmall">Sin comentario</p>';
        } else {
            echo '<p class="descripcionSmall">' . $this->ultimoComentario . '</p>';
        }

        echo '</div></div>';

        echo "<div class='row'>";

        echo "<div class='col-10'>";
        echo "<div class='line'></div>";

        echo '</div></div></div>';
    }
}

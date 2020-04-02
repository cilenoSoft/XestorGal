<?php
require_once("../../PHP/DBManager.php");
require_once("m_tarefas.php");
require_once("m_actividade.php");
require_once("m_equipo.php");
require_once("m_imputacion.php");
/**

 * Clase Usuario

 * @author Diego Vázquez

 */
class Usuario
{
    public $id;
    public $login;
    public $passEnc;
    public $email;
    public $rol;
    public $fechaRexistro;
    public $ruta;
    public $equipos = [];
    public $tarefas = [];
    public $actividades = [];
    public $imputacions = [];

    function Usuario()
    {
    }


    //----- TABLA USUARIOS ----- 

    /**

     * Devolve os datos dun usuario polo seu id

     * 

     * @param string $idUsuario

     * @return Usuario

     */

    function getDatosUsuario($idUsuario)
    {
        $con = new DBManager;
        if ($con->conexion() == true) {
            $datos = $con->conect->getUsuario($idUsuario);
        }
        if (!$datos) {
            return null;
        } else {
            $this->id = $datos['ID'];
            $this->login = $datos['LOGIN'];
            $this->passEnc = $datos['PASS'];
            $this->email = $datos['EMAIL'];
            $this->rol = $datos['ROL'];
            $this->fechaRexistro = $datos['FECHA_REXISTRO'];
            $this->ruta = $datos['ruta_img'];
            $this->obterEquiposUsuario($this->id);
            $this->getTarefasUsuario($this->id);
            return $this;
        }
    }

    /**

     * Devolve os datos dun usuario polo seu login

     * 

     * @param string $login

     * @return c_usuario

     */

    function getDatosUsuarioLogin($login)
    {
        $con = new DBManager;

        if ($con->conexion() == true) {
            $datos = $con->conect->getDatosUsuarioLogin($login);
        }
        if (!$datos) {
            return null;
        } else {
            $this->id = $datos[0]['ID'];
            $this->login = $datos[0]['LOGIN'];
            $this->passEnc = $datos[0]['PASS'];
            $this->email = $datos[0]['EMAIL'];
            $this->rol = $datos[0]['ROL'];
            $this->fechaRexistro = $datos[0]['FECHA_REXISTRO'];
            $this->ruta = $datos[0]['ruta_img'];
            return $this;
        }
    }

    /**

     * Devolve os datos dun usuario polo seu email

     * 

     * @param string $email

     * @return c_usuario

     */
    public function getDatosUsuarioEmail($email)
    {
        $con = new DBManager;
        if ($con->conexion() == true) {
            $datos = $con->conect->getDatosUsuarioEmail($email);
        }
        if (!$datos) {
            return null;
        } else {
            $this->id = $datos[0]['ID'];
            $this->login = $datos[0]['LOGIN'];
            $this->passEnc = $datos[0]['PASS'];
            $this->email = $datos[0]['EMAIL'];
            $this->rol = $datos[0]['ROL'];
            $this->fechaRexistro = $datos[0]['FECHA_REXISTRO'];
            $this->ruta = $datos[0]['ruta_img'];
            //$this->obterEquiposUsuario($this->id);
            return $this;
        }
    }

    /**

     * Devuelve los datos de la tabla ususarios

     * 

     * @return array

     */
    public function getUsuarios()
    {
        $con = new DBManager;
        if ($con->conexion() == true) {
            $datos = $con->conect->getUsuarios();
        }
        if (!$datos) {
            return null;
        } else {
            return $datos;
        }
    }

    /**

     * Devolve os equipos dun usuario polo seu id de usuario

     * 

     * @param string $idUsuario

     * @return array $equipos

     */
    function obterEquiposUsuario($idUsuario)
    {
        $con = new DBManager;
        if ($con->conexion() == true) {
            $datos = $con->conect->getEquiposUsuario($idUsuario);
        }
        if (!$datos) {
            return null;
        } else {
            foreach ($datos as $dato) {
                $equipo = new Equipo;
                $equipo->id = $dato['ID'];
                $equipo->nombre = $dato['NOMBRE'];
                $equipo->usuarioXestor = $dato['USUARIO_XESTOR'];
                $this->equipos[] = $equipo;
            }
            return $this->equipos;
        }
    }

    /**

     * Devolve as tarefas dun usuario polo seu id de usuario

     * 

     * @param string $idUsuario

     * @return array $tarefas

     */
    function getTarefasUsuario($idUsuario)
    {
        $con = new DBManager;
        if ($con->conexion() == true) {
            $datos = $con->conect->getTarefasUsuarioID($idUsuario);
        }
        if (!$datos) {
            return null;
        } else {
            foreach ($datos as $dato) {
                $tarefa = new Tarefas;
                $tarefa->getDatosTarefa($dato['ID_TAREFA']);
                $this->tarefas[] = $tarefa;
            }
            return $this->tarefas;
        }
    }

    /**

     * Devolve as actividades dun usuario polo seu id de usuario

     * 

     * @param string $loginUsuario

     * @return array $activiades

     */
    function getActividadesUsuario()
    {
        $con = new DBManager;

        if ($con->conexion() == true) {

            date_default_timezone_set('Europe/Madrid');
            $fecha = 'd-m-Y H:i:s';
            $fechaActual = date($fecha);

            $datos = $con->conect->getActividadesUsuario($this->login, $fechaActual);
        }
        if (!$datos) {
            return null;
        } else {
            foreach ($datos as $dato) {
                $c_actividade = new c_actividade;
                $c_actividade->tituloTarefa = $dato['TITULO'];
                $c_actividade->descripcion = $dato['DESCRIPCION'];
                $c_actividade->comentario = $dato['COMENTARIO'];
                $c_actividade->estado = $dato['ESTADO'];
                $c_actividade->nombreEquipo = $dato['NOMBRE'];
                $c_actividade->fecha = $dato['FECHA'];
                $this->actividades[] = $c_actividade;
            }
            return $this->actividades;
        }
    }

    /**

     * Devolve as imputaciones do usuario para unha data concreta

     * 

     * @param string $fecha

     * @return array $imputacions

     */
    function getimputacionUsuario($fecha)
    {

        $c_imputacion = new c_imputacion;
        $this->imputacions = $c_imputacion->getimputacionUsuario($this->id, $fecha);
        return  $this->imputacions;
    }

    /**

     * Devolve as imputaciones do usuario para unha data concreta

     * 

     * @param string $fecha

     * @return int $horas

     */
    function getHorasImputacionUsuario($fecha)
    {
        $con = new DBManager;

        if ($con->conexion() == true) {
            $datos = $con->conect->getTotalImputacionUsuario($this->id, $fecha);
        }
        if (!$datos) {
            return null;
        } else {
            return $datos;
        }
    }

    /**

     * Devolve os usuarios sen equipo

     * 

     * @return array $usuariosSenEquipo

     */
    public function getUsuariosSenEquipo()
    {
        $con = new DBManager;
        if ($con->conexion() == true) {
            $datos = $con->conect->getUsuariosSenEquipo();
        }
        if (!$datos) {
            return null;
        } else {
            return $datos;
        }
    }

    /**

     * Inserta un novo usuario
     * 

     * @param string $login
     * @param string $passEnc
     * @param string $email
     * @param string $rol

     * @return boolean
      
     */
    public function insertaUsuario($login, $passEnc, $email, $rol)
    {

        $con = new DBManager;
        if ($con->conexion() == true) {
            $datos = $con->conect->insertaUsuario($login, $passEnc, $email, $rol);
        }
        if (!$datos) {
            return null;
        } else {
            return $datos;
        }
    }

    /**

     * Updtate ruta img usuario 
     * 

     * @param string $rutaCompleta
     * @param string $login
     
     * @return boolean
      
     */
    public function updateRutaImgUser($rutaCompleta, $login)
    {
        $con = new DBManager;
        if ($con->conexion() == true)
            $datos = $con->conect->updateRutaImgUser($rutaCompleta, $login);
        if (!$datos) {
            return false;
        } else {
            return true;
        }
    }

    /**

     * Updtate pass usuario 
     * 

     * @param string $passEnc
     
     * @return boolean
      
     */
    public function updatePassUser($pass)
    {
        $con = new DBManager;
        if ($con->conexion() == true) {
            $novaPassEnc = password_hash(
                base64_encode(
                    hash('sha256', $pass, true)
                ),
                PASSWORD_DEFAULT
            );
            $datos = $con->conect->updatePassUser($novaPassEnc, $this->email);
        }
        if (!$datos) {
            return false;
        } else {
            return true;
        }
    }

    function compruebaContrasena($pass)
    {
        if (password_verify(base64_encode(hash('sha256', $pass, true)), $this->passEnc)) {
            session_start();
            session_regenerate_id();
            $_SESSION['login'] = $this->login;
            $_SESSION['idUsuario'] = $this->id;
            $_SESSION['rutaIMG'] = $this->ruta;
            $_SESSION['rol'] = $this->rol;
            $_SESSION['tiempo'] = time();
            return true;
        } else {
            return false;
        }
    }

    function comprobaPassUser($pass)
    {
        if (password_verify(base64_encode(hash('sha256', $pass, true)), $this->passEnc)) {
            return true;
        } else {
            return false;
        }
    }

    function obterEquipos()
    {
        echo "<div class='row'>";
        echo "<div class='col-12'>";
        $action = $_SERVER['PHP_SELF'];
        echo "<form id='formEquipo' action='" . "$action" . "' method='POST'>";
        if ($this->equipos) {
            echo '<input name="nombreEquipo" type="hidden" value="' . $this->equipos[0]->nombre . '">';
        }
        echo "<select name='select_equipo' id='select_equipo' class='form-control custom-select sm-3'>";

        if (!$this->equipos) {
            echo "<option value='SIN_EQUIPO' selected>SIN_EQUIPO</option>";
        } else {
            foreach ($this->equipos as $equipo) {
                $nombre = $equipo->nombre;

                if ((!isset($_POST['select_equipo']) && isset($_SESSION['nombreEquipo']) && $nombre == $_SESSION['nombreEquipo']) || (isset($_POST['select_equipo']) && $nombre == $_POST['select_equipo'])) //si no existe el valor del select
                {
                    echo "<option value='" . $nombre . "' selected>" . $nombre . "</option>";
                    $idEquipo = $equipo->id;
                    if (!isset($_SESSION['equipo'])) {
                        $_SESSION['equipo'] = $idEquipo;
                    }
                } else {
                    echo "<option value='" . $nombre . "'>" . $nombre . "</option>";
                }
            }
        }

        echo '</select>';

        echo '<p></p>';

        echo "<button type='submit' class='btn btn-info' name ='enviarEquipo' hidden>";
        echo 'Engadir membro';
        echo '</button>';

        echo "</form>";
        echo '</div>';
        echo '</div>';

        if ($this->equipos)
            if (!isset($_SESSION['nombreEquipo'])) {
                if (!isset($_POST['select_equipo'])) {
                    $nomEq = $this->equipos[0]->nombre;
                    $idEquipo = $this->equipos[0]->id;
                    $_SESSION['equipo'] = $idEquipo;
                    $_SESSION['nombreEquipo'] = $nomEq;
                } else {
                    $nomEq =  $_POST['select_equipo'];

                    foreach ($this->equipos as $equipo) {
                        if ($equipo->nombre == $nomEq)
                            $idEquipo = $equipo->id;
                        break;
                    }
                    $_SESSION['equipo'] = $idEquipo;
                    $_SESSION['nombreEquipo'] = $nomEq;
                }
            } else {
                if (isset($_POST['select_equipo'])) {
                    $nomEq =  $_POST['select_equipo'];
                    foreach ($this->equipos as $equipo) {
                        if ($equipo->nombre == $nomEq)
                            $idEquipo = $equipo->id;
                        break;
                    }
                    $_SESSION['equipo'] = $idEquipo;
                    $_SESSION['nombreEquipo'] = $nomEq;
                } else {
                    $nomEq =   $_SESSION['nombreEquipo'];
                    foreach ($this->equipos as $equipo) {
                        if ($equipo->nombre == $nomEq)
                            $idEquipo = $equipo->id;
                        $_SESSION['equipo'] = $idEquipo;
                        $_SESSION['nombreEquipo'] = $nomEq;
                    }
                }
            }
    }
}

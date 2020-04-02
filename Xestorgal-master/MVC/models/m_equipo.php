<?php
require_once("../../PHP/DBManager.php");
require_once("m_usuario.php");
/**

 * Clase Equipo

 * @author Diego Vázquez

 */
class Equipo
{
    public $id;
    public $nombre;
    public $usuarioXestor;
    public $usuarios = [];

    function Equipo()
    {
    }

    //----- TABLA EQUIPOS ----- 

    /**

     * Devuelve el id de un equipo por su nombre

     * @param string $nombreEquipo

     * @return $c_equipo

     */
    public function getEquipo($nombreEquipo)
    {
        $con = new DBManager;

        if ($con->conexion() == true) {
            $datos = $con->conect->getEquipo($nombreEquipo);
        }
        if (!$datos) {
            return null;
        } else {
            $this->id = $datos['ID'];
            $this->nombre = $datos['NOMBRE'];
            $this->usuarioXestor = $datos['USUARIO_XESTOR'];
            $this->getIdsUsuarioEquipo($this->id);
            return $this;
        }
    }

    /**

     * Devolve os datos dun equipo polo seu id

     * @param string $id

     * @return c_equipo

     */
    public function getEquipoID($id)
    {
        $con = new DBManager;

        if ($con->conexion() == true) {
            $datos = $con->conect->getEquipoID($id);
        }
        if (!$datos) {
            return null;
        } else {
            $this->id = $datos['ID'];
            $this->nombre = $datos['NOMBRE'];
            $this->usuarioXestor = $datos['USUARIO_XESTOR'];
            $this->getIdsUsuarioEquipo($this->id);
            return $this;
        }
    }

    /**

     * Devolve os id de usuarios dun equipo polo id de equipo

     * @param string $idEquipo

     * @return array

     */
    private function getIdsUsuarioEquipo($idEquipo)
    {
        $con = new DBManager;

        if ($con->conexion() == true) {
            $datos = $con->conect->getIdsUsuarioEquipo($idEquipo);
        }
        if (!$datos) {
            return null;
        } else {
            foreach ($datos as $usuario) {
                $c_usuario = new Usuario;
                $c_usuario->getDatosusuario($usuario[0]);
                $this->usuarios[] = $c_usuario;
            }
            return $this->usuarios;
        }
    }

    /**

     * Inserta un nuevo equipo
     * 

     * @param string $nombreEquipo
     * @param string $idUsuario
     
     * @return boolean
      
     */
    public function insertaEquipo($nombreEquipo, $userXestor)
    {
        $con = new DBManager;
        if ($con->conexion() == true) {
            $datos = $con->conect->insertaEquipo($nombreEquipo, $userXestor);
        }
        if (!$datos) {
            return null;
        } else {
            return $datos;
        }
    }


    /**

     * Inserta un usuario en la tabla usuarios_equipo 
     * 

     * @param string $usuarioAsignado
     * @param string $idEquipo
     
     * @return boolean
      
     */
    public function insertaUsuarioEquipo($usuarioAsignado, $idEquipo)
    {
        $con = new DBManager;
        if ($con->conexion() == true) {
            $datos = $con->conect->insertaUsuarioEquipo($usuarioAsignado, $idEquipo);
        }
        if (!$datos) {
            return null;
        } else {
            return $datos;
        }
    }
}

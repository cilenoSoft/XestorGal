<?php
require_once("../../PHP/DBManager.php");
/**

 * Clase Imputación

 * @author Diego Vázquez

 */
class c_imputacion
{
    public $id;
    public $tituloTarefa;
    public $estado;
    public $comentario;
    public $tempo;
    public $fecha;
    public $nombreEquipo;
    public $idUsuario;


    function c_imputacion()
    {
    }

    /**

     * Inserta unha nova imputación
     * 

     * @param string $titulo_tarefa
     * @param string $estado_tarefa
     * @param string $comentario_imputacion
     * @param string $tempo_actividade
     * @param string $fecha
     * @param string $idUsuario
     * @param string $nombreEquipo
     
     * @return boolean
      
     */
    public function insertaInputacion()
    {

        if ($this->tituloTarefa && $this->estado && $this->comentario && $this->tempo && $this->fecha && $this->idUsuario && $this->nombreEquipo) {
            $con = new DBManager;
            if ($con->conexion() == true) {
                $datos = $con->conect->insertaInputacion($this->tituloTarefa, $this->estado, $this->comentario, $this->tempo, $this->fecha, $this->idUsuario, $this->nombreEquipo);
            }
            if (!$datos) {
                return null;
            } else {
                return $datos;
            }
        } else {
            return false;
        }
    }

    /**

     * Devolve as imputacións do usuario para unha data concreta

     * 

     * @param string $idUsuario
     * @param string $fecha

     * @return array $imputacions

     */
    function getimputacionUsuario($idUsuario, $fecha)
    {
        $con = new DBManager;

        if ($con->conexion() == true) {
            $datos = $con->conect->getImputacionUsuario($idUsuario, $fecha);
        }
        if (!$datos) {
            return null;
        } else {
            $imputacions = [];
            foreach ($datos as $dato) {
                $c_imputacion = new c_imputacion;
                $c_imputacion->id = $dato['ID'];
                $c_imputacion->tituloTarefa = $dato['TITULO_TAREFA'];
                $c_imputacion->estado = $dato['ESTADO_TAREFA'];
                $c_imputacion->comentario = $dato['COMENTARIO_IMP'];
                $c_imputacion->tempo = $dato['TEMPO_ACTIVIDADE'];
                $c_imputacion->fecha = $dato['FECHA'];
                $c_imputacion->nombreEquipo = $dato['NOMBRE_EQUIPO'];
                $c_imputacion->idUsuario = $dato['ID_USUARIO'];
                $imputacions[] = $c_imputacion;
            }
            return $imputacions;
        }
    }
}

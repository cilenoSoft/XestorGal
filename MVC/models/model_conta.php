<?php
require_once 'm_usuario.php';
require_once 'm_actividade.php';

class Conta
{
    private $usuario;

    public function __construct()
    {
        $this->usuario =  new Usuario;
    }

    public function getDatosConta($idUsuario)
    {
        return $this->usuario->getDatosUsuario($idUsuario);
    }
}

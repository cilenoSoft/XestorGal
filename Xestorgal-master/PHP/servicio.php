<?php

/**

 * Clase Servicio

 * 

 * Servicio WSDL

 * 

 * @author Diego Vázquez

 */
class Servicio
{

    const basededatos = 'xest'; //base de datos dwes
    const conexionBD = 'mysql:host=localhost;dbname=' . self::basededatos; //conexion co servidor localhost e base de datos usuarios
    const usuarioBD = 'root'; //usuario da base de datos
    const contrasenaBD = ''; //contraseal da base de datos, en este caso non ten

    //------ TABLA EQUIPOS ------

    /**

     * Devuelve el nombre de un equipo por su id

     * @param string $nombreEquipo

     * @return string

     */
    public function getNombreEquipo($idUsuario)
    {


        $conexion =  new PDO(self::conexionBD, self::usuarioBD, self::contrasenaBD, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES  \'UTF8\''));

        $consulta = "SELECT NOMBRE FROM equipos where USUARIO_XESTOR like '$idUsuario'";

        $resultado = $conexion->query($consulta);
        if ($resultado) {
            $nombreEquipo = $resultado->fetch()[0];

            return $nombreEquipo;
        }
    }

    /**

     * Devuelve el los datos de un equipo por su nombre

     * @param string $nombreEquipo

     * @return array

     */
    public function getEquipo($nombreEquipo)
    {

        $conexion =  new PDO(self::conexionBD, self::usuarioBD, self::contrasenaBD, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES  \'UTF8\''));

        $consulta = "SELECT * FROM equipos where NOMBRE like '$nombreEquipo'";

        $resultado = $conexion->query($consulta);
        if ($resultado) {
            $equipo = $resultado->fetch(PDO::FETCH_ASSOC);

            return $equipo;
        }
    }

    /**

     * Devuelve los datos de un equipo por id

     * @param string $id

     * @return array

     */
    public function getEquipoID($idEquipo)
    {

        $conexion =  new PDO(self::conexionBD, self::usuarioBD, self::contrasenaBD, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES  \'UTF8\''));

        $consulta = "SELECT * FROM equipos where ID like '$idEquipo'";

        $resultado = $conexion->query($consulta);
        if ($resultado) {
            $equipo = $resultado->fetch(PDO::FETCH_ASSOC);

            return $equipo;
        }
    }

    /**

     * Devuelve el nombre de los equipos que administra/pertenece un usuario

     * 

     * @param string $idUsuario

     * @return array

     */
    public function getEquiposUsuario($idUsuario)
    {
        $conexion =  new PDO(self::conexionBD, self::usuarioBD, self::contrasenaBD, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES  \'UTF8\''));

        $consulta = "SELECT * FROM equipos where USUARIO_XESTOR like '$idUsuario'";

        $resultado = $conexion->query($consulta);
        if ($resultado) {
            $equipos = $resultado->fetchAll(PDO::FETCH_ASSOC);

            return $equipos;
        } else
            return null;
    }

    /**

     * Inserta un nuevo equipo
     * 

     * @param string $nombre
     * @param string $idUsuarioXestor
     
     * @return string
      
     */
    public function insertaEquipo($nombre, $idUsuarioXestor)
    {

        $conexion =  new PDO(self::conexionBD, self::usuarioBD, self::contrasenaBD, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES  \'UTF8\''));
        $consulta = "INSERT INTO `equipos` (`NOMBRE`,`USUARIO_XESTOR`) VALUES ('$nombre','$idUsuarioXestor')";
        $resultado =  $conexion->prepare($consulta);
        $resultado->execute();

        if ($resultado) {
            $consulta = "SELECT ID FROM equipos where NOMBRE like '$nombre'";
            $resultado =  $conexion->prepare($consulta);
            $resultado->execute();
            return $resultado->fetch()[0];
        }


        return $resultado;
    }

    //------ FIN TABLA EQUIPOS ------

    //------ TABLA usuarios_equipo ------

    /**

     * Devolve os id de usuarios dun equipo polo id de equipo

     * @param string $idEquipo

     * @return array

     */
    public function getIdsUsuarioEquipo($idEquipo)
    {

        $conexion =  new PDO(self::conexionBD, self::usuarioBD, self::contrasenaBD, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES  \'UTF8\''));

        $consulta = "SELECT ID_USUARIO FROM usuarios_equipo where ID_EQUIPO like '$idEquipo'";

        $resultado = $conexion->query($consulta);
        if ($resultado) {
            $nombreEquipo = $resultado->fetchAll();

            return $nombreEquipo;
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

        $conexion =  new PDO(self::conexionBD, self::usuarioBD, self::contrasenaBD, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES  \'UTF8\''));

        $consulta = "INSERT INTO USUARIOS_EQUIPO (`ID_EQUIPO`, `ID_USUARIO`) VALUES ('$idEquipo', '$usuarioAsignado')";
        $resultado = $conexion->query($consulta);

        return $resultado;
    }

    //------ FIN TABLA usuarios_equipo ------


    //------ TABLA tarefas ------

    /**

     * Devolve as tarefas en determinado estado dun equipo

     * 

     * @param string $idEquipo
     * @param string $estado

     * @return array

     */
    public function getTarefasEquipo($idEquipo, $estado)
    {

        $conexion =  new PDO(self::conexionBD, self::usuarioBD, self::contrasenaBD, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES  \'UTF8\''));

        $consulta = "SELECT * FROM `tarefas` WHERE `EQUIPO` = '$idEquipo' AND `ESTADO` = '$estado' ";

        $resultado = $conexion->query($consulta);
        if ($resultado) {
            $tarefas = $resultado->fetchAll(PDO::FETCH_ASSOC);

            return $tarefas;
        } else return null;
    }

    /**

     * Devolve as tarefas sun usuario polo seu login

     * 

     * @param string $login

     * @return array

     */
    public function getTarefasUsuario($login)
    {

        $conexion =  new PDO(self::conexionBD, self::usuarioBD, self::contrasenaBD, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES  \'UTF8\''));

        $consulta = "SELECT * FROM `tarefas` WHERE `USUARIO_ULTIMO_ESTADO` = '$login'";

        $resultado = $conexion->query($consulta);
        if ($resultado) {
            $tarefas = $resultado->fetchAll(PDO::FETCH_ASSOC);

            return $tarefas;
        }
    }

    /**

     * Devolve as tarefas en determinado estado dun usuario

     * 

     * @param string $idUsuario
     * @param string $estado

     * @return array

     */
    public function getTarefasUsuarioEstado($idUsuario, $estado)
    {
        $conexion =  new PDO(self::conexionBD, self::usuarioBD, self::contrasenaBD, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES  \'UTF8\''));
        $consulta = "SELECT ID_TAREFA FROM usuarios_tarefa WHERE ID_USUARIO = '$idUsuario'";
        $userTar = $conexion->query($consulta);

        if ($userTar) {
            $userTar = $userTar->fetchAll(PDO::FETCH_COLUMN, 0);

            $consulta = "SELECT * FROM `tarefas` WHERE `ID` IN (" . implode(',', $userTar) . ") AND `ESTADO` = '$estado' ";

            $resultado = $conexion->query($consulta);
            if ($resultado) {
                $tarefas = $resultado->fetchAll(PDO::FETCH_ASSOC);

                return $tarefas;
            } else return null;
        } else return null;
    }

    /**

     * Devolve os datos dunha tarefa polo seu id
     * 

     * @param string $idTarefa

     * @return array

     */
    public function getDatosTarefa($idTarefa)
    {

        $conexion =  new PDO(self::conexionBD, self::usuarioBD, self::contrasenaBD, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES  \'UTF8\''));

        $consulta = "SELECT * FROM `tarefas` WHERE `ID` = '$idTarefa'";

        $resultado = $conexion->query($consulta);
        if ($resultado) {
            $tarefas = $resultado->fetchAll(PDO::FETCH_ASSOC);

            return $tarefas;
        }
    }

    /**

     * INSERT unha nova tarefa
     * 

     * @param string $titulo
     * @param string $descripcion
     * @param string $usuarioTarefa
     * @param string $login
     * @param string $idUsuario
     * @param string $idEquipo
     * @param string $fechaActual
          
     * @return boolean
      
     */
    public function insertaTarefa($titulo, $descripcion, $usuarioTarefa, $login, $idUsuario, $idEquipo, $fechaActual)
    {
        $conexion =  new PDO(self::conexionBD, self::usuarioBD, self::contrasenaBD, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES  \'UTF8\''));

        if ($usuarioTarefa != null && $usuarioTarefa != '' && $usuarioTarefa != 'NA') {
            $consulta = "INSERT INTO `tarefas` (`TITULO`, `DESCRIPCION`, `COMENTARIO`, `ESTADO`, `USUARIO_ULTIMO_ESTADO`, `USUARIO_CREADOR`,`FECHA_CREACION`, `FECHA_ULTIMA_MODIFICACION`, `FECHA_FINALIZACION`, `FECHA_ENTREGA`,`EQUIPO`) VALUES ('$titulo', '$descripcion','','PENDENTE', '$login', '$idUsuario','$fechaActual','$fechaActual',null,null,$idEquipo)";
            $insertada = $conexion->query($consulta);

            $consulta = "SELECT ID FROM TAREFAS where TITULO like '$titulo' AND USUARIO_CREADOR LIKE '$idUsuario' AND FECHA_CREACION = '$fechaActual'";
            $resultado = $conexion->query($consulta);
            $idTarefa = $resultado->fetch()[0];

            $consulta = "SELECT ID FROM usuarios where LOGIN like '$usuarioTarefa'";
            $resultado = $conexion->query($consulta);
            $idUsuario = $resultado->fetch()[0];

            $consulta = "INSERT INTO `usuarios_tarefa` (`ID_TAREFA`, `ID_USUARIO`) VALUES ('$idTarefa', '$idUsuario')";
            $resultado = $conexion->query($consulta);
        } else {
            $consulta = "INSERT INTO `tarefas` (`TITULO`, `DESCRIPCION`, `COMENTARIO`, `ESTADO`, `USUARIO_ULTIMO_ESTADO`, `USUARIO_CREADOR`,`FECHA_CREACION`, `FECHA_ULTIMA_MODIFICACION`, `FECHA_FINALIZACION`, `FECHA_ENTREGA`,`EQUIPO` ) VALUES ('$titulo', '$descripcion','','SEN ASIGNAR', null, '$idUsuario','$fechaActual','$fechaActual',null,null,$idEquipo)";
            $insertada = $conexion->query($consulta);
        }

        return $insertada;
    }



    /**

     * UPDATE os datos dunha tarefa polo seu id
     * 

     * @param string $idTarefa
     * @param string $userXestor
     
     * @return string
      
     */
    public function desAsignaTarefa($idTarefa, $userXestor)
    {

        $conexion =  new PDO(self::conexionBD, self::usuarioBD, self::contrasenaBD, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES  \'UTF8\''));

        $consulta = "DELETE FROM `usuarios_tarefa` WHERE `ID_TAREFA` = '$idTarefa'";
        $resultado2 = $conexion->query($consulta);

        $consulta2 = "UPDATE `tarefas` SET `ESTADO` = 'SEN ASIGNAR', `USUARIO_ULTIMO_ESTADO` = '$userXestor' WHERE `ID` = $idTarefa";
        $resultado = $conexion->query($consulta2);

        return $resultado;
    }

    /**

     * UPDATE os datos dunha tarefa polo seu id
     * 

     * @param string $idTarefa
     * @param string $userXestor
     * @param string $idUsuarioAsignar
     
     * @return string
      
     */
    public function asignaTarefa($idTarefa, $userXestor, $idUsuarioAsignar)
    {

        $conexion =  new PDO(self::conexionBD, self::usuarioBD, self::contrasenaBD, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES  \'UTF8\''));

        $fecha = 'Y-m-d H:i:s';
        $fechaActual = date($fecha);
        $consulta = "UPDATE `tarefas` set `ESTADO` = 'PENDENTE', `USUARIO_ULTIMO_ESTADO` = '$userXestor' WHERE `ID` like '$idTarefa'";
        $resultado = $conexion->query($consulta);

        $consulta = "INSERT INTO `usuarios_tarefa` (`ID_TAREFA`, `ID_USUARIO`) VALUES ('$idTarefa','$idUsuarioAsignar')";
        $resultado = $conexion->query($consulta);

        return $resultado;
    }

    //------ FIN TABLA tarefas ------


    //------ TABLA usuarios_tarefas ------

    /**

     * Devolve os usuarios dunha tarefa polo ID de tarefa

     * 

     * @param string $idTarefa

     * @return array

     */
    public function getUsuariosTarefa($idTarefa)
    {

        $conexion =  new PDO(self::conexionBD, self::usuarioBD, self::contrasenaBD, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES  \'UTF8\''));
        $consulta = "SELECT ID_USUARIO FROM usuarios_tarefa WHERE ID_TAREFA like '$idTarefa'";
        $userTar = $conexion->query($consulta);
        if ($userTar) {
            $userTar = $userTar->fetch();
            return $userTar;
        }
    }


    /**

     * Devolve as tarefas dun usuario polo ID de usuario

     * 

     * @param string $idUsuario

     * @return array

     */
    public function getTarefasUsuarioID($idUsuario)
    {

        $conexion =  new PDO(self::conexionBD, self::usuarioBD, self::contrasenaBD, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES  \'UTF8\''));

        $consulta = "SELECT ID_TAREFA FROM usuarios_tarefa WHERE ID_USUARIO = '$idUsuario'";
        $userTar = $conexion->query($consulta);

        if ($userTar) {
            $userTar = $userTar->fetchAll(PDO::FETCH_ASSOC);
            return $userTar;
        } else {
            return null;
        }
    }

    //------ FIN TABLA usuarios_tarefa ------



    //------ TABLA comentarios_tarefas ------

    /**

     * Devolve os comentarios dunha tarefa polo seu ID

     * 

     * @param string $idTarefa

     * @return array

     */
    public function getComentariosTarefa($idTarefa)
    {

        $conexion =  new PDO(self::conexionBD, self::usuarioBD, self::contrasenaBD, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES  \'UTF8\''));

        $consulta = "SELECT * FROM COMENTARIOS_TAREFA WHERE ID_TAREFA like '" . $idTarefa . "' ORDER BY `fecha` DESC";

        $resultado = $conexion->query($consulta);
        if ($resultado) {
            $comentarios = $resultado->fetchAll(PDO::FETCH_ASSOC);
            return $comentarios;
        } else {
            return null;
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

        $conexion =  new PDO(self::conexionBD, self::usuarioBD, self::contrasenaBD, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES  \'UTF8\''));
        $comentarioVacio = false;
        if ($comentario != '') {
            $consulta = "INSERT INTO `comentarios_tarefa` (`ID_TAREFA`, `LOGIN_USUARIO`,`COMENTARIO`,`ID_EQUIPO`,`FECHA`,`ESTADO`) VALUES ('$idTarefa', '$login','$comentario','$equipo','$fechaActual','$estado')";

            $insertaComentario = $conexion->prepare($consulta);
        } else {
            $insertaComentario = true;
            $comentarioVacio = true;
        }

        if ($estado == 'FINALIZADA') {
            $consulta2 = "UPDATE `tarefas` set `ESTADO` = '$estado', `USUARIO_ULTIMO_ESTADO` = '$login', `FECHA_FINALIZACION` = '$fechaActual', `FECHA_ULTIMA_MODIFICACION` = '$fechaActual' WHERE `ID` like '$idTarefa'";
        } else {
            $consulta2 = "UPDATE `tarefas` set `ESTADO` = '$estado', `USUARIO_ULTIMO_ESTADO` = '$login', `FECHA_ULTIMA_MODIFICACION` = '$fechaActual' WHERE `ID` like '$idTarefa'";
        }
        $updateaTarefas = $conexion->prepare($consulta2);
        $updateaTarefas->execute();
        if ($updateaTarefas) {
            if (!$comentarioVacio)
                $insertaComentario->execute();
            return true;
        }
        return false;
    }

    //------ FIN TABLA comentarios_tarefas ------


    //------ TABLA estados_tarefa ------

    /**

     * Devolve os estados posibles das tarefas

     * 

     * @return array

     */
    public function getEstadosTarefa()
    {

        $conexion =  new PDO(self::conexionBD, self::usuarioBD, self::contrasenaBD, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES  \'UTF8\''));

        $consulta = 'SELECT * FROM ESTADOS_TAREFA';
        $resultado = $conexion->query($consulta);

        $resultado = $conexion->query($consulta);
        if ($resultado) {
            $estados = $resultado->fetchAll(PDO::FETCH_ASSOC);

            return $estados;
        }
    }

    //------ FIN TABLA estados_tarefa ------


    //----- TABLA USUARIOS ----- 

    /**

     * Devuelve los datos de la tabla ususarios

     * 
      
     * @param
     
     * @return array

     */
    public function getUsuarios()
    {
        $conexion =  new PDO(self::conexionBD, self::usuarioBD, self::contrasenaBD, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES  \'UTF8\''));

        $consulta = 'SELECT * FROM usuarios';
        $resultado = $conexion->query($consulta);
        if ($resultado) {
            $usuarios = $resultado->fetchAll(PDO::FETCH_ASSOC);
            return $usuarios;
        } else {
            return null;
        }
    }

    /**

     * Devuelve los datos de un usuario por id

     * 

     * @param string $idUsuario

     * @return array

     */
    public function getUsuario($idUsuario)
    {
        $conexion =  new PDO(self::conexionBD, self::usuarioBD, self::contrasenaBD, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES  \'UTF8\''));

        $consulta = "SELECT * FROM usuarios where id like '$idUsuario'";

        $resultado = $conexion->query($consulta);
        if ($resultado) {
            $usuarios = $resultado->fetch(PDO::FETCH_ASSOC);
            return $usuarios;
        } else {
            return null;
        }
    }

    /**

     * Devolve os datos dun usuario polo seu login

     * 

     * @param string $login

     * @return array

     */
    public function getDatosUsuarioLogin($login)
    {
        $conexion =  new PDO(self::conexionBD, self::usuarioBD, self::contrasenaBD, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES  \'UTF8\''));

        $consulta = "SELECT * FROM usuarios where LOGIN like '$login'";

        $resultado = $conexion->query($consulta);
        if ($resultado) {
            $usuarios = $resultado->fetchAll(PDO::FETCH_ASSOC);

            return $usuarios;
        }
    }


    /**

     * Devolve os datos dun usuario polo seu email

     * 

     * @param string $email

     * @return array

     */
    public function getDatosUsuarioEmail($email)
    {
        $conexion =  new PDO(self::conexionBD, self::usuarioBD, self::contrasenaBD, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES  \'UTF8\''));

        $consulta = "SELECT * FROM usuarios where EMAIL like '$email'";

        $resultado = $conexion->query($consulta);
        if ($resultado) {
            $usuarios = $resultado->fetchAll(PDO::FETCH_ASSOC);

            return $usuarios;
        }
    }

    /**

     * Devolve os usuarios sen equipo (NON SE USA)

     * 

     * @return array

     */
    public function getUsuariosSenEquipo()
    {


        $conexion =  new PDO(self::conexionBD, self::usuarioBD, self::contrasenaBD, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES  \'UTF8\''));

        $consulta = 'SELECT * FROM usuarios WHERE ID_EQUIPO is NULL';

        $resultado = $conexion->query($consulta);
        if ($resultado) {
            $usuarios = $resultado->fetchAll(PDO::FETCH_ASSOC);

            return $usuarios;
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
        $conexion =  new PDO(self::conexionBD, self::usuarioBD, self::contrasenaBD, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES  \'UTF8\''));
        date_default_timezone_set('Europe/Madrid');
        $fecha = 'Y-m-d H:i:s';
        $fechaActual = date($fecha);
        $consulta = "INSERT INTO `usuarios` (`LOGIN`, `PASS`,`EMAIL`,`ROL`,`FECHA_REXISTRO`,`ruta_img`) VALUES ('$login', '$passEnc','$email','$rol','$fechaActual','../../imgUsuarios/default.png')";
        $resultado = $conexion->query($consulta);

        return $resultado;
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

        $conexion =  new PDO(self::conexionBD, self::usuarioBD, self::contrasenaBD, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES  \'UTF8\''));

        $consulta = "UPDATE usuarios SET ruta_img = '$rutaCompleta' WHERE login = '$login'";
        $resultado = $conexion->prepare($consulta);
        $resultado = $resultado->execute();
        return $resultado;
    }

    /**

     * Updtate pass usuario 
     * 

     * @param string $passEnc
     * @param string $email
     
     * @return boolean
      
     */
    public function updatePassUser($passEnc, $email)
    {

        $conexion =  new PDO(self::conexionBD, self::usuarioBD, self::contrasenaBD, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES  \'UTF8\''));

        $consulta = "UPDATE usuarios SET pass = '$passEnc' WHERE email = '$email'";
        $resultado = $conexion->prepare($consulta);
        $resultado = $resultado->execute();
        return  $resultado;
    }
    //----- FIN TABLA USUARIOS ----- 

    /**

     * Devolve as actividades dun usuario polo seu id

     * 

     * @param string $loginUsuario
     * @param string $fecha

     * @return array

     */
    public function getActividadesUsuario($loginUsuario, $fecha)
    {
        $conexion =  new PDO(self::conexionBD, self::usuarioBD, self::contrasenaBD, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES  \'UTF8\''));
        $consulta = "
            SELECT
            tarefas.TITULO,
            tarefas.DESCRIPCION,
            comentarios_tarefa.COMENTARIO,
            comentarios_tarefa.ESTADO,
            comentarios_tarefa.FECHA,
            equipos.NOMBRE
            FROM comentarios_tarefa
            INNER JOIN tarefas ON comentarios_tarefa.ID_TAREFA = tarefas.ID
            INNER JOIN equipos ON comentarios_tarefa.ID_EQUIPO = equipos.ID AND tarefas.EQUIPO = equipos.ID
            WHERE comentarios_tarefa.LOGIN_USUARIO = '$loginUsuario'
            AND DATE_FORMAT(comentarios_tarefa.FECHA,'%d/%m/%Y')= DATE_FORMAT(CURDATE(),'%d/%m/%Y');
        ";
        //$consulta = "SELECT * FROM `actividade` where DATE_FORMAT(FECHA,'%d/%m/%Y')= DATE_FORMAT(CURDATE(),'%d/%m/%Y') and ID_USUARIO = $idUsuario";

        $resultado = $conexion->query($consulta);
        if ($resultado) {
            $actividades = $resultado->fetchAll(PDO::FETCH_ASSOC);

            return $actividades;
        } else {
            return null;
        }
    }

    //----- TABLA IMPUTACION -----

    /**

     * Devolve a imputación dunha fecha polo id do usuario
     * 

     * @param string $idUsuario
     * @param string $fecha

     * @return array

     */
    public function getImputacionUsuario($idUsuario, $fecha)
    {
        $conexion =  new PDO(self::conexionBD, self::usuarioBD, self::contrasenaBD, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES  \'UTF8\''));

        $consulta = "SELECT * FROM imputacion where ID_USUARIO like '$idUsuario' 
        AND DATE_FORMAT(FECHA,'%Y/%m/%d') = DATE_FORMAT('$fecha','%Y/%m/%d');
        ";

        $resultado = $conexion->query($consulta);
        if ($resultado) {
            $imputacion = $resultado->fetchAll(PDO::FETCH_ASSOC);

            return $imputacion;
        } else {
            return null;
        }
    }

    /**

     * Devolve o total de horas imputadas nunha determinada data
     * 

     * @param string $idUsuario
     * @param string $fecha

     * @return array

     */
    public function getTotalImputacionUsuario($idUsuario, $fecha)
    {
        $conexion =  new PDO(self::conexionBD, self::usuarioBD, self::contrasenaBD, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES  \'UTF8\''));

        $consulta = "SELECT SUM(TEMPO_ACTIVIDADE) as total FROM `imputacion`where ID_USUARIO like '$idUsuario' 
        AND DATE_FORMAT(FECHA,'%Y/%m/%d') = DATE_FORMAT('$fecha','%Y/%m/%d');";

        $resultado = $conexion->query($consulta);
        if ($resultado) {
            $horas = $resultado->fetch()[0];

            return $horas;
        } else {
            return null;
        }
    }

    /**

     * Inserta unha nova actividade
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
    public function insertaInputacion($titulo_tarefa, $estado_tarefa, $comentario_imputacion, $tempo_actividade, $fecha, $idUsuario, $nombreEquipo)
    {
        $conexion =  new PDO(self::conexionBD, self::usuarioBD, self::contrasenaBD, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES  \'UTF8\''));
        $consulta = "INSERT INTO `imputacion`(`TITULO_TAREFA`, `ESTADO_TAREFA`, `COMENTARIO_IMP`, `TEMPO_ACTIVIDADE`, `FECHA`, `ID_USUARIO`, `NOMBRE_EQUIPO`) 
        VALUES ( '$titulo_tarefa', '$estado_tarefa', '$comentario_imputacion', '$tempo_actividade', '$fecha', '$idUsuario', '$nombreEquipo')
        ";
        $resultado = $conexion->query($consulta);

        return $resultado;
    }

    //----- FIN IMPUTACION -----



}

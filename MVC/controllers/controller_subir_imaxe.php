<?php
if (!isset($_SESSION))
session_start();
require_once '../../PHP/sesion.php';
comprobaSesion();
require_once '../models/m_usuario.php';

//Redimensionar imaxe usuario e subida o servidor
function MoveRedimImg($nom_img_org, $nom_img_dest, $alto_max = 600, $ancho_max = 800)
{
    if (intval($alto_max) == 0) {
        $alto_max = 500;
    }
    if (intval($ancho_max) == 0) {
        $ancho_max = 500;
    }

    // determina el tipo de archivo para hacer el Content-type
    $size = getimagesize($nom_img_org);
    //  print_r($size);
    //  print($size['mime']); exit;
    switch ($size[2]) {
        case 1:
            $mime = 'image/gif';
            break;
        case 2:
            $mime = 'image/jpeg';
            break;
        case 3:
            $mime = 'image/png';
            break;
    }
    /*header("Content-type: $mime");*/
    //header ("Content-type: image/jpeg");

    $attrib_img_org = getimagesize($nom_img_org);
    $ancho_img_org = $attrib_img_org[0];
    $alto_img_org = $attrib_img_org[1];
    // Calcula el ancho y el alto del thumbnail desde un alto dado
    if ($ancho_img_org > $ancho_max) {
        $ancho_img_des = $ancho_max;
        $alto_img_des = round($ancho_max * $alto_img_org / $ancho_img_org);
    } else {
        $alto_img_des = $alto_img_org;
        $ancho_img_des = $ancho_img_org;
    }

    if ($alto_img_des > $alto_max) {
        $alto_img_des = $alto_max;
        $ancho_img_des = round($alto_max * $ancho_img_org / $alto_img_org);
    }

    // Abre Imagen Original
    switch ($mime) {
        case 'image/jpeg':
            $img_org = @imagecreatefromjpeg($nom_img_org); /* Attempt to open */
            break;
        case 'image/gif':
            $img_org = @imagecreatefromgif($nom_img_org); /* Attempt to open */
            break;
        case 'image/png':
            $img_org = @imagecreatefrompng($nom_img_org); /* Attempt to open */
            break;
    }

    // Crea la imágen Destino
    $img_des = @imagecreatetruecolor($ancho_img_des, $alto_img_des);

    // int dstX, int dstY, int srcX, int srcY, int dstW, int dstH, int srcW, int srcH)
    imagecopyresampled(
        $img_des,
        $img_org,
        0,
        0,
        0,
        0,
        $ancho_img_des,
        $alto_img_des,
        $ancho_img_org,
        $alto_img_org
    );
    // Banner ;-)
    //$text_color = ImageColorAllocate ($img_des, 128, 128, 255);
    //ImageString ($img_des, 2, 5, 15,  "E Sociales", $text_color);

    switch ($mime) {
        case 'image/jpeg':
            imagejpeg($img_des, $nom_img_dest);
            break;
        case 'image/gif':
            imagegif($img_des, $nom_img_dest);
            break;
        case 'image/png':
            imagepng($img_des, $nom_img_dest);
            break;
    }
    //  ImageJPEG ($img_des);

    // Finalemente, borra el archivo origen
    @unlink($nom_img_org);

    return true;
}

//Tamaño e Formatos permitidos
if ((($_FILES['file-3']['type'] == 'image/gif') || ($_FILES['file-3']['type'] == 'image/jpeg') || ($_FILES['file-3']['type'] == 'image/jpg') || ($_FILES['file-3']['type'] == 'image/JPG') || ($_FILES['file-3']['type'] == 'image/png') || ($_FILES['file-3']['type'] == 'image/pjpeg'))) { //Manexo do erro en caso de arquivo non valido
    if ($_FILES['file-3']['error'] > 0) {
        echo 'Return Code: ' . $_FILES['file-3']['error'] . '';
    } else {

        $ruta = '../../imgUsuarios/'; //ruta carpeta donde queremos copiar a imaxe
        $login = $_SESSION['login'];
        $extension = '.' . str_replace('image/', '', $_FILES['file-3']['type']);

        //Redimensionar imaxe usuario e subida o servidor
        $resultado = MoveRedimImg($_FILES['file-3']['tmp_name'], $ruta . $login . $extension, 400, $ancho_max = 400);
        if (!$resultado) {
            return 'KO';
        }

        $rutaCompleta = $ruta . $login . $extension;
        $nombreArchivo = $ruta . $login;
        $respuesta = false;
        $c_usuario = new Usuario;
        $respuesta = $c_usuario->updateRutaImgUser($rutaCompleta, $login);

        if (!$respuesta) {
            echo 'KO';
        } else {
            $_SESSION['rutaIMG'] = $rutaCompleta;
        }
    }
} else {
    echo 'KO';
    //echo '<p>Arquivo inválido, so se permiten arquivos en formato GIF, JPG e PNG.';
}

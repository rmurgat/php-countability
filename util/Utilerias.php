<?php
/**
 * Programa: Utilerias.php
 * Descripcion:
 *   Script con las funciones comunes para ser utilizadas en las aplicaciones de php
 * Autor:
 *   HANYGEN Software S.A. de C.V. 
 *   Ruben Murga Tapia
 **/

class Utilerias {

   function addToken($scad, $stoken, $sdiv) {
     if (!isset($scad)) {
        return $stoken;
     }
     if ($scad=="") {
        return $stoken;
     }
     return $scad.$sdiv.$stoken;
   }

  function redondeado ($numero, $decimales) {
       $factor = pow(10, $decimales);
       return (round($numero*$factor)/$factor); 
  }

  //función para regresar el archivo con la imagen dependiendo del tipo de archivo adjunto
  function getfileimage($nombre) {
    $image = 'I_archivito.gif';
    $extfile = substr($nombre, strripos($nombre,".")+1);
    if($extfile=='') return '';
    $extfile = strtolower($extfile);
    switch($extfile) {
        case 'zip':
                $image = 'I_zip.gif';
                break;
        case 'rar':
                $image = 'I_zip.gif';
                break;
        case 'pdf':
                $image = 'I_pdf.gif';
                break;
        case 'doc':
        case 'docx':
                $image = 'I_word.gif';
                break;
        case 'xls':
        case 'xlsx':
                $image = 'I_excel.gif';
                break;
        case 'bmp':
        case 'png':
        case 'jpg':
        case 'gif':
                $image = 'I_image.gif';
                break;
        case 'ppt':
        case 'pptx':
                $image = 'I_powerpoint.gif';
                break;
        case 'htm':
        case 'html':
                $image = 'I_explorer.gif';
                break;
    }
    return $image;
  }

} //fin clase [Utilerias]

if ( !function_exists('htmlspecialchars_decode') ){
    function htmlspecialchars_decode($string,$style=ENT_COMPAT)
    {
        $translation = array_flip(get_html_translation_table(HTML_SPECIALCHARS,$style));
        if($style === ENT_QUOTES){ $translation['&#039;'] = '\''; }
        $translation = strtr($string,$translation);
        return str_replace('\\', '', $translation);
    }
}

?>
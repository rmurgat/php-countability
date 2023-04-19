<?php

/**
 * @name: DoctoClienteBean
 * @creation date: (23-Jun-2010)
 * Descripci?n:
 * Clase que tiene la información relativa a los documentos adjuntos del cliente
 * @author: Ruben Murga Tapia
 * @conpany: HANYGEN SOFTWARE S.A. DE C.V.
 **/

class DoctoClienteBean {
    var $scdempresa = "";              // Clave de la empresa
    var $scdcliente = "";              // Clave del cliente
    var $scddocumento = "";              // Clave del documento
    var $sstdocumento = "";              // Estatus del documento
    var $snbdocumento = "";              // Nombre del documento
    var $slkdocumento = "";              // Link con la dirección fisica del documento

  /**
   * CONSTRUCTOR
  */
  function DoctoClienteBean() {
  }

  /**
   *  PROPIEDAD: Clave de la empresa
   *  @return valor de la propiedad
  */
  function getcdempresa() {
    return $this->scdempresa;
  }

  /**
   *  PROPIEDAD: Clave de la empresa  
   *  @param $val - nuevo valor
  */
  function setcdempresa($val) {
    $this->scdempresa = $val;
  }
  
  /**
   *  PROPIEDAD: Clave del cliente
   *  @return valor de la propiedad
  */
  function getcdcliente() {
    return $this->scdcliente;
  }

  /**
   *  PROPIEDAD: Clave del cliente  
   *  @param $val - nuevo valor
  */
  function setcdcliente($val) {
    $this->scdcliente = $val;
  }
  
  /**
   *  PROPIEDAD: Clave del documento
   *  @return valor de la propiedad
  */
  function getcddocumento() {
    return $this->scddocumento;
  }

  /**
   *  PROPIEDAD: Clave del documento  
   *  @param $val - nuevo valor
  */
  function setcddocumento($val) {
    $this->scddocumento = $val;
  }
  
  /**
   *  PROPIEDAD: Estatus del documento
   *  @return valor de la propiedad
  */
  function getstdocumento() {
    return $this->sstdocumento;
  }

  /**
   *  PROPIEDAD: Estatus del documento  
   *  @param $val - nuevo valor
  */
  function setstdocumento($val) {
    $this->sstdocumento = $val;
  }
  
  /**
   *  PROPIEDAD: Nombre del documento
   *  @return valor de la propiedad
  */
  function getnbdocumento() {
    return $this->snbdocumento;
  }

  /**
   *  PROPIEDAD: Nombre del documento  
   *  @param $val - nuevo valor
  */
  function setnbdocumento($val) {
    $this->snbdocumento = $val;
  }
  
  /**
   *  PROPIEDAD: Link con la dirección fisica del documento
   *  @return valor de la propiedad
  */
  function getlkdocumento() {
    return $this->slkdocumento;
  }

  /**
   *  PROPIEDAD: Link con la dirección fisica del documento  
   *  @param $val - nuevo valor
  */
  function setlkdocumento($val) {
    $this->slkdocumento = $val;
  }
  

  /**
   *  PROCEDIMIENTO para determina si los objetos tienen la misma llave
   *  @param $obj - objeto 
  */
  function hasamekey($obj) {
    if($this->getcdempresa()==$obj->getcdempresa())
    if($this->getcdcliente()==$obj->getcdcliente())
    if($this->getcddocumento()==$obj->getcddocumento())
       return true;
    return false;
  }


} /* fin clase [DoctoClienteBean] */

?>

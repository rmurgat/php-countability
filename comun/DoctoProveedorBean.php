<?php

/**
 * @name: DoctoProveedorBean
 * @creation date: (23-Junio-2010)
 * Descripci?n:
 * Clase que tiene la información relativa de los documentos relacionados a un proveedorl
 * @author: Ruben Murga Tapia
 * @conpany: HANYGEN SOFTWARE S.A. DE C.V.
 **/

class DoctoProveedorBean {
    var $scdempresa = "";              // Clave de la empresa
    var $scdproveedor = "";              // Clave del proveedor
    var $scddocumento = "";              // Clave del documento
    var $sstdocumento = "";              // Estatus del documento
    var $snbdocumento = "";              // Nombre del documento
    var $slkdocumento = "";              // Link con la información del documento

  /**
   * CONSTRUCTOR
  */
  function DoctoProveedorBean() {
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
   *  PROPIEDAD: Clave del proveedor
   *  @return valor de la propiedad
  */
  function getcdproveedor() {
    return $this->scdproveedor;
  }

  /**
   *  PROPIEDAD: Clave del proveedor  
   *  @param $val - nuevo valor
  */
  function setcdproveedor($val) {
    $this->scdproveedor = $val;
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
   *  PROPIEDAD: Link con la información del documento
   *  @return valor de la propiedad
  */
  function getlkdocumento() {
    return $this->slkdocumento;
  }

  /**
   *  PROPIEDAD: Link con la información del documento  
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
    if($this->getcdproveedor()==$obj->getcdproveedor())
    if($this->getcddocumento()==$obj->getcddocumento())
       return true;
    return false;
  }


} /* fin clase [DoctoProveedorBean] */

?>

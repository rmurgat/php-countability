<?php

/**
 * @name: TpcomproBean
 * @creation date: (22-Jun-2010)
 * Descripci?n:
 * Clase que tiene la informacion relativa a el tipo de comprobante
 * @author: Ruben Murga Tapia
 * @conpany: HANYGEN SOFTWARE S.A. DE C.V.
 **/

class TpcomproBean {
    var $scdtpcomprobante = "";       // Clave del tipo de comprobante o documento(factura, honorarios...)
    var $scdpais = "";                       // Clave del pais
    var $ssttpcomprob = "";              // Estatus con el tipo de comprobante o documento
    var $snbtpcomprob = "";              // Nombre del tipo de comprobante contable (factura, recibo...)

  /**
   * CONSTRUCTOR
  */
  function TpcomproBean() {
  }

  /**
   *  PROPIEDAD: Clave del tipo de comprobante o documento(factura, honorarios...)
   *  @return valor de la propiedad
  */
  function getcdtpcomprobante() {
    return $this->scdtpcomprobante;
  }

  /**
   *  PROPIEDAD: Clave del tipo de comprobante o documento(factura, honorarios...)  
   *  @param $val - nuevo valor
  */
  function setcdtpcomprobante($val) {
    $this->scdtpcomprobante = $val;
  }
  
  /**
   *  PROPIEDAD: Clave del pais
   *  @return valor de la propiedad
  */
  function getcdpais() {
    return $this->scdpais;
  }

  /**
   *  PROPIEDAD: Clave del pais  
   *  @param $val - nuevo valor
  */
  function setcdpais($val) {
    $this->scdpais = $val;
  }
  
  /**
   *  PROPIEDAD: Estatus con el tipo de comprobante o documento
   *  @return valor de la propiedad
  */
  function getsttpcomprob() {
    return $this->ssttpcomprob;
  }

  /**
   *  PROPIEDAD: Estatus con el tipo de comprobante o documento  
   *  @param $val - nuevo valor
  */
  function setsttpcomprob($val) {
    if($val=='') $val='IN';
    $this->ssttpcomprob = $val;
  }
  
  /**
   *  PROPIEDAD: Nombre del tipo de comprobante contable (factura, recibo...)
   *  @return valor de la propiedad
  */
  function getnbtpcomprob() {
    return $this->snbtpcomprob;
  }

  /**
   *  PROPIEDAD: Nombre del tipo de comprobante contable (factura, recibo...)  
   *  @param $val - nuevo valor
  */
  function setnbtpcomprob($val) {
    $this->snbtpcomprob = $val;
  }
  
  /**
   *  PROCEDIMIENTO para determina si los objetos tienen la misma llave
   *  @param $obj - objeto 
  */
  function hasamekey($obj) {
    if($this->getcdtpcomprobante()==$obj->getcdtpcomprobante())
       return true;
    return false;
  }

} /* fin clase [TpcomproBean] */

?>

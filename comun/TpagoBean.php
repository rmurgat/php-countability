<?php

/**
 * @name: TpagoBean
 * @creation date: (22-Jun-2010)
 * Descripci?n:
 * Clase que tiene el cat�logo de tipos de pago
 * @author: Ruben Murga Tapia
 * @conpany: HANYGEN SOFTWARE S.A. DE C.V.
 **/

class TpagoBean {
    var $scdtpago = "";              // Clave del tipo de pago
    var $ssttpago = "";              // Estatus del tipo de pago
    var $scdpais = "";              // Clave del pais
    var $snbpago = "";              // Nombre del tipo de pago

  /**
   * CONSTRUCTOR
  */
  function TpagoBean() {
  }

  /**
   *  PROPIEDAD: Clave del tipo de pago
   *  @return valor de la propiedad
  */
  function getcdtpago() {
    return $this->scdtpago;
  }

  /**
   *  PROPIEDAD: Clave del tipo de pago  
   *  @param $val - nuevo valor
  */
  function setcdtpago($val) {
    $this->scdtpago = $val;
  }
  
  /**
   *  PROPIEDAD: Estatus del tipo de pago
   *  @return valor de la propiedad
  */
  function getsttpago() {
    return $this->ssttpago;
  }

  /**
   *  PROPIEDAD: Estatus del tipo de pago  
   *  @param $val - nuevo valor
  */
  function setsttpago($val) {
    if($val=='') $val='IN';
    $this->ssttpago = $val;
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
   *  PROPIEDAD: Nombre del tipo de pago
   *  @return valor de la propiedad
  */
  function getnbpago() {
    return $this->snbpago;
  }

  /**
   *  PROPIEDAD: Nombre del tipo de pago  
   *  @param $val - nuevo valor
  */
  function setnbpago($val) {
    $this->snbpago = $val;
  }
  

  /**
   *  PROCEDIMIENTO para determina si los objetos tienen la misma llave
   *  @param $obj - objeto 
  */
  function hasamekey($obj) {
    if($this->getcdtpago()==$obj->getcdtpago())
       return true;
    return false;
  }


} /* fin clase [TpagoBean] */

?>

<?php

/**
 * @name: TpcuentaBean
 * @creation date: (22-Jun-2010)
 * Descripci?n:
 * Clase que tiene el catalogo de tipos de cuenta
 * @author: Ruben Murga Tapia
 * @conpany: HANYGEN SOFTWARE S.A. DE C.V.
 **/

class TpcuentaBean {
    var $scdtpcuenta = "";              // Clave del tipo de cuenta contable
    var $ssttpcuenta = "";              // Estatus del tipo de cuenta contable
    var $scdpais = "";              // Clave del pais
    var $snbtpcuenta = "";              // Nombre del tipo de cuenta contable

  /**
   * CONSTRUCTOR
  */
  function TpcuentaBean() {
  }

  /**
   *  PROPIEDAD: Clave del tipo de cuenta contable
   *  @return valor de la propiedad
  */
  function getcdtpcuenta() {
    return $this->scdtpcuenta;
  }

  /**
   *  PROPIEDAD: Clave del tipo de cuenta contable  
   *  @param $val - nuevo valor
  */
  function setcdtpcuenta($val) {
    $this->scdtpcuenta = $val;
  }
  
  /**
   *  PROPIEDAD: Estatus del tipo de cuenta contable
   *  @return valor de la propiedad
  */
  function getsttpcuenta() {
    return $this->ssttpcuenta;
  }

  /**
   *  PROPIEDAD: Estatus del tipo de cuenta contable  
   *  @param $val - nuevo valor
  */
  function setsttpcuenta($val) {
    if($val=='') $val='IN';
    $this->ssttpcuenta = $val;
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
   *  PROPIEDAD: Nombre del tipo de cuenta contable
   *  @return valor de la propiedad
  */
  function getnbtpcuenta() {
    return $this->snbtpcuenta;
  }

  /**
   *  PROPIEDAD: Nombre del tipo de cuenta contable  
   *  @param $val - nuevo valor
  */
  function setnbtpcuenta($val) {
    $this->snbtpcuenta = $val;
  }
  

  /**
   *  PROCEDIMIENTO para determina si los objetos tienen la misma llave
   *  @param $obj - objeto 
  */
  function hasamekey($obj) {
    if($this->getcdtpcuenta()==$obj->getcdtpcuenta())
       return true;
    return false;
  }


} /* fin clase [TpcuentaBean] */

?>

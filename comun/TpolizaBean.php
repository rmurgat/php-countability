<?php

/**
 * @name: TpolizaBean
 * @creation date: (22-Jun-2010)
 * Descripci?n:
 * Clase que tiene el cat�logo de tipos de poliza
 * @author: Ruben Murga Tapia
 * @conpany: HANYGEN SOFTWARE S.A. DE C.V.
 **/

class TpolizaBean {
    var $scdtpoliza = "";              // Clave del tipo de poliza
    var $ssttpoliza = "";              // Estatus del tipo de poliza
    var $scdpais = "";              // Clave del pais
    var $snbtpoliza = "";              // Nombre del tipo de poliza

  /**
   * CONSTRUCTOR
  */
  function TpolizaBean() {
  }

  /**
   *  PROPIEDAD: Clave del tipo de poliza
   *  @return valor de la propiedad
  */
  function getcdtpoliza() {
    return $this->scdtpoliza;
  }

  /**
   *  PROPIEDAD: Clave del tipo de poliza  
   *  @param $val - nuevo valor
  */
  function setcdtpoliza($val) {
    $this->scdtpoliza = $val;
  }
  
  /**
   *  PROPIEDAD: Estatus del tipo de poliza
   *  @return valor de la propiedad
  */
  function getsttpoliza() {
    return $this->ssttpoliza;
  }

  /**
   *  PROPIEDAD: Estatus del tipo de poliza  
   *  @param $val - nuevo valor
  */
  function setsttpoliza($val) {
    if($val=='') $val = 'IN';
    $this->ssttpoliza = $val;
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
   *  PROPIEDAD: Nombre del tipo de poliza
   *  @return valor de la propiedad
  */
  function getnbtpoliza() {
    return $this->snbtpoliza;
  }

  /**
   *  PROPIEDAD: Nombre del tipo de poliza  
   *  @param $val - nuevo valor
  */
  function setnbtpoliza($val) {
    $this->snbtpoliza = $val;
  }
  

  /**
   *  PROCEDIMIENTO para determina si los objetos tienen la misma llave
   *  @param $obj - objeto 
  */
  function hasamekey($obj) {
    if($this->getcdtpoliza()==$obj->getcdtpoliza())
       return true;
    return false;
  }


} /* fin clase [TpolizaBean] */

?>

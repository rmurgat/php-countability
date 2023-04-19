<?php

/**
 * @name: PaisBean
 * @creation date: (22-Jun-2010)
 * Descripci?n:
 * Clase que tiene el catálogo de paises que se pueden utilizar en el sistema
 * @author: Ruben Murga Tapia
 * @conpany: HANYGEN SOFTWARE S.A. DE C.V.
 **/

class PaisBean {
    var $scdpais = "";              // Clave del pais
    var $snbpais = "";              // Nombre del pais

  /**
   * CONSTRUCTOR
  */
  function PaisBean() {
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
   *  PROPIEDAD: Nombre del pais
   *  @return valor de la propiedad
  */
  function getnbpais() {
    return $this->snbpais;
  }

  /**
   *  PROPIEDAD: Nombre del pais  
   *  @param $val - nuevo valor
  */
  function setnbpais($val) {
    $this->snbpais = $val;
  }
  

  /**
   *  PROCEDIMIENTO para determina si los objetos tienen la misma llave
   *  @param $obj - objeto 
  */
  function hasamekey($obj) {
    if($this->getcdpais()==$obj->getcdpais())
       return true;
    return false;
  }


} /* fin clase [PaisBean] */

?>

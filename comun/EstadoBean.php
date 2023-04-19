<?php

/**
 * @name: EstadoBean
 * @creation date: (22-Jun-2010)
 * Descripci?n:
 * Clase que tiene el catálogo de estados de la republica
 * @author: Ruben Murga Tapia
 * @conpany: HANYGEN SOFTWARE S.A. DE C.V.
 **/

class EstadoBean {
    var $scdestado = "";              // Clave del estado
    var $scdpais = "";              // Clave del pais
    var $snbestado = "";              // Nombre del estado

  /**
   * CONSTRUCTOR
  */
  function EstadoBean() {
  }

  /**
   *  PROPIEDAD: Clave del estado
   *  @return valor de la propiedad
  */
  function getcdestado() {
    return $this->scdestado;
  }

  /**
   *  PROPIEDAD: Clave del estado  
   *  @param $val - nuevo valor
  */
  function setcdestado($val) {
    $this->scdestado = $val;
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
   *  PROPIEDAD: Nombre del estado
   *  @return valor de la propiedad
  */
  function getnbestado() {
    return $this->snbestado;
  }

  /**
   *  PROPIEDAD: Nombre del estado  
   *  @param $val - nuevo valor
  */
  function setnbestado($val) {
    $this->snbestado = $val;
  }
  

  /**
   *  PROCEDIMIENTO para determina si los objetos tienen la misma llave
   *  @param $obj - objeto 
  */
  function hasamekey($obj) {
    if($this->getcdestado()==$obj->getcdestado())
       return true;
    return false;
  }


} /* fin clase [EstadoBean] */

?>

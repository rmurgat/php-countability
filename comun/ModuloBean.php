<?php

/**
 * @name: ModuloBean
 * @creation date: (07-Julio-2010)
 * Descripci?n:
 * Clase que tiene la informacion relativa a los modulos que aparecen en el sistema
 * @author: Ruben Murga Tapia
 * @conpany: HANYGEN SOFTWARE S.A. DE C.V.
 **/

class ModuloBean {
    var $scdmodulo = "";              // Clave del modulo del sistema
    var $sidensistema = "";              // Identificador interno del modulo en el sistema
    var $snblabel = "";              // Etiqueta que tiene el modulo en el sistema
    var $snbmodulo = "";              // Nombre del modulo en el sistema
    var $stxcomment = "";              // Comentarios respecto al modulo

  /**
   * CONSTRUCTOR
  */
  function ModuloBean() {
  }

  /**
   *  PROPIEDAD: Clave del modulo del sistema
   *  @return valor de la propiedad
  */
  function getcdmodulo() {
    return $this->scdmodulo;
  }

  /**
   *  PROPIEDAD: Clave del modulo del sistema  
   *  @param $val - nuevo valor
  */
  function setcdmodulo($val) {
    $this->scdmodulo = $val;
  }
  
  /**
   *  PROPIEDAD: Identificador interno del modulo en el sistema
   *  @return valor de la propiedad
  */
  function getidensistema() {
    return $this->sidensistema;
  }

  /**
   *  PROPIEDAD: Identificador interno del modulo en el sistema  
   *  @param $val - nuevo valor
  */
  function setidensistema($val) {
    $this->sidensistema = $val;
  }
  
  /**
   *  PROPIEDAD: Etiqueta que tiene el modulo en el sistema
   *  @return valor de la propiedad
  */
  function getnblabel() {
    return $this->snblabel;
  }

  /**
   *  PROPIEDAD: Etiqueta que tiene el modulo en el sistema  
   *  @param $val - nuevo valor
  */
  function setnblabel($val) {
    $this->snblabel = $val;
  }
  
  /**
   *  PROPIEDAD: Nombre del modulo en el sistema
   *  @return valor de la propiedad
  */
  function getnbmodulo() {
    return $this->snbmodulo;
  }

  /**
   *  PROPIEDAD: Nombre del modulo en el sistema  
   *  @param $val - nuevo valor
  */
  function setnbmodulo($val) {
    $this->snbmodulo = $val;
  }
  
  /**
   *  PROPIEDAD: Comentarios respecto al modulo
   *  @return valor de la propiedad
  */
  function gettxcomment() {
    return $this->stxcomment;
  }

  /**
   *  PROPIEDAD: Comentarios respecto al modulo  
   *  @param $val - nuevo valor
  */
  function settxcomment($val) {
    $this->stxcomment = $val;
  }
  

  /**
   *  PROCEDIMIENTO para determina si los objetos tienen la misma llave
   *  @param $obj - objeto 
  */
  function hasamekey($obj) {
    if($this->getcdmodulo()==$obj->getcdmodulo())
       return true;
    return false;
  }


} /* fin clase [ModuloBean] */

?>

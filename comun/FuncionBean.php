<?php

/**
 * @name: FuncionBean
 * @creation date: (07-Julio-2010)
 * Descripci?n:
 * Clase que tiene la informacion relativa a las funciones que tiene un modulo en particular
 * @author: Ruben Murga Tapia
 * @conpany: HANYGEN SOFTWARE S.A. DE C.V.
 **/

class FuncionBean {
    var $scdmodulo = "";              // Clave del modulo
    var $scdfuncion = "";              // Clave de la funcion
    var $snuorden = "";              // Numero de orden en el que aparecen las funciones
    var $sidensistema = "";              // Clave interna de esta funcion en el sistema
    var $snblabel = "";              // Etiqueta que tiene la funcion en pantalla
    var $snbfuncion = "";              // Nombre de la funcion
    var $stxurl = "";              // URL de quien responde a esta funcion
    var $stxcomment = "";              // Comentarios respecto a la funcion

  /**
   * CONSTRUCTOR
  */
  function FuncionBean() {
  }

  /**
   *  PROPIEDAD: Clave del modulo
   *  @return valor de la propiedad
  */
  function getcdmodulo() {
    return $this->scdmodulo;
  }

  /**
   *  PROPIEDAD: Clave del modulo  
   *  @param $val - nuevo valor
  */
  function setcdmodulo($val) {
    $this->scdmodulo = $val;
  }
  
  /**
   *  PROPIEDAD: Clave de la funcion
   *  @return valor de la propiedad
  */
  function getcdfuncion() {
    return $this->scdfuncion;
  }

  /**
   *  PROPIEDAD: Clave de la funcion  
   *  @param $val - nuevo valor
  */
  function setcdfuncion($val) {
    $this->scdfuncion = $val;
  }
  
  /**
   *  PROPIEDAD: Numero de orden en el que aparecen las funciones
   *  @return valor de la propiedad
  */
  function getnuorden() {
    return $this->snuorden;
  }

  /**
   *  PROPIEDAD: Numero de orden en el que aparecen las funciones  
   *  @param $val - nuevo valor
  */
  function setnuorden($val) {
    $this->snuorden = $val;
  }
  
  /**
   *  PROPIEDAD: Clave interna de esta funcion en el sistema
   *  @return valor de la propiedad
  */
  function getidensistema() {
    return $this->sidensistema;
  }

  /**
   *  PROPIEDAD: Clave interna de esta funcion en el sistema  
   *  @param $val - nuevo valor
  */
  function setidensistema($val) {
    $this->sidensistema = $val;
  }
  
  /**
   *  PROPIEDAD: Etiqueta que tiene la funcion en pantalla
   *  @return valor de la propiedad
  */
  function getnblabel() {
    return $this->snblabel;
  }

  /**
   *  PROPIEDAD: Etiqueta que tiene la funcion en pantalla  
   *  @param $val - nuevo valor
  */
  function setnblabel($val) {
    $this->snblabel = $val;
  }
  
  /**
   *  PROPIEDAD: Nombre de la funcion
   *  @return valor de la propiedad
  */
  function getnbfuncion() {
    return $this->snbfuncion;
  }

  /**
   *  PROPIEDAD: Nombre de la funcion  
   *  @param $val - nuevo valor
  */
  function setnbfuncion($val) {
    $this->snbfuncion = $val;
  }
  
  /**
   *  PROPIEDAD: URL de quien responde a esta funcion
   *  @return valor de la propiedad
  */
  function gettxurl() {
    return $this->stxurl;
  }

  /**
   *  PROPIEDAD: URL de quien responde a esta funcion  
   *  @param $val - nuevo valor
  */
  function settxurl($val) {
    $this->stxurl = $val;
  }
  
  /**
   *  PROPIEDAD: Comentarios respecto a la funcion
   *  @return valor de la propiedad
  */
  function gettxcomment() {
    return $this->stxcomment;
  }

  /**
   *  PROPIEDAD: Comentarios respecto a la funcion  
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
    if($this->getcdfuncion()==$obj->getcdfuncion())
       return true;
    return false;
  }


} /* fin clase [FuncionBean] */

?>

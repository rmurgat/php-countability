<?php

/**
 * @name: SessionBean
 * @creation date: (07-Julio-2010)
 * Descripcion:
 * Clase que tiene la informacion relativa a las sesiones de los usuarios
 * @author: Ruben Murga Tapia
 * @conpany: HANYGEN SOFTWARE S.A. DE C.V.
 **/

class SessionBean {
    var $scdsession = "";             // Clave de la session
    var $scdusuario = "";              // Clave del usuario
    var $scdempresa = "";            // Clave de la empresa
    var $scdperfil = "";                  // Clave del perfil
    var $scdejercicio = "";             // Ejercicio fiscal
    var $sfhsession = "";              // Fecha de la session

  /**
   * CONSTRUCTOR
  */
  function SessionBean() {
  }

  /**
   *  PROPIEDAD: Clave de la session
   *  @return valor de la propiedad
  */
  function getcdsession() {
    return $this->scdsession;
  }

  /**
   *  PROPIEDAD: Clave de la session  
   *  @param $val - nuevo valor
  */
  function setcdsession($val) {
    $this->scdsession = $val;
  }

  /**
   *  PROPIEDAD: Clave del usuario
   *  @return valor de la propiedad
  */
  function getcdusuario() {
    return $this->scdusuario;
  }

  /**
   *  PROPIEDAD: Clave del usuario  
   *  @param $val - nuevo valor
  */
  function setcdusuario($val) {
    $this->scdusuario = $val;
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
   *  PROPIEDAD: Clave del perfil
   *  @return valor de la propiedad
  */
  function getcdperfil() {
    return $this->scdperfil;
  }

  /**
   *  PROPIEDAD: Clave del perfil  
   *  @param $val - nuevo valor
  */
  function setcdperfil($val) {
    $this->scdperfil = $val;
  }

  /**
   *  PROPIEDAD: Fecha de la session
   *  @return valor de la propiedad
  */
  function getfhsession() {
    return $this->sfhsession;
  }

  /**
   *  PROPIEDAD: Ejercicio fiscal
   *  @return valor de la propiedad
  */
  function getcdejercicio() {
    return $this->scdejercicio;
  }

  /**
   *  PROPIEDAD: Ejercicio fiscal  
   *  @param $val - nuevo valor
  */
  function setcdejercicio($val) {
    $this->scdejercicio = $val;
  }

  /**
   *  PROPIEDAD: Fecha de la session  
   *  @param $val - nuevo valor
  */
  function setfhsession($val) {
    $this->sfhsession = $val;
  }

  /**
   *  PROCEDIMIENTO para determina si los objetos tienen la misma llave
   *  @param $obj - objeto 
  */
  function hasamekey($obj) {
    if($this->getcdsession()==$obj->getcdsession())
       return true;
    return false;
  }


} /* fin clase [SessionBean] */

?>

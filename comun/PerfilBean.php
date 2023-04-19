<?php

/**
 * @name: PerfilBean
 * @creation date: (07-Julio-2010)
 * Descripci?n:
 * Clase que tiene los perfiles registrados en el sistema
 * @author: Ruben Murga Tapia
 * @conpany: HANYGEN SOFTWARE S.A. DE C.V.
 **/

class PerfilBean {
    var $scdempresa = "";              // Clave de la empresa
    var $scdperfil = "";              // Clave del perfil
    var $sstperfil = "";              // Estatus del perfil
    var $snbperfil = "";              // Nombre del perfil

  /**
   * CONSTRUCTOR
  */
  function PerfilBean() {
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
   *  PROPIEDAD: Estatus del perfil
   *  @return valor de la propiedad
  */
  function getstperfil() {
    return $this->sstperfil;
  }

  /**
   *  PROPIEDAD: Estatus del perfil  
   *  @param $val - nuevo valor
  */
  function setstperfil($val) {
    $this->sstperfil = $val;
  }
  
  /**
   *  PROPIEDAD: Nombre del perfil
   *  @return valor de la propiedad
  */
  function getnbperfil() {
    return $this->snbperfil;
  }

  /**
   *  PROPIEDAD: Nombre del perfil  
   *  @param $val - nuevo valor
  */
  function setnbperfil($val) {
    $this->snbperfil = $val;
  }
  

  /**
   *  PROCEDIMIENTO para determina si los objetos tienen la misma llave
   *  @param $obj - objeto 
  */
  function hasamekey($obj) {
    if($this->getcdempresa()==$obj->getcdempresa())
    if($this->getcdperfil()==$obj->getcdperfil())
       return true;
    return false;
  }


} /* fin clase [PerfilBean] */

?>

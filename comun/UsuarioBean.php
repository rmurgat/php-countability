<?php

/**
 * @name: UsuarioBean
 * @creation date: (07-Julio-2010)
 * Descripci?n:
 * Clase que tiene la informacion relativa a los usuarios que pueden operar el sistema
 * @author: Ruben Murga Tapia
 * @conpany: HANYGEN SOFTWARE S.A. DE C.V.
 **/

class UsuarioBean {
    var $scdusuario = "";              // Clave del usuario
    var $sstusuario = "";              // Estatus del usuario
    var $scdpassword = "";              // Password del usuario en el sistema
    var $snbusuario = "";              // Nombre del usuario
    var $stxemail = "";              // Correo electronico del usuario
    var $snbempresa = "";              // Nombre de la empresa

  /**
   * CONSTRUCTOR
  */
  function UsuarioBean() {
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
   *  PROPIEDAD: Estatus del usuario
   *  @return valor de la propiedad
  */
  function getstusuario() {
    return $this->sstusuario;
  }

  /**
   *  PROPIEDAD: Estatus del usuario  
   *  @param $val - nuevo valor
  */
  function setstusuario($val) {
    $this->sstusuario = $val;
  }
  
  /**
   *  PROPIEDAD: Password del usuario en el sistema
   *  @return valor de la propiedad
  */
  function getcdpassword() {
    return $this->scdpassword;
  }

  /**
   *  PROPIEDAD: Password del usuario en el sistema  
   *  @param $val - nuevo valor
  */
  function setcdpassword($val) {
    $this->scdpassword = $val;
  }
  
  /**
   *  PROPIEDAD: Nombre del usuario
   *  @return valor de la propiedad
  */
  function getnbusuario() {
    return $this->snbusuario;
  }

  /**
   *  PROPIEDAD: Nombre del usuario  
   *  @param $val - nuevo valor
  */
  function setnbusuario($val) {
    $this->snbusuario = $val;
  }
  
  /**
   *  PROPIEDAD: Correo electronico del usuario
   *  @return valor de la propiedad
  */
  function gettxemail() {
    return $this->stxemail;
  }

  /**
   *  PROPIEDAD: Correo electronico del usuario  
   *  @param $val - nuevo valor
  */
  function settxemail($val) {
    $this->stxemail = $val;
  }
  
  /**
   *  PROPIEDAD: Nombre de la empresa
   *  @return valor de la propiedad
  */
  function getnbempresa() {
    return $this->snbempresa;
  }

  /**
   *  PROPIEDAD: Nombre de la empresa  
   *  @param $val - nuevo valor
  */
  function setnbempresa($val) {
    $this->snbempresa = $val;
  }
  

  /**
   *  PROCEDIMIENTO para determina si los objetos tienen la misma llave
   *  @param $obj - objeto 
  */
  function hasamekey($obj) {
    if($this->getcdusuario()==$obj->getcdusuario())
       return true;
    return false;
  }


} /* fin clase [UsuarioBean] */

?>

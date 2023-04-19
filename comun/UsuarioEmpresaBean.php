<?php

/**
 * @name: UsuarioEmpresaBean
 * @creation date: (07-Julio-2010)
 * Descripci?n:
 * Clase que tiene la relacion que existe entre los usuarios y las empresas de las cuales puede operar la contabilidad
 * @author: Ruben Murga Tapia
 * @conpany: HANYGEN SOFTWARE S.A. DE C.V.
 **/

class UsuarioEmpresaBean {
    var $scdempresa = "";              // Clave de la empresa
    var $scdusuario = "";              // Clave del usuario
    var $sstusuarioempresa = "";              // Estatus del usuario en la empresa
    var $scdperfil = "";              // Clave del perfil que tiene el usuario en la empresa
    var $stxcomment = "";              // Comentarios de la relacion

  /**
   * CONSTRUCTOR
  */
  function UsuarioEmpresaBean() {
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
   *  PROPIEDAD: Estatus del usuario en la empresa
   *  @return valor de la propiedad
  */
  function getstusuarioempresa() {
    return $this->sstusuarioempresa;
  }

  /**
   *  PROPIEDAD: Estatus del usuario en la empresa  
   *  @param $val - nuevo valor
  */
  function setstusuarioempresa($val) {
    $this->sstusuarioempresa = $val;
  }
  
  /**
   *  PROPIEDAD: Clave del perfil que tiene el usuario en la empresa
   *  @return valor de la propiedad
  */
  function getcdperfil() {
    return $this->scdperfil;
  }

  /**
   *  PROPIEDAD: Clave del perfil que tiene el usuario en la empresa  
   *  @param $val - nuevo valor
  */
  function setcdperfil($val) {
    $this->scdperfil = $val;
  }
  
  /**
   *  PROPIEDAD: Comentarios de la relacion
   *  @return valor de la propiedad
  */
  function gettxcomment() {
    return $this->stxcomment;
  }

  /**
   *  PROPIEDAD: Comentarios de la relacion  
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
    if($this->getcdempresa()==$obj->getcdempresa())
    if($this->getcdusuario()==$obj->getcdusuario())
       return true;
    return false;
  }


} /* fin clase [UsuarioEmpresaBean] */

?>

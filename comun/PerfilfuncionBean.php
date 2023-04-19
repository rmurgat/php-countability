<?php

/**
 * @name: PerfilfuncionBean
 * @creation date: (07-Julio-2010)
 * Descripci?n:
 * Clase que tiene las funciones a las que aplica un perfil del sistema
 * @author: Ruben Murga Tapia
 * @conpany: HANYGEN SOFTWARE S.A. DE C.V.
 **/

class PerfilfuncionBean {
    var $scdempresa = "";              // Clave de la empresa
    var $scdmodulo = "";              // Clave del modulo
    var $scdfuncion = "";              // Clave de la funcion
    var $scdperfil = "";              // Clave dcel perfil
    var $ssttodo = "";              // Estatus que determina si el usuario tiene todos los privilegios
    var $sstconsulta = "";              // Estatus que determina si el usuario puede consultar
    var $sstagregar = "";              // Estatus que determina si el usuario puede agregar
    var $sstmodifica = "";              // Estatus que determina si el usuario puede modificar
    var $sstelimina = "";              // Estatus que determina si el usuario puede eliminar

  /**
   * CONSTRUCTOR
  */
  function PerfilfuncionBean() {
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
   *  PROPIEDAD: Clave dcel perfil
   *  @return valor de la propiedad
  */
  function getcdperfil() {
    return $this->scdperfil;
  }

  /**
   *  PROPIEDAD: Clave dcel perfil  
   *  @param $val - nuevo valor
  */
  function setcdperfil($val) {
    $this->scdperfil = $val;
  }
  
  /**
   *  PROPIEDAD: Estatus que determina si el usuario tiene todos los privilegios
   *  @return valor de la propiedad
  */
  function getsttodo() {
    return $this->ssttodo;
  }

  /**
   *  PROPIEDAD: Estatus que determina si el usuario tiene todos los privilegios  
   *  @param $val - nuevo valor
  */
  function setsttodo($val) {
    $this->ssttodo = $val;
  }
  
  /**
   *  PROPIEDAD: Estatus que determina si el usuario puede consultar
   *  @return valor de la propiedad
  */
  function getstconsulta() {
    return $this->sstconsulta;
  }

  /**
   *  PROPIEDAD: Estatus que determina si el usuario puede consultar  
   *  @param $val - nuevo valor
  */
  function setstconsulta($val) {
    $this->sstconsulta = $val;
  }
  
  /**
   *  PROPIEDAD: Estatus que determina si el usuario puede agregar
   *  @return valor de la propiedad
  */
  function getstagregar() {
    return $this->sstagregar;
  }

  /**
   *  PROPIEDAD: Estatus que determina si el usuario puede agregar  
   *  @param $val - nuevo valor
  */
  function setstagregar($val) {
    $this->sstagregar = $val;
  }
  
  /**
   *  PROPIEDAD: Estatus que determina si el usuario puede modificar
   *  @return valor de la propiedad
  */
  function getstmodifica() {
    return $this->sstmodifica;
  }

  /**
   *  PROPIEDAD: Estatus que determina si el usuario puede modificar  
   *  @param $val - nuevo valor
  */
  function setstmodifica($val) {
    $this->sstmodifica = $val;
  }
  
  /**
   *  PROPIEDAD: Estatus que determina si el usuario puede eliminar
   *  @return valor de la propiedad
  */
  function getstelimina() {
    return $this->sstelimina;
  }

  /**
   *  PROPIEDAD: Estatus que determina si el usuario puede eliminar  
   *  @param $val - nuevo valor
  */
  function setstelimina($val) {
    $this->sstelimina = $val;
  }
  

  /**
   *  PROCEDIMIENTO para determina si los objetos tienen la misma llave
   *  @param $obj - objeto 
  */
  function hasamekey($obj) {
    if($this->getcdempresa()==$obj->getcdempresa())
    if($this->getcdmodulo()==$obj->getcdmodulo())
    if($this->getcdfuncion()==$obj->getcdfuncion())
    if($this->getcdperfil()==$obj->getcdperfil())
       return true;
    return false;
  }


} /* fin clase [PerfilfuncionBean] */

?>

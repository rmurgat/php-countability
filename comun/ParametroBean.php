<?php

/**
 * @name: ParametroBean
 * @creation date: (02-Julio-2010)
 * Descripci?n:
 * Clase que tiene la informacion relativa a los parametros del sistema
 * @author: Ruben Murga Tapia
 * @conpany: HANYGEN SOFTWARE S.A. DE C.V.
 **/

class ParametroBean {
    var $scdempresa = "";              // Clave de la empresa
    var $scdparametro = "";              // Clave del parametro
    var $sstparametro = "";              // Estatus del parametro para la empresa
    var $snbparamero = "";              // Nombre del parametro para la empresa
    var $stxvalor = "";              // Texto o valor del parametro para la empresa

  /**
   * CONSTRUCTOR
  */
  function ParametroBean() {
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
   *  PROPIEDAD: Clave del parametro
   *  @return valor de la propiedad
  */
  function getcdparametro() {
    return $this->scdparametro;
  }

  /**
   *  PROPIEDAD: Clave del parametro  
   *  @param $val - nuevo valor
  */
  function setcdparametro($val) {
    $this->scdparametro = $val;
  }
  
  /**
   *  PROPIEDAD: Estatus del parametro para la empresa
   *  @return valor de la propiedad
  */
  function getstparametro() {
    return $this->sstparametro;
  }

  /**
   *  PROPIEDAD: Estatus del parametro para la empresa  
   *  @param $val - nuevo valor
  */
  function setstparametro($val) {
    $this->sstparametro = $val;
  }
  
  /**
   *  PROPIEDAD: Nombre del parametro para la empresa
   *  @return valor de la propiedad
  */
  function getnbparamero() {
    return $this->snbparamero;
  }

  /**
   *  PROPIEDAD: Nombre del parametro para la empresa  
   *  @param $val - nuevo valor
  */
  function setnbparamero($val) {
    $this->snbparamero = $val;
  }
  
  /**
   *  PROPIEDAD: Texto o valor del parametro para la empresa
   *  @return valor de la propiedad
  */
  function gettxvalor() {
    return $this->stxvalor;
  }

  /**
   *  PROPIEDAD: Texto o valor del parametro para la empresa  
   *  @param $val - nuevo valor
  */
  function settxvalor($val) {
    $this->stxvalor = $val;
  }
  

  /**
   *  PROCEDIMIENTO para determina si los objetos tienen la misma llave
   *  @param $obj - objeto 
  */
  function hasamekey($obj) {
    if($this->getcdempresa()==$obj->getcdempresa())
    if($this->getcdparametro()==$obj->getcdparametro())
       return true;
    return false;
  }


} /* fin clase [ParametroBean] */

?>

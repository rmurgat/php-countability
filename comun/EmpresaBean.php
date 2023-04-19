<?php

/**
 * @name: EmpresaBean
 * @creation date: (02-Julio-2010)
 * Descripci?n:
 * Clase que tiene la informacion relativa a la empresa de la cual se administra su contabilidad
 * @author: Ruben Murga Tapia
 * @conpany: HANYGEN SOFTWARE S.A. DE C.V.
 **/

class EmpresaBean {
    var $scdempresa = "";              // Clave de la empresa
    var $scdpais = "";                    // Clave del pais
    var $sstempresa = "";              // Estatus de la empresa
    var $dpoiva = 0;                       // Porcentaje de iva de la empresa
    var $scdrfc = "";                      // Clave del rfc de la empresa
    var $snutelefono = "";              // Numero de telefono de la empresa
    var $snbempresa = "";              // Nombre de la empresa
    var $stxdireccion = "";              // Direccion de la empresa
    var $slklogoheader = "";           // Direccion del logotipo que se coloca en el header de sistema

  /**
   * CONSTRUCTOR
  */
  function EmpresaBean() {
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
   *  PROPIEDAD: Estatus de la empresa
   *  @return valor de la propiedad
  */
  function getstempresa() {
    return $this->sstempresa;
  }

  /**
   *  PROPIEDAD: Estatus de la empresa  
   *  @param $val - nuevo valor
  */
  function setstempresa($val) {
    $this->sstempresa = $val;
  }
  
  /**
   *  PROPIEDAD: Porcentaje de iva de la empresa
   *  @return valor de la propiedad
  */
  function getpoiva() {
    return $this->dpoiva;
  }

  /**
   *  PROPIEDAD: Porcentaje de iva de la empresa  
   *  @param $val - nuevo valor
  */
  function setpoiva($val) {
    $this->dpoiva = $val;
  }
  
  /**
   *  PROPIEDAD: Clave del rfc de la empresa
   *  @return valor de la propiedad
  */
  function getcdrfc() {
    return $this->scdrfc;
  }

  /**
   *  PROPIEDAD: Clave del rfc de la empresa  
   *  @param $val - nuevo valor
  */
  function setcdrfc($val) {
    $this->scdrfc = $val;
  }
  
  /**
   *  PROPIEDAD: Numero de telefono de la empresa
   *  @return valor de la propiedad
  */
  function getnutelefono() {
    return $this->snutelefono;
  }

  /**
   *  PROPIEDAD: Numero de telefono de la empresa  
   *  @param $val - nuevo valor
  */
  function setnutelefono($val) {
    $this->snutelefono = $val;
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
   *  PROPIEDAD: Direccion de la empresa
   *  @return valor de la propiedad
  */
  function gettxdireccion() {
    return $this->stxdireccion;
  }

  /**
   *  PROPIEDAD: Direccion de la empresa  
   *  @param $val - nuevo valor
  */
  function settxdireccion($val) {
    $this->stxdireccion = $val;
  }
  
  /**
   *  PROPIEDAD: Direccion del logotipo que se coloca en el header de sistema
   *  @return valor de la propiedad
  */
  function getlklogoheader() {
    return $this->slklogoheader;
  }

  /**
   *  PROPIEDAD: Direccion del logotipo que se coloca en el header de sistema  
   *  @param $val - nuevo valor
  */
  function setlklogoheader($val) {
    $this->slklogoheader = $val;
  }

  /**
   *  PROCEDIMIENTO para determina si los objetos tienen la misma llave
   *  @param $obj - objeto 
  */
  function hasamekey($obj) {
    if($this->getcdempresa()==$obj->getcdempresa())
       return true;
    return false;
  }


} /* fin clase [EmpresaBean] */

?>

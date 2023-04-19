<?php

/**
 * @name: MesBean
 * @creation date: (02-Julio-2010)
 * Descripci?n:
 * Clase que tiene la informacion de los meses de corte
 * @author: Ruben Murga Tapia
 * @conpany: HANYGEN SOFTWARE S.A. DE C.V.
 **/

class MesBean {
    var $scdempresa = "";              // Clave de la empresa
    var $scdejercicio = "";              // Clave del ejercicio fiscal
    var $snumes = "";              // Numero de mes
    var $sstcorte = "";              // Estatus de corde de este mes
    var $scdusuario = "";              // Clave del usuario
    var $snbmes = "";              // Nombre del mes

  /**
   * CONSTRUCTOR
  */
  function MesBean() {
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
   *  PROPIEDAD: Clave del ejercicio fiscal
   *  @return valor de la propiedad
  */
  function getcdejercicio() {
    return $this->scdejercicio;
  }

  /**
   *  PROPIEDAD: Clave del ejercicio fiscal  
   *  @param $val - nuevo valor
  */
  function setcdejercicio($val) {
    $this->scdejercicio = $val;
  }
  
  /**
   *  PROPIEDAD: Numero de mes
   *  @return valor de la propiedad
  */
  function getnumes() {
    return $this->snumes;
  }

  /**
   *  PROPIEDAD: Numero de mes  
   *  @param $val - nuevo valor
  */
  function setnumes($val) {
    $this->snumes = $val;
  }
  
  /**
   *  PROPIEDAD: Estatus de corde de este mes
   *  @return valor de la propiedad
  */
  function getstcorte() {
    return $this->sstcorte;
  }

  /**
   *  PROPIEDAD: Estatus de corde de este mes  
   *  @param $val - nuevo valor
  */
  function setstcorte($val) {
    $this->sstcorte = $val;
  }
  
  /**
   *  PROPIEDAD: Estatus de corde de este mes
   *  @return valor de la propiedad
  */
  function getnbstcorte() {
    if($this->sstcorte=='00') return 'Sin saldos';
    if($this->sstcorte=='01') return 'Saldos Iniciales';
    if($this->sstcorte=='02') return 'Calculado';
    return $this->sstcorte;
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
   *  PROPIEDAD: Nombre del mes
   *  @return valor de la propiedad
  */
  function getnbmes() {
    return $this->snbmes;
  }

  /**
   *  PROPIEDAD: Nombre del mes  
   *  @param $val - nuevo valor
  */
  function setnbmes($val) {
    $this->snbmes = $val;
  }
  

  /**
   *  PROCEDIMIENTO para determina si los objetos tienen la misma llave
   *  @param $obj - objeto 
  */
  function hasamekey($obj) {
    if($this->getcdempresa()==$obj->getcdempresa())
    if($this->getcdejercicio()==$obj->getcdejercicio())
    if($this->getnumes()==$obj->getnumes())
       return true;
    return false;
  }


} /* fin clase [MesBean] */

?>

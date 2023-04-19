<?php

/**
 * @name: CriterioBean
 * @creation date: (22-Jun-2010)
 * Descripcion:
 * Clase que tiene los criterios de consulta
 * @author: Ruben Murga Tapia
 * @conpany: HANYGEN SOFTWARE S.A. DE C.V.
 **/

class CriterioBean {
    var $scdempresa = "";                 // Clave de la empresa
    var $scdcliente = "";                    // Clave del cliente
    var $scdestado = "";                    // Clave del estado
    var $scdrfc = "";                          // Clave del rfc del cliente
    var $sstcuenta = "";                     // Estatus de la cuenta contable
    var $stpcuenta = "";                     // Tipo de cuenta contable (General o Detalle)
    var $scdejercicio = "";                  // Clave del ejercicio fiscal al que pertenece la cuenta contable
    var $snumes = "";                        // Clave del mes en que se ejerce los importes de la poliza
    var $sstpoliza = "PE";                  // Estatus de la poliza contable  (default pendiente)
    var $scdtpoliza = "";                     // Clave del tipo de poliza
    var $scdpoliza = "";                      // Clave de la poliza
    var $scdcuenta = "";                     // Clave de la cuenta contable
    var $sfecha = "";                          // Criterio de Fecha
    var $scuentaini = "";                     // Clave de la cuenta inicial
    var $scuentafin = "";                     // Clave de la cuenta final
    var $scdcuentas = "";                   // Clave con los numeros de cuenta
    var $sstactualizado = "";              // Estatus de actualizacion

  /**
   * CONSTRUCTOR
  */
  function CriterioBean() {

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
   *  PROPIEDAD: Clave del cliente
   *  @return valor de la propiedad
  */
  function getcdcliente() {
    return $this->scdcliente;
  }

  /**
   *  PROPIEDAD: Clave del cliente  
   *  @param $val - nuevo valor
  */
  function setcdcliente($val) {
    $this->scdcliente = $val;
  }
  
  /**
   *  PROPIEDAD: Clave del estado
   *  @return valor de la propiedad
  */
  function getcdestado() {
    return $this->scdestado;
  }

  /**
   *  PROPIEDAD: Clave del estado  
   *  @param $val - nuevo valor
  */
  function setcdestado($val) {
    $this->scdestado = $val;
  }
  
  /**
   *  PROPIEDAD: Clave del rfc del cliente
   *  @return valor de la propiedad
  */
  function getcdrfc() {
    return $this->scdrfc;
  }

  /**
   *  PROPIEDAD: Clave del rfc del cliente  
   *  @param $val - nuevo valor
  */
  function setcdrfc($val) {
    $this->scdrfc = $val;
  }

  /**
   *  PROPIEDAD: Estatus de la cuenta contable
   *  @return valor de la propiedad
  */
  function getstcuenta() {
    return $this->sstcuenta;
  }

  /**
   *  PROPIEDAD: Estatus de la cuenta contable  
   *  @param $val - nuevo valor
  */
  function setstcuenta($val) {
    $this->sstcuenta = $val;
  }

  /**
   *  PROPIEDAD: Tipo de cuenta contable (General o Detalle)
   *  @return valor de la propiedad
  */
  function gettpcuenta() {
    return $this->stpcuenta;
  }

  /**
   *  PROPIEDAD: Tipo de cuenta contable (General o Detalle)  
   *  @param $val - nuevo valor
  */
  function settpcuenta($val) {
    $this->stpcuenta = $val;
  }

  /**
   *  PROPIEDAD: Clave del ejercicio fiscal al que pertenece la cuenta contable
   *  @return valor de la propiedad
  */
  function getcdejercicio() {
    return $this->scdejercicio;
  }

  /**
   *  PROPIEDAD: Clave del ejercicio fiscal al que pertenece la cuenta contable  
   *  @param $val - nuevo valor
  */
  function setcdejercicio($val) {
    $this->scdejercicio = $val;
  }

  /**
   *  PROPIEDAD: Clave del mes en que se ejerce los importes de la poliza
   *  @return valor de la propiedad
  */
  function getnumes() {
    return $this->snumes;
  }

  /**
   *  PROPIEDAD: Clave del mes en que se ejerce los importes de la poliza  
   *  @param $val - nuevo valor
  */
  function setnumes($val) {
    $this->snumes = $val;
  }

  /**
   *  PROPIEDAD: Estatus de la poliza contable  (default pendiente)
   *  @return valor de la propiedad
  */
  function getstpoliza() {
    return $this->sstpoliza;
  }

  /**
   *  PROPIEDAD: Estatus de la poliza contable  (default pendiente)  
   *  @param $val - nuevo valor
  */
  function setstpoliza($val) {
    $this->sstpoliza = $val;
  }

  /**
   *  PROPIEDAD: Clave del tipo de poliza
   *  @return valor de la propiedad
  */
  function getcdtpoliza() {
    return $this->scdtpoliza;
  }

  /**
   *  PROPIEDAD: Clave del tipo de poliza  
   *  @param $val - nuevo valor
  */
  function setcdtpoliza($val) {
    $this->scdtpoliza = $val;
  }

  /**
   *  PROPIEDAD: Clave de la poliza
   *  @return valor de la propiedad
  */
  function getcdpoliza() {
    return $this->scdpoliza;
  }

  /**
   *  PROPIEDAD: Clave de la poliza  
   *  @param $val - nuevo valor
  */
  function setcdpoliza($val) {
    $this->scdpoliza = $val;
  }

  /**
   *  PROPIEDAD: Clave de la cuenta contable
   *  @return valor de la propiedad
  */
  function getcdcuenta() {
    return $this->scdcuenta;
  }

  /**
   *  PROPIEDAD: Clave de la cuenta contable  
   *  @param $val - nuevo valor
  */
  function setcdcuenta($val) {
    $this->scdcuenta = $val;
  }

  /**
   *  PROPIEDAD: Criterio de Fecha
   *  @return valor de la propiedad
  */
  function getfecha() {
    return $this->sfecha;
  }

  /**
   *  PROPIEDAD: Criterio de Fecha  
   *  @param $val - nuevo valor
  */
  function setfecha($val) {
    $this->sfecha = $val;
  }

  /**
   *  PROPIEDAD: Clave de la cuenta inicial
   *  @return valor de la propiedad
  */
  function getcuentaini() {
    return $this->scuentaini;
  }

  /**
   *  PROPIEDAD: Clave de la cuenta inicial  
   *  @param $val - nuevo valor
  */
  function setcuentaini($val) {
    $this->scuentaini = $val;
  }

  /**
   *  PROPIEDAD: Clave de la cuenta final
   *  @return valor de la propiedad
  */
  function getcuentafin() {
    return $this->scuentafin;
  }

  /**
   *  PROPIEDAD: Clave de la cuenta final  
   *  @param $val - nuevo valor
  */
  function setcuentafin($val) {
    $this->scuentafin = $val;
  }

  /**
   *  PROPIEDAD: Clave con los numeros de cuenta
   *  @return valor de la propiedad
  */
  function getcdcuentas() {
    return $this->scdcuentas;
  }

  /**
   *  PROPIEDAD: Clave con los numeros de cuenta  
   *  @param $val - nuevo valor
  */
  function setcdcuentas($val) {
    $this->scdcuentas = $val;
  }

  /**
   *  PROPIEDAD: Estatus de actualizacion
   *  @return valor de la propiedad
  */
  function getstactualizado() {
    return $this->sstactualizado;
  }

  /**
   *  PROPIEDAD: Estatus de actualizacion  
   *  @param $val - nuevo valor
  */
  function setstactualizado($val) {
    $this->sstactualizado = $val;
  }

} /* fin clase [CriterioBean] */

?>

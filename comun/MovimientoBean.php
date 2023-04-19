<?php

/**
 * @name: MovimientoBean
 * @creation date: (02-Julio-2010)
 * Descripci?n:
 * Clase que tiene la informacion relativa a los movimientos relativos a una poliza contable
 * @author: Ruben Murga Tapia
 * @conpany: HANYGEN SOFTWARE S.A. DE C.V.
 **/

class MovimientoBean {
    var $scdempresa = "";           // Clave de la empresa
    var $scdejercicio = "";            // Clave del ejercicio fiscal
    var $icdpoliza = 0;                 // Clave de la poliza contable
    var $icdmovimiento = 0;         // Clave del movimiento contable
    var $snumes = "";                 // Clave del mes en que se ejerce los importes de la poliza
    var $sstmovimiento = "";        // Estatus del movimiento
    var $scdconcepto = "";          // Clave del concepto contable
    var $scdtpcomprobante = "";  // Clave del tipo de comprobante o documento
    var $icdcuenta = 0;               // Clave de la cuenta contable al que pertenece el saldo
    var $dimparcial = 0;              // Importe parcial del movimiento
    var $dimdebe = 0;                 // Importe de debe
    var $dimhaber = 0;                // Importe de haber
    var $snucoprobante = "";       // Numero de comprobante
    var $snbmovimiento = "";       // Nombre del movimiento
    var $slkcomprobante = "";     // Link con la imagen del comprobante del movimiento
    var $stxcomment = "";          // Comentarios
    var $sstactualizado = "IN";    // Determina si el movimiento ya ha sido actualizado en saldos
    var $sfhcreado = "";              // Incluye la fecha de creacion del movimiento
    var $sfhactualizado = "";       // Determina la fecha en que fue actualizado el movimiento

  /**
   * CONSTRUCTOR
  */
  function MovimientoBean() {
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
   *  PROPIEDAD: Clave de la poliza contable
   *  @return valor de la propiedad
  */
  function getcdpoliza() {
    return $this->icdpoliza;
  }

  /**
   *  PROPIEDAD: Clave de la poliza contable  
   *  @param $val - nuevo valor
  */
  function setcdpoliza($val) {
    $this->icdpoliza = $val;
  }
  
  /**
   *  PROPIEDAD: Clave del movimiento contable
   *  @return valor de la propiedad
  */
  function getcdmovimiento() {
    return $this->icdmovimiento;
  }

  /**
   *  PROPIEDAD: Clave del movimiento contable  
   *  @param $val - nuevo valor
  */
  function setcdmovimiento($val) {
    $this->icdmovimiento = $val;
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
   *  PROPIEDAD: Estatus del movimiento
   *  @return valor de la propiedad
  */
  function getstmovimiento() {
    return $this->sstmovimiento;
  }

  /**
   *  PROPIEDAD: Estatus del movimiento  
   *  @param $val - nuevo valor
  */
  function setstmovimiento($val) {
    $this->sstmovimiento = $val;
  }
  
  /**
   *  PROPIEDAD: Clave del concepto contable
   *  @return valor de la propiedad
  */
  function getcdconcepto() {
    return $this->scdconcepto;
  }

  /**
   *  PROPIEDAD: Clave del concepto contable  
   *  @param $val - nuevo valor
  */
  function setcdconcepto($val) {
    $this->scdconcepto = $val;
  }
  
  /**
   *  PROPIEDAD: Clave del tipo de comprobante o documento
   *  @return valor de la propiedad
  */
  function getcdtpcomprobante() {
    return $this->scdtpcomprobante;
  }

  /**
   *  PROPIEDAD: Clave del tipo de comprobante o documento  
   *  @param $val - nuevo valor
  */
  function setcdtpcomprobante($val) {
    $this->scdtpcomprobante = $val;
  }
  
  /**
   *  PROPIEDAD: Clave de la cuenta contable al que pertenece el saldo
   *  @return valor de la propiedad
  */
  function getcdcuenta() {
    return $this->icdcuenta;
  }

  /**
   *  PROPIEDAD: Clave de la cuenta contable al que pertenece el saldo  
   *  @param $val - nuevo valor
  */
  function setcdcuenta($val) {
    $this->icdcuenta = $val;
  }
  
  /**
   *  PROPIEDAD: Importe parcial del movimiento
   *  @return valor de la propiedad
  */
  function getimparcial() {
    return $this->dimparcial;
  }

  /**
   *  PROPIEDAD: Importe parcial del movimiento  
   *  @param $val - nuevo valor
  */
  function setimparcial($val) {
    if($val=='') $val = 0;
    $this->dimparcial = $val;
  }
  
  /**
   *  PROPIEDAD: Importe de debe
   *  @return valor de la propiedad
  */
  function getimdebe() {
    return $this->dimdebe;
  }

  /**
   *  PROPIEDAD: Importe de debe  
   *  @param $val - nuevo valor
  */
  function setimdebe($val) {
    if($val=='') $val = 0;
    $this->dimdebe = $val;
  }
  
  /**
   *  PROPIEDAD: Importe de haber
   *  @return valor de la propiedad
  */
  function getimhaber() {
    return $this->dimhaber;
  }

  /**
   *  PROPIEDAD: Importe de haber  
   *  @param $val - nuevo valor
  */
  function setimhaber($val) {
    if($val=='') $val = 0;
    $this->dimhaber = $val;
  }
  
  /**
   *  PROPIEDAD: Numero de comprobante
   *  @return valor de la propiedad
  */
  function getnucoprobante() {
    return $this->snucoprobante;
  }

  /**
   *  PROPIEDAD: Numero de comprobante  
   *  @param $val - nuevo valor
  */
  function setnucoprobante($val) {
    $this->snucoprobante = $val;
  }
  
  /**
   *  PROPIEDAD: Nombre del movimiento
   *  @return valor de la propiedad
  */
  function getnbmovimiento() {
    return $this->snbmovimiento;
  }

  /**
   *  PROPIEDAD: Nombre del movimiento  
   *  @param $val - nuevo valor
  */
  function setnbmovimiento($val) {
    $this->snbmovimiento = $val;
  }
  
  /**
   *  PROPIEDAD: Link con la imagen del comprobante del movimiento
   *  @return valor de la propiedad
  */
  function getlkcomprobante() {
    return $this->slkcomprobante;
  }

  /**
   *  PROPIEDAD: Link con la imagen del comprobante del movimiento  
   *  @param $val - nuevo valor
  */
  function setlkcomprobante($val) {
    $this->slkcomprobante = $val;
  }
  
  /**
   *  PROPIEDAD: Comentarios
   *  @return valor de la propiedad
  */
  function gettxcomment() {
    return $this->stxcomment;
  }

  /**
   *  PROPIEDAD: Comentarios  
   *  @param $val - nuevo valor
  */
  function settxcomment($val) {
    $this->stxcomment = $val;
  }
  
  /**
   *  PROPIEDAD: Determina si el movimiento ya ha sido actualizado en saldos
   *  @return valor de la propiedad
  */
  function getstactualizado() {
    return $this->sstactualizado;
  }

  /**
   *  PROPIEDAD: Determina si el movimiento ya ha sido actualizado en saldos  
   *  @param $val - nuevo valor
  */
  function setstactualizado($val) {
    $this->sstactualizado = $val;
  }

  /**
   *  PROPIEDAD: Incluye la fecha de creacion del movimiento
   *  @return valor de la propiedad
  */
  function getfhcreado() {
    return $this->sfhcreado;
  }

  /**
   *  PROPIEDAD: Incluye la fecha de creacion del movimiento  
   *  @param $val - nuevo valor
  */
  function setfhcreado($val) {
    if($val=='0000-00-00') return;
    $this->sfhcreado = $val;
  }

  /**
   *  PROPIEDAD: Determina la fecha en que fue actualizado el movimiento
   *  @return valor de la propiedad
  */
  function getfhactualizado() {
    return $this->sfhactualizado;
  }

  /**
   *  PROPIEDAD: Determina la fecha en que fue actualizado el movimiento  
   *  @param $val - nuevo valor
  */
  function setfhactualizado($val) {
    if($val=='0000-00-00') return;
    $this->sfhactualizado = $val;
  }

  /**
   *  PROCEDIMIENTO para determina si los objetos tienen la misma llave
   *  @param $obj - objeto 
  */
  function hasamekey($obj) {
    if($this->getcdempresa()==$obj->getcdempresa())
    if($this->getcdejercicio()==$obj->getcdejercicio())
    if($this->getcdpoliza()==$obj->getcdpoliza())
    if($this->getcdmovimiento()==$obj->getcdmovimiento())
       return true;
    return false;
  }

} /* fin clase [MovimientoBean] */
?>

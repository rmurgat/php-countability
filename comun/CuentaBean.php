<?php
require_once("../comun/SaldoBean.php");

/**
 * @name: CuentaBean
 * @creation date: (02-Julio-2010)
 * Descripci?n:
 * Clase que tiene la informacion relativa a las cuentas contables que se manejan en la empresa
 * @author: Ruben Murga Tapia
 * @conpany: HANYGEN SOFTWARE S.A. DE C.V.
 **/

class CuentaBean {
    var $scdempresa = "";               // Clave de la empresa a la que pertenece la cuenta contable
    var $scdejercicio = "";                // Clave del ejercicio fiscal al que pertenece la cuenta contable
    var $icdcuenta = 0;                    // Clave interna de la cuenta contable
    var $snunivel = "";                      // Numero de nivel jerarquico al que pertenece la cuenta contable
    var $sstcuenta = "";                   // Estatus de la cuenta contable
    var $stpnaturaleza = "";              // Tipo de naturaleza de la cuenta contable (Costo o Activo)
    var $stpcuenta = "";                   // Tipo de cuenta contable (General o Detalle)
    var $snucuenta = "";                  // Número de cuenta contable
    var $snbcuenta = "";                  // Nombre de la cuenta contable
    var $stxcomment = "";               // Comentarios respecto a la cuenta contable
    var $icdctageneral = 0;               // Clave de la cuenta general
    var $icdctacierre = 0;                 // Clave de la cuenta de cierre

    var $oSaldo = null;                     // Saldo de la cuenta contable  en un mes en particular
    var $cmovtos = array();               // Movimientos registrados en la cuenta contable

  /**
   * CONSTRUCTOR
  */
  function CuentaBean() {
    $this->oSaldo = new SaldoBean();
  }

  /**
   *  PROPIEDAD: Clave de la empresa a la que pertenece la cuenta contable
   *  @return valor de la propiedad
  */
  function getcdempresa() {
    return $this->scdempresa;
  }

  /**
   *  PROPIEDAD: Clave de la empresa a la que pertenece la cuenta contable  
   *  @param $val - nuevo valor
  */
  function setcdempresa($val) {
    $this->scdempresa = $val;
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
   *  PROPIEDAD: Clave interna de la cuenta contable
   *  @return valor de la propiedad
  */
  function getcdcuenta() {
    return $this->icdcuenta;
  }

  /**
   *  PROPIEDAD: Clave interna de la cuenta contable  
   *  @param $val - nuevo valor
  */
  function setcdcuenta($val) {
    $this->icdcuenta = $val;
  }
  
  /**
   *  PROPIEDAD: Numero de nivel jerarquico al que pertenece la cuenta contable
   *  @return valor de la propiedad
  */
  function getnunivel() {
    return $this->snunivel;
  }

  /**
   *  PROPIEDAD: Numero de nivel jerarquico al que pertenece la cuenta contable  
   *  @param $val - nuevo valor
  */
  function setnunivel($val) {
    $this->snunivel = $val;
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
   *  PROPIEDAD: Tipo de naturaleza de la cuenta contable (Costo o Activo)
   *  @return valor de la propiedad
  */
  function gettpnaturaleza() {
    return $this->stpnaturaleza;
  }

  /**
   *  PROPIEDAD: Tipo de naturaleza de la cuenta contable (Costo o Activo)  
   *  @param $val - nuevo valor
  */
  function settpnaturaleza($val) {
    $this->stpnaturaleza = $val;
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
   *  PROPIEDAD: Número de cuenta contable
   *  @return valor de la propiedad
  */
  function getnucuenta() {
    return $this->snucuenta;
  }

  /**
   *  PROPIEDAD: Número de cuenta contable  
   *  @param $val - nuevo valor
  */
  function setnucuenta($val) {
    $this->snucuenta = $val;
  }
  
  /**
   *  PROPIEDAD: Nombre de la cuenta contable
   *  @return valor de la propiedad
  */
  function getnbcuenta() {
    return $this->snbcuenta;
  }

  /**
   *  PROPIEDAD: Nombre de la cuenta contable  
   *  @param $val - nuevo valor
  */
  function setnbcuenta($val) {
    $this->snbcuenta = $val;
  }
  
  /**
   *  PROPIEDAD: Comentarios respecto a la cuenta contable
   *  @return valor de la propiedad
  */
  function gettxcomment() {
    return $this->stxcomment;
  }

  /**
   *  PROPIEDAD: Comentarios respecto a la cuenta contable  
   *  @param $val - nuevo valor
  */
  function settxcomment($val) {
    $this->stxcomment = $val;
  }
  
  /**
   *  PROPIEDAD: Clave de la cuenta general
   *  @return valor de la propiedad
  */
  function getcdctageneral() {
    return $this->icdctageneral;
  }

  /**
   *  PROPIEDAD: Clave de la cuenta general  
   *  @param $val - nuevo valor
  */
  function setcdctageneral($val) {
    $this->icdctageneral = $val;
  }
  
  /**
   *  PROPIEDAD: Clave de la cuenta de cierre
   *  @return valor de la propiedad
  */
  function getcdctacierre() {
    return $this->icdctacierre;
  }

  /**
   *  PROPIEDAD: Clave de la cuenta de cierre  
   *  @param $val - nuevo valor
  */
  function setcdctacierre($val) {
    $this->icdctacierre = $val;
  }
  
  /**
   *  PROPIEDAD: Saldo de la cuenta contable  en un mes en particular
   *  @return valor de la propiedad
  */
  function getSaldo() {
    return $this->oSaldo;
  }

  /**
   *  PROPIEDAD: Saldo de la cuenta contable  en un mes en particular  
   *  @param $val - nuevo valor
  */
  function setSaldo($val) {
    if($val==null) return;
    $this->oSaldo = $val;
  }

  /**
   *  PROPIEDAD: Movimientos registrados para la cuenta contable
   *  @return valor de la propiedad
  */
  function getcmovtos() {
    return $this->cmovtos;
  }

  /**
   *  PROPIEDAD: Movimientos registrados para la cuenta contable
   *  @param $val - nuevo valor
  */
  function setcmovtos($val) {
    if($val==null) return;
    $this->cmovtos = $val;
  }

  /**
   *  PROCEDIMIENTO para determina si los objetos tienen la misma llave
   *  @param $obj - objeto 
  */
  function hasamekey($obj) {
    if($this->getcdempresa()==$obj->getcdempresa())
    if($this->getcdejercicio()==$obj->getcdejercicio())
    if($this->getcdcuenta()==$obj->getcdcuenta())
       return true;
    return false;
  }


} /* fin clase [CuentaBean] */

?>

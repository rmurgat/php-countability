<?php
/**
 * @name: SaldoBean
 * @creation date: (29-Agosto-2010)
 * Descripcion:
 * Claque que tiene las propiedades y metodos de los saldos sumarios por mes contable
 * @author: Ruben Murga Tapia
 * @conpany: HANYGEN SOFTWARE S.A. DE C.V.
 **/

class SaldoBean {
    var $scdempresa = "";              // Clave de la empresa
    var $scdejercicio = "";              // Clave del ejercicio fiscal
    var $snumes = "";                    // Mes en el que se procesa la poliza
    var $icdcuenta = 0;                  // Numero de cuenta contable
    var $sstsaldo = "";                   // Estatus del saldo
    var $scdusuarioact = "";           // Clave del usuario
    var $sfhactualizado = "";          // Fecha en que el saldo fue actualizado
    var $dimdebeactual = 0.0;        // Importe Debe Actual
    var $dimhaberactual = 0.0;       // Importe de Haber Actual
    var $dimdebeinicial = 0.0;        // Importe de Debe inicial
    var $dimhaberinicial = 0.0;       // Importe de Haber inicial
    var $dtodebemovtos = 0.0;       // Importe total de Debe por la suma de los movimientos
    var $dtohabermovtos = 0.0;      // Importe total de haber por la suma de sus movimientos
    var $stxcomment = "";             // Comentarios
    var $scdctageneral = 0;           // Clave de la cuenta general

  /**
   * CONSTRUCTOR
  */
  function SaldoBean() {
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
   *  PROPIEDAD: Mes en el que se procesa la poliza
   *  @return valor de la propiedad
  */
  function getnumes() {
    return $this->snumes;
  }

  /**
   *  PROPIEDAD: Mes en el que se procesa la poliza  
   *  @param $val - nuevo valor
  */
  function setnumes($val) {
    $this->snumes = $val;
  }
  
  /**
   *  PROPIEDAD: Numero de cuenta contable
   *  @return valor de la propiedad
  */
  function getcdcuenta() {
    return $this->icdcuenta;
  }

  /**
   *  PROPIEDAD: Numero de cuenta contable  
   *  @param $val - nuevo valor
  */
  function setcdcuenta($val) {
    $this->icdcuenta = $val;
  }
  
  /**
   *  PROPIEDAD: Estatus del saldo
   *  @return valor de la propiedad
  */
  function getstsaldo() {
    return $this->sstsaldo;
  }

  /**
   *  PROPIEDAD: Estatus del saldo  
   *  @param $val - nuevo valor
  */
  function setstsaldo($val) {
    $this->sstsaldo = $val;
  }
  
  /**
   *  PROPIEDAD: Clave del usuario
   *  @return valor de la propiedad
  */
  function getcdusuarioact() {
    return $this->scdusuarioact;
  }

  /**
   *  PROPIEDAD: Clave del usuario  
   *  @param $val - nuevo valor
  */
  function setcdusuarioact($val) {
    $this->scdusuarioact = $val;
  }
  
  /**
   *  PROPIEDAD: Fecha en que el saldo fue actualizado
   *  @return valor de la propiedad
  */
  function getfhactualizado() {
    return $this->sfhactualizado;
  }

  /**
   *  PROPIEDAD: Fecha en que el saldo fue actualizado  
   *  @param $val - nuevo valor
  */
  function setfhactualizado($val) {
    $this->sfhactualizado = $val;
  }

  /**
   *  PROPIEDAD: Importe Debe Actual
   *  @return valor de la propiedad
  */
  function getimdebeactual() {
    return $this->dimdebeactual;
  }

  /**
   *  PROPIEDAD: Importe Debe Actual  
   *  @param $val - nuevo valor
  */
  function setimdebeactual($val) {
    $this->dimdebeactual = $val;
  }
  
  /**
   *  PROPIEDAD: Importe de Haber Actual
   *  @return valor de la propiedad
  */
  function getimhaberactual() {
    return $this->dimhaberactual;
  }

  /**
   *  PROPIEDAD: Importe de Haber Actual  
   *  @param $val - nuevo valor
  */
  function setimhaberactual($val) {
    $this->dimhaberactual = $val;
  }
  
  /**
   *  PROPIEDAD: Importe de Debe inicial
   *  @return valor de la propiedad
  */
  function getimdebeinicial() {
    return $this->dimdebeinicial;
  }

  /**
   *  PROPIEDAD: Importe de Debe inicial  
   *  @param $val - nuevo valor
  */
  function setimdebeinicial($val) {
    $this->dimdebeinicial = $val;
  }
  
  /**
   *  PROPIEDAD: Importe de Haber inicial
   *  @return valor de la propiedad
  */
  function getimhaberinicial() {
    return $this->dimhaberinicial;
  }

  /**
   *  PROPIEDAD: Importe de Haber inicial  
   *  @param $val - nuevo valor
  */
  function setimhaberinicial($val) {
    $this->dimhaberinicial = $val;
  }
  
  /**
   *  PROPIEDAD: Importe total de Debe por la suma de los movimientos
   *  @return valor de la propiedad
  */
  function gettodebemovtos() {
    return $this->dtodebemovtos;
  }

  /**
   *  PROPIEDAD: Importe total de Debe por la suma de los movimientos  
   *  @param $val - nuevo valor
  */
  function settodebemovtos($val) {
    $this->dtodebemovtos = $val;
  }
  
  /**
   *  PROPIEDAD: Importe total de haber por la suma de sus movimientos
   *  @return valor de la propiedad
  */
  function gettohabermovtos() {
    return $this->dtohabermovtos;
  }

  /**
   *  PROPIEDAD: Importe total de haber por la suma de sus movimientos  
   *  @param $val - nuevo valor
  */
  function settohabermovtos($val) {
    $this->dtohabermovtos = $val;
  }
  
  /**
   *  PROPIEDAD: Comentarios
   *  @return valor de la propiedad
  */
  function gettxcomment() {
    return $this->stxcomment;
  }

  /**
   *  PROPIEDAD: Clave de la cuenta general
   *  @return valor de la propiedad
  */
  function getcdctageneral() {
    return $this->scdctageneral;
  }

  /**
   *  PROPIEDAD: Clave de la cuenta general  
   *  @param $val - nuevo valor
  */
  function setcdctageneral($val) {
    $this->scdctageneral = $val;
  }

  /**
   *  PROPIEDAD: Comentarios  
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
    if($this->getcdejercicio()==$obj->getcdejercicio())
    if($this->getnumes()==$obj->getnumes())
    if($this->getcdcuenta()==$obj->getcdcuenta())
       return true;
    return false;
  }

 /* fin clase [SaldoBean] */
}?>

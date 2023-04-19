<?php

/**
 * @name: PolizaBean
 * @creation date: (02-Julio-2010)
 * Descripci?n:
 * Clase que tiene la informacion relativa a las polizas contables
 * @author: Ruben Murga Tapia
 * @conpany: HANYGEN SOFTWARE S.A. DE C.V.
 **/

class PolizaBean {
    var $scdempresa = "";        // Clave de la empresa
    var $scdejercicio = "";         // Clave del ejercicio fiscal
    var $icdpoliza = 0;              // Clave de la poliza contable
    var $snumes = "";               // Clave del mes en que se ejerce los importes de la poliza
    var $sstpoliza = "PE";         // Estatus de la poliza contable  (default PE-pendiente, AC-activa)
    var $scdtpoliza = "";            // Clave del tipo de poliza
    var $scdtpago = "";             // Clave del tipo de pago
    var $snbpoliza = "";             // Nombre de la poliza
    var $slkpoliza = "";              // Link del documento con la imagen de la poliza
    var $stxcomment = "";        // Comentarios respecto a la poliza contable
    var $sfhcreada = "";            // Fecha de creacion de la poliza
    var $sfhactualizada = "";     // Fecha de actualizacion de la poliza
    var $scdusuariocreo = "";    // Clave del usuario que ha creado
    var $scdusuarioact = "";      // Clave del usuario quien ha actualizado la poliza

    var $cmovtos = array();       // Movimientos registrados en la poliza

  /**
   * CONSTRUCTOR
  */
  function PolizaBean() {
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
   *  @return valor de la propiedad
  */
  function getscdpoliza() {
    $res = "000000".$this->icdpoliza;
    return substr($res, strlen($res) - 6);
  }

  /**
   *  PROPIEDAD: Clave de la poliza contable  
   *  @param $val - nuevo valor
  */
  function setcdpoliza($val) {
    $this->icdpoliza = $val;
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
   *  PROPIEDAD: Estatus de la poliza contable
   *  @return valor de la propiedad
  */
  function getstpoliza() {
    return $this->sstpoliza;
  }

  /**
   *  PROPIEDAD: Estatus de la poliza contable
   *  @return valor de la propiedad
  */
  function getsstpoliza() {
    if($this->sstpoliza=='PE') return "Pendiente";
    if($this->sstpoliza=='BA') return "Balanceada";
    if($this->sstpoliza=='AS') return "Asentada";
    return $this->sstpoliza;
  }


  /**
   *  PROPIEDAD: Estatus de la poliza contable  
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
   *  PROPIEDAD: Clave del tipo de pago
   *  @return valor de la propiedad
  */
  function getcdtpago() {
    return $this->scdtpago;
  }

  /**
   *  PROPIEDAD: Clave del tipo de pago  
   *  @param $val - nuevo valor
  */
  function setcdtpago($val) {
    $this->scdtpago = $val;
  }
  
  /**
   *  PROPIEDAD: Nombre de la poliza
   *  @return valor de la propiedad
  */
  function getnbpoliza() {
    return $this->snbpoliza;
  }

  /**
   *  PROPIEDAD: Nombre de la poliza  
   *  @param $val - nuevo valor
  */
  function setnbpoliza($val) {
    $this->snbpoliza = $val;
  }
  
  /**
   *  PROPIEDAD: Link del documento con la imagen de la poliza
   *  @return valor de la propiedad
  */
  function getlkpoliza() {
    return $this->slkpoliza;
  }

  /**
   *  PROPIEDAD: Link del documento con la imagen de la poliza  
   *  @param $val - nuevo valor
  */
  function setlkpoliza($val) {
    $this->slkpoliza = $val;
  }
  
  /**
   *  PROPIEDAD: Comentarios respecto a la poliza contable
   *  @return valor de la propiedad
  */
  function gettxcomment() {
    return $this->stxcomment;
  }

  /**
   *  PROPIEDAD: Comentarios respecto a la poliza contable  
   *  @param $val - nuevo valor
  */
  function settxcomment($val) {
    $this->stxcomment = $val;
  }
  
  /**
   *  PROPIEDAD: Fecha de creacion de la poliza
   *  @return valor de la propiedad
  */
  function getfhcreada() {
    return $this->sfhcreada;
  }

  /**
   *  PROPIEDAD: Fecha de creacion de la poliza  
   *  @param $val - nuevo valor
  */
  function setfhcreada($val) {
    if($val=='0000-00-00') return;
    $this->sfhcreada = $val;
  }

  /**
   *  PROPIEDAD: Fecha de actualizacion de la poliza
   *  @return valor de la propiedad
  */
  function getfhactualizada() {
    return $this->sfhactualizada;
  }

  /**
   *  PROPIEDAD: Fecha de actualizacion de la poliza  
   *  @param $val - nuevo valor
  */
  function setfhactualizada($val) {
    if($val=='0000-00-00') return;
    $this->sfhactualizada = $val;
  }

  /**
   *  PROPIEDAD: Clave del usuario que ha creado
   *  @return valor de la propiedad
  */
  function getcdusuariocreo() {
    return $this->scdusuariocreo;
  }

  /**
   *  PROPIEDAD: Clave del usuario que ha creado  
   *  @param $val - nuevo valor
  */
  function setcdusuariocreo($val) {
    $this->scdusuariocreo = $val;
  }

  /**
   *  PROPIEDAD: Clave del usuario quien ha actualizado la poliza
   *  @return valor de la propiedad
  */
  function getcdusuarioact() {
    return $this->scdusuarioact;
  }

  /**
   *  PROPIEDAD: Clave del usuario quien ha actualizado la poliza  
   *  @param $val - nuevo valor
  */
  function setcdusuarioact($val) {
    $this->scdusuarioact = $val;
  }

  /**
   *  PROPIEDAD: Movimientos registrados en la poliza
   *  @return valor de la propiedad
  */
  function getcmovtos() {
    return $this->cmovtos;
  }

  /**
   *  PROPIEDAD: Movimientos registrados en la poliza  
   *  @param $val - nuevo valor
  */
  function setcmovtos($val) {
    $this->cmovtos = $val;
  }

  /**
   *  PROCEDIMIENTO para determina si los objetos tienen la misma llave
   *  @param $obj - objeto 
  */
  function hasamekey($obj) {
    if($this->getcdempresa()==$obj->getcdempresa())
    if($this->getcdejercicio()==$obj->getcdejercicio())
    if($this->getcdpoliza()==$obj->getcdpoliza())
       return true;
    return false;
  }


} /* fin clase [PolizaBean] */

?>

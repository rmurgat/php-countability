<?php

/**
 * @name: ClienteBean
 * @creation date: (23-Jun-2010)
 * Descripcion:
 * Clase que tiene la informacion relativa de los clientes
 * @author: Ruben Murga Tapia
 * @conpany: HANYGEN SOFTWARE S.A. DE C.V.
 **/

class ClienteBean {
    var $scdempresa = "";                  // Clave de la empresa
    var $scdcliente = "";                     // Clave del cliente
    var $scdestado = "";                     // Clave del estado
    var $sstcliente = "";                      // Estatus del cliente
    var $sstiva = "";                            // Estatus que determina si para este cliente aplica el iva
    var $scdrfc = "";                           // Clave del rfc del cliente
    var $snutelefono = "";                   // Numero de telefono del cliente
    var $snbcliente = "";                     // Nombre del cliente
    var $snbrazonsocial = "";              // Nombre o razon social del cliente
    var $stxdireccion = "";                  // Direccion de las oficinas del cliente
    var $dpoiva=0.0;                          //  Porcentaje del iva

  /**
   * CONSTRUCTOR
  */
  function ClienteBean() {
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
   *  PROPIEDAD: Estatus del cliente
   *  @return valor de la propiedad
  */
  function getstcliente() {
    return $this->sstcliente;
  }

  /**
   *  PROPIEDAD: Estatus del cliente  
   *  @param $val - nuevo valor
  */
  function setstcliente($val) {
    $this->sstcliente = $val;
  }
  
  /**
   *  PROPIEDAD: Estatus que determina si para este cliente aplica el iva
   *  @return valor de la propiedad
  */
  function getstiva() {
    return $this->sstiva;
  }

  /**
   *  PROPIEDAD: Estatus que determina si para este cliente aplica el iva  
   *  @param $val - nuevo valor
  */
  function setstiva($val) {
    $this->sstiva = $val;
  }
  
  /**
   *  PROPIEDAD: Porcentaje del iva que debe ser calculado para el cliente
   *  @return valor de la propiedad
  */
  function getpoiva() {
    return $this->dpoiva;
  }

  /**
   *  PROPIEDAD: Porcentaje del iva que debe ser calculado para el cliente  
   *  @param $val - nuevo valor
  */
  function setpoiva($val) {
    $this->dpoiva = $val;
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
   *  PROPIEDAD: Numero de telefono del cliente
   *  @return valor de la propiedad
  */
  function getnutelefono() {
    return $this->snutelefono;
  }

  /**
   *  PROPIEDAD: Numero de telefono del cliente  
   *  @param $val - nuevo valor
  */
  function setnutelefono($val) {
    $this->snutelefono = $val;
  }
  
  /**
   *  PROPIEDAD: Nombre del cliente
   *  @return valor de la propiedad
  */
  function getnbcliente() {
    return $this->snbcliente;
  }

  /**
   *  PROPIEDAD: Nombre del cliente  
   *  @param $val - nuevo valor
  */
  function setnbcliente($val) {
    $this->snbcliente = $val;
  }
  
  /**
   *  PROPIEDAD: Nombre o razon social del cliente
   *  @return valor de la propiedad
  */
  function getnbrazonsocial() {
    return $this->snbrazonsocial;
  }

  /**
   *  PROPIEDAD: Nombre o razon social del cliente  
   *  @param $val - nuevo valor
  */
  function setnbrazonsocial($val) {
    $this->snbrazonsocial = $val;
  }
  
  /**
   *  PROPIEDAD: Direccion de las oficinas del cliente
   *  @return valor de la propiedad
  */
  function gettxdireccion() {
    return $this->stxdireccion;
  }

  /**
   *  PROPIEDAD: Direccion de las oficinas del cliente  
   *  @param $val - nuevo valor
  */
  function settxdireccion($val) {
    $this->stxdireccion = $val;
  }
  

  /**
   *  PROCEDIMIENTO para determina si los objetos tienen la misma llave
   *  @param $obj - objeto 
  */
  function hasamekey($obj) {
    if($this->getcdempresa()==$obj->getcdempresa())
    if($this->getcdcliente()==$obj->getcdcliente())
       return true;
    return false;
  }


} /* fin clase [ClienteBean] */

?>

<?php

/**
 * @name: ProveedorBean
 * @creation date: (23-Junio-2010)
 * Descripci?n:
 * Clase que tiene la informacion relativa a los proveedores
 * @author: Ruben Murga Tapia
 * @conpany: HANYGEN SOFTWARE S.A. DE C.V.
 **/

class ProveedorBean {
    var $scdempresa = "";             // Clave de la empresa
    var $scdproveedor = "";            // Clave del proveedor
    var $sstproveedor = "";            // Estatus del proveedor
    var $sstaplicariva = "";             // Estatus que determina si se va a aplicar el iva
    var $sstreteneriva = "";            // Estatus que determina si existe una retencion del iva
    var $sstretenerisr = "";            // Estatus que determina si hay retencion del ISR
    var $scdestado = "";               // Clave del estado
    var $scdrfc = "";                     // Clave del rfc del proveedor
    var $snutelefono = "";             // Numero de telefono del proveedor
    var $snbproveedor = "";           // Nombre del proveedor
    var $snbrazonsocial = "";        // Razon social del proveedor
    var $stxdireccion = "";            // Direccion del proveedor
    var $stxcomment = "";            // Comentarios relativos al proveedor
    var $dpoiva = 0.00;                 // Porcentaje del iva

  /**
   * CONSTRUCTOR
  */
  function ProveedorBean() {
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
   *  PROPIEDAD: Clave del proveedor
   *  @return valor de la propiedad
  */
  function getcdproveedor() {
    return $this->scdproveedor;
  }

  /**
   *  PROPIEDAD: Clave del proveedor  
   *  @param $val - nuevo valor
  */
  function setcdproveedor($val) {
    $this->scdproveedor = $val;
  }
  
  /**
   *  PROPIEDAD: Estatus del proveedor
   *  @return valor de la propiedad
  */
  function getstproveedor() {
    return $this->sstproveedor;
  }

  /**
   *  PROPIEDAD: Estatus del proveedor  
   *  @param $val - nuevo valor
  */
  function setstproveedor($val) {
    $this->sstproveedor = $val;
  }
  
  /**
   *  PROPIEDAD: Estatus que determina si se va a aplicar el iva
   *  @return valor de la propiedad
  */
  function getstaplicariva() {
    return $this->sstaplicariva;
  }

  /**
   *  PROPIEDAD: Estatus que determina si se va a aplicar el iva  
   *  @param $val - nuevo valor
  */
  function setstaplicariva($val) {
    $this->sstaplicariva = $val;
  }
  
  /**
   *  PROPIEDAD: Estatus que determina si existe una retencion del iva
   *  @return valor de la propiedad
  */
  function getstreteneriva() {
    return $this->sstreteneriva;
  }

  /**
   *  PROPIEDAD: Estatus que determina si existe una retencion del iva  
   *  @param $val - nuevo valor
  */
  function setstreteneriva($val) {
    $this->sstreteneriva = $val;
  }
  
  /**
   *  PROPIEDAD: Estatus que determina si hay retencion del ISR
   *  @return valor de la propiedad
  */
  function getstretenerisr() {
    return $this->sstretenerisr;
  }

  /**
   *  PROPIEDAD: Estatus que determina si hay retencion del ISR  
   *  @param $val - nuevo valor
  */
  function setstretenerisr($val) {
    $this->sstretenerisr = $val;
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
   *  PROPIEDAD: Porcentaje del iva aplicable al proveedor
   *  @return valor de la propiedad
  */
  function getpoiva() {
    return $this->dpoiva;
  }

  /**
   *  PROPIEDAD: Porcentaje del iva aplicable al proveedor  
   *  @param $val - nuevo valor
  */
  function setpoiva($val) {
    $this->dpoiva = $val;
  }
  
  /**
   *  PROPIEDAD: Clave del rfc del proveedor
   *  @return valor de la propiedad
  */
  function getcdrfc() {
    return $this->scdrfc;
  }

  /**
   *  PROPIEDAD: Clave del rfc del proveedor  
   *  @param $val - nuevo valor
  */
  function setcdrfc($val) {
    $this->scdrfc = $val;
  }
  
  /**
   *  PROPIEDAD: Numero de telefono del proveedor
   *  @return valor de la propiedad
  */
  function getnutelefono() {
    return $this->snutelefono;
  }

  /**
   *  PROPIEDAD: Numero de telefono del proveedor  
   *  @param $val - nuevo valor
  */
  function setnutelefono($val) {
    $this->snutelefono = $val;
  }
  
  /**
   *  PROPIEDAD: Nombre del proveedor
   *  @return valor de la propiedad
  */
  function getnbproveedor() {
    return $this->snbproveedor;
  }

  /**
   *  PROPIEDAD: Nombre del proveedor  
   *  @param $val - nuevo valor
  */
  function setnbproveedor($val) {
    $this->snbproveedor = $val;
  }
  
  /**
   *  PROPIEDAD: Razon social del proveedor
   *  @return valor de la propiedad
  */
  function getnbrazonsocial() {
    return $this->snbrazonsocial;
  }

  /**
   *  PROPIEDAD: Razon social del proveedor  
   *  @param $val - nuevo valor
  */
  function setnbrazonsocial($val) {
    $this->snbrazonsocial = $val;
  }
  
  /**
   *  PROPIEDAD: Direccion del proveedor
   *  @return valor de la propiedad
  */
  function gettxdireccion() {
    return $this->stxdireccion;
  }

  /**
   *  PROPIEDAD: Direccion del proveedor  
   *  @param $val - nuevo valor
  */
  function settxdireccion($val) {
    $this->stxdireccion = $val;
  }
  
  /**
   *  PROPIEDAD: Comentarios relativos al proveedor
   *  @return valor de la propiedad
  */
  function gettxcomment() {
    return $this->stxcomment;
  }

  /**
   *  PROPIEDAD: Comentarios relativos al proveedor  
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
    if($this->getcdproveedor()==$obj->getcdproveedor())
       return true;
    return false;
  }


} /* fin clase [ProveedorBean] */

?>

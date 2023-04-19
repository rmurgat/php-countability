<?php

/**
 * @name: ContactoProveedorBean
 * @creation date: (23-Junio-2010)
 * Descripci?n:
 * Clase que mantiene la relación de los contactos que se tienen para un proveedor en particular
 * @author: Ruben Murga Tapia
 * @conpany: HANYGEN SOFTWARE S.A. DE C.V.
 **/

class ContactoProveedorBean {
    var $scdempresa = "";              // Clave de la empresa
    var $scdproveedor = "";              // Clave del proveedor
    var $scdcontacto = "";              // Clave del contacto

  /**
   * CONSTRUCTOR
  */
  function ContactoProveedorBean() {
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
   *  PROPIEDAD: Clave del contacto
   *  @return valor de la propiedad
  */
  function getcdcontacto() {
    return $this->scdcontacto;
  }

  /**
   *  PROPIEDAD: Clave del contacto  
   *  @param $val - nuevo valor
  */
  function setcdcontacto($val) {
    $this->scdcontacto = $val;
  }
  

  /**
   *  PROCEDIMIENTO para determina si los objetos tienen la misma llave
   *  @param $obj - objeto 
  */
  function hasamekey($obj) {
    if($this->getcdempresa()==$obj->getcdempresa())
    if($this->getcdproveedor()==$obj->getcdproveedor())
    if($this->getcdcontacto()==$obj->getcdcontacto())
       return true;
    return false;
  }


} /* fin clase [ContactoProveedorBean] */

?>

<?php

/**
 * @name: ContactoClienteBean
 * @creation date: (23-Jun-2010)
 * Descripci?n:
 * Clase que tiene la información relativa del contacto que tiene el cliente
 * @author: Ruben Murga Tapia
 * @conpany: HANYGEN SOFTWARE S.A. DE C.V.
 **/

class ContactoClienteBean {
    var $scdempresa = "";              // Clave de la empresa
    var $scdcliente = "";              // Clave del cliente
    var $scdcontacto = "";              // Clave del contacto

  /**
   * CONSTRUCTOR
  */
  function ContactoClienteBean() {
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
    if($this->getcdcliente()==$obj->getcdcliente())
    if($this->getcdcontacto()==$obj->getcdcontacto())
       return true;
    return false;
  }


} /* fin clase [ContactoClienteBean] */

?>

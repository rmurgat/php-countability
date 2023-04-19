<?php

/**
 * @name: ContactoBean
 * @creation date: (23-Jun-2010)
 * Descripci?n:
 * Clase que tiene la información relativa a los contactos, tanto del proveedor, como del cliente
 * @author: Ruben Murga Tapia
 * @conpany: HANYGEN SOFTWARE S.A. DE C.V.
 **/

class ContactoBean {
    var $scdempresa = "";              // Clave de la empresa
    var $scdcontacto = "";              // Clave del contacto
    var $sstcontacto = "";              // Estatus del contacto
    var $snutelefono = "";              // Número de teléfono del contacto
    var $snumovil = "";              // Número de teléfono del celular del contacto
    var $snbcontacto = "";              // Nombre del contacto
    var $stxdireccion = "";              // Dirección donde se puede localizar al contacto
    var $stxcomment = "";              // Comentarios relativos a los datos del contacto

  /**
   * CONSTRUCTOR
  */
  function ContactoBean() {
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
   *  PROPIEDAD: Estatus del contacto
   *  @return valor de la propiedad
  */
  function getstcontacto() {
    return $this->sstcontacto;
  }

  /**
   *  PROPIEDAD: Estatus del contacto  
   *  @param $val - nuevo valor
  */
  function setstcontacto($val) {
    $this->sstcontacto = $val;
  }
  
  /**
   *  PROPIEDAD: Número de teléfono del contacto
   *  @return valor de la propiedad
  */
  function getnutelefono() {
    return $this->snutelefono;
  }

  /**
   *  PROPIEDAD: Número de teléfono del contacto  
   *  @param $val - nuevo valor
  */
  function setnutelefono($val) {
    $this->snutelefono = $val;
  }
  
  /**
   *  PROPIEDAD: Número de teléfono del celular del contacto
   *  @return valor de la propiedad
  */
  function getnumovil() {
    return $this->snumovil;
  }

  /**
   *  PROPIEDAD: Número de teléfono del celular del contacto  
   *  @param $val - nuevo valor
  */
  function setnumovil($val) {
    $this->snumovil = $val;
  }
  
  /**
   *  PROPIEDAD: Nombre del contacto
   *  @return valor de la propiedad
  */
  function getnbcontacto() {
    return $this->snbcontacto;
  }

  /**
   *  PROPIEDAD: Nombre del contacto  
   *  @param $val - nuevo valor
  */
  function setnbcontacto($val) {
    $this->snbcontacto = $val;
  }
  
  /**
   *  PROPIEDAD: Dirección donde se puede localizar al contacto
   *  @return valor de la propiedad
  */
  function gettxdireccion() {
    return $this->stxdireccion;
  }

  /**
   *  PROPIEDAD: Dirección donde se puede localizar al contacto  
   *  @param $val - nuevo valor
  */
  function settxdireccion($val) {
    $this->stxdireccion = $val;
  }
  
  /**
   *  PROPIEDAD: Comentarios relativos a los datos del contacto
   *  @return valor de la propiedad
  */
  function gettxcomment() {
    return $this->stxcomment;
  }

  /**
   *  PROPIEDAD: Comentarios relativos a los datos del contacto  
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
    if($this->getcdcontacto()==$obj->getcdcontacto())
       return true;
    return false;
  }


} /* fin clase [ContactoBean] */

?>

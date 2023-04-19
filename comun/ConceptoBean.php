<?php

/**
 * @name: ConceptoBean
 * @creation date: (22-Jun-2010)
 * Descripcion:
 * Clase que tiene el catalogo de concepto de movimientos
 * @author: Ruben Murga Tapia
 * @conpany: HANYGEN SOFTWARE S.A. DE C.V.
 **/

class ConceptoBean {
    var $scdconcepto = "";              // Clave del concepto contable
    var $sstconcepto = "";              // Estatus del concepto contable
    var $scdpais = "";              // Clave del pais
    var $snbconcepto = "";              // Nombre o descripcion del concepto contable

  /**
   * CONSTRUCTOR
  */
  function ConceptoBean() {
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
   *  PROPIEDAD: Estatus del concepto contable
   *  @return valor de la propiedad
  */
  function getstconcepto() {
    return $this->sstconcepto;
  }

  /**
   *  PROPIEDAD: Estatus del concepto contable  
   *  @param $val - nuevo valor
  */
  function setstconcepto($val) {
    if($val=='') $val='IN';
    $this->sstconcepto = $val;
  }
  
  /**
   *  PROPIEDAD: Clave del pais
   *  @return valor de la propiedad
  */
  function getcdpais() {
    return $this->scdpais;
  }

  /**
   *  PROPIEDAD: Clave del pais  
   *  @param $val - nuevo valor
  */
  function setcdpais($val) {
    $this->scdpais = $val;
  }
  
  /**
   *  PROPIEDAD: Nombre o descripcion del concepto contable
   *  @return valor de la propiedad
  */
  function getnbconcepto() {
    return $this->snbconcepto;
  }

  /**
   *  PROPIEDAD: Nombre o descripcion del concepto contable  
   *  @param $val - nuevo valor
  */
  function setnbconcepto($val) {
    $this->snbconcepto = $val;
  }
  

  /**
   *  PROCEDIMIENTO para determina si los objetos tienen la misma llave
   *  @param $obj - objeto 
  */
  function hasamekey($obj) {
    if($this->getcdconcepto()==$obj->getcdconcepto())
       return true;
    return false;
  }


} /* fin clase [ConceptoBean] */

?>

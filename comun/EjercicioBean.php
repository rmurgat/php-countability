<?php

/**
 * @name: EjercicioBean
 * @creation date: (02-Julio-2010)
 * Descripci?n:
 * Clase que tiene la informacion relativa a los ejercicios fiscales de la empresa
 * @author: Ruben Murga Tapia
 * @conpany: HANYGEN SOFTWARE S.A. DE C.V.
 **/

class EjercicioBean {
    var $scdempresa = "";              // Clave de la empresa
    var $scdejercicio = "";              // Clave del ejercicio fiscal
    var $sstejercicio = "";              // Estatus del ejercicio fiscal
    var $sfhinicio = "";              // Fecha en que inicia el ejercicio fiscal
    var $sfhtermino = "";              // Fecha en que termina el ejercicio fiscal

  /**
   * CONSTRUCTOR
  */
  function EjercicioBean() {
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
   *  PROPIEDAD: Estatus del ejercicio fiscal
   *  @return valor de la propiedad
  */
  function getstejercicio() {
    return $this->sstejercicio;
  }

  /**
   *  PROPIEDAD: Estatus del ejercicio fiscal  
   *  @param $val - nuevo valor
  */
  function setstejercicio($val) {
    $this->sstejercicio = $val;
  }
  
  /**
   *  PROPIEDAD: Fecha en que inicia el ejercicio fiscal
   *  @return valor de la propiedad
  */
  function getfhinicio() {
    return $this->sfhinicio;
  }

  /**
   *  PROPIEDAD: Fecha en que inicia el ejercicio fiscal  
   *  @param $val - nuevo valor
  */
  function setfhinicio($val) {
    $this->sfhinicio = $val;
  }
  
  /**
   *  PROPIEDAD: Fecha en que termina el ejercicio fiscal
   *  @return valor de la propiedad
  */
  function getfhtermino() {
    return $this->sfhtermino;
  }

  /**
   *  PROPIEDAD: Fecha en que termina el ejercicio fiscal  
   *  @param $val - nuevo valor
  */
  function setfhtermino($val) {
    $this->sfhtermino = $val;
  }
  

  /**
   *  PROCEDIMIENTO para determina si los objetos tienen la misma llave
   *  @param $obj - objeto 
  */
  function hasamekey($obj) {
    if($this->getcdempresa()==$obj->getcdempresa())
    if($this->getcdejercicio()==$obj->getcdejercicio())
       return true;
    return false;
  }


} /* fin clase [EjercicioBean] */

?>

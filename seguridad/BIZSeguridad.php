<?php

require_once("DBSeguridad.php"); 
require_once("../comun/CriterioBean.php");
require_once("../util/encryp.php"); 

/**
 * @name: BIZSeguridad
 * Descripcion: 
 * Clase de negocio y principal acceso para el proyecto
 * @creation date: (07-Julio-2010)
 * @author Ruben Murga Tapia
 * @conpany: HANYGEN SOFTWARE S.A. DE C.V.
 */
class BIZSeguridad {
  var $odb;
  var $smensaje = "";

  /**
   * CONSTRUCTOR
   */
  function BIZSeguridad() {
    $this->odb = new DBSeguridad();  
  }


//////////////////////////////////////////////////////////////////////////
//                           SELECT CODE
//////////////////////////////////////////////////////////////////////////


  /**
   * PROCEDIMIENTO para consultar un objeto en particular tipo PaisBean
   * @param $pscdpais - Clave del pais
   * @param $conexion - conexion a la base de datos   
   * @return $obj - objeto tipo PaisBean con la inf
   */
  function getPaisBean($pscdpais, $conexion) {
    $obj = NULL;
    $result = $this->odb->getPaisBean($pscdpais, $conexion);
    if($row=mysql_fetch_row($result)) {
      $obj = new PaisBean();
      $obj->setcdpais($row[0]);
      $obj->setnbpais($row[1]);
    }
    return $obj;
  }
  
  /**
   * PROCEDIMIENTO: Para consultar varios objetos tipo PaisBean
   * @param $pscdpais - Clave del pais
   * @param $conexion - conexion a la base de datos   
   * @return $objects[] - Array de objetos tipo PaisBean
  */
  function getPaisBeans($pscdpais, $conexion) {
    $objects = array();
    $result = $this->odb->getPaisBeans($pscdpais, $conexion);
    while($row=mysql_fetch_row($result)){
       $obj = new PaisBean();
       $obj->setcdpais($row[0]);
       $obj->setnbpais($row[1]);
       $objects[] = $obj;
    }
    return $objects;
  }
  
  /**
   * PROCEDIMIENTO para consultar un objeto en particular tipo EmpresaBean
   * @param $pscdempresa - Clave de la empresa
   * @param $conexion - conexion a la base de datos   
   * @return $obj - objeto tipo EmpresaBean con la inf
   */
  function getEmpresaBean($pscdempresa, $conexion) {
    $obj = NULL;
    $result = $this->odb->getEmpresaBean($pscdempresa, $conexion);
    if($row=mysql_fetch_row($result)) {
      $obj = new EmpresaBean();
      $obj->setcdempresa($row[0]);
      $obj->setcdpais($row[1]);
      $obj->setstempresa($row[2]);
      $obj->setpoiva($row[3]);
      $obj->setcdrfc($row[4]);
      $obj->setnutelefono($row[5]);
      $obj->setnbempresa($row[6]);
      $obj->settxdireccion($row[7]);
      $obj->setlklogoheader($row[8]);
    }
    return $obj;
  }
  
  /**
   * PROCEDIMIENTO: Para consultar varios objetos tipo EmpresaBean
   * @param $pscdempresa - Clave de la empresa
   * @param $conexion - conexion a la base de datos   
   * @return $objects[] - Array de objetos tipo EmpresaBean
  */
  function getEmpresaBeans($pscdempresa, $conexion) {
    $objects = array();
    $result = $this->odb->getEmpresaBeans($pscdempresa, $conexion);
    while($row=mysql_fetch_row($result)){
       $obj = new EmpresaBean();
       $obj->setcdempresa($row[0]);
       $obj->setcdpais($row[1]);
       $obj->setstempresa($row[2]);
       $obj->setpoiva($row[3]);
       $obj->setcdrfc($row[4]);
       $obj->setnutelefono($row[5]);
       $obj->setnbempresa($row[6]);
       $obj->settxdireccion($row[7]);
       $obj->setlklogoheader($row[8]);
       $objects[] = $obj;
    }
    return $objects;
  }
  
  /**
   * PROCEDIMIENTO para consultar un objeto en particular tipo EjercicioBean
   * @param $pscdempresa - Clave de la empresa
   * @param $pscdejercicio - Clave del ejercicio fiscal
   * @param $conexion - conexion a la base de datos   
   * @return $obj - objeto tipo EjercicioBean con la inf
   */
  function getEjercicioBean($pscdempresa, $pscdejercicio, $conexion) {
    $obj = NULL;
    $result = $this->odb->getEjercicioBean($pscdempresa, $pscdejercicio, $conexion);
    if($row=mysql_fetch_row($result)) {
      $obj = new EjercicioBean();
      $obj->setcdempresa($row[0]);
      $obj->setcdejercicio($row[1]);
      $obj->setstejercicio($row[2]);
      $obj->setfhinicio($row[3]);
      $obj->setfhtermino($row[4]);
    }
    return $obj;
  }
  
  /**
   * PROCEDIMIENTO para consultar un objeto en particular tipo UsuarioEmpresaBean
   * @param $pscdempresa - Clave de la empresa
   * @param $pscdusuario - Clave del usuario
   * @param $conexion - conexion a la base de datos   
   * @return $obj - objeto tipo UsuarioEmpresaBean con la inf
   */
  function getUsuarioEmpresaBean($pscdempresa, $pscdusuario, $conexion) {
    $obj = NULL;
    $result = $this->odb->getUsuarioEmpresaBean($pscdempresa, $pscdusuario, $conexion);
    if($row=mysql_fetch_row($result)) {
      $obj = new UsuarioEmpresaBean();
      $obj->setcdempresa($row[0]);
      $obj->setcdusuario($row[1]);
      $obj->setstusuarioempresa($row[2]);
      $obj->setcdperfil($row[3]);
      $obj->settxcomment($row[4]);
    }
    return $obj;
  }
  
  /**
   * PROCEDIMIENTO: Para consultar varios objetos tipo UsuarioEmpresaBean
   * @param $pscdusuario - Clave del usuario
   * @param $conexion - conexion a la base de datos   
   * @return $objects[] - Array de objetos tipo UsuarioEmpresaBean
  */
  function getUsuarioEmpresaBeans($pscdusuario, $conexion) {
    $objects = array();
    $result = $this->odb->getUsuarioEmpresaBeans($pscdusuario, $conexion);
    while($row=mysql_fetch_row($result)){
       $obj = new UsuarioEmpresaBean();
       $obj->setcdempresa($row[0]);
       $obj->setcdusuario($row[1]);
       $obj->setstusuarioempresa($row[2]);
       $obj->setcdperfil($row[3]);
       $obj->settxcomment($row[4]);
       $objects[] = $obj;
    }
    return $objects;
  }
  
  /**
   * PROCEDIMIENTO para consultar un objeto en particular tipo UsuarioBean
   * @param $pscdusuario - Clave del usuario
   * @param $conexion - conexion a la base de datos   
   * @return $obj - objeto tipo UsuarioBean con la inf
   */
  function getUsuarioBean($pscdusuario, $conexion) {
    $obj = NULL;
    $result = $this->odb->getUsuarioBean($pscdusuario, $conexion);
    if($row=mysql_fetch_row($result)) {
      $obj = new UsuarioBean();
      $obj->setcdusuario($row[0]);
      $obj->setstusuario($row[1]);
      $obj->setcdpassword($row[2]);
      $obj->setnbusuario($row[3]);
      $obj->settxemail($row[4]);
      $obj->setnbempresa($row[5]);
    }
    return $obj;
  }

  /**
   * PROCEDIMIENTO para consultar un objeto en particular tipo UsuarioBean
   * @param $pscdusuario - Clave del usuario
   * @param $pspassword - Contrasenia del usuario
   * @param $conexion - conexion a la base de datos   
   * @return $obj - objeto tipo UsuarioBean con la inf
   */
  function getUsuarioBeanLogin($pscdusuario, $pspassword, $conexion) {
    $obj = NULL;
    $result = $this->odb->getUsuarioBeanLogin($pscdusuario, $pspassword, $conexion);
    if($row=mysql_fetch_row($result)) {
      $obj = new UsuarioBean();
      $obj->setcdusuario($row[0]);
      $obj->setstusuario($row[1]);
      $obj->setcdpassword($row[2]);
      $obj->setnbusuario($row[3]);
      $obj->settxemail($row[4]);
      $obj->setnbempresa($row[5]);
    }
    return $obj;
  }
  
  /**
   * PROCEDIMIENTO: Para consultar varios objetos tipo UsuarioBean
   * @param $pscdusuario - Clave del usuario
   * @param $conexion - conexion a la base de datos   
   * @return $objects[] - Array de objetos tipo UsuarioBean
  */
  function getUsuarioBeans($pscdusuario, $conexion) {
    $objects = array();
    $result = $this->odb->getUsuarioBeans($pscdusuario, $conexion);
    while($row=mysql_fetch_row($result)){
       $obj = new UsuarioBean();
       $obj->setcdusuario($row[0]);
       $obj->setstusuario($row[1]);
       $obj->setcdpassword($row[2]);
       $obj->setnbusuario($row[3]);
       $obj->settxemail($row[4]);
       $obj->setnbempresa($row[5]);
       $objects[] = $obj;
    }
    return $objects;
  }
  
  /**
   * PROCEDIMIENTO: Para consultar varios objetos tipo UsuarioBean en base a un criterio
   * @param $ocrit - criterios de consulta
   * @param $conexion - conexion a la base de datos   
   * @return $objects[] - Array de objetos tipo UsuarioBean
  */
  function getcUsuarioBeans($ocrit, $conexion) {
    $objects = array();
    $result = $this->odb->getcUsuarioBeans($ocrit, $conexion);
    while($row=mysql_fetch_row($result)){
       $obj = new UsuarioBean();
       $obj->setcdusuario($row[0]);
       $obj->setstusuario($row[1]);
       $obj->setcdpassword($row[2]);
       $obj->setnbusuario($row[3]);
       $obj->settxemail($row[4]);
       $obj->setnbempresa($row[5]);
       $objects[] = $obj;
    }
    return $objects;
  }

  /**
   * PROCEDIMIENTO para consultar un objeto en particular tipo PerfilBean
   * @param $pscdempresa - Clave de la empresa
   * @param $pscdperfil - Clave del perfil
   * @param $conexion - conexion a la base de datos   
   * @return $obj - objeto tipo PerfilBean con la inf
   */
  function getPerfilBean($pscdempresa, $pscdperfil, $conexion) {
    $obj = NULL;
    $result = $this->odb->getPerfilBean($pscdempresa, $pscdperfil, $conexion);
    if($row=mysql_fetch_row($result)) {
      $obj = new PerfilBean();
      $obj->setcdempresa($row[0]);
      $obj->setcdperfil($row[1]);
      $obj->setstperfil($row[2]);
      $obj->setnbperfil($row[3]);
    }
    return $obj;
  }
  
  /**
   * PROCEDIMIENTO: Para consultar varios objetos tipo PerfilBean
   * @param $pscdempresa - Clave de la empresa
   * @param $pscdperfil - Clave del perfil
   * @param $conexion - conexion a la base de datos   
   * @return $objects[] - Array de objetos tipo PerfilBean
  */
  function getPerfilBeans($pscdempresa, $pscdperfil, $conexion) {
    $objects = array();
    $result = $this->odb->getPerfilBeans($pscdempresa, $pscdperfil, $conexion);
    while($row=mysql_fetch_row($result)){
       $obj = new PerfilBean();
       $obj->setcdempresa($row[0]);
       $obj->setcdperfil($row[1]);
       $obj->setstperfil($row[2]);
       $obj->setnbperfil($row[3]);
       $objects[] = $obj;
    }
    return $objects;
  }
  
  /**
   * PROCEDIMIENTO para consultar un objeto en particular tipo PerfilfuncionBean
   * @param $pscdempresa - Clave de la empresa
   * @param $pscdmodulo - Clave del modulo
   * @param $pscdfuncion - Clave de la funcion
   * @param $pscdperfil - Clave dcel perfil
   * @param $conexion - conexion a la base de datos   
   * @return $obj - objeto tipo PerfilfuncionBean con la inf
   */
  function getPerfilfuncionBean($pscdempresa, $pscdmodulo, $pscdfuncion, $pscdperfil, $conexion) {
    $obj = NULL;
    $result = $this->odb->getPerfilfuncionBean($pscdempresa, $pscdmodulo, $pscdfuncion, $pscdperfil, $conexion);
    if($row=mysql_fetch_row($result)) {
      $obj = new PerfilfuncionBean();
      $obj->setcdempresa($row[0]);
      $obj->setcdmodulo($row[1]);
      $obj->setcdfuncion($row[2]);
      $obj->setcdperfil($row[3]);
      $obj->setsttodo($row[4]);
      $obj->setstconsulta($row[5]);
      $obj->setstagregar($row[6]);
      $obj->setstmodifica($row[7]);
      $obj->setstelimina($row[8]);
    }
    return $obj;
  }
  
  /**
   * PROCEDIMIENTO: Para consultar varios objetos tipo PerfilfuncionBean
   * @param $pscdempresa - Clave de la empresa
   * @param $pscdmodulo - Clave del modulo
   * @param $pscdfuncion - Clave de la funcion
   * @param $pscdperfil - Clave dcel perfil
   * @param $conexion - conexion a la base de datos   
   * @return $objects[] - Array de objetos tipo PerfilfuncionBean
  */
  function getPerfilfuncionBeans($pscdempresa, $pscdmodulo, $pscdfuncion, $pscdperfil, $conexion) {
    $objects = array();
    $result = $this->odb->getPerfilfuncionBeans($pscdempresa, $pscdmodulo, $pscdfuncion, $pscdperfil, $conexion);
    while($row=mysql_fetch_row($result)){
       $obj = new PerfilfuncionBean();
       $obj->setcdempresa($row[0]);
       $obj->setcdmodulo($row[1]);
       $obj->setcdfuncion($row[2]);
       $obj->setcdperfil($row[3]);
       $obj->setsttodo($row[4]);
       $obj->setstconsulta($row[5]);
       $obj->setstagregar($row[6]);
       $obj->setstmodifica($row[7]);
       $obj->setstelimina($row[8]);
       $objects[] = $obj;
    }
    return $objects;
  }
  
  /**
   * PROCEDIMIENTO para consultar un objeto en particular tipo FuncionBean
   * @param $pscdmodulo - Clave del modulo
   * @param $pscdfuncion - Clave de la funcion
   * @param $conexion - conexion a la base de datos   
   * @return $obj - objeto tipo FuncionBean con la inf
   */
  function getFuncionBean($pscdmodulo, $pscdfuncion, $conexion) {
    $obj = NULL;
    $result = $this->odb->getFuncionBean($pscdmodulo, $pscdfuncion, $conexion);
    if($row=mysql_fetch_row($result)) {
      $obj = new FuncionBean();
      $obj->setcdmodulo($row[0]);
      $obj->setcdfuncion($row[1]);
      $obj->setnuorden($row[2]);
      $obj->setidensistema($row[3]);
      $obj->setnblabel($row[4]);
      $obj->setnbfuncion($row[5]);
      $obj->settxurl($row[6]);
      $obj->settxcomment($row[7]);
    }
    return $obj;
  }
  
  /**
   * PROCEDIMIENTO: Para consultar varios objetos tipo FuncionBean
   * @param $pscdmodulo - Clave del modulo
   * @param $pscdfuncion - Clave de la funcion
   * @param $conexion - conexion a la base de datos   
   * @return $objects[] - Array de objetos tipo FuncionBean
  */
  function getFuncionBeans($pscdmodulo, $pscdfuncion, $conexion) {
    $objects = array();
    $result = $this->odb->getFuncionBeans($pscdmodulo, $pscdfuncion, $conexion);
    while($row=mysql_fetch_row($result)){
       $obj = new FuncionBean();
       $obj->setcdmodulo($row[0]);
       $obj->setcdfuncion($row[1]);
       $obj->setnuorden($row[2]);
       $obj->setidensistema($row[3]);
       $obj->setnblabel($row[4]);
       $obj->setnbfuncion($row[5]);
       $obj->settxurl($row[6]);
       $obj->settxcomment($row[7]);
       $objects[] = $obj;
    }
    return $objects;
  }
  
  /**
   * PROCEDIMIENTO para consultar un objeto en particular tipo ModuloBean
   * @param $pscdmodulo - Clave del modulo del sistema
   * @param $conexion - conexion a la base de datos   
   * @return $obj - objeto tipo ModuloBean con la inf
   */
  function getModuloBean($pscdmodulo, $conexion) {
    $obj = NULL;
    $result = $this->odb->getModuloBean($pscdmodulo, $conexion);
    if($row=mysql_fetch_row($result)) {
      $obj = new ModuloBean();
      $obj->setcdmodulo($row[0]);
      $obj->setidensistema($row[1]);
      $obj->setnblabel($row[2]);
      $obj->setnbmodulo($row[3]);
      $obj->settxcomment($row[4]);
    }
    return $obj;
  }
  
  /**
   * PROCEDIMIENTO: Para consultar varios objetos tipo ModuloBean
   * @param $pscdmodulo - Clave del modulo del sistema
   * @param $conexion - conexion a la base de datos   
   * @return $objects[] - Array de objetos tipo ModuloBean
  */
  function getModuloBeans($pscdmodulo, $conexion) {
    $objects = array();
    $result = $this->odb->getModuloBeans($pscdmodulo, $conexion);
    while($row=mysql_fetch_row($result)){
       $obj = new ModuloBean();
       $obj->setcdmodulo($row[0]);
       $obj->setidensistema($row[1]);
       $obj->setnblabel($row[2]);
       $obj->setnbmodulo($row[3]);
       $obj->settxcomment($row[4]);
       $objects[] = $obj;
    }
    return $objects;
  }

  /**
   * PROCEDIMIENTO para consultar un objeto en particular tipo SessionBean
   * @param $psession - Clave de la session del sistema
   * @param $conexion - conexion a la base de datos   
   * @return $obj - objeto tipo SessionBean con la inf
   */
  function getSessionBean($psession, $conexion) {
    $obj = NULL;
    $result = $this->odb->getSessionBean($psession, $conexion);
    if($row=mysql_fetch_row($result)) {
      $obj = new SessionBean();
      $obj->setcdsession($row[0]);
      $obj->setcdempresa($row[1]);
      $obj->setcdperfil($row[2]);
      $obj->setcdusuario($row[3]);
      $obj->setcdejercicio($row[4]);
      $obj->setfhsession($row[5]);
    }
    return $obj;
  }
  
  /**
   *  PROCEDIMIENTO: Procedimiento para contar los registros de una tabla con su condici?n
   *  @param $tabla - Nombre de la tabla
   *  @param $swhere - Condicion de la tabla
   *  @param $conexion - conexion a la base de datos
   *  @return $resultado
  */ 
  function getallCount($tabla, $swhere, $conexion) {
     $res = 0;
     $result = $this->odb->getallCount($tabla, $swhere, $conexion);
     if($row=mysql_fetch_row($result)) {
        $res = intval($row[0]);
     }
     return $res;
  }

//////////////////////////////////////////////////////////////////////////
//                           CONSECUTIVOS
//////////////////////////////////////////////////////////////////////////

  /**
   *  PROCEDIMIENTO: Procedimiento para consultar el ultimo id del tipo PerfilBean
   *  @param $conexion - conexion a la base de datos
   *  @return $resultado
  */ 
  function getnextPerfilBeancd_perfil($conexion) {
    $res = "000000000001";    //crea un fijo maximo
    $nest = 0;
    $result = $this->odb->getlastPerfilBeancd_perfil($conexion);
    if($row=mysql_fetch_row($result)) {
      $next = intval($row[0]) + 1;
      $res = "000000000000$next";
      return substr($res, strlen($res)-3);
    }
    return substr($res, strlen($res)-3);
  }  

  /**
   *  PROCEDIMIENTO: Procedimiento para consultar el ultimo id del tipo FuncionBean
   *  @param $conexion - conexion a la base de datos
   *  @return $resultado
  */ 
  function getnextFuncionBeancd_funcion($conexion) {
    $res = "000000000001";    //crea un fijo maximo
    $nest = 0;
    $result = $this->odb->getlastFuncionBeancd_funcion($conexion);
    if($row=mysql_fetch_row($result)) {
      $next = intval($row[0]) + 1;
      $res = "000000000000$next";
      return substr($res, strlen($res)-3);
    }
    return substr($res, strlen($res)-3);
  }  

  /**
   *  PROCEDIMIENTO: Procedimiento para consultar el ultimo id del tipo ModuloBean
   *  @param $conexion - conexion a la base de datos
   *  @return $resultado
  */ 
  function getnextModuloBeancd_modulo($conexion) {
    $res = "000000000001";    //crea un fijo maximo
    $nest = 0;
    $result = $this->odb->getlastModuloBeancd_modulo($conexion);
    if($row=mysql_fetch_row($result)) {
      $next = intval($row[0]) + 1;
      $res = "000000000000$next";
      return substr($res, strlen($res)-3);
    }
    return substr($res, strlen($res)-3);
  }  

//////////////////////////////////////////////////////////////////////////
//                           INSERT CODE
//////////////////////////////////////////////////////////////////////////

  /**
   * PROCEDIMIENTO : Alta de un objeto tipo UsuarioEmpresaBean
   * @param $oadd - objeto UsuarioEmpresaBean a dar de alta
   * @param $conexion - conexion a la base de datos
   * @return true / false
   */
  function addUsuarioEmpresaBean($oadd, $conexion) {
    return $this->odb->addUsuarioEmpresaBean($oadd, $conexion);
  }
  
  /**
   * PROCEDIMIENTO : Alta de un objeto tipo UsuarioBean
   * @param $oadd - objeto UsuarioBean a dar de alta
   * @param $conexion - conexion a la base de datos
   * @return true / false
   */
  function addUsuarioBean($oadd, $conexion) {
    return $this->odb->addUsuarioBean($oadd, $conexion);
  }
  
  /**
   * PROCEDIMIENTO : Alta de un objeto tipo PerfilBean
   * @param $oadd - objeto PerfilBean a dar de alta
   * @param $conexion - conexion a la base de datos
   * @return true / false
   */
  function addPerfilBean($oadd, $conexion) {
    $oadd->setcdperfil($this->getnextPerfilBeancd_perfil($conexion));
    return $this->odb->addPerfilBean($oadd, $conexion);
  }
  
  /**
   * PROCEDIMIENTO : Alta de un objeto tipo PerfilfuncionBean
   * @param $oadd - objeto PerfilfuncionBean a dar de alta
   * @param $conexion - conexion a la base de datos
   * @return true / false
   */
  function addPerfilfuncionBean($oadd, $conexion) {
    return $this->odb->addPerfilfuncionBean($oadd, $conexion);
  }
  
  /**
   * PROCEDIMIENTO : Alta de un objeto tipo FuncionBean
   * @param $oadd - objeto FuncionBean a dar de alta
   * @param $conexion - conexion a la base de datos
   * @return true / false
   */
  function addFuncionBean($oadd, $conexion) {
    $oadd->setcdfuncion($this->getnextFuncionBeancd_funcion($conexion));
    return $this->odb->addFuncionBean($oadd, $conexion);
  }
  
  /**
   * PROCEDIMIENTO : Alta de un objeto tipo ModuloBean
   * @param $oadd - objeto ModuloBean a dar de alta
   * @param $conexion - conexion a la base de datos
   * @return true / false
   */
  function addModuloBean($oadd, $conexion) {
    $oadd->setcdmodulo($this->getnextModuloBeancd_modulo($conexion));
    return $this->odb->addModuloBean($oadd, $conexion);
  }

  /**
   * PROCEDIMIENTO : Alta de un objeto tipo SessionBean
   * @param $oadd - objeto SessionBean a dar de alta
   * @param $conexion - conexion a la base de datos
   * @return true / false
   */
  function addSessionBean($oadd, $conexion) {
    $cd = $oadd->getcdusuario().round(microtime(true));
    $oadd->setcdsession(encode_this($cd));
    $oadd->setcdejercicio('2010');     /* temporal */
    $this->odb->clearSessionBeans($conexion);
    return $this->odb->addSessionBean($oadd, $conexion);
  }

  
//////////////////////////////////////////////////////////////////////////
//                           UPDATE CODE
//////////////////////////////////////////////////////////////////////////
  /**
   * PROCEDIMIENTO : Actualizacion de un objeto tipo UsuarioEmpresaBean
   * @param $oupd - objeto tipo UsuarioEmpresaBean para actualizar
   * @param $conexion - conexion a la base de datos
   * @return true / false
   */
  function updUsuarioEmpresaBean($oupd, $conexion) {
    return $this->odb->updUsuarioEmpresaBean($oupd, $conexion);
  }   
  
  /**
   * PROCEDIMIENTO : Actualizacion de un objeto tipo UsuarioBean
   * @param $oupd - objeto tipo UsuarioBean para actualizar
   * @param $conexion - conexion a la base de datos
   * @return true / false
   */
  function updUsuarioBean($oupd, $conexion) {
    return $this->odb->updUsuarioBean($oupd, $conexion);
  }   
  
  /**
   * PROCEDIMIENTO : Actualizacion de un objeto tipo PerfilBean
   * @param $oupd - objeto tipo PerfilBean para actualizar
   * @param $conexion - conexion a la base de datos
   * @return true / false
   */
  function updPerfilBean($oupd, $conexion) {
    return $this->odb->updPerfilBean($oupd, $conexion);
  }   
  
  /**
   * PROCEDIMIENTO : Actualizacion de un objeto tipo PerfilfuncionBean
   * @param $oupd - objeto tipo PerfilfuncionBean para actualizar
   * @param $conexion - conexion a la base de datos
   * @return true / false
   */
  function updPerfilfuncionBean($oupd, $conexion) {
    return $this->odb->updPerfilfuncionBean($oupd, $conexion);
  }   
  
  /**
   * PROCEDIMIENTO : Actualizacion de un objeto tipo FuncionBean
   * @param $oupd - objeto tipo FuncionBean para actualizar
   * @param $conexion - conexion a la base de datos
   * @return true / false
   */
  function updFuncionBean($oupd, $conexion) {
    return $this->odb->updFuncionBean($oupd, $conexion);
  }   
  
  /**
   * PROCEDIMIENTO : Actualizacion de un objeto tipo ModuloBean
   * @param $oupd - objeto tipo ModuloBean para actualizar
   * @param $conexion - conexion a la base de datos
   * @return true / false
   */
  function updModuloBean($oupd, $conexion) {
    return $this->odb->updModuloBean($oupd, $conexion);
  }   
  
//////////////////////////////////////////////////////////////////////////
//                           DELETE CODE
//////////////////////////////////////////////////////////////////////////
  /**
   * PROCEDIMIENTO : Eliminacion de un objeto tipo UsuarioEmpresaBean
   * @param $odel - objeto tipo UsuarioEmpresaBean para eliminar
   * @param $conexion - conexion a la base de datos
   * @return true / false
   */
  function delUsuarioEmpresaBean($odel, $conexion) {
    return $this->odb->delUsuarioEmpresaBean($odel, $conexion);
  }  
  
  /**
   * PROCEDIMIENTO : Eliminacion de un objeto tipo UsuarioBean
   * @param $pscdusuario - Clave del usuario
   * @param $conexion - conexion a la base de datos
   * @return true / false
   */
  function delUsuarioBean_key($pscdusuario, $conexion) {
    return $this->odb->delUsuarioBean_key($pscdusuario, $conexion);
    }  
    
  /**
   * PROCEDIMIENTO : Eliminacion de un objeto tipo PerfilBean
   * @param $odel - objeto tipo PerfilBean para eliminar
   * @param $conexion - conexion a la base de datos
   * @return true / false
   */
  function delPerfilBean($odel, $conexion) {
    return $this->odb->delPerfilBean($odel, $conexion);
  }  
  
  /**
   * PROCEDIMIENTO : Eliminacion de un objeto tipo FuncionBean
   * @param $pscdmodulo - Clave del modulo
   * @param $pscdfuncion - Clave de la funcion
   * @param $conexion - conexion a la base de datos
   * @return true / false
   */
  function delFuncionBean_key($pscdmodulo, $pscdfuncion, $conexion) {
    return $this->odb->delFuncionBean_key($pscdmodulo, $pscdfuncion, $conexion);
    }  
    
  /**
   * PROCEDIMIENTO : Eliminacion de un objeto tipo ModuloBean
   * @param $pscdmodulo - Clave del modulo del sistema
   * @param $conexion - conexion a la base de datos
   * @return true / false
   */
  function delModuloBean_key($pscdmodulo, $conexion) {
    return $this->odb->delModuloBean_key($pscdmodulo, $conexion);
    }  

  /**
   * PROCEDIMIENTO : Termina una sesion del usuario
   * @param $psession - Clave de la sesion del sistema
   * @param $conexion - conexion a la base de datos
   * @return true / false
   */
  function terminasesion($psession, $conexion) {
    return $this->odb->terminasesion($psession, $conexion);
    }  

    
} /* fin clase [BIZSeguridad] */

?>

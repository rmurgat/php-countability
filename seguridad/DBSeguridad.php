<?php
require_once("../comun/CriterioBean.php");
require_once("../util/Utilerias.php"); 

/**
 * @name: DBSeguridad
 * Descripcion: 
 * Clase de acceso a la base de datos para el proyecto
 * @creation date: (07-Julio-2010)
 * @author Ruben Murga Tapia
 * @conpany: HANYGEN SOFTWARE S.A. DE C.V.
 */
class DBSeguridad {
  var $resultado;
  
  /**
   * CONSTRUCTOR
  */
  function DBSeguridad() {
  }

//////////////////////////////////////////////////////////////////////////
//                           SELECT CODE
//////////////////////////////////////////////////////////////////////////


  /**
   *  PROCEDIMIENTO: Procedimiento para seleccionar un registro de la tabla con070_pais
   *  @param $pscdpais - Clave del pais
   *  @param $conexion - conexion a la base de datos
   *  @return $resultado
  */ 
  function getPaisBean($pscdpais, $conexion) {
    $sql = "SELECT cd_pais, nb_pais";
    $sql.= " FROM  CON070_PAIS";
    $sql.= " WHERE cd_pais='".$pscdpais."'";
    $resultado = mysql_query($sql, $conexion);
    return $resultado;
  }

  /**
   *  PROCEDIMIENTO : consulta de algunos los registros de la tabla con070_pais
   *  @param $pscdpais - Clave del pais
   *  @param $conexion - conexion a la base de datos
   *  @return $resultado
  */ 
  function getPaisBeans($pscdpais, $conexion) {
    $sql = "SELECT cd_pais, nb_pais";
    $sql.= " FROM  CON070_PAIS";
    $sql.= " WHERE cd_pais='".$pscdpais."'";
    $resultado = mysql_query($sql, $conexion);
    return $resultado;
  }
  
  /**
   *  PROCEDIMIENTO: Procedimiento para seleccionar un registro de la tabla con100_empresa
   *  @param $pscdempresa - Clave de la empresa
   *  @param $conexion - conexion a la base de datos
   *  @return $resultado
  */ 
  function getEmpresaBean($pscdempresa, $conexion) {
    $sql = "SELECT cd_empresa, cd_pais, st_empresa, po_iva, cd_rfc, nu_telefono, nb_empresa, tx_direccion, lk_logoheader";
    $sql.= " FROM  CON100_EMPRESA";
    $sql.= " WHERE cd_empresa='".$pscdempresa."'";
    $resultado = mysql_query($sql, $conexion);
    return $resultado;
  }

  /**
   *  PROCEDIMIENTO : consulta de algunos los registros de la tabla con100_empresa
   *  @param $pscdempresa - Clave de la empresa
   *  @param $conexion - conexion a la base de datos
   *  @return $resultado
  */ 
  function getEmpresaBeans($pscdempresa, $conexion) {
    $sql = "SELECT cd_empresa, cd_pais, st_empresa, po_iva, cd_rfc, nu_telefono, nb_empresa, tx_direccion, lk_logoheader";
    $sql.= " FROM  CON100_EMPRESA";
    $sql.= " WHERE cd_empresa='".$pscdempresa."'";
    $resultado = mysql_query($sql, $conexion);
    return $resultado;
  }
  
  /**
   *  PROCEDIMIENTO: Procedimiento para seleccionar un registro de la tabla con110_ejercicio
   *  @param $pscdempresa - Clave de la empresa
   *  @param $pscdejercicio - Clave del ejercicio fiscal
   *  @param $conexion - conexion a la base de datos
   *  @return $resultado
  */ 
  function getEjercicioBean($pscdempresa, $pscdejercicio, $conexion) {
    $sql = "SELECT cd_empresa, cd_ejercicio, st_ejercicio, fh_inicio, fh_termino";
    $sql.= " FROM  CON110_EJERCICIO";
    $sql.= " WHERE cd_empresa='".$pscdempresa."'";
    $sql.= " AND   cd_ejercicio='".$pscdejercicio."'";
    $resultado = mysql_query($sql, $conexion);
    return $resultado;
  }

  /**
   *  PROCEDIMIENTO: Procedimiento para seleccionar un registro de la tabla con400_usuario_empresa
   *  @param $pscdempresa - Clave de la empresa
   *  @param $pscdusuario - Clave del usuario
   *  @param $conexion - conexion a la base de datos
   *  @return $resultado
  */ 
  function getUsuarioEmpresaBean($pscdempresa, $pscdusuario, $conexion) {
    $sql = "SELECT cd_empresa, cd_usuario, st_usuario_empresa, cd_perfil, tx_comment";
    $sql.= " FROM  CON400_USUARIO_EMPRESA";
    $sql.= " WHERE cd_empresa='".$pscdempresa."'";
    $sql.= " AND   cd_usuario='".$pscdusuario."'";
    $resultado = mysql_query($sql, $conexion);
    return $resultado;
  }

  /**
   *  PROCEDIMIENTO : consulta de algunos los registros de la tabla con400_usuario_empresa
   *  @param $pscdusuario - Clave del usuario
   *  @param $conexion - conexion a la base de datos
   *  @return $resultado
  */ 
  function getUsuarioEmpresaBeans($pscdusuario, $conexion) {
    $sql = "SELECT cd_empresa, cd_usuario, st_usuario_empresa, cd_perfil, tx_comment";
    $sql.= " FROM  CON400_USUARIO_EMPRESA";
    $sql.= " WHERE cd_usuario='".$pscdusuario."'";
    $resultado = mysql_query($sql, $conexion);
    return $resultado;
  }
  
  /**
   *  PROCEDIMIENTO: Procedimiento para seleccionar un registro de la tabla con410_usuario
   *  @param $pscdusuario - Clave del usuario
   *  @param $conexion - conexion a la base de datos
   *  @return $resultado
  */ 
  function getUsuarioBean($pscdusuario, $conexion) {
    $sql = "SELECT cd_usuario, st_usuario, cd_password, nb_usuario, tx_email, nb_empresa";
    $sql.= " FROM  CON410_USUARIO";
    $sql.= " WHERE cd_usuario='".$pscdusuario."'";
    $resultado = mysql_query($sql, $conexion);
    return $resultado;
  }

  /**
   *  PROCEDIMIENTO : consulta de algunos los registros de la tabla con410_usuario
   *  @param $pscdusuario - Clave del usuario
   *  @param $conexion - conexion a la base de datos
   *  @return $resultado
  */ 
  function getUsuarioBeans($pscdusuario, $conexion) {
    $sql = "SELECT cd_usuario, st_usuario, cd_password, nb_usuario, tx_email, nb_empresa";
    $sql.= " FROM  CON410_USUARIO";
    $sql.= " WHERE cd_usuario='".$pscdusuario."'";
    $resultado = mysql_query($sql, $conexion);
    return $resultado;
  }

  /**
   *  PROCEDIMIENTO : consulta de algunos los registros de la tabla con410_usuario
   *  @param $pscdusuario - Clave del usuario
   *  @param $pspassword - Contraseña del usuario
   *  @param $conexion - conexion a la base de datos
   *  @return $resultado
  */ 
  function getUsuarioBeanLogin($pscdusuario, $pspassword, $conexion) {
    $sql = "SELECT cd_usuario, st_usuario, cd_password, nb_usuario, tx_email, nb_empresa";
    $sql.= " FROM  CON410_USUARIO";
    $sql.= " WHERE cd_usuario='".$pscdusuario."'";
    $sql.= "    AND    cd_password='".$pspassword."'";
    $resultado = mysql_query($sql, $conexion);
    return $resultado;
  }
  
  /**
   * PROCEDIMIENTO : consulta de algunos los registros de la tabla con410_usuario en base a un criterio
   * @param $ocrit - criterios de consulta   
   * @param $conexion - conexion a la base de datos
   * @return $resultado
  */ 
  function getcUsuarioBeans($ocrit, $conexion) {
    $outil = new Utilerias();
    $swhere ="";

    $sql = "SELECT cd_usuario, st_usuario, cd_password, nb_usuario, tx_email, nb_empresa";
    $sql.= " FROM  CON410_USUARIO";
    /*     
    if($ocrit->hasinstitucion()) 
       $swhere = $outil->addToken($swhere, 
                     "cd_institucion='".$ocrit->getcdinstitucion()."'",
                       " AND ");
    if($ocrit->hasplantel()) 
       $swhere = $outil->addToken($swhere, 
                     "cd_plantel='".$ocrit->getcdplantel()."'",
                       " AND ");
    */    
    $resultado = mysql_query($sql, $conexion);
    return $resultado;
  }

  /**
   *  PROCEDIMIENTO: Procedimiento para seleccionar un registro de la tabla con420_perfil
   *  @param $pscdempresa - Clave de la empresa
   *  @param $pscdperfil - Clave del perfil
   *  @param $conexion - conexion a la base de datos
   *  @return $resultado
  */ 
  function getPerfilBean($pscdempresa, $pscdperfil, $conexion) {
    $sql = "SELECT cd_empresa, cd_perfil, st_perfil, nb_perfil";
    $sql.= " FROM  CON420_PERFIL";
    $sql.= " WHERE cd_empresa='".$pscdempresa."'";
    $sql.= " AND   cd_perfil='".$pscdperfil."'";
    $resultado = mysql_query($sql, $conexion);
    return $resultado;
  }

  /**
   *  PROCEDIMIENTO : consulta de algunos los registros de la tabla con420_perfil
   *  @param $pscdempresa - Clave de la empresa
   *  @param $pscdperfil - Clave del perfil
   *  @param $conexion - conexion a la base de datos
   *  @return $resultado
  */ 
  function getPerfilBeans($pscdempresa, $pscdperfil, $conexion) {
    $sql = "SELECT cd_empresa, cd_perfil, st_perfil, nb_perfil";
    $sql.= " FROM  CON420_PERFIL";
    $sql.= " WHERE cd_empresa='".$pscdempresa."'";
    $sql.= " AND   cd_perfil='".$pscdperfil."'";
    $resultado = mysql_query($sql, $conexion);
    return $resultado;
  }
  
  /**
   *  PROCEDIMIENTO: Procedimiento para seleccionar un registro de la tabla con430_perfilfuncion
   *  @param $pscdempresa - Clave de la empresa
   *  @param $pscdmodulo - Clave del modulo
   *  @param $pscdfuncion - Clave de la funcion
   *  @param $pscdperfil - Clave dcel perfil
   *  @param $conexion - conexion a la base de datos
   *  @return $resultado
  */ 
  function getPerfilfuncionBean($pscdempresa, $pscdmodulo, $pscdfuncion, $pscdperfil, $conexion) {
    $sql = "SELECT cd_empresa, cd_modulo, cd_funcion, cd_perfil, st_todo, st_consulta, st_agregar, st_modifica, st_elimina";
    $sql.= " FROM  CON430_PERFILFUNCION";
    $sql.= " WHERE cd_empresa='".$pscdempresa."'";
    $sql.= " AND   cd_modulo='".$pscdmodulo."'";
    $sql.= " AND   cd_funcion='".$pscdfuncion."'";
    $sql.= " AND   cd_perfil='".$pscdperfil."'";
    $resultado = mysql_query($sql, $conexion);
    return $resultado;
  }

  /**
   *  PROCEDIMIENTO : consulta de algunos los registros de la tabla con430_perfilfuncion
   *  @param $pscdempresa - Clave de la empresa
   *  @param $pscdmodulo - Clave del modulo
   *  @param $pscdfuncion - Clave de la funcion
   *  @param $pscdperfil - Clave dcel perfil
   *  @param $conexion - conexion a la base de datos
   *  @return $resultado
  */ 
  function getPerfilfuncionBeans($pscdempresa, $pscdmodulo, $pscdfuncion, $pscdperfil, $conexion) {
    $sql = "SELECT cd_empresa, cd_modulo, cd_funcion, cd_perfil, st_todo, st_consulta, st_agregar, st_modifica, st_elimina";
    $sql.= " FROM  CON430_PERFILFUNCION";
    $sql.= " WHERE cd_empresa='".$pscdempresa."'";
    $sql.= " AND   cd_modulo='".$pscdmodulo."'";
    $sql.= " AND   cd_funcion='".$pscdfuncion."'";
    $sql.= " AND   cd_perfil='".$pscdperfil."'";
    $resultado = mysql_query($sql, $conexion);
    return $resultado;
  }
  
  /**
   *  PROCEDIMIENTO: Procedimiento para seleccionar un registro de la tabla con440_funcion
   *  @param $pscdmodulo - Clave del modulo
   *  @param $pscdfuncion - Clave de la funcion
   *  @param $conexion - conexion a la base de datos
   *  @return $resultado
  */ 
  function getFuncionBean($pscdmodulo, $pscdfuncion, $conexion) {
    $sql = "SELECT cd_modulo, cd_funcion, nu_orden, id_ensistema, nb_label, nb_funcion, tx_url, tx_comment";
    $sql.= " FROM  CON440_FUNCION";
    $sql.= " WHERE cd_modulo='".$pscdmodulo."'";
    $sql.= " AND   cd_funcion='".$pscdfuncion."'";
    $resultado = mysql_query($sql, $conexion);
    return $resultado;
  }

  /**
   *  PROCEDIMIENTO : consulta de algunos los registros de la tabla con440_funcion
   *  @param $pscdmodulo - Clave del modulo
   *  @param $pscdfuncion - Clave de la funcion
   *  @param $conexion - conexion a la base de datos
   *  @return $resultado
  */ 
  function getFuncionBeans($pscdmodulo, $pscdfuncion, $conexion) {
    $sql = "SELECT cd_modulo, cd_funcion, nu_orden, id_ensistema, nb_label, nb_funcion, tx_url, tx_comment";
    $sql.= " FROM  CON440_FUNCION";
    $sql.= " WHERE cd_modulo='".$pscdmodulo."'";
    $sql.= " AND   cd_funcion='".$pscdfuncion."'";
    $resultado = mysql_query($sql, $conexion);
    return $resultado;
  }
  
  /**
   *  PROCEDIMIENTO: Procedimiento para seleccionar un registro de la tabla con450_modulo
   *  @param $pscdmodulo - Clave del modulo del sistema
   *  @param $conexion - conexion a la base de datos
   *  @return $resultado
  */ 
  function getModuloBean($pscdmodulo, $conexion) {
    $sql = "SELECT cd_modulo, id_ensistema, nb_label, nb_modulo, tx_comment";
    $sql.= " FROM  CON450_MODULO";
    $sql.= " WHERE cd_modulo='".$pscdmodulo."'";
    $resultado = mysql_query($sql, $conexion);
    return $resultado;
  }

  /**
   *  PROCEDIMIENTO : consulta de algunos los registros de la tabla con450_modulo
   *  @param $pscdmodulo - Clave del modulo del sistema
   *  @param $conexion - conexion a la base de datos
   *  @return $resultado
  */ 
  function getModuloBeans($pscdmodulo, $conexion) {
    $sql = "SELECT cd_modulo, id_ensistema, nb_label, nb_modulo, tx_comment";
    $sql.= " FROM  CON450_MODULO";
    $sql.= " WHERE cd_modulo='".$pscdmodulo."'";
    $resultado = mysql_query($sql, $conexion);
    return $resultado;
  }

  /**
   *  PROCEDIMIENTO : consulta de algunos los registros de la tabla con460_session
   *  @param $psession - Clave de la session del sistema
   *  @param $conexion - conexion a la base de datos
   *  @return $resultado
  */ 
  function getSessionBean($psession, $conexion) {
    $sql = "SELECT cd_session, cd_empresa, cd_perfil, cd_usuario, cd_ejercicio, fh_session";
    $sql.= " FROM  CON460_SESSION";
    $sql.= " WHERE cd_session ='".$psession."'";
    $resultado = mysql_query($sql, $conexion);
    return $resultado;
  }
  
  /**
   *  PROCEDIMIENTO: Procedimiento para contar los registros de una tabla con su condici?n
   *  @param $tabla - Nombre de la tabla
   *  @param $swhere - Condicion de la tabla
   *  @param $conexion - conexion a la base de datos
   *  @return $resultado
  */ 
  function getallCount($tabla, $swhere, $conexion) {
    $sql = "SELECT COUNT(*) AS num";
    $sql.= " FROM  ".$tabla."";
    if($swhere!="") 
       $sql.= " WHERE ".$swhere."";
    $resultado = mysql_query($sql, $conexion);
    return $resultado;
  }

//////////////////////////////////////////////////////////////////////////
//                           CONSECUTIVOS
//////////////////////////////////////////////////////////////////////////

  /**
   *  PROCEDIMIENTO: Procedimiento para consultar el ultimo id de la tabla con420_perfil
   *  @param $conexion - conexion a la base de datos
   *  @return $resultado
  */ 
  function getlastPerfilBeancd_perfil($conexion) {
    $swhere ="";
    $sql = "SELECT MAX(cd_perfil)";
    $sql.= " FROM  CON420_PERFIL";
    $resultado = mysql_query($sql, $conexion);
    return $resultado;
  }

  /**
   *  PROCEDIMIENTO: Procedimiento para consultar el ultimo id de la tabla con440_funcion
   *  @param $conexion - conexion a la base de datos
   *  @return $resultado
  */ 
  function getlastFuncionBeancd_funcion($conexion) {
    $swhere ="";
    $sql = "SELECT MAX(cd_funcion)";
    $sql.= " FROM  CON440_FUNCION";
    $resultado = mysql_query($sql, $conexion);
    return $resultado;
  }

  /**
   *  PROCEDIMIENTO: Procedimiento para consultar el ultimo id de la tabla con450_modulo
   *  @param $conexion - conexion a la base de datos
   *  @return $resultado
  */ 
  function getlastModuloBeancd_modulo($conexion) {
    $swhere ="";
    $sql = "SELECT MAX(cd_modulo)";
    $sql.= " FROM  CON450_MODULO";
    $resultado = mysql_query($sql, $conexion);
    return $resultado;
  }

//////////////////////////////////////////////////////////////////////////
//                           INSERT CODE
//////////////////////////////////////////////////////////////////////////
  /**
   * PROCEDIMIENTO : inserta un registro nuevo en tabla con400_usuario_empresa
   * @param $oadd - objeto tipo UsuarioEmpresaBean a insertar
   * @param $conexion - conexion a la base de datos
   * @return true / false
  */
  function addUsuarioEmpresaBean($oadd, $conexion) {
    
      $sql = "INSERT INTO CON400_USUARIO_EMPRESA";
      $sql.= "(cd_empresa, cd_usuario, st_usuario_empresa, cd_perfil, tx_comment)";
      $sql.= " VALUES ('".$oadd->getcdempresa()."','".$oadd->getcdusuario()."','".$oadd->getstusuarioempresa()."','".$oadd->getcdperfil()."','".$oadd->gettxcomment()."')";
      $resultado = mysql_query($sql, $conexion); 
      return $resultado;
    }

  /**
   * PROCEDIMIENTO : inserta un registro nuevo en tabla con410_usuario
   * @param $oadd - objeto tipo UsuarioBean a insertar
   * @param $conexion - conexion a la base de datos
   * @return true / false
  */
  function addUsuarioBean($oadd, $conexion) {
    
      $sql = "INSERT INTO CON410_USUARIO";
      $sql.= "(cd_usuario, st_usuario, cd_password, nb_usuario, tx_email, nb_empresa)";
      $sql.= " VALUES ('".$oadd->getcdusuario()."','".$oadd->getstusuario()."','".$oadd->getcdpassword()."','".$oadd->getnbusuario()."','".$oadd->gettxemail()."','".$oadd->getnbempresa()."')";
      $resultado = mysql_query($sql, $conexion); 
      return $resultado;
    }

  /**
   * PROCEDIMIENTO : inserta un registro nuevo en tabla con420_perfil
   * @param $oadd - objeto tipo PerfilBean a insertar
   * @param $conexion - conexion a la base de datos
   * @return true / false
  */
  function addPerfilBean($oadd, $conexion) {
    
      $sql = "INSERT INTO CON420_PERFIL";
      $sql.= "(cd_empresa, cd_perfil, st_perfil, nb_perfil)";
      $sql.= " VALUES ('".$oadd->getcdempresa()."','".$oadd->getcdperfil()."','".$oadd->getstperfil()."','".$oadd->getnbperfil()."')";
      $resultado = mysql_query($sql, $conexion); 
      return $resultado;
    }

  /**
   * PROCEDIMIENTO : inserta un registro nuevo en tabla con430_perfilfuncion
   * @param $oadd - objeto tipo PerfilfuncionBean a insertar
   * @param $conexion - conexion a la base de datos
   * @return true / false
  */
  function addPerfilfuncionBean($oadd, $conexion) {
    
      $sql = "INSERT INTO CON430_PERFILFUNCION";
      $sql.= "(cd_empresa, cd_modulo, cd_funcion, cd_perfil, st_todo, st_consulta, st_agregar, st_modifica, st_elimina)";
      $sql.= " VALUES ('".$oadd->getcdempresa()."','".$oadd->getcdmodulo()."','".$oadd->getcdfuncion()."','".$oadd->getcdperfil()."','".$oadd->getsttodo()."','".$oadd->getstconsulta()."','".$oadd->getstagregar()."','".$oadd->getstmodifica()."','".$oadd->getstelimina()."')";
      $resultado = mysql_query($sql, $conexion); 
      return $resultado;
    }

  /**
   * PROCEDIMIENTO : inserta un registro nuevo en tabla con440_funcion
   * @param $oadd - objeto tipo FuncionBean a insertar
   * @param $conexion - conexion a la base de datos
   * @return true / false
  */
  function addFuncionBean($oadd, $conexion) {
    
      $sql = "INSERT INTO CON440_FUNCION";
      $sql.= "(cd_modulo, cd_funcion, nu_orden, id_ensistema, nb_label, nb_funcion, tx_url, tx_comment)";
      $sql.= " VALUES ('".$oadd->getcdmodulo()."','".$oadd->getcdfuncion()."','".$oadd->getnuorden()."','".$oadd->getidensistema()."','".$oadd->getnblabel()."','".$oadd->getnbfuncion()."','".$oadd->gettxurl()."','".$oadd->gettxcomment()."')";
      $resultado = mysql_query($sql, $conexion); 
      return $resultado;
    }

  /**
   * PROCEDIMIENTO : inserta un registro nuevo en tabla con450_modulo
   * @param $oadd - objeto tipo ModuloBean a insertar
   * @param $conexion - conexion a la base de datos
   * @return true / false
  */
  function addModuloBean($oadd, $conexion) {
      $sql = "INSERT INTO CON450_MODULO";
      $sql.= "(cd_modulo, id_ensistema, nb_label, nb_modulo, tx_comment)";
      $sql.= " VALUES ('".$oadd->getcdmodulo()."','".$oadd->getidensistema()."','".$oadd->getnblabel()."','".$oadd->getnbmodulo()."','".$oadd->gettxcomment()."')";
      $resultado = mysql_query($sql, $conexion); 
      return $resultado;
    }

  /**
   * PROCEDIMIENTO : Alta de un objeto tipo SessionBean
   * @param $oadd - objeto SessionBean a dar de alta
   * @param $conexion - conexion a la base de datos
   * @return true / false
   */
  function addSessionBean($oadd, $conexion) {
      $sql = "INSERT INTO CON460_SESSION";
      $sql.= "(cd_session, cd_empresa, cd_perfil, cd_usuario, cd_ejercicio, fh_session)";
      $sql.= " VALUES ('".$oadd->getcdsession()."','".$oadd->getcdempresa()."','".$oadd->getcdperfil()."','".$oadd->getcdusuario()."','".$oadd->getcdejercicio()."', sysdate())";
      $resultado = mysql_query($sql, $conexion); 
      return $resultado;
  }


//////////////////////////////////////////////////////////////////////////
//                           UPDATE CODE
//////////////////////////////////////////////////////////////////////////

  /**
   * PROCEDIMIENTO : actualizacion de un registro de la tabla con400_usuario_empresa
   * @param $oupd - objeto tipo UsuarioEmpresaBean a actualizar
   * @param $conexion - conexion a la base de datos
   * @return true / false
  */
  function updUsuarioEmpresaBean($oupd, $conexion) {
    
    $sql = "UPDATE CON400_USUARIO_EMPRESA";
    $sql.= " SET st_usuario_empresa= '".$oupd->getstusuarioempresa()."'";
    $sql.= ",cd_perfil= '".$oupd->getcdperfil()."'";
    $sql.= ",tx_comment= '".$oupd->gettxcomment()."'";
    $sql.= " WHERE cd_empresa='".$oupd->getcdempresa()."'";
       $sql.= " AND   cd_usuario='".$oupd->getcdusuario()."'";
    $resultado = mysql_query($sql, $conexion); 
    return $resultado;
  }

  /**
   * PROCEDIMIENTO : actualizacion de un registro de la tabla con410_usuario
   * @param $oupd - objeto tipo UsuarioBean a actualizar
   * @param $conexion - conexion a la base de datos
   * @return true / false
  */
  function updUsuarioBean($oupd, $conexion) {
    
    $sql = "UPDATE CON410_USUARIO";
    $sql.= " SET st_usuario= '".$oupd->getstusuario()."'";
    $sql.= ",cd_password= '".$oupd->getcdpassword()."'";
    $sql.= ",nb_usuario= '".$oupd->getnbusuario()."'";
    $sql.= ",tx_email= '".$oupd->gettxemail()."'";
    $sql.= ",nb_empresa= '".$oupd->getnbempresa()."'";
    $sql.= " WHERE cd_usuario='".$oupd->getcdusuario()."'";
    $resultado = mysql_query($sql, $conexion); 
    return $resultado;
  }

  /**
   * PROCEDIMIENTO : actualizacion de un registro de la tabla con420_perfil
   * @param $oupd - objeto tipo PerfilBean a actualizar
   * @param $conexion - conexion a la base de datos
   * @return true / false
  */
  function updPerfilBean($oupd, $conexion) {
    
    $sql = "UPDATE CON420_PERFIL";
    $sql.= " SET st_perfil= '".$oupd->getstperfil()."'";
    $sql.= ",nb_perfil= '".$oupd->getnbperfil()."'";
    $sql.= " WHERE cd_empresa='".$oupd->getcdempresa()."'";
       $sql.= " AND   cd_perfil='".$oupd->getcdperfil()."'";
    $resultado = mysql_query($sql, $conexion); 
    return $resultado;
  }

  /**
   * PROCEDIMIENTO : actualizacion de un registro de la tabla con430_perfilfuncion
   * @param $oupd - objeto tipo PerfilfuncionBean a actualizar
   * @param $conexion - conexion a la base de datos
   * @return true / false
  */
  function updPerfilfuncionBean($oupd, $conexion) {
    
    $sql = "UPDATE CON430_PERFILFUNCION";
    $sql.= " SET st_todo= '".$oupd->getsttodo()."'";
    $sql.= ",st_consulta= '".$oupd->getstconsulta()."'";
    $sql.= ",st_agregar= '".$oupd->getstagregar()."'";
    $sql.= ",st_modifica= '".$oupd->getstmodifica()."'";
    $sql.= ",st_elimina= '".$oupd->getstelimina()."'";
    $sql.= " WHERE cd_empresa='".$oupd->getcdempresa()."'";
    $sql.= " AND   cd_modulo='".$oupd->getcdmodulo()."'";
    $sql.= " AND   cd_funcion='".$oupd->getcdfuncion()."'";
    $sql.= " AND   cd_perfil='".$oupd->getcdperfil()."'";
    $resultado = mysql_query($sql, $conexion); 
    return $resultado;
  }

  /**
   * PROCEDIMIENTO : actualizacion de un registro de la tabla con440_funcion
   * @param $oupd - objeto tipo FuncionBean a actualizar
   * @param $conexion - conexion a la base de datos
   * @return true / false
  */
  function updFuncionBean($oupd, $conexion) {
    
    $sql = "UPDATE CON440_FUNCION";
    $sql.= " SET nu_orden= '".$oupd->getnuorden()."'";
    $sql.= ",id_ensistema= '".$oupd->getidensistema()."'";
    $sql.= ",nb_label= '".$oupd->getnblabel()."'";
    $sql.= ",nb_funcion= '".$oupd->getnbfuncion()."'";
    $sql.= ",tx_url= '".$oupd->gettxurl()."'";
    $sql.= ",tx_comment= '".$oupd->gettxcomment()."'";
    $sql.= " WHERE cd_modulo='".$oupd->getcdmodulo()."'";
       $sql.= " AND   cd_funcion='".$oupd->getcdfuncion()."'";
    $resultado = mysql_query($sql, $conexion); 
    return $resultado;
  }

  /**
   * PROCEDIMIENTO : actualizacion de un registro de la tabla con450_modulo
   * @param $oupd - objeto tipo ModuloBean a actualizar
   * @param $conexion - conexion a la base de datos
   * @return true / false
  */
  function updModuloBean($oupd, $conexion) {
    
    $sql = "UPDATE CON450_MODULO";
    $sql.= " SET id_ensistema= '".$oupd->getidensistema()."'";
    $sql.= ",nb_label= '".$oupd->getnblabel()."'";
    $sql.= ",nb_modulo= '".$oupd->getnbmodulo()."'";
    $sql.= ",tx_comment= '".$oupd->gettxcomment()."'";
    $sql.= " WHERE cd_modulo='".$oupd->getcdmodulo()."'";
    $resultado = mysql_query($sql, $conexion); 
    return $resultado;
  }


//////////////////////////////////////////////////////////////////////////
//                           DELETE CODE
//////////////////////////////////////////////////////////////////////////

  /**
   * PROCEDIMIENTO : elimina un registro de la tabla con400_usuario_empresa
   * @param $odel - objeto tipo UsuarioEmpresaBean a eliminar
   * @param $conexion - conexion a la base de datos   
   * @return true / false
  */
  function delUsuarioEmpresaBean($odel, $conexion) {
    $sql = "DELETE FROM CON400_USUARIO_EMPRESA";
    $sql.= " WHERE cd_empresa='".$odel->getcdempresa()."'";
          $sql.= " AND   cd_usuario='".$odel->getcdusuario()."'";
    $resultado = mysql_query($sql, $conexion); 
    return $resultado;
  }

  /**
   * PROCEDIMIENTO : elimina un registro de la tabla con410_usuario
   * @param  $pscdusuario - Clave del usuario
   * @param $conexion - conexion a la base de datos
   * @return true / false
  */
  function delUsuarioBean_key($pscdusuario, $conexion) {
    $sql = "DELETE FROM CON410_USUARIO";
    $sql.= " WHERE cd_usuario='".$pscdusuario."'";
    $resultado = mysql_query($sql, $conexion); 
    return $resultado;
  }

  /**
   * PROCEDIMIENTO : elimina un registro de la tabla con420_perfil
   * @param $odel - objeto tipo PerfilBean a eliminar
   * @param $conexion - conexion a la base de datos   
   * @return true / false
  */
  function delPerfilBean($odel, $conexion) {
    $sql = "DELETE FROM CON420_PERFIL";
    $sql.= " WHERE cd_empresa='".$odel->getcdempresa()."'";
          $sql.= " AND   cd_perfil='".$odel->getcdperfil()."'";
    $resultado = mysql_query($sql, $conexion); 
    return $resultado;
  }

  /**
   * PROCEDIMIENTO : elimina un registro de la tabla con440_funcion
   * @param  $pscdmodulo - Clave del modulo
   * @param  $pscdfuncion - Clave de la funcion
   * @param $conexion - conexion a la base de datos
   * @return true / false
  */
  function delFuncionBean_key($pscdmodulo, $pscdfuncion, $conexion) {
    $sql = "DELETE FROM CON440_FUNCION";
    $sql.= " WHERE cd_modulo='".$pscdmodulo."'";
    $sql.= " AND   cd_funcion='".$pscdfuncion."'";
    $resultado = mysql_query($sql, $conexion); 
    return $resultado;
  }

  /**
   * PROCEDIMIENTO : elimina un registro de la tabla con450_modulo
   * @param  $pscdmodulo - Clave del modulo del sistema
   * @param $conexion - conexion a la base de datos
   * @return true / false
  */
  function delModuloBean_key($pscdmodulo, $conexion) {
    $sql = "DELETE FROM CON450_MODULO";
    $sql.= " WHERE cd_modulo='".$pscdmodulo."'";
    $resultado = mysql_query($sql, $conexion); 
    return $resultado;
  }

  /**
   * PROCEDIMIENTO : elimina las sessiones atrasadas de la tabla CON460_SESSION
   * @param $conexion - conexion a la base de datos
   * @return true / false
  */
  function clearSessionBeans($conexion) {
    $sql = "DELETE FROM CON460_SESSION";
    $sql.= " WHERE fh_session < CURDATE()";
    $resultado = mysql_query($sql, $conexion); 
    return $resultado;
  }

  /**
   * PROCEDIMIENTO : Termina una sesion del usuario
   * @param $psession - Clave de la sesion del sistema
   * @param $conexion - conexion a la base de datos
   * @return true / false
   */
  function terminasesion($psession, $conexion) {
    $sql = "DELETE FROM CON460_SESSION";
    $sql.= " WHERE cd_session='".$psession."'";
    $resultado = mysql_query($sql, $conexion); 
    return $resultado;
  }  

} /* fin clase [DBSeguridad]  */

?>

<?php
require_once("../comun/CriterioBean.php");
require_once("../util/Utilerias.php"); 

/**
 * @name: DBGeneral
 * Descripcion: 
 * Clase de acceso a la base de datos para el proyecto
 * @creation date: (02-Julio-2010)
 * @author Ruben Murga Tapia
 * @conpany: HANYGEN SOFTWARE S.A. DE C.V.
 */
class DBGeneral {
  var $resultado;
  
  /**
   * CONSTRUCTOR
  */
  function DBGeneral() {
  }

//////////////////////////////////////////////////////////////////////////
//                           SELECT CODE
//////////////////////////////////////////////////////////////////////////

  /**
   *  PROCEDIMIENTO: Procedimiento para seleccionar un registro de la tabla con100_empresa
   *  @param $pscdempresa - Clave de la empresa
   *  @param $conexion - conexion a la base de datos
   *  @return $resultado
  */ 
  function getEmpresaBean($pscdempresa, $conexion) {
    $sql = "SELECT cd_empresa, cd_pais, st_empresa, po_iva, cd_rfc, nu_telefono, nb_empresa, tx_direccion";
    $sql.= " FROM  CON100_EMPRESA";
    $sql.= " WHERE cd_empresa='".$pscdempresa."'";
    $resultado = mysql_query($sql, $conexion);
    if($resultado==false) {
       echo "DBGeneral->getEmpresaBean() - ERROR: [" . mysql_error() . "] SQL [" .$sql. "]"; 
    }
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
    if($resultado==false) {
       echo "DBGeneral->getEjercicioBean() - ERROR: [" . mysql_error() . "] SQL [" .$sql. "]"; 
    }
    return $resultado;
  }

  /**
   * PROCEDIMIENTO : consulta de algunos los registros de la tabla con110_ejercicio en base a un criterio
   * @param $conexion - conexion a la base de datos
   * @return $resultado
  */ 
  function getEjercicioBeans($conexion) {
    $sql = "SELECT cd_empresa, cd_ejercicio, st_ejercicio, fh_inicio, fh_termino";
    $sql.= " FROM  CON110_EJERCICIO";
    $resultado = mysql_query($sql, $conexion);
    if($resultado==false) {
       echo "DBGeneral->getEjercicioBeans() - ERROR: [" . mysql_error() . "] SQL [" .$sql. "]"; 
    }
    return $resultado;
  }

  /**
   *  PROCEDIMIENTO: Procedimiento para seleccionar un registro de la tabla con120_parametro
   *  @param $pscdempresa - Clave de la empresa
   *  @param $pscdparametro - Clave del parametro
   *  @param $conexion - conexion a la base de datos
   *  @return $resultado
  */ 
  function getParametroBean($pscdempresa, $pscdparametro, $conexion) {
    $sql = "SELECT cd_empresa, cd_parametro, st_parametro, nb_paramero, tx_valor";
    $sql.= " FROM  CON120_PARAMETRO";
    $sql.= " WHERE cd_empresa='".$pscdempresa."'";
    $sql.= " AND   cd_parametro='".$pscdparametro."'";
    $resultado = mysql_query($sql, $conexion);
    if($resultado==false) {
       echo "DBGeneral->getParametroBean() - ERROR: [" . mysql_error() . "] SQL [" .$sql. "]"; 
    }
    return $resultado;
  }

  /**
   *  PROCEDIMIENTO: Procedimiento para seleccionar un registro de la tabla con130_mes
   *  @param $pscdempresa - Clave de la empresa
   *  @param $pscdejercicio - Clave del ejercicio fiscal
   *  @param $psnumes - Numero de mes
   *  @param $conexion - conexion a la base de datos
   *  @return $resultado
  */ 
  function getMesBean($pscdempresa, $pscdejercicio, $psnumes, $conexion) {
    $sql = "SELECT cd_empresa, cd_ejercicio, nu_mes, st_corte, cd_usuario, nb_mes";
    $sql.= " FROM  CON130_MES";
    $sql.= " WHERE cd_empresa='".$pscdempresa."'";
    $sql.= " AND   cd_ejercicio='".$pscdejercicio."'";
    $sql.= " AND   nu_mes='".$psnumes."'";
    $resultado = mysql_query($sql, $conexion);
    if($resultado==false) {
       echo "DBGeneral->getMesBean() - ERROR: [" . mysql_error() . "] SQL [" .$sql. "]"; 
    }
    return $resultado;
  }

  /**
   * PROCEDIMIENTO : consulta de algunos los registros de la tabla con130_mes en base a un criterio
   *  @param $pscdempresa - Clave de la empresa
   *  @param $pscdejercicio - Clave del ejercicio fiscal
   * @param $conexion - conexion a la base de datos
   * @return $resultado
  */ 
  function getMesBeans($pscdempresa, $pscdejercicio, $conexion) {
    $sql = "SELECT cd_empresa, cd_ejercicio, nu_mes, st_corte, cd_usuario, nb_mes";
    $sql.= " FROM  CON130_MES";
    $sql.= " WHERE cd_empresa='".$pscdempresa."'";
    $sql.= " AND   cd_ejercicio='".$pscdejercicio."'";
    $resultado = mysql_query($sql, $conexion);
    if($resultado==false) {
       echo "DBGeneral->getMesBeans() - ERROR: [" . mysql_error() . "] SQL [" .$sql. "]"; 
    }
    return $resultado;
  }

  /**
   *  PROCEDIMIENTO: Procedimiento para seleccionar un registro de la tabla con140_saldo
   *  @param $pscdempresa - Clave de la empresa
   *  @param $pscdejercicio - Clave del ejercicio fiscal
   *  @param $psnumes - Mes en el que se procesa la poliza
   *  @param $picdcuenta - Numero de cuenta contable
   *  @param $conexion - conexion a la base de datos
   *  @return $resultado
  */ 
  function getSaldoBean($pscdempresa, $pscdejercicio, $psnumes, $picdcuenta, $conexion) {
    $sql = "SELECT cd_empresa, cd_ejercicio, nu_mes, cd_cuenta, st_saldo, cd_usuario_act, fh_actualizado, cd_ctageneral, im_debe_actual, im_haber_actual, im_debe_inicial, im_haber_inicial, to_debe_movtos, to_haber_movtos, tx_comment";
    $sql.= " FROM  CON140_SALDO";
    $sql.= " WHERE cd_empresa='".$pscdempresa."'";
    $sql.= " AND   cd_ejercicio='".$pscdejercicio."'";
    $sql.= " AND   nu_mes='".$psnumes."'";
    $sql.= " AND   cd_cuenta=".$picdcuenta."";
    $resultado = mysql_query($sql, $conexion);
    if($resultado==false) {
       echo "DBGeneral->getSaldoBean() - ERROR: [" . mysql_error() . "] SQL [" .$sql. "]"; 
    }
    return $resultado;
  }

  /**
   * PROCEDIMIENTO : consulta de algunos los registros de la tabla con140_saldo en base a un criterio
   * @param $ocrit - criterios de consulta   
   * @param $conexion - conexion a la base de datos
   * @return $resultado
  */ 
  function getcSaldoBeans($ocrit, $conexion) {
    $sql = "SELECT cd_empresa, cd_ejercicio, nu_mes, cd_cuenta, st_saldo, cd_usuario_act, fh_actualizado, cd_ctageneral, im_debe_actual, im_haber_actual, im_debe_inicial, im_haber_inicial, to_debe_movtos, to_haber_movtos, tx_comment";
    $sql.= " FROM  CON140_SALDO";
    $sql.= " WHERE cd_empresa='".$ocrit->getcdempresa()."'";
    $sql.= "    AND    cd_ejercicio='".$ocrit->getcdejercicio()."'";
    if($ocrit->getnumes()!='') 
      $sql.= "    AND    nu_mes='".$ocrit->getnumes()."'";
    if($ocrit->getcdcuentas()!='')
      $sql.= "    AND    cd_cuenta IN (".$ocrit->getcdcuentas().")";
    $resultado = mysql_query($sql, $conexion);
    if($resultado==false) {
       echo "DBGeneral->getcSaldoBeans() - ERROR: [" . mysql_error() . "] SQL [" .$sql. "]"; 
    }
    return $resultado;
  }

  /**
   *  PROCEDIMIENTO: Procedimiento para seleccionar un registro de la tabla con150_cuenta
   *  @param $pscdempresa - Clave de la empresa a la que pertenece la cuenta contable
   *  @param $pscdejercicio - Clave del ejercicio fiscal al que pertenece la cuenta contable
   *  @param $picdcuenta - Clave interna de la cuenta contable
   *  @param $conexion - conexion a la base de datos
   *  @return $resultado
  */ 
  function getCuentaBean($pscdempresa, $pscdejercicio, $picdcuenta, $conexion) {
    $sql = "SELECT cd_empresa, cd_ejercicio, cd_cuenta, nu_nivel, st_cuenta, tp_naturaleza, tp_cuenta, nu_cuenta, nb_cuenta, tx_comment, cd_ctageneral, cd_ctacierre";
    $sql.= " FROM  CON150_CUENTA";
    $sql.= " WHERE cd_empresa='".$pscdempresa."'";
    $sql.= " AND   cd_ejercicio='".$pscdejercicio."'";
    $sql.= " AND   cd_cuenta=".$picdcuenta."";
    $resultado = mysql_query($sql, $conexion);
    if($resultado==false) {
       echo "DBGeneral->getCuentaBean() - ERROR: [" . mysql_error() . "] SQL [" .$sql. "]"; 
    }
    return $resultado;
  }

  /**
   * PROCEDIMIENTO : consulta de algunos los registros de la tabla con150_cuenta en base a un criterio
   * @param $ocrit - criterios de consulta   
   * @param $conexion - conexion a la base de datos
   * @return $resultado
  */ 
  function getcCuentaBeans($ocrit, $conexion) {
    $outil = new Utilerias();
    $swhere ="";
    $sql = "SELECT cd_empresa, cd_ejercicio, cd_cuenta, nu_nivel, st_cuenta, tp_naturaleza, tp_cuenta, nu_cuenta, nb_cuenta, tx_comment, cd_ctageneral, cd_ctacierre";
    $sql.= " FROM  CON150_CUENTA";
    if($ocrit->getcdempresa()!='') 
       $swhere = $outil->addToken($swhere, 
                     "cd_empresa='".$ocrit->getcdempresa()."'",
                       " AND ");
    if($ocrit->getcdejercicio()!='') 
       $swhere = $outil->addToken($swhere, 
                     "cd_ejercicio='".$ocrit->getcdejercicio()."'",
                       " AND ");
    if($ocrit->getstcuenta()!='') 
       $swhere = $outil->addToken($swhere, 
                     "st_cuenta='".$ocrit->getstcuenta()."'",
                       " AND ");
    if($ocrit->gettpcuenta()!='') 
       $swhere = $outil->addToken($swhere, 
                     "tp_cuenta='".$ocrit->gettpcuenta()."'",
                       " AND ");
    if($ocrit->getcuentaini()!='')
       $swhere = $outil->addToken($swhere, " nu_cuenta BETWEEN '".$ocrit->getcuentaini()."' AND '".$ocrit->getcuentafin()."'", " AND ");
    if($swhere!='') $sql.=" WHERE ".$swhere;
    $sql.= " ORDER BY cd_empresa, nu_cuenta";
    $resultado = mysql_query($sql, $conexion);
    if($resultado==false) {
       echo "DBGeneral->getcCuentaBeans() - ERROR: [" . mysql_error() . "] SQL [" .$sql. "]"; 
    }
    return $resultado;
  }

  /**
   *  PROCEDIMIENTO: Procedimiento para seleccionar un registro de la tabla con160_poliza
   *  @param $pscdempresa - Clave de la empresa
   *  @param $pscdejercicio - Clave del ejercicio fiscal
   *  @param $picdpoliza - Clave de la poliza contable
   *  @param $conexion - conexion a la base de datos
   *  @return $resultado
  */ 
  function getPolizaBean($pscdempresa, $pscdejercicio, $picdpoliza, $conexion) {
    $sql = "SELECT cd_empresa, cd_ejercicio, cd_poliza, nu_mes, st_poliza, cd_tpoliza, cd_tpago, fh_creada, fh_actualizada, cd_usuario_creo, cd_usuario_act, nb_poliza, lk_poliza, tx_comment";
    $sql.= " FROM  CON160_POLIZA";
    $sql.= " WHERE cd_empresa='".$pscdempresa."'";
    $sql.= " AND   cd_ejercicio='".$pscdejercicio."'";
    $sql.= " AND   cd_poliza=".$picdpoliza."";
    $resultado = mysql_query($sql, $conexion);
    if($resultado==false) {
       echo "DBGeneral->getPolizaBean() - ERROR: [" . mysql_error() . "] SQL [" .$sql. "]"; 
    }
    return $resultado;
  }

  /**
   * PROCEDIMIENTO : consulta de algunos los registros de la tabla con160_poliza en base a un criterio
   * @param $ocrit - criterios de consulta   
   * @param $conexion - conexion a la base de datos
   * @return $resultado
  */ 
  function getPolizaBeans($ocrit, $conexion) {
    $outil = new Utilerias();
    $swhere ="";
    $sql = "SELECT cd_empresa, cd_ejercicio, cd_poliza, nu_mes, st_poliza, cd_tpoliza, cd_tpago, fh_creada, fh_actualizada, cd_usuario_creo, cd_usuario_act, nb_poliza, lk_poliza, tx_comment";
    $sql.= " FROM  CON160_POLIZA";
    if($ocrit->getcdempresa()!='') 
       $swhere = $outil->addToken($swhere, 
                     "cd_empresa='".$ocrit->getcdempresa()."'",
                       " AND ");
    if($ocrit->getcdejercicio()!='') 
       $swhere = $outil->addToken($swhere, 
                     "cd_ejercicio='".$ocrit->getcdejercicio()."'",
                       " AND ");
    if($ocrit->getnumes()!='') 
       $swhere = $outil->addToken($swhere, 
                     "nu_mes='".$ocrit->getnumes()."'",
                       " AND ");
    if($ocrit->getstpoliza()!='') 
       $swhere = $outil->addToken($swhere, 
                     "st_poliza='".$ocrit->getstpoliza()."'",
                       " AND ");
    if($ocrit->getcdtpoliza()!='') 
       $swhere = $outil->addToken($swhere, 
                     "cd_tpoliza='".$ocrit->getcdtpoliza()."'",
                       " AND ");
    if($swhere!='') $sql.= " WHERE ".$swhere;
    $resultado = mysql_query($sql, $conexion);
    if($resultado==false) {
       echo "DBGeneral->getPolizaBeans() - ERROR: [" . mysql_error() . "] SQL [" .$sql. "]"; 
    }
    return $resultado;
  }

  /**
   * PROCEDIMIENTO : consulta de algunos los registros de la tabla con160_poliza para reporte 
                                   de diario de movimientos en base a un criterio
   * @param $ocrit - criterios de consulta   
   * @param $conexion - conexion a la base de datos
   * @return $resultado
  */ 
  function getDiarioMovtos($ocrit, $conexion) {
    $sql = "SELECT cd_empresa, cd_ejercicio, cd_poliza, nu_mes, st_poliza, cd_tpoliza, cd_tpago, fh_creada, fh_actualizada, cd_usuario_creo, cd_usuario_act, nb_poliza, lk_poliza, tx_comment";
    $sql.= " FROM  CON160_POLIZA";
    $sql.= " WHERE cd_empresa='".$ocrit->getcdempresa()."'";
    $sql.= "    AND    cd_ejercicio='".$ocrit->getcdejercicio()."'";
    if($ocrit->getfecha()!='') 
      $sql.= "    AND    fh_creada='".$ocrit->getfecha()."'";
    if($ocrit->getnumes()!='') 
      $sql.= "    AND    nu_mes='".$ocrit->getnumes()."'";
    if($ocrit->getcdcuentas()!='')
    $sql.= "    AND    cd_poliza IN (SELECT cd_poliza FROM CON170_MOVIMIENTO WHERE cd_empresa='".$ocrit->getcdempresa()."' AND cd_ejercicio='".$ocrit->getcdejercicio()."' AND cd_cuenta  IN (".$ocrit->getcdcuentas()."))";
    $sql.= "    ORDER BY fh_creada";
    $resultado = mysql_query($sql, $conexion);
    if($resultado==false) {
       echo "DBGeneral->getDiarioMovtos() - ERROR: [" . mysql_error() . "] SQL [" .$sql. "]"; 
    }
    return $resultado;
  }

  /**
   *  PROCEDIMIENTO: Procedimiento para seleccionar un registro de la tabla con170_movimiento
   *  @param $pscdempresa - Clave de la empresa
   *  @param $pscdejercicio - Clave del ejercicio fiscal
   *  @param $picdpoliza - Clave de la poliza contable
   *  @param $picdmovimiento - Clave del movimiento contable
   *  @param $conexion - conexion a la base de datos
   *  @return $resultado
  */ 
  function getMovimientoBean($pscdempresa, $pscdejercicio, $picdpoliza, $picdmovimiento, $conexion) {
    $sql = "SELECT cd_empresa, cd_ejercicio, cd_poliza, cd_movimiento, nu_mes, st_movimiento, st_actualizado, cd_concepto, cd_tpcomprobante, cd_cuenta, fh_creado, fh_actualizado, im_parcial, im_debe, im_haber, nu_coprobante, nb_movimiento, lk_comprobante, tx_comment";
    $sql.= " FROM  CON170_MOVIMIENTO";
    $sql.= " WHERE cd_empresa='".$pscdempresa."'";
    $sql.= " AND   cd_ejercicio='".$pscdejercicio."'";
    $sql.= " AND   cd_poliza=".$picdpoliza."";
    $sql.= " AND   cd_movimiento=".$picdmovimiento."";
    $resultado = mysql_query($sql, $conexion);
    if($resultado==false) {
       echo "DBGeneral->getMovimientoBean() - ERROR: [" . mysql_error() . "] SQL [" .$sql. "]"; 
    }
    return $resultado;
  }

  /**
   * PROCEDIMIENTO : consulta de algunos los registros de la tabla con170_movimiento en base a un criterio
   * @param $ocrit - criterios de consulta   
   * @param $conexion - conexion a la base de datos
   * @return $resultado
  */ 
  function getMovimientoBeans($ocrit, $conexion) {
    $outil = new Utilerias();
    $swhere ="";

    $sql = "SELECT cd_empresa, cd_ejercicio, cd_poliza, cd_movimiento, nu_mes, st_movimiento, st_actualizado, cd_concepto, cd_tpcomprobante, cd_cuenta, fh_creado, fh_actualizado, im_parcial, im_debe, im_haber, nu_coprobante, nb_movimiento, lk_comprobante, tx_comment";
    $sql.= " FROM  CON170_MOVIMIENTO";
    if($ocrit->getcdempresa()!='') 
       $swhere = $outil->addToken($swhere, 
                     "cd_empresa='".$ocrit->getcdempresa()."'",
                       " AND ");
    if($ocrit->getcdejercicio()!='') 
       $swhere = $outil->addToken($swhere, 
                     "cd_ejercicio='".$ocrit->getcdejercicio()."'",
                       " AND ");
    if($ocrit->getcdpoliza()!='') 
       $swhere = $outil->addToken($swhere, 
                     "cd_poliza='".$ocrit->getcdpoliza()."'",
                       " AND ");
    if($ocrit->getstactualizado()!='') 
       $swhere = $outil->addToken($swhere, 
                     "st_actualizado='".$ocrit->getstactualizado()."'",
                       " AND ");
    if($ocrit->getcdcuenta()!='') 
       $swhere = $outil->addToken($swhere, 
                     "cd_cuenta=".$ocrit->getcdcuenta(),
                       " AND ");
    if($ocrit->getnumes()!='') 
       $swhere = $outil->addToken($swhere, 
                     "nu_mes='".$ocrit->getnumes()."'",
                       " AND ");
    if($swhere!='') $sql.= " WHERE ".$swhere;
    $resultado = mysql_query($sql, $conexion);
    if($resultado==false) {
       echo "DBGeneral->getMovimientoBeans() - ERROR: [" . mysql_error() . "] SQL [" .$sql. "]"; 
    }
    return $resultado;
  }

  /**
   *  PROCEDIMIENTO : consulta de algunos los registros de la tabla con020_tpoliza
   *  @param $pscdpais - Clave del pais
   *  @param $conexion - conexion a la base de datos
   *  @return $resultado
  */ 
  function getTpolizaBeans($pscdpais, $conexion) {
    $sql = "SELECT cd_tpoliza, st_tpoliza, cd_pais, nb_tpoliza";
    $sql.= " FROM  CON020_TPOLIZA";
    $sql.= " WHERE cd_pais='".$pscdpais."'";
    $sql.= "   AND   st_tpoliza='AC'";
    $resultado = mysql_query($sql, $conexion);
    if($resultado==false) {
       echo "DBGeneral->getTpolizaBeans() - ERROR: [" . mysql_error() . "] SQL [" .$sql. "]"; 
    }
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
    if($resultado==false) {
       echo "DBGeneral->getUsuarioBean() - ERROR: [" . mysql_error() . "] SQL [" .$sql. "]"; 
    }
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
    if($resultado==false) {
       echo "DBGeneral->getallCount() - ERROR: [" . mysql_error() . "] SQL [" .$sql. "]"; 
    }
    return $resultado;
  }

//////////////////////////////////////////////////////////////////////////
//                           CONSECUTIVOS
//////////////////////////////////////////////////////////////////////////

  /**
   *  PROCEDIMIENTO: Procedimiento para consultar el ultimo id de la tabla CON160_POLIZA
   *  @param $cdempresa - clave de la empresa
   *  @param $pscdejercicio - Clave del ejercicio fiscal
   *  @param $conexion - conexion a la base de datos
   *  @return $resultado
  */ 
  function getlastPolizaBean($cdempresa, $pscdejercicio, $conexion) {
    $swhere ="";
    $sql = "SELECT MAX(cd_poliza)";
    $sql.= " FROM  CON160_POLIZA";
    $sql.= " WHERE cd_empresa='".$cdempresa."'";
    $sql.= "    AND   cd_ejercicio='".$pscdejercicio."'";
    $resultado = mysql_query($sql, $conexion);
    if($resultado==false) {
       echo "DBGeneral->getlastPolizaBean() - ERROR: [" . mysql_error() . "] SQL [" .$sql. "]"; 
    }
    return $resultado;
  }

  /**
   *  PROCEDIMIENTO: Procedimiento para consultar el ultimo id de la tabla CON170_MOVIMIENTO
   *  @param $cdempresa - clave de la empresa
   *  @param $pscdejercicio - Clave del ejercicio fiscal
   *  @param $pscdpoliza - Clave de la poliza
   *  @param $conexion - conexion a la base de datos
   *  @return $resultado
  */ 
  function getlastMovimientoBean($cdempresa, $pscdejercicio, $pscdpoliza, $conexion) {
    $swhere ="";
    $sql = "SELECT MAX(cd_movimiento)";
    $sql.= " FROM  CON170_MOVIMIENTO";
    $sql.= " WHERE cd_empresa='".$cdempresa."'";
    $sql.= "    AND   cd_ejercicio='".$pscdejercicio."'";
    $sql.= "    AND   cd_poliza=".$pscdpoliza;
    $resultado = mysql_query($sql, $conexion);
    if($resultado==false) {
       echo "DBGeneral->getlastMovimientoBean() - ERROR: [" . mysql_error() . "] SQL [" .$sql. "]"; 
    }
    return $resultado;
  }
     
//////////////////////////////////////////////////////////////////////////
//                           INSERT CODE
//////////////////////////////////////////////////////////////////////////
  /**
   * PROCEDIMIENTO : inserta un registro nuevo en tabla con160_poliza
   * @param $oadd - objeto tipo PolizaBean a insertar
   * @param $conexion - conexion a la base de datos
   * @return true / false
  */
  function addPolizaBean($oadd, $conexion) {
    
      $sql = "INSERT INTO CON160_POLIZA";
      $sql.= "(cd_empresa, cd_ejercicio, cd_poliza, nu_mes, st_poliza, cd_tpoliza, cd_tpago, fh_creada, fh_actualizada, cd_usuario_creo, cd_usuario_act, nb_poliza, lk_poliza, tx_comment)";
      $sql.= " VALUES ('".$oadd->getcdempresa()."','".$oadd->getcdejercicio()."',".$oadd->getcdpoliza().",'".$oadd->getnumes()."','".$oadd->getstpoliza()."','".$oadd->getcdtpoliza()."','".$oadd->getcdtpago()."','".$oadd->getfhcreada()."','".$oadd->getfhactualizada()."','".$oadd->getcdusuariocreo()."','".$oadd->getcdusuarioact()."','".$oadd->getnbpoliza()."','".$oadd->getlkpoliza()."','".$oadd->gettxcomment()."')";
      $resultado = mysql_query($sql, $conexion); 
      if($resultado==false) {
         echo "DBGeneral->addPolizaBean() - ERROR: [" . mysql_error() . "] SQL [" .$sql. "]"; 
      }
      return $resultado;
    }

  /**
   * PROCEDIMIENTO : inserta un registro nuevo en tabla con170_movimiento
   * @param $oadd - objeto tipo MovimientoBean a insertar
   * @param $conexion - conexion a la base de datos
   * @return true / false
  */
  function addMovimientoBean($oadd, $conexion) {
    
      $sql = "INSERT INTO CON170_MOVIMIENTO";
      $sql.= "(cd_empresa, cd_ejercicio, cd_poliza, cd_movimiento, nu_mes, st_movimiento, st_actualizado, cd_concepto, cd_tpcomprobante, cd_cuenta, fh_creado, fh_actualizado, im_parcial, im_debe, im_haber, nu_coprobante, nb_movimiento, lk_comprobante, tx_comment)";
      $sql.= " VALUES ('".$oadd->getcdempresa()."','".$oadd->getcdejercicio()."',".$oadd->getcdpoliza().",".$oadd->getcdmovimiento().",'".$oadd->getnumes()."','".$oadd->getstmovimiento()."','".$oadd->getstactualizado()."','".$oadd->getcdconcepto()."','".$oadd->getcdtpcomprobante()."',".$oadd->getcdcuenta().",'".$oadd->getfhcreado()."','".$oadd->getfhactualizado()."',".$oadd->getimparcial().",".$oadd->getimdebe().",".$oadd->getimhaber().",'".$oadd->getnucoprobante()."','".$oadd->getnbmovimiento()."','".$oadd->getlkcomprobante()."','".$oadd->gettxcomment()."')";
      $resultado = mysql_query($sql, $conexion); 
      if($resultado==false) {
         echo "DBGeneral->addMovimientoBean() - ERROR: [" . mysql_error() . "] SQL [" .$sql. "]"; 
      }
      return $resultado;
    }

  /**
   * PROCEDIMIENTO : inserta un registro nuevo en tabla con140_saldo
   * @param $oadd - objeto tipo SaldoBean a insertar
   * @param $conexion - conexion a la base de datos
   * @return true / false
  */
  function addSaldoBean($oadd, $conexion) {
    
      $sql = "INSERT INTO CON140_SALDO";
      $sql.= "(cd_empresa, cd_ejercicio, nu_mes, cd_cuenta, st_saldo, cd_usuario_act, fh_actualizado, cd_ctageneral, im_debe_actual, im_haber_actual, im_debe_inicial, im_haber_inicial, to_debe_movtos, to_haber_movtos, tx_comment)";
      $sql.= " VALUES ('".$oadd->getcdempresa()."','".$oadd->getcdejercicio()."','".$oadd->getnumes()."',".$oadd->getcdcuenta().",'".$oadd->getstsaldo()."','".$oadd->getcdusuarioact()."','".$oadd->getfhactualizado()."','".$oadd->getcdctageneral()."',".$oadd->getimdebeactual().",".$oadd->getimhaberactual().",".$oadd->getimdebeinicial().",".$oadd->getimhaberinicial().",".$oadd->gettodebemovtos().",".$oadd->gettohabermovtos().",'".$oadd->gettxcomment()."')";
      $resultado = mysql_query($sql, $conexion); 
      if($resultado==false) {
         echo "DBGeneral->addSaldoBean() - ERROR: [" . mysql_error() . "] SQL [" .$sql. "]"; 
      }
      return $resultado;
    }


//////////////////////////////////////////////////////////////////////////
//                           UPDATE CODE
//////////////////////////////////////////////////////////////////////////

  /**
   * PROCEDIMIENTO : actualizacion de un registro de la tabla con160_poliza
   * @param $oupd - objeto tipo PolizaBean a actualizar
   * @param $conexion - conexion a la base de datos
   * @return true / false
  */
  function updPolizaBean($oupd, $conexion) {
    
    $sql = "UPDATE CON160_POLIZA";
    $sql.= " SET st_poliza= '".$oupd->getstpoliza()."'";
    $sql.= ",cd_tpoliza= '".$oupd->getcdtpoliza()."'";
    $sql.= ",cd_tpago= '".$oupd->getcdtpago()."'";
    $sql.= ",nb_poliza= '".$oupd->getnbpoliza()."'";
    $sql.= ",fh_actualizada='".$oupd->getfhactualizada()."'";
    $sql.= ",cd_usuario_act='".$oupd->getcdusuarioact()."'";
    if($oupd->getlkpoliza()!="") 
       $sql.= ",lk_poliza= '".$oupd->getlkpoliza()."'";
    $sql.= ",tx_comment= '".$oupd->gettxcomment()."'";
    $sql.= " WHERE cd_empresa='".$oupd->getcdempresa()."'";
    $sql.= " AND   cd_ejercicio='".$oupd->getcdejercicio()."'";
    $sql.= " AND   cd_poliza=".$oupd->getcdpoliza()."";
    $resultado = mysql_query($sql, $conexion); 
    if($resultado==false) {
       echo "DBGeneral->updPolizaBean() - ERROR: [" . mysql_error() . "] SQL [" .$sql. "]"; 
    }
    return $resultado;
  }

  /**
   * PROCEDIMIENTO : actualizacion de un registro de la tabla con170_movimiento
   * @param $oupd - objeto tipo MovimientoBean a actualizar
   * @param $conexion - conexion a la base de datos
   * @return true / false
  */
  function updMovimientoBean($oupd, $conexion) {
    
    $sql = "UPDATE CON170_MOVIMIENTO";
    $sql.= " SET st_movimiento= '".$oupd->getstmovimiento()."'";
    $sql.= ",nu_mes = '".$oupd->getnumes()."'";
    $sql.= ",cd_concepto= '".$oupd->getcdconcepto()."'";
    $sql.= ",cd_tpcomprobante= '".$oupd->getcdtpcomprobante()."'";
    $sql.= ",cd_cuenta= ".$oupd->getcdcuenta()."";
    $sql.= ",im_parcial= ".$oupd->getimparcial()."";
    $sql.= ",im_debe= ".$oupd->getimdebe()."";
    $sql.= ",im_haber= ".$oupd->getimhaber()."";
    $sql.= ",nu_coprobante= '".$oupd->getnucoprobante()."'";
    $sql.= ",nb_movimiento= '".$oupd->getnbmovimiento()."'";
    if($oupd->getlkcomprobante()!="") 
        $sql.= ",lk_comprobante= '".$oupd->getlkcomprobante()."'";
    $sql.= ",tx_comment= '".$oupd->gettxcomment()."'";
    $sql.= " WHERE cd_empresa='".$oupd->getcdempresa()."'";
    $sql.= " AND   cd_ejercicio='".$oupd->getcdejercicio()."'";
    $sql.= " AND   cd_poliza=".$oupd->getcdpoliza()."";
    $sql.= " AND   cd_movimiento=".$oupd->getcdmovimiento()."";
    $resultado = mysql_query($sql, $conexion); 
    if($resultado==false) {
       echo "DBGeneral->updMovimientoBean() - ERROR: [" . mysql_error() . "] SQL [" .$sql. "]"; 
    }
    return $resultado;
  }

  /**
   * PROCEDIMIENTO : actualizacion de un registro de la tabla con170_movimiento
   *  @param $cdempresa - Clave de la empresa a la que pertenece la cuenta contable
   *  @param $cdejercicio - Clave del ejercicio fiscal al que pertenece la cuenta contable
   *  @param $numes - Numero de mes que se desea actualizar
   *  @param $conexion - conexion a la base de datos
   *  @return true / false
  */
  function updReversaMovtos($cdempresa, $cdejercicio, $numes, $conexion) {
    $sql = "UPDATE CON170_MOVIMIENTO";
    $sql.= " SET st_actualizado = 'IN'";
    $sql.= " WHERE cd_empresa='".$cdempresa."'";
    $sql.= "    AND   cd_ejercicio='".$cdejercicio."'";
    $sql.= "    AND   nu_mes='".$numes."'";
    $resultado = mysql_query($sql, $conexion); 
    if($resultado==false) {
       echo "DBGeneral->updReversaMovtos() - ERROR: [" . mysql_error() . "] SQL [" .$sql. "]"; 
    }
    return $resultado;
  }

  /**
   * PROCEDIMIENTO : actualizacion de un registro de la tabla con140_saldo
   * @param $oupd - objeto tipo SaldoBean a actualizar
   * @param $conexion - conexion a la base de datos
   * @return true / false
  */
  function updSaldoBean($oupd, $conexion) {
    
    $sql = "UPDATE CON140_SALDO";
    $sql.= " SET st_saldo= '".$oupd->getstsaldo()."'";
    $sql.= ",cd_usuario_act= '".$oupd->getcdusuarioact()."'";
    $sql.= ",cd_ctageneral= '".$oupd->getcdctageneral()."'";
    $sql.= ",im_debe_actual= ".$oupd->getimdebeactual()."";
    $sql.= ",im_haber_actual= ".$oupd->getimhaberactual()."";
    $sql.= ",im_debe_inicial= ".$oupd->getimdebeinicial()."";
    $sql.= ",im_haber_inicial= ".$oupd->getimhaberinicial()."";
    $sql.= ",to_debe_movtos= ".$oupd->gettodebemovtos()."";
    $sql.= ",to_haber_movtos= ".$oupd->gettohabermovtos()."";
    $sql.= ",tx_comment= '".$oupd->gettxcomment()."'";
    $sql.= " WHERE cd_empresa='".$oupd->getcdempresa()."'";
    $sql.= " AND   cd_ejercicio='".$oupd->getcdejercicio()."'";
    $sql.= " AND   nu_mes='".$oupd->getnumes()."'";
    $sql.= " AND   cd_cuenta=".$oupd->getcdcuenta()."";
    $resultado = mysql_query($sql, $conexion); 
    if($resultado==false) {
       echo "DBGeneral->updSaldoBean() - ERROR: [" . mysql_error() . "] SQL [" .$sql. "]"; 
    }
    return $resultado;
  }

  /**
   * PROCEDIMIENTO : actualizacion de un registro de la tabla con130_mes
   * @param $oupd - objeto tipo MesBeana actualizar
   * @param $conexion - conexion a la base de datos
   * @return true / false
  */
  function updMesBean($oupd, $conexion) {
    
    $sql = "UPDATE CON130_MES";
    $sql.= " SET st_corte= '".$oupd->getstcorte()."'";
    $sql.= ",cd_usuario= '".$oupd->getcdusuario()."'";
    $sql.= ",nb_mes= '".$oupd->getnbmes()."'";
    $sql.= " WHERE cd_empresa='".$oupd->getcdempresa()."'";
    $sql.= " AND   cd_ejercicio='".$oupd->getcdejercicio()."'";
    $sql.= " AND   nu_mes='".$oupd->getnumes()."'";
    $resultado = mysql_query($sql, $conexion); 
    if($resultado==false) {
       echo "DBGeneral->updMesBean() - ERROR: [" . mysql_error() . "] SQL [" .$sql. "]"; 
    }
    return $resultado;
  }


//////////////////////////////////////////////////////////////////////////
//                           DELETE CODE
//////////////////////////////////////////////////////////////////////////

  /**
   * PROCEDIMIENTO : elimina un registro de la tabla con160_poliza
   * @param $odel - objeto tipo PolizaBean a eliminar
   * @param $conexion - conexion a la base de datos   
   * @return true / false
  */
  function delPolizaBean($odel, $conexion) {
    $sql = "DELETE FROM CON160_POLIZA";
    $sql.= " WHERE cd_empresa='".$odel->getcdempresa()."'";
    $sql.= " AND   cd_ejercicio='".$odel->getcdejercicio()."'";
    $sql.= " AND   cd_poliza=".$odel->getcdpoliza()."";
    $resultado = mysql_query($sql, $conexion); 
    if($resultado==false) {
       echo "DBGeneral->delPolizaBean() - ERROR: [" . mysql_error() . "] SQL [" .$sql. "]"; 
    }
    return $resultado;
  }


  /**
   * PROCEDIMIENTO : elimina un registro de la tabla con170_movimiento
   * @param $odel - objeto tipo MovimientoBean a eliminar
   * @param $conexion - conexion a la base de datos   
   * @return true / false
  */
  function delMovimientoBean($odel, $conexion) {
    $sql = "DELETE FROM CON170_MOVIMIENTO";
    $sql.= " WHERE cd_empresa='".$odel->getcdempresa()."'";
    $sql.= " AND   cd_ejercicio='".$odel->getcdejercicio()."'";
    $sql.= " AND   cd_poliza=".$odel->getcdpoliza()."";
    $sql.= " AND   cd_movimiento=".$odel->getcdmovimiento()."";
    $resultado = mysql_query($sql, $conexion); 
    if($resultado==false) {
       echo "DBGeneral->delMovimientoBean() - ERROR: [" . mysql_error() . "] SQL [" .$sql. "]"; 
    }
    return $resultado;
  }

  /**
   * PROCEDIMIENTO : elimina un registro de la tabla con140_saldo
   * @param  $pscdempresa - Clave de la empresa
   * @param  $pscdejercicio - Clave del ejercicio fiscal
   * @param  $psnumes - Mes en el que se procesa la poliza
   * @param  $picdcuenta - Numero de cuenta contable
   * @param $conexion - conexion a la base de datos
   * @return true / false
  */
  function delSaldoBean_key($pscdempresa, $pscdejercicio, $psnumes, $picdcuenta, $conexion) {
    $sql = "DELETE FROM CON140_SALDO";
    $sql.= " WHERE cd_empresa='".$pscdempresa."'";
    $sql.= " AND   cd_ejercicio='".$pscdejercicio."'";
    $sql.= " AND   nu_mes='".$psnumes."'";
    $sql.= " AND   cd_cuenta=".$picdcuenta."";
    $resultado = mysql_query($sql, $conexion); 
    if($resultado==false) {
       echo "DBGeneral->delSaldoBean_key() - ERROR: [" . mysql_error() . "] SQL [" .$sql. "]"; 
    }
    return $resultado;
  }

  /**
   * PROCEDIMIENTO : elimina un registro de la tabla con140_saldo
   * @param  $pscdempresa - Clave de la empresa
   * @param  $pscdejercicio - Clave del ejercicio fiscal
   * @param  $psnumes - Mes en el que se procesa la poliza
   * @param $conexion - conexion a la base de datos
   * @return true / false
  */
  function delSaldoBeans($pscdempresa, $pscdejercicio, $psnumes, $conexion) {
    $sql = "DELETE FROM CON140_SALDO";
    $sql.= " WHERE cd_empresa='".$pscdempresa."'";
    $sql.= " AND   cd_ejercicio='".$pscdejercicio."'";
    $sql.= " AND   nu_mes='".$psnumes."'";
    $resultado = mysql_query($sql, $conexion);
    if($resultado==false) {
       echo "DBGeneral->delSaldoBeans() - ERROR: [" . mysql_error() . "] SQL [" .$sql. "]"; 
    }
    return $resultado;
  }

} /* fin clase [DBGeneral]  */

?>

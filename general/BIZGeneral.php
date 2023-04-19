<?php
require_once("DBGeneral.php"); 
require_once("../util/Utilerias.php"); 
require_once("../comun/CriterioBean.php"); 

/**
 * @name: BIZGeneral
 * Descripcion: 
 * Clase de negocio y principal acceso para el proyecto
 * @creation date: (02-Julio-2010)
 * @author Ruben Murga Tapia
 * @conpany: HANYGEN SOFTWARE S.A. DE C.V.
 */
class BIZGeneral {
  var $odb;
  var $smensaje = "";

  /**
   * CONSTRUCTOR
   */
  function BIZGeneral() {
    $this->odb = new DBGeneral();  
  }

//////////////////////////////////////////////////////////////////////////
//                           SELECT CODE
//////////////////////////////////////////////////////////////////////////

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
    }
    return $obj;
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
   * PROCEDIMIENTO: Para consultar varios objetos tipo EjercicioBean en base a un criterio
   * @param $conexion - conexion a la base de datos   
   * @return $objects[] - Array de objetos tipo EjercicioBean
  */
  function getEjercicioBeans($conexion) {
    $objects = array();
    $result = $this->odb->getEjercicioBeans($conexion);
    while($row=mysql_fetch_row($result)){
       $obj = new EjercicioBean();
       $obj->setcdempresa($row[0]);
       $obj->setcdejercicio($row[1]);
       $obj->setstejercicio($row[2]);
       $obj->setfhinicio($row[3]);
       $obj->setfhtermino($row[4]);
       $objects[] = $obj;
    }
    return $objects;
  }


  /**
   * PROCEDIMIENTO para consultar un objeto en particular tipo ParametroBean
   * @param $pscdempresa - Clave de la empresa
   * @param $pscdparametro - Clave del parametro
   * @param $conexion - conexion a la base de datos   
   * @return $obj - objeto tipo ParametroBean con la inf
   */
  function getParametroBean($pscdempresa, $pscdparametro, $conexion) {
    $obj = NULL;
    $result = $this->odb->getParametroBean($pscdempresa, $pscdparametro, $conexion);
    if($row=mysql_fetch_row($result)) {
      $obj = new ParametroBean();
      $obj->setcdempresa($row[0]);
      $obj->setcdparametro($row[1]);
      $obj->setstparametro($row[2]);
      $obj->setnbparamero($row[3]);
      $obj->settxvalor($row[4]);
    }
    return $obj;
  }
  
  /**
   * PROCEDIMIENTO para consultar un objeto en particular tipo MesBean
   * @param $pscdempresa - Clave de la empresa
   * @param $pscdejercicio - Clave del ejercicio fiscal
   * @param $psnumes - Numero de mes
   * @param $conexion - conexion a la base de datos   
   * @return $obj - objeto tipo MesBean con la inf
   */
  function getMesBean($pscdempresa, $pscdejercicio, $psnumes, $conexion) {
    $obj = NULL;
    $result = $this->odb->getMesBean($pscdempresa, $pscdejercicio, $psnumes, $conexion);
    if($row=mysql_fetch_row($result)) {
      $obj = new MesBean();
      $obj->setcdempresa($row[0]);
      $obj->setcdejercicio($row[1]);
      $obj->setnumes($row[2]);
      $obj->setstcorte($row[3]);
      $obj->setcdusuario($row[4]);
      $obj->setnbmes($row[5]);
    }
    return $obj;
  }
  
  /**
   * PROCEDIMIENTO: Para consultar varios objetos tipo MesBean en base a un criterio
   * @param $pscdempresa - Clave de la empresa
   * @param $pscdejercicio - Clave del ejercicio fiscal
   * @param $conexion - conexion a la base de datos   
   * @return $objects[] - Array de objetos tipo MesBean
  */
  function getMesBeans($pscdempresa, $pscdejercicio, $conexion) {
    $objects = array();
    $result = $this->odb->getMesBeans($pscdempresa, $pscdejercicio, $conexion);
    while($row=mysql_fetch_row($result)){
       $obj = new MesBean();
       $obj->setcdempresa($row[0]);
       $obj->setcdejercicio($row[1]);
       $obj->setnumes($row[2]);
       $obj->setstcorte($row[3]);
       $obj->setcdusuario($row[4]);
       $obj->setnbmes($row[5]);
       $objects[] = $obj;
    }
    return $objects;
  }

  /**
   * PROCEDIMIENTO para consultar un objeto en particular tipo SaldoBean
   * @param $pscdempresa - Clave de la empresa
   * @param $pscdejercicio - Clave del ejercicio fiscal
   * @param $psnumes - Mes en el que se procesa la poliza
   * @param $picdcuenta - Numero de cuenta contable
   * @param $conexion - conexion a la base de datos   
   * @return $obj - objeto tipo SaldoBean con la inf
   */
  function getSaldoBean($pscdempresa, $pscdejercicio, $psnumes, $picdcuenta, $conexion) {
    $obj = NULL;
    $result = $this->odb->getSaldoBean($pscdempresa, $pscdejercicio, $psnumes, $picdcuenta, $conexion);
    if($row=mysql_fetch_row($result)) {
      $obj = new SaldoBean();
      $obj->setcdempresa($row[0]);
      $obj->setcdejercicio($row[1]);
      $obj->setnumes($row[2]);
      $obj->setcdcuenta($row[3]);
      $obj->setstsaldo($row[4]);
      $obj->setcdusuarioact($row[5]);
      $obj->setfhactualizado($row[6]);
      $obj->setcdctageneral($row[7]);
      $obj->setimdebeactual($row[8]);
      $obj->setimhaberactual($row[9]);
      $obj->setimdebeinicial($row[10]);
      $obj->setimhaberinicial($row[11]);
      $obj->settodebemovtos($row[12]);
      $obj->settohabermovtos($row[13]);
      $obj->settxcomment($row[14]);
    }
    return $obj;
  }
  
  /**
   * PROCEDIMIENTO: Para consultar varios objetos tipo SaldoBean en base a un criterio
   * @param $ocrit - criterios de consulta
   * @param $conexion - conexion a la base de datos   
   * @return $objects[] - Array de objetos tipo SaldoBean
  */
  function getcSaldoBeans($ocrit, $conexion) {
    $objects = array();
    $result = $this->odb->getcSaldoBeans($ocrit, $conexion);
    while($row=mysql_fetch_row($result)){
       $obj = new SaldoBean();
       $obj->setcdempresa($row[0]);
       $obj->setcdejercicio($row[1]);
       $obj->setnumes($row[2]);
       $obj->setcdcuenta($row[3]);
       $obj->setstsaldo($row[4]);
       $obj->setcdusuarioact($row[5]);
       $obj->setfhactualizado($row[6]);
       $obj->setcdctageneral($row[7]);
       $obj->setimdebeactual($row[8]);
       $obj->setimhaberactual($row[9]);
       $obj->setimdebeinicial($row[10]);
       $obj->setimhaberinicial($row[11]);
       $obj->settodebemovtos($row[12]);
       $obj->settohabermovtos($row[13]);
       $obj->settxcomment($row[14]);
       $objects[] = $obj;
    }
    return $objects;
  }

  /**
   * PROCEDIMIENTO para consultar un objeto en particular tipo CuentaBean
   * @param $pscdempresa - Clave de la empresa a la que pertenece la cuenta contable
   * @param $pscdejercicio - Clave del ejercicio fiscal al que pertenece la cuenta contable
   * @param $picdcuenta - Clave interna de la cuenta contable
   * @param $conexion - conexion a la base de datos   
   * @return $obj - objeto tipo CuentaBean con la inf
   */
  function getCuentaBean($pscdempresa, $pscdejercicio, $picdcuenta, $conexion) {
    $obj = NULL;
    $result = $this->odb->getCuentaBean($pscdempresa, $pscdejercicio, $picdcuenta, $conexion);
    if($row=mysql_fetch_row($result)) {
      $obj = new CuentaBean();
      $obj->setcdempresa($row[0]);
      $obj->setcdejercicio($row[1]);
      $obj->setcdcuenta($row[2]);
      $obj->setnunivel($row[3]);
      $obj->setstcuenta($row[4]);
      $obj->settpnaturaleza($row[5]);
      $obj->settpcuenta($row[6]);
      $obj->setnucuenta($row[7]);
      $obj->setnbcuenta($row[8]);
      $obj->settxcomment($row[9]);
      $obj->setcdctageneral($row[10]);
      $obj->setcdctacierre($row[11]);
    }
    return $obj;
  }
  
  /**
   * PROCEDIMIENTO: Para consultar varios objetos tipo CuentaBean en base a un criterio
   * @param $ocrit - criterios de consulta
   * @param $conexion - conexion a la base de datos   
   * @return $objects[] - Array de objetos tipo CuentaBean
  */
  function getcCuentaBeans($ocrit, $conexion) {
    $objects = array();
    $result = $this->odb->getcCuentaBeans($ocrit, $conexion);
    while($row=mysql_fetch_row($result)){
       $obj = new CuentaBean();
       $obj->setcdempresa($row[0]);
       $obj->setcdejercicio($row[1]);
       $obj->setcdcuenta($row[2]);
       $obj->setnunivel($row[3]);
       $obj->setstcuenta($row[4]);
       $obj->settpnaturaleza($row[5]);
       $obj->settpcuenta($row[6]);
       $obj->setnucuenta($row[7]);
       $obj->setnbcuenta($row[8]);
       $obj->settxcomment($row[9]);
       $obj->setcdctageneral($row[10]);
       $obj->setcdctacierre($row[11]);
       $objects[] = $obj;
    }
    return $objects;
  }

  /**
   * PROCEDIMIENTO: Para consultar varios objetos tipo CuentaBean en base a un criterio
   * @param $ocrit - criterios de consulta
   * @param $conexion - conexion a la base de datos   
   * @return $objects[] - Array de objetos tipo CuentaBean
  */
  function getsRangoCuentas($ocrit, $conexion) {
     $sresult = "";
     $outil = new Utilerias();
     $cctas = $this->getcCuentaBeans($ocrit, $conexion);
     foreach($cctas as $orow) {     
        $sresult = $outil->addToken($sresult, $orow->getcdcuenta(), ",");
     }
     return $sresult;
   }

  /**
   * PROCEDIMIENTO para consultar un objeto en particular tipo PolizaBean
   * @param $pscdempresa - Clave de la empresa
   * @param $pscdejercicio - Clave del ejercicio fiscal
   * @param $picdpoliza - Clave de la poliza contable
   * @param $conexion - conexion a la base de datos   
   * @return $obj - objeto tipo PolizaBean con la inf
   */
  function getPolizaBean($pscdempresa, $pscdejercicio, $picdpoliza, $conexion) {
    $obj = NULL;
    $result = $this->odb->getPolizaBean($pscdempresa, $pscdejercicio, $picdpoliza, $conexion);
    if($row=mysql_fetch_row($result)) {
      $obj = new PolizaBean();
      $obj->setcdempresa($row[0]);
      $obj->setcdejercicio($row[1]);
      $obj->setcdpoliza($row[2]);
      $obj->setnumes($row[3]);
      $obj->setstpoliza($row[4]);
      $obj->setcdtpoliza($row[5]);
      $obj->setcdtpago($row[6]);
      $obj->setfhcreada($row[7]);
      $obj->setfhactualizada($row[8]);
      $obj->setcdusuariocreo($row[9]);
      $obj->setcdusuarioact($row[10]);
      $obj->setnbpoliza($row[11]);
      $obj->setlkpoliza($row[12]);
      $obj->settxcomment($row[13]);
    }
    return $obj;
  }
  
  /**
   * PROCEDIMIENTO: Para consultar varios objetos tipo PolizaBean en base a un criterio
   * @param $ocrit - criterios de consulta
   * @param $conexion - conexion a la base de datos   
   * @return $objects[] - Array de objetos tipo PolizaBean
  */
  function getPolizaBeans($ocrit, $conexion) {
    $objects = array();
    $result = $this->odb->getPolizaBeans($ocrit, $conexion);
    while($row=mysql_fetch_row($result)){
       $obj = new PolizaBean();
       $obj->setcdempresa($row[0]);
       $obj->setcdejercicio($row[1]);
       $obj->setcdpoliza($row[2]);
       $obj->setnumes($row[3]);
       $obj->setstpoliza($row[4]);
       $obj->setcdtpoliza($row[5]);
       $obj->setcdtpago($row[6]);
       $obj->setfhcreada($row[7]);
       $obj->setfhactualizada($row[8]);
       $obj->setcdusuariocreo($row[9]);
       $obj->setcdusuarioact($row[10]);
       $obj->setnbpoliza($row[11]);
       $obj->setlkpoliza($row[12]);
       $obj->settxcomment($row[13]);
       $objects[] = $obj;
    }
    return $objects;
  }

  /**
   * PROCEDIMIENTO para consultar un objeto en particular tipo MovimientoBean
   * @param $pscdempresa - Clave de la empresa
   * @param $pscdejercicio - Clave del ejercicio fiscal
   * @param $picdpoliza - Clave de la poliza contable
   * @param $picdmovimiento - Clave del movimiento contable
   * @param $conexion - conexion a la base de datos   
   * @return $obj - objeto tipo MovimientoBean con la inf
   */
  function getMovimientoBean($pscdempresa, $pscdejercicio, $picdpoliza, $picdmovimiento, $conexion) {
    $obj = NULL;
    $result = $this->odb->getMovimientoBean($pscdempresa, $pscdejercicio, $picdpoliza, $picdmovimiento, $conexion);
    if($row=mysql_fetch_row($result)) {
      $obj = new MovimientoBean();
      $obj->setcdempresa($row[0]);
      $obj->setcdejercicio($row[1]);
      $obj->setcdpoliza($row[2]);
      $obj->setcdmovimiento($row[3]);
      $obj->setnumes($row[4]);
      $obj->setstmovimiento($row[5]);
      $obj->setstactualizado($row[6]);
      $obj->setcdconcepto($row[7]);
      $obj->setcdtpcomprobante($row[8]);
      $obj->setcdcuenta($row[9]);
      $obj->setfhcreado($row[10]);
      $obj->setfhactualizado($row[11]);
      $obj->setimparcial($row[12]);
      $obj->setimdebe($row[13]);
      $obj->setimhaber($row[14]);
      $obj->setnucoprobante($row[15]);
      $obj->setnbmovimiento($row[16]);
      $obj->setlkcomprobante($row[17]);
      $obj->settxcomment($row[18]);
    }
    return $obj;
  }
  
  /**
   * PROCEDIMIENTO: Para consultar varios objetos tipo MovimientoBean en base a un criterio
   * @param $ocrit - criterios de consulta
   * @param $conexion - conexion a la base de datos   
   * @return $objects[] - Array de objetos tipo MovimientoBean
  */
  function getMovimientoBeans($ocrit, $conexion) {
    $objects = array();
    $result = $this->odb->getMovimientoBeans($ocrit, $conexion);
    while($row=mysql_fetch_row($result)){
       $obj = new MovimientoBean();
       $obj->setcdempresa($row[0]);
       $obj->setcdejercicio($row[1]);
       $obj->setcdpoliza($row[2]);
       $obj->setcdmovimiento($row[3]);
       $obj->setnumes($row[4]);
       $obj->setstmovimiento($row[5]);
       $obj->setstactualizado($row[6]);
       $obj->setcdconcepto($row[7]);
       $obj->setcdtpcomprobante($row[8]);
       $obj->setcdcuenta($row[9]);
       $obj->setfhcreado($row[10]);
       $obj->setfhactualizado($row[11]);
       $obj->setimparcial($row[12]);
       $obj->setimdebe($row[13]);
       $obj->setimhaber($row[14]);
       $obj->setnucoprobante($row[15]);
       $obj->setnbmovimiento($row[16]);
       $obj->setlkcomprobante($row[17]);
       $obj->settxcomment($row[18]);
       $objects[] = $obj;
    }
    return $objects;
  }

  /**
   * PROCEDIMIENTO: Para consultar varios objetos tipo TpolizaBean
   * @param $pscdpais- Clave del pais
   * @param $conexion - conexion a la base de datos   
   * @return $objects[] - Array de objetos tipo TpolizaBean
  */
  function getTpolizaBeans($pscdpais, $conexion) {
    $objects = array();
    $result = $this->odb->getTpolizaBeans($pscdpais, $conexion);
    while($row=mysql_fetch_row($result)){
       $obj = new TpolizaBean();
       $obj->setcdtpoliza($row[0]);
       $obj->setsttpoliza($row[1]);
       $obj->setcdpais($row[2]);
       $obj->setnbtpoliza($row[3]);
       $objects[] = $obj;
    }
    return $objects;
  }

  /**
   * PROCEDIMIENTO: Para consultar varios objetos tipo PolizaBean para el reporte de diario de movimientos en 
   *                              base a un criterio
   * @param $ocrit - criterios de consulta
   * @param $conexion - conexion a la base de datos   
   * @return $objects[] - Array de objetos tipo PolizaBean
  */
  function getDiarioMovtos($ocrit, $conexion) {
    $objects = array();

    /* PASO 1: Consulta el rango de claves de cuenta participantes */
    if($ocrit->getcuentaini()!='') {
        $ocrit1 = new CriterioBean();
        $ocrit1->setcdempresa($ocrit->getcdempresa());
        $ocrit1->setcdejercicio($ocrit->getcdejercicio());
        $ocrit1->setcuentaini($ocrit->getcuentaini());
        $ocrit1->setcuentafin($ocrit->getcuentafin());
        $sctas = $this->getsRangoCuentas($ocrit1, $conexion);
        $ocrit->setcdcuentas($sctas);
    }

    /* PASO 2: Consulta todas las polizas que participan */
    $result = $this->odb->getDiarioMovtos($ocrit, $conexion);
    while($row=mysql_fetch_row($result)){
       $obj = new PolizaBean();
       $obj->setcdempresa($row[0]);
       $obj->setcdejercicio($row[1]);
       $obj->setcdpoliza($row[2]);
       $obj->setnumes($row[3]);
       $obj->setstpoliza($row[4]);
       $obj->setcdtpoliza($row[5]);
       $obj->setcdtpago($row[6]);
       $obj->setfhcreada($row[7]);
       $obj->setfhactualizada($row[8]);
       $obj->setcdusuariocreo($row[9]);
       $obj->setcdusuarioact($row[10]);
       $obj->setnbpoliza($row[11]);
       $obj->setlkpoliza($row[12]);
       $obj->settxcomment($row[13]);
       $objects[] = $obj;
    }

    /* PASO 3: Consulta los movimientos de cada poliza que participan */    
    $ocrit2 = new CriterioBean();
    $ocrit2->setcdempresa($ocrit->getcdempresa());
    $ocrit2->setcdejercicio($ocrit->getcdejercicio());
    foreach($objects as $orow) {
        $ocrit2->setcdpoliza($orow->getcdpoliza());
        $cmovtos = $this->getMovimientoBeans($ocrit2, $conexion);
        $orow->setcmovtos($cmovtos);
     }
    return $objects;
  }

  /**
   * PROCEDIMIENTO: Para consultar varios objetos tipo PolizaBean para el reporte de analitico de auxiliares  
   *                              en base a un criterio
   * @param $ocrit - criterios de consulta
   * @param $conexion - conexion a la base de datos   
   * @return $objects[] - Array de objetos tipo PolizaBean
  */
  function getAnaliticoAuxiliares($ocrit, $conexion) {
    $objects = array();

    /* PASO 1: Consulta el rango de claves de cuenta participantes */
    $ocrit1 = new CriterioBean();
    $ocrit1->setcdempresa($ocrit->getcdempresa());
    $ocrit1->setcdejercicio($ocrit->getcdejercicio());
    $ocrit1->setcuentaini($ocrit->getcuentaini());
    $ocrit1->setcuentafin($ocrit->getcuentafin());
    $ocrit1->settpcuenta("DE");
    $cctas = $this->getcCuentaBeans($ocrit, $conexion);

    /* PASO 2: Consulta los movimientos realizados para cada cuenta */    
    $ocrit2 = new CriterioBean();
    $ocrit2->setcdempresa($ocrit->getcdempresa());
    $ocrit2->setcdejercicio($ocrit->getcdejercicio());
    $ocrit2->setstactualizado('AC');
    $ocrit2->setnumes($ocrit->getnumes());
    foreach($cctas as $orow) {
       $cmovtos = array();
       $ocrit2->setcdcuenta($orow->getcdcuenta());
       $cmovtos = $this->getMovimientoBeans($ocrit2, $conexion);
       if(count($cmovtos) > 0) {
           $orow->setcmovtos($cmovtos);
           $orow->setSaldo($this->getSaldoBean($ocrit->getcdempresa(), $ocrit->getcdejercicio(), $ocrit->getnumes(), $orow->getcdcuenta(), $conexion)); 
           $objects[] = $orow;
       }
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
   * PROCEDIMIENTO: Para consultar varios objetos tipo CuentaBean, pero que también incluyen el saldo de un 
   *  mes en particular en base a unos criterios de consulta
   * @param $ocrit - criterios de consulta
   * @param $conexion - conexion a la base de datos   
   * @return $objects[] - Array de objetos tipo PolizaBean
  */
  function getcCuentaSaldo($ocrit, $conexion) {
     $cctas  = $this->getcCuentaBeans($ocrit, $conexion);
     foreach($cctas as $orow) 
           $orow->setSaldo($this->getSaldoBean($ocrit->getcdempresa(), $ocrit->getcdejercicio(), $ocrit->getnumes(), $orow->getcdcuenta(), $conexion)); 
     
     return $cctas;
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
   *  PROCEDIMIENTO: Procedimiento para consultar el ultimo id del tipo PolizaBean
   *  @param $cdempresa - clave de la empresa
   *  @param $cdejercicio - clave del ejercicio fiscal
   *  @param $conexion - conexion a la base de datos
   *  @return $resultado
  */ 
  function getnextPolizaBean($cdempresa, $cdejercicio, $conexion) {
    $res = 1;    //crea un fijo maximo
    $result = $this->odb->getlastPolizaBean($cdempresa, $cdejercicio, $conexion);
    if($row=mysql_fetch_row($result)) {
      $res = intval($row[0]) + 1;
      return $res;
    }
    return $res;
  }  

  /**
   *  PROCEDIMIENTO: Procedimiento para consultar el ultimo id del tipo MovimientoBean
   *  @param $cdempresa - clave de la empresa
   *  @param $cdejercicio - clave del ejercicio fiscal
   *  @param $cdpoliza - clave del movimiento
   *  @param $conexion - conexion a la base de datos
   *  @return $resultado
  */ 
  function getnextMovimientoBean($cdempresa, $cdejercicio, $cdpoliza, $conexion) {
    $res = 1;    //crea un fijo maximo
    $result = $this->odb->getlastMovimientoBean($cdempresa, $cdejercicio, $cdpoliza, $conexion);
    if($row=mysql_fetch_row($result)) {
      $res = intval($row[0]) + 1;
      return $res;
    }
    return $res;
  }  

//////////////////////////////////////////////////////////////////////////
//                           INSERT CODE
//////////////////////////////////////////////////////////////////////////

  /**
   * PROCEDIMIENTO : Alta de un objeto tipo SaldoBean
   * @param $oadd - objeto SaldoBean a dar de alta
   * @param $conexion - conexion a la base de datos
   * @return true / false
   */
  function addSaldoBean($oadd, $conexion) {
    $oadd->setfhactualizado(date("Y-m-d"));
    $bres = $this->odb->addSaldoBean($oadd, $conexion);
    return $bres;
  }

  /**
   * PROCEDIMIENTO : Alta de un objeto tipo SaldoBean
   * @param $csaldos - array con objetos tipo SaldoBean a dar de alta
   * @param $conexion - conexion a la base de datos
   * @return true / false
   */
  function addSaldoBeans($csdos, $conexion) {
     foreach($csdos as $orow) {
         $bres = $this->addSaldoBean($orow, $conexion);
         if($bres==false) return false;
     }
     return true;
  }

  /**
   * PROCEDIMIENTO : Inicializa los saldos de un mes en particular
   * @param $omes - objeto MesBean que se esta tratando
   * @param $csdos - array con objetos tipo SaldoBean que se esta tratando
   * @param $cdusuario- clave del usuario
   * @param $conexion - conexion a la base de datos
   * @return true / false
   */
  function addInicializaSaldo($omes, $csdos, $cdusuario, $conexion) {

     /* PASO 1: agrega el arreglo de objetos tipo Saldo Bean (saldos a detalle) */
     $bres = $this->addSaldoBeans($csdos, $conexion);
     if($bres==false) return false;

     /* PASO 2: completa los saldos de las cuentas generales */
     $bres = $this->addInicializaSaldosGenerales($omes->getcdempresa(), $omes->getcdejercicio(), $omes->getnumes(), $cdusuario, $conexion);
     if($bres==false) return false;

     /* PASO 3: sube los saldos  */
     $bres = $this->updSaldosGenerales($omes->getcdempresa(), $omes->getcdejercicio(), $omes->getnumes(), $cdusuario, $conexion);
     if($bres==false) return false;
     
     /* PASO 4: actualiza el estatus del mes */
     $omes->setstcorte("01");
     $bres =  $this->updMesBean($omes, $conexion);
     if($bres==false) return false;

     /* PASO 5: Termina */
     return true;
  }

  /**
   * PROCEDIMIENTO : Inicializa los saldos de un mes en particular
   * @param $scdempresa - clave de la empresa
   * @param $scdejercicio - clave del ejercicio fiscal
   * @param $snumes - numero de mes
   * @param $cdusuario- clave del usuario
   * @param $conexion - conexion a la base de datos
   * @return true / false
   */
  function addInicializaSaldosGenerales($scdempresa, $scdejercicio, $snumes, $cdusuario, $conexion) {
     $csdos = array();

     /* PASO 1: Consulta todas las cuentas generales */
     $ocrit = new CriterioBean();
     $ocrit->setcdempresa($scdempresa);
     $ocrit->setcdejercicio($scdejercicio);
     $ocrit->setstcuenta("AC");
     $ocrit->settpcuenta("GE");
     $cctas = $this->getcCuentaBeans($ocrit, $conexion);

     /* PASO 2: Arma los saldos iniciales de las cuentas contables generales */
    foreach($cctas as $orow)  {
         $osdo = new SaldoBean();
         $osdo->setcdempresa($scdempresa);
         $osdo->setcdejercicio($scdejercicio);
         $osdo->setnumes($snumes);
         $osdo->setcdusuarioact($cdusuario);
         $osdo->setcdcuenta($orow->getcdcuenta());
         $osdo->setcdctageneral($orow->getcdctageneral());
         $osdo->setstsaldo("01");
         $csdos[] = $osdo;
    }

    /* PASO 3: Inserta los saldos iniciales de las cuentas contables */
    return $this->addSaldoBeans($csdos, $conexion);
  }

//////////////////////////////////////////////////////////////////////////
//                           UPDATE CODE
//////////////////////////////////////////////////////////////////////////
  /**
   * PROCEDIMIENTO : Actualizacion de un objeto tipo PolizaBean
   * @param $oupd - objeto tipo PolizaBean para actualizar
   * @param $conexion - conexion a la base de datos
   * @return true / false
   */
  function savePolizaBean($oupd, $conexion) {

    if($oupd->getlkpoliza()!="") 
       if(substr($oupd->getlkpoliza(),0,1)==".")      
          $oupd->setlkpoliza($oupd->getcdempresa()."-".$oupd->getcdejercicio()."-".$oupd->getcdpoliza()."-".rand(1,50).$oupd->getlkpoliza());            

    if($oupd->getcdpoliza()==0) {
       $oupd->setcdpoliza($this->getnextPolizaBean($oupd->getcdempresa(), $oupd->getcdejercicio(), $conexion));
       $oupd->setfhcreada(date("Y-m-d"));
       return $this->odb->addPolizaBean($oupd, $conexion);
    } 
    return $this->odb->updPolizaBean($oupd, $conexion);
  }   
  
  /**
   * PROCEDIMIENTO : Actualizacion de un objeto tipo MovimientoBean
   * @param $oupd - objeto tipo MovimientoBean para actualizar
   * @param $conexion - conexion a la base de datos
   * @return true / false
   */
  function saveMovimientoBean($oupd, $conexion) {
     if($oupd->getlkcomprobante()!="") 
          $oupd->setlkcomprobante($oupd->getcdempresa()."-".$oupd->getcdejercicio()."-".$oupd->getcdpoliza()."-".$oupd->getcdmovimiento()."-".rand(1,50).$oupd->getlkcomprobante());            
    if($oupd->getcdmovimiento()==0) {
       $oupd->setcdmovimiento($this->getnextMovimientoBean($oupd->getcdempresa(), $oupd->getcdejercicio(), $oupd->getcdpoliza(), $conexion));
       $oupd->setfhcreado(date("Y-m-d"));
       return $this->odb->addMovimientoBean($oupd, $conexion);
    } 
    return $this->odb->updMovimientoBean($oupd, $conexion);
  }   

  /**
   * PROCEDIMIENTO : Actualizacion de un objeto tipo SaldoBean
   * @param $oupd - objeto tipo SaldoBean para actualizar
   * @param $conexion - conexion a la base de datos
   * @return true / false
   */
  function updSaldoBean($oupd, $conexion) {
    return $this->odb->updSaldoBean($oupd, $conexion);
  }   

  /**
   * PROCEDIMIENTO : actualizacion de un registro de la tabla con130_mes
   * @param $oupd - objeto tipo MesBeana actualizar
   * @param $conexion - conexion a la base de datos
   * @return true / false
  */
  function updMesBean($oupd, $conexion) {
    return $this->odb->updMesBean($oupd, $conexion);
  }

  /**
   * PROCEDIMIENTO : Inicializa los saldos de un mes en particular
   * @param $cdempresa - clave de la empresa
   * @param $cdejercicio - clave del ejercicio fiscal
   * @param $numes - numero de mes
   * @param $cdcuenta- clave de la cuenta contable
   * @param $cdusuario- clave del usuario
   * @param $conexion - conexion a la base de datos
   * @return true / false
   */
  function updSaldosGeneralCuenta($cdempresa, $cdejercicio, $numes, $cdcuenta, $cdusuario, $conexion) {

     /* PASO 1: Consulta la cuenta contable */
     $osdo = $this->getSaldoBean($cdempresa, $cdejercicio, $numes, $cdcuenta, $conexion);

     while ( $osdo->getcdctageneral() != 0) {
        $opadre = $this->getSaldoBean($cdempresa, $cdejercicio, $numes, $osdo->getcdctageneral(), $conexion);
        $opadre->setimdebeinicial($opadre->getimdebeinicial() + $osdo->getimdebeinicial());
        $opadre->setimhaberinicial($opadre->getimhaberinicial() + $osdo->getimhaberinicial());
        $opadre->setimdebeactual($opadre->getimdebeactual() + $osdo->getimdebeactual());
        $opadre->setimhaberactual($opadre->getimhaberactual() + $osdo->getimhaberactual());
        $opadre->settodebemovtos($opadre->gettodebemovtos() + $osdo->gettodebemovtos());
        $opadre->settohabermovtos($opadre->gettohabermovtos() + $osdo->gettohabermovtos());
        $opadre->setstsaldo("02");
        $opadre->setcdusuarioact($cdusuario);
        $bres = $this->updSaldoBean($opadre, $conexion);
        if($bres==false) return false;
        $osdo = $opadre;
     }
     return true;
  }

  /**
   * PROCEDIMIENTO : Inicializa los saldos de un mes en particular
   * @param $cdempresa - clave de la empresa
   * @param $cdejercicio - clave del ejercicio fiscal
   * @param $numes - numero de mes
   * @param $cdusuario- clave del usuario
   * @param $conexion - conexion a la base de datos
   * @return true / false
   */
  function updSaldosGenerales($cdempresa, $cdejercicio, $numes, $cdusuario, $conexion) {
     $bres = false;

     /* PASO 1: Consulta todas las cuentas de detalle */
     $ocrit = new CriterioBean();
     $ocrit->setcdempresa($scdempresa);
     $ocrit->setcdejercicio($scdejercicio);
     $ocrit->setstcuenta("AC");
     $ocrit->settpcuenta("DE");
     $cctas = $this->getcCuentaBeans($ocrit, $conexion);

     /* PASO 2: Recorre cada una de las cuentas de detalle */
    foreach($cctas as $orow)  {
         $bres = $this->updSaldosGeneralCuenta($cdempresa, $cdejercicio, $numes, $orow->getcdcuenta(), $cdusuario, $conexion);
         if($bres==false) return false;
    }
    return true;
  }

  /**
   * PROCEDIMIENTO : Procedimiento para asentar los movimientos contables de las polizas para este mes
   * @param $cdempresa - clave de la empresa
   * @param $cdejercicio - clave del ejercicio fiscal
   * @param $numes - numero de mes
   * @param $cdusuario- clave del usuario
   * @param $conexion - conexion a la base de datos
   * @return true / false
   */
  function updAsentarPolizas($cdempresa, $cdejercicio, $numes, $cdusuario, $conexion) {

    /* PASO 1: Consulta todas las polizas balanceadas */
     $ocrit1 = new CriterioBean();
     $ocrit1->setcdempresa($cdempresa);
     $ocrit1->setcdejercicio($cdejercicio);
     $ocrit1->setnumes($numes);
     /*$ocrit1->setstpoliza("BA");*/
     $cpolz = $this->getPolizaBeans($ocrit1, $conexion);

    /* PASO 2: Recorre cada una de las polizas, para consultar sus movimientos */
    foreach($cpolz as $orow)  {
       $ocrit2 = new CriterioBean();
       $ocrit2->setcdempresa($cdempresa);
       $ocrit2->setcdejercicio($cdejercicio);
       $ocrit2->setcdpoliza($orow->getcdpoliza());
       $ocrit2->setstactualizado("IN");
       $cmovs = $this->getMovimientoBeans($ocrit2, $conexion);
       $orow->setcmovtos($cmovs);
    }
  
    /* PASO 3: Recorre cada una de las polizas para asentar contablemente sus movimientos */
    foreach($cpolz as $orow)  {
       $cmovs = $orow->getcmovtos();
       foreach($cmovs as $omov)  {
           $osdo = $this->getSaldoBean($cdempresa, $cdejercicio, $numes, $omov->getcdcuenta(), $conexion);
           $osdo->setimdebeactual($osdo->getimdebeactual() + $omov->getimdebe());
           $osdo->setimhaberactual($osdo->getimhaberactual() + $omov->getimhaber());
           $osdo->settodebemovtos($osdo->gettodebemovtos() + $omov->getimdebe());
           $osdo->settohabermovtos($osdo->gettohabermovtos() + $omov->getimhaber());
           $osdo->setstsaldo("02");
           $osdo->setcdusuarioact($cdusuario);

           /* PASO 3.1: actualiza el registro del saldo para la cuenta de detalle */
           $bres = $this->updSaldoBean($osdo, $conexion);
           if($bres==false) return false;

           /* PASO 3.2: actualiza el registro del movimiento y la fecha de actualizacion */           
           $omov->setstactualizado("AC");
           $omov->setfhactualizado(date("Y-m-d"));
           $bres = $this->odb->updMovimientoBean($omov, $conexion);
           if($bres==false) return false;
       }
    }   

     /* PASO 3: sube los saldos  */
     $bres = $this->updSaldosGenerales($cdempresa, $cdejercicio, $numes, $cdusuario, $conexion);
     if($bres==false) return false;
     
     /* PASO 4: actualiza el estatus del mes */
     $omes = $this->getMesBean($cdempresa, $cdejercicio, $numes, $conexion);
     $omes->setstcorte("02");
     $bres =  $this->updMesBean($omes, $conexion);
     if($bres==false) return false;

     /* PASO 5: Termina */
     return true;
  }


  /**
   * PROCEDIMIENTO : Procedimiento para asentar los movimientos contables de las polizas para este mes
   * @param $cdempresa - clave de la empresa
   * @param $cdejercicio - clave del ejercicio fiscal
   * @param $numes - numero de mes
   * @param $cdusuario- clave del usuario
   * @param $conexion - conexion a la base de datos
   * @return true / false
   */
  function updArrastrarSaldos($cdempresa, $cdejercicio, $nuanterior, $nuactual, $cdusuario, $conexion) {

     /* PASO 1: Consulta los saldos anteriores */
     $ocrit1 = new CriterioBean();
     $ocrit1->setcdempresa($cdempresa);
     $ocrit1->setcdejercicio($cdejercicio);
     $ocrit1->setnumes($nuanterior);
     $canteriores = $this->getcSaldoBeans($ocrit1, $conexion) ;

     /* PASO 2: Recorre los saldos */
     foreach($canteriores as $osdo)  { 
        $onew = new SaldoBean();
        $onew->setcdempresa($osdo->getcdempresa());
        $onew->setcdejercicio($osdo->getcdejercicio());
        $onew->setnumes($nuactual);
        $onew->setcdcuenta($osdo->getcdcuenta());
        $onew->setcdusuarioact($cdusuario);
        $onew->setfhactualizado(date("Y-m-d"));
        $onew->setcdctageneral($osdo->getcdctageneral());
        $onew->setimdebeinicial($osdo->getimdebeactual());
        $onew->setimhaberinicial($osdo->getimhaberactual());
        $bres = $this->addSaldoBean($onew, $conexion);
        if($bres==false) return false;
     }

     /* PASO 3: actualiza el estatus del mes anterior*/
     $omes = $this->getMesBean($cdempresa, $cdejercicio, $nuanterior, $conexion);
     $omes->setstcorte("03");
     $bres =  $this->updMesBean($omes, $conexion);
     if($bres==false) return false;

     /* PASO 4: actualiza el estatus del mes actual */
     $omes = $this->getMesBean($cdempresa, $cdejercicio, $nuactual, $conexion);
     $omes->setstcorte("01");
     $bres =  $this->updMesBean($omes, $conexion);
     if($bres==false) return false;

     /* PASO 5: Termina */
     return true;
  }


  
//////////////////////////////////////////////////////////////////////////
//                           DELETE CODE
//////////////////////////////////////////////////////////////////////////
  /**
   * PROCEDIMIENTO : Eliminacion de un objeto tipo PolizaBean
   * @param $odel - objeto tipo PolizaBean para eliminar
   * @param $conexion - conexion a la base de datos
   * @return true / false
   */
  function delPolizaBean($odel, $conexion) {
    $bresult = $this->odb->delPolizaBean($odel, $conexion);
    if($bresult==true) {
       if($odel->getlkpoliza()!='') 
         $this->delArchivoLink($odel->getcdempresa(), $odel->getlkpoliza());
       $ocrit = new CriterioBean();
       $ocrit->setcdempresa($odel->getcdempresa());
       $ocrit->setcdpoliza($odel->getcdpoliza());
       $cmovtos = $this->getMovimientoBeans($ocrit, $conexion);
       foreach($cmovtos as $orow)  {
         $this->delMovimientoBean($orow, $conexion);
       }
    }
    return $bresult;
  }  
  
  /**
   * PROCEDIMIENTO : Eliminacion de un objeto tipo MovimientoBean
   * @param $odel - objeto tipo MovimientoBean para eliminar
   * @param $conexion - conexion a la base de datos
   * @return true / false
   */
  function delMovimientoBean($odel, $conexion) {
    $bresult = $this->odb->delMovimientoBean($odel, $conexion);
    if($bresult==true && $odel->getlkcomprobante()!='') 
       $this->delArchivoLink($odel->getcdempresa(), $odel->getlkcomprobante());
    return $bresult;
  }

  /**
   * PROCEDIMIENTO : Eliminacion de un archivo adjunto
   * @param $cdempresa - clave de la empresa
   * @param $nbarchivo- nombre del archivo
   * @param $conexion - conexion a la base de datos
   * @return true / false
   */
  function delArchivoLink($cdempresa, $nbarchivo) {
       chdir("../".$cdempresa."/img_polizas/"); 
       unlink($nbarchivo);
       chdir("../");
  }  

  /**
   * PROCEDIMIENTO : Eliminacion de un objeto tipo SaldoBean
   * @param $pscdempresa - Clave de la empresa
   * @param $pscdejercicio - Clave del ejercicio fiscal
   * @param $psnumes - Mes en el que se procesa la poliza
   * @param $picdcuenta - Numero de cuenta contable
   * @param $conexion - conexion a la base de datos
   * @return true / false
   */
  function delSaldoBean_key($pscdempresa, $pscdejercicio, $psnumes, $picdcuenta, $conexion) {
    return $this->odb->delSaldoBean_key($pscdempresa, $pscdejercicio, $psnumes, $picdcuenta, $conexion);
    }  


  /**
   * PROCEDIMIENTO : Eliminacion de varios objetos tipo SaldoBean
   * @param $pscdempresa - Clave de la empresa
   * @param $pscdejercicio - Clave del ejercicio fiscal
   * @param $psnumes - Mes en el que se procesa la poliza
   * @param $conexion - conexion a la base de datos
   * @return true / false
   */
  function delSaldoBeans($pscdempresa, $pscdejercicio, $psnumes, $conexion) {
   
    /* PASO 1: Elimina los registros del saldo del mes */
    $res = $this->odb->delSaldoBeans($pscdempresa, $pscdejercicio, $psnumes, $conexion);
    if($res==false) return false;

    /* PASO 2: Reversa las polizas y sus movimientos */
    $res = $this->odb->updReversaMovtos($pscdempresa, $pscdejercicio, $psnumes, $conexion);
    if($res==false) return false;

    /* PASO 3: Actualiza la informacion del Mes */
    $omes = $this->getMesBean($pscdempresa, $pscdejercicio, $psnumes, $conexion);
    $omes->setstcorte('00');   
    return $this->updMesBean($omes, $conexion);
  }  

  
} /* fin clase [BIZGeneral] */

?>

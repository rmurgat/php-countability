<?php
require_once("../comun/CriterioBean.php");
require_once("../util/Utilerias.php"); 

/**
 * @name: DBCatalogos
 * Descripcion: 
 * Clase de acceso a la base de datos para el proyecto
 * @creation date: (22-Jun-2010)
 * @author Ruben Murga Tapia
 * @conpany: HANYGEN SOFTWARE S.A. DE C.V.
 */
class DBCatalogos {
  var $resultado;
  
  /**
   * CONSTRUCTOR
  */
  function DBCatalogos() {
  }

//////////////////////////////////////////////////////////////////////////
//                           SELECT CODE
//////////////////////////////////////////////////////////////////////////

  /**
   *  PROCEDIMIENTO: Procedimiento para seleccionar un registro de la tabla con010_tpcuenta
   *  @param $pscdtpcuenta - Clave del tipo de cuenta contable
   *  @param $conexion - conexion a la base de datos
   *  @return $resultado
  */ 
  function getTpcuentaBean($pscdtpcuenta, $conexion) {
    $sql = "SELECT cd_tpcuenta, st_tpcuenta, cd_pais, nb_tpcuenta";
    $sql.= " FROM  CON010_TPCUENTA";
    $sql.= " WHERE cd_tpcuenta='".$pscdtpcuenta."'";
    $resultado = mysql_query($sql, $conexion);
    return $resultado;
  }

  /**
   *  PROCEDIMIENTO : consulta de algunos los registros de la tabla con010_tpcuenta
   *  @param $pscdpais - Clave del pais 
   *  @param $conexion - conexion a la base de datos
   *  @return $resultado
  */ 
  function getTpcuentaBeans($pscdpais, $conexion) {
    $sql = "SELECT cd_tpcuenta, st_tpcuenta, cd_pais, nb_tpcuenta";
    $sql.= " FROM  CON010_TPCUENTA";
    if($pscdpais!="")
        $sql.= " WHERE cd_pais='".$pscdpais."'";
    $resultado = mysql_query($sql, $conexion);
    return $resultado;
  }
  
  /**
   *  PROCEDIMIENTO: Procedimiento para seleccionar un registro de la tabla con020_tpoliza
   *  @param $pscdtpoliza - Clave del tipo de poliza
   *  @param $conexion - conexion a la base de datos
   *  @return $resultado
  */ 
  function getTpolizaBean($pscdtpoliza, $conexion) {
    $sql = "SELECT cd_tpoliza, st_tpoliza, cd_pais, nb_tpoliza";
    $sql.= " FROM  CON020_TPOLIZA";
    $sql.= " WHERE cd_tpoliza='".$pscdtpoliza."'";
    $resultado = mysql_query($sql, $conexion);
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
    if($pscdpais!="")
        $sql.= " WHERE cd_pais='".$pscdpais."'";
    $resultado = mysql_query($sql, $conexion);
    return $resultado;
  }
  
  /**
   *  PROCEDIMIENTO: Procedimiento para seleccionar un registro de la tabla con030_tpago
   *  @param $pscdtpago - Clave del tipo de pago
   *  @param $conexion - conexion a la base de datos
   *  @return $resultado
  */ 
  function getTpagoBean($pscdtpago, $conexion) {
    $sql = "SELECT cd_tpago, st_tpago, cd_pais, nb_pago";
    $sql.= " FROM  CON030_TPAGO";
    $sql.= " WHERE cd_tpago='".$pscdtpago."'";
    $resultado = mysql_query($sql, $conexion);
    return $resultado;
  }

  /**
   *  PROCEDIMIENTO : consulta de algunos los registros de la tabla con030_tpago
   *  @param $pscdpais - Clave del pais de pago
   *  @param $conexion - conexion a la base de datos
   *  @return $resultado
  */ 
  function getTpagoBeans($pscdpais, $conexion) {
    $sql = "SELECT cd_tpago, st_tpago, cd_pais, nb_pago";
    $sql.= " FROM  CON030_TPAGO";
    if($pscdpais!="")
        $sql.= " WHERE cd_pais='".$pscdpais."'";
    $resultado = mysql_query($sql, $conexion);
    return $resultado;
  }
  
  /**
   *  PROCEDIMIENTO: Procedimiento para seleccionar un registro de la tabla con040_concepto
   *  @param $pscdconcepto - Clave del concepto contable
   *  @param $conexion - conexion a la base de datos
   *  @return $resultado
  */ 
  function getConceptoBean($pscdconcepto, $conexion) {
    $sql = "SELECT cd_concepto, st_concepto, cd_pais, nb_concepto";
    $sql.= " FROM  CON040_CONCEPTO";
    $sql.= " WHERE cd_concepto='".$pscdconcepto."'";
    $resultado = mysql_query($sql, $conexion);
    return $resultado;
  }

  /**
   *  PROCEDIMIENTO : consulta de algunos los registros de la tabla con040_concepto
   *  @param $pscdpais - Clave del pais
   *  @param $conexion - conexion a la base de datos
   *  @return $resultado
  */ 
  function getConceptoBeans($pscdpais, $conexion) {
    $sql = "SELECT cd_concepto, st_concepto, cd_pais, nb_concepto";
    $sql.= " FROM  CON040_CONCEPTO";
    if($pscdpais!="")
        $sql.= " WHERE cd_pais='".$pscdpais."'";
    $resultado = mysql_query($sql, $conexion);
    return $resultado;
  }
  
  /**
   *  PROCEDIMIENTO: Procedimiento para seleccionar un registro de la tabla con050_tpcomprob
   *  @param $pscdtpcomprobante - Clave del tipo de comprobante o documento(factura, honorarios...)
   *  @param $conexion - conexion a la base de datos
   *  @return $resultado
  */ 
  function getTpcomproBean($pscdtpcomprobante, $conexion) {
    $sql = "SELECT cd_tpcomprobante, cd_pais, st_tpcomprob, nb_tpcomprob";
    $sql.= " FROM  CON050_TPCOMPROB";
    $sql.= " WHERE cd_tpcomprobante='".$pscdtpcomprobante."'";
    $resultado = mysql_query($sql, $conexion);
    return $resultado;
  }

  /**
   *  PROCEDIMIENTO : consulta de algunos los registros de la tabla con050_tpcomprob
   *  @param $pscdpais - Clave del pais
   *  @param $conexion - conexion a la base de datos
   *  @return $resultado
  */ 
  function getTpcomproBeans($pscdpais, $conexion) {
    $sql = "SELECT cd_tpcomprobante, cd_pais, st_tpcomprob, nb_tpcomprob";
    $sql.= " FROM  CON050_TPCOMPROB";
    if($pscdpais!="")
        $sql.= " WHERE cd_pais='".$pscdpais."'";
    $resultado = mysql_query($sql, $conexion);
    return $resultado;
  }
  
  /**
   *  PROCEDIMIENTO: Procedimiento para seleccionar un registro de la tabla con060_estado
   *  @param $pscdestado - Clave del estado
   *  @param $conexion - conexion a la base de datos
   *  @return $resultado
  */ 
  function getEstadoBean($pscdestado, $conexion) {
    $sql = "SELECT cd_estado, cd_pais, nb_estado";
    $sql.= " FROM  CON060_ESTADO";
    $sql.= " WHERE cd_estado='".$pscdestado."'";
    $resultado = mysql_query($sql, $conexion);
    return $resultado;
  }

  /**
   *  PROCEDIMIENTO : consulta todos los registros de la tabla con060_estado
   *  @param $conexion - conexion a la base de datos
   *  @return $resultado
  */ 
  function getEstadoBeans($conexion) {
    $sql = "SELECT cd_estado, cd_pais, nb_estado";
    $sql.= " FROM  CON060_ESTADO";
    $resultado = mysql_query($sql, $conexion);
    return $resultado;
  }
  
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
   *  @param $conexion - conexion a la base de datos
   *  @return $resultado
  */ 
  function getPaisBeans($conexion) {
    $sql = "SELECT cd_pais, nb_pais";
    $sql.= " FROM  CON070_PAIS";
    $sql.= " ORDER BY nb_pais";
    $resultado = mysql_query($sql, $conexion);
    return $resultado;
  }

  /**
   *  PROCEDIMIENTO: Procedimiento para seleccionar un registro de la tabla con180_cliente
   *  @param $pscdempresa - Clave de la empresa
   *  @param $pscdcliente - Clave del cliente
   *  @param $conexion - conexion a la base de datos
   *  @return $resultado
  */ 
  function getClienteBean($pscdempresa, $pscdcliente, $conexion) {
    $sql = "SELECT cd_empresa, cd_cliente, cd_estado, st_cliente, st_iva, po_iva, cd_rfc, nu_telefono, nb_cliente, nb_razonsocial, tx_direccion";
    $sql.= " FROM  CON180_CLIENTE";
    $sql.= " WHERE cd_empresa='".$pscdempresa."'";
    $sql.= " AND   cd_cliente='".$pscdcliente."'";
    $resultado = mysql_query($sql, $conexion);
    return $resultado;
  }

  /**
   *  PROCEDIMIENTO : consulta de algunos los registros de la tabla con180_cliente
   *  @param $pocrit - Criterios de consulta
   *  @param $conexion - conexion a la base de datos
   *  @return $resultado
  */    
  function getClienteBeans($pocrit, $conexion) {
    $sql = "SELECT cd_empresa, cd_cliente, cd_estado, st_cliente, st_iva, po_iva, cd_rfc, nu_telefono, nb_cliente, nb_razonsocial, tx_direccion";
    $sql.= " FROM  CON180_CLIENTE";
/*    $sql.= " WHERE cd_empresa='".$pscdempresa."'";
    $sql.= " AND   cd_cliente='".$pscdcliente."'"; */
    $resultado = mysql_query($sql, $conexion);
    return $resultado;
  }
  
  /**
   *  PROCEDIMIENTO: Procedimiento para seleccionar un registro de la tabla con190_docto_cliente
   *  @param $pscdempresa - Clave de la empresa
   *  @param $pscdcliente - Clave del cliente
   *  @param $pscddocumento - Clave del documento
   *  @param $conexion - conexion a la base de datos
   *  @return $resultado
  */ 
  function getDoctoClienteBean($pscdempresa, $pscdcliente, $pscddocumento, $conexion) {
    $sql = "SELECT cd_empresa, cd_cliente, cd_documento, st_documento, nb_documento, lk_documento";
    $sql.= " FROM  CON190_DOCTO_CLIENTE";
    $sql.= " WHERE cd_empresa='".$pscdempresa."'";
    $sql.= " AND   cd_cliente='".$pscdcliente."'";
    $sql.= " AND   cd_documento='".$pscddocumento."'";
    $resultado = mysql_query($sql, $conexion);
    return $resultado;
  }

  /**
   *  PROCEDIMIENTO : consulta de algunos los registros de la tabla con190_docto_cliente
   *  @param $pscdempresa - Clave de la empresa
   *  @param $pscdcliente - Clave del cliente
   *  @param $pscddocumento - Clave del documento
   *  @param $conexion - conexion a la base de datos
   *  @return $resultado
  */ 
  function getDoctoClienteBeans($pscdempresa, $pscdcliente, $pscddocumento, $conexion) {
    $sql = "SELECT cd_empresa, cd_cliente, cd_documento, st_documento, nb_documento, lk_documento";
    $sql.= " FROM  CON190_DOCTO_CLIENTE";
    $sql.= " WHERE cd_empresa='".$pscdempresa."'";
    $sql.= " AND   cd_cliente='".$pscdcliente."'";
    $sql.= " AND   cd_documento='".$pscddocumento."'";
    $resultado = mysql_query($sql, $conexion);
    return $resultado;
  }
  
  /**
   *  PROCEDIMIENTO : consulta todos los registros de la tabla con190_docto_cliente
   *  @param $conexion - conexion a la base de datos
   *  @return $resultado
  */ 
  function getallDoctoClienteBeans($conexion) {
  
    $sql = "SELECT cd_empresa, cd_cliente, cd_documento, st_documento, nb_documento, lk_documento";
    $sql.= " FROM  CON190_DOCTO_CLIENTE";
    $resultado = mysql_query($sql, $conexion);
    return $resultado;
  }

  /**
   *  PROCEDIMIENTO: Procedimiento para seleccionar un registro de la tabla con200_contacto_cliente
   *  @param $pscdempresa - Clave de la empresa
   *  @param $pscdcliente - Clave del cliente
   *  @param $pscdcontacto - Clave del contacto
   *  @param $conexion - conexion a la base de datos
   *  @return $resultado
  */ 
  function getContactoClienteBean($pscdempresa, $pscdcliente, $pscdcontacto, $conexion) {
    $sql = "SELECT cd_empresa, cd_cliente, cd_contacto";
    $sql.= " FROM  CON200_CONTACTO_CLIENTE";
    $sql.= " WHERE cd_empresa='".$pscdempresa."'";
    $sql.= " AND   cd_cliente='".$pscdcliente."'";
    $sql.= " AND   cd_contacto='".$pscdcontacto."'";
    $resultado = mysql_query($sql, $conexion);
    return $resultado;
  }

  /**
   *  PROCEDIMIENTO : consulta de algunos los registros de la tabla con200_contacto_cliente
   *  @param $pscdempresa - Clave de la empresa
   *  @param $pscdcliente - Clave del cliente
   *  @param $pscdcontacto - Clave del contacto
   *  @param $conexion - conexion a la base de datos
   *  @return $resultado
  */ 
  function getContactoClienteBeans($pscdempresa, $pscdcliente, $pscdcontacto, $conexion) {
    $sql = "SELECT cd_empresa, cd_cliente, cd_contacto";
    $sql.= " FROM  CON200_CONTACTO_CLIENTE";
    $sql.= " WHERE cd_empresa='".$pscdempresa."'";
    $sql.= " AND   cd_cliente='".$pscdcliente."'";
    $sql.= " AND   cd_contacto='".$pscdcontacto."'";
    $resultado = mysql_query($sql, $conexion);
    return $resultado;
  }
  
  /**
   *  PROCEDIMIENTO : consulta todos los registros de la tabla con200_contacto_cliente
   *  @param $conexion - conexion a la base de datos
   *  @return $resultado
  */ 
  function getallContactoClienteBeans($conexion) {
  
    $sql = "SELECT cd_empresa, cd_cliente, cd_contacto";
    $sql.= " FROM  CON200_CONTACTO_CLIENTE";
    $resultado = mysql_query($sql, $conexion);
    return $resultado;
  }

  /**
   *  PROCEDIMIENTO: Procedimiento para seleccionar un registro de la tabla con210_contacto
   *  @param $pscdempresa - Clave de la empresa
   *  @param $pscdcontacto - Clave del contacto
   *  @param $conexion - conexion a la base de datos
   *  @return $resultado
  */ 
  function getContactoBean($pscdempresa, $pscdcontacto, $conexion) {
    $sql = "SELECT cd_empresa, cd_contacto, st_contacto, nu_telefono, nu_movil, nb_contacto, tx_direccion, tx_comment";
    $sql.= " FROM  CON210_CONTACTO";
    $sql.= " WHERE cd_empresa='".$pscdempresa."'";
    $sql.= " AND   cd_contacto='".$pscdcontacto."'";
    $resultado = mysql_query($sql, $conexion);
    return $resultado;
  }

  /**
   *  PROCEDIMIENTO : consulta de algunos los registros de la tabla con210_contacto
   *  @param $pscdempresa - Clave de la empresa
   *  @param $pscdcontacto - Clave del contacto
   *  @param $conexion - conexion a la base de datos
   *  @return $resultado
  */ 
  function getContactoBeans($pscdempresa, $pscdcontacto, $conexion) {
    $sql = "SELECT cd_empresa, cd_contacto, st_contacto, nu_telefono, nu_movil, nb_contacto, tx_direccion, tx_comment";
    $sql.= " FROM  CON210_CONTACTO";
    $sql.= " WHERE cd_empresa='".$pscdempresa."'";
    $sql.= " AND   cd_contacto='".$pscdcontacto."'";
    $resultado = mysql_query($sql, $conexion);
    return $resultado;
  }
  
  /**
   *  PROCEDIMIENTO : consulta todos los registros de la tabla con210_contacto
   *  @param $conexion - conexion a la base de datos
   *  @return $resultado
  */ 
  function getallContactoBeans($conexion) {
  
    $sql = "SELECT cd_empresa, cd_contacto, st_contacto, nu_telefono, nu_movil, nb_contacto, tx_direccion, tx_comment";
    $sql.= " FROM  CON210_CONTACTO";
    $resultado = mysql_query($sql, $conexion);
    return $resultado;
  }

  /**
   *  PROCEDIMIENTO: Procedimiento para seleccionar un registro de la tabla con220_contacto_proveedor
   *  @param $pscdempresa - Clave de la empresa
   *  @param $pscdproveedor - Clave del proveedor
   *  @param $pscdcontacto - Clave del contacto
   *  @param $conexion - conexion a la base de datos
   *  @return $resultado
  */ 
  function getContactoProveedorBean($pscdempresa, $pscdproveedor, $pscdcontacto, $conexion) {
    $sql = "SELECT cd_empresa, cd_proveedor, cd_contacto";
    $sql.= " FROM  CON220_CONTACTO_PROVEEDOR";
    $sql.= " WHERE cd_empresa='".$pscdempresa."'";
    $sql.= " AND   cd_proveedor='".$pscdproveedor."'";
    $sql.= " AND   cd_contacto='".$pscdcontacto."'";
    $resultado = mysql_query($sql, $conexion);
    return $resultado;
  }

  /**
   *  PROCEDIMIENTO : consulta de algunos los registros de la tabla con220_contacto_proveedor
   *  @param $pscdempresa - Clave de la empresa
   *  @param $pscdproveedor - Clave del proveedor
   *  @param $pscdcontacto - Clave del contacto
   *  @param $conexion - conexion a la base de datos
   *  @return $resultado
  */ 
  function getContactoProveedorBeans($pscdempresa, $pscdproveedor, $pscdcontacto, $conexion) {
    $sql = "SELECT cd_empresa, cd_proveedor, cd_contacto";
    $sql.= " FROM  CON220_CONTACTO_PROVEEDOR";
    $sql.= " WHERE cd_empresa='".$pscdempresa."'";
    $sql.= " AND   cd_proveedor='".$pscdproveedor."'";
    $sql.= " AND   cd_contacto='".$pscdcontacto."'";
    $resultado = mysql_query($sql, $conexion);
    return $resultado;
  }
  
  /**
   *  PROCEDIMIENTO : consulta todos los registros de la tabla con220_contacto_proveedor
   *  @param $conexion - conexion a la base de datos
   *  @return $resultado
  */ 
  function getallContactoProveedorBeans($conexion) {
  
    $sql = "SELECT cd_empresa, cd_proveedor, cd_contacto";
    $sql.= " FROM  CON220_CONTACTO_PROVEEDOR";
    $resultado = mysql_query($sql, $conexion);
    return $resultado;
  }

  /**
   *  PROCEDIMIENTO: Procedimiento para seleccionar un registro de la tabla con230_docto_proveedor
   *  @param $pscdempresa - Clave de la empresa
   *  @param $pscdproveedor - Clave del proveedor
   *  @param $pscddocumento - Clave del documento
   *  @param $conexion - conexion a la base de datos
   *  @return $resultado
  */ 
  function getDoctoProveedorBean($pscdempresa, $pscdproveedor, $pscddocumento, $conexion) {
    $sql = "SELECT cd_empresa, cd_proveedor, cd_documento, st_documento, nb_documento, lk_documento";
    $sql.= " FROM  CON230_DOCTO_PROVEEDOR";
    $sql.= " WHERE cd_empresa='".$pscdempresa."'";
    $sql.= " AND   cd_proveedor='".$pscdproveedor."'";
    $sql.= " AND   cd_documento='".$pscddocumento."'";
    $resultado = mysql_query($sql, $conexion);
    return $resultado;
  }

  /**
   *  PROCEDIMIENTO : consulta de algunos los registros de la tabla con230_docto_proveedor
   *  @param $pscdempresa - Clave de la empresa
   *  @param $pscdproveedor - Clave del proveedor
   *  @param $pscddocumento - Clave del documento
   *  @param $conexion - conexion a la base de datos
   *  @return $resultado
  */ 
  function getDoctoProveedorBeans($pscdempresa, $pscdproveedor, $pscddocumento, $conexion) {
    $sql = "SELECT cd_empresa, cd_proveedor, cd_documento, st_documento, nb_documento, lk_documento";
    $sql.= " FROM  CON230_DOCTO_PROVEEDOR";
    $sql.= " WHERE cd_empresa='".$pscdempresa."'";
    $sql.= " AND   cd_proveedor='".$pscdproveedor."'";
    $sql.= " AND   cd_documento='".$pscddocumento."'";
    $resultado = mysql_query($sql, $conexion);
    return $resultado;
  }
  
  /**
   *  PROCEDIMIENTO : consulta todos los registros de la tabla con230_docto_proveedor
   *  @param $conexion - conexion a la base de datos
   *  @return $resultado
  */ 
  function getallDoctoProveedorBeans($conexion) {
  
    $sql = "SELECT cd_empresa, cd_proveedor, cd_documento, st_documento, nb_documento, lk_documento";
    $sql.= " FROM  CON230_DOCTO_PROVEEDOR";
    $resultado = mysql_query($sql, $conexion);
    return $resultado;
  }

  /**
   *  PROCEDIMIENTO: Procedimiento para seleccionar un registro de la tabla con240_proveedor
   *  @param $pscdempresa - Clave de la empresa
   *  @param $pscdproveedor - Clave del proveedor
   *  @param $conexion - conexion a la base de datos
   *  @return $resultado
  */ 
  function getProveedorBean($pscdempresa, $pscdproveedor, $conexion) {
    $sql = "SELECT cd_empresa, cd_proveedor, st_proveedor, st_aplicariva, st_reteneriva, st_retenerisr, cd_estado, po_iva, cd_rfc, nu_telefono, nb_proveedor, nb_razonsocial, tx_direccion, tx_comment";
    $sql.= " FROM  CON240_PROVEEDOR";
    $sql.= " WHERE cd_empresa='".$pscdempresa."'";
    $sql.= " AND   cd_proveedor='".$pscdproveedor."'";
    $resultado = mysql_query($sql, $conexion);
    return $resultado;
  }

  /**
   *  PROCEDIMIENTO : consulta de algunos los registros de la tabla con240_proveedor
   *  @param $pocrit - Criterios de consulta
   *  @param $conexion - conexion a la base de datos
   *  @return $resultado
  */ 
  function getProveedorBeans($pocrit, $conexion) {
    $sql = "SELECT cd_empresa, cd_proveedor, st_proveedor, st_aplicariva, st_reteneriva, st_retenerisr, cd_estado, po_iva, cd_rfc, nu_telefono, nb_proveedor, nb_razonsocial, tx_direccion, tx_comment";
    $sql.= " FROM  CON240_PROVEEDOR";
/*    $sql.= " WHERE cd_empresa='".$pscdempresa."'";
    $sql.= " AND   cd_proveedor='".$pscdproveedor."'";   */
    $resultado = mysql_query($sql, $conexion);
    return $resultado;
  }
  
  /**
   *  PROCEDIMIENTO: Procedimiento para seleccionar un registro de la tabla con150_cuenta
   *  @param $pscdempresa - Clave de la empresa a la que pertenece la cuenta contable
   *  @param $pscdejercicio - Clave del ejercicio fiscal
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
    if($swhere!='') $sql.=" WHERE ".$swhere;
    $sql.= " ORDER BY cd_empresa, nu_cuenta";
    $resultado = mysql_query($sql, $conexion);
    return $resultado;
  }

  /**
   * PROCEDIMIENTO : consulta de algunos los registros de la tabla con110_ejercicio en base a un criterio
   * @param $conexion - conexion a la base de datos
   * @return $resultado
  */ 
  function getEjercicioBeans($conexion) {
    $outil = new Utilerias();
    $swhere ="";

    $sql = "SELECT cd_empresa, cd_ejercicio, st_ejercicio, fh_inicio, fh_termino";
    $sql.= " FROM  CON110_EJERCICIO";
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
    $sql = "SELECT cd_session, cd_empresa, cd_perfil, cd_usuario, fh_session";
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
   *  PROCEDIMIENTO: Procedimiento para consultar el ultimo id de la tabla CON010_TPCUENTA
   *  @param $conexion - conexion a la base de datos
   *  @return $resultado
  */ 
  function getlastTpcuentaBean($conexion) {
    $swhere ="";
    $sql = "SELECT MAX(cd_tpcuenta)";
    $sql.= " FROM  CON010_TPCUENTA";
    $resultado = mysql_query($sql, $conexion);
    return $resultado;
  }

  /**
   *  PROCEDIMIENTO: Procedimiento para consultar el ultimo id de la tabla CON020_TPOLIZA
   *  @param $conexion - conexion a la base de datos
   *  @return $resultado
  */ 
  function getlastTpolizaBean($conexion) {
    $swhere ="";
    $sql = "SELECT MAX(cd_tpoliza)";
    $sql.= " FROM  CON020_TPOLIZA";
    $resultado = mysql_query($sql, $conexion);
    return $resultado;
  }

  /**
   *  PROCEDIMIENTO: Procedimiento para consultar el ultimo id de la tabla CON030_TPAGO
   *  @param $conexion - conexion a la base de datos
   *  @return $resultado
  */ 
  function getlastTpagoBean($conexion) {
    $swhere ="";
    $sql = "SELECT MAX(cd_tpago)";
    $sql.= " FROM  CON030_TPAGO";
    $resultado = mysql_query($sql, $conexion);
    return $resultado;
  }

  /**
   *  PROCEDIMIENTO: Procedimiento para consultar el ultimo id de la tabla CON040_CONCEPTO
   *  @param $conexion - conexion a la base de datos
   *  @return $resultado
  */ 
  function getlastConceptoBean($conexion) {
    $swhere ="";
    $sql = "SELECT MAX(cd_concepto)";
    $sql.= " FROM  CON040_CONCEPTO";
    $resultado = mysql_query($sql, $conexion);
    return $resultado;
  }

  /**
   *  PROCEDIMIENTO: Procedimiento para consultar el ultimo id de la tabla CON050_TPCOMPROB
   *  @param $conexion - conexion a la base de datos
   *  @return $resultado
  */ 
  function getlastTpcomproBean($conexion) {
    $swhere ="";
    $sql = "SELECT MAX(cd_tpcomprobante)";
    $sql.= " FROM  CON050_TPCOMPROB";
    $resultado = mysql_query($sql, $conexion);
    return $resultado;
  }

  /**
   *  PROCEDIMIENTO: Procedimiento para consultar el ultimo id de la tabla CON180_CLIENTE
   *  @param $cdempresa - clave de la empresa 
   *  @param $conexion - conexion a la base de datos
   *  @return $resultado
  */ 
  function getlastClienteBean($cdempresa, $conexion) {
    $swhere ="";
    $sql = "SELECT MAX(cd_cliente)";
    $sql.= " FROM  CON180_CLIENTE";
    $sql.= " WHERE cd_empresa='".$cdempresa."'";
    $resultado = mysql_query($sql, $conexion);
    return $resultado;
  }

  /**
   *  PROCEDIMIENTO: Procedimiento para consultar el ultimo id de la tabla CON240_PROVEEDOR
   *  @param $cdempresa - clave de la empresa 
   *  @param $conexion - conexion a la base de datos
   *  @return $resultado
  */ 
  function getlastProveedorBean($cdempresa, $conexion) {
    $swhere ="";
    $sql = "SELECT MAX(cd_proveedor)";
    $sql.= " FROM CON240_PROVEEDOR";
    $sql.= " WHERE cd_empresa='".$cdempresa."'";
    $resultado = mysql_query($sql, $conexion);
    return $resultado;
  }

  /**
   *  PROCEDIMIENTO: Procedimiento para consultar el ultimo id de la tabla con150_cuenta
   *  @param $cdempresa - clave de la empresa
   *  @param $pscdejercicio - Clave del ejercicio fiscal
   *  @param $conexion - conexion a la base de datos
   *  @return $resultado
  */ 
  function getlastCuentaBean($cdempresa, $pscdejercicio, $conexion) {
    $swhere ="";
    $sql = "SELECT MAX(cd_cuenta)";
    $sql.= " FROM  CON150_CUENTA";
    $sql.= " WHERE cd_empresa='".$cdempresa."'";
    $sql.= "    AND   cd_ejercicio=".$pscdejercicio;
    $resultado = mysql_query($sql, $conexion);
    return $resultado;
  }

//////////////////////////////////////////////////////////////////////////
//                           INSERT CODE
//////////////////////////////////////////////////////////////////////////
  /**
   * PROCEDIMIENTO : inserta un registro nuevo en tabla con010_tpcuenta
   * @param $oadd - objeto tipo TpcuentaBean a insertar
   * @param $conexion - conexion a la base de datos
   * @return true / false
  */
  function addTpcuentaBean($oadd, $conexion) {
    
      $sql = "INSERT INTO CON010_TPCUENTA";
      $sql.= "(cd_tpcuenta, st_tpcuenta, cd_pais, nb_tpcuenta)";
      $sql.= " VALUES ('".$oadd->getcdtpcuenta()."','".$oadd->getsttpcuenta()."','".$oadd->getcdpais()."','".$oadd->getnbtpcuenta()."')";
      $resultado = mysql_query($sql, $conexion); 
      return $resultado;
    }

  /**
   * PROCEDIMIENTO : inserta un registro nuevo en tabla con020_tpoliza
   * @param $oadd - objeto tipo TpolizaBean a insertar
   * @param $conexion - conexion a la base de datos
   * @return true / false
  */
  function addTpolizaBean($oadd, $conexion) {
    
      $sql = "INSERT INTO CON020_TPOLIZA";
      $sql.= "(cd_tpoliza, st_tpoliza, cd_pais, nb_tpoliza)";
      $sql.= " VALUES ('".$oadd->getcdtpoliza()."','".$oadd->getsttpoliza()."','".$oadd->getcdpais()."','".$oadd->getnbtpoliza()."')";
      $resultado = mysql_query($sql, $conexion); 
      return $resultado;
    }

  /**
   * PROCEDIMIENTO : inserta un registro nuevo en tabla con030_tpago
   * @param $oadd - objeto tipo TpagoBean a insertar
   * @param $conexion - conexion a la base de datos
   * @return true / false
  */
  function addTpagoBean($oadd, $conexion) {
    
      $sql = "INSERT INTO CON030_TPAGO";
      $sql.= "(cd_tpago, st_tpago, cd_pais, nb_pago)";
      $sql.= " VALUES ('".$oadd->getcdtpago()."','".$oadd->getsttpago()."','".$oadd->getcdpais()."','".$oadd->getnbpago()."')";
      $resultado = mysql_query($sql, $conexion); 
      return $resultado;
    }

  /**
   * PROCEDIMIENTO : inserta un registro nuevo en tabla con040_concepto
   * @param $oadd - objeto tipo ConceptoBean a insertar
   * @param $conexion - conexion a la base de datos
   * @return true / false
  */
  function addConceptoBean($oadd, $conexion) {
    
      $sql = "INSERT INTO CON040_CONCEPTO";
      $sql.= "(cd_concepto, st_concepto, cd_pais, nb_concepto)";
      $sql.= " VALUES ('".$oadd->getcdconcepto()."','".$oadd->getstconcepto()."','".$oadd->getcdpais()."','".$oadd->getnbconcepto()."')";
      $resultado = mysql_query($sql, $conexion); 
      return $resultado;
    }

  /**
   * PROCEDIMIENTO : inserta un registro nuevo en tabla con050_tpcomprob
   * @param $oadd - objeto tipo TpcomproBean a insertar
   * @param $conexion - conexion a la base de datos
   * @return true / false
  */
  function addTpcomproBean($oadd, $conexion) {
    
      $sql = "INSERT INTO CON050_TPCOMPROB";
      $sql.= "(cd_tpcomprobante, cd_pais, st_tpcomprob, nb_tpcomprob)";
      $sql.= " VALUES ('".$oadd->getcdtpcomprobante()."','".$oadd->getcdpais()."','".$oadd->getsttpcomprob()."','".$oadd->getnbtpcomprob()."')";
      $resultado = mysql_query($sql, $conexion); 
      return $resultado;
    }

  /**
   * PROCEDIMIENTO : inserta un registro nuevo en tabla con060_estado
   * @param $oadd - objeto tipo EstadoBean a insertar
   * @param $conexion - conexion a la base de datos
   * @return true / false
  */
  function addEstadoBean($oadd, $conexion) {
    
      $sql = "INSERT INTO CON060_ESTADO";
      $sql.= "(cd_estado, cd_pais, nb_estado)";
      $sql.= " VALUES ('".$oadd->getcdestado()."','".$oadd->getcdpais()."','".$oadd->getnbestado()."')";
      $resultado = mysql_query($sql, $conexion); 
      return $resultado;
    }

  /**
   * PROCEDIMIENTO : inserta un registro nuevo en tabla con070_pais
   * @param $oadd - objeto tipo PaisBean a insertar
   * @param $conexion - conexion a la base de datos
   * @return true / false
  */
  function addPaisBean($oadd, $conexion) {
    
      $sql = "INSERT INTO CON070_PAIS";
      $sql.= "(cd_pais, nb_pais)";
      $sql.= " VALUES ('".$oadd->getcdpais()."','".$oadd->getnbpais()."')";
      $resultado = mysql_query($sql, $conexion); 
      return $resultado;
    }

  /**
   * PROCEDIMIENTO : inserta un registro nuevo en tabla con180_cliente
   * @param $oadd - objeto tipo ClienteBean a insertar
   * @param $conexion - conexion a la base de datos
   * @return true / false
  */
  function addClienteBean($oadd, $conexion) {
    
      $sql = "INSERT INTO CON180_CLIENTE";
      $sql.= "(cd_empresa, cd_cliente, cd_estado, st_cliente, st_iva, po_iva, cd_rfc, nu_telefono, nb_cliente, nb_razonsocial, tx_direccion)";
      $sql.= " VALUES ('".$oadd->getcdempresa()."','".$oadd->getcdcliente()."','".$oadd->getcdestado()."','".$oadd->getstcliente()."','".$oadd->getstiva()."',".$oadd->getpoiva().",'".$oadd->getcdrfc()."','".$oadd->getnutelefono()."','".$oadd->getnbcliente()."','".$oadd->getnbrazonsocial()."','".$oadd->gettxdireccion()."')";
      $resultado = mysql_query($sql, $conexion); 
      return $resultado;
    }

  /**
   * PROCEDIMIENTO : inserta un registro nuevo en tabla con190_docto_cliente
   * @param $oadd - objeto tipo DoctoClienteBean a insertar
   * @param $conexion - conexion a la base de datos
   * @return true / false
  */
  function addDoctoClienteBean($oadd, $conexion) {
    
      $sql = "INSERT INTO CON190_DOCTO_CLIENTE";
      $sql.= "(cd_empresa, cd_cliente, cd_documento, st_documento, nb_documento, lk_documento)";
      $sql.= " VALUES ('".$oadd->getcdempresa()."','".$oadd->getcdcliente()."','".$oadd->getcddocumento()."','".$oadd->getstdocumento()."','".$oadd->getnbdocumento()."','".$oadd->getlkdocumento()."')";
      $resultado = mysql_query($sql, $conexion); 
      return $resultado;
    }

  /**
   * PROCEDIMIENTO : inserta un registro nuevo en tabla con200_contacto_cliente
   * @param $oadd - objeto tipo ContactoClienteBean a insertar
   * @param $conexion - conexion a la base de datos
   * @return true / false
  */
  function addContactoClienteBean($oadd, $conexion) {
    
      $sql = "INSERT INTO CON200_CONTACTO_CLIENTE";
      $sql.= "(cd_empresa, cd_cliente, cd_contacto)";
      $sql.= " VALUES ('".$oadd->getcdempresa()."','".$oadd->getcdcliente()."','".$oadd->getcdcontacto()."')";
      $resultado = mysql_query($sql, $conexion); 
      return $resultado;
    }

  /**
   * PROCEDIMIENTO : inserta un registro nuevo en tabla con210_contacto
   * @param $oadd - objeto tipo ContactoBean a insertar
   * @param $conexion - conexion a la base de datos
   * @return true / false
  */
  function addContactoBean($oadd, $conexion) {
    
      $sql = "INSERT INTO CON210_CONTACTO";
      $sql.= "(cd_empresa, cd_contacto, st_contacto, nu_telefono, nu_movil, nb_contacto, tx_direccion, tx_comment)";
      $sql.= " VALUES ('".$oadd->getcdempresa()."','".$oadd->getcdcontacto()."','".$oadd->getstcontacto()."','".$oadd->getnutelefono()."','".$oadd->getnumovil()."','".$oadd->getnbcontacto()."','".$oadd->gettxdireccion()."','".$oadd->gettxcomment()."')";
      $resultado = mysql_query($sql, $conexion); 
      return $resultado;
    }

  /**
   * PROCEDIMIENTO : inserta un registro nuevo en tabla con220_contacto_proveedor
   * @param $oadd - objeto tipo ContactoProveedorBean a insertar
   * @param $conexion - conexion a la base de datos
   * @return true / false
  */
  function addContactoProveedorBean($oadd, $conexion) {
    
      $sql = "INSERT INTO CON220_CONTACTO_PROVEEDOR";
      $sql.= "(cd_empresa, cd_proveedor, cd_contacto)";
      $sql.= " VALUES ('".$oadd->getcdempresa()."','".$oadd->getcdproveedor()."','".$oadd->getcdcontacto()."')";
      $resultado = mysql_query($sql, $conexion); 
      return $resultado;
    }

  /**
   * PROCEDIMIENTO : inserta un registro nuevo en tabla con230_docto_proveedor
   * @param $oadd - objeto tipo DoctoProveedorBean a insertar
   * @param $conexion - conexion a la base de datos
   * @return true / false
  */
  function addDoctoProveedorBean($oadd, $conexion) {
    
      $sql = "INSERT INTO CON230_DOCTO_PROVEEDOR";
      $sql.= "(cd_empresa, cd_proveedor, cd_documento, st_documento, nb_documento, lk_documento)";
      $sql.= " VALUES ('".$oadd->getcdempresa()."','".$oadd->getcdproveedor()."','".$oadd->getcddocumento()."','".$oadd->getstdocumento()."','".$oadd->getnbdocumento()."','".$oadd->getlkdocumento()."')";
      $resultado = mysql_query($sql, $conexion); 
      return $resultado;
    }

  /**
   * PROCEDIMIENTO : inserta un registro nuevo en tabla con240_proveedor
   * @param $oadd - objeto tipo ProveedorBean a insertar
   * @param $conexion - conexion a la base de datos
   * @return true / false
  */
  function addProveedorBean($oadd, $conexion) {
    
      $sql = "INSERT INTO CON240_PROVEEDOR";
      $sql.= "(cd_empresa, cd_proveedor, st_proveedor, st_aplicariva, st_reteneriva, st_retenerisr, cd_estado, po_iva, cd_rfc, nu_telefono, nb_proveedor, nb_razonsocial, tx_direccion, tx_comment)";
      $sql.= " VALUES ('".$oadd->getcdempresa()."','".$oadd->getcdproveedor()."','".$oadd->getstproveedor()."','".$oadd->getstaplicariva()."','".$oadd->getstreteneriva()."','".$oadd->getstretenerisr()."','".$oadd->getcdestado()."',".$oadd->getpoiva().",'".$oadd->getcdrfc()."','".$oadd->getnutelefono()."','".$oadd->getnbproveedor()."','".$oadd->getnbrazonsocial()."','".$oadd->gettxdireccion()."','".$oadd->gettxcomment()."')";
      $resultado = mysql_query($sql, $conexion); 
      return $resultado;
    }

  /**
   * PROCEDIMIENTO : inserta un registro nuevo en tabla con150_cuenta
   * @param $oadd - objeto tipo CuentaBean a insertar
   * @param $conexion - conexion a la base de datos
   * @return true / false
  */
  function addCuentaBean($oadd, $conexion) {
    
      $sql = "INSERT INTO CON150_CUENTA";
      $sql.= "(cd_empresa, cd_ejercicio, cd_cuenta, nu_nivel, st_cuenta, tp_naturaleza, tp_cuenta, nu_cuenta, nb_cuenta, tx_comment, cd_ctageneral, cd_ctacierre)";
      $sql.= " VALUES ('".$oadd->getcdempresa()."','".$oadd->getcdejercicio()."',".$oadd->getcdcuenta().",'".$oadd->getnunivel()."','".$oadd->getstcuenta()."','".$oadd->gettpnaturaleza()."','".$oadd->gettpcuenta()."','".$oadd->getnucuenta()."','".$oadd->getnbcuenta()."','".$oadd->gettxcomment()."',".$oadd->getcdctageneral().",".$oadd->getcdctacierre().")";
      $resultado = mysql_query($sql, $conexion); 
      return $resultado;
    }

//////////////////////////////////////////////////////////////////////////
//                           UPDATE CODE
//////////////////////////////////////////////////////////////////////////

  /**
   * PROCEDIMIENTO : actualizacion de un registro de la tabla con010_tpcuenta
   * @param $oupd - objeto tipo TpcuentaBean a actualizar
   * @param $conexion - conexion a la base de datos
   * @return true / false
  */
  function updTpcuentaBean($oupd, $conexion) {
    
    $sql = "UPDATE CON010_TPCUENTA";
    $sql.= " SET st_tpcuenta= '".$oupd->getsttpcuenta()."'";
    $sql.= ",cd_pais= '".$oupd->getcdpais()."'";
    $sql.= ",nb_tpcuenta= '".$oupd->getnbtpcuenta()."'";
    $sql.= " WHERE cd_tpcuenta='".$oupd->getcdtpcuenta()."'";
    $resultado = mysql_query($sql, $conexion); 
    return $resultado;
  }

  /**
   * PROCEDIMIENTO : actualizacion de un registro de la tabla con020_tpoliza
   * @param $oupd - objeto tipo TpolizaBean a actualizar
   * @param $conexion - conexion a la base de datos
   * @return true / false
  */
  function updTpolizaBean($oupd, $conexion) {
    
    $sql = "UPDATE CON020_TPOLIZA";
    $sql.= " SET st_tpoliza= '".$oupd->getsttpoliza()."'";
    $sql.= ",cd_pais= '".$oupd->getcdpais()."'";
    $sql.= ",nb_tpoliza= '".$oupd->getnbtpoliza()."'";
    $sql.= " WHERE cd_tpoliza='".$oupd->getcdtpoliza()."'";
    $resultado = mysql_query($sql, $conexion); 
    return $resultado;
  }

  /**
   * PROCEDIMIENTO : actualizacion de un registro de la tabla con030_tpago
   * @param $oupd - objeto tipo TpagoBean a actualizar
   * @param $conexion - conexion a la base de datos
   * @return true / false
  */
  function updTpagoBean($oupd, $conexion) {
    
    $sql = "UPDATE CON030_TPAGO";
    $sql.= " SET st_tpago= '".$oupd->getsttpago()."'";
    $sql.= ",cd_pais= '".$oupd->getcdpais()."'";
    $sql.= ",nb_pago= '".$oupd->getnbpago()."'";
    $sql.= " WHERE cd_tpago='".$oupd->getcdtpago()."'";
    $resultado = mysql_query($sql, $conexion); 
    return $resultado;
  }

  /**
   * PROCEDIMIENTO : actualizacion de un registro de la tabla con040_concepto
   * @param $oupd - objeto tipo ConceptoBean a actualizar
   * @param $conexion - conexion a la base de datos
   * @return true / false
  */
  function updConceptoBean($oupd, $conexion) {
    
    $sql = "UPDATE CON040_CONCEPTO";
    $sql.= " SET st_concepto= '".$oupd->getstconcepto()."'";
    $sql.= ",cd_pais= '".$oupd->getcdpais()."'";
    $sql.= ",nb_concepto= '".$oupd->getnbconcepto()."'";
    $sql.= " WHERE cd_concepto='".$oupd->getcdconcepto()."'";
    $resultado = mysql_query($sql, $conexion); 
    return $resultado;
  }

  /**
   * PROCEDIMIENTO : actualizacion de un registro de la tabla con050_tpcomprob
   * @param $oupd - objeto tipo TpcomproBean a actualizar
   * @param $conexion - conexion a la base de datos
   * @return true / false
  */
  function updTpcomproBean($oupd, $conexion) {
    
    $sql = "UPDATE CON050_TPCOMPROB";
    $sql.= " SET cd_pais= '".$oupd->getcdpais()."'";
    $sql.= ",st_tpcomprob= '".$oupd->getsttpcomprob()."'";
    $sql.= ",nb_tpcomprob= '".$oupd->getnbtpcomprob()."'";
    $sql.= " WHERE cd_tpcomprobante='".$oupd->getcdtpcomprobante()."'";
    $resultado = mysql_query($sql, $conexion); 
    return $resultado;
  }

  /**
   * PROCEDIMIENTO : actualizacion de un registro de la tabla con060_estado
   * @param $oupd - objeto tipo EstadoBean a actualizar
   * @param $conexion - conexion a la base de datos
   * @return true / false
  */
  function updEstadoBean($oupd, $conexion) {
    
    $sql = "UPDATE CON060_ESTADO";
    $sql.= " SET cd_pais= '".$oupd->getcdpais()."'";
    $sql.= ",nb_estado= '".$oupd->getnbestado()."'";
    $sql.= " WHERE cd_estado='".$oupd->getcdestado()."'";
    $resultado = mysql_query($sql, $conexion); 
    return $resultado;
  }

  /**
   * PROCEDIMIENTO : actualizacion de un registro de la tabla con070_pais
   * @param $oupd - objeto tipo PaisBean a actualizar
   * @param $conexion - conexion a la base de datos
   * @return true / false
  */
  function updPaisBean($oupd, $conexion) {
    
    $sql = "UPDATE CON070_PAIS";
    $sql.= " SET nb_pais= '".$oupd->getnbpais()."'";
    $sql.= " WHERE cd_pais='".$oupd->getcdpais()."'";
    $resultado = mysql_query($sql, $conexion); 
    return $resultado;
  }

  /**
   * PROCEDIMIENTO : actualizacion de un registro de la tabla con180_cliente
   * @param $oupd - objeto tipo ClienteBean a actualizar
   * @param $conexion - conexion a la base de datos
   * @return true / false
  */
  function updClienteBean($oupd, $conexion) {
    
    $sql = "UPDATE CON180_CLIENTE";
    $sql.= " SET cd_estado= '".$oupd->getcdestado()."'";
    $sql.= ",st_cliente= '".$oupd->getstcliente()."'";
    $sql.= ",st_iva= '".$oupd->getstiva()."'";
    $sql.= ",po_iva= ".$oupd->getpoiva()."";
    $sql.= ",cd_rfc= '".$oupd->getcdrfc()."'";
    $sql.= ",nu_telefono= '".$oupd->getnutelefono()."'";
    $sql.= ",nb_cliente= '".$oupd->getnbcliente()."'";
    $sql.= ",nb_razonsocial= '".$oupd->getnbrazonsocial()."'";
    $sql.= ",tx_direccion= '".$oupd->gettxdireccion()."'";
    $sql.= " WHERE cd_empresa='".$oupd->getcdempresa()."'";
    $sql.= " AND   cd_cliente='".$oupd->getcdcliente()."'";
    $resultado = mysql_query($sql, $conexion); 
    return $resultado;
  }

  /**
   * PROCEDIMIENTO : actualizacion de un registro de la tabla con190_docto_cliente
   * @param $oupd - objeto tipo DoctoClienteBean a actualizar
   * @param $conexion - conexion a la base de datos
   * @return true / false
  */
  function updDoctoClienteBean($oupd, $conexion) {
    
    $sql = "UPDATE CON190_DOCTO_CLIENTE";
    $sql.= " SET st_documento= '".$oupd->getstdocumento()."'";
    $sql.= ",nb_documento= '".$oupd->getnbdocumento()."'";
    $sql.= ",lk_documento= '".$oupd->getlkdocumento()."'";
    $sql.= " WHERE cd_empresa='".$oupd->getcdempresa()."'";
    $sql.= " AND   cd_cliente='".$oupd->getcdcliente()."'";
    $sql.= " AND   cd_documento='".$oupd->getcddocumento()."'";
    $resultado = mysql_query($sql, $conexion); 
    return $resultado;
  }

  /**
   * PROCEDIMIENTO : actualizacion de un registro de la tabla con210_contacto
   * @param $oupd - objeto tipo ContactoBean a actualizar
   * @param $conexion - conexion a la base de datos
   * @return true / false
  */
  function updContactoBean($oupd, $conexion) {
    
    $sql = "UPDATE CON210_CONTACTO";
    $sql.= " SET st_contacto= '".$oupd->getstcontacto()."'";
    $sql.= ",nu_telefono= '".$oupd->getnutelefono()."'";
    $sql.= ",nu_movil= '".$oupd->getnumovil()."'";
    $sql.= ",nb_contacto= '".$oupd->getnbcontacto()."'";
    $sql.= ",tx_direccion= '".$oupd->gettxdireccion()."'";
    $sql.= ",tx_comment= '".$oupd->gettxcomment()."'";
    $sql.= " WHERE cd_empresa='".$oupd->getcdempresa()."'";
    $sql.= " AND   cd_contacto='".$oupd->getcdcontacto()."'";
    $resultado = mysql_query($sql, $conexion); 
    return $resultado;
  }

  /**
   * PROCEDIMIENTO : actualizacion de un registro de la tabla con230_docto_proveedor
   * @param $oupd - objeto tipo DoctoProveedorBean a actualizar
   * @param $conexion - conexion a la base de datos
   * @return true / false
  */
  function updDoctoProveedorBean($oupd, $conexion) {
    
    $sql = "UPDATE CON230_DOCTO_PROVEEDOR";
    $sql.= " SET st_documento= '".$oupd->getstdocumento()."'";
    $sql.= ",nb_documento= '".$oupd->getnbdocumento()."'";
    $sql.= ",lk_documento= '".$oupd->getlkdocumento()."'";
    $sql.= " WHERE cd_empresa='".$oupd->getcdempresa()."'";
    $sql.= " AND   cd_proveedor='".$oupd->getcdproveedor()."'";
    $sql.= " AND   cd_documento='".$oupd->getcddocumento()."'";
    $resultado = mysql_query($sql, $conexion); 
    return $resultado;
  }

  /**
   * PROCEDIMIENTO : actualizacion de un registro de la tabla con240_proveedor
   * @param $oupd - objeto tipo ProveedorBean a actualizar
   * @param $conexion - conexion a la base de datos
   * @return true / false
  */
  function updProveedorBean($oupd, $conexion) {
    
    $sql = "UPDATE CON240_PROVEEDOR";
    $sql.= " SET st_proveedor= '".$oupd->getstproveedor()."'";
    $sql.= ",st_aplicariva= '".$oupd->getstaplicariva()."'";
    $sql.= ",st_reteneriva= '".$oupd->getstreteneriva()."'";
    $sql.= ",st_retenerisr= '".$oupd->getstretenerisr()."'";
    $sql.= ",cd_estado= '".$oupd->getcdestado()."'";
    $sql.= ",po_iva= ".$oupd->getpoiva()."";
    $sql.= ",cd_rfc= '".$oupd->getcdrfc()."'";
    $sql.= ",nu_telefono= '".$oupd->getnutelefono()."'";
    $sql.= ",nb_proveedor= '".$oupd->getnbproveedor()."'";
    $sql.= ",nb_razonsocial= '".$oupd->getnbrazonsocial()."'";
    $sql.= ",tx_direccion= '".$oupd->gettxdireccion()."'";
    $sql.= ",tx_comment= '".$oupd->gettxcomment()."'";
    $sql.= " WHERE cd_empresa='".$oupd->getcdempresa()."'";
    $sql.= " AND   cd_proveedor='".$oupd->getcdproveedor()."'";
    $resultado = mysql_query($sql, $conexion); 
    return $resultado;
  }

  /**
   * PROCEDIMIENTO : actualizacion de un registro de la tabla con150_cuenta
   * @param $oupd - objeto tipo CuentaBean a actualizar
   * @param $conexion - conexion a la base de datos
   * @return true / false
  */
  function updCuentaBean($oupd, $conexion) {
    
    $sql = "UPDATE CON150_CUENTA";
    $sql.= " SET nu_nivel= '".$oupd->getnunivel()."'";
    $sql.= ",st_cuenta= '".$oupd->getstcuenta()."'";
    $sql.= ",tp_naturaleza= '".$oupd->gettpnaturaleza()."'";
    $sql.= ",tp_cuenta= '".$oupd->gettpcuenta()."'";
    $sql.= ",nu_cuenta= '".$oupd->getnucuenta()."'";
    $sql.= ",nb_cuenta= '".$oupd->getnbcuenta()."'";
    $sql.= ",tx_comment= '".$oupd->gettxcomment()."'";
    $sql.= ",cd_ctageneral= ".$oupd->getcdctageneral()."";
    $sql.= ",cd_ctacierre= ".$oupd->getcdctacierre()."";
    $sql.= " WHERE cd_empresa='".$oupd->getcdempresa()."'";
    $sql.= "    AND   cd_ejercicio='".$oupd->getcdejercicio()."'";
    $sql.= "    AND   cd_cuenta=".$oupd->getcdcuenta()."";
    $resultado = mysql_query($sql, $conexion); 
    return $resultado;
  }


//////////////////////////////////////////////////////////////////////////
//                           DELETE CODE
//////////////////////////////////////////////////////////////////////////

  /**
   * PROCEDIMIENTO : elimina un registro de la tabla con190_docto_cliente
   * @param $odel - objeto tipo DoctoClienteBean a eliminar
   * @param $conexion - conexion a la base de datos   
   * @return true / false
  */
  function delDoctoClienteBean($odel, $conexion) {
    $sql = "DELETE FROM CON190_DOCTO_CLIENTE";
    $sql.= " WHERE cd_empresa='".$odel->getcdempresa()."'";
    $sql.= " AND   cd_cliente='".$odel->getcdcliente()."'";
    $sql.= " AND   cd_documento='".$odel->getcddocumento()."'";
    $resultado = mysql_query($sql, $conexion); 
    return $resultado;
  }

  /**
   * PROCEDIMIENTO : elimina un registro de la tabla con190_docto_cliente
   * @param  $pscdempresa - Clave de la empresa
   * @param  $pscdcliente - Clave del cliente
   * @param  $pscddocumento - Clave del documento
   * @param $conexion - conexion a la base de datos
   * @return true / false
  */
  function delDoctoClienteBean_key($pscdempresa, $pscdcliente, $pscddocumento, $conexion) {
    $sql = "DELETE FROM CON190_DOCTO_CLIENTE";
    $sql.= " WHERE cd_empresa='".$pscdempresa."'";
    $sql.= " AND   cd_cliente='".$pscdcliente."'";
    $sql.= " AND   cd_documento='".$pscddocumento."'";
    $resultado = mysql_query($sql, $conexion); 
    return $resultado;
  }

  /**
   * PROCEDIMIENTO : elimina un registro de la tabla con200_contacto_cliente
   * @param $odel - objeto tipo ContactoClienteBean a eliminar
   * @param $conexion - conexion a la base de datos   
   * @return true / false
  */
  function delContactoClienteBean($odel, $conexion) {
    $sql = "DELETE FROM CON200_CONTACTO_CLIENTE";
    $sql.= " WHERE cd_empresa='".$odel->getcdempresa()."'";
    $sql.= " AND   cd_cliente='".$odel->getcdcliente()."'";
    $sql.= " AND   cd_contacto='".$odel->getcdcontacto()."'";
    $resultado = mysql_query($sql, $conexion); 
    return $resultado;
  }

  /**
   * PROCEDIMIENTO : elimina un registro de la tabla con200_contacto_cliente
   * @param  $pscdempresa - Clave de la empresa
   * @param  $pscdcliente - Clave del cliente
   * @param  $pscdcontacto - Clave del contacto
   * @param $conexion - conexion a la base de datos
   * @return true / false
  */
  function delContactoClienteBean_key($pscdempresa, $pscdcliente, $pscdcontacto, $conexion) {
    $sql = "DELETE FROM CON200_CONTACTO_CLIENTE";
    $sql.= " WHERE cd_empresa='".$pscdempresa."'";
    $sql.= " AND   cd_cliente='".$pscdcliente."'";
    $sql.= " AND   cd_contacto='".$pscdcontacto."'";
    $resultado = mysql_query($sql, $conexion); 
    return $resultado;
  }

  /**
   * PROCEDIMIENTO : elimina un registro de la tabla con210_contacto
   * @param $odel - objeto tipo ContactoBean a eliminar
   * @param $conexion - conexion a la base de datos   
   * @return true / false
  */
  function delContactoBean($odel, $conexion) {
    $sql = "DELETE FROM CON210_CONTACTO";
    $sql.= " WHERE cd_empresa='".$odel->getcdempresa()."'";
          $sql.= " AND   cd_contacto='".$odel->getcdcontacto()."'";
    $resultado = mysql_query($sql, $conexion); 
    return $resultado;
  }

  /**
   * PROCEDIMIENTO : elimina un registro de la tabla con210_contacto
   * @param  $pscdempresa - Clave de la empresa
   * @param  $pscdcontacto - Clave del contacto
   * @param $conexion - conexion a la base de datos
   * @return true / false
  */
  function delContactoBean_key($pscdempresa, $pscdcontacto, $conexion) {
    $sql = "DELETE FROM CON210_CONTACTO";
    $sql.= " WHERE cd_empresa='".$pscdempresa."'";
    $sql.= " AND   cd_contacto='".$pscdcontacto."'";
    $resultado = mysql_query($sql, $conexion); 
    return $resultado;
  }

  /**
   * PROCEDIMIENTO : elimina un registro de la tabla con220_contacto_proveedor
   * @param $odel - objeto tipo ContactoProveedorBean a eliminar
   * @param $conexion - conexion a la base de datos   
   * @return true / false
  */
  function delContactoProveedorBean($odel, $conexion) {
    $sql = "DELETE FROM CON220_CONTACTO_PROVEEDOR";
    $sql.= " WHERE cd_empresa='".$odel->getcdempresa()."'";
          $sql.= " AND   cd_proveedor='".$odel->getcdproveedor()."'";
          $sql.= " AND   cd_contacto='".$odel->getcdcontacto()."'";
    $resultado = mysql_query($sql, $conexion); 
    return $resultado;
  }

  /**
   * PROCEDIMIENTO : elimina un registro de la tabla con220_contacto_proveedor
   * @param  $pscdempresa - Clave de la empresa
   * @param  $pscdproveedor - Clave del proveedor
   * @param  $pscdcontacto - Clave del contacto
   * @param $conexion - conexion a la base de datos
   * @return true / false
  */
  function delContactoProveedorBean_key($pscdempresa, $pscdproveedor, $pscdcontacto, $conexion) {
    $sql = "DELETE FROM CON220_CONTACTO_PROVEEDOR";
    $sql.= " WHERE cd_empresa='".$pscdempresa."'";
    $sql.= " AND   cd_proveedor='".$pscdproveedor."'";
    $sql.= " AND   cd_contacto='".$pscdcontacto."'";
    $resultado = mysql_query($sql, $conexion); 
    return $resultado;
  }

  /**
   * PROCEDIMIENTO : elimina un registro de la tabla con230_docto_proveedor
   * @param $odel - objeto tipo DoctoProveedorBean a eliminar
   * @param $conexion - conexion a la base de datos   
   * @return true / false
  */
  function delDoctoProveedorBean($odel, $conexion) {
    $sql = "DELETE FROM CON230_DOCTO_PROVEEDOR";
    $sql.= " WHERE cd_empresa='".$odel->getcdempresa()."'";
          $sql.= " AND   cd_proveedor='".$odel->getcdproveedor()."'";
          $sql.= " AND   cd_documento='".$odel->getcddocumento()."'";
    $resultado = mysql_query($sql, $conexion); 
    return $resultado;
  }

  /**
   * PROCEDIMIENTO : elimina un registro de la tabla con230_docto_proveedor
   * @param  $pscdempresa - Clave de la empresa
   * @param  $pscdproveedor - Clave del proveedor
   * @param  $pscddocumento - Clave del documento
   * @param $conexion - conexion a la base de datos
   * @return true / false
  */
  function delDoctoProveedorBean_key($pscdempresa, $pscdproveedor, $pscddocumento, $conexion) {
    $sql = "DELETE FROM CON230_DOCTO_PROVEEDOR";
    $sql.= " WHERE cd_empresa='".$pscdempresa."'";
    $sql.= " AND   cd_proveedor='".$pscdproveedor."'";
    $sql.= " AND   cd_documento='".$pscddocumento."'";
    $resultado = mysql_query($sql, $conexion); 
    return $resultado;
  }

  /**
   * PROCEDIMIENTO : elimina un registro de la tabla con240_proveedor
   * @param $odel - objeto tipo ProveedorBean a eliminar
   * @param $conexion - conexion a la base de datos   
   * @return true / false
  */
  function delProveedorBean($odel, $conexion) {
    $sql = "DELETE FROM CON240_PROVEEDOR";
    $sql.= " WHERE cd_empresa='".$odel->getcdempresa()."'";
          $sql.= " AND   cd_proveedor='".$odel->getcdproveedor()."'";
    $resultado = mysql_query($sql, $conexion); 
    return $resultado;
  }

  /**
   * PROCEDIMIENTO : elimina un registro de la tabla con240_proveedor
   * @param  $pscdempresa - Clave de la empresa
   * @param  $pscdproveedor - Clave del proveedor
   * @param $conexion - conexion a la base de datos
   * @return true / false
  */
  function delProveedorBean_key($pscdempresa, $pscdproveedor, $conexion) {
    $sql = "DELETE FROM CON240_PROVEEDOR";
    $sql.= " WHERE cd_empresa='".$pscdempresa."'";
    $sql.= " AND   cd_proveedor='".$pscdproveedor."'";
    $resultado = mysql_query($sql, $conexion); 
    return $resultado;
  }

} /* fin clase [DBCatalogos]  */

?>

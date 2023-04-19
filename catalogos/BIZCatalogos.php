<?php
require_once("DBCatalogos.php"); 
require_once("../comun/CriterioBean.php"); 

/**
 * @name: BIZCatalogos
 * Descripcion: 
 * Clase de negocio y principal acceso para el proyecto
 * @creation date: (22-Jun-2010)
 * @author Ruben Murga Tapia
 * @conpany: HANYGEN SOFTWARE S.A. DE C.V.
 */
class BIZCatalogos {
  var $odb;
  var $smensaje = "";

  /**
   * CONSTRUCTOR
   */
  function BIZCatalogos() {
    $this->odb = new DBCatalogos();  
  }

//////////////////////////////////////////////////////////////////////////
//                           SELECT CODE
//////////////////////////////////////////////////////////////////////////

  /**
   * PROCEDIMIENTO para consultar un objeto en particular tipo TpcuentaBean
   * @param $pscdtpcuenta - Clave del tipo de cuenta contable
   * @param $conexion - conexion a la base de datos   
   * @return $obj - objeto tipo TpcuentaBean con la inf
   */
  function getTpcuentaBean($pscdtpcuenta, $conexion) {
    $obj = NULL;
    $result = $this->odb->getTpcuentaBean($pscdtpcuenta, $conexion);
    if($row=mysql_fetch_row($result)) {
      $obj = new TpcuentaBean();
      $obj->setcdtpcuenta($row[0]);
      $obj->setsttpcuenta($row[1]);
      $obj->setcdpais($row[2]);
      $obj->setnbtpcuenta($row[3]);
    }
    return $obj;
  }
  
  /**
   * PROCEDIMIENTO: Para consultar varios objetos tipo TpcuentaBean
   * @param $conexion - conexion a la base de datos   
   * @return $objects[] - Array de objetos tipo TpcuentaBean
  */
  function getallTpcuentaBeans($conexion) {
    return $this->getTpcuentaBeans("",$conexion);
  }

  /**
   * PROCEDIMIENTO: Para consultar varios objetos tipo TpcuentaBean
   * @param $pscdpais - Clave del pais
   * @param $conexion - conexion a la base de datos   
   * @return $objects[] - Array de objetos tipo TpcuentaBean
  */
  function getTpcuentaBeans($pscdpais, $conexion) {
    $objects = array();
    $result = $this->odb->getTpcuentaBeans($pscdpais, $conexion);
    while($row=mysql_fetch_row($result)){
       $obj = new TpcuentaBean();
       $obj->setcdtpcuenta($row[0]);
       $obj->setsttpcuenta($row[1]);
       $obj->setcdpais($row[2]);
       $obj->setnbtpcuenta($row[3]);
       $objects[] = $obj;
    }
    return $objects;
  }
  
  /**
   * PROCEDIMIENTO para consultar un objeto en particular tipo TpolizaBean
   * @param $pscdtpoliza - Clave del tipo de poliza
   * @param $conexion - conexion a la base de datos   
   * @return $obj - objeto tipo TpolizaBean con la inf
   */
  function getTpolizaBean($pscdtpoliza, $conexion) {
    $obj = NULL;
    $result = $this->odb->getTpolizaBean($pscdtpoliza, $conexion);
    if($row=mysql_fetch_row($result)) {
      $obj = new TpolizaBean();
      $obj->setcdtpoliza($row[0]);
      $obj->setsttpoliza($row[1]);
      $obj->setcdpais($row[2]);
      $obj->setnbtpoliza($row[3]);
    }
    return $obj;
  }

  /**
   * PROCEDIMIENTO: Para consultar varios objetos tipo TpolizaBean
   * @param $conexion - conexion a la base de datos   
   * @return $objects[] - Array de objetos tipo TpcuentaBean
  */
  function getallTpolizaBeans($conexion) {
    return $this->getTpolizaBeans("",$conexion);
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
   * PROCEDIMIENTO para consultar un objeto en particular tipo TpagoBean
   * @param $pscdtpago - Clave del tipo de pago
   * @param $conexion - conexion a la base de datos   
   * @return $obj - objeto tipo TpagoBean con la inf
   */
  function getTpagoBean($pscdtpago, $conexion) {
    $obj = NULL;
    $result = $this->odb->getTpagoBean($pscdtpago, $conexion);
    if($row=mysql_fetch_row($result)) {
      $obj = new TpagoBean();
      $obj->setcdtpago($row[0]);
      $obj->setsttpago($row[1]);
      $obj->setcdpais($row[2]);
      $obj->setnbpago($row[3]);
    }
    return $obj;
  }
  
  /**
   * PROCEDIMIENTO: Para consultar varios objetos tipo TpagoBean
   * @param $conexion - conexion a la base de datos   
   * @return $objects[] - Array de objetos tipo TpcuentaBean
  */
  function getallTpagoBeans($conexion) {
    return $this->getTpagoBeans("",$conexion);
  }

  /**
   * PROCEDIMIENTO: Para consultar varios objetos tipo TpagoBean
   * @param $pscdpais- Clave del pais
   * @param $conexion - conexion a la base de datos   
   * @return $objects[] - Array de objetos tipo TpagoBean
  */
  function getTpagoBeans($pscdpais, $conexion) {
    $objects = array();
    $result = $this->odb->getTpagoBeans($pscdpais, $conexion);
    while($row=mysql_fetch_row($result)){
       $obj = new TpagoBean();
       $obj->setcdtpago($row[0]);
       $obj->setsttpago($row[1]);
       $obj->setcdpais($row[2]);
       $obj->setnbpago($row[3]);
       $objects[] = $obj;
    }
    return $objects;
  }
  
  /**
   * PROCEDIMIENTO para consultar un objeto en particular tipo ConceptoBean
   * @param $pscdconcepto - Clave del concepto contable
   * @param $conexion - conexion a la base de datos   
   * @return $obj - objeto tipo ConceptoBean con la inf
   */
  function getConceptoBean($pscdconcepto, $conexion) {
    $obj = NULL;
    $result = $this->odb->getConceptoBean($pscdconcepto, $conexion);
    if($row=mysql_fetch_row($result)) {
      $obj = new ConceptoBean();
      $obj->setcdconcepto($row[0]);
      $obj->setstconcepto($row[1]);
      $obj->setcdpais($row[2]);
      $obj->setnbconcepto($row[3]);
    }
    return $obj;
  }

  /**
   * PROCEDIMIENTO: Para consultar varios objetos tipo ConceptoBean
   * @param $conexion - conexion a la base de datos      
   * @return $objects[] - Array de objetos tipo ConceptoBean
  */
  function getallConceptoBeans($conexion) {
    return $this->getConceptoBeans("",$conexion);
  }
  
  /**
   * PROCEDIMIENTO: Para consultar varios objetos tipo ConceptoBean
   * @param $pscdconcepto - Clave del concepto contable
   * @param $conexion - conexion a la base de datos   
   * @return $objects[] - Array de objetos tipo ConceptoBean
  */
  function getConceptoBeans($pscdconcepto, $conexion) {
    $objects = array();
    $result = $this->odb->getConceptoBeans($pscdconcepto, $conexion);
    while($row=mysql_fetch_row($result)){
       $obj = new ConceptoBean();
       $obj->setcdconcepto($row[0]);
       $obj->setstconcepto($row[1]);
       $obj->setcdpais($row[2]);
       $obj->setnbconcepto($row[3]);
       $objects[] = $obj;
    }
    return $objects;
  }
  
  /**
   * PROCEDIMIENTO para consultar un objeto en particular tipo TpcomproBean
   * @param $pscdtpcomprobante - Clave del tipo de comprobante o documento(factura, honorarios...)
   * @param $conexion - conexion a la base de datos   
   * @return $obj - objeto tipo TpcomproBean con la inf
   */
  function getTpcomproBean($pscdtpcomprobante, $conexion) {
    $obj = NULL;
    $result = $this->odb->getTpcomproBean($pscdtpcomprobante, $conexion);
    if($row=mysql_fetch_row($result)) {
      $obj = new TpcomproBean();
      $obj->setcdtpcomprobante($row[0]);
      $obj->setcdpais($row[1]);
      $obj->setsttpcomprob($row[2]);
      $obj->setnbtpcomprob($row[3]);
    }
    return $obj;
  }

  /**
   * PROCEDIMIENTO: Para consultar varios objetos tipo TpcomproBean
   * @param $conexion - conexion a la base de datos      
   * @return $objects[] - Array de objetos tipo TpcomproBean
  */
  function getallTpcomproBeans($conexion) {
    return $this->getTpcomproBeans("",$conexion);
  }
  
  /**
   * PROCEDIMIENTO: Para consultar varios objetos tipo TpcomproBean
   * @param $pscdpais- Clave del pais
   * @param $conexion - conexion a la base de datos   
   * @return $objects[] - Array de objetos tipo TpcomproBean
  */
  function getTpcomproBeans($pscdpais, $conexion) {
    $objects = array();
    $result = $this->odb->getTpcomproBeans($pscdpais, $conexion);
    while($row=mysql_fetch_row($result)){
       $obj = new TpcomproBean();
       $obj->setcdtpcomprobante($row[0]);
       $obj->setcdpais($row[1]);
       $obj->setsttpcomprob($row[2]);
       $obj->setnbtpcomprob($row[3]);
       $objects[] = $obj;
    }
    return $objects;
  }
  
  /**
   * PROCEDIMIENTO para consultar un objeto en particular tipo EstadoBean
   * @param $pscdestado - Clave del estado
   * @param $conexion - conexion a la base de datos   
   * @return $obj - objeto tipo EstadoBean con la inf
   */
  function getEstadoBean($pscdestado, $conexion) {
    $obj = NULL;
    $result = $this->odb->getEstadoBean($pscdestado, $conexion);
    if($row=mysql_fetch_row($result)) {
      $obj = new EstadoBean();
      $obj->setcdestado($row[0]);
      $obj->setcdpais($row[1]);
      $obj->setnbestado($row[2]);
    }
    return $obj;
  }
  
  /**
   * PROCEDIMIENTO: Para consultar varios objetos tipo EstadoBean
   * @param $conexion - conexion a la base de datos      
   * @return $objects[] - Array de objetos tipo EstadoBean
  */
  function getEstadoBeans($conexion) {
    $objects = array();
    $result = $this->odb->getEstadoBeans($conexion);
    while($row=mysql_fetch_row($result)){
       $obj = new EstadoBean();
       $obj->setcdestado($row[0]);
       $obj->setcdpais($row[1]);
       $obj->setnbestado($row[2]);
       $objects[] = $obj;
    }
    return $objects;
  }
  
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
   * @param $conexion - conexion a la base de datos   
   * @return $objects[] - Array de objetos tipo PaisBean
  */
  function getPaisBeans($conexion) {
    $objects = array();
    $result = $this->odb->getPaisBeans($conexion);
    while($row=mysql_fetch_row($result)){
       $obj = new PaisBean();
       $obj->setcdpais($row[0]);
       $obj->setnbpais($row[1]);
       $objects[] = $obj;
    }
    return $objects;
  }


  /**
   * PROCEDIMIENTO para consultar un objeto en particular tipo ClienteBean
   * @param $pscdempresa - Clave de la empresa
   * @param $pscdcliente - Clave del cliente
   * @param $conexion - conexion a la base de datos   
   * @return $obj - objeto tipo ClienteBean con la inf
   */
  function getClienteBean($pscdempresa, $pscdcliente, $conexion) {
    $obj = NULL;
    $result = $this->odb->getClienteBean($pscdempresa, $pscdcliente, $conexion);
    if($row=mysql_fetch_row($result)) {
      $obj = new ClienteBean();
      $obj->setcdempresa($row[0]);
      $obj->setcdcliente($row[1]);
      $obj->setcdestado($row[2]);
      $obj->setstcliente($row[3]);
      $obj->setstiva($row[4]);
      $obj->setpoiva($row[5]);
      $obj->setcdrfc($row[6]);
      $obj->setnutelefono($row[7]);
      $obj->setnbcliente($row[8]);
      $obj->setnbrazonsocial($row[9]);
      $obj->settxdireccion($row[10]);
    }
    return $obj;
  }
  
  /**
   * PROCEDIMIENTO: Para consultar varios objetos tipo ClienteBean
   * @param $pocrit - Criterios de consulta
   * @param $conexion - conexion a la base de datos   
   * @return $objects[] - Array de objetos tipo ClienteBean
  */
  function getClienteBeans($pocrit, $conexion) {
    $objects = array();
    $result = $this->odb->getClienteBeans($pocrit, $conexion);
    while($row=mysql_fetch_row($result)){
       $obj = new ClienteBean();
       $obj->setcdempresa($row[0]);
       $obj->setcdcliente($row[1]);
       $obj->setcdestado($row[2]);
       $obj->setstcliente($row[3]);
       $obj->setstiva($row[4]);
       $obj->setpoiva($row[5]);
       $obj->setcdrfc($row[6]);
       $obj->setnutelefono($row[7]);
       $obj->setnbcliente($row[8]);
       $obj->setnbrazonsocial($row[9]);
       $obj->settxdireccion($row[10]);
       $objects[] = $obj;
    }
    return $objects;
  }
  
  /**
   * PROCEDIMIENTO para consultar un objeto en particular tipo DoctoClienteBean
   * @param $pscdempresa - Clave de la empresa
   * @param $pscdcliente - Clave del cliente
   * @param $pscddocumento - Clave del documento
   * @param $conexion - conexion a la base de datos   
   * @return $obj - objeto tipo DoctoClienteBean con la inf
   */
  function getDoctoClienteBean($pscdempresa, $pscdcliente, $pscddocumento, $conexion) {
    $obj = NULL;
    $result = $this->odb->getDoctoClienteBean($pscdempresa, $pscdcliente, $pscddocumento, $conexion);
    if($row=mysql_fetch_row($result)) {
      $obj = new DoctoClienteBean();
      $obj->setcdempresa($row[0]);
      $obj->setcdcliente($row[1]);
      $obj->setcddocumento($row[2]);
      $obj->setstdocumento($row[3]);
      $obj->setnbdocumento($row[4]);
      $obj->setlkdocumento($row[5]);
    }
    return $obj;
  }
  
  /**
   * PROCEDIMIENTO: Para consultar varios objetos tipo DoctoClienteBean
   * @param $pscdempresa - Clave de la empresa
   * @param $pscdcliente - Clave del cliente
   * @param $pscddocumento - Clave del documento
   * @param $conexion - conexion a la base de datos   
   * @return $objects[] - Array de objetos tipo DoctoClienteBean
  */
  function getDoctoClienteBeans($pscdempresa, $pscdcliente, $pscddocumento, $conexion) {
    $objects = array();
    $result = $this->odb->getDoctoClienteBeans($pscdempresa, $pscdcliente, $pscddocumento, $conexion);
    while($row=mysql_fetch_row($result)){
       $obj = new DoctoClienteBean();
       $obj->setcdempresa($row[0]);
       $obj->setcdcliente($row[1]);
       $obj->setcddocumento($row[2]);
       $obj->setstdocumento($row[3]);
       $obj->setnbdocumento($row[4]);
       $obj->setlkdocumento($row[5]);
       $objects[] = $obj;
    }
    return $objects;
  }
  

  /**
   * PROCEDIMIENTO: Para consultar varios objetos tipo DoctoClienteBean
   * @param $conexion - conexion a la base de datos      
   * @return $objects[] - Array de objetos tipo DoctoClienteBean
  */
  function getallDoctoClienteBeans($conexion) {
    $objects = array();
    $result = $this->odb->getallDoctoClienteBeans($conexion);
    while($row=mysql_fetch_row($result)){
       $obj = new DoctoClienteBean();
       $obj->setcdempresa($row[0]);
       $obj->setcdcliente($row[1]);
       $obj->setcddocumento($row[2]);
       $obj->setstdocumento($row[3]);
       $obj->setnbdocumento($row[4]);
       $obj->setlkdocumento($row[5]);
       $objects[] = $obj;
    }
    return $objects;
  }

  /**
   * PROCEDIMIENTO para consultar un objeto en particular tipo ContactoClienteBean
   * @param $pscdempresa - Clave de la empresa
   * @param $pscdcliente - Clave del cliente
   * @param $pscdcontacto - Clave del contacto
   * @param $conexion - conexion a la base de datos   
   * @return $obj - objeto tipo ContactoClienteBean con la inf
   */
  function getContactoClienteBean($pscdempresa, $pscdcliente, $pscdcontacto, $conexion) {
    $obj = NULL;
    $result = $this->odb->getContactoClienteBean($pscdempresa, $pscdcliente, $pscdcontacto, $conexion);
    if($row=mysql_fetch_row($result)) {
      $obj = new ContactoClienteBean();
      $obj->setcdempresa($row[0]);
      $obj->setcdcliente($row[1]);
      $obj->setcdcontacto($row[2]);
    }
    return $obj;
  }
  
  /**
   * PROCEDIMIENTO: Para consultar varios objetos tipo ContactoClienteBean
   * @param $pscdempresa - Clave de la empresa
   * @param $pscdcliente - Clave del cliente
   * @param $pscdcontacto - Clave del contacto
   * @param $conexion - conexion a la base de datos   
   * @return $objects[] - Array de objetos tipo ContactoClienteBean
  */
  function getContactoClienteBeans($pscdempresa, $pscdcliente, $pscdcontacto, $conexion) {
    $objects = array();
    $result = $this->odb->getContactoClienteBeans($pscdempresa, $pscdcliente, $pscdcontacto, $conexion);
    while($row=mysql_fetch_row($result)){
       $obj = new ContactoClienteBean();
       $obj->setcdempresa($row[0]);
       $obj->setcdcliente($row[1]);
       $obj->setcdcontacto($row[2]);
       $objects[] = $obj;
    }
    return $objects;
  }
  
  /**
   * PROCEDIMIENTO: Para consultar varios objetos tipo ContactoClienteBean
   * @param $conexion - conexion a la base de datos      
   * @return $objects[] - Array de objetos tipo ContactoClienteBean
  */
  function getallContactoClienteBeans($conexion) {
    $objects = array();
    $result = $this->odb->getallContactoClienteBeans($conexion);
    while($row=mysql_fetch_row($result)){
       $obj = new ContactoClienteBean();
       $obj->setcdempresa($row[0]);
       $obj->setcdcliente($row[1]);
       $obj->setcdcontacto($row[2]);
       $objects[] = $obj;
    }
    return $objects;
  }

  /**
   * PROCEDIMIENTO para consultar un objeto en particular tipo ContactoBean
   * @param $pscdempresa - Clave de la empresa
   * @param $pscdcontacto - Clave del contacto
   * @param $conexion - conexion a la base de datos   
   * @return $obj - objeto tipo ContactoBean con la inf
   */
  function getContactoBean($pscdempresa, $pscdcontacto, $conexion) {
    $obj = NULL;
    $result = $this->odb->getContactoBean($pscdempresa, $pscdcontacto, $conexion);
    if($row=mysql_fetch_row($result)) {
      $obj = new ContactoBean();
      $obj->setcdempresa($row[0]);
      $obj->setcdcontacto($row[1]);
      $obj->setstcontacto($row[2]);
      $obj->setnutelefono($row[3]);
      $obj->setnumovil($row[4]);
      $obj->setnbcontacto($row[5]);
      $obj->settxdireccion($row[6]);
      $obj->settxcomment($row[7]);
    }
    return $obj;
  }
  
  /**
   * PROCEDIMIENTO: Para consultar varios objetos tipo ContactoBean
   * @param $pscdempresa - Clave de la empresa
   * @param $pscdcontacto - Clave del contacto
   * @param $conexion - conexion a la base de datos   
   * @return $objects[] - Array de objetos tipo ContactoBean
  */
  function getContactoBeans($pscdempresa, $pscdcontacto, $conexion) {
    $objects = array();
    $result = $this->odb->getContactoBeans($pscdempresa, $pscdcontacto, $conexion);
    while($row=mysql_fetch_row($result)){
       $obj = new ContactoBean();
       $obj->setcdempresa($row[0]);
       $obj->setcdcontacto($row[1]);
       $obj->setstcontacto($row[2]);
       $obj->setnutelefono($row[3]);
       $obj->setnumovil($row[4]);
       $obj->setnbcontacto($row[5]);
       $obj->settxdireccion($row[6]);
       $obj->settxcomment($row[7]);
       $objects[] = $obj;
    }
    return $objects;
  }
  
  /**
   * PROCEDIMIENTO: Para consultar varios objetos tipo ContactoBean
   * @param $conexion - conexion a la base de datos      
   * @return $objects[] - Array de objetos tipo ContactoBean
  */
  function getallContactoBeans($conexion) {
    $objects = array();
    $result = $this->odb->getallContactoBeans($conexion);
    while($row=mysql_fetch_row($result)){
       $obj = new ContactoBean();
       $obj->setcdempresa($row[0]);
       $obj->setcdcontacto($row[1]);
       $obj->setstcontacto($row[2]);
       $obj->setnutelefono($row[3]);
       $obj->setnumovil($row[4]);
       $obj->setnbcontacto($row[5]);
       $obj->settxdireccion($row[6]);
       $obj->settxcomment($row[7]);
       $objects[] = $obj;
    }
    return $objects;
  }

  /**
   * PROCEDIMIENTO para consultar un objeto en particular tipo ContactoProveedorBean
   * @param $pscdempresa - Clave de la empresa
   * @param $pscdproveedor - Clave del proveedor
   * @param $pscdcontacto - Clave del contacto
   * @param $conexion - conexion a la base de datos   
   * @return $obj - objeto tipo ContactoProveedorBean con la inf
   */
  function getContactoProveedorBean($pscdempresa, $pscdproveedor, $pscdcontacto, $conexion) {
    $obj = NULL;
    $result = $this->odb->getContactoProveedorBean($pscdempresa, $pscdproveedor, $pscdcontacto, $conexion);
    if($row=mysql_fetch_row($result)) {
      $obj = new ContactoProveedorBean();
      $obj->setcdempresa($row[0]);
      $obj->setcdproveedor($row[1]);
      $obj->setcdcontacto($row[2]);
    }
    return $obj;
  }
  
  /**
   * PROCEDIMIENTO: Para consultar varios objetos tipo ContactoProveedorBean
   * @param $pscdempresa - Clave de la empresa
   * @param $pscdproveedor - Clave del proveedor
   * @param $pscdcontacto - Clave del contacto
   * @param $conexion - conexion a la base de datos   
   * @return $objects[] - Array de objetos tipo ContactoProveedorBean
  */
  function getContactoProveedorBeans($pscdempresa, $pscdproveedor, $pscdcontacto, $conexion) {
    $objects = array();
    $result = $this->odb->getContactoProveedorBeans($pscdempresa, $pscdproveedor, $pscdcontacto, $conexion);
    while($row=mysql_fetch_row($result)){
       $obj = new ContactoProveedorBean();
       $obj->setcdempresa($row[0]);
       $obj->setcdproveedor($row[1]);
       $obj->setcdcontacto($row[2]);
       $objects[] = $obj;
    }
    return $objects;
  }
  
  /**
   * PROCEDIMIENTO: Para consultar varios objetos tipo ContactoProveedorBean
   * @param $conexion - conexion a la base de datos      
   * @return $objects[] - Array de objetos tipo ContactoProveedorBean
  */
  function getallContactoProveedorBeans($conexion) {
    $objects = array();
    $result = $this->odb->getallContactoProveedorBeans($conexion);
    while($row=mysql_fetch_row($result)){
       $obj = new ContactoProveedorBean();
       $obj->setcdempresa($row[0]);
       $obj->setcdproveedor($row[1]);
       $obj->setcdcontacto($row[2]);
       $objects[] = $obj;
    }
    return $objects;
  }

  /**
   * PROCEDIMIENTO para consultar un objeto en particular tipo DoctoProveedorBean
   * @param $pscdempresa - Clave de la empresa
   * @param $pscdproveedor - Clave del proveedor
   * @param $pscddocumento - Clave del documento
   * @param $conexion - conexion a la base de datos   
   * @return $obj - objeto tipo DoctoProveedorBean con la inf
   */
  function getDoctoProveedorBean($pscdempresa, $pscdproveedor, $pscddocumento, $conexion) {
    $obj = NULL;
    $result = $this->odb->getDoctoProveedorBean($pscdempresa, $pscdproveedor, $pscddocumento, $conexion);
    if($row=mysql_fetch_row($result)) {
      $obj = new DoctoProveedorBean();
      $obj->setcdempresa($row[0]);
      $obj->setcdproveedor($row[1]);
      $obj->setcddocumento($row[2]);
      $obj->setstdocumento($row[3]);
      $obj->setnbdocumento($row[4]);
      $obj->setlkdocumento($row[5]);
    }
    return $obj;
  }
  
  /**
   * PROCEDIMIENTO: Para consultar varios objetos tipo DoctoProveedorBean
   * @param $pscdempresa - Clave de la empresa
   * @param $pscdproveedor - Clave del proveedor
   * @param $pscddocumento - Clave del documento
   * @param $conexion - conexion a la base de datos   
   * @return $objects[] - Array de objetos tipo DoctoProveedorBean
  */
  function getDoctoProveedorBeans($pscdempresa, $pscdproveedor, $pscddocumento, $conexion) {
    $objects = array();
    $result = $this->odb->getDoctoProveedorBeans($pscdempresa, $pscdproveedor, $pscddocumento, $conexion);
    while($row=mysql_fetch_row($result)){
       $obj = new DoctoProveedorBean();
       $obj->setcdempresa($row[0]);
       $obj->setcdproveedor($row[1]);
       $obj->setcddocumento($row[2]);
       $obj->setstdocumento($row[3]);
       $obj->setnbdocumento($row[4]);
       $obj->setlkdocumento($row[5]);
       $objects[] = $obj;
    }
    return $objects;
  }
  
  /**
   * PROCEDIMIENTO: Para consultar varios objetos tipo DoctoProveedorBean
   * @param $conexion - conexion a la base de datos      
   * @return $objects[] - Array de objetos tipo DoctoProveedorBean
  */
  function getallDoctoProveedorBeans($conexion) {
    $objects = array();
    $result = $this->odb->getallDoctoProveedorBeans($conexion);
    while($row=mysql_fetch_row($result)){
       $obj = new DoctoProveedorBean();
       $obj->setcdempresa($row[0]);
       $obj->setcdproveedor($row[1]);
       $obj->setcddocumento($row[2]);
       $obj->setstdocumento($row[3]);
       $obj->setnbdocumento($row[4]);
       $obj->setlkdocumento($row[5]);
       $objects[] = $obj;
    }
    return $objects;
  }

  /**
   * PROCEDIMIENTO para consultar un objeto en particular tipo ProveedorBean
   * @param $pscdempresa - Clave de la empresa
   * @param $pscdproveedor - Clave del proveedor
   * @param $conexion - conexion a la base de datos   
   * @return $obj - objeto tipo ProveedorBean con la inf
   */
  function getProveedorBean($pscdempresa, $pscdproveedor, $conexion) {
    $obj = NULL;
    $result = $this->odb->getProveedorBean($pscdempresa, $pscdproveedor, $conexion);
    if($row=mysql_fetch_row($result)) {
      $obj = new ProveedorBean();
      $obj->setcdempresa($row[0]);
      $obj->setcdproveedor($row[1]);
      $obj->setstproveedor($row[2]);
      $obj->setstaplicariva($row[3]);
      $obj->setstreteneriva($row[4]);
      $obj->setstretenerisr($row[5]);
      $obj->setcdestado($row[6]);
      $obj->setpoiva($row[7]);
      $obj->setcdrfc($row[8]);
      $obj->setnutelefono($row[9]);
      $obj->setnbproveedor($row[10]);
      $obj->setnbrazonsocial($row[11]);
      $obj->settxdireccion($row[12]);
      $obj->settxcomment($row[13]);
    }
    return $obj;
  }
  
  /**
   * PROCEDIMIENTO: Para consultar varios objetos tipo ProveedorBean
   * @param $pocrit - Criterios de consulta
   * @param $pscdproveedor - Clave del proveedor
   * @param $conexion - conexion a la base de datos   
   * @return $objects[] - Array de objetos tipo ProveedorBean
  */
  function getProveedorBeans($pocrit, $conexion) {
    $objects = array();
    $result = $this->odb->getProveedorBeans($pocrit, $conexion);
    while($row=mysql_fetch_row($result)){
       $obj = new ProveedorBean();
       $obj->setcdempresa($row[0]);
       $obj->setcdproveedor($row[1]);
       $obj->setstproveedor($row[2]);
       $obj->setstaplicariva($row[3]);
       $obj->setstreteneriva($row[4]);
       $obj->setstretenerisr($row[5]);
       $obj->setcdestado($row[6]);
       $obj->setpoiva($row[7]);
       $obj->setcdrfc($row[8]);
       $obj->setnutelefono($row[9]);
       $obj->setnbproveedor($row[10]);
       $obj->setnbrazonsocial($row[11]);
       $obj->settxdireccion($row[12]);
       $obj->settxcomment($row[13]);
       $objects[] = $obj;
    }
    return $objects;
  }

  /**
   * PROCEDIMIENTO para consultar un objeto en particular tipo CuentaBean
   * @param $pscdempresa - Clave de la empresa a la que pertenece la cuenta contable
   * @param $pscdejercicio - Clave del ejercicio fiscal
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
      $obj->setfhsession($row[4]);
    }
    return $obj;
  }

  /**
   *  PROCEDIMIENTO: Procedimiento para contar los registros de una tabla con su condicion
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
   *  PROCEDIMIENTO: Procedimiento para consultar el siguiente id del tipo de cuenta contable
   *  @param $conexion - conexion a la base de datos
   *  @return $resultado
  */ 
  function getnextTpcuentaBean($conexion) {
    $result = $this->odb->getlastTpcuentaBean($conexion);
    if($row=mysql_fetch_row($result)) {
      $next = intval($row[0]) + 1;
      $res = "00$next";
      return substr($res, strlen($res) - 2);
    }
    return "01";
  }

  /**
   *  PROCEDIMIENTO: Procedimiento para consultar el siguiente id del tipo de poliza
   *  @param $conexion - conexion a la base de datos
   *  @return $resultado
  */ 
  function getnextTpolizaBean($conexion) {
    $result = $this->odb->getlastTpolizaBean($conexion);
    if($row=mysql_fetch_row($result)) {
      $next = intval($row[0]) + 1;
      $res = "00$next";
      return substr($res, strlen($res) - 2);
    }
    return "01";
  }

  /**
   *  PROCEDIMIENTO: Procedimiento para consultar el siguiente id del tipo de pago
   *  @param $conexion - conexion a la base de datos
   *  @return $resultado
  */ 
  function getnextTpagoBean($conexion) {
    $result = $this->odb->getlastTpagoBean($conexion);
    if($row=mysql_fetch_row($result)) {
      $next = intval($row[0]) + 1;
      $res = "00$next";
      return substr($res, strlen($res) - 2);
    }
    return "01";
  }

  /**
   *  PROCEDIMIENTO: Procedimiento para consultar el siguiente id del tipo de pago
   *  @param $conexion - conexion a la base de datos
   *  @return $resultado
  */ 
  function getnextConceptoBean($conexion) {
    $result = $this->odb->getlastConceptoBean($conexion);
    if($row=mysql_fetch_row($result)) {
      $next = intval($row[0]) + 1;
      $res = "000$next";
      return substr($res, strlen($res) - 3);
    }
    return "001";
  }

  /**
   *  PROCEDIMIENTO: Procedimiento para consultar el siguiente id del tipo de comprobante
   *  @param $conexion - conexion a la base de datos
   *  @return $resultado
  */ 
  function getnextTpcomproBean($conexion) {
    $result = $this->odb->getlastTpcomproBean($conexion);
    if($row=mysql_fetch_row($result)) {
      $next = intval($row[0]) + 1;
      $res = "000$next";
      return substr($res, strlen($res) - 3);
    }
    return "001";
  }

  /**
   *  PROCEDIMIENTO: Procedimiento para consultar el siguiente id del cliente
   *  @param $cdempresa - clave de la empresa
   *  @param $conexion - conexion a la base de datos
   *  @return $resultado
  */ 
  function getnextClienteBean($cdempresa, $conexion) {
    $result = $this->odb->getlastClienteBean($cdempresa, $conexion);
    if($row=mysql_fetch_row($result)) {
      $next = intval($row[0]) + 1;
      $res = "000$next";
      return substr($res, strlen($res) - 3);
    }
    return "001";
  }

  /**
   *  PROCEDIMIENTO: Procedimiento para consultar el siguiente id del proveedor
   *  @param $cdempresa - clave de la empresa
   *  @param $conexion - conexion a la base de datos
   *  @return $resultado
  */ 
  function getnextProveedorBean($cdempresa, $conexion) {
    $result = $this->odb->getlastProveedorBean($cdempresa, $conexion);
    if($row=mysql_fetch_row($result)) {
      $next = intval($row[0]) + 1;
      $res = "000$next";
      return substr($res, strlen($res) - 3);
    }
    return "001";
  }

  /**
   *  PROCEDIMIENTO: Procedimiento para consultar el ultimo id del tipo CuentaBean
   *  @param $cdempresa - clave de la empresa
   *  @param $cdejercicio - clave del ejercicio fiscal
   *  @param $conexion - conexion a la base de datos
   *  @return $resultado
  */ 
  function getnextCuentaBean($cdempresa, $cdejercicio, $conexion) {
    $res = 1;    //crea un fijo maximo
    $result = $this->odb->getlastCuentaBean($cdempresa, $cdejercicio, $conexion);
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
   * PROCEDIMIENTO : Alta de un objeto tipo TpcuentaBean
   * @param $oadd - objeto TpcuentaBean a dar de alta
   * @param $conexion - conexion a la base de datos
   * @return true / false
   */
  function addTpcuentaBean($oadd, $conexion) {
    $oadd->setcdtpcuenta($this->getnextTpcuentaBean($conexion));
    $oadd->setsttpcuenta("AC");
    return $this->odb->addTpcuentaBean($oadd, $conexion);
  }
  
  /**
   * PROCEDIMIENTO : Alta de un objeto tipo TpolizaBean
   * @param $oadd - objeto TpolizaBean a dar de alta
   * @param $conexion - conexion a la base de datos
   * @return true / false
   */
  function addTpolizaBean($oadd, $conexion) {
    $oadd->setcdtpoliza($this->getnextTpolizaBean($conexion));
    $oadd->setsttpoliza("AC");
    return $this->odb->addTpolizaBean($oadd, $conexion);
  }
  
  /**
   * PROCEDIMIENTO : Alta de un objeto tipo TpagoBean
   * @param $oadd - objeto TpagoBean a dar de alta
   * @param $conexion - conexion a la base de datos
   * @return true / false
   */
  function addTpagoBean($oadd, $conexion) {
    $oadd->setcdtpago($this->getnextTpagoBean($conexion));
    $oadd->setsttpago("AC");
    return $this->odb->addTpagoBean($oadd, $conexion);
  }
  
  /**
   * PROCEDIMIENTO : Alta de un objeto tipo ConceptoBean
   * @param $oadd - objeto ConceptoBean a dar de alta
   * @param $conexion - conexion a la base de datos
   * @return true / false
   */
  function addConceptoBean($oadd, $conexion) {
    $oadd->setcdconcepto($this->getnextConceptoBean($conexion));
    $oadd->setstconcepto("AC");
    return $this->odb->addConceptoBean($oadd, $conexion);
  }
  
  /**
   * PROCEDIMIENTO : Alta de un objeto tipo TpcomproBean
   * @param $oadd - objeto TpcomproBean a dar de alta
   * @param $conexion - conexion a la base de datos
   * @return true / false
   */
  function addTpcomproBean($oadd, $conexion) {
    $oadd->setcdtpcomprobante($this->getnextTpcomproBean($conexion));
    $oadd->setsttpcomprob("AC");
    return $this->odb->addTpcomproBean($oadd, $conexion);
  }
  
  /**
   * PROCEDIMIENTO : Alta de un objeto tipo EstadoBean
   * @param $oadd - objeto EstadoBean a dar de alta
   * @param $conexion - conexion a la base de datos
   * @return true / false
   */
  function addEstadoBean($oadd, $conexion) {
    return $this->odb->addEstadoBean($oadd, $conexion);
  }
  
  /**
   * PROCEDIMIENTO : Alta de un objeto tipo PaisBean
   * @param $oadd - objeto PaisBean a dar de alta
   * @param $conexion - conexion a la base de datos
   * @return true / false
   */
  function addPaisBean($oadd, $conexion) {
    return $this->odb->addPaisBean($oadd, $conexion);
  }
  
  /**
   * PROCEDIMIENTO : Alta de un objeto tipo DoctoClienteBean
   * @param $oadd - objeto DoctoClienteBean a dar de alta
   * @param $conexion - conexion a la base de datos
   * @return true / false
   */
  function addDoctoClienteBean($oadd, $conexion) {
    return $this->odb->addDoctoClienteBean($oadd, $conexion);
  }
  
  /**
   * PROCEDIMIENTO : Alta de un objeto tipo ContactoClienteBean
   * @param $oadd - objeto ContactoClienteBean a dar de alta
   * @param $conexion - conexion a la base de datos
   * @return true / false
   */
  function addContactoClienteBean($oadd, $conexion) {
    return $this->odb->addContactoClienteBean($oadd, $conexion);
  }
  
  /**
   * PROCEDIMIENTO : Alta de un objeto tipo ContactoBean
   * @param $oadd - objeto ContactoBean a dar de alta
   * @param $conexion - conexion a la base de datos
   * @return true / false
   */
  function addContactoBean($oadd, $conexion) {
    return $this->odb->addContactoBean($oadd, $conexion);
  }

  /**
   * PROCEDIMIENTO : Alta de un objeto tipo ContactoProveedorBean
   * @param $oadd - objeto ContactoProveedorBean a dar de alta
   * @param $conexion - conexion a la base de datos
   * @return true / false
   */
  function addContactoProveedorBean($oadd, $conexion) {
    return $this->odb->addContactoProveedorBean($oadd, $conexion);
  }

  /**
   * PROCEDIMIENTO : Alta de un objeto tipo DoctoProveedorBean
   * @param $oadd - objeto DoctoProveedorBean a dar de alta
   * @param $conexion - conexion a la base de datos
   * @return true / false
   */
  function addDoctoProveedorBean($oadd, $conexion) {
    return $this->odb->addDoctoProveedorBean($oadd, $conexion);
  }
  
//////////////////////////////////////////////////////////////////////////
//                           UPDATE CODE
//////////////////////////////////////////////////////////////////////////
  /**
   * PROCEDIMIENTO : Actualizacion de un objeto tipo TpcuentaBean
   * @param $oupd - objeto tipo TpcuentaBean para actualizar
   * @param $conexion - conexion a la base de datos
   * @return true / false
   */
  function updTpcuentaBean($oupd, $conexion) {
    return $this->odb->updTpcuentaBean($oupd, $conexion);
  }   
  
  /**
   * PROCEDIMIENTO : Actualizacion de un objeto tipo TpolizaBean
   * @param $oupd - objeto tipo TpolizaBean para actualizar
   * @param $conexion - conexion a la base de datos
   * @return true / false
   */
  function updTpolizaBean($oupd, $conexion) {
    return $this->odb->updTpolizaBean($oupd, $conexion);
  }   
  
  /**
   * PROCEDIMIENTO : Actualizacion de un objeto tipo TpagoBean
   * @param $oupd - objeto tipo TpagoBean para actualizar
   * @param $conexion - conexion a la base de datos
   * @return true / false
   */
  function updTpagoBean($oupd, $conexion) {
    return $this->odb->updTpagoBean($oupd, $conexion);
  }   
  
  /**
   * PROCEDIMIENTO : Actualizacion de un objeto tipo TpcomproBean
   * @param $oupd - objeto tipo TpcomproBean para actualizar
   * @param $conexion - conexion a la base de datos
   * @return true / false
   */
  function updTpcomproBean($oupd, $conexion) {
    return $this->odb->updTpcomproBean($oupd, $conexion);
  }   
  
  /**
   * PROCEDIMIENTO : Actualizacion de un objeto tipo EstadoBean
   * @param $oupd - objeto tipo EstadoBean para actualizar
   * @param $conexion - conexion a la base de datos
   * @return true / false
   */
  function updEstadoBean($oupd, $conexion) {
    return $this->odb->updEstadoBean($oupd, $conexion);
  }   
  
  /**
   * PROCEDIMIENTO : Actualizacion de un objeto tipo PaisBean
   * @param $oupd - objeto tipo PaisBean para actualizar
   * @param $conexion - conexion a la base de datos
   * @return true / false
   */
  function updPaisBean($oupd, $conexion) {
    return $this->odb->updPaisBean($oupd, $conexion);
  }   
  
  /**
   * PROCEDIMIENTO : Actualizacion de un objeto tipo ClienteBean
   * @param $oupd - objeto tipo ClienteBean para actualizar
   * @param $conexion - conexion a la base de datos
   * @return true / false
   */
  function saveClienteBean($oupd, $conexion) {
    if($oupd->getcdcliente()=='') {
       $oupd->setcdcliente($this->getnextClienteBean($oupd->getcdempresa(), $conexion));
       return $this->odb->addClienteBean($oupd, $conexion);
    } 
    return $this->odb->updClienteBean($oupd, $conexion);
  }   
  
  /**
   * PROCEDIMIENTO : Actualizacion de un objeto tipo DoctoClienteBean
   * @param $oupd - objeto tipo DoctoClienteBean para actualizar
   * @param $conexion - conexion a la base de datos
   * @return true / false
   */
  function updDoctoClienteBean($oupd, $conexion) {
    return $this->odb->updDoctoClienteBean($oupd, $conexion);
  }   
  
  /**
   * PROCEDIMIENTO : Actualizacion de un objeto tipo ContactoBean
   * @param $oupd - objeto tipo ContactoBean para actualizar
   * @param $conexion - conexion a la base de datos
   * @return true / false
   */
  function updContactoBean($oupd, $conexion) {
    return $this->odb->updContactoBean($oupd, $conexion);
  }   

  /**
   * PROCEDIMIENTO : Actualizacion de un objeto tipo DoctoProveedorBean
   * @param $oupd - objeto tipo DoctoProveedorBean para actualizar
   * @param $conexion - conexion a la base de datos
   * @return true / false
   */
  function updDoctoProveedorBean($oupd, $conexion) {
    return $this->odb->updDoctoProveedorBean($oupd, $conexion);
  }   
  
  /**
   * PROCEDIMIENTO : Actualizacion de un objeto tipo ProveedorBean
   * @param $oupd - objeto tipo ProveedorBean para actualizar
   * @param $conexion - conexion a la base de datos
   * @return true / false
   */
  function saveProveedorBean($oupd, $conexion) {
    if($oupd->getcdproveedor()=='') {
       $oupd->setcdproveedor($this->getnextProveedorBean($oupd->getcdempresa(), $conexion));
       return $this->odb->addProveedorBean($oupd, $conexion);
    } 
    return $this->odb->updProveedorBean($oupd, $conexion);
  }   

  /**
   * PROCEDIMIENTO : Actualizacion de un objeto tipo CuentaBean
   * @param $oupd - objeto tipo CuentaBean para actualizar
   * @param $conexion - conexion a la base de datos
   * @return true / false
   */
  function saveCuentaBean($oupd, $conexion) {
    if($oupd->getcdcuenta()==0) {
       $oupd->setcdcuenta($this->getnextCuentaBean($oupd->getcdempresa(), $oupd->getcdejercicio(), $conexion));
       return $this->odb->addCuentaBean($oupd, $conexion);
    } 
    return $this->odb->updCuentaBean($oupd, $conexion);
  }   

//////////////////////////////////////////////////////////////////////////
//                           DELETE CODE
//////////////////////////////////////////////////////////////////////////
  /**
   * PROCEDIMIENTO : Eliminacion de un objeto tipo TpcuentaBean
   * @param $pscdtpcuenta - Clave del tipo de cuenta contable
   * @param $conexion - conexion a la base de datos
   * @return true / false
   */
  function delTpcuentaBean($pscdtpcuenta, $conexion) {
     $obj = $this->getTpcuentaBean($pscdtpcuenta, $conexion);
     $obj->setsttpcuenta("IN");
     return $this->updTpcuentaBean($obj, $conexion);
  }  
    
  /**
   * PROCEDIMIENTO : Eliminacion de un objeto tipo TpolizaBean
   * @param $pscdtpoliza - Clave del tipo de poliza
   * @param $conexion - conexion a la base de datos
   * @return true / false
   */
  function delTpolizaBean($pscdtpoliza, $conexion) {
     $obj = $this->getTpolizaBean($pscdtpoliza, $conexion);
     $obj->setsttpoliza("IN");
     return $this->updTpolizaBean($obj, $conexion);
  }  
    
  /**
   * PROCEDIMIENTO : Eliminacion de un objeto tipo TpagoBean
   * @param $pscdtpago - Clave del tipo de pago
   * @param $conexion - conexion a la base de datos
   * @return true / false
   */
  function delTpagoBean($pscdtpago, $conexion) {
     $obj = $this->getTpagoBean($pscdtpago, $conexion);
     $obj->setsttpago("IN");
     return $this->updTpagoBean($obj, $conexion);
    }  
    
  /**
   * PROCEDIMIENTO : Eliminacion de un objeto tipo ConceptoBean
   * @param $pscdconcepto - Clave del concepto contable
   * @param $conexion - conexion a la base de datos
   * @return true / false
   */
  function delConceptoBean($pscdconcepto, $conexion) {
     $obj = $this->getConceptoBean($pscdconcepto, $conexion);
     $obj->setstconcepto("IN");
     return $this->updConceptoBean($obj, $conexion);
  }  
    
  /**
   * PROCEDIMIENTO : Eliminacion de un objeto tipo TpcomproBean
   * @param $pscdtpcomprobante - Clave del tipo de comprobante o documento(factura, honorarios...)
   * @param $conexion - conexion a la base de datos
   * @return true / false
   */
  function delTpcomproBean($pscdtpcomprobante, $conexion) {
     $obj = $this->getTpcomproBean($pscdtpcomprobante, $conexion);
     $obj->setsttpcomprob("IN");
     return $this->updTpcomproBean($obj, $conexion);
  }  
    
  /**
   * PROCEDIMIENTO : Eliminacion de un objeto tipo EstadoBean
   * @param $pscdestado - Clave del estado
   * @param $conexion - conexion a la base de datos
   * @return true / false
   */
  function delEstadoBean($conexion) {

    }  
    
  /**
   * PROCEDIMIENTO : Eliminacion de un objeto tipo PaisBean
   * @param $pscdpais - Clave del pais
   * @param $conexion - conexion a la base de datos
   * @return true / false
   */
  function delPaisBean($pscdpais, $conexion) {

    }  
    
  /**
   * PROCEDIMIENTO : Eliminacion de un objeto tipo ClienteBean
   * @param $pscdempresa - Clave de la empresa
   * @param $pscdcliente - Clave del cliente
   * @param $conexion - conexion a la base de datos
   * @return true / false
   */
  function delClienteBean($pscdempresa, $pscdcliente, $conexion) {
    $otmp = $this->getClienteBean($pscdempresa, $pscdcliente, $conexion);
    $otmp->setstcliente('IN');
    return $this->odb->updClienteBean($otmp, $conexion);
  }  
    
  /**
   * PROCEDIMIENTO : Eliminacion de un objeto tipo DoctoClienteBean
   * @param $odel - objeto tipo DoctoClienteBean para eliminar
   * @param $conexion - conexion a la base de datos
   * @return true / false
   */
  function delDoctoClienteBean($odel, $conexion) {
    return $this->odb->delDoctoClienteBean($odel, $conexion);
  }  
  
  /**
   * PROCEDIMIENTO : Eliminacion de un objeto tipo DoctoClienteBean
   * @param $pscdempresa - Clave de la empresa
   * @param $pscdcliente - Clave del cliente
   * @param $pscddocumento - Clave del documento
   * @param $conexion - conexion a la base de datos
   * @return true / false
   */
  function delDoctoClienteBean_key($pscdempresa, $pscdcliente, $pscddocumento, $conexion) {
    return $this->odb->delDoctoClienteBean_key($pscdempresa, $pscdcliente, $pscddocumento, $conexion);
    }  
    
  /**
   * PROCEDIMIENTO : Eliminacion de un objeto tipo ContactoClienteBean
   * @param $odel - objeto tipo ContactoClienteBean para eliminar
   * @param $conexion - conexion a la base de datos
   * @return true / false
   */
  function delContactoClienteBean($odel, $conexion) {
    return $this->odb->delContactoClienteBean($odel, $conexion);
  }  
  
  /**
   * PROCEDIMIENTO : Eliminacion de un objeto tipo ContactoClienteBean
   * @param $pscdempresa - Clave de la empresa
   * @param $pscdcliente - Clave del cliente
   * @param $pscdcontacto - Clave del contacto
   * @param $conexion - conexion a la base de datos
   * @return true / false
   */
  function delContactoClienteBean_key($pscdempresa, $pscdcliente, $pscdcontacto, $conexion) {
    return $this->odb->delContactoClienteBean_key($pscdempresa, $pscdcliente, $pscdcontacto, $conexion);
    }  
    
  /**
   * PROCEDIMIENTO : Eliminacion de un objeto tipo ContactoBean
   * @param $odel - objeto tipo ContactoBean para eliminar
   * @param $conexion - conexion a la base de datos
   * @return true / false
   */
  function delContactoBean($odel, $conexion) {
    return $this->odb->delContactoBean($odel, $conexion);
  }  
  
  /**
   * PROCEDIMIENTO : Eliminacion de un objeto tipo ContactoBean
   * @param $pscdempresa - Clave de la empresa
   * @param $pscdcontacto - Clave del contacto
   * @param $conexion - conexion a la base de datos
   * @return true / false
   */
  function delContactoBean_key($pscdempresa, $pscdcontacto, $conexion) {
    return $this->odb->delContactoBean_key($pscdempresa, $pscdcontacto, $conexion);
    }  
    
  /**
   * PROCEDIMIENTO : Eliminacion de un objeto tipo ContactoProveedorBean
   * @param $odel - objeto tipo ContactoProveedorBean para eliminar
   * @param $conexion - conexion a la base de datos
   * @return true / false
   */
  function delContactoProveedorBean($odel, $conexion) {
    return $this->odb->delContactoProveedorBean($odel, $conexion);
  }  
  
  /**
   * PROCEDIMIENTO : Eliminacion de un objeto tipo ContactoProveedorBean
   * @param $pscdempresa - Clave de la empresa
   * @param $pscdproveedor - Clave del proveedor
   * @param $pscdcontacto - Clave del contacto
   * @param $conexion - conexion a la base de datos
   * @return true / false
   */
  function delContactoProveedorBean_key($pscdempresa, $pscdproveedor, $pscdcontacto, $conexion) {
    return $this->odb->delContactoProveedorBean_key($pscdempresa, $pscdproveedor, $pscdcontacto, $conexion);
    }  
    
  /**
   * PROCEDIMIENTO : Eliminacion de un objeto tipo DoctoProveedorBean
   * @param $odel - objeto tipo DoctoProveedorBean para eliminar
   * @param $conexion - conexion a la base de datos
   * @return true / false
   */
  function delDoctoProveedorBean($odel, $conexion) {
    return $this->odb->delDoctoProveedorBean($odel, $conexion);
  }  
  
  /**
   * PROCEDIMIENTO : Eliminacion de un objeto tipo DoctoProveedorBean
   * @param $pscdempresa - Clave de la empresa
   * @param $pscdproveedor - Clave del proveedor
   * @param $pscddocumento - Clave del documento
   * @param $conexion - conexion a la base de datos
   * @return true / false
   */
  function delDoctoProveedorBean_key($pscdempresa, $pscdproveedor, $pscddocumento, $conexion) {
    return $this->odb->delDoctoProveedorBean_key($pscdempresa, $pscdproveedor, $pscddocumento, $conexion);
    }  
    
  /**
   * PROCEDIMIENTO : Eliminacion de un objeto tipo ProveedorBean
   * @param $pscdempresa - Clave de la empresa
   * @param $pscdproveedor - Clave del proveedor
   * @param $conexion - conexion a la base de datos
   * @return true / false
   */
  function delProveedorBean($pscdempresa, $pscdproveedor, $conexion) {
    $otmp = $this->getProveedor($pscdempresa, $pscdproveedor, $conexion);
    $otmp->setstproveedor('IN');
    return $this->odb->updProveedorBean($otmp, $conexion);
  }  

  /**
   * PROCEDIMIENTO : Eliminacion de un objeto tipo CuentaBean
   * @param $pscdempresa - Clave de la empresa a la que pertenece la cuenta contable
   * @param $pscdejercicio - Clave del ejercicio fiscal
   * @param $picdcuenta - Clave interna de la cuenta contable
   * @param $conexion - conexion a la base de datos
   * @return true / false
   */
  function delCuentaBean($pscdempresa, $pscdejercicio, $picdcuenta, $conexion) {
    $otmp = $this->getCuentaBean($pscdempresa, $pscdejercicio, $picdcuenta, $conexion);
    $otmp->setstcuenta('IN');
    return $this->odb->updCuentaBean($otmp, $conexion);
  }  

} /* fin clase [BIZCatalogos] */

?>

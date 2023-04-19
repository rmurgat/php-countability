<? 
require_once("../seguridad/header.php");
require_once("../comun/CriterioBean.php");
require_once("../comun/PolizaBean.php");
require_once("../comun/EmpresaBean.php");
require_once("../comun/TpolizaBean.php");
require_once("../comun/MovimientoBean.php");
require_once("../comun/CuentaBean.php");
require_once("../util/Utilerias.php"); 
require_once("BIZGeneral.php");

/**
 * Programa: poliza.php
 * Descripcion:
 *     Script para dar de alta, modificar y consultar una poliza contable
 * Autor:
 *     HANYGEN Software S.A. de C.V. 
 *     Ruben Murga Tapia
 **/
$obus = new BIZGeneral();
$oobj = new PolizaBean();
$ocrit = new CriterioBean();
$omov = new MovimientoBean();
$cmovtos = array();
$mensaje = "";
$outil = new Utilerias();

$hidopcion = $_POST['hidopcion'];
$hidcdempresa = ($_POST['hidcdempresa']==null)? $_GET['hidcdempresa']: $_POST['hidcdempresa'];
$hidcdejercicio = ($_POST['hidcdejercicio']==null)? $_GET['hidcdejercicio']: $_POST['hidcdejercicio'];
$hidmovto = ($_POST['hidmovto']==null)? $_GET['hidmovto']: $_POST['hidmovto'];
$hidnumes = ($_POST['hidnumes']==null)? $_GET['hidnumes']: $_POST['hidnumes'];
$hidcdpoliza = ($_POST['hidcdpoliza']==null)? $_GET['hidcdpoliza']: $_POST['hidcdpoliza'];
$hidoperacion = ($_POST['hidoperacion']==null)? $_GET['hidoperacion']: $_POST['hidoperacion'];

if($hidoperacion=='consulta') $readonly='readonly';

if($hidopcion=="del") {
  $odel = $obus->getMovimientoBean($hidcdempresa, $hidcdejercicio, $hidcdpoliza, $hidmovto, $conn);
  $obus->delMovimientoBean($odel, $conn);
}
if($hidopcion=="upd") {
  $omov = $obus->getMovimientoBean($hidcdempresa, $hidcdejercicio, $hidcdpoliza, $hidmovto, $conn);
}
 
if($hidopcion=="save_movto") {
  $omov->setcdempresa($hidcdempresa);
  $omov->setcdejercicio($hidcdejercicio);
  $omov->setcdpoliza($hidcdpoliza);
  $omov->setcdmovimiento($hidmovto);
  $omov->setnumes($hidnumes);
  $omov->setstmovimiento('AC');
  $omov->setstactualizado('IN');
  $omov->setfhactualizado('');
  $omov->setcdcuenta($_POST['cbocuenta']);
  $omov->setnbmovimiento($_POST['txtnbmovimiento']);
  $omov->setimparcial($_POST['txtparcial']);
  $omov->setimdebe($_POST['txtdebe']);
  $omov->setimhaber($_POST['txthaber']);
 
  if (is_uploaded_file($_FILES['txtlnkmovto']['tmp_name']))  {
      $foto_file = $_FILES['txtlnkmovto']['name'];
      $foto_ext = substr($foto_file, strripos($foto_file,".")+1);
      $omov->setlkcomprobante(".".$foto_ext);
  }
  if($obus->saveMovimientoBean($omov, $conn)) {
    if (is_uploaded_file($_FILES['txtlnkmovto']['tmp_name']))  {
        copy($_FILES['txtlnkmovto']['tmp_name'], "../".$hidcdempresa."/img_polizas/".$omov->getlkcomprobante());  
    }
    $omov = new MovimientoBean();
    $hidopcion="save";
  }
}

if($hidoperacion=='modificar' || $hidoperacion=='consulta') { 
  $oobj = $obus->getPolizaBean($hidcdempresa, $hidcdejercicio, $hidcdpoliza, $conn);
  $hidnumes = $oobj->getnumes();
  $ocrit1 = new CriterioBean();
  $ocrit1->setcdempresa($hidcdempresa);
  $ocrit1->setcdejercicio($hidcdejercicio);
  $ocrit1->setcdpoliza($hidcdpoliza);
  $cmovtos = $obus->getMovimientoBeans($ocrit1, $conn);
}

if($hidopcion=="save") {
  $oobj->setcdempresa($hidcdempresa);
  $oobj->setcdejercicio($hidcdejercicio);
  $oobj->setnumes($hidnumes);
  $oobj->setnbpoliza($_POST['txtnombre']);
  $oobj->setcdtpoliza($_POST['cbotipo']);
  $oobj->setcdusuariocreo($osession->getcdusuario());

  if (is_uploaded_file($_FILES['txtlnkpoliza']['tmp_name']))  {
      $foto_file = $_FILES['txtlnkpoliza']['name'];
      $foto_ext = substr($foto_file, strripos($foto_file,".")+1);
      $oobj->setlkpoliza(".".$foto_ext);
  }

  if(!$obus->savePolizaBean($oobj, $conn)) {
    $mensaje = "***ERROR AL QUERER AGREGAR/MODIFICAR UNA POLIZA EN EL SISTEMA***";  
  } else {
    $mensaje = "! SE HA SALVADO LA INFORMACI&Oacute;N DE UNA POLIZA CON EXITO !";  
      if (is_uploaded_file($_FILES['txtlnkpoliza']['tmp_name']))  {
        copy($_FILES['txtlnkpoliza']['tmp_name'], "../".$hidcdempresa."/img_polizas/".$oobj->getlkpoliza());  
    }
    if($hidoperacion=='nuevo') $hidoperacion='modificar';
  } 
  $hidopcion="";
}

$oemp = $obus->getEmpresaBean($hidcdempresa, $conn);
$ctipos = $obus->getTpolizaBeans($oemp->getcdpais(), $conn);
$ocrit->setcdempresa($hidcdempresa);
$ocrit->setcdejercicio($hidcdejercicio);
$ocrit->settpcuenta('DE');
$ocrit->setstcuenta('AC');
$cctas = $obus->getcCuentaBeans($ocrit, $conn);

?>

<form name="frmpoliza" method="post" action="" enctype="multipart/form-data">
<input type="hidden" name="hidopcion" value="">
<input type="hidden" name="id" value="<?=$id?>">
<input type="hidden" name="hidcdempresa" value="<?=$hidcdempresa?>">
<input type="hidden" name="hidcdejercicio" value="<?=$hidcdejercicio?>">
<input type="hidden" name="hidoperacion" value="<?=$hidoperacion?>">
<input type="hidden" name="hidcdpoliza" value="<?=$oobj->getcdpoliza()?>">
<input type="hidden" name="hidmovto" value="<?=$omov->getcdmovimiento()?>">
<input type="hidden" name="hidnumes" value="<?=$hidnumes?>">
<script language="javascript">
var form = document.frmpoliza;

function salvar() {
    if(!valida_poliza()) return;    
    form.hidopcion.value="save";
    form.submit();
}

function valida_poliza() {
  var stxtnombre = trim(form.txtnombre.value);

  if(stxtnombre=='') {
    alert('Es necesario ingresar un valor al campo NOMBRE!');
    return false;
  }
  return true;
}

function cerrar() {
    form.action = '../seguridad/menu.php'; 
    form.submit();
}

function save_movto() {
    if(!valida_movto()) return;
    form.hidopcion.value="save_movto";
    form.submit();
}

function eliminar(clave) {
    if(!confirm("Esta seguro de querer eliminar el movimiento contable ?")) return;
    form.hidmovto.value = clave;
    form.hidopcion.value = "del";
    form.submit();
}

function modificar(clave) {
    form.hidmovto.value = clave;
    form.hidopcion.value = "upd";
    form.submit();
}

function cancelar() {
    form.hidopcion.value = "";
    form.submit();
}

function valida_movto() {
  var snbmovimiento = trim(form.txtnbmovimiento.value);
  var scbocuenta = trim(form.cbocuenta.value);
  var stxtparcial = trim(form.txtparcial.value);
  var stxtdebe = trim(form.txtdebe.value);
  var stxthaber = trim(form.txthaber.value);

  if(scbocuenta=='') {
    alert('Es necesario ingresar un valor al campo CUENTA!');
    return false;
  }
  if(snbmovimiento=='') {
    alert('Es necesario ingresar una descripcion del MOVIMIENTO!');
    return false;
  }
  if(stxtparcial=='') {
    alert('Es necesario ingresar un valor al campo PARCIAL!');
    return false;
  }
  if(parseFloat(stxtparcial)<=0) {
    alert('Es necesario que el importe PARCIAL del movimiento sea mayor a Cero !');
    return false;
  }
  if(stxtdebe =='') {
    alert('Es necesario ingresar un valor al campo DEBE!');
    return false;
  }
  if(stxthaber =='') {
    alert('Es necesario ingresar un valor al campo HABER!');
    return false;
  }
  if(parseFloat(stxtdebe) + parseFloat(stxthaber)<=0) {
    alert('Es necesario que cualquiera de los importes DEBE o HABER sea mayor a Cero!');
    return false;
  } 
  if(parseFloat(stxtdebe) + parseFloat(stxthaber)!=parseFloat(stxtparcial)) {
    alert('La suma de DEBE + HABER, tiene que ser igual a el importe PARCIAL!');
    return false;
  } 

  return true;
}

function open_link(link) {
    window.open(link, "", "scrollbars=yes,resizable=yes,top=100,left=100,width=450,height=410");
}

function trim(cadena) {
    var micadena = cadena;
    while(micadena.charAt(0)==' ') micadena=micadena.substring(1,micadena.length);
    while(micadena.charAt(micadena.length-1)==' ') micadena=micadena.substring(0,(micadena.length-1));
    return micadena;
}

</script>

<table border="0" cellspacing="0" cellpadding="0" width="600">
  <tr>
      <td><img src="../html/images/blank.gif" width="15" height="5"></td>
      <td class="titulos01">
        <? if($hidoperacion=='nuevo') { ?>
             nueva<b>poliza</b>
        <? } ?>
        <? if($hidoperacion=='modificar') { ?>
             modificaci&oacute;n<b>de</b>poliza
         <? } ?>
        <? if($hidoperacion=='consulta') { ?>
             consulta<b>de</b>poliza
         <? } ?>
      </td>
       <!-- inicio no.poliza -->
          <td align="right"> 
            <? if($hidoperacion!='nuevo') { ?>
            <table border="0" cellspacing="0" cellpadding="0">
              <tr> 
                <td bgcolor="#CCCCCC" rowspan="3"><img src="../html/images/blank.gif" width="1" height="1"></td>
                <td bgcolor="#AEBEDD"> 
                  <table border="0" cellspacing="0" cellpadding="5" align="center">
                    <tr> 
                      <td class="AvisoHeaderBold"> 
                        <div align="center">N&uacute;mero de Poliza</div>
                      </td>
                    </tr>
                  </table>
                </td>
                <td rowspan="3" bgcolor="#CCCCCC"><img src="../html/images/blank.gif" width="1" height="1"></td>
              </tr>
              <tr> 
                <td> 
                  <table border="0" cellspacing="0" cellpadding="5" align="center">
                    <tr> 
                      <td class="txt10Vgris"><?=$oobj->getscdpoliza()?></td>
                    </tr>
                  </table>
                </td>
              </tr>
              <tr> 
                <td bgcolor="#CCCCCC"><img src="../html/images/blank.gif" width="1" height="1"></td>
              </tr>
            </table>
            <? } ?>
          </td>
     <!-- fin no.poliza -->
  </tr>
  <tr>
    <td colspan="3"><img src="../html/images/blank.gif" width="1" height="5"></td>
  </tr>
  <? if($mensaje!='') { ?>
  <tr bgcolor=orange>
    <td><img src="../html/images/blank.gif" width="15" height="5"></td>
    <td colspan="2" class="AvisoHeaderBold"><?=$mensaje?></td>
  </tr>
  <? } ?>
  <tr>
    <td>&nbsp;</td>
    <td colspan="2">
      <table border="0" cellspacing="0" cellpadding="0" align="center" width="100%">
          <tr>
            <td rowspan="7" bgcolor="#CCCCCC"><img src="../html/images/blank.gif" width="2" height="1"></td>
            <td bgcolor="#1A64CB"><img src="../html/images/blank.gif" width="1" height="3"></td>
            <td rowspan="7" bgcolor="#CCCCCC"><img src="../html/images/blank.gif" width="2" height="1"></td>
          </tr>
          <tr>
            <td bgcolor="#7E9EDF" class="txt14V"><img src="../html/images/blank.gif" width="1" height="10"></td>
          </tr>
          <tr>
            <td bgcolor="#1A64CB"><img src="../html/images/blank.gif" width="1" height="3"></td>
          </tr>
          <tr>
            <td>
              <table width="100%" border="0" cellspacing="0" cellpadding="7">
                <tr>
                  <td bgcolor="#E5ECF9">
                    <table border="0" cellspacing="0" cellpadding="0" width="100%">
                <tr>
                  <td>
                    <table border="0" cellspacing="0" cellpadding="0" width="100%">
                      <tr>
                        <td class="txt11V">Nombre:<br>
                          <img src="../html/images/blank.gif" width="145" height="1">
                        </td>
                        <td><img src="../html/images/blank.gif" width="5" height="1"></td>
                        <td>
                          <input type="text" name="txtnombre" value="<?=$oobj->getnbpoliza()?>" size="60" maxlength="100" class="txt10Vgris" <?=$readonly?> >
                        </td>
                       <td class="txt11V" align="right">Tipo:<br>
                          <img src="../html/images/blank.gif" width="100" height="1">
                        </td>
                        <td><img src="../html/images/blank.gif" width="5" height="1"></td>
                        <td align="right">
                          <select name="cbotipo" class="txt10Vgris" <?=$readonly?>>
                          <? foreach($ctipos as $orow) { ?>
                          <option value="<?=$orow->getcdtpoliza()?>" <? if($oobj->getcdtpoliza()==$orow->getcdtpoliza()) { echo "selected"; } ?>><?=$orow->getnbtpoliza()?></option>
                          <? } ?>
                          </select>
                        </td>
                      </tr>
                      <tr>
                        <td class="txt11V">Estatus:<br>
                          <img src="../html/images/blank.gif" width="145" height="1">
                        </td>
                        <td><img src="../html/images/blank.gif" width="5" height="1"></td>
                        <td class="txt11V"><?=$oobj->getsstpoliza()?></td>
                      <td class="txt11V" align="right">Fecha<br>Creaci&oacute;n:<br>
                          <img src="../html/images/blank.gif" width="100" height="1">
                        </td>
                        <td><img src="../html/images/blank.gif" width="5" height="1"></td>
                        <td align="right"><input type="text" name="txtfecha" value="<?=$oobj->getfhcreada()?>" size="15" maxlength="10" class="txt10Vgris" disabled></td>
                      </tr>
                      <tr>
                        <td class="txt11V">Archivo:<br>
                          <img src="../html/images/blank.gif" width="145" height="1">
                        </td>
                        <td><img src="../html/images/blank.gif" width="5" height="1"></td>
                        <td class="txt11V">
                          <input type="file" name="txtlnkpoliza" value="" size="40" maxlength="100" class="txt10Vgris" <?=$readonly?>>
                          <? if($oobj->getlkpoliza()!='') { ?>
                          <a href="javascript:open_link('../<?=$hidcdempresa?>/img_polizas/<?=$oobj->getlkpoliza()?>');"><img src="../html/images/iconos/<?=$outil->getfileimage($oobj->getlkpoliza())?>" width="18" height="16"  border="0" alt="archivo adjunto"></a>
                          <img src="../html/images/iconos/I_zera_result.gif" width="13" height="13"  border="0" alt="eiminaci&oacute; de archivo adjunto">
                           <? } ?>
                        </td>
                        <td class="txt11V" align="right">Fecha<br>Actualizaci&oacute;n:<br>
                          <img src="../html/images/blank.gif" width="100" height="1">
                        </td>
                        <td><img src="../html/images/blank.gif" width="5" height="1"></td>
                        <td align="right"><input type="text" name="txtfecha" value="<?=$oobj->getfhactualizada()?>" size="15" maxlength="10" class="txt10Vgris" disabled></td>

                      </tr>
                    </table>
                  </td>
                </tr>
              </table>
            </td>
          </tr>

<!--  inicio inicio  -->
  <tr>
    <td bgcolor="#FFFFFF">
      <table border="0" cellspacing="0" cellpadding="0" width="100%">
          <tr>
            <td rowspan="4" bgcolor="#CCCCCC"><img src="../html/images/blank.gif" width="1" height="1"></td>
            <td>
              <table border="0" cellspacing="0" cellpadding="4" width="100%">
                <tr>
                  <td bgcolor="#7E9EDF"><img src="../html/images/blank.gif" width="0" height="0"></td>
                  <td bgcolor="#FFFFFF" background="../html/images/tablas/fnd01.gif"><img src="../html/images/blank.gif" width="0" height="0"></td>
                  <td bgcolor="#7E9EDF"><img src="../html/images/blank.gif" width="0" height="0"></td>
                  <td bgcolor="#FFFFFF" background="../html/images/tablas/fnd01.gif"><img src="../html/images/blank.gif" width="0" height="0"></td>
                  <td bgcolor="#7E9EDF"><img src="../html/images/blank.gif" width="0" height="0"></td>
                  <td bgcolor="#FFFFFF" background="../html/images/tablas/fnd01.gif"><img src="../html/images/blank.gif" width="0" height="0"></td>
                  <td bgcolor="#7E9EDF"><img src="../html/images/blank.gif" width="0" height="0"></td>
                  <td bgcolor="#FFFFFF" background="../html/images/tablas/fnd01.gif"><img src="../html/images/blank.gif" width="0" height="0"></td>
                  <td bgcolor="#7E9EDF"><img src="../html/images/blank.gif" width="0" height="0"></td>
                  <td bgcolor="#FFFFFF" background="../html/images/tablas/fnd01.gif"><img src="../html/images/blank.gif" width="0" height="0"></td>
                  <td bgcolor="#7E9EDF"><img src="../html/images/blank.gif" width="0" height="0"></td>
                  <td bgcolor="#FFFFFF" background="../html/images/tablas/fnd01.gif"><img src="../html/images/blank.gif" width="0" height="0"></td>
                  <td bgcolor="#7E9EDF"><img src="../html/images/blank.gif" width="0" height="0"></td>
                  <td bgcolor="#FFFFFF" background="../html/images/tablas/fnd01.gif"><img src="../html/images/blank.gif" width="0" height="0"></td>
                  <td bgcolor="#7E9EDF"><img src="../html/images/blank.gif" width="0" height="0"></td>
                </tr>
                <tr>
                  <td bgcolor="#7E9EDF">
                    <div align="center" class="Tittablas">CUENTA</div>
                  </td>
                  <td bgcolor="#FFFFFF" background="../html/images/tablas/fnd01.gif">&nbsp;</td>
                  <td bgcolor="#7E9EDF">
                    <div align="center" class="Tittablas">DESCRIPCI&Oacute;N</div>
                  </td>
                  <td bgcolor="#FFFFFF" background="../html/images/tablas/fnd01.gif">&nbsp;</td>
                  <td bgcolor="#7E9EDF">
                    <div align="center" class="Tittablas">PARCIAL</div>
                  </td>
                  <td bgcolor="#FFFFFF" background="../html/images/tablas/fnd01.gif">&nbsp;</td>
                  <td bgcolor="#7E9EDF">
                    <div align="center" class="Tittablas">DEBE</div>
                  </td>
                  <td bgcolor="#FFFFFF" background="../html/images/tablas/fnd01.gif">&nbsp;</td>
                  <td bgcolor="#7E9EDF">
                    <div align="center" class="Tittablas">HABER</div>
                  </td>
                  <td bgcolor="#FFFFFF" background="../html/images/tablas/fnd01.gif">&nbsp;</td>
                  <td bgcolor="#7E9EDF"><div align="center" class="Tittablas">ARCHIVO</div></td>
                  <td bgcolor="#FFFFFF" background="../html/images/tablas/fnd01.gif">&nbsp;</td>
                  <td bgcolor="#7E9EDF"><div align="center" class="Tittablas">ACT</div></td>
                  <td bgcolor="#FFFFFF" background="../html/images/tablas/fnd01.gif">&nbsp;</td>
                  <td bgcolor="#7E9EDF"><div align="center" class="Tittablas">OPERACIONES</div></td>
                </tr>
                <tr>
                  <td background="../html/images/tablas/fnd05.gif"><img src="../html/images/blank.gif" width="0" height="0"></td>
                  <td background="../html/images/tablas/fnd04.gif"><img src="../html/images/blank.gif" width="0" height="0"></td>
                  <td background="../html/images/tablas/fnd05.gif"><img src="../html/images/blank.gif" width="0" height="0"></td>
                  <td background="../html/images/tablas/fnd04.gif"><img src="../html/images/blank.gif" width="0" height="0"></td>
                  <td background="../html/images/tablas/fnd05.gif"><img src="../html/images/blank.gif" width="0" height="0"></td>
                  <td background="../html/images/tablas/fnd04.gif"><img src="../html/images/blank.gif" width="0" height="0"></td>
                  <td background="../html/images/tablas/fnd05.gif"><img src="../html/images/blank.gif" width="0" height="0"></td>
                  <td background="../html/images/tablas/fnd04.gif"><img src="../html/images/blank.gif" width="0" height="0"></td>
                  <td background="../html/images/tablas/fnd05.gif"><img src="../html/images/blank.gif" width="0" height="0"></td>
                  <td background="../html/images/tablas/fnd04.gif"><img src="../html/images/blank.gif" width="0" height="0"></td>
                  <td background="../html/images/tablas/fnd05.gif"><img src="../html/images/blank.gif" width="0" height="0"></td>
                  <td background="../html/images/tablas/fnd04.gif"><img src="../html/images/blank.gif" width="0" height="0"></td>
                  <td background="../html/images/tablas/fnd05.gif"><img src="../html/images/blank.gif" width="0" height="0"></td>
                  <td background="../html/images/tablas/fnd04.gif"><img src="../html/images/blank.gif" width="0" height="0"></td>
                  <td background="../html/images/tablas/fnd05.gif"><img src="../html/images/blank.gif" width="0" height="0"></td>
                </tr>
            <!-- aqui inicia el renglon -->
           <?php
               $it = 0;
               foreach($cmovtos as $orow) {
                  $octa = $obus->getCuentaBean($orow->getcdempresa(), $orow->getcdejercicio(), $orow->getcdcuenta(), $conn);
                  if(!$omov->hasamekey($orow)) {
            ?>
                <tr <?if($it%2==0) echo "bgcolor='#EEEEEE'"; ?>>
                  <td <?if($it%2==0) echo "bgcolor='#E5ECF9'"; ?> class="txtV10Gris2" nowrap><?=$octa->getnucuenta()?></td>
                  <td background="../html/images/tablas/<?=($it%2==0?'fnd02.gif':'fnd03.gif')?>" bgcolor="#CCCCCC">&nbsp;</td>
                  <td <?if($it%2==0) echo "bgcolor='#E5ECF9'"; ?> class="txtV10Gris2">
                    <div align="center"><?=$orow->getnbmovimiento()?></div>
                  </td>
                  <td background="../html/images/tablas/<?=($it%2==0?'fnd02.gif':'fnd03.gif')?>" bgcolor="#CCCCCC">&nbsp;</td>
                  <td <?if($it%2==0) echo "bgcolor='#E5ECF9'"; ?> class="txtV10Gris2">
                    <div align="center"><?=$orow->getimparcial()?></div>
                  </td>
                  <td background="../html/images/tablas/<?=($it%2==0?'fnd02.gif':'fnd03.gif')?>" bgcolor="#CCCCCC">&nbsp;</td>
                  <td <?if($it%2==0) echo "bgcolor='#E5ECF9'"; ?> class="txtV10Gris2">
                    <div align="center"><?=$orow->getimdebe()?></div>
                  </td>
                  <td background="../html/images/tablas/<?=($it%2==0?'fnd02.gif':'fnd03.gif')?>" bgcolor="#CCCCCC">&nbsp;</td>
                  <td <?if($it%2==0) echo "bgcolor='#E5ECF9'"; ?> class="txtV10Gris2">
                    <div align="center"><?=$orow->getimhaber()?></div>
                  </td>
                  <td background="../html/images/tablas/<?=($it%2==0?'fnd02.gif':'fnd03.gif')?>" bgcolor="#CCCCCC">&nbsp;</td>
                  <td <?if($it%2==0) echo "bgcolor='#E5ECF9'"; ?>>
                    <div align="center">
                    <? if($orow->getlkcomprobante()!='') { ?>
                    <a href="javascript:open_link('../<?=$hidcdempresa?>/img_polizas/<?=$orow->getlkcomprobante()?>');"><img src="../html/images/iconos/<?=$outil->getfileimage($orow->getlkcomprobante())?>" width="18" height="16"  border="0" alt="archivo adjunto"></a>
                    <img src="../html/images/iconos/I_zera_result.gif" width="13" height="13"  border="0" alt="eiminaci&oacute; de archivo adjunto"> 
                    <? } ?>
                    </div>
                  </td>
                  <td background="../html/images/tablas/<?=($it%2==0?'fnd02.gif':'fnd03.gif')?>" bgcolor="#CCCCCC">&nbsp;</td>
                  <td <?if($it%2==0) echo "bgcolor='#E5ECF9'"; ?> class="txtV10Gris2">
                    <div align="center"><? if($orow->getstactualizado()=='AC') { ?><img src="../html/images/iconos/I_paloma.gif" height="14" border="0"><? } ?></div>
                  </td>
                  <td background="../html/images/tablas/<?=($it%2==0?'fnd02.gif':'fnd03.gif')?>" bgcolor="#CCCCCC">&nbsp;</td>
                  <td <?if($it%2==0) echo "bgcolor='#E5ECF9'"; ?>>
                    <div align="center">
                            <? if($hidoperacion=='modificar') { ?>
                           <a href="javascript:modificar('<?=$orow->getcdmovimiento()?>');"><img src="../html/images/botones/B_edit.gif" width="18" height="16" alt="Edici&oacute;n de informaci&oacute;n de un movimiento" border="0"></a>
                           <a href="javascript:eliminar('<?=$orow->getcdmovimiento()?>')"><img src="../html/images/botones/B_del.gif" width="18" height="16" alt="Eliminaci&oacute;n de un movimiento" border="0"></a>
                           <? } ?>
                    </div>
                  </td>
                </tr>
                <!-- aqui termina el listado de renglones -->
      <? $it++; 
           } } ?>

        <? if($hidoperacion=='modificar') { ?>
                <!-- inicia para ingresar nuevo registro -->
                <tr bgcolor='#EEEEEE'>
                  <td class="txtV10Gris2" colspan="3">
                      <select name="cbocuenta" class="txt10Vgris">
                      <option value="">[Seleccionar una cuenta contable]</option>
                      <? foreach($cctas as $orow) { ?>
                      <option value="<?=$orow->getcdcuenta()?>" <? if($omov->getcdcuenta()==$orow->getcdcuenta()) { echo "selected"; } ?> ><?=$orow->getnucuenta()." - ".$orow->getnbcuenta()?></option>
                      <? } ?>
                      </select><br><input type="text" name="txtnbmovimiento" size="60" value="<?=$omov->getnbmovimiento()?>" class="txt10Vgris">
                  </td>
                  <td background="../html/images/tablas/fnd02.gif" bgcolor="#EEEEEE">&nbsp;</td>
                  <td>
                    <div align="center"><input type="text" name="txtparcial" size="10" value="<?=$omov->getimparcial()?>" class="txt10Vgris"></div>
                  </td>
                  <td background="../html/images/tablas/fnd02.gif" bgcolor="#EEEEEE">&nbsp;</td>
                  <td class="txtV10Gris2">
                    <div align="center"><input type="text" name="txtdebe" size="10" value="<?=$omov->getimdebe()?>" class="txt10Vgris"></div>
                  </td>
                  <td background="../html/images/tablas/fnd02.gif" bgcolor="#EEEEEE">&nbsp;</td>
                  <td class="txtV10Gris2">
                    <div align="center"><input type="text" name="txthaber" size="10" value="<?=$omov->getimhaber()?>" class="txt10Vgris"></div>
                  </td>
                  <td background="../html/images/tablas/fnd02.gif" bgcolor="#EEEEEE">&nbsp;</td>
                  <td class="txtV10Gris2" colspan="3">
                    <div align="center"><input type="file" name="txtlnkmovto" size="1" stype="<?=$omov->getlkcomprobante()?>"></div>
                  </td>
                  <td background="../html/images/tablas/fnd02.gif" bgcolor="#EEEEEE">&nbsp;</td>
                  <td class="txtV10Gris2" nowrap>
                    <div align="center">
                          <? if($hidopcion=="upd") { ?>
                          <a href="javascript:cancelar();"><img src="../html/images/botones/B_no.gif" height="14" border="0"></a>
                          <a href="javascript:save_movto();"><img src="../html/images/botones/B_salvar.gif" height="14" border="0"></a>
                          <? } else { ?>
                          <a href="javascript:save_movto();"><img src="../html/images/botones/B_agregar.gif" height="14" border="0"></a>
                           <? } ?>
                    </div>
                  </td>
                </tr>
                <!-- fin de ingreso nuevo registro -->
                <? } ?>

              </table>
            </td>
            <td rowspan="4" bgcolor="#CCCCCC"><img src="../html/images/blank.gif" width="1" height="1"></td>
          </tr>
          <tr>
            <td bgcolor="#1A64CB"><img src="../html/images/blank.gif" width="1" height="3"></td>
          </tr>
          <tr>
            <td bgcolor="#7E9EDF">&nbsp;</td>
          </tr>
          <tr>
            <td bgcolor="#1A64CB"><img src="../html/images/blank.gif" width="1" height="3"></td>
          </tr>
      </table>
    </td>
  </tr>

<!--  fin fin  -->
            <td bgcolor="#1A64CB"><img src="../html/images/blank.gif" width="1" height="3"></td>
          </tr>
          <tr>
            <td align="right" bgcolor="#AEBEDD">
            <? if($hidoperacion=='consulta') { ?>
                 <a href="javascript:cerrar();"><img src="../html/images/botones/B_cerrar.gif" width="83" height="25" border="0"></a>
            <? } ?>
            <? if($hidoperacion=='nuevo' || $hidoperacion=='modificar') { ?>
                 <a href="#"><img src="../html/images/botones/B_clean.gif" width="83" height="25" border="0"></a>
                 <a href="javascript:salvar();"><img src="../html/images/botones/B_salvar_camb.gif" width="132" height="25" border="0"></a>
            <? } ?>
            </td>
          </tr>
          <tr>
            <td bgcolor="#1A64CB"><img src="../html/images/blank.gif" width="1" height="3"></td>
          </tr>
          <tr>
            <td colspan="3"><img src="../html/images/blank.gif" width="1" height="20"></td>
          </tr>
          <tr>
            <td colspan="3">
              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td bgcolor="#AEBEDD">
                    <table border="0" cellspacing="0" cellpadding="5">
                      <tr>
                        <td class="AvisoHeaderBold">NOTA IMPORTANTE</td>
                      </tr>
                    </table>
                  </td>
                </tr>
                <tr>
                  <td>
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td bgcolor="#CCCCCC"><img src="../html/images/blank.gif" width="1" height="1"></td>
                        <td>
                          <table border="0" cellspacing="0" cellpadding="5">
                            <tr>
                              <td>
                                <p class="notas" align="justify">Es necesario
                                  que la poliza este balanceada, solo en ese caso podra asentarse contablemente en las cuentas, una vez que ha sido asentada, ya solo se puede consultar &oacute; cancelar.</p>
                                </td>
                            </tr>
                          </table>
                        </td>
                        <td bgcolor="#CCCCCC"><img src="../html/images/blank.gif" width="1" height="1"></td>
                      </tr>
                    </table>
                  </td>
                </tr>
                <tr>
                  <td bgcolor="#CCCCCC"><img src="../html/images/blank.gif" width="1" height="1"></td>
                </tr>
              </table>
            </td>
          </tr>
          <tr>
            <td colspan="3">&nbsp;</td>
          </tr>
      </table>
    </td>
  </tr>
</table>
</form>
<? 
   require_once("../seguridad/footer.php");
?>
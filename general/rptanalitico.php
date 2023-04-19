<? 
require_once("../seguridad/header.php");
require_once("../comun/CriterioBean.php");
require_once("../comun/PolizaBean.php");
require_once("../comun/EmpresaBean.php");
require_once("../comun/TpolizaBean.php");
require_once("../comun/MovimientoBean.php");
require_once("../comun/CuentaBean.php");
require_once("../comun/MesBean.php");
require_once("../util/Utilerias.php"); 
require_once("BIZGeneral.php");

/**
 * Programa: rptanalitico.php
 * Descripcion:
 *     Script para visualizar el reporte de analitico de auxiliares
 * Autor:
 *     HANYGEN Software S.A. de C.V. 
 *     Ruben Murga Tapia
 **/
$obus = new BIZGeneral();
$ocrit = new CriterioBean();
$oemp = new EmpresaBean();
$ocrit = new CriterioBean();
$cpolizas = array();

$hidopcion = $_POST['hidopcion'];
$hidcdempresa = $osession->getcdempresa();
$hidcdejercicio = $osession->getcdejercicio();

$oemp = $obus->getEmpresaBean($hidcdempresa, $conn);

if($hidopcion=='') {    /* aqui sera buscar */
  $ocrit->setcdempresa($hidcdempresa);
  $ocrit->setcdejercicio($hidcdejercicio);
  $ocrit->setnumes($hidnumes);
  $cpolizas = $obus->getPolizaBeans($ocrit, $conn);
}

$ocrit->setcdempresa($hidcdempresa);
$ocrit->setcdejercicio($hidcdejercicio);
$ocrit->setstcuenta('AC');
$cctas = $obus->getcCuentaBeans($ocrit, $conn);
$cmes = $obus->getMesBeans($hidcdempresa, $hidcdejercicio, $conn);

?>
<form name="frmcriterio" method="post">
<input type="hidden" name="id" value="<?=$id?>">
<input type="hidden" name="hidmes" value="">
<input type="hidden" name="hidcuentaini" value="">
<input type="hidden" name="hidcuentafin" value="">

<script language="javascript" src="../html/script/popdate.js"></script>
<script language="javascript">document.write(CalendarPopup_getStyles());</script>
<script language="javascript">var ocalendar = new CalendarPopup();</script>
<script language="javascript">
var form = document.frmcriterio;

function consultar() {
    if(!valida_criterios()) return;
    form.hidmes.value = form.cbomes.value;
    form.hidcuentaini.value = form.cbocuentaini.value;
    form.hidcuentafin.value = form.cbocuentafin.value;
    form.hidmes.value = form.cbomes.value;
    form.action = "rptanalitico2.php";
    form.submit();
}

function cancelar() {
    form.action = "../seguridad/menu.php";
    form.submit();
}

function valida_criterios() {
  var scbomes = trim(form.cbomes.value);
  var scbocuentaini = trim(form.cbocuentaini.value);
  var scbocuentafin = trim(form.cbocuentafin.value);

  if(scbomes=='') {
    alert('Es necesario ingresar un valor al campo MES!');
    return false;
  }
  if(scbocuentaini!='' || scbocuentafin!='') {
      if(scbocuentaini=='') {
        alert('Es necesario ingresar un valor al campo CUENTA INICIAL!');
        return false;
      }
      if(scbocuentafin=='') {
        alert('Es necesario ingresar un valor al campo CUENTA FINAL!');
        return false;
      }
  }
  return true;
}

function trim(cadena) {
    var micadena = cadena;
    while(micadena.charAt(0)==' ') micadena=micadena.substring(1,micadena.length);
    while(micadena.charAt(micadena.length-1)==' ') micadena=micadena.substring(0,(micadena.length-1));
    return micadena;
}

</script>
<table border="0" cellspacing="0" cellpadding="0" width="780">
  <tr> 
    <td> 
      <table border="0" cellspacing="0" cellpadding="0" width="100%">
        <tr> 
          <td width="300" class="titulos01" valign="top"><b>criterios</b>de<b>consulta</b></td>
          <td align="right"><img src="../html/images/blank.gif" width="5" height="1"></td>
        </tr>
      </table>
    </td>
  </tr>
  <tr> 
    <td><img src="../html/images/blank.gif" width="1" height="5"></td>
  </tr>
  <tr> 
    <td><img src="../html/images/blank.gif" width="1" height="5"></td>
  </tr>
  <tr> 
    <td><img src="../html/images/blank.gif" width="1" height="5"></td>
  </tr>
  <tr> 
    <td> 
      <table border="0" cellspacing="0" cellpadding="0" width="100%">
          <tr> 
            <td rowspan="5" bgcolor="#CCCCCC"><img src="../html/images/blank.gif" width="2
" height="1"></td>
            <td bgcolor="#1A64CB"><img src="../html/images/blank.gif" width="1" height="3"></td>
            <td rowspan="5" bgcolor="#CCCCCC"><img src="../html/images/blank.gif" width="2" height="1"></td>
          </tr>
    <!-- inician criterios de consulta -->
          <tr>
             <td bgcolor="#AEBEDD">
             <table border="0" cellspacing="0" cellpadding="0" width="100%">
             <tr>
             <td bgcolor="#AEBEDD"><img src="../html/images/blank.gif" width="1" height="1"></td>
             <td align="right">
                    <table border="0" cellspacing="0" cellpadding="0" width="100%">
                      <tr>
                        <td class="cifras">Cuenta Contable Inicial:</td>
                        <td><img src="../html/images/blank.gif" width="10" height="1"></td>
                        <td>
                            <select name="cbocuentaini" class="txt10Vgris">
                            <option value="">[TODAS]</option>
                            <? foreach($cctas as $orow) { ?>
                            <option value="<?=$orow->getnucuenta()?>"><?=$orow->getnucuenta()." - ".$orow->getnbcuenta()?></option>
                            <? } ?>
                            </select>
                        </td>
                        <td><img src="../html/images/blank.gif" width="10" height="1"></td>
                        <td class="cifras">Cuenta Final:</td>
                        <td><img src="../html/images/blank.gif" width="10" height="1"></td>
                        <td>
                            <select name="cbocuentafin" class="txt10Vgris">
                            <option value="">[TODAS]</option>
                            <? foreach($cctas as $orow) { ?>
                            <option value="<?=$orow->getnucuenta()?>"><?=$orow->getnucuenta()." - ".$orow->getnbcuenta()?></option>
                            <? } ?>
                            </select>
                        </td>
                      </tr>
                      <tr>
                        <td class="cifras">Mes:</td>
                        <td><img src="../html/images/blank.gif" width="10" height="1"></td>
                        <td>
                            <select name="cbomes" class="txt10Vgris">
                            <? foreach($cmes as $orow) { ?>
                            <option value="<?=$orow->getnumes()?>"><?=$orow->getnbmes()?></option>
                            <? } ?>
                            </select>
                        </td>
                        <td colspan="4"><img src="../html/images/blank.gif" width="10" height="1"></td>
                      </tr>
                    </table>
                  </td>
                </tr>
              </table>
            </td>
          </tr>
          <tr> 
            <td bgcolor="#1A64CB"><img src="../html/images/blank.gif" width="1" height="3"></td>
          </tr>

<!-- terminan los criterios de consulta -->
         </table>
      </td>
      </tr>
      <tr>
         <td><img src="../html/images/blank.gif" width="30" height="20"></td>
      </tr>
      <tr>
         <td align="center">
            <table border="0" cellspacing="0" cellpadding="0" width="30%">     
            <tr>
                <td>
                      <a href="javascript:consultar();"><img src="../html/images/botones/B_continue.gif" border="0"></a>
                 </td>
                 <td>
                      <img src="../html/images/blank.gif" width="10" height="1">
                 </td>
                 <td>
                     <a href="javascript:cancelar();"><img src="../html/images/botones/B_cancel.gif" border="0"></a>
                 </td>
            </tr>
            </table>
         </td>
      </tr>

</table>
</form>
<? 
   require_once("../seguridad/footer.php");
?>
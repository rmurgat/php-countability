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
 * Programa: rptbalanza2.php
 * Descripcion:
 *     Script para visualizar el reporte de analitico de auxiliares
 * Autor:
 *     HANYGEN Software S.A. de C.V. 
 *     Ruben Murga Tapia
 **/
$obus = new BIZGeneral();
$ocrit = new CriterioBean();
$oemp = new EmpresaBean();
$ccuentas = array();

$hidcdempresa = $osession->getcdempresa();
$hidcdejercicio = $osession->getcdejercicio();
$hidmes = ($_POST['hidmes']==null)? $_GET['hidmes']: $_POST['hidmes'];
$hidcuentaini = ($_POST['hidcuentaini']==null)? $_GET['hidcuentaini']: $_POST['hidcuentaini'];
$hidcuentafin = ($_POST['hidcuentafin']==null)? $_GET['hidcuentafin']: $_POST['hidcuentafin'];

$oemp = $obus->getEmpresaBean($hidcdempresa, $conn);

$ocrit->setcdempresa($hidcdempresa);
$ocrit->setcdejercicio($hidcdejercicio);
$ocrit->setcuentaini($hidcuentaini);
$ocrit->setcuentafin($hidcuentafin);
$ocrit->setnumes($hidmes);
$ccuentas = $obus->getAnaliticoAuxiliares($ocrit, $conn);

?>
<form name="frmreporte" method="post">
<input type="hidden" name="id" value="<?=$id?>">

<script language="javascript">
var form = document.frmreporte;

function toprint() {
   window.open("rptbalanza2.php?id=<?=$id?>&hidmes=<?=$hidmes?>&hidcuentaini=<?=$hidcuentaini?>&hidcuentafin=<?=$hidcuentafin?>&hidtoprint=1", "", "scrollbars=yes,top=100,left=200,width=450,height=310");
}

<? if($toprint=="1") { ?>
window.print();
<? } ?>

</script>
<table border="0" cellspacing="0" cellpadding="0" width="820">
<tr> 
    <td> 
      <table border="0" cellspacing="0" cellpadding="0" width="100%">
        <tr> 
          <td width="300" class="titulos01" valign="top"><b>balanza</b>de<b>comprobaci&oacute;n</b></td>
          <td align="right"><img src="../html/images/blank.gif" width="5" height="1"></td>
        </tr>
      </table>
    </td>
  </tr>
<? if($toprint=="1") { ?>
  <tr> 
    <td class="notas"> <b><img src="../html/images/blank.gif" width="5" height="1"><?=$oemp->getnbempresa()?><br>
      <img src="../html/images/blank.gif" width="5" height="1">RFC: <?=$oemp->getcdrfc()?></b></td>
  </tr>
  <tr> 
    <td> 
      <table border="0" cellspacing="0" cellpadding="0" width="100%">
        <tr> 
          <td width="300" valign="top"> 
            <table border="0" cellspacing="0" cellpadding="5">
              <tr> 
                <td class="txtV10Gris2"><span class="txt10Vgris"><b>Direcci&oacute;n 
                  Fiscal:</b></span><br>
                  <?=$oemp->gettxdireccion()?></td>
              </tr>
            </table>
          </td>
          <td align="right"> 
            <table border="0" cellspacing="0" cellpadding="5">
              <tr> 
                <td class="txtV10Gris2"><span class="txt10Vgris"><b>N&uacute;mero de Tel&eacute;fono:</b></span><br>
                  <?=$oemp->getnutelefono()?></td>
              </tr>
            </table>
          </td>
        </tr>
      </table>
    </td>
  </tr>
  <? } /* FIN toprint==1 */ ?>
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
          <tr> 
            <td> 
              <table border="0" cellspacing="0" cellpadding="2" width="100%">
                <tr> 
                  <td bgcolor="#7E9EDF"><img src="../html/images/blank.gif" width="0" height="0"></td>
                  <td background="../html/images/tablas/fnd07.gif"><img src="../html/images/blank.gif" width="0" height="0"></td>
                  <td bgcolor="#7E9EDF"><img src="../html/images/blank.gif" width="0" height="0"></td>
                  <td background="../html/images/tablas/fnd07.gif"><img src="../html/images/blank.gif" width="0" height="0"></td>
                  <td bgcolor="#7E9EDF"><img src="../html/images/blank.gif" width="0" height="0"></td>
                  <td background="../html/images/tablas/fnd07.gif"><img src="../html/images/blank.gif" width="0" height="0"></td>
                  <td bgcolor="#7E9EDF"><img src="../html/images/blank.gif" width="0" height="0"></td>
                  <td background="../html/images/tablas/fnd07.gif"><img src="../html/images/blank.gif" width="0" height="0"></td>
                  <td bgcolor="#7E9EDF"><img src="../html/images/blank.gif" width="0" height="0"></td>
                  <td background="../html/images/tablas/fnd07.gif"><img src="../html/images/blank.gif" width="0" height="0"></td>
                  <td bgcolor="#7E9EDF"><img src="../html/images/blank.gif" width="0" height="0"></td>
                  <td background="../html/images/tablas/fnd07.gif"><img src="../html/images/blank.gif" width="0" height="0"></td>
                  <td bgcolor="#7E9EDF"><img src="../html/images/blank.gif" width="0" height="0"></td>
                  <td background="../html/images/tablas/fnd07.gif"><img src="../html/images/blank.gif" width="0" height="0"></td>
                  <td bgcolor="#7E9EDF"><img src="../html/images/blank.gif" width="0" height="0"></td>
                </tr>
                <tr> 
                  <td bgcolor="#7E9EDF"> 
                    <div align="center" class="Tittablas">CUENTA</div>
                  </td>
                  <td background="../html/images/tablas/fnd07.gif">&nbsp;</td>
                  <td bgcolor="#7E9EDF"> 
                    <div align="center" class="Tittablas">NOMBRE</div>
                  </td>
                  <td background="../html/images/tablas/fnd07.gif">&nbsp;</td>
                  <td bgcolor="#7E9EDF"> 
                    <div align="center" class="Tittablas">CARGOS</div>
                  </td>
                  <td background="../html/images/tablas/fnd07.gif">&nbsp;</td>
                  <td bgcolor="#7E9EDF"> 
                    <div align="center" class="Tittablas">ABONOS</div>
                  </td>
                  <td background="../html/images/tablas/fnd07.gif">&nbsp;</td>
                  <td bgcolor="#7E9EDF"> 
                    <div align="center" class="Tittablas">CARGOS</div>
                  </td>
                  <td background="../html/images/tablas/fnd07.gif">&nbsp;</td>
                  <td bgcolor="#7E9EDF"> 
                    <div align="center" class="Tittablas">ABONOS</div>
                  </td>
                  <td background="../html/images/tablas/fnd07.gif">&nbsp;</td>
                  <td bgcolor="#7E9EDF"> 
                    <div align="center" class="Tittablas">CARGOS</div>
                  </td>
                  <td background="../html/images/tablas/fnd07.gif">&nbsp;</td>
                  <td bgcolor="#7E9EDF"> 
                    <div align="center" class="Tittablas">ABONOS</div>
                  </td>
                </tr>
                <tr> 
                  <td background="../html/images/tablas/fnd06.gif"><img src="../html/images/blank.gif" width="50" height="3"></td>
                  <td background="../html/images/tablas/fnd12.gif"><img src="../html/images/blank.gif" width="0" height="0"></td>
                  <td background="../html/images/tablas/fnd06.gif"><img src="../html/images/blank.gif" width="50" height="3"></td>
                  <td background="../html/images/tablas/fnd12.gif"><img src="../html/images/blank.gif" width="0" height="0"></td>
                  <td background="../html/images/tablas/fnd06.gif"><img src="../html/images/blank.gif" width="50" height="3"></td>
                  <td background="../html/images/tablas/fnd12.gif"><img src="../html/images/blank.gif" width="0" height="0"></td>
                  <td background="../html/images/tablas/fnd06.gif"><img src="../html/images/blank.gif" width="100" height="1"></td>
                  <td background="../html/images/tablas/fnd12.gif"><img src="../html/images/blank.gif" width="0" height="0"></td>
                  <td background="../html/images/tablas/fnd06.gif"><img src="../html/images/blank.gif" width="100" height="1"></td>
                  <td background="../html/images/tablas/fnd12.gif"><img src="../html/images/blank.gif" width="0" height="0"></td>
                  <td background="../html/images/tablas/fnd06.gif"><img src="../html/images/blank.gif" width="80" height="1"></td>
                  <td background="../html/images/tablas/fnd12.gif"><img src="../html/images/blank.gif" width="0" height="0"></td>
                  <td background="../html/images/tablas/fnd06.gif"><img src="../html/images/blank.gif" width="80" height="1"></td>
                  <td background="../html/images/tablas/fnd12.gif"><img src="../html/images/blank.gif" width="0" height="0"></td>
                  <td background="../html/images/tablas/fnd06.gif"><img src="../html/images/blank.gif" width="10" height="1"></td>
                </tr>
    <?php
      foreach($ccuentas as $orow) {  ?>
          <tr bgcolor="#AEBEDD" align="center"> 
          <td class="AvisoHeaderBold" colspan="4"><img src="../html/images/blank.gif" width="1" height="1"></td>
          <td class="AvisoHeaderBold"><?=$orow->getnucuenta()?></td>
          <td class="AvisoHeaderBold"><img src="../html/images/blank.gif" width="1" height="1"></td>
          <td class="AvisoHeaderBold" align="left"><?=$orow->getnbcuenta()?></td>
          <td class="AvisoHeaderBold"><img src="../html/images/blank.gif" width="1" height="1"></td>
          <td class="AvisoHeaderBold" align="right">SALDO INICIAL</td>
          <td class="AvisoHeaderBold"><img src="../html/images/blank.gif" width="1" height="1"></td>
          <td class="AvisoHeaderBold" align="right"><?=$orow->getSaldo()->getimhaberinicial()?></td>
          <td class="AvisoHeaderBold" colspan="4"><img src="../html/images/blank.gif" width="1" height="1"></td>
          </tr>
    <?
      $it = 0;
      $cmovtos = $orow->getcmovtos();
      foreach($cmovtos as $orow) { 
    ?>
                <tr <?if($it%2==0) echo "bgcolor='#EEEEEE'"; ?> > 
                  <td class="txt10Vgris" align="center"><?=$orow->getcdpoliza()?></td>
                  <td background="../html/images/tablas/fnd_cuenta_01.gif" valign="bottom">&nbsp;</td>
                  <td class="txt10Vgris" nowrap><?=$orow->getfhcreado()?></td>
                  <td background="../html/images/tablas/fnd_cuenta_01.gif" valign="bottom">&nbsp;</td>
                  <td class="txt10Vgris"><img src="../html/images/blank.gif" width="1" height="1"></td>
                  <td background="../html/images/tablas/fnd_cuenta_01.gif" valign="bottom">&nbsp;</td>
                  <td class="txt10Vgris"><img src="../html/images/blank.gif" width="1" height="1"></td>
                  <td background="../html/images/tablas/fnd_cuenta_01.gif" valign="bottom">&nbsp;</td>
                  <td class="txt10Vgris"><div align="left"><?=$orow->getnbmovimiento()?></div></td>
                  <td background="../html/images/tablas/fnd_cuenta_01.gif" valign="bottom">&nbsp;</td>
                  <td class="txt10Vgris"><div align="right"><?=$orow->getimdebe()?></div></td>
                  <td background="../html/images/tablas/fnd_cuenta_01.gif" valign="bottom">&nbsp;</td>
                  <td class="txt10Vgris"><div align="right"><?=$orow->getimhaber()?></div></td>
                  <td background="../html/images/tablas/fnd_cuenta_01.gif" valign="bottom">&nbsp;</td>
                  <td class="txt10Vgris"><div align="right"><?=($orow->getstactualizado()=='AC'?'Si':'No')?></div></td>
                </tr>
         <? $it++;  } ?>
          <tr <?if($it%2==0) echo "bgcolor='#EEEEEE'"; ?> align="center"> 
          <td class="txt10Vgris" colspan="8"><img src="../html/images/blank.gif" width="1" height="1"></td>
          <td class="txt10Vgris" align="right">SALDO ACTUAL</td>
          <td class="txt10Vgris"><img src="../html/images/blank.gif" width="1" height="1"></td>
          <td class="txt10Vgris" align="right">0.00</td>
          <td class="txt10Vgris" colspan="4"><img src="../html/images/blank.gif" width="1" height="1"></td>
          </tr>
       <? } ?>
              </table>
            </td>
          </tr>
          <tr>
            <td bgcolor="#1A64CB"><img src="../html/images/blank.gif" width="1" height="3"></td>
          </tr>
<? if($toprint=="") { ?>
          <tr> 
            <td bgcolor="#AEBEDD" align="right"><a href="javascript:toprint();"><img src="../html/images/botones/B_imprimir.gif" width="88" height="25" border="0"></a></td>
          </tr>
<? } ?>
          <tr> 
            <td bgcolor="#1A64CB"><img src="../html/images/blank.gif" width="1" height="3"></td>
          </tr>
        </form>
      </table>
    </td>
  </tr>
  <tr> 
    <td><img src="../html/images/blank.gif" width="1" height="5"></td>
  </tr>
</table>
</form>
<? 
   require_once("../seguridad/footer.php");
?>
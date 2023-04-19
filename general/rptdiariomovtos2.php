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
 * Programa: rptdiariomovtos2.php
 * Descripcion:
 *     Script para visualizar el reporte de diario de movimientos
 * Autor:
 *     HANYGEN Software S.A. de C.V. 
 *     Ruben Murga Tapia
 **/
$obus = new BIZGeneral();
$ocrit = new CriterioBean();
$oemp = new EmpresaBean();
$cpolizas = array();

$hidopcion = $_POST['hidopcion'];
$hidcdempresa = $osession->getcdempresa();
$hidcdejercicio = $osession->getcdejercicio();
$hidfecha = ($_POST['hidfecha']==null)? $_GET['hidfecha']: $_POST['hidfecha'];
$hidcuentaini = ($_POST['hidcuentaini']==null)? $_GET['hidcuentaini']: $_POST['hidcuentaini'];
$hidcuentafin = ($_POST['hidcuentafin']==null)? $_GET['hidcuentafin']: $_POST['hidcuentafin'];

$oemp = $obus->getEmpresaBean($hidcdempresa, $conn);

if($hidopcion=='') {    /* aqui sera buscar */
  $ocrit->setcdempresa($hidcdempresa);
  $ocrit->setcdejercicio($hidcdejercicio);
  $ocrit->setnumes($hidnumes);
  $ocrit->setcuentaini($hidcuentaini);
  $ocrit->setcuentafin($hidcuentafin);
  $ocrit->setfecha($hidfecha);
  $cpolizas = $obus->getDiarioMovtos($ocrit, $conn);
}

?>
<form name="frmreporte" method="post">
<input type="hidden" name="id" value="<?=$id?>">

<script language="javascript">
var form = document.frmreporte;

function toprint() {
   window.open("rptdiariomovtos2.php?id=<?=$id?>&hidfecha=<?=$hidfecha?>&hidcuentaini=<?=$hidcuentaini?>&hidcuentafin=<?=$hidcuentafin?>&hidtoprint=1", "", "scrollbars=yes,top=100,left=200,width=450,height=310");
}

<? if($toprint=="1") { ?>
window.print();
<? } ?>

</script>
<table border="0" cellspacing="0" cellpadding="0" width="780">
<tr> 
    <td> 
      <table border="0" cellspacing="0" cellpadding="0" width="100%">
        <tr> 
          <td width="300" class="titulos01" valign="top"><b>diario</b>de<b>movimientos</b></td>
          <td align="right"> 
          <table border="0" cellspacing="0" cellpadding="0">
              <tr> 
                <td bgcolor="#CCCCCC" rowspan="3"><img src="../html/images/blank.gif" width="1" height="1"></td>
                <td bgcolor="#AEBEDD"> 
                  <table border="0" cellspacing="0" cellpadding="5" align="center">
                    <tr> 
                      <td class="AvisoHeaderBold"> 
                        <div align="center">Fecha</div>
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
                      <td class="txt10Vgris"><?=$_POST['txtfecha']?></td>
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
                </tr>
                <tr> 
                  <td bgcolor="#7E9EDF"> 
                    <div align="center" class="Tittablas">NO<br>POLIZA</div>
                  </td>
                  <td background="../html/images/tablas/fnd07.gif">&nbsp;</td>
                  <td bgcolor="#7E9EDF"> 
                    <div align="center" class="Tittablas">CUENTA</div>
                  </td>
                  <td background="../html/images/tablas/fnd07.gif">&nbsp;</td>
                  <td bgcolor="#7E9EDF"> 
                    <div align="center" class="Tittablas">NOMBRE<br>CUENTA</div>
                  </td>
                  <td background="../html/images/tablas/fnd07.gif">&nbsp;</td>
                  <td bgcolor="#7E9EDF"> 
                    <div align="center" class="Tittablas">DESCRIPCI&Oacute;N<br>DE MOVIMIENTO</div>
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
                    <div align="center" class="Tittablas">ACT.?</div>
                  </td>
                </tr>
                <tr> 
                  <td background="../html/images/tablas/fnd06.gif"><img src="../html/images/blank.gif" width="50" height="3"></td>
                  <td background="../html/images/tablas/fnd12.gif"><img src="../html/images/blank.gif" width="0" height="0"></td>
                  <td background="../html/images/tablas/fnd06.gif"><img src="../html/images/blank.gif" width="50" height="1"></td>
                  <td background="../html/images/tablas/fnd12.gif"><img src="../html/images/blank.gif" width="0" height="0"></td>
                  <td background="../html/images/tablas/fnd06.gif"><img src="../html/images/blank.gif" width="100" height="1"></td>
                  <td background="../html/images/tablas/fnd12.gif"><img src="../html/images/blank.gif" width="0" height="0"></td>
                  <td background="../html/images/tablas/fnd06.gif"><img src="../html/images/blank.gif" width="100" height="1"></td>
                  <td background="../html/images/tablas/fnd12.gif"><img src="../html/images/blank.gif" width="0" height="0"></td>
                  <td background="../html/images/tablas/fnd06.gif"><img src="../html/images/blank.gif" width="80" height="1"></td>
                  <td background="../html/images/tablas/fnd12.gif"><img src="../html/images/blank.gif" width="0" height="0"></td>
                  <td background="../html/images/tablas/fnd06.gif"><img src="../html/images/blank.gif" width="80" height="1"></td>
                  <td background="../html/images/tablas/fnd12.gif"><img src="../html/images/blank.gif" width="0" height="0"></td>
                  <td background="../html/images/tablas/fnd06.gif"><img src="../html/images/blank.gif" width="20" height="1"></td>
                </tr>
    <?php
      $it = 0;
      foreach($cpolizas as $orow) {
         $cmovtos = $orow->getcmovtos();
         $dtotdebe = 0;
         $dtothaber = 0;

         foreach($cmovtos as $orow1) {
            $octa = $obus->getCuentaBean($orow->getcdempresa(), $orow->getcdejercicio(), $orow1->getcdcuenta(),  $conn);
            $dtotdebe = $dtotdebe + $orow1->getimdebe();
            $dtothaber = $dtothaber + $orow1->getimhaber();
    ?>
                <tr <?if($it%2==0) echo "bgcolor='#EEEEEE'"; ?> > 
                  <td class="txt10Vgris" align="center"><?=$orow->getscdpoliza()?></td>
                  <td background="../html/images/tablas/fnd_cuenta_01.gif" valign="bottom">&nbsp;</td>
                  <td class="txt10Vgris"><?=$octa->getnucuenta()?></td>
                  <td background="../html/images/tablas/fnd_cuenta_01.gif" valign="bottom">&nbsp;</td>
                  <td class="txt10Vgris"> 
                    <div align="left"><?=$octa->getnbcuenta()?></div>
                  </td>
                  <td background="../html/images/tablas/fnd_cuenta_01.gif" valign="bottom">&nbsp;</td>
                  <td class="txt10Vgris"> 
                    <div align="left"><?=$orow1->getnbmovimiento()?></div>
                  </td>
                  <td background="../html/images/tablas/fnd_cuenta_01.gif" valign="bottom">&nbsp;</td>
                  <td class="txt10Vgris"> 
                    <div align="right"><?=number_format($orow1->getimdebe(),2)?></div>
                  </td>
                  <td background="../html/images/tablas/fnd_cuenta_01.gif" valign="bottom">&nbsp;</td>
                  <td class="txt10Vgris"> 
                    <div align="right"><?=number_format($orow1->getimhaber(),2)?></div>
                  </td>
                  <td background="../html/images/tablas/fnd_cuenta_01.gif" valign="bottom">&nbsp;</td>
                  <td class="txt10Vgris"> 
                    <div align="right"><?=($orow1->getstactualizado()=='AC'?'Si':'No')?></div>
                  </td>
                </tr>
         <? $it++;  } ?>
                <tr bgcolor="#AEBEDD" align="center"> 
                   <td class="AvisoHeaderBold" colspan="6"><img src="../html/images/blank.gif" width="1" height="1"></td>
                   <td class="AvisoHeaderBold">TOTAL POLIZA<img src="../html/images/blank.gif" width="20" height="1"></td>
                   <td class="AvisoHeaderBold"><img src="../html/images/blank.gif" width="1" height="1"></td>
                   <td class="AvisoHeaderBold" align="right"><?=number_format($dtotdebe,2)?></td>
                   <td class="AvisoHeaderBold"><img src="../html/images/blank.gif" width="1" height="1"></td>
                   <td class="AvisoHeaderBold" align="right"><?=number_format($dtothaber,2)?></td>
                   <td class="AvisoHeaderBold" colspan="2"><img src="../html/images/blank.gif" width="1" height="1"></td>
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
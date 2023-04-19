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
 * Programa: pro_verpolizas.php
 * Descripcion:
 *     Script para visualizar el reporte de diario de movimientos
 * Autor:
 *     HANYGEN Software S.A. de C.V. 
 *     Ruben Murga Tapia
 **/
$obus = new BIZGeneral();
$oemp = new EmpresaBean();
$cpolizas = array();

$hidopcion = $_POST['hidopcion'];
$hidcdempresa = $osession->getcdempresa();
$hidcdejercicio = $osession->getcdejercicio();
$hidnumes = ($_POST['hidnumes']==null)? $_GET['hidnumes']: $_POST['hidnumes'];

$ocrit = new CriterioBean();
$ocrit->setcdempresa($hidcdempresa);
$ocrit->setcdejercicio($hidcdejercicio);
$ocrit->setnumes($hidnumes);
$cpolizas = $obus->getDiarioMovtos($ocrit, $conn);
?>
<table border="0" cellspacing="0" cellpadding="0" width="780">
<tr> 
    <td> 
      <table border="0" cellspacing="0" cellpadding="0" width="100%">
        <tr> 
          <td width="300" class="titulos01" valign="top"><b>detalle</b>de<b>polizas</b></td>
        </tr>
      </table>
    </td>
  </tr>
  <tr> 
    <td><img src="../html/images/blank.gif" width="1" height="5"></td>
  </tr>
  <tr>
      <td bgcolor="#1A64CB"><img src="../html/images/blank.gif" width="1" height="3"></td>
  </tr>
  <tr> 
      <td bgcolor="#AEBEDD" align="right"><a href="javascript:history.back();"><img src="../html/images/botones/B_back_home.gif" height="25" border="0"></a></td>
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
          <tr> 
            <td bgcolor="#AEBEDD" align="right"><a href="javascript:history.back();"><img src="../html/images/botones/B_back_home.gif" height="25" border="0"></a></td>
          </tr>
          <tr> 
            <td bgcolor="#1A64CB"><img src="../html/images/blank.gif" width="1" height="3"></td>
          </tr>
      </table>
    </td>
  </tr>
  <tr> 
    <td><img src="../html/images/blank.gif" width="1" height="5"></td>
  </tr>
</table>
<? 
   require_once("../seguridad/footer.php");
?>
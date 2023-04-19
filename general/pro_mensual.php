 <? 
require_once("../seguridad/header.php");
require_once("../comun/MesBean.php");
require_once("../comun/CuentaBean.php");
require_once("../comun/PolizaBean.php");
require_once("../comun/MovimientoBean.php");
require_once("../comun/SaldoBean.php");
require_once("BIZGeneral.php");

/**
 * Programa: pro_mensual.php
 * Descripcion:
 *   Script para arrancar los procesos contables de cierre mensual
 * Autor:
 *   HANYGEN Software S.A. de C.V. 
 *   Ruben Murga Tapia
 **/
$obus = new BIZGeneral();

$mensaje = "";
$hidopcion = $_POST['hidopcion'];

if($hidopcion=="run") {
  $hidopcion="";
}

if($hidopcion=='calcular') {
  if($obus->updAsentarPolizas($osession->getcdempresa(), $osession->getcdejercicio(), $_POST['hidnumes'], $osession->getcdusuario(), $conn)) 
      $mensaje = "! SE HAN ASENTADO CONTABLEMENTE LAS POLIZAS DE ESTE MES !";  
  else
      $mensaje = "! OCURRIO UN ERROR AL ASENTAR LAS POLIZAS DE ESTE MES !";  
}

if($hidopcion=='arrastrar') {
  if($obus->updArrastrarSaldos($osession->getcdempresa(), $osession->getcdejercicio(), $_POST['hidnuanterior'], $_POST['hidnumes'], $osession->getcdusuario(), $conn)) 
      $mensaje = "! SE HAN ARRASTRADOS LOS SALDOS DE LAS CUENTAS !";  
  else
      $mensaje = "! OCURRIO UN ERROR AL ARRASTRAR LOS SALDOS A ESTE MES !";  
}

if($hidopcion=='del') {
  if($obus->delSaldoBeans($osession->getcdempresa(), $osession->getcdejercicio(), $_POST['hidnumes'], $conn)) 
      $mensaje = "! SE HAN ELIMINADO LAS ACTUALIZACIONES CONTABLES DE ESTE MES !";  
  else
      $mensaje = "! OCURRIO UN ERROR AL ELIMINAR LOS SALDOS DE ESTE MES !";  
}

$cmeses = $obus->getMesBeans($osession->getcdempresa(), $osession->getcdejercicio(), $conn);

?>
<form name="frmproceso" method="post" action="">
<input type="hidden" name="id" value="<?=$id?>">
<input type="hidden" name="hidnumes" value="">
<input type="hidden" name="hidnuanterior" value="">
<input type="hidden" name="hidopcion" value="">
<script language="javascript">
var form = document.frmproceso;

function verpolizas(mes) {
    form.hidnumes.value = mes;
    form.action = 'pro_verpolizas.php'; 
    form.submit();
}

function inisaldos(mes) {
    form.hidnumes.value = mes;
    form.action = 'mantsaldos.php'; 
    form.submit();
}

function calcular(mes) {
    if(!confirm("Esta seguro de querer asentar contablemente las polizas de este mes?")) return;
    form.hidnumes.value = mes;
    form.hidopcion.value = "calcular";
    form.submit();
}

function versaldos(mes) {
    form.hidnumes.value = mes;
    form.action = 'versaldos.php'; 
    form.submit();
}

function eliminar(mes) {
    if(!confirm("Esta seguro de querer eliminar las actualizaciones contables de este mes?")) return;
    form.hidnumes.value = mes;
    form.hidopcion.value = "del";
    form.submit();
}

function arrastrarsaldos(anterior, actual) {
   if(!confirm("Esta seguro de querer arrastrar los saldos del mes anterior?")) return;
    form.hidnuanterior.value = anterior;
    form.hidnumes.value = actual;
    form.hidopcion.value = "arrastrar";
    form.submit();
}


</script>
<table border="0" width="700" cellspacing="0" cellpadding="0">
  <tr>
    <td rowspan="10"><img src="../html/images/blank.gif" width="15" height="1"></td>
    <td class="titulos01">proceso<b>calculo</b>mensual</td>
  </tr>
  <tr>
    <td><img src="../html/images/blank.gif" width="1" height="5"></td>
  </tr>
  <? if($mensaje!='') { ?>
  <tr bgcolor=orange>
    <td class="AvisoHeaderBold"><?=$mensaje?></td>
  </tr>
  <? } ?>
  <tr>
    <td align="right"><img src="../html/images/blank.gif" width="1" height="3"></td>
  </tr>
  <tr>
    <td><img src="../html/images/blank.gif" width="1" height="5"></td>
  </tr>
  <tr>
    <td bgcolor="#1A64CB"><img src="../html/images/blank.gif" width="1" height="3"></td>
  </tr>
  <tr>
    <td bgcolor="#AEBEDD"><img src="../html/images/blank.gif" width="1" height="3"></td>
  </tr>
  <tr>
    <td bgcolor="#1A64CB"><img src="../html/images/blank.gif" width="1" height="3"></td>
  </tr>
  <tr>
    <td>
      <table border="0" width="100%" cellspacing="0" cellpadding="0">
          <tr>
            <td rowspan="4" bgcolor="#CCCCCC"><img src="../html/images/blank.gif" width="1" height="1"></td>
            <td>
              <table border="0" width="100%" cellspacing="0" cellpadding="4">
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
                </tr>
                <tr>
                  <td bgcolor="#7E9EDF">
                    <div align="center" class="Tittablas">MES</div>
                  </td>
                  <td bgcolor="#FFFFFF" background="../html/images/tablas/fnd01.gif">&nbsp;</td>
                  <td bgcolor="#7E9EDF">
                    <div align="center" class="Tittablas">ESTATUS</div>
                  </td>
                  <td bgcolor="#FFFFFF" background="../html/images/tablas/fnd01.gif">&nbsp;</td>
                  <td bgcolor="#7E9EDF">
                    <div align="center" class="Tittablas">CONSULTAR<br>POLIZAS</div>
                  </td>
                  <td bgcolor="#FFFFFF" background="../html/images/tablas/fnd01.gif">&nbsp;</td>
                  <td bgcolor="#7E9EDF">
                    <div align="center" class="Tittablas">CONSULTAR<br>SALDOS</div>
                  </td>
                  <td bgcolor="#FFFFFF" background="../html/images/tablas/fnd01.gif">&nbsp;</td>
                  <td bgcolor="#7E9EDF">
                    <div align="center" class="Tittablas">INICIAR<br>SALDOS</div>
                  </td>
                  <td bgcolor="#FFFFFF" background="../html/images/tablas/fnd01.gif">&nbsp;</td>
                  <td bgcolor="#7E9EDF">
                    <div align="center" class="Tittablas">ACTUALIZAR<br>SALDOS</div>
                  </td>
                  <td bgcolor="#FFFFFF" background="../html/images/tablas/fnd01.gif">&nbsp;</td>
                  <td bgcolor="#7E9EDF">
                    <div align="center" class="Tittablas">ELIMINAR<br>SALDOS</div>
                  </td>
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
                </tr>
    <?php
      $it = 0;
      $bultimo = true;
      $oultimo = null;
      foreach($cmeses as $orow) {
     ?>
                <tr>
                  <td <?if($it%2==0) echo "bgcolor='#E5ECF9'"; ?> class="txtV10Gris2" ><?=$orow->getnbmes()?></td>
                  <td background="../html/images/tablas/<?=($it%2==0?'fnd02.gif':'fnd03.gif')?>" bgcolor="#CCCCCC">&nbsp;</td>
                  <td <?if($it%2==0) echo "bgcolor='#E5ECF9'"; ?> class="txtV10Gris2"><div align="center"><?=$orow->getnbstcorte()?></div>
                  </td>
                  <td background="../html/images/tablas/<?=($it%2==0?'fnd02.gif':'fnd03.gif')?>" bgcolor="#CCCCCC">&nbsp;</td>
                  <td <?if($it%2==0) echo "bgcolor='#E5ECF9'"; ?> class="txtV10Gris2"><div align="center"><a href="javascript:verpolizas('<?=$orow->getnumes()?>');"><img src="../html/images/iconos/I_folder.gif" border="0" alt="consulta de polizas/movimientos consideradas"></a></div></td>
                  <td background="../html/images/tablas/<?=($it%2==0?'fnd02.gif':'fnd03.gif')?>" bgcolor="#CCCCCC">&nbsp;</td>
                  <td <?if($it%2==0) echo "bgcolor='#E5ECF9'"; ?> class="txtV10Gris2"><div align="center"><? if($orow->getstcorte()=='01' || $orow->getstcorte()=='02') { ?><a href="javascript:versaldos('<?=$orow->getnumes()?>');"><img src="../html/images/iconos/I_dollar.gif" border="0" alt="consulta de saldos actuales" width="16" height="16"></a><? } ?></div></td>
                  <td background="../html/images/tablas/<?=($it%2==0?'fnd02.gif':'fnd03.gif')?>" bgcolor="#CCCCCC">&nbsp;</td>
                  <td <?if($it%2==0) echo "bgcolor='#E5ECF9'"; ?>>
                    <div align="center"> 
                    <? if($orow->getstcorte()=='00' && $it==0) { ?>
                    <a href="javascript:inisaldos('<?=$orow->getnumes()?>');"><img src="../html/images/iconos/I_new.gif" border="0" alt="iniciar saldos del ejercicio fiscal"></a>
                    <? } else if($orow->getstcorte()=='00' && $it>0 && $bultimo) { ?>
                    <a href="javascript:arrastrarsaldos('<?=$oultimo->getnumes()?>','<?=$orow->getnumes()?>');"><img src="../html/images/iconos/I_arrowdown.gif" border="0" alt="arrastrar saldo de cuentas contables"></a>
                    <? $bultimo =  false; } ?>
                    </div>
                  </td>
                  <td background="../html/images/tablas/<?=($it%2==0?'fnd02.gif':'fnd03.gif')?>" bgcolor="#CCCCCC">&nbsp;</td>
                  <td <?if($it%2==0) echo "bgcolor='#E5ECF9'"; ?> class="txtV10Gris2">
                    <div align="center"><? if($orow->getstcorte()=='01' || $orow->getstcorte()=='02') {?><a href="javascript:calcular('<?=$orow->getnumes()?>');"><img src="../html/images/botones/B_calcular.gif" height="18" alt="actualizar saldos o asentar contablemente movimientos" border="0"></a><? } ?>&nbsp;</div>
                  </td>
                  <td background="../html/images/tablas/<?=($it%2==0?'fnd02.gif':'fnd03.gif')?>" bgcolor="#CCCCCC">&nbsp;</td>
                  <td <?if($it%2==0) echo "bgcolor='#E5ECF9'"; ?> class="txtV10Gris2">
                    <div align="center"><? if($orow->getstcorte()=='01' || $orow->getstcorte()=='02'  || $orow->getstcorte()=='03') { ?><a href="javascript:eliminar('<?=$orow->getnumes()?>');"><img src="../html/images/botones/B_del.gif" width="18" height="16" alt="eliminaci&oacute;n definitiva de saldo mensuales" border="0"></a><? } ?></div>
                  </td>
                </tr>
     <? $it = $it + 1; 
          $oultimo = $orow;
          } ?>

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
  <tr>
    <td bgcolor="#AEBEDD"><img src="../html/images/blank.gif" width="1" height="3"></td>
  </tr>
  <tr>
    <td bgcolor="#1A64CB"><img src="../html/images/blank.gif" width="1" height="3"></td>
  </tr>
  <tr>
    <td colspan="2"><img src="../html/images/blank.gif" width="1" height="5"></td>
  </tr>
</table>
</form>
<?
require_once("../seguridad/footer.php");
?>
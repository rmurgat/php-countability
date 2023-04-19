<? 
require_once("../seguridad/header.php");
require_once("../comun/CuentaBean.php");
require_once("../comun/CriterioBean.php");
require_once("../comun/MesBean.php");
require_once("../comun/SaldoBean.php");
require_once("../comun/EjercicioBean.php");
require_once("BIZGeneral.php");

/**
 * Programa: versaldos.php
 * Descripcion:
 *     Script para consultar los saldos de las cuentas contables
 * Autor:
 *     HANYGEN Software S.A. de C.V. 
 *     Ruben Murga Tapia
 **/
$obus = new BIZGeneral();
$ocrit  = new CriterioBean();
$hidopcion = $_POST['hidopcion'];
$mensaje = "";

$hidnumes = ($_POST['hidnumes']==null)? $_GET['hidnumes']: $_POST['hidnumes'];
$omes = $obus->getMesBean($osession->getcdempresa(), $osession->getcdejercicio(), $hidnumes, $conn);

$ocrit->setcdempresa($osession->getcdempresa());
$ocrit->setcdejercicio($osession->getcdejercicio());
$ocrit->setnumes($omes->getnumes());
$ocrit->setstcuenta('AC');
$cctas = $obus->getcCuentaSaldo($ocrit, $conn);

?>
<table width="1100" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>
      <table border="0" cellspacing="0" cellpadding="0" width="100%">
        <tr>
          <td width="300" class="titulos01"><b>saldos</b>a<b>la</b>fecha</td>
        </tr>
      </table>
    </td>
  </tr>
  <tr>
    <td><img src="../html/images/blank.gif" width="1" height="15"></td>
  </tr>
  <? if($mensaje!='') { ?>
  <tr bgcolor=orange>
    <td class="AvisoHeaderBold"><?=$mensaje?></td>
  </tr>
  <? } ?>
  <tr>
    <td><img src="../html/images/blank.gif" width="1" height="5"></td>
  </tr>
  <tr>
    <td>
      <table border="0" cellspacing="0" cellpadding="0" width="100%">
          <tr>
            <td rowspan="5" bgcolor="#CCCCCC"><img src="../html/images/blank.gif" width="2" height="1"></td>
            <td bgcolor="#1A64CB"><img src="../html/images/blank.gif" width="2" height="1"></td>
            <td rowspan="5" bgcolor="#CCCCCC"><img src="../html/images/blank.gif" width="2" height="1"></td>
          </tr>
          <tr>
            <td bgcolor="#1A64CB"><img src="../html/images/blank.gif" width="1" height="3"></td>
          </tr>
          <tr>
            <td>
              <table border="0" cellspacing="0" cellpadding="2" width="100%">

                <!-- inicia Headers -->
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
                  <td background="../html/images/tablas/fnd07.gif"><img src="../html/images/blank.gif" width="0" height="0"></td>
                  <td bgcolor="#7E9EDF"><img src="../html/images/blank.gif" width="0" height="0"></td>
                  <td background="../html/images/tablas/fnd07.gif"><img src="../html/images/blank.gif" width="0" height="0"></td>
                  <td bgcolor="#7E9EDF"><img src="../html/images/blank.gif" width="0" height="0"></td>
                  <td background="../html/images/tablas/fnd07.gif"><img src="../html/images/blank.gif" width="0" height="0"></td>
                  <td bgcolor="#7E9EDF"><img src="../html/images/blank.gif" width="0" height="0"></td>
                </tr>
                <tr>
                  <td bgcolor="#7E9EDF" >
                    <div align="center" class="Tittablas">#</div>
                  </td>
                  <td background="../html/images/tablas/fnd07.gif">&nbsp;</td>
                  <td bgcolor="#7E9EDF" >
                    <div align="center" class="Tittablas">CUENTA</div>
                  </td>
                  <td background="../html/images/tablas/fnd07.gif">&nbsp;</td>
                  <td bgcolor="#7E9EDF" >
                    <div align="center" class="Tittablas">NOMBRE</div>
                  </td>
                  <td background="../html/images/tablas/fnd07.gif">&nbsp;</td>
                  <td bgcolor="#7E9EDF" >
                    <div align="center" class="Tittablas">NIVEL</div>
                  </td>
                  <td background="../html/images/tablas/fnd07.gif">&nbsp;</td>
                  <td bgcolor="#7E9EDF" >
                    <div align="center" class="Tittablas">TIPO DE<br>CUENTA</div>
                  </td>
                  <td background="../html/images/tablas/fnd07.gif">&nbsp;</td>
                  <td bgcolor="#7E9EDF" >
                    <div align="center" class="Tittablas">NATURALEZA DE<br>CUENTA</div>
                  </td>
                  <td background="../html/images/tablas/fnd07.gif">&nbsp;</td>
                  <td bgcolor="#7E9EDF" >
                    <div align="center" class="Tittablas">CUENTA<br>GENERAL</div>
                  </td>
                  <td background="../html/images/tablas/fnd07.gif">&nbsp;</td>
                  <td bgcolor="#7E9EDF" >
                    <div align="center" class="Tittablas">CUENTA<br>CIERRE</div>
                  </td>
                  <td background="../html/images/tablas/fnd07.gif">&nbsp;</td>
                  <td bgcolor="#7E9EDF" >
                    <div align="center" class="Tittablas">ESTATUS</div>
                  </td>
                  <td background="../html/images/tablas/fnd07.gif">&nbsp;</td>
                  <td bgcolor="#7E9EDF" >
                    <div align="center" class="Tittablas">FECHA<br>ACTUALIZO</div>
                  </td>
                  <td background="../html/images/tablas/fnd07.gif">&nbsp;</td>
                  <td bgcolor="#7E9EDF" >
                    <div align="center" class="Tittablas">USUARIO<br>ACTUALIZO</div>
                  </td>
                  <td background="../html/images/tablas/fnd07.gif">&nbsp;</td>
                  <td bgcolor="#7E9EDF" >
                    <div align="center" class="Tittablas">DEBE<br>INICIAL</div>
                  </td>
                  <td background="../html/images/tablas/fnd07.gif">&nbsp;</td>
                  <td bgcolor="#7E9EDF" >
                    <div align="center" class="Tittablas">DEBE<br>INICIAL</div>
                  </td>
                  <td background="../html/images/tablas/fnd07.gif">&nbsp;</td>
                  <td bgcolor="#7E9EDF" >
                    <div align="center" class="Tittablas">DEBE<br>ACTUAL</div>
                  </td>
                  <td background="../html/images/tablas/fnd07.gif">&nbsp;</td>
                  <td bgcolor="#7E9EDF" >
                    <div align="center" class="Tittablas">HABER<br>ACTUAL</div>
                  </td>
                  <td background="../html/images/tablas/fnd07.gif">&nbsp;</td>
                  <td bgcolor="#7E9EDF" >
                    <div align="center" class="Tittablas">TOTAL<br>DEBE<br>MOVTOS</div>
                  </td>
                  <td background="../html/images/tablas/fnd07.gif">&nbsp;</td>
                  <td bgcolor="#7E9EDF" >
                    <div align="center" class="Tittablas">TOTAL<br>HABER<br>MOVTOS</div>
                  </td>
                  <td background="../html/images/tablas/fnd07.gif">&nbsp;</td>
                  <td bgcolor="#7E9EDF" >
                    <div align="center" class="Tittablas">COMENTARIO</div>
                  </td>
                </tr>
    <?php
      $it = 0;
      foreach($cctas as $orow) {
         $octagral = $obus->getCuentaBean($orow->getcdempresa(), $orow->getcdejercicio(), $orow->getcdctageneral(), $conn);
         $octacierre = $obus->getCuentaBean($orow->getcdempresa(), $orow->getcdejercicio(), $orow->getcdctacierre(), $conn);
         if($octagral==null) $octagral = new CuentaBean();
         if($octacierre==null) $octacierre = new CuentaBean();
     
    ?>
      <!-- inicia detalle #1-->
                <tr <?if($it%2==0) echo "bgcolor='#EEEEEE'"; ?>>
                  <input type='hidden' name='hid<?=$it?>' value='<?=$orow->getcdcuenta()?>'>
                  <td  class="txttabla" valign="bottom" nowrap >
                    <div align="center"><?=($it+1)?></div>
                  </td>
                  <td background="../html/images/tablas/fnd_cuenta_01.gif">&nbsp;</td>
                  <td  class="txttabla" valign="bottom" nowrap >
                    <div align="left"><?=$orow->getnucuenta()?></div>
                  </td>
                  <td background="../html/images/tablas/fnd_cuenta_01.gif">&nbsp;</td>
                  <td  class="txttabla" valign="bottom">
                    <div align="left"><?=$orow->getnbcuenta()?></div>
                  </td>
                  <td background="../html/images/tablas/fnd_cuenta_01.gif" valign="bottom">&nbsp;</td>
                  <td class="txttabla" valign="bottom">
                    <div align="center"><?=$orow->getnunivel()?></div>
                  </td>
                  <td background="../html/images/tablas/fnd_cuenta_01.gif" valign="bottom">&nbsp;</td>
                  <td class="txttabla" valign="bottom">
                    <div align="center"><? if($orow->gettpcuenta()=='GE') { echo "GENERAL"; } else { echo "DETALLE"; } ?></div>
                  </td>
                  <td background="../html/images/tablas/fnd_cuenta_01.gif" valign="bottom">&nbsp;</td>
                  <td class="txttabla" valign="bottom">
                    <div align="center"><? if($orow->gettpnaturaleza()=='CO') { echo "COSTO"; } else { echo "ACTIVO"; } ?></div>
                  </td>
                  <td background="../html/images/tablas/fnd_cuenta_01.gif" valign="bottom">&nbsp;</td>
                  <td class="txttabla" valign="bottom">
                    <div align="center"><?=$octagral->getnucuenta()?></div>
                  </td>
                  <td background="../html/images/tablas/fnd_cuenta_01.gif" valign="bottom">&nbsp;</td>
                  <td class="txttabla" valign="bottom">
                    <div align="center"><?=$octacierre->getnucuenta()?></div>
                  </td>
                  <td background="../html/images/tablas/fnd_cuenta_01.gif" valign="bottom">&nbsp;</td>
                  <td class="txttabla" valign="bottom">
                    <div align="center"><img src="../html/images/iconos/<? if($orow->getstcuenta()=='AC') {?>I_fact_pag.gif<? } else { ?>I_tache.gif<? } ?>" width="13" height="13"></div>
                  </td>
                  <td background="../html/images/tablas/fnd_cuenta_01.gif" valign="bottom">&nbsp;</td>
                  <td class="txttabla" valign="bottom"><div align="center"><?=$orow->getSaldo()->getfhactualizado()?></div></td>
                  <td background="../html/images/tablas/fnd_cuenta_01.gif" valign="bottom">&nbsp;</td>
                  <td class="txttabla" valign="bottom"><div align="center"><?=$orow->getSaldo()->getcdusuarioact()?></div></td>
                  <td background="../html/images/tablas/fnd_cuenta_01.gif" valign="bottom">&nbsp;</td>
                  <td class="txttabla" valign="bottom"><?=$orow->getSaldo()->getimdebeinicial()?></td>
                  <td background="../html/images/tablas/fnd_cuenta_01.gif" valign="bottom">&nbsp;</td>
                  <td class="txttabla" valign="bottom"><?=$orow->getSaldo()->getimhaberinicial()?></td>
                  <td background="../html/images/tablas/fnd_cuenta_01.gif" valign="bottom">&nbsp;</td>
                  <td class="txttabla" valign="bottom"><?=$orow->getSaldo()->getimdebeactual()?></td>
                  <td background="../html/images/tablas/fnd_cuenta_01.gif" valign="bottom">&nbsp;</td>
                  <td class="txttabla" valign="bottom"><?=$orow->getSaldo()->getimhaberactual()?></td>
                  <td background="../html/images/tablas/fnd_cuenta_01.gif" valign="bottom">&nbsp;</td>
                  <td class="txttabla" valign="bottom"><?=$orow->getSaldo()->gettodebemovtos()?></td>
                  <td background="../html/images/tablas/fnd_cuenta_01.gif" valign="bottom">&nbsp;</td>
                  <td class="txttabla" valign="bottom"><?=$orow->getSaldo()->gettohabermovtos()?></td>
                  <td background="../html/images/tablas/fnd_cuenta_01.gif" valign="bottom">&nbsp;</td>
                  <td class="txttabla" valign="bottom"><?=$orow->getSaldo()->gettxcomment()?></td>
                </tr>
      <!-- fin detalle #1 -->
      <? $it++; 
           } ?>
              </table>
            </td>
          </tr>
          <tr>
            <td bgcolor="#1A64CB"><img src="../html/images/blank.gif" width="1" height="3"></td>
          </tr>
          <input type="hidden" name="hidcuentas" value="<?=$it?>">
        </form>
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
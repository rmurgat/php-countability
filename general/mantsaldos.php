<? 
require_once("../seguridad/header.php");
require_once("../comun/CuentaBean.php");
require_once("../comun/CriterioBean.php");
require_once("../comun/MesBean.php");
require_once("../comun/SaldoBean.php");
require_once("../comun/EjercicioBean.php");
require_once("BIZGeneral.php");

/**
 * Programa: mantsaldos.php
 * Descripcion:
 *     Script para dar mantenimientos a los saldos iniciales de las cuentas contables
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

if($hidopcion=='update') {
    $icnt = $_POST['hidcuentas'];
    $csaldos = array();

    for ($i = 0; $i<$icnt ; $i++) {
       $osdo = new SaldoBean();
       $osdo->setcdempresa($osession->getcdempresa());
       $osdo->setcdejercicio($osession->getcdejercicio());
       $osdo->setnumes($omes->getnumes());
       $osdo->setcdusuarioact($osession->getcdusuario());
       $osdo->setcdcuenta($_POST['hid'.$i]);
       $osdo->setcdctageneral($_POST['hidparent'.$i]);
       $osdo->setimdebeinicial($_POST['txtdebe'.$i]);
       $osdo->setimhaberinicial($_POST['txthaber'.$i]);
       $osdo->settxcomment($_POST['txtcomment'.$i]);
       $osdo->setstsaldo("01");
       $csaldos[] = $osdo;
    }
    if(!$obus->addInicializaSaldo($omes, $csaldos, $osession->getcdusuario(), $conn)) {
        $mensaje = "*** ERROR AL QUERER INICIAR EL SALDO PARA LA CUENTAS ***";  
    } else {
        $mensaje = "! SE HAN MODIFICADO LOS SALDOS CON EXITO !";  
    }
}

$ocrit->setcdempresa($osession->getcdempresa());
$ocrit->setcdejercicio($osession->getcdejercicio());
$ocrit->setnumes($omes->getnumes());
$ocrit->settpcuenta('DE');
$ocrit->setstcuenta('AC');
$cctas = $obus->getcCuentaSaldo($ocrit, $conn);

?>
<form name="frmsaldos" method="post" action="">
<input type="hidden" name="hidopcion" value="">
<input type="hidden" name="hidnumes" value="<?=$hidnumes?>">
<input type="hidden" name="id" value="<?=$id?>">
<script language="javascript">
var form = document.frmsaldos;
var expregular = /^\d+$/
var expregular1 = /^\d+\.\d+$/
var expregular2 = /^\.\d+$/

function actualizar() {
  if(!confirm("Esta seguro de querer inicar con estos importes los saldos?")) return;
  if(!valida_impores()) return;    
  form.hidopcion.value = 'update';
  form.submit();
}

function valida_impores() {
   <?php
      $it = 0;
      foreach($cctas as $orow) {
   ?>
    if(!expregular.test(form.txtdebe<?=$it?>.value)) {
        if(!expregular1.test(form.txtdebe<?=$it?>.value)) {
            if(!expregular2.test(form.txtdebe<?=$it?>.value)) {
                alert('Se requiere que el valor del campo IMPORTE DEBE en linea <?=($it+1)?> sea un importe valido');
                return false;
            }
        }
    }
    if(!expregular.test(form.txthaber<?=$it?>.value)) {
        if(!expregular1.test(form.txthaber<?=$it?>.value)) {
            if(!expregular2.test(form.txthaber<?=$it?>.value)) {
                alert('Se requiere que el valor del campo IMPORTE HABER en linea <?=($it+1)?> sea un importe valido');
                return false;
            }
        }
    }
  <? } ?>
  return true;
}


</script>
<table width="800" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>
      <table border="0" cellspacing="0" cellpadding="0" width="100%">
        <tr>
          <td width="300" class="titulos01"><b>saldos</b>iniciales</td>
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
            <td bgcolor="#1A64CB">
                <table border="0" cellspacing="0" cellpadding="2" width="100%">
                     <tr>
                     <td width='33%'><img src="../html/images/blank.gif" width="2" height="1"></td>
                     <td width='33%'><div align="center" class="Tittablas"><?=$omes->getnbmes()?></div></td>
                     <td align='right' width='33%'><a href="javascript:actualizar();"><img src="../html/images/botones/B_actualizar.gif" height="14" border="0"></a></td>
                     </tr>
                </table>
            </td>
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
                    <div align="center" class="Tittablas">DEBE<br>INICIAL</div>
                  </td>
                  <td background="../html/images/tablas/fnd07.gif">&nbsp;</td>
                  <td bgcolor="#7E9EDF" >
                    <div align="center" class="Tittablas">HABER<br>INICIAL</div>
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
                  <input type='hidden' name='hidparent<?=$it?>' value='<?=$orow->getcdctageneral()?>'>
                  <td  class="txttabla" valign="bottom" nowrap >
                    <div align="center"><?=($it+1)?></div>
                  </td>
                  <td background="../html/images/tablas/fnd_cuenta_01.gif">&nbsp;</td>
                  <td  class="txttabla" valign="bottom" nowrap >
                    <div align="center"><?=$orow->getnucuenta()?></div>
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
                  <td valign="bottom"><input type="text" name="txtdebe<?=$it?>" value="<?=$orow->getSaldo()->getimdebeinicial()?>" maxlength="15" size="15" class="txttabla" ></td>
                  <td background="../html/images/tablas/fnd_cuenta_01.gif" valign="bottom">&nbsp;</td>
                  <td valign="bottom"><input type="text" name="txthaber<?=$it?>" value="<?=$orow->getSaldo()->getimhaberinicial()?>" maxlength="15" size="15" class="txttabla" ></td>
                  <td background="../html/images/tablas/fnd_cuenta_01.gif" valign="bottom">&nbsp;</td>
                  <td valign="bottom"><input type="text" name="txtcomment<?=$it?>" value="<?=$orow->getSaldo()->gettxcomment()?>" maxlength="255" size="30" class="txttabla" ></td>
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
</form>
<? 
   require_once("../seguridad/footer.php");
?>
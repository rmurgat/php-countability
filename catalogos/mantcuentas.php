<? 
require_once("../seguridad/header.php");
require_once("../comun/CuentaBean.php");
require_once("../comun/CriterioBean.php");
require_once("../comun/EjercicioBean.php");
require_once("BIZCatalogos.php");

/**
 * Programa: mantcuentas.php
 * Descripcion:
 *     Script para consultar el catálogo de cuentas contables y la posibilidad de
 *     dar de alta, modificar, eliminar, agragar contacto, agregar doctos
 * Autor:
 *     HANYGEN Software S.A. de C.V. 
 *     Ruben Murga Tapia
 **/
$obus = new BIZCatalogos();
$ocrit  = new CriterioBean();
$hidopcion = $_POST['hidopcion'];
$mensaje = "";

$hidcdempresa = $osession->getcdempresa();
$hidcdejercicio = $osession->getcdejercicio();

if($hidopcion=='del') {
  if(!$obus->delCuentaBean($hidcdempresa, $_POST['hidcdejercicio'], $_POST['hidcdcuenta'], $conn)) {
    $mensaje = "***ERROR AL QUERER ELIMINAR UNA CUENTA DEL SISTEMA***";  
  } else {
    $mensaje = "! SE HA ELIMINADO UNA CUENTA CON EXITO !";  
  }
}

$ocrit->setcdempresa($hidcdempresa);
$ocrit->setcdejercicio($hidcdejercicio);
$cctas = $obus->getcCuentaBeans($ocrit, $conn);
$cejers = $obus->getEjercicioBeans($conn);

?>
<form name="frmcliente" method="post" action="">
<input type="hidden" name="hidopcion" value="">
<input type="hidden" name="id" value="<?=$id?>">
<input type="hidden" name="hidcdempresa" value="<?=$hidcdempresa?>">
<input type="hidden" name="hidcdejercicio" value="<?=$hidcdejercicio?>">
<input type="hidden" name="hidcdcuenta" value="">
<input type="hidden" name="hidoperacion" value="">
<script language="javascript">
var form = document.frmcliente;

function nuevo() {
    form.hidoperacion.value = "nuevo";
    form.action = "cuenta.php";
    form.submit();
}

function select(ejercicio, clave) {
    form.hidcdejercicio.value = ejercicio;
    form.hidcdcuenta.value = clave;
    form.hidoperacion.value = "consulta";
    form.action = "cuenta.php";
    form.submit();
}

function eliminar(ejercicio, clave) {
    if(!confirm("Esta seguro de querer eliminar la cuenta contable?")) return;
    form.hidcdejercicio.value = ejercicio;
    form.hidcdcuenta.value = clave;
    form.hidopcion.value = "del";
    form.submit();
}

function modificar(ejercicio, clave) {
    form.hidcdejercicio.value = ejercicio;
    form.hidcdcuenta.value = clave;
    form.hidoperacion.value = "modificar";
    form.action = "cuenta.php";
    form.submit();
}

</script>
<table width="600" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>
      <table border="0" cellspacing="0" cellpadding="0" width="100%">
        <tr>
          <td width="300" class="titulos01"><b>cuentas</b>contables</td>
          <td align="right"> <span class="notas">Haz click sobre el n&uacute;mero
            de cuenta para ver el detalle</span></td>
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
            <td bgcolor="#1A64CB"><img src="../html/images/blank.gif" width="1" height="3"></td>
            <td rowspan="5" bgcolor="#CCCCCC"><img src="../html/images/blank.gif" width="2" height="1"></td>
          </tr>
    <!-- inician criterios de consulta -->
          <tr>
             <td bgcolor="#AEBEDD">
             <table border="0" cellspacing="0" cellpadding="0" width="100%">
             <tr>
             <td bgcolor="#AEBEDD"><a href="javascript:nuevo();"><img src="../html/images/botones/B_nuevo.gif" border="0"></a></td>
             <td align="right">
                    <table border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td class="cifras">Ejercicio:</td>
                        <td><img src="../html/images/blank.gif" width="3" height="1"></td>
                        <td>
                          <select name="cboejercicio" class="txt10Vgris">
                            <? foreach($cejers as $orow) { ?>
                            <option value="<?=$orow->getcdejercicio()?>" <? if($orow->getcdejercicio()==$hidcdejercicio) { echo "selected"; }?> ><?=$orow->getcdejercicio()?></option>
                            <? } ?>
                          </select>
                        </td>
                      <tr>
                        <td class="cifras">Buscar por Cuenta:</td>
                        <td><img src="../html/images/blank.gif" width="3" height="1"></td>
                        <td>
                          <input type="text" name="txtcuenta" size="20" maxlength="20">
                        </td>
                        <td><img src="../html/images/blank.gif" width="5" height="1"></td>
                        <td><img src="../html/images/botones/B_buscar.gif" width="40" height="14"></td>
                        <td><img src="../html/images/blank.gif" width="5" height="1"></td>
                      </tr>
                    </table>
                  </td>
                </tr>
              </table>
            </td>
          </tr>
<!-- terminan los criterios de consulta -->
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
                </tr>
                <tr>
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
                    <div align="center" class="Tittablas">OPERACIONES</div>
                  </td>
                </tr>
    <?php
      $it = 0;
      foreach($cctas as $orow) {
         $octagral = $obus->getCuentaBean($hidcdempresa, $orow->getcdejercicio(), $orow->getcdctageneral(), $conn);
         $octacierre = $obus->getCuentaBean($hidcdempresa, $orow->getcdejercicio(), $orow->getcdctacierre(), $conn);
         if($octagral==null) $octagral = new CuentaBean();
         if($octacierre==null) $octacierre = new CuentaBean();
     
    ?>
      <!-- inicia detalle #1-->
                <tr <?if($it%2==0) echo "bgcolor='#EEEEEE'"; ?>>
                  <td nowrap><a href="javascript:select('<?=$orow->getcdejercicio()?>','<?=$orow->getcdcuenta()?>');" class="linktabla"><?=$orow->getnucuenta()?></a></td>
                  <td background="../html/images/tablas/fnd_cuenta_01.gif">&nbsp;</td>
                  <td class="txttabla" valign="bottom">
                    <div align="center"><?=$orow->getnbcuenta()?></div>
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
                  <td class="txttabla" valign="bottom">
                    <div align="center">
                           <a href="javascript:modificar('<?=$orow->getcdejercicio()?>','<?=$orow->getcdcuenta()?>');"><img src="../html/images/botones/B_edit.gif" width="18" height="16" alt="Edici&oacute;n de informaci&oacute;n de una cuenta contable" border="0"></a>
                           <a href="javascript:eliminar('<?=$orow->getcdejercicio()?>','<?=$orow->getcdcuenta()?>')"><img src="../html/images/botones/B_del.gif" width="18" height="16" alt="Eliminaci&oacute;n de una cuenta contable" border="0"></a>
                    </div>
                  </td>
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
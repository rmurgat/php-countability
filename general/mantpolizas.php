<? 
require_once("../seguridad/header.php");
require_once("../comun/PolizaBean.php");
require_once("../comun/MovimientoBean.php");
require_once("../comun/CriterioBean.php");
require_once("../comun/MesBean.php");
require_once("BIZGeneral.php");
require_once("../util/Utilerias.php"); 

/**
 * Programa: mantpolizas.php
 * Descripcion:
 *     Script para consultar las polizas contables y la posibilidad de
 *     dar de alta, modificar, eliminar, agragar contacto, agregar doctos
 * Autor:
 *     HANYGEN Software S.A. de C.V. 
 *     Ruben Murga Tapia
 **/
$obus = new BIZGeneral();
$ocrit  = new CriterioBean();
$hidopcion = $_POST['hidopcion'];
$mensaje = "";
$cpolizs = array();
$outil = new Utilerias();
$cmeses = array();

$hidcdempresa = $osession->getcdempresa();
$hidcdejercicio = $osession->getcdejercicio();
$hidnumes = ($_POST['hidnumes']==null)? $_GET['hidnumes']: $_POST['hidnumes'];

if($hidopcion=='del') {
  $odel = $obus->getPolizaBean($hidcdempresa, $hidcdejercicio, $_POST['hidcdpoliza'], $conn);
  if(!$obus->delPolizaBean($odel, $conn)) {
    $mensaje = "***ERROR AL QUERER ELIMINAR UNA POLIZA DEL SISTEMA***";  
  } else {
    $mensaje = "! SE HA ELIMINADO LA POLIZA CON EXITO !";  
  }
}

if($hidopcion=='buscar') {
  $ocrit->setcdempresa($hidcdempresa);
  $ocrit->setcdejercicio($hidcdejercicio);
  $ocrit->setnumes($hidnumes);
  $cpolizs = $obus->getPolizaBeans($ocrit, $conn);
}

$cmeses = $obus->getMesBeans($hidcdempresa, $hidcdejercicio, $conn);
?>
<form name="frmcliente" method="post" action="">
<input type="hidden" name="hidopcion" value="">
<input type="hidden" name="id" value="<?=$id?>">
<input type="hidden" name="hidcdempresa" value="<?=$hidcdempresa?>">
<input type="hidden" name="hidcdejercicio" value="<?=$hidcdejercicio?>">
<input type="hidden" name="hidcdpoliza" value="">
<input type="hidden" name="hidnumes" value="">
<input type="hidden" name="hidoperacion" value="">
<script language="javascript">
var form = document.frmcliente;

function nuevo() {
    form.hidoperacion.value = "nuevo";
    form.hidnumes.value = form.cbomes.value;
    form.action = "poliza.php";
    form.submit();
}

function buscar() {
    form.hidopcion.value = "buscar";
    form.hidnumes.value = form.cbomes.value;
    form.submit();
}

function select(ejercicio, clave) {
    form.hidcdejercicio.value = ejercicio;
    form.hidcdpoliza.value = clave;
    form.hidoperacion.value = "consulta";
    form.action = "poliza.php";
    form.submit();
}

function eliminar(ejercicio, clave) {
    if(!confirm("Esta seguro de querer eliminar la poliza?")) return;
    form.hidcdejercicio.value = ejercicio;
    form.hidcdpoliza.value = clave;
    form.hidopcion.value = "del";
    form.submit();
}

function modificar(ejercicio, clave) {
    form.hidcdejercicio.value = ejercicio;
    form.hidcdpoliza.value = clave;
    form.hidoperacion.value = "modificar";
    form.action = "poliza.php";
    form.submit();
}

function open_link(link) {
    window.open(link, "", "scrollbars=yes,resizable=yes,top=100,left=100,width=450,height=410");
}

</script>
<table width="800" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>
      <table border="0" cellspacing="0" cellpadding="0" width="100%">
        <tr>
          <td width="300" class="titulos01"><b>polizas</b>contables</td>
          <td align="right"> <span class="notas">Haz click sobre el n&uacute;mero
            de poliza para ver el detalle</span></td>
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
                        <td class="cifras">Mes:</td>
                        <td><img src="../html/images/blank.gif" width="3" height="1"></td>
                        <td>
                          <select name="cbomes" class="txt10Vgris">
                               <? foreach($cmeses as $orow) { ?>
                                <option value="<?=$orow->getnumes()?>" <? if($orow->getnumes()==$hidnumes) { echo "selected"; } ?> ><?=$orow->getnbmes()?></option>
                                <? } ?>
                          </select>
                        </td>
                        <td><img src="../html/images/blank.gif" width="5" height="1"></td>
                        <td><a href="javascript:buscar();"><img src="../html/images/botones/B_buscar.gif" width="40" height="14" border="0"></a></td>
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
                  <td background="../html/images/tablas/fnd07.gif"><img src="../html/images/blank.gif" width="0" height="0"></td>
                  <td bgcolor="#7E9EDF"><img src="../html/images/blank.gif" width="0" height="0"></td>
                </tr>
                <tr>
                  <td bgcolor="#7E9EDF" ><div align="center" class="Tittablas"># POLIZA</div></td>
                  <td background="../html/images/tablas/fnd07.gif">&nbsp;</td>
                  <td bgcolor="#7E9EDF" ><div align="center" class="Tittablas">NOMBRE</div></td>
                  <td background="../html/images/tablas/fnd07.gif">&nbsp;</td>
                  <td bgcolor="#7E9EDF" ><div align="center" class="Tittablas">MES</div></td>
                  <td background="../html/images/tablas/fnd07.gif">&nbsp;</td>
                  <td bgcolor="#7E9EDF" ><div align="center" class="Tittablas">TIPO DE<br>POLIZA</div></td>
                  <td background="../html/images/tablas/fnd07.gif">&nbsp;</td>
                  <td bgcolor="#7E9EDF" ><div align="center" class="Tittablas">FECHA<br>CREACI&Oacute;N</div></td>
                  <td background="../html/images/tablas/fnd07.gif">&nbsp;</td>
                  <td bgcolor="#7E9EDF" ><div align="center" class="Tittablas">FECHA<br>ACTUALIZACI&Oacute;N</div></td>
                  <td background="../html/images/tablas/fnd07.gif">&nbsp;</td>
                  <td bgcolor="#7E9EDF" ><div align="center" class="Tittablas">USUARIO<br>CREACI&Oacute;N</div></td>
                  <td background="../html/images/tablas/fnd07.gif">&nbsp;</td>
                  <td bgcolor="#7E9EDF" ><div align="center" class="Tittablas">ARCHIVO</div></td>
                  <td background="../html/images/tablas/fnd07.gif">&nbsp;</td>
                  <td bgcolor="#7E9EDF" ><div align="center" class="Tittablas">ESTATUS</div></td>
                  <td background="../html/images/tablas/fnd07.gif">&nbsp;</td>
                  <td bgcolor="#7E9EDF" ><div align="center" class="Tittablas">OPERACIONES</div></td>
                </tr>
    <?php
      $it = 0;
      foreach($cpolizs as $orow) {
        $ousuario = $obus->getUsuarioBean($orow->getcdusuariocreo(), $conn);
    ?>
      <!-- inicia detalle #1-->
                <tr <?if($it%2==0) echo "bgcolor='#EEEEEE'"; ?>>
                  <td align="center"><a href="javascript:select('<?=$orow->getcdejercicio()?>','<?=$orow->getcdpoliza()?>');" class="linktabla"><?=$orow->getscdpoliza()?></a></td>
                  <td background="../html/images/tablas/fnd_cuenta_01.gif">&nbsp;</td>
                  <td class="txttabla" valign="bottom">
                    <div align="center"><?=$orow->getnbpoliza()?></div>
                  </td>
                  <td background="../html/images/tablas/fnd_cuenta_01.gif" valign="bottom">&nbsp;</td>
                  <td class="txttabla" valign="bottom">
                    <div align="center"><?=$orow->getnumes()?></div>
                  </td>
                  <td background="../html/images/tablas/fnd_cuenta_01.gif" valign="bottom">&nbsp;</td>
                  <td class="txttabla" valign="bottom">
                        <div align="center"><?=$orow->getcdtpoliza()?></div>
                  </td>
                  <td background="../html/images/tablas/fnd_cuenta_01.gif" valign="bottom">&nbsp;</td>
                  <td class="txttabla" valign="bottom">
                        <div align="center"><?=$orow->getfhcreada()?></div>
                  </td>
                  <td background="../html/images/tablas/fnd_cuenta_01.gif" valign="bottom">&nbsp;</td>
                  <td class="txttabla" valign="bottom">
                        <div align="center"><?=$orow->getfhactualizada()?></div>
                  </td>
                  <td background="../html/images/tablas/fnd_cuenta_01.gif" valign="bottom">&nbsp;</td>
                  <td class="txttabla" valign="bottom">
                        <div align="center"><?=$ousuario->getnbusuario()?></div>
                  </td>
                  <td background="../html/images/tablas/fnd_cuenta_01.gif" valign="bottom">&nbsp;</td>
                  <td class="txttabla" valign="bottom">
                    <div align="center">
                       <? if($orow->getlkpoliza()!='') {?>
                       <a href="javascript:open_link('../<?=$hidcdempresa?>/img_polizas/<?=$orow->getlkpoliza()?>');"><img src="../html/images/iconos/<?=$outil->getfileimage($orow->getlkpoliza())?>" width="13" height="13"  border="0" alt="archivo adjunto"></a>
                        <? } ?>
                  </td>
                  <td background="../html/images/tablas/fnd_cuenta_01.gif" valign="bottom">&nbsp;</td>
                  <td class="txttabla" valign="bottom">
                        <div align="center"><?=$orow->getsstpoliza()?></div>
                  </td>
                  <td background="../html/images/tablas/fnd_cuenta_01.gif" valign="bottom">&nbsp;</td>
                  <td class="txttabla" valign="bottom">
                    <div align="center">
                           <? if($orow->getstpoliza()=='PE') { ?>
                           <a href="javascript:modificar('<?=$orow->getcdejercicio()?>','<?=$orow->getcdpoliza()?>');"><img src="../html/images/botones/B_edit.gif" width="18" height="16" alt="Edici&oacute;n de informaci&oacute;n de una poliza" border="0"></a>
                           <a href="javascript:eliminar('<?=$orow->getcdejercicio()?>','<?=$orow->getcdpoliza()?>')"><img src="../html/images/botones/B_del.gif" width="18" height="16" alt="Eliminaci&oacute;n definitiva de una poliza" border="0"></a>
                           <? } ?>
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
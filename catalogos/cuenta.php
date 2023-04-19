<? 
require_once("../seguridad/header.php");
require_once("../comun/CuentaBean.php");
require_once("../comun/CriterioBean.php");
require_once("BIZCatalogos.php");

/**
 * Programa: cuenta.php
 * Descripcion:
 *     Script con la opcion de dar de alta, modificar y consultar los datos de una cuenta contable
 * Autor:
 *     HANYGEN Software S.A. de C.V. 
 *     Ruben Murga Tapia
 **/
$obus = new BIZCatalogos();
$oobj = new CuentaBean();
$ocrit  = new CriterioBean();
$mensaje = "";
$hidopcion = $_POST['hidopcion'];
$readonly = "";

$hidcdempresa = ($_POST['hidcdempresa']==null)? $_GET['hidcdempresa']: $_POST['hidcdempresa'];
$hidcdejercicio = ($_POST['hidcdejercicio']==null)? $_GET['hidcdejercicio']: $_POST['hidcdejercicio'];
$hidcdcuenta = ($_POST['hidcdcuenta']==null)? $_GET['hidcdcuenta']: $_POST['hidcdcuenta'];
$hidoperacion = ($_POST['hidoperacion']==null)? $_GET['hidoperacion']: $_POST['hidoperacion'];

if($hidoperacion=='consulta') $readonly='readonly';

if($hidoperacion=='modificar' || $hidoperacion=='consulta') { 
  $oobj = $obus->getCuentaBean($hidcdempresa, $hidcdejercicio, $hidcdcuenta, $conn);
}

if($hidopcion=="save") {
  $oobj->setcdempresa($hidcdempresa);
  $oobj->setcdejercicio($hidcdejercicio);
  $oobj->setcdcuenta($hidcdcuenta);
  $oobj->setnbcuenta($_POST['txtnombre']);
  $oobj->setnucuenta($_POST['txtcuenta']);
  $oobj->settpnaturaleza($_POST['optnaturaleza']);
  $oobj->settpcuenta($_POST['optipo']);
  $oobj->setstcuenta($_POST['optestatus']);
  $oobj->setnunivel($_POST['cbonivel']);
  $oobj->setcdctageneral($_POST['cboctageneral']);
  $oobj->setcdctacierre($_POST['cboctacierre']);
  $oobj->settxcomment($_POST['txtcomment']);

  if(!$obus->saveCuentaBean($oobj, $conn)) {
    $mensaje = "***ERROR AL QUERER AGREGAR/MODIFICAR UNA CUENTA CONTABLE EN SISTEMA***";  
  } else {
    $mensaje = "! SE HA SALVADO LA INFORMACI&Oacute;N DE LA CUENTA CONTABLE CON EXITO !";  
    if($hidoperacion=='nuevo') $oobj = new CuentaBean();
  }
  $hidopcion="";
}

$ocrit->setcdempresa($hidcdempresa);
$ocrit->setcdejercicio($hidcdejercicio);
$ocrit->settpcuenta('GE');
$ocrit->setstcuenta('AC');
$cctas = $obus->getcCuentaBeans($ocrit, $conn);

?>
<form name="frmcuenta" method="post" action="">
<input type="hidden" name="hidopcion" value="">
<input type="hidden" name="id" value="<?=$id?>">
<input type="hidden" name="hidcdempresa" value="<?=$hidcdempresa?>">
<input type="hidden" name="hidcdejercicio" value="<?=$hidcdejercicio?>">
<input type="hidden" name="hidoperacion" value="<?=$hidoperacion?>">
<input type="hidden" name="hidcdcuenta" value="<?=$hidcdcuenta?>">
<script language="javascript">
var form = document.frmcuenta;

function salvar() {
    if(!valida_datos()) return;
    form.hidopcion.value="save";
    form.submit();
}

function cerrar() {
    form.action = '../seguridad/menu.php';
    form.submit();
}

function valida_datos() {
  var stxtnombre = trim(form.txtnombre.value);
  var stxtcuenta = trim(form.txtcuenta.value);
  var scbonivel = trim(form.cbonivel.value);

  if(stxtnombre=='') {
    alert('Es necesario ingresar un valor al campo NOMBRE!');
    return false;
  }
  if(stxtcuenta=='') {
    alert('Es necesario ingresar un valor al campo CUENTA!');
    return false;
  }
  if(scbonivel=='') {
    alert('Es necesario ingresar un valor al campo NIVEL!');
    return false;
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

<table border="0" cellspacing="0" cellpadding="0" width="500">
  <tr>
      <td><img src="../html/images/blank.gif" width="15" height="5"></td>
      <td class="titulos01">
        <? if($hidoperacion=='nuevo') { ?>
             nueva<b>cuenta</b>contable
        <? } ?>
        <? if($hidoperacion=='modificar') { ?>
             modificaci&oacute;n<b>de</b>cuenta<b>contable</b>
         <? } ?>
        <? if($hidoperacion=='consulta') { ?>
             consulta<b>de</b>cuenta<b>contable</b>
         <? } ?>
      </td>
  </tr>
  <tr>
    <td colspan="2"><img src="../html/images/blank.gif" width="1" height="5"></td>
  </tr>
  <? if($mensaje!='') { ?>
  <tr bgcolor=orange colspan="2">
    <td><img src="../html/images/blank.gif" width="15" height="5"></td>
    <td class="AvisoHeaderBold"><?=$mensaje?></td>
  </tr>
  <? } ?>
    <tr>
    <td><img src="../html/images/blank.gif" width="15" height="5"></td>
    <td>
      <table border="0" cellspacing="0" cellpadding="0" align="center" width="100">
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
                    <table border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td class="txt11V" width="100">Nombre:</td>
                        <td><img src="../html/images/blank.gif" width="5" height="1"></td>
                        <td>
                          <input type="text" name="txtnombre" size="65" maxlength="100" value="<?=$oobj->getnbcuenta()?>" class="txt10Vgris" <?=$readonly?>>
                        </td>
                      </tr>
                    </table>
                  </td>
                </tr>
                <tr>
                  <td>
                    <table border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td class="txt11V" width="200">Cuenta:<br>
                          <img src="../html/images/blank.gif" width="105" height="1"></td>
                        <td align="left">
                          <input type="text" name="txtcuenta" size="20" maxlength="15" value="<?=$oobj->getnucuenta()?>" class="txt10Vgris" <?=$readonly?>>
                        </td>
                        <td colspan="3"><img src="../html/images/blank.gif" width="260" height="1"></td>
                      </tr>
                    </table>
                  </td>
                </tr>
                <tr bgcolor="#E5ECF9">
                  <td>
                    <table border="0" cellspacing="0" cellpadding="0" width="200">
                      <tr>
                        <td class="txt11V" width="100">Naturaleza:<br>
                          <img src="../html/images/blank.gif" width="145" height="1">
                        </td>
                        <td><img src="../html/images/blank.gif" width="5" height="1"></td>
                        <td>
                          <table border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td>
                                <input type="radio" name="optnaturaleza" value="CO" class="txt10Vgris" <?=$readonly?> <? if($oobj->gettpnaturaleza()=='CO' || $oobj->gettpnaturaleza()=='') { echo "checked"; } ?> >
                              </td>
                              <td><img src="../html/images/blank.gif" width="5" height="1"></td>
                              <td class="notas">Costo</td>
                            </tr>
                            <tr>
                              <td colspan="3"><img src="../html/images/blank.gif" width="1" height="7"></td>
                            </tr>
                            <tr>
                              <td>
                                <input type="radio" name="optnaturaleza" value="AT"  class="txt10Vgris" <?=$readonly?> <? if($oobj->gettpnaturaleza()=='AT') { echo "checked"; } ?> >
                              </td>
                              <td><img src="../html/images/blank.gif" width="5" height="1"></td>
                              <td class="notas">Activo</td>
                            </tr>
                          </table>
                        </td>
                        <td><img src="../html/images/blank.gif" width="20" height="1"></td>
                        <td class="txt11V" align="right">Tipo:<br>
                          <img src="../html/images/blank.gif" width="100" height="1">
                        </td>
                        <td><img src="../html/images/blank.gif" width="20" height="1"></td>
                        <td>
                          <table border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td>
                                <input type="radio" name="optipo" value="GE" checked class="txt10Vgris" <?=$readonly?> <? if($oobj->gettpcuenta()=='GE' || $oobj->gettpcuenta()=='') { echo "checked"; } ?>>
                              </td>
                              <td><img src="../html/images/blank.gif" width="5" height="1"></td>
                              <td class="notas">General</td>
                            </tr>
                            <tr>
                              <td colspan="3"><img src="../html/images/blank.gif" width="1" height="7"></td>
                            </tr>
                            <tr>
                              <td>
                                <input type="radio" name="optipo" value="DE"  class="txt10Vgris" <?=$readonly?> <? if($oobj->gettpcuenta()=='DE') { echo "checked"; } ?>>
                              </td>
                              <td><img src="../html/images/blank.gif" width="5" height="1"></td>
                              <td class="notas">Detalle</td>
                            </tr>
                          </table>
                        </td>
                      </tr>
                    </table>
                  </td>
                </tr>
                <tr>
                  <td>
                    <table border="0" cellspacing="0" cellpadding="0" width="200">
                      <tr>
                        <td class="txt11V" width="100">Estatus:<br>
                          <img src="../html/images/blank.gif" width="145" height="1">
                        </td>
                        <td><img src="../html/images/blank.gif" width="5" height="1"></td>
                        <td>
                          <table border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td>
                                <input type="radio" name="optestatus" value="AC" checked class="txt10Vgris" <?=$readonly?> <? if($oobj->getstcuenta()=='AC' || $oobj->getstcuenta()=='') { echo "checked"; } ?>>
                              </td>
                              <td><img src="../html/images/blank.gif" width="5" height="1"></td>
                              <td class="notas">Activa</td>
                            </tr>
                            <tr>
                              <td colspan="3"><img src="../html/images/blank.gif" width="1" height="7"></td>
                            </tr>
                            <tr>
                              <td>
                                <input type="radio" name="optestatus" value="IN"  class="txt10Vgris" <?=$readonly?> <? if($oobj->getstcuenta()=='IN') { echo "checked"; } ?>>
                              </td>
                              <td><img src="../html/images/blank.gif" width="5" height="1"></td>
                              <td class="notas">Inactiva</td>
                            </tr>
                          </table>
                        </td>
                        <td><img src="../html/images/blank.gif" width="20" height="1"></td>
                        <td class="txt11V" align="right">Nivel:<br>
                          <img src="../html/images/blank.gif" width="100" height="1">
                        </td>
                        <td><img src="../html/images/blank.gif" width="20" height="1"></td>
                        <td>
                          <select name="cbonivel" class="txt10Vgris" <?=$readonly?> >
                             <option value="1" <? if($oobj->getnunivel()=='1') { echo "selected"; } ?> >1er.Nivel</option>
                             <option value="2" <? if($oobj->getnunivel()=='2') { echo "selected"; } ?>>2do.Nivel</option>
                             <option value="3" <? if($oobj->getnunivel()=='3') { echo "selected"; } ?>>3er.Nivel</option>
                             <option value="4" <? if($oobj->getnunivel()=='4') { echo "selected"; } ?>>4to.Nivel</option>
                              <option value="5" <? if($oobj->getnunivel()=='5') { echo "selected"; } ?>>5to.Nivel</option>
                           </select>
                        </td>
                      </tr>
                    </table>
                  </td>
                </tr>
                <tr bgcolor="#E5ECF9">
                  <td>
                    <table border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td class="txt11V" align="left">Cuenta General:<br>
                          <img src="../html/images/blank.gif" width="145" height="1">
                        </td>
                        <td><img src="../html/images/blank.gif" width="20" height="1"></td>
                        <td>
                          <select name="cboctageneral" class="txt10Vgris"  <?=$readonly?>>
                             <option value="0"></option>
                            <? foreach($cctas as $orow) { ?>
                            <option value="<?=$orow->getcdcuenta()?>"  <?if($orow->getcdcuenta()==$oobj->getcdctageneral()) { echo "selected"; } ?>><?=$orow->getnucuenta()?></option>
                            <? } ?>
                           </select>
                        </td>
                        <td><img src="../html/images/blank.gif" width="20" height="1"></td>
                        <td class="txt11V" align="right">Cuenta de Cierre:<br>
                          <img src="../html/images/blank.gif" width="100" height="1">
                        </td>
                        <td><img src="../html/images/blank.gif" width="20" height="1"></td>
                        <td>
                          <select name="cboctacierre" class="txt10Vgris"  <?=$readonly?>>
                             <option value="0"></option>
                            <? foreach($cctas as $orow) { ?>
                            <option value="<?=$orow->getcdcuenta()?>" <?if($orow->getcdcuenta()==$oobj->getcdctacierre()) { echo "selected"; } ?>><?=$orow->getnucuenta()?></option>
                            <? } ?>
                           </select>
                        </td>
                      </tr>
                    </table>
                  </td>
                </tr>
                <tr>
                  <td >
                    <table border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td valign="top" class="txt11V" width="100">Comentario:</td>
                        <td><img src="../html/images/blank.gif" width="5" height="1"></td>
                        <td>
                          <textarea name="txtcomment" cols="60" rows="4" class="txt10Vgris" <?=$readonly?>><?=$oobj->gettxcomment()?></textarea>
                        </td>
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
                                <p class="notas" align="justify">Es necesario que toda la informaci&oacute;n de la cuenta contable sea confirmada, ya que en caso contrario podria tener repercusiones fiscales.</p>
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
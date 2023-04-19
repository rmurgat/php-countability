<? 
require_once("../seguridad/header.php");
require_once("../comun/ClienteBean.php");
require_once("../comun/EstadoBean.php");
require_once("BIZCatalogos.php");

/**
 * Programa: cliente.php
 * Descripcion:
 *     Script con la opcion de dar de alta, modificar y consultar los datos de un cliente
 * Autor:
 *     HANYGEN Software S.A. de C.V. 
 *     Ruben Murga Tapia
 **/
$obus = new BIZCatalogos();
$oobj = new ClienteBean();
$mensaje = "";
$hidopcion = $_POST['hidopcion'];
$readonly = "";

$hidcdempresa = ($_POST['hidcdempresa']==null)? $_GET['hidcdempresa']: $_POST['hidcdempresa'];
$hidcdcliente = ($_POST['hidcdcliente']==null)? $_GET['hidcdcliente']: $_POST['hidcdcliente'];
$hidoperacion = ($_POST['hidoperacion']==null)? $_GET['hidoperacion']: $_POST['hidoperacion'];

if($hidoperacion=='consulta') $readonly='readonly';

if($hidoperacion=='modificar' || $hidoperacion=='consulta') { 
  $oobj = $obus->getClienteBean($hidcdempresa, $hidcdcliente, $conn);
}

if($hidopcion=="save") {
  $oobj->setcdempresa($hidcdempresa);
  $oobj->setcdcliente($hidcdcliente);
  $oobj->setcdestado($_POST['cboestado']);
  $oobj->setstcliente($_POST['radestatus']);
  $oobj->setstiva($_POST['radiva']);
  $oobj->setcdrfc($_POST['txtrfc']);
  $oobj->setnutelefono($_POST['txtelefono']);
  $oobj->setnbcliente($_POST['txtnombre']);
  $oobj->setnbrazonsocial($_POST['txtrazonsocial']);
  $oobj->settxdireccion($_POST['txtdireccion']);
  $oobj->setpoiva($_POST['txtpoiva']);

  if(!$obus->saveClienteBean($oobj, $conn)) {
    $mensaje = "***ERROR AL QUERER AGREGAR/MODIFICAR UN CLIENTE EN SISTEMA***";  
  } else {
    $mensaje = "! SE HA SALVADO LA INFORMACI&Oacute;N DE UN CLIENTE CON EXITO !";  
    if($hidoperacion=='nuevo') $oobj = new ClienteBean();
  }
  $hidopcion="";
}

$cedos = $obus->getEstadoBeans($conn);

?>
<form name="frmcliente" method="post" action="">
<input type="hidden" name="hidopcion" value="">
<input type="hidden" name="id" value="<?=$id?>">
<input type="hidden" name="hidcdempresa" value="<?=$hidcdempresa?>">
<input type="hidden" name="hidoperacion" value="<?=$hidoperacion?>">
<input type="hidden" name="hidcdcliente" value="<?=$oobj->getcdcliente()?>">
<script language="javascript">
var form = document.frmcliente;

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
  var stxtrazonsocial = trim(form.txtrazonsocial.value);
  var stxtrfc = trim(form.txtrfc.value);
  var scboestado = trim(form.cboestado.value);
  var stxtdireccion = trim(form.txtdireccion.value);
  var stxtelefono = trim(form.txtelefono.value);

  if(stxtnombre=='') {
    alert('Es necesario ingresar un valor al campo NOMBRE!');
    return false;
  }
  if(stxtrazonsocial=='') {
    alert('Es necesario ingresar un valor al campo RAZON SOCIAL!');
    return false;
  }
  if(stxtrfc=='') {
    alert('Es necesario ingresar un valor al campo RFC!');
    return false;
  }
  if(scboestado=='') {
    alert('Es necesario ingresar un valor al campo ESTADO!');
    return false;
  }
  if(stxtdireccion=='') {
    alert('Es necesario ingresar un valor al campo DIRECCION!');
    return false;
  }
  if(stxtelefono=='') {
    alert('Es necesario ingresar un valor al campo TELEFONO!');
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
      <td class="titulos01">
        <? if($hidoperacion=='nuevo') { ?>
             nuevo<b>cliente</b>
        <? } ?>
        <? if($hidoperacion=='modificar') { ?>
             modificaci&oacute;n<b>cliente</b>
         <? } ?>
        <? if($hidoperacion=='consulta') { ?>
             consulta<b>cliente</b>
         <? } ?>
      </td>
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
                          <input type="text" name="txtnombre" value="<?=$oobj->getnbcliente()?>" size="65" maxlength="256" class="txt10Vgris" <?=$readonly?> >
                        </td>
                      </tr>
                    </table>
                  </td>
                </tr>
                <tr>
                  <td>
                    <table border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td class="txt11V" width="100">Raz&oacute;n Social:</td>
                        <td><img src="../html/images/blank.gif" width="5" height="1"></td>
                        <td>
                          <input type="text" name="txtrazonsocial" value="<?=$oobj->getnbrazonsocial()?>" size="65" maxlength="256" class="txt10Vgris" <?=$readonly?> >
                        </td>
                      </tr>
                    </table>
                  </td>
                </tr>
                <tr>
                  <td bgcolor="#E5ECF9">
                    <table border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td class="txt11V" width="100">RFC:<br>
                          <img src="../html/images/blank.gif" width="105" height="1"></td>
                        <td>
                          <input type="text" name="txtrfc" value="<?=$oobj->getcdrfc()?>" size="15" maxlength="20" class="txt10Vgris" <?=$readonly?> >
                        </td>
                        <td><img src="../html/images/blank.gif" width="50" height="1"></td>
                        <td class="txt11V" align="right">Estado:<br>
                          <img src="../html/images/blank.gif" width="55" height="1"></td>
                        <td><img src="../html/images/blank.gif" width="20" height="1"></td>
                        <td valign="middle">
                          <select name="cboestado" class="txt10Vgris" <?=$readonly?> >
                            <? foreach($cedos as $orow) { ?>
                            <option value="<?=$orow->getcdestado()?>"><?=$orow->getnbestado()?></option>
                            <? } ?>
                          </select>
                        </td>
                      </tr>
                    </table>
                  </td>
                </tr>
                <tr>
                  <td>
                    <table border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td class="txt11V" width="100">Direcci&oacute;n:</td>
                        <td><img src="../html/images/blank.gif" width="5" height="1"></td>
                        <td>
                          <input type="text" name="txtdireccion" value="<?=$oobj->gettxdireccion()?>" size="65" maxlength="256" class="txt10Vgris" <?=$readonly?> >
                        </td>
                      </tr>
                    </table>
                  </td>
                </tr>
                <tr>
                  <td bgcolor="#E5ECF9">
                    <table border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td class="txt11V" width="100">Tel&eacute;fono:</td>
                        <td><img src="../html/images/blank.gif" width="5" height="1"></td>
                        <td>
                          <input type="text" name="txtelefono" value="<?=$oobj->getnutelefono()?>" size="20" maxlength="20" class="txt10Vgris" <?=$readonly?> >
                        </td>
                      </tr>
                    </table>
                  </td>
                </tr>
                <tr>
                  <td>
                    <table border="0" cellspacing="0" cellpadding="0" width="200">
                      <tr>
                        <td class="txt11V" width="100">Aplicar IVA:<br>
                          <img src="../html/images/blank.gif" width="105" height="1">
                        </td>
                        <td><img src="../html/images/blank.gif" width="5" height="1"></td>
                        <td>
                          <table border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td>
                                <input type="radio" name="radiva" value="AC" <?if($oobj->getstiva()=='AC' || $oobj->getstiva()=='') { ?>checked <? } ?>class="txt10Vgris">
                              </td>
                              <td><img src="../html/images/blank.gif" width="5" height="1"></td>
                              <td class="notas">Habilitado</td>
                            </tr>
                            <tr>
                              <td colspan="3"><img src="../html/images/blank.gif" width="1" height="7"></td>
                            </tr>
                            <tr>
                              <td>
                                <input type="radio" name="radiva" value="IN" <?if($oobj->getstiva()=='IN') { ?>checked <? } ?>class="txt10Vgris">
                              </td>
                              <td><img src="../html/images/blank.gif" width="5" height="1"></td>
                              <td class="notas">Deshabilitado</td>
                            </tr>
                          </table>
                        </td>
                        <td><img src="../html/images/blank.gif" width="5" height="1"></td>
                        <td class="txt11V" align="right">Estatus:<br>
                          <img src="../html/images/blank.gif" width="75" height="1">
                        </td>
                        <td><img src="../html/images/blank.gif" width="20" height="1"></td>
                        <td>
                          <table border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td>
                                <input type="radio" name="radestatus" value="AC" <?if($oobj->getstcliente()=='AC' || $oobj->getstcliente()=='') { ?>checked <? } ?> class="txt10Vgris">
                              </td>
                              <td><img src="../html/images/blank.gif" width="5" height="1"></td>
                              <td class="notas">Habilitado</td>
                            </tr>
                            <tr>
                              <td colspan="3"><img src="../html/images/blank.gif" width="1" height="7"></td>
                            </tr>
                            <tr>
                              <td>
                                <input type="radio" name="radestatus" value="IN" <?if($oobj->getstcliente()=='IN') { ?>checked <? } ?> class="txt10Vgris">
                              </td>
                              <td><img src="../html/images/blank.gif" width="5" height="1"></td>
                              <td class="notas">Deshabilitado</td>
                            </tr>
                          </table>
                        </td>
                      </tr>
                    </table>
                  </td>
                </tr>
                <tr>
                  <td bgcolor="#E5ECF9">
                    <table border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td class="txt11V" width="100">Porcentaje<br>del IVA:<br>
                          <img src="../html/images/blank.gif" width="145" height="1">
                        </td>
                        <td><img src="../html/images/blank.gif" width="5" height="1"></td>
                        <td>
                          <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td class="txt10Vgris"><img src="../html/images/blank.gif" width="1" height="1"></td>
                              <td><img src="../html/images/blank.gif" width="5" height="1"></td>
                              <td>
                                <input type="text" name="txtpoiva" value="<?=$oobj->getpoiva()?>" size="15" maxlength="5" class="txt10Vgris" <?=$readonly?> >
                              </td>
                              <td><img src="../html/images/blank.gif" width="1" height="1"></td>
                              <td class="txt10Vgris">% </td>
                            </tr>
                            <tr>
                              <td class="txt10Vgris">&nbsp;</td>
                              <td>&nbsp;</td>
                              <td class="txt10Vgris" colspan="3">ejemplo: 10%, 15% &oacute; 16%</td>
                            </tr>
                          </table>
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
                                <p class="notas" align="justify">Es necesario que toda la informaci&oacute;n del cliente sea
                                  confirmada, ya que en caso contrario podria tener repercusiones fiscales.</p>
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
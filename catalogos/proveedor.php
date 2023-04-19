<? 
require_once("../seguridad/header.php");
require_once("../comun/ProveedorBean.php");
require_once("../comun/EstadoBean.php");
require_once("../comun/CriterioBean.php");
require_once("BIZCatalogos.php");

/**
 * Programa: proveedor.php
 * Descripcion:
 *     Script para consultar el catálogo de proveedores y la posibilidad de
 *     dar de alta, modificar, eliminar, agragar contacto, agregar doctos
 * Autor:
 *     HANYGEN Software S.A. de C.V. 
 *     Ruben Murga Tapia
 **/
$obus = new BIZCatalogos();
$hidopcion = $_POST['hidopcion'];
$mensaje = "";
$readonly = "";
$oobj = new ProveedorBean();

$hidopcion = $_POST['hidopcion'];
$hidcdempresa = ($_POST['hidcdempresa']==null)? $_GET['hidcdempresa']: $_POST['hidcdempresa'];
$hidcdproveedor = ($_POST['hidcdproveedor']==null)? $_GET['hidcdproveedor']: $_POST['hidcdproveedor'];
$hidoperacion = ($_POST['hidoperacion']==null)? $_GET['hidoperacion']: $_POST['hidoperacion'];

if($hidoperacion=='consulta') $readonly='readonly';

if($hidoperacion=='modificar' || $hidoperacion=='consulta') { 
  $oobj = $obus->getProveedorBean($hidcdempresa, $hidcdproveedor, $conn);
}

if($hidopcion=="save") {
  $oobj->setcdempresa($hidcdempresa);
  $oobj->setcdproveedor($hidcdproveedor);
  $oobj->setnbproveedor($_POST['txtnombre']);  
  $oobj->setnbrazonsocial($_POST['txtrazonsocial']);
  $oobj->setcdrfc($_POST['txtrfc']);
  $oobj->setcdestado($_POST['cboestado']);
  $oobj->setstproveedor($_POST['optstproveedor']);
  $oobj->setstaplicariva($_POST['optaplicariva']);
  $oobj->setstreteneriva($_POST['optreteneriva']);
  $oobj->setstretenerisr($_POST['optretenerisr']);
  $oobj->settxdireccion($_POST['txtdireccion']);
  $oobj->setpoiva($_POST['txtpoiva']);
  $oobj->setnutelefono($_POST['txtelefono']);
  $oobj->settxcomment($_POST['txtcomment']);

  if(!$obus->saveProveedorBean($oobj, $conn)) {
    $mensaje = "***ERROR AL QUERER AGREGAR/MODIFICAR UN PROVEEDOR EN EL SISTEMA***";  
  } else {
    $mensaje = "! SE HA SALVADO LA INFORMACI&Oacute;N DE UN PROVEEDOR CON EXITO !";  
    if($hidoperacion=='nuevo') $oobj = new ProveedorBean();
  }
  $hidopcion="";
}

$cedos = $obus->getEstadoBeans($conn);

?>
<form name="frmproveedor" method="post" action="">
<input type="hidden" name="hidopcion" value="">
<input type="hidden" name="id" value="<?=$id?>">
<input type="hidden" name="hidcdempresa" value="<?=$hidcdempresa?>">
<input type="hidden" name="hidoperacion" value="<?=$hidoperacion?>">
<input type="hidden" name="hidcdproveedor" value="<?=$oobj->getcdproveedor()?>">
<script language="javascript">
var form = document.frmproveedor;

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
      <td><img src="../html/images/blank.gif" width="15" height="5"></td>
      <td class="titulos01">
        <? if($hidoperacion=='nuevo') { ?>
             nuevo<b>proveedor</b>
        <? } ?>
        <? if($hidoperacion=='modificar') { ?>
             modificaci&oacute;n<b>proveedor</b>
         <? } ?>
        <? if($hidoperacion=='consulta') { ?>
             consulta<b>proveedor</b>
         <? } ?>
      </td>
  </tr>
  <tr>
    <td colspan="2"><img src="../html/images/blank.gif" width="1" height="5"></td>
  </tr>
  <? if($mensaje!='') { ?>
  <tr bgcolor=orange>
    <td><img src="../html/images/blank.gif" width="15" height="5"></td>
    <td class="AvisoHeaderBold"><?=$mensaje?></td>
  </tr>
  <? } ?>
  <tr>
    <td><img src="../html/images/blank.gif" width="15" height="5"></td>
    <td>
      <table border="0" cellspacing="0" cellpadding="0" align="center" width="100">
        <form name="form2" method="post" action="" enctype="multipart/form-data">
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
                          <input type="text" name="txtnombre" size="65" maxlength="150" value="<?=$oobj->getnbproveedor()?>" class="txt10Vgris">
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
                          <input type="text" name="txtrazonsocial" size="65" maxlength="150" value="<?=$oobj->getnbrazonsocial()?>" class="txt10Vgris">
                        </td>
                      </tr>
                    </table>
                  </td>
                </tr>
                <tr>
                  <td bgcolor="#E5ECF9">
                    <table border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td class="txt11V" width="200">RFC:<br>
                          <img src="../html/images/blank.gif" width="105" height="1"></td>
                        <td>
                          <input type="text" name="txtrfc" size="15" maxlength="20" value="<?=$oobj->getcdrfc()?>" class="txt10Vgris">
                        </td>
                        <td><img src="../html/images/blank.gif" width="50" height="1"></td>
                        <td class="txt11V" align="right">Estado:<br>
                          <img src="../html/images/blank.gif" width="100" height="1"></td>
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
                          <input type="text" name="txtdireccion" size="60" maxlength="256" value="<?=$oobj->gettxdireccion()?>" class="txt10Vgris">
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
                          <input type="text" name="txtelefono" size="30" maxlength="20" value="<?=$oobj->getnutelefono()?>" class="txt10Vgris">
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
                          <img src="../html/images/blank.gif" width="145" height="1">
                        </td>
                        <td><img src="../html/images/blank.gif" width="5" height="1"></td>
                        <td>
                          <table border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td>
                                <input type="radio" name="optaplicariva" value="AC" <?if($oobj->getstaplicariva()=='AC' || $oobj->getstaplicariva()=='') { echo "checked"; } ?> class="txt10Vgris">
                              </td>
                              <td><img src="../html/images/blank.gif" width="5" height="1"></td>
                              <td class="notas">Habilitado</td>
                            </tr>
                            <tr>
                              <td colspan="3"><img src="../html/images/blank.gif" width="1" height="7"></td>
                            </tr>
                            <tr>
                              <td>
                                <input type="radio" name="optaplicariva" value="IN" <?if($oobj->getstaplicariva()=='IN') { echo "checked"; } ?> class="txt10Vgris">
                              </td>
                              <td><img src="../html/images/blank.gif" width="5" height="1"></td>
                              <td class="notas">Deshabilitado</td>
                            </tr>
                          </table>
                        </td>
                        <td><img src="../html/images/blank.gif" width="20" height="1"></td>
                        <td class="txt11V" align="right">Estatus:<br>
                          <img src="../html/images/blank.gif" width="100" height="1">
                        </td>
                        <td><img src="../html/images/blank.gif" width="20" height="1"></td>
                        <td>
                          <table border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td>
                                <input type="radio" name="optstproveedor" value="AC" <?if($oobj->getstproveedor()=='AC' || $oobj->getstproveedor()=='') { echo "checked"; } ?> class="txt10Vgris">
                              </td>
                              <td><img src="../html/images/blank.gif" width="5" height="1"></td>
                              <td class="notas">Habilitado</td>
                            </tr>
                            <tr>
                              <td colspan="3"><img src="../html/images/blank.gif" width="1" height="7"></td>
                            </tr>
                            <tr>
                              <td>
                                <input type="radio" name="optstproveedor" value="IN" <?if($oobj->getstproveedor()=='IN') { echo "checked"; } ?> class="txt10Vgris">
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
                    <table border="0" cellspacing="0" cellpadding="0" width="200">
                      <tr>
                        <td class="txt11V" width="100">Retener IVA:<br>
                          <img src="../html/images/blank.gif" width="145" height="1">
                        </td>
                        <td><img src="../html/images/blank.gif" width="5" height="1"></td>
                        <td>
                          <table border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td>
                                <input type="radio" name="optreteneriva" value="AC" <?if($oobj->getstreteneriva()=='AC' || $oobj->getstreteneriva()=='') { echo "checked"; } ?> class="txt10Vgris">
                              </td>
                              <td><img src="../html/images/blank.gif" width="5" height="1"></td>
                              <td class="notas">Habilitado</td>
                            </tr>
                            <tr>
                              <td colspan="3"><img src="../html/images/blank.gif" width="1" height="7"></td>
                            </tr>
                            <tr>
                              <td>
                                <input type="radio" name="optreteneriva" value="IN" <?if($oobj->getstreteneriva()=='IN') { echo "checked"; } ?> class="txt10Vgris">
                              </td>
                              <td><img src="../html/images/blank.gif" width="5" height="1"></td>
                              <td class="notas">Deshabilitado</td>
                            </tr>
                          </table>
                        </td>
                        <td><img src="../html/images/blank.gif" width="20" height="1"></td>
                        <td class="txt11V" align="right">Retener ISR:<br>
                          <img src="../html/images/blank.gif" width="100" height="1">
                        </td>
                        <td><img src="../html/images/blank.gif" width="20" height="1"></td>
                        <td>
                          <table border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td>
                                <input type="radio" name="optretenerisr" value="AC" <?if($oobj->getstretenerisr()=='AC' || $oobj->getstretenerisr()=='') { echo "checked"; } ?> class="txt10Vgris">
                              </td>
                              <td><img src="../html/images/blank.gif" width="5" height="1"></td>
                              <td class="notas">Habilitado</td>
                            </tr>
                            <tr>
                              <td colspan="3"><img src="../html/images/blank.gif" width="1" height="7"></td>
                            </tr>
                            <tr>
                              <td>
                                <input type="radio" name="optretenerisr" value="IN" <?if($oobj->getstretenerisr()=='IN') { echo "checked"; } ?> class="txt10Vgris">
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
                  <td>
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
                                <input type="text" name="txtpoiva" size="15" maxlength="5" value="<?=$oobj->getpoiva()?>" class="txt10Vgris">
                              </td>
                              <td><img src="../html/images/blank.gif" width="5" height="1"></td>
                              <td class="txt10Vgris"> % </td>
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
                <tr>
                  <td bgcolor="#E5ECF9">
                    <table border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td valign="top" class="txt11V" width="100">Comentario:</td>
                        <td><img src="../html/images/blank.gif" width="5" height="1"></td>
                        <td>
                          <textarea name="txtcomment" cols="60" rows="4" class="txt10Vgris"><?=$oobj->gettxcomment()?></textarea>
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
                                <p class="notas" align="justify">Es necesario que toda la informaci&oacute;n del proveedor sea confirmada, ya que en caso contrario podria tener repercusiones fiscales.</p>
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
        </form>
      </table>
    </td>
  </tr>
</table>
<? 
   require_once("../seguridad/footer.php");
?>
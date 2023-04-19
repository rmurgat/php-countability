<? 
require_once("../seguridad/header.php");
require_once("../comun/TpcomproBean.php");
require_once("../comun/PaisBean.php");
require_once("BIZCatalogos.php");

/**
 * Programa: mantpcompro.php
 * Descripcion:
 *   Script para dar mantenimiento al catalogo de tipos de poliza
 * Autor:
 *   HANYGEN Software S.A. de C.V. 
 *   Ruben Murga Tapia
 **/
$obus = new BIZCatalogos();
$oobj = new TpcomproBean();

$mensaje = "";
$hidopcion = $_POST['hidopcion'];

if($hidopcion=="upd") {
  $oobj = $obus->getTpcomproBean($_POST['hidclave'], $conn);
}

if($hidopcion=="add") {
  $oobj->setcdpais($_POST['cbopais']);
  $oobj->setnbtpcomprob($_POST['txtnombre']);
  if(!$obus->addTpcomproBean($oobj, $conn)) {
    $mensaje = "ERROR al querer agregar un nuevo tipo de comprobante";  
  } else {
    $mensaje = "Se ha agregado el tipo de comprobante con exito";  
    $oobj = new TpcomproBean();
  }
  $hidopcion="";
}

if($hidopcion=="update") {
  $oobj = $obus->getTpcomproBean($_POST['hidclave'], $conn);
  $oobj->setcdpais($_POST['cbopais']);
  $oobj->setnbtpcomprob($_POST['txtnombre']);
  $oobj->setsttpcomprob($_POST['chkestatus']);
  if(!$obus->updTpcomproBean($oobj, $conn)) {
    $mensaje = "ERROR al querer actualizar un nuevo tipo de comprobante";  
  } else {
    $mensaje = "Se ha actualizado el tipo de comprobante con exito";  
    $oobj = new TpcomproBean();
  }
  $hidopcion="";
}

if($hidopcion=="del") {
  if(!$obus->delTpcomproBean($_POST['hidclave'], $conn)) {
    $mensaje = "ERROR al querer eliminar un registro";  
  }
  $hidopcion="";
}

$cCatalogo = $obus->getallTpcomproBeans($conn);
$cPaises = $obus->getPaisBeans($conn);
?>
<form name="frmcatalogo" method="post" action="">
<input type="hidden" name="id" value="<?=$id?>">
<input type="hidden" name="hidopcion" value="">
<input type="hidden" name="hidclave" value="<?=$oobj->getcdtpcomprobante()?>">

<script language="javascript">
var form = document.frmcatalogo;

function alta() {
    if(!valida_datos()) return;    
    form.hidopcion.value="add";
    form.submit();
}

function select(clave) {
    form.hidclave.value = clave;
    form.hidopcion.value = "upd";
    form.submit();
}

function cancelar() {
    form.hidopcion.value = "";
    form.submit();
}

function valida_datos() {
    var stxtnombre = delsqlchars(trim(form.txtnombre.value));

    if(stxtnombre == '') {
        alert('Es necesario ingresar un valor al campo NOMBRE !');
        return false;
    }
    form.txtnombre.value = stxtnombre.toUpperCase();
    return true;
}

function eliminar(clave) {
    if(!confirm("Esta seguro de querer eliminar el tipo de comprobante ?")) return;
    form.hidclave.value = clave;
    form.hidopcion.value = "del";
    form.submit();
}

function update() {
    if(!valida_datos()) return;    
    form.hidopcion.value="update";
    form.submit();
}


function delsqlchars(s) {
  var r = "";    /*del char ("), sencillo y doble*/
  if(!s.match("[\",']")) return s;
  for (i=0; i < s.length; i++) {
    c = s.charAt(i);
    if (c == '\"' || c == "'") c = " ";
    r += c;
  }
  return r;
}

function trim(cadena) {
    var micadena = cadena;
    while(micadena.charAt(0)==' ') micadena=micadena.substring(1,micadena.length);
    while(micadena.charAt(micadena.length-1)==' ') micadena=micadena.substring(0,(micadena.length-1));
    return micadena;
}


</script>
<table border="0" width="500" cellspacing="0" cellpadding="0">
  <tr>
    <td rowspan="10"><img src="../html/images/blank.gif" width="15" height="1"></td>
    <td class="titulos01">tipo<b>de</b>comprobante</td>
  </tr>
  <tr>
    <td><img src="../html/images/blank.gif" width="1" height="5"></td>
  </tr>
  <tr>
    <td align="right">
      <table border="0" width="100%" cellspacing="0" cellpadding="0">
        <tr>
          <td><img src="../html/images/iconos/I_paloma.gif" width="15" height="13"></td>
          <td><img src="../html/images/blank.gif" width="5" height="1"></td>
          <td class="notas">= habilitado</td>
          <td><img src="../html/images/blank.gif" width="20" height="1"></td>
          <td><img src="../html/images/iconos/I_tache.gif" width="13" height="13"></td>
          <td><img src="../html/images/blank.gif" width="5" height="1"></td>
          <td class="notas">= inhabilitado</td>
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
                </tr>
                <tr>
                  <td bgcolor="#7E9EDF">
                    <div align="center" class="Tittablas">CLAVE</div>
                  </td>
                  <td bgcolor="#FFFFFF" background="../html/images/tablas/fnd01.gif">&nbsp;</td>
                  <td bgcolor="#7E9EDF">
                    <div align="center" class="Tittablas">DESCRIPCI&Oacute;N</div>
                  </td>
                  <td bgcolor="#FFFFFF" background="../html/images/tablas/fnd01.gif">&nbsp;</td>
                  <td bgcolor="#7E9EDF">
                    <div align="center" class="Tittablas">PAIS</div>
                  </td>
                  <td bgcolor="#FFFFFF" background="../html/images/tablas/fnd01.gif">&nbsp;</td>
                  <td bgcolor="#7E9EDF">
                    <div align="center" class="Tittablas">ESTATUS</div>
                  </td>
                  <td bgcolor="#FFFFFF" background="../html/images/tablas/fnd01.gif">&nbsp;</td>
                  <td bgcolor="#7E9EDF">
                    <div align="center" class="Tittablas">EDITAR</div>
                  </td>
                  <td bgcolor="#FFFFFF" background="../html/images/tablas/fnd01.gif">&nbsp;</td>
                  <td bgcolor="#7E9EDF">
                    <div align="center" class="Tittablas">ELIMINAR&nbsp;**</div>
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
                </tr>
    <?php
      $it = 0;
      foreach($cCatalogo as $orow) {
         $opais = $obus->getPaisBean($orow->getcdpais(), $conn);
         if(!$oobj->hasamekey($orow)) {
     ?>
                <tr>
                  <td <?if($it%2==0) echo "bgcolor='#E5ECF9'"; ?> class="txtV10Gris2" ><?=$orow->getcdtpcomprobante()?></td>
                  <td background="../html/images/tablas/<?=($it%2==0?'fnd02.gif':'fnd03.gif')?>" bgcolor="#CCCCCC">&nbsp;</td>
                  <td <?if($it%2==0) echo "bgcolor='#E5ECF9'"; ?> class="txtV10Gris2"><div align="center"><?=$orow->getnbtpcomprob()?></div>
                  </td>
                  <td background="../html/images/tablas/<?=($it%2==0?'fnd02.gif':'fnd03.gif')?>" bgcolor="#CCCCCC">&nbsp;</td>
                  <td <?if($it%2==0) echo "bgcolor='#E5ECF9'"; ?> class="txtV10Gris2"><div align="center"><?=$opais->getnbpais();?></div></td>
                  <td background="../html/images/tablas/<?=($it%2==0?'fnd02.gif':'fnd03.gif')?>" bgcolor="#CCCCCC">&nbsp;</td>
                  <td <?if($it%2==0) echo "bgcolor='#E5ECF9'"; ?>>
                    <div align="center"><img src="../html/images/iconos/<?=($orow->getsttpcomprob()=="AC"?'I_paloma.gif':'I_tache.gif')?>" width="15" height="13"></div>
                  </td>
                  <td background="../html/images/tablas/<?=($it%2==0?'fnd02.gif':'fnd03.gif')?>" bgcolor="#CCCCCC">&nbsp;</td>
                  <td <?if($it%2==0) echo "bgcolor='#E5ECF9'"; ?> class="txtV10Gris2">
                    <div align="center"><a href="javascript:select('<?=$orow->getcdtpcomprobante()?>')"><img src="../html/images/botones/B_edit.gif" width="18" height="16" border="0"></a></div>
                  </td>
                  <td background="../html/images/tablas/<?=($it%2==0?'fnd02.gif':'fnd03.gif')?>" bgcolor="#CCCCCC">&nbsp;</td>
                  <td <?if($it%2==0) echo "bgcolor='#E5ECF9'"; ?> class="txtV10Gris2">
                    <div align="center">
                            <?if($orow->getsttpcomprob()=="AC") { ?><a href="javascript:eliminar('<?=$orow->getcdtpcomprobante()?>')"><img src="../html/images/botones/B_del.gif" width="18" height="16" border="0"></a><? } else { ?><img src="../html/images/botones/B_del_disabled.gif" width="18" height="16" border="0"><? } ?></div>
                  </td>
                </tr>
     <? $it = $it + 1; 
          } } ?>

               <!--  inicia renglon para agregar un nuevo registro -->
                <tr>
                  <td class="txtV10Gris2"><div align="center"><?=$oobj->getcdtpcomprobante()?></div></td>
                  <td background="../html/images/tablas/fnd03.gif" bgcolor="#CCCCCC">&nbsp;</td>
                  <td class="txtV10Gris2">
                    <div align="center"><input type="text" class="txtV10Gris2" name="txtnombre" size="20" maxlength="256" value="<?=$oobj->getnbtpcomprob()?>"></div>
                  </td>
                  <td background="../html/images/tablas/fnd03.gif" bgcolor="#CCCCCC">&nbsp;</td>
                  <td class="txtV10Gris2"><div align="center"><select name="cbopais" class="txtV10Gris2">
                      <? foreach($cPaises as $orow1) { ?>
                            <option value="<?=$orow1->getcdpais()?>" <?if($oobj->getcdpais()==$orow1->getcdpais()) echo 'selected'; ?>><?=$orow1->getnbpais()?></option>
                      <? } ?>
                  </select></div></td>
                  <td background="../html/images/tablas/fnd03.gif" bgcolor="#CCCCCC">&nbsp;</td>
                  <td>
                    <div align="center"><? if($hidopcion=="upd") { ?><input type="checkbox" name="chkestatus" class="txtV10Gris2" value='AC' <?if($oobj->getsttpcomprob()=="AC") echo 'checked'; ?>><? } ?>&nbsp;</div>
                  </td>
                  <td background="../html/images/tablas/fnd03.gif" bgcolor="#CCCCCC">&nbsp;</td>
                  <td class="txtV10Gris2" colspan="3">
                    <div align="center">
                          <? if($hidopcion=="upd") { ?>
                          <a href="javascript:cancelar();"><img src="../html/images/botones/B_no.gif" height="14" border="0"></a>
                          <a href="javascript:update();"><img src="../html/images/botones/B_salvar.gif" height="14" border="0"></a>
                          <? } else { ?>
                          <a href="javascript:alta();"><img src="../html/images/botones/B_agregar.gif" height="14" border="0"></a>
                           <? } ?>
                    </div>
                  </td>
                </tr>
               <!--  termina renglon para agregar un nuevo registro -->

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
  <tr>
    <td>&nbsp;</td>
    <td class="notas">
      <table border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td class="notas" valign="top">**</td>
          <td class="notas">Con esta opci&oacute;n usted podr&aacute; eliminar logicamente<br>
             un registro para que no pueda ser utilizado en el sistema.</td>
        </tr>
      </table>
    </td>
  </tr>
</table>
</form>
<?
require_once("../seguridad/footer.php");
?>
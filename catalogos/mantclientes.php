<? 
require_once("../seguridad/header.php");
require_once("../comun/ClienteBean.php");
require_once("../comun/EstadoBean.php");
require_once("../comun/CriterioBean.php");
require_once("BIZCatalogos.php");

/**
 * Programa: mantclientes.php
 * Descripcion:
 *     Script con la opcion de dar de alta un nuevo cliente
 * Autor:
 *     HANYGEN Software S.A. de C.V. 
 *     Ruben Murga Tapia
 **/
$obus = new BIZCatalogos();
$ocrit  = new CriterioBean();
$hidopcion = $_POST['hidopcion'];
$mensaje = "";

$hidcdempresa = $osession->getcdempresa();

if($hidopcion=='del') {
  if(!$obus->delClienteBean($hidcdempresa, $_POST['hidcdcliente'], $conn)) {
    $mensaje = "***ERROR AL QUERER ELIMINAR UN CLIENTE DEL SISTEMA***";  
  } else {
    $mensaje = "! SE HA ELIMINADO UN CLIENTE CON EXITO !";  
  }
}

$ocrit->setcdempresa($hidcdempresa);
$cctes = $obus->getClienteBeans($ocrit, $conn);

?>
<form name="frmcliente" method="post" action="">
<input type="hidden" name="hidopcion" value="">
<input type="hidden" name="id" value="<?=$id?>">
<input type="hidden" name="hidcdempresa" value="<?=$hidcdempresa?>">
<input type="hidden" name="hidcdcliente" value="">
<input type="hidden" name="hidoperacion" value="">
<script language="javascript">
var form = document.frmcliente;

function nuevo() {
    form.hidoperacion.value = "nuevo";
    form.action = "cliente.php";
    form.submit();
}

function select(clave) {
    form.hidcdcliente.value = clave;
    form.hidoperacion.value = "consulta";
    form.action = "cliente.php";
    form.submit();
}

function eliminar(clave) {
    if(!confirm("Esta seguro de querer eliminar el cliente?")) return;
    form.hidcdcliente.value = clave;
    form.hidopcion.value = "del";
    form.submit();
}

function modificar(clave) {
    form.hidcdcliente.value = clave;
    form.hidoperacion.value = "modificar";
    form.action = "cliente.php";
    form.submit();
}

</script>
<table width="600" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>
      <table border="0" cellspacing="0" cellpadding="0" width="100%">
        <tr>
          <td width="300" class="titulos01"><b>clientes</b>de<b>la</b>empresa</b></td>
          <td align="right"> <span class="notas">Haz click sobre el n&uacute;mero
            de cliente para ver el detalle</span></td>
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
                        <td class="cifras">Buscar Cliente por RFC:</td>
                        <td><img src="../html/images/blank.gif" width="3" height="1"></td>
                        <td>
                          <input type="text" name="txtrfc" size="20" maxlength="20" class="txt10Vgris">
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
                </tr>

                <tr>
                  <td bgcolor="#7E9EDF" >
                    <div align="center" class="Tittablas"># CLIENTE</div>
                  </td>
                  <td background="../html/images/tablas/fnd07.gif">&nbsp;</td>
                  <td bgcolor="#7E9EDF" >
                    <div align="center" class="Tittablas">RFC</div>
                  </td>
                  <td background="../html/images/tablas/fnd07.gif">&nbsp;</td>
                  <td bgcolor="#7E9EDF" >
                    <div align="center" class="Tittablas">NOMBRE<br>
                      DEL CLIENTE</div>
                  </td>
                  <td background="../html/images/tablas/fnd07.gif">&nbsp;</td>
                  <td bgcolor="#7E9EDF" >
                    <div align="center" class="Tittablas">NUMERO DE<br>
                      TEL&Eacute;FONO</div>
                  </td>
                  <td background="../html/images/tablas/fnd07.gif">&nbsp;</td>
                  <td bgcolor="#7E9EDF" >
                    <div align="center" class="Tittablas">ESTATUS</div>
                  </td>
                  <td background="../html/images/tablas/fnd07.gif">&nbsp;</td>
                  <td bgcolor="#7E9EDF" >
                    <div align="center" class="Tittablas">CONTACTOS</div>
                  </td>
                  <td background="../html/images/tablas/fnd07.gif">&nbsp;</td>
                  <td bgcolor="#7E9EDF" >
                    <div align="center" class="Tittablas">DOCUMENTOS</div>
                  </td>
                  <td background="../html/images/tablas/fnd07.gif">&nbsp;</td>
                  <td bgcolor="#7E9EDF" >
                    <div align="center" class="Tittablas">OPERACIONES</div>
                  </td>
                </tr>
    <?php
      $it = 0;
      foreach($cctes as $orow) {
    ?>
      <!-- inicia detalle #1-->
                <tr <?if($it%2==0) echo "bgcolor='#EEEEEE'"; ?>>
                  <td><a href="javascript:select('<?=$orow->getcdcliente()?>');" class="linktabla"><?=$orow->getcdcliente()?></a></td>
                  <td background="../html/images/tablas/fnd_cuenta_01.gif">&nbsp;</td>
                  <td class="txttabla" valign="bottom">
                    <div align="center"><?=$orow->getcdrfc()?></div>
                  </td>
                  <td background="../html/images/tablas/fnd_cuenta_01.gif" valign="bottom">&nbsp;</td>
                  <td class="txttabla" valign="bottom">
                    <div align="center"><?=$orow->getnbcliente()?></div>
                  </td>
                  <td background="../html/images/tablas/fnd_cuenta_01.gif" valign="bottom">&nbsp;</td>
                  <td class="txttabla" valign="bottom">
                    <div align="center"><?=$orow->getnutelefono()?></div>
                  </td>
                  <td background="../html/images/tablas/fnd_cuenta_01.gif" valign="bottom">&nbsp;</td>
                  <td class="txttabla" valign="bottom">
                    <div align="center"><img src="../html/images/iconos/<? if($orow->getstcliente()=='AC') {?>I_fact_pag.gif<? } else { ?>I_tache.gif<? } ?>" width="13" height="13"></div>
                  </td>
                  <td background="../html/images/tablas/fnd_cuenta_01.gif" valign="bottom">&nbsp;</td>
                  <td class="txttabla" valign="bottom">
                    <div align="center"><img src="../html/images/iconos/I_people.gif" width="13" height="13" alt="personas que son contactos en el cliente"></div>
                  </td>
                  <td background="../html/images/tablas/fnd_cuenta_01.gif" valign="bottom">&nbsp;</td>
                  <td class="txttabla" valign="bottom">
                    <div align="center"><img src="../html/images/iconos/I_doctos.gif" width="13" height="13" alt="documentos oficiales adjuntos de un cliente en particular"></div>
                  </td>
                  <td background="../html/images/tablas/fnd_cuenta_01.gif" valign="bottom">&nbsp;</td>
                  <td class="txttabla" valign="bottom">
                    <div align="center">
                           <a href="javascript:modificar('<?=$orow->getcdcliente()?>');"><img src="../html/images/botones/B_edit.gif" width="18" height="16" alt="Edici&oacute;n de informaci&oacute;n de un cliente" border="0"></a>
                           <a href="javascript:eliminar('<?=$orow->getcdcliente()?>')"><img src="../html/images/botones/B_del.gif" width="18" height="16" alt="Eliminaci&oacute;n de un cliente" border="0"></a>
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
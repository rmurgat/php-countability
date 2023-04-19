<?php 
require_once("../comun/PerfilBean.php");
require_once("../comun/UsuarioBean.php");
require_once("../comun/SessionBean.php");
require_once("../comun/UsuarioEmpresaBean.php");
require_once("../comun/EmpresaBean.php");
require_once("../util/DBConnect.php"); 
require_once("BIZSeguridad.php");

?>
<html>
<head>
<title>Seleccion de la contabilidad </title>
</head>
<body bgcolor="#FFFFFF" text="#000000">
<link rel="stylesheet" href="../html/css/template1.css" type="text/css">
<link rel="stylesheet" href="../html/css/estilosNS.css" type="text/css">
<link rel="stylesheet" href="../html/css/estilosIE.css" type="text/css">
<form name="frmperfil" method="post">

<?php 
/**
 * Programa: select.php
 * Descripcion:
 *   Script para seleccionar la contabilidad 
 * Autor:
 *   RUBEN MURGA TAPIA
 *   HANYGEN Software S.A. de C.V.
 **/
$odb = new DBConnect();
$odb->connect();
$conn = $odb->getconexion();
$obus = new BIZSeguridad();

if($_POST['hidopcion']=='start') {  
   $osession = new SessionBean();
   $osession->setcdempresa($_POST['hidempresa']);
   $osession->setcdusuario($_POST['hidusuario']);
   $osession->setcdperfil($_POST['hidperfil']);
   $obus->addSessionBean($osession, $conn);
?>

<input type="hidden" name="id" value="<?=$osession->getcdsession()?>">
<script languaje="javascript">
  var form = document.frmperfil;
  form.action = 'menu.php';
  form.submit();
</script>
<?
} else {
  $oUsuario = $obus->getUsuarioBeanLogin($_POST['txtUsuario'], $_POST['txtPassword'], $conn);
  if($oUsuario==null) { 
        echo "NO ESTA REGISTRADO EL USUARIO EN EL SISTEMA";
  } else {

?>
<input type="hidden" name="hidopcion" value="">
<input type="hidden" name="hidempresa" value="">
<input type="hidden" name="hidperfil" value="">
<input type="hidden" name="hidusuario" value="">
<script languaje="javascript">
var form = document.frmperfil;

function goempresa(empresa, perfil, usuario) {
  form.hidopcion.value='start';
  form.hidempresa.value = empresa;
  form.hidperfil.value = perfil;
  form.hidusuario.value = usuario;
  form.submit();
}

</script>
<img src="../html/images/header/logo_hanyquak.gif" width="168" height="92">
<center>
<table cellspacing="0" cellpadding="0" width="100%" border="0">
    <tbody>
        <tr>
            <td width="20" rowspan="6"><img alt src="../html/imagenes/spacer.gif" border="0" width="1" height="1"></td>
            <td colspan="2" height="15"><img alt src="../html/imagenes/spacer.gif" border="0" width="1" height="1"></td>
        </tr>
        <tr bgcolor="#335BE4">
            <td colspan="2" height="1"><img alt src="../html/imagenes/spacer.gif" border="0" width="1" height="1"></td>
        </tr>
        <tr bgcolor="#335BE4">
            <td colspan="2" height="17"></td>
        </tr>
        <tr bgcolor="#335BE4">
            <td colspan="2" height="1"><img alt src="../imagenes/spacer.gif" border="0" width="1" height="1"></td>
        </tr>
        <tr bgcolor="#00008O">
            <td colspan="2" height="1"><img alt src="../html/imagenes/spacer.gif" border="0" width="1" height="1"></td>
        </tr>
    </tbody>
</table>
<table cellspacing="0" cellpadding="0" width="750" border="0">
<tr>
     <td>&nbsp;</td>       
</tr>
<tr>
     <td>
         <table border="0" cellspacing="0" cellpadding="0" width="100%">
               <tr>
                   <td bgcolor="#7E9EDF" colspan="5"><div align="center" class="Tittablas"><b>RAZONES SOCIALES REGISTRADAS PARA <?=$oUsuario->getnbusuario()?></b></div></td>
               </tr>
               <tr>
                   <td height="30" align="center" bgcolor="#7E9EDF"><div align="center" class="Tittablas">Razon Social</div></td>
                   <td height="30" align="center" bgcolor="#7E9EDF"><div align="center" class="Tittablas">Mi Perfil</div></td>
                   <td height="30" align="center" bgcolor="#7E9EDF">&nbsp;</td>
              </tr>
             <?php
                $it = 0;
                $cemps = $obus->getUsuarioEmpresaBeans($oUsuario->getcdusuario(), $conn);
                foreach($cemps as $orow) {
                    $oper = $obus->getPerfilBean($orow->getcdempresa(), $orow->getcdperfil(), $conn);
                    $oemp = $obus->getEmpresaBean($orow->getcdempresa(), $conn);
             ?>
              <tr bgcolor="<?=($it%2==0?'#EEEEEE':'#AEBEDD')?>">
		   <td height="30" align="center" class="txttabla" nowrap><div align="center"><?=$oemp->getnbempresa()?></div></td>
		   <td height="30" align="center" class="txttabla"  nowrap><div align="center"><?=$oper->getnbperfil()?></div></td>
		  <td  height="30" align="center" class="txttabla"  nowrap><a href="javascript:goempresa('<?=$orow->getcdempresa()?>','<?=$orow->getcdperfil()?>','<?=$oUsuario->getcdusuario()?>');"><img src="../html/images/botones/btn_ir.gif" border="0" alt="Ingresar a esa contabilidad y  perfil"></a></td>
		</tr>
                <? $it++; } ?>
          </table>
     </td>       
</tr>
</table>

<?
   }}
   $odb->close_mysql();
?>
</form>
</body>
</html>
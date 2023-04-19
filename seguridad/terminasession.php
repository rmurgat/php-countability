<html>
<head>
<link rel="stylesheet" href="../html/css/estilosNS.css" type="text/css">
<link rel="stylesheet" href="../html/css/estilosIE.css" type="text/css">
</head>
<body>
<table border='0'>
  <tr>
    <td rowspan="10"><img src="../html/images/blank.gif" width="15" height="1"></td>
    <td class="titulos01">terminando<b>sesion</b>del<b>usuario</b></td>
  </tr>
</table>
<?php 
require_once("../util/DBConnect.php"); 
require_once("BIZSeguridad.php");
/**
 * Programa: header.php
 * Descripcion:
 *   Script con el header de la contabilidad
 * Autor:
 *   RUBEN MURGA TAPIA
 *   HANYGEN Software S.A. de C.V.
 **/
$odb = new DBConnect();
$odb->connect();
$conn = $odb->getconexion();
$obus = new BIZSeguridad();
$id = ($_POST['id']==null)? $_GET['id']: $_POST['id'];
$obus->terminasesion($id, $conn);
$odb->close_mysql();
?>
<script language="javascript">
  window.location.href = 'http://www.hanygen.com/sys/contabilidad/login.html';
</script>
</body>
</html>

<?php 
require_once("../comun/UsuarioBean.php");
require_once("../comun/SessionBean.php");
require_once("../comun/EmpresaBean.php");
require_once("../comun/PerfilBean.php");
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
$toprint = ($_POST['hidtoprint']==null)? $_GET['hidtoprint']: $_POST['hidtoprint'];

$osession = $obus->getSessionBean($id, $conn);
if($osession==null) header("Location: https://www.hanygen.com/sys/contabilidad/login.html"); 
$ousuario = $obus->getUsuarioBean($osession->getcdusuario(), $conn);
$oempresa = $obus->getEmpresaBean($osession->getcdempresa(), $conn);
?>

<html>
<head>
<title>CONTABILIDAD</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" href="../html/css/estilosIE.css" type="text/css">
<link rel="stylesheet" href="../html/css/template1.css" type="text/css">
<link rel="stylesheet" href="../html/css/estilosNS.css" type="text/css">
<link rel="stylesheet" href="../html/css/estilosIE.css" type="text/css">

<? if($toprint=="1") { ?>
<body bgcolor="#FFFFFF" text="#000000" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<table width="780" border="0" cellspacing="0" cellpadding="0">
<tr>
<td>
    <!--  aqui inicia el area de trabajo -->

<? } if($toprint=="") { ?>

<script language="JavaScript">
<!--
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_findObj(n, d) { //v4.0
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && document.getElementById) x=document.getElementById(n); return x;
}

function MM_nbGroup(event, grpName) { //v3.0
  var i,img,nbArr,args=MM_nbGroup.arguments;
  if (event == "init" && args.length > 2) {
    if ((img = MM_findObj(args[2])) != null && !img.MM_init) {
      img.MM_init = true; img.MM_up = args[3]; img.MM_dn = img.src;
      if ((nbArr = document[grpName]) == null) nbArr = document[grpName] = new Array();
      nbArr[nbArr.length] = img;
      for (i=4; i < args.length-1; i+=2) if ((img = MM_findObj(args[i])) != null) {
        if (!img.MM_up) img.MM_up = img.src;
        img.src = img.MM_dn = args[i+1];
        nbArr[nbArr.length] = img;
    } }
  } else if (event == "over") {
    document.MM_nbOver = nbArr = new Array();
    for (i=1; i < args.length-1; i+=3) if ((img = MM_findObj(args[i])) != null) {
      if (!img.MM_up) img.MM_up = img.src;
      img.src = (img.MM_dn && args[i+2]) ? args[i+2] : args[i+1];
      nbArr[nbArr.length] = img;
    }
  } else if (event == "out" ) {
    for (i=0; i < document.MM_nbOver.length; i++) {
      img = document.MM_nbOver[i]; img.src = (img.MM_dn) ? img.MM_dn : img.MM_up; }
  } else if (event == "down") {
    if ((nbArr = document[grpName]) != null)
      for (i=0; i < nbArr.length; i++) { img=nbArr[i]; img.src = img.MM_up; img.MM_dn = 0; }
    document[grpName] = nbArr = new Array();
    for (i=2; i < args.length-1; i+=2) if ((img = MM_findObj(args[i])) != null) {
      if (!img.MM_up) img.MM_up = img.src;
      img.src = img.MM_dn = args[i+1];
      nbArr[nbArr.length] = img;
  } }
}
//-->
</script>
<script language="JavaScript">
<!--
<!--
function MM_reloadPage(init) {  //reloads the window if Nav4 resized
  if (init==true) with (navigator) {if ((appName=="Netscape")&&(parseInt(appVersion)==4)) {
    document.MM_pgW=innerWidth; document.MM_pgH=innerHeight; onresize=MM_reloadPage; }}
  else if (innerWidth!=document.MM_pgW || innerHeight!=document.MM_pgH) location.reload();
}
MM_reloadPage(true);
// -->

function MM_showHideLayers() { //v3.0
  var i,p,v,obj,args=MM_showHideLayers.arguments;
  for (i=0; i<(args.length-2); i+=3) if ((obj=MM_findObj(args[i]))!=null) { v=args[i+2];
    if (obj.style) { obj=obj.style; v=(v=='show')?'visible':(v='hide')?'hidden':v; }
    obj.visibility=v; }
}

function MM_timelineStop(tmLnName) { //v1.2
  //Copyright 1997 Macromedia, Inc. All rights reserved.
  if (document.MM_Time == null) MM_initTimelines(); //if *very* 1st time
  if (tmLnName == null)  //stop all
    for (var i=0; i<document.MM_Time.length; i++) document.MM_Time[i].ID = null;
  else document.MM_Time[tmLnName].ID = null; //stop one
}

function MM_timelineGoto(tmLnName, fNew, numGotos) { //v2.0
  //Copyright 1997 Macromedia, Inc. All rights reserved.
  var i,j,tmLn,props,keyFrm,sprite,numKeyFr,firstKeyFr,lastKeyFr,propNum,theObj;
  if (document.MM_Time == null) MM_initTimelines(); //if *very* 1st time
  tmLn = document.MM_Time[tmLnName];
  if (numGotos != null)
    if (tmLn.gotoCount == null) tmLn.gotoCount = 1;
    else if (tmLn.gotoCount++ >= numGotos) {tmLn.gotoCount=0; return}
  jmpFwd = (fNew > tmLn.curFrame);
  for (i = 0; i < tmLn.length; i++) {
    sprite = (jmpFwd)? tmLn[i] : tmLn[(tmLn.length-1)-i]; //count bkwds if jumping back
    if (sprite.charAt(0) == "s") {
      numKeyFr = sprite.keyFrames.length;
      firstKeyFr = sprite.keyFrames[0];
      lastKeyFr = sprite.keyFrames[numKeyFr - 1];
      if ((jmpFwd && fNew<firstKeyFr) || (!jmpFwd && lastKeyFr<fNew)) continue; //skip if untouchd
      for (keyFrm=1; keyFrm<numKeyFr && fNew>=sprite.keyFrames[keyFrm]; keyFrm++);
      for (j=0; j<sprite.values.length; j++) {
        props = sprite.values[j];
        if (numKeyFr == props.length) propNum = keyFrm-1 //keyframes only
        else propNum = Math.min(Math.max(0,fNew-firstKeyFr),props.length-1); //or keep in legal range
        if (sprite.obj != null) {
          if (props.prop2 == null) sprite.obj[props.prop] = props[propNum];
          else        sprite.obj[props.prop2][props.prop] = props[propNum];
      } }
    } else if (sprite.charAt(0)=='b' && fNew == sprite.frame) eval(sprite.value);
  }
  tmLn.curFrame = fNew;
  if (tmLn.ID == 0) eval('MM_timelinePlay(tmLnName)');
}

function MM_timelinePlay(tmLnName, myID) { //v1.2
  //Copyright 1997 Macromedia, Inc. All rights reserved.
  var i,j,tmLn,props,keyFrm,sprite,numKeyFr,firstKeyFr,propNum,theObj,firstTime=false;
  if (document.MM_Time == null) MM_initTimelines(); //if *very* 1st time
  tmLn = document.MM_Time[tmLnName];
  if (myID == null) { myID = ++tmLn.ID; firstTime=true;}//if new call, incr ID
  if (myID == tmLn.ID) { //if Im newest
    setTimeout('MM_timelinePlay("'+tmLnName+'",'+myID+')',tmLn.delay);
    fNew = ++tmLn.curFrame;
    for (i=0; i<tmLn.length; i++) {
      sprite = tmLn[i];
      if (sprite.charAt(0) == 's') {
        if (sprite.obj) {
          numKeyFr = sprite.keyFrames.length; firstKeyFr = sprite.keyFrames[0];
          if (fNew >= firstKeyFr && fNew <= sprite.keyFrames[numKeyFr-1]) {//in range
            keyFrm=1;
            for (j=0; j<sprite.values.length; j++) {
              props = sprite.values[j];
              if (numKeyFr != props.length) {
                if (props.prop2 == null) sprite.obj[props.prop] = props[fNew-firstKeyFr];
                else        sprite.obj[props.prop2][props.prop] = props[fNew-firstKeyFr];
              } else {
                while (keyFrm<numKeyFr && fNew>=sprite.keyFrames[keyFrm]) keyFrm++;
                if (firstTime || fNew==sprite.keyFrames[keyFrm-1]) {
                  if (props.prop2 == null) sprite.obj[props.prop] = props[keyFrm-1];
                  else        sprite.obj[props.prop2][props.prop] = props[keyFrm-1];
        } } } } }
      } else if (sprite.charAt(0)=='b' && fNew == sprite.frame) eval(sprite.value);
      if (fNew > tmLn.lastFrame) tmLn.ID = 0;
  } }
}

function MM_initTimelines() { //v4.0
    //MM_initTimelines() Copyright 1997 Macromedia, Inc. All rights reserved.
    var ns = navigator.appName == "Netscape";
    var ns4 = (ns && parseInt(navigator.appVersion) == 4);
    var ns5 = (ns && parseInt(navigator.appVersion) > 4);
    document.MM_Time = new Array(5);
    
    document.MM_Time[0] = new Array(1);
    document.MM_Time["TMmispedidos"] = document.MM_Time[0];
    document.MM_Time[0].MM_Name = "TMmispedidos";
    document.MM_Time[0].fps = 15;
    document.MM_Time[0][0] = new String("behavior");
    document.MM_Time[0][0].frame = 10;
    document.MM_Time[0][0].value = "MM_showHideLayers('subpedidos','','hide')";
    document.MM_Time[0].lastFrame = 10;
    
    document.MM_Time[1] = new Array(1);
    document.MM_Time["TMmicuenta"] = document.MM_Time[1];
    document.MM_Time[1].MM_Name = "TMmicuenta";
    document.MM_Time[1].fps = 15;
    document.MM_Time[1][0] = new String("behavior");
    document.MM_Time[1][0].frame = 10;
    document.MM_Time[1][0].value = "MM_showHideLayers('submicuenta','','hide')";
    document.MM_Time[1].lastFrame = 10;
    
    document.MM_Time[2] = new Array(1);
    document.MM_Time["TMminegocio"] = document.MM_Time[2];
    document.MM_Time[2].MM_Name = "TMminegocio";
    document.MM_Time[2].fps = 15;
    document.MM_Time[2][0] = new String("behavior");
    document.MM_Time[2][0].frame = 10;
    document.MM_Time[2][0].value = "MM_showHideLayers('subminegocio','','hide')";
    document.MM_Time[2].lastFrame = 10;
    
    document.MM_Time[3] = new Array(1);
    document.MM_Time["TMsucursales"] = document.MM_Time[3];
    document.MM_Time[3].MM_Name = "TMsucursales";
    document.MM_Time[3].fps = 15;
    document.MM_Time[3][0] = new String("behavior");
    document.MM_Time[3][0].frame = 10;
    document.MM_Time[3][0].value = "MM_showHideLayers('submissucursales','','hide')";
    document.MM_Time[3].lastFrame = 10;
    
    document.MM_Time[4] = new Array(1);
    document.MM_Time["TMadministracion"] = document.MM_Time[4];
    document.MM_Time[4].MM_Name = "TMadministracion";
    document.MM_Time[4].fps = 15;
    document.MM_Time[4][0] = new String("behavior");
    document.MM_Time[4][0].frame = 10;
    document.MM_Time[4][0].value = "MM_showHideLayers('subadministracion','','hide')";
    document.MM_Time[4].lastFrame = 10;
    
    document.MM_Time[5] = new Array(1);
    document.MM_Time["TMseguridad"] = document.MM_Time[5];
    document.MM_Time[5].MM_Name = "TMseguridad";
    document.MM_Time[5].fps = 15;
    document.MM_Time[5][0] = new String("behavior");
    document.MM_Time[5][0].frame = 10;
    document.MM_Time[5][0].value = "MM_showHideLayers('subseguridad','','hide')";
    document.MM_Time[5].lastFrame = 10;
    
    for (i=0; i<document.MM_Time.length; i++) {
        document.MM_Time[i].ID = null;
        document.MM_Time[i].curFrame = 0;
        document.MM_Time[i].delay = 1000/document.MM_Time[i].fps;
    }
}
//-->
</script>
</head>

<body bgcolor="#FFFFFF" text="#000000" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" onLoad="MM_preloadImages('../html/images/navbar/icon_inicio.gif','../html/images/navbar/t_icon_inicio.gif','../html/images/navbar/icon_mail.gif','../html/images/navbar/t_icon_mail.gif','../html/images/navbar/icon_salir.gif','../html/images/navbar/t_icon_salir.gif')" background="../html/images/bckgrnd_01.gif">

<!--- LAYERS DE SUBMENUS -->
<div id="subcatalogos" style="position:absolute; left:145px; top:122px; width:53px; height:31px; z-index:1; visibility: hidden">
  <table width="138" border="0" cellspacing="0" cellpadding="0" bgcolor="#7E9EDF">
    <tr>
      <td colspan="3" bgcolor="#8494C6" align="right"><img src="../html/images/navbar/top_submenu.gif" width="10" height="1"></td>
    </tr>
    <tr>
      <td><img src="../html/images/navbar/fnd_submenu_01.gif" width="10" height="22"></td>
      <td><a href="../catalogos/mantpcuenta.php?id=<?=$id?>" class="submenus" onMouseOver="MM_timelineStop('TMmispedidos');MM_timelineGoto('TMmispedidos','1')" onMouseOut="MM_timelinePlay('TMmispedidos')">Tipo de Cuenta</a></td>
      <td align="right"><img src="../html/images/navbar/right_submenu.gif" width="10" height="22"></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td><img src="../html/images/navbar/fnd_submenu_02.gif" width="10" height="1"></td>
      <td><img src="../html/images/blank.gif" width="1" height="1"></td>
      <td align="right"><img src="../html/images/navbar/fnd_submenu_02bis.gif" width="10" height="1"></td>
    </tr>
    <tr>
      <td><img src="../html/images/navbar/fnd_submenu_01.gif" width="10" height="23"></td>
      <td><a href="../catalogos/mantpoliza.php?id=<?=$id?>" class="submenus" onMouseOver="MM_timelineStop('TMmispedidos');MM_timelineGoto('TMmispedidos','1')" onMouseOut="MM_timelinePlay('TMmispedidos')">Tipo de Poliza</a></td>
      <td align="right"><img src="../html/images/navbar/fnd_submenu_01bis.gif" width="10" height="22"></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td><img src="../html/images/navbar/fnd_submenu_02.gif" width="10" height="1"></td>
      <td><img src="../html/images/blank.gif" width="1" height="1"></td>
      <td align="right"><img src="../html/images/navbar/fnd_submenu_02bis.gif" width="10" height="1"></td>
    </tr>
    <tr>
      <td><img src="../html/images/navbar/fnd_submenu_01.gif" width="10" height="23"></td>
      <td><a href="../catalogos/mantpago.php?id=<?=$id?>" class="submenus" onMouseOver="MM_timelineStop('TMmispedidos');MM_timelineGoto('TMmispedidos','1')" onMouseOut="MM_timelinePlay('TMmispedidos')">Tipo de Pago</a></td>
      <td align="right"><img src="../html/images/navbar/fnd_submenu_01bis.gif" width="10" height="22"></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td><img src="../html/images/navbar/fnd_submenu_02.gif" width="10" height="1"></td>
      <td><img src="../html/images/blank.gif" width="1" height="1"></td>
      <td align="right"><img src="../html/images/navbar/fnd_submenu_02bis.gif" width="10" height="1"></td>
    </tr>
    <tr>
      <td><img src="../html/images/navbar/fnd_submenu_01.gif" width="10" height="23"></td>
      <td><a href="../catalogos/mantconcepto.php?id=<?=$id?>" class="submenus" onMouseOver="MM_timelineStop('TMmispedidos');MM_timelineGoto('TMmispedidos','1')" onMouseOut="MM_timelinePlay('TMmispedidos')">Concepto</a></td>
      <td align="right"><img src="../html/images/navbar/fnd_submenu_01bis.gif" width="10" height="22"></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td><img src="../html/images/navbar/fnd_submenu_02.gif" width="10" height="1"></td>
      <td><img src="../html/images/blank.gif" width="1" height="1"></td>
      <td align="right"><img src="../html/images/navbar/fnd_submenu_02bis.gif" width="10" height="1"></td>
    </tr>
    <tr>
      <td><img src="../html/images/navbar/fnd_submenu_01.gif" width="10" height="23"></td>
      <td><a href="../catalogos/mantpcompro.php?id=<?=$id?>" class="submenus" onMouseOver="MM_timelineStop('TMmispedidos');MM_timelineGoto('TMmispedidos','1')" onMouseOut="MM_timelinePlay('TMmispedidos')">Tipo de Comprobante</a></td>
      <td align="right"><img src="../html/images/navbar/fnd_submenu_01bis.gif" width="10" height="22"></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td><img src="../html/images/navbar/fnd_submenu_02.gif" width="10" height="1"></td>
      <td><img src="../html/images/blank.gif" width="1" height="1"></td>
      <td align="right"><img src="../html/images/navbar/fnd_submenu_02bis.gif" width="10" height="1"></td>
    </tr>
    <tr>
      <td><img src="../html/images/navbar/fnd_submenu_01.gif" width="10" height="23"></td>
      <td><a href="#" class="submenus" onMouseOver="MM_timelineStop('TMmispedidos');MM_timelineGoto('TMmispedidos','1')" onMouseOut="MM_timelinePlay('TMmispedidos')">Estados</a></td>
      <td align="right"><img src="../html/images/navbar/fnd_submenu_01bis.gif" width="10" height="22"></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td><img src="../html/images/navbar/fnd_submenu_02.gif" width="10" height="1"></td>
      <td><img src="../html/images/blank.gif" width="1" height="1"></td>
      <td align="right"><img src="../html/images/navbar/fnd_submenu_02bis.gif" width="10" height="1"></td>
    </tr>
    <tr>
      <td><img src="../html/images/navbar/fnd_submenu_01.gif" width="10" height="23"></td>
      <td><a href="../catalogos/mantclientes.php?id=<?=$id?>" class="submenus" onMouseOver="MM_timelineStop('TMmispedidos');MM_timelineGoto('TMmispedidos','1')" onMouseOut="MM_timelinePlay('TMmispedidos')">Clientes</a></td>
      <td align="right"><img src="../html/images/navbar/fnd_submenu_01bis.gif" width="10" height="22"></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td><img src="../html/images/navbar/fnd_submenu_02.gif" width="10" height="1"></td>
      <td><img src="../html/images/blank.gif" width="1" height="1"></td>
      <td align="right"><img src="../html/images/navbar/fnd_submenu_02bis.gif" width="10" height="1"></td>
    </tr>
    <tr>
      <td><img src="../html/images/navbar/fnd_submenu_01.gif" width="10" height="23"></td>
      <td><a href="../catalogos/mantproveedor.php?id=<?=$id?>" class="submenus" onMouseOver="MM_timelineStop('TMmispedidos');MM_timelineGoto('TMmispedidos','1')" onMouseOut="MM_timelinePlay('TMmispedidos')">Proveedores</a></td>
      <td align="right"><img src="../html/images/navbar/fnd_submenu_01bis.gif" width="10" height="22"></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td><img src="../html/images/navbar/fnd_submenu_02.gif" width="10" height="1"></td>
      <td><img src="../html/images/blank.gif" width="1" height="1"></td>
      <td align="right"><img src="../html/images/navbar/fnd_submenu_02bis.gif" width="10" height="1"></td>
    </tr>
    <tr>
      <td><img src="../html/images/navbar/left_submenu.gif" width="10" height="22"></td>
      <td><a href="../catalogos/mantcuentas.php?id=<?=$id?>" class="submenus" onMouseOver="MM_timelineStop('TMmispedidos');MM_timelineGoto('TMmispedidos','1')" onMouseOut="MM_timelinePlay('TMmispedidos')">Cuentas Contables</a></td>
      <td align="right"><img src="../html/images/navbar/fnd_submenu_01bis.gif" width="10" height="22"></td>
    </tr>
    <tr>
      <td colspan="3" bgcolor="#8494C6"><img src="../html/images/navbar/bott_submenu.gif" width="10" height="1"></td>
    </tr>
  </table>
</div>
<div id="submicuenta" style="position:absolute; left:145px; top:146px; width:19px; height:13px; z-index:2; visibility: hidden">
  <table width="169" border="0" cellspacing="0" cellpadding="0" bgcolor="#7E9EDF">
    <tr>
      <td colspan="3" bgcolor="#8494C6" align="right"><img src="../html/images/navbar/top_submenu.gif" width="10" height="1"></td>
    </tr>
    <tr>
      <td><img src="../html/images/navbar/fnd_submenu_01.gif" width="10" height="22"></td>
      <td><a href="../general/mantpolizas.php?id=<?=$id?>" class="submenus" onMouseOver="MM_timelineStop('TMmicuenta');MM_timelineGoto('TMmicuenta','1')" onMouseOut="MM_timelinePlay('TMmicuenta')">Polizas</a></td>
      <td align="right"><img src="../html/images/navbar/right_submenu.gif" width="10" height="22"></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td><img src="../html/images/navbar/fnd_submenu_02.gif" width="10" height="1"></td>
      <td><img src="../html/images/blank.gif" width="1" height="1"></td>
      <td align="right"><img src="../html/images/navbar/fnd_submenu_02bis.gif" width="10" height="1"></td>
    </tr>
    <tr>
      <td><img src="../html/images/navbar/fnd_submenu_01.gif" width="10" height="23"></td>
      <td><a href="../general/pro_mensual.php?id=<?=$id?>" class="submenus" onMouseOver="MM_timelineStop('TMmicuenta');MM_timelineGoto('TMmicuenta','1')" onMouseOut="MM_timelinePlay('TMmicuenta')">Proceso Calculo Mensual</a></td>
      <td align="right"><img src="../html/images/navbar/fnd_submenu_01bis.gif" width="10" height="22"></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td><img src="../html/images/navbar/fnd_submenu_02.gif" width="10" height="1"></td>
      <td><img src="../html/images/blank.gif" width="1" height="1"></td>
      <td align="right"><img src="../html/images/navbar/fnd_submenu_02bis.gif" width="10" height="1"></td>
    </tr>
    <tr>
      <td><img src="../html/images/navbar/fnd_submenu_01.gif" width="10" height="23"></td>
      <td><a href="../general/rptdiariomovtos.php?id=<?=$id?>" class="submenus" onMouseOver="MM_timelineStop('TMmicuenta');MM_timelineGoto('TMmicuenta','1')" onMouseOut="MM_timelinePlay('TMmicuenta')">Diario de Movimientos</a></td>
      <td align="right"><img src="../html/images/navbar/fnd_submenu_01bis.gif" width="10" height="22"></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td><img src="../html/images/navbar/fnd_submenu_02.gif" width="10" height="1"></td>
      <td><img src="../html/images/blank.gif" width="1" height="1"></td>
      <td align="right"><img src="../html/images/navbar/fnd_submenu_02bis.gif" width="10" height="1"></td>
    </tr>
    <tr>
      <td><img src="../html/images/navbar/fnd_submenu_01.gif" width="10" height="23"></td>
      <td><a href="../general/rptanalitico.php?id=<?=$id?>" class="submenus" onMouseOver="MM_timelineStop('TMmicuenta');MM_timelineGoto('TMmicuenta','1')" onMouseOut="MM_timelinePlay('TMmicuenta')">Analitico de Auxiliares</a></td>
      <td align="right"><img src="../html/images/navbar/fnd_submenu_01bis.gif" width="10" height="22"></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td><img src="../html/images/navbar/fnd_submenu_02.gif" width="10" height="1"></td>
      <td><img src="../html/images/blank.gif" width="1" height="1"></td>
      <td align="right"><img src="../html/images/navbar/fnd_submenu_02bis.gif" width="10" height="1"></td>
    </tr>
      <td><img src="../html/images/navbar/fnd_submenu_01.gif" width="10" height="23"></td>
      <td><a href="../general/rptbalanza.php?id=<?=$id?>" class="submenus" onMouseOver="MM_timelineStop('TMmicuenta');MM_timelineGoto('TMmicuenta','1')" onMouseOut="MM_timelinePlay('TMmicuenta')">Balanza de Comprobaci&oacute;n</a></td>
      <td align="right"><img src="../html/images/navbar/fnd_submenu_01bis.gif" width="10" height="22"></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td><img src="../html/images/navbar/fnd_submenu_02.gif" width="10" height="1"></td>
      <td><img src="../html/images/blank.gif" width="1" height="1"></td>
      <td align="right"><img src="../html/images/navbar/fnd_submenu_02bis.gif" width="10" height="1"></td>
    </tr>
    <tr>
      <td><img src="../html/images/navbar/fnd_submenu_01.gif" width="10" height="22"></td>
      <td><a href="#" class="submenus" onMouseOver="MM_timelineStop('TMmicuenta');MM_timelineGoto('TMmicuenta','1')" onMouseOut="MM_timelinePlay('TMmicuenta')">Balance General</a></td>
      <td align="right"><img src="../html/images/navbar/fnd_submenu_01bis.gif" width="10" height="22"></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td><img src="../html/images/navbar/fnd_submenu_02.gif" width="10" height="1"></td>
      <td><img src="../html/images/blank.gif" width="1" height="1"></td>
      <td align="right"><img src="../html/images/navbar/fnd_submenu_02bis.gif" width="10" height="1"></td>
    </tr>
    <tr>
      <td><img src="../html/images/navbar/fnd_submenu_01.gif" width="10" height="22"></td>
      <td><a href="#" class="submenus" onMouseOver="MM_timelineStop('TMmicuenta');MM_timelineGoto('TMmicuenta','1')" onMouseOut="MM_timelinePlay('TMmicuenta')">Estado de Resultados</a></td>
      <td align="right"><img src="../html/images/navbar/fnd_submenu_01bis.gif" width="10" height="22"></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td><img src="../html/images/navbar/fnd_submenu_02.gif" width="10" height="1"></td>
      <td><img src="../html/images/blank.gif" width="1" height="1"></td>
      <td align="right"><img src="../html/images/navbar/fnd_submenu_02bis.gif" width="10" height="1"></td>
    </tr>
    <tr>
      <td><img src="../html/images/navbar/left_submenu.gif" width="10" height="22"></td>
      <td><a href="#" class="submenus" onMouseOver="MM_timelineStop('TMmicuenta');MM_timelineGoto('TMmicuenta','1')" onMouseOut="MM_timelinePlay('TMmicuenta')">Auxiliares de Mayor</a></td>
      <td align="right"><img src="../html/images/navbar/fnd_submenu_01bis.gif" width="10" height="22"></td>
    </tr>
    <tr>
      <td colspan="3" bgcolor="#8494C6"><img src="../html/images/navbar/bott_submenu.gif" width="10" height="1"></td>
    </tr>
  </table>
</div>
<div id="subminegocio" style="position:absolute; left:145px; top:170px; width:29px; height:17px; z-index:3; visibility: hidden">
  <table width="169" border="0" cellspacing="0" cellpadding="0" bgcolor="#7E9EDF">
    <tr>
      <td colspan="3" bgcolor="#8494C6" align="right"><img src="../html/images/navbar/top_submenu.gif" width="10" height="1"></td>
    </tr>
    <tr>
      <td><img src="../html/images/navbar/fnd_submenu_01.gif" width="10" height="22"></td>
      <td><a href="../proveedores/nuevo.php" class="submenus" onMouseOver="MM_timelineStop('TMminegocio');MM_timelineGoto('TMminegocio','1')" onMouseOut="MM_timelinePlay('TMminegocio')">Nuevo Proveedor</a></td>
      <td align="right"><img src="../html/images/navbar/right_submenu.gif" width="10" height="22"></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td><img src="../html/images/navbar/fnd_submenu_02.gif" width="10" height="1"></td>
      <td><img src="../html/images/blank.gif" width="1" height="1"></td>
      <td align="right"><img src="../html/images/navbar/fnd_submenu_02bis.gif" width="10" height="1"></td>
    </tr>
    <tr>
      <td><img src="../html/images/navbar/fnd_submenu_01.gif" width="10" height="22"></td>
      <td><a href="../proveedores/consulta.php" class="submenus" onMouseOver="MM_timelineStop('TMminegocio');MM_timelineGoto('TMminegocio','1')" onMouseOut="MM_timelinePlay('TMminegocio')">Consulta de Proveedores</a></td>
      <td align="right"><img src="../html/images/navbar/fnd_submenu_01bis.gif" width="10" height="22"></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td><img src="../html/images/navbar/fnd_submenu_02.gif" width="10" height="1"></td>
      <td><img src="../html/images/blank.gif" width="1" height="1"></td>
      <td align="right"><img src="../html/images/navbar/fnd_submenu_02bis.gif" width="10" height="1"></td>
    </tr>
    <tr>
      <td><img src="../html/images/navbar/left_submenu.gif" width="10" height="22"></td>
      <td><a href="#" class="submenus" onMouseOver="MM_timelineStop('TMminegocio');MM_timelineGoto('TMminegocio','1')" onMouseOut="MM_timelinePlay('TMminegocio')">Reportes</a></td>
      <td align="right"><img src="../html/images/navbar/fnd_submenu_01bis.gif" width="10" height="22"></td>
    </tr>
    <tr>
      <td colspan="3" bgcolor="#8494C6"><img src="../html/images/navbar/bott_submenu.gif" width="10" height="1"></td>
    </tr>
  </table>
</div>
<div id="submissucursales" style="position:absolute; left:145px; top:194px; width:29px; height:19px; z-index:4; visibility: hidden">
  <table width="241" border="0" cellspacing="0" cellpadding="0" bgcolor="#7E9EDF">
    <tr>
      <td colspan="3" bgcolor="#8494C6" align="right"><img src="../html/images/navbar/top_submenu.gif" width="10" height="1"></td>
    </tr>
    <tr>
      <td><img src="../html/images/navbar/fnd_submenu_01.gif" width="10" height="22"></td>
      <td><a href="#" class="submenus" onMouseOver="MM_timelineStop('TMsucursales');MM_timelineGoto('TMsucursales','1')" onMouseOut="MM_timelinePlay('TMsucursales')">Nueva Cuenta Contable</a></td>
      <td align="right"><img src="../html/images/navbar/right_submenu.gif" width="10" height="22"></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td><img src="../html/images/navbar/fnd_submenu_02.gif" width="10" height="1"></td>
      <td><img src="../html/images/blank.gif" width="1" height="1"></td>
      <td align="right"><img src="../html/images/navbar/fnd_submenu_02bis.gif" width="10" height="1"></td>
    </tr>
    <tr>
      <td><img src="../html/images/navbar/fnd_submenu_01.gif" width="10" height="23"></td>
      <td><a href="#" class="submenus" onMouseOver="MM_timelineStop('TMsucursales');MM_timelineGoto('TMsucursales','1')" onMouseOut="MM_timelinePlay('TMsucursales')">Consulta cuentas contables</a></td>
      <td align="right"><img src="../html/images/navbar/fnd_submenu_01bis.gif" width="10" height="22"></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td><img src="../html/images/navbar/fnd_submenu_02.gif" width="10" height="1"></td>
      <td><img src="../html/images/blank.gif" width="1" height="1"></td>
      <td align="right"><img src="../html/images/navbar/fnd_submenu_02bis.gif" width="10" height="1"></td>
    </tr>
    <tr>
      <td><img src="../html/images/navbar/fnd_submenu_01.gif" width="10" height="23"></td>
      <td><a href="#" class="submenus" onMouseOver="MM_timelineStop('TMsucursales');MM_timelineGoto('TMsucursales','1')" onMouseOut="MM_timelinePlay('TMsucursales')">Libro Diario</a></td>
      <td align="right"><img src="../html/images/navbar/fnd_submenu_01bis.gif" width="10" height="22"></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td><img src="../html/images/navbar/fnd_submenu_02.gif" width="10" height="1"></td>
      <td><img src="../html/images/blank.gif" width="1" height="1"></td>
      <td align="right"><img src="../html/images/navbar/fnd_submenu_02bis.gif" width="10" height="1"></td>
    </tr>
    <tr>
      <td><img src="../html/images/navbar/fnd_submenu_01.gif" width="10" height="23"></td>
      <td><a href="#" class="submenus" onMouseOver="MM_timelineStop('TMsucursales');MM_timelineGoto('TMsucursales','1')" onMouseOut="MM_timelinePlay('TMsucursales')">Balance General</a></td>
      <td align="right"><img src="../html/images/navbar/fnd_submenu_01bis.gif" width="10" height="22"></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td><img src="../html/images/navbar/fnd_submenu_02.gif" width="10" height="1"></td>
      <td><img src="../html/images/blank.gif" width="1" height="1"></td>
      <td align="right"><img src="../html/images/navbar/fnd_submenu_02bis.gif" width="10" height="1"></td>
    </tr>
    <tr>
      <td><img src="../html/images/navbar/fnd_submenu_01.gif" width="10" height="23"></td>
      <td><a href="#" class="submenus" onMouseOver="MM_timelineStop('TMsucursales');MM_timelineGoto('TMsucursales','1')" onMouseOut="MM_timelinePlay('TMsucursales')">Libro Mayor</a></td>
      <td align="right"><img src="../html/images/navbar/fnd_submenu_01bis.gif" width="10" height="22"></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td><img src="../html/images/navbar/fnd_submenu_02.gif" width="10" height="1"></td>
      <td><img src="../html/images/blank.gif" width="1" height="1"></td>
      <td align="right"><img src="../html/images/navbar/fnd_submenu_02bis.gif" width="10" height="1"></td>
    </tr>
    <tr>
      <td><img src="../html/images/navbar/left_submenu.gif" width="10" height="22"></td>
      <td><a href="#" class="submenus" onMouseOver="MM_timelineStop('TMsucursales');MM_timelineGoto('TMsucursales','1')" onMouseOut="MM_timelinePlay('TMsucursales')">Reportes</a></td>
      <td align="right"><img src="../html/images/navbar/fnd_submenu_01bis.gif" width="10" height="22"></td>
    </tr>
    <tr>
      <td colspan="3" bgcolor="#8494C6"><img src="../html/images/navbar/bott_submenu.gif" width="10" height="1"></td>
    </tr>
  </table>
</div>
<div id="subadministracion" style="position:absolute; left:145px; top:218px; width:22px; height:19px; z-index:5; visibility: hidden">
  <table width="211" border="0" cellspacing="0" cellpadding="0" bgcolor="#7E9EDF">
    <tr>
      <td colspan="3" bgcolor="#8494C6" align="right"><img src="../html/images/navbar/top_submenu.gif" width="10" height="1"></td>
    </tr>
    <tr>
      <td><img src="../html/images/navbar/fnd_submenu_01.gif" width="10" height="22"></td>
      <td><a href="#" class="submenus" onMouseOver="MM_timelineStop('TMadministracion');MM_timelineGoto('TMadministracion','1')" onMouseOut="MM_timelinePlay('TMadministracion')">Mis
        usuarios</a></td>
      <td align="right"><img src="../html/images/navbar/right_submenu.gif" width="10" height="22"></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td><img src="../html/images/navbar/fnd_submenu_02.gif" width="10" height="1"></td>
      <td><img src="../html/images/blank.gif" width="1" height="1"></td>
      <td align="right"><img src="../html/images/navbar/fnd_submenu_02bis.gif" width="10" height="1"></td>
    </tr>
    <tr>
      <td><img src="../html/images/navbar/fnd_submenu_01.gif" width="10" height="23"></td>
      <td><a href="#" class="submenus" onMouseOver="MM_timelineStop('TMadministracion');MM_timelineGoto('TMadministracion','1')" onMouseOut="MM_timelinePlay('TMadministracion')">Activar
        empresa</a></td>
      <td align="right"><img src="../html/images/navbar/fnd_submenu_01bis.gif" width="10" height="22"></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td><img src="../html/images/navbar/fnd_submenu_02.gif" width="10" height="1"></td>
      <td><img src="../html/images/blank.gif" width="1" height="1"></td>
      <td align="right"><img src="../html/images/navbar/fnd_submenu_02bis.gif" width="10" height="1"></td>
    </tr>
    <tr>
      <td><img src="../html/images/navbar/fnd_submenu_01.gif" width="10" height="23"></td>
      <td><a href="#" class="submenus" onMouseOver="MM_timelineStop('TMadministracion');MM_timelineGoto('TMadministracion','1')" onMouseOut="MM_timelinePlay('TMadministracion')">Entrar
        a cuenta de sub-empresa</a></td>
      <td align="right"><img src="../html/images/navbar/fnd_submenu_01bis.gif" width="10" height="22"></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td><img src="../html/images/navbar/fnd_submenu_02.gif" width="10" height="1"></td>
      <td><img src="../html/images/blank.gif" width="1" height="1"></td>
      <td align="right"><img src="../html/images/navbar/fnd_submenu_02bis.gif" width="10" height="1"></td>
    </tr>
    <tr>
      <td><img src="../html/images/navbar/fnd_submenu_01.gif" width="10" height="23"></td>
      <td><a href="#" class="submenus" onMouseOver="MM_timelineStop('TMadministracion');MM_timelineGoto('TMadministracion','1')" onMouseOut="MM_timelinePlay('TMadministracion')">Enviar
        mensajes a sus empresas</a></td>
      <td align="right"><img src="../html/images/navbar/fnd_submenu_01bis.gif" width="10" height="22"></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td><img src="../html/images/navbar/fnd_submenu_02.gif" width="10" height="1"></td>
      <td><img src="../html/images/blank.gif" width="1" height="1"></td>
      <td align="right"><img src="../html/images/navbar/fnd_submenu_02bis.gif" width="10" height="1"></td>
    </tr>
    <tr>
      <td><img src="../html/images/navbar/fnd_submenu_01.gif" width="10" height="23"></td>
      <td><a href="#" class="submenus" onMouseOver="MM_timelineStop('TMadministracion');MM_timelineGoto('TMadministracion','1')" onMouseOut="MM_timelinePlay('TMadministracion')">Definir
        contenido de p&aacute;gina inicial</a></td>
      <td align="right"><img src="../html/images/navbar/fnd_submenu_01bis.gif" width="10" height="22"></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td><img src="../html/images/navbar/fnd_submenu_02.gif" width="10" height="1"></td>
      <td><img src="../html/images/blank.gif" width="1" height="1"></td>
      <td align="right"><img src="../html/images/navbar/fnd_submenu_02bis.gif" width="10" height="1"></td>
    </tr>
    <tr>
      <td><img src="../html/images/navbar/fnd_submenu_01.gif" width="10" height="23"></td>
      <td><a href="#" class="submenus" onMouseOver="MM_timelineStop('TMadministracion');MM_timelineGoto('TMadministracion','1')" onMouseOut="MM_timelinePlay('TMadministracion')">Escribir
        mensajes globales</a></td>
      <td align="right"><img src="../html/images/navbar/fnd_submenu_01bis.gif" width="10" height="22"></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td><img src="../html/images/navbar/fnd_submenu_02.gif" width="10" height="1"></td>
      <td><img src="../html/images/blank.gif" width="1" height="1"></td>
      <td align="right"><img src="../html/images/navbar/fnd_submenu_02bis.gif" width="10" height="1"></td>
    </tr>
    <tr>
      <td><img src="../html/images/navbar/fnd_submenu_01.gif" width="10" height="23"></td>
      <td><a href="#" class="submenus" onMouseOver="MM_timelineStop('TMadministracion');MM_timelineGoto('TMadministracion','1')" onMouseOut="MM_timelinePlay('TMadministracion')">Crear
        banners</a></td>
      <td align="right"><img src="../html/images/navbar/fnd_submenu_01bis.gif" width="10" height="22"></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td><img src="../html/images/navbar/fnd_submenu_02.gif" width="10" height="1"></td>
      <td><img src="../html/images/blank.gif" width="1" height="1"></td>
      <td align="right"><img src="../html/images/navbar/fnd_submenu_02bis.gif" width="10" height="1"></td>
    </tr>
    <tr>
      <td><img src="../html/images/navbar/fnd_submenu_01.gif" width="10" height="23"></td>
      <td><a href="#" class="submenus" onMouseOver="MM_timelineStop('TMadministracion');MM_timelineGoto('TMadministracion','1')" onMouseOut="MM_timelinePlay('TMadministracion')">Asignar
        banners</a></td>
      <td align="right"><img src="../html/images/navbar/fnd_submenu_01bis.gif" width="10" height="22"></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td><img src="../html/images/navbar/fnd_submenu_02.gif" width="10" height="1"></td>
      <td><img src="../html/images/blank.gif" width="1" height="1"></td>
      <td align="right"><img src="../html/images/navbar/fnd_submenu_02bis.gif" width="10" height="1"></td>
    </tr>
    <tr>
      <td><img src="../html/images/navbar/fnd_submenu_01.gif" width="10" height="23"></td>
      <td><a href="#" class="submenus" onMouseOver="MM_timelineStop('TMadministracion');MM_timelineGoto('TMadministracion','1')" onMouseOut="MM_timelinePlay('TMadministracion')">Estad&iacute;sticas
        del sitio</a></td>
      <td align="right"><img src="../html/images/navbar/fnd_submenu_01bis.gif" width="10" height="22"></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td><img src="../html/images/navbar/fnd_submenu_02.gif" width="10" height="1"></td>
      <td><img src="../html/images/blank.gif" width="1" height="1"></td>
      <td align="right"><img src="../html/images/navbar/fnd_submenu_02bis.gif" width="10" height="1"></td>
    </tr>
    <tr>
      <td><img src="../html/images/navbar/left_submenu.gif" width="10" height="22"></td>
      <td><a href="#" class="submenus" onMouseOver="MM_timelineStop('TMadministracion');MM_timelineGoto('TMadministracion','1')" onMouseOut="MM_timelinePlay('TMadministracion')">Autorizar
        pedidos </a></td>
      <td align="right"><img src="../html/images/navbar/fnd_submenu_01bis.gif" width="10" height="22"></td>
    </tr>
    <tr>
      <td colspan="3" bgcolor="#8494C6"><img src="../html/images/navbar/bott_submenu.gif" width="10" height="1"></td>
    </tr>
  </table>
</div>
<!--- INICIA MENU DE SEGURIDAD -->
<div id="subseguridad" style="position:absolute; left:145px; top:243px; width:22px; height:19px; z-index:5; visibility: hidden">
  <table width="211" border="0" cellspacing="0" cellpadding="0" bgcolor="#7E9EDF">
    <tr>
      <td colspan="3" bgcolor="#8494C6" align="right"><img src="../html/images/navbar/top_submenu.gif" width="10" height="1"></td>
    </tr>
    <tr>
      <td><img src="../html/images/navbar/fnd_submenu_01.gif" width="10" height="22"></td>
      <td><a href="#" class="submenus" onMouseOver="MM_timelineStop('TMseguridad');MM_timelineGoto('TMseguridad','1')" onMouseOut="MM_timelinePlay('TMseguridad')">Mis
        usuarios</a></td>
      <td align="right"><img src="../html/images/navbar/right_submenu.gif" width="10" height="22"></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td><img src="../html/images/navbar/fnd_submenu_02.gif" width="10" height="1"></td>
      <td><img src="../html/images/blank.gif" width="1" height="1"></td>
      <td align="right"><img src="../html/images/navbar/fnd_submenu_02bis.gif" width="10" height="1"></td>
    </tr>
    <tr>
      <td><img src="../html/images/navbar/fnd_submenu_01.gif" width="10" height="23"></td>
      <td><a href="#" class="submenus" onMouseOver="MM_timelineStop('TMseguridad');MM_timelineGoto('TMseguridad','1')" onMouseOut="MM_timelinePlay('TMseguridad')">Mis Perfiles</a></td>
      <td align="right"><img src="../html/images/navbar/fnd_submenu_01bis.gif" width="10" height="22"></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td><img src="../html/images/navbar/fnd_submenu_02.gif" width="10" height="1"></td>
      <td><img src="../html/images/blank.gif" width="1" height="1"></td>
      <td align="right"><img src="../html/images/navbar/fnd_submenu_02bis.gif" width="10" height="1"></td>
    </tr>
    <tr>
      <td><img src="../html/images/navbar/fnd_submenu_01.gif" width="10" height="23"></td>
      <td><a href="#" class="submenus" onMouseOver="MM_timelineStop('TMseguridad');MM_timelineGoto('TMseguridad','1')" onMouseOut="MM_timelinePlay('TMseguridad')">Cambiar Contrasenia</a></td>
      <td align="right"><img src="../html/images/navbar/fnd_submenu_01bis.gif" width="10" height="22"></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td><img src="../html/images/navbar/fnd_submenu_02.gif" width="10" height="1"></td>
      <td><img src="../html/images/blank.gif" width="1" height="1"></td>
      <td align="right"><img src="../html/images/navbar/fnd_submenu_02bis.gif" width="10" height="1"></td>
    </tr>
    <tr>
      <td><img src="../html/images/navbar/left_submenu.gif" width="10" height="22"></td>
      <td><a href="#" class="submenus" onMouseOver="MM_timelineStop('TMadministracion');MM_timelineGoto('TMseguridad','1')" onMouseOut="MM_timelinePlay('TMseguridad')">LOG de Accesos</a></td>
      <td align="right"><img src="../html/images/navbar/fnd_submenu_01bis.gif" width="10" height="22"></td>
    </tr>
    <tr>
      <td colspan="3" bgcolor="#8494C6"><img src="../html/images/navbar/bott_submenu.gif" width="10" height="1"></td>
    </tr>
  </table>
</div>

<!-- FIN DE MENU DE SEGURIDAD -->
<!-- TERMINAN LAYERS DE SUBMENUS -->
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td background="../html/images/header/bckgrnd.gif">
      <table width="780" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td rowspan="5" background="../html/images/blank.gif" bgcolor="#FFFFFF"><img src="../html/images/blank.gif" width="5" height="1"></td>
          <td rowspan="3" bgcolor="#0063CE"><img src="../html/images/header/<?=$oempresa->getlklogoheader()?>" width="168" height="92"></td>
          <td colspan="3" bgcolor="#0063CE"><img src="../html/images/blank.gif" width="1" height="5"></td>
          <td bgcolor="#0063CE"><img src="../html/images/header/foto_01.gif" width="261" height="5"></td>
        </tr>
        <tr>
          <td bgcolor="#0063CE"><img src="../html/images/blank.gif" width="19" height="1"></td>
          <td bgcolor="#0063CE"><img src="../html/images/blank.gif" width="280" height="60"></td>
          <td bgcolor="#0063CE"><img src="../html/images/blank.gif" width="47" height="1"></td>
          <td bgcolor="#0063CE" background="../html/images/header/foto_fnd.gif" valign="top"><span class="AvisoHeaderBold11"><?=$ousuario->getnbusuario()?></span><br>
            <span class="AvisoHeaderNormal11"><?=$oempresa->getnbempresa()?><br>
            </span><span class="AvisoHeaderBold11">Hoy es:</span> <span class="AvisoHeaderNormal11"><?=$osession->getfhsession()?></span></td>
        </tr>
        <tr>
          <td bgcolor="#0063CE">&nbsp;</td>
          <td bgcolor="#0063CE">
            <div align="center"><span class="AvisoHeaderBold">&Uacute;ltimo acceso:</span><span class="AvisoHeaderNormal"><?=$osession->getfhsession()?></span></div>
          </td>
          <td bgcolor="#0063CE">&nbsp;</td>
          <td bgcolor="#0063CE"><img src="../html/images/header/logo_tradeevol_01.gif" width="261" height="27"></td>
        </tr>
        <tr>
          <td><img src="../html/images/header/bott_01.gif" width="168" height="7"></td>
          <td colspan="3"><img src="../html/images/header/bot_02.gif" width="346" height="7"></td>
          <td align="right" rowspan="2" valign="top" background="../html/images/blank.gif">
            <img src="../html/images/header/logo_tradeevol_02.gif" width="261" height="15"></td>
        </tr>
        <tr>
          <td colspan="4" background="../html/images/blank.gif">
            <table width="223" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="22"><img src="../html/images/navbar/navbar_01.gif" width="22" height="22"></td>
                <td bgcolor="#003399" width="116"> <img src="../html/images/blank.gif" width="19" height="1"><a href="#"></a><a href="#" onClick="MM_nbGroup('down','group1','Icono_Inicio','../html/images/navbar/icon_inicio.gif',1)" onMouseOver="MM_nbGroup('over','Icono_Inicio','../html/images/navbar/icon_inicio.gif','','ti_icon_blank','../html/images/navbar/t_icon_inicio.gif','',1)" onMouseOut="MM_nbGroup('out')"><img src="../html/images/navbar/icon_inicio.gif" width="15" height="13" name="Icono_Inicio" border="0" onLoad=""></a><img src="../html/images/blank.gif" width="20" height="1"><a href="#"></a><a href="#" onClick="MM_nbGroup('down','group1','Icono_mail','../html/images/navbar/icon_mail.gif',1)" onMouseOver="MM_nbGroup('over','Icono_mail','../html/images/navbar/icon_mail.gif','','ti_icon_blank','../html/images/navbar/t_icon_mail.gif','',1)" onMouseOut="MM_nbGroup('out')"><img src="../html/images/navbar/icon_mail.gif" width="17" height="13" name="Icono_mail" border="0" onLoad=""></a><img src="../html/images/blank.gif" width="20" height="8"><a href="#"></a><a href="../seguridad/terminasession.php?id=<?=$id?>" onClick="MM_nbGroup('down','group1','Icono_salir','../html/images/navbar/icon_salir.gif',1)" onMouseOver="MM_nbGroup('over','Icono_salir','../html/images/navbar/icon_salir.gif','','ti_icon_blank','../html/images/navbar/t_icon_salir.gif','',1)" onMouseOut="MM_nbGroup('out')"><img src="../html/images/navbar/icon_salir.gif" width="15" height="13" name="Icono_salir" border="0" onLoad=""></a></td>
                <td bgcolor="8494C6"><img src="../html/images/blank.gif" width="1" height="1"></td>
                <td><img src="../html/images/navbar/ti_icon_blank.gif" width="84" height="22" name="ti_icon_blank"></td>
              </tr>
            </table>
          </td>
        </tr>
      </table>
    </td>
  </tr>
</table>
<table width="780" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><img src="../html/images/blank.gif" width="144" height="1"></td>
    <td><img src="../html/images/blank.gif" width="636" height="1"></td>
  </tr>
  <tr>
    <td valign="top">
      <table width="144" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td rowspan="25"><img src="../html/images/blank.gif" width="5" height="1"></td>
          <td><a href="javascript:;" onMouseOver="MM_timelineStop('TMmispedidos');MM_showHideLayers('subcatalogos','','show','submicuenta','','hide','subminegocio','','hide','submissucursales','','hide','subadministracion','','hide')" onMouseOut="MM_timelineGoto('TMmispedidos','1');MM_timelinePlay('TMmispedidos')"><img src="../html/images/navbar/B_catalogos.gif" width="139" height="23" border="0"></a></td>
        </tr>
        <tr>
          <td><img src="../html/images/blank.gif" width="1" height="1"></td>
        </tr>
        <tr>
          <td><a href="javascript:;" onMouseOver="MM_timelineStop('TMmicuenta');MM_showHideLayers('subcatalogos','','hide','submicuenta','','show','subminegocio','','hide','submissucursales','','hide','subadministracion','','hide')" onMouseOut="MM_timelineGoto('TMmicuenta','1');MM_timelinePlay('TMmicuenta')"><img src="../html/images/navbar/B_contabilidadgral.gif" width="139" height="23" border="0"></a></td>
        </tr>
        <tr>
          <td><img src="../html/images/blank.gif" width="1" height="1"></td>
        </tr>
         <tr>
          <td><a href="javascript:;" onMouseOver="MM_timelineStop('TMminegocio');MM_showHideLayers('subcatalogos','','hide','submicuenta','','hide','subminegocio','','show','submissucursales','','hide','subadministracion','','hide')" onMouseOut="MM_timelineGoto('TMminegocio','1');MM_timelinePlay('TMminegocio')"><img src="../html/images/navbar/B_inventario.gif" width="139" height="23" border="0"></a></td>
        </tr>
        <tr>
          <td><img src="../html/images/blank.gif" width="1" height="1"></td>
        </tr>  
        <tr>
          <td><a href="javascript:;" onMouseOver="MM_timelineStop('TMsucursales');MM_showHideLayers('subcatalogos','','hide','submicuenta','','hide','subminegocio','','hide','submissucursales','','show','subadministracion','','hide')" onMouseOut="MM_timelineGoto('TMsucursales','1');MM_timelinePlay('TMsucursales')"><img src="../html/images/navbar/B_ctasxcobrar.gif" width="139" height="23" border="0"></a></td>
        </tr>
        <tr>
          <td><img src="../html/images/blank.gif" width="1" height="1"></td>
        </tr>
        <tr>
          <td><a href="javascript:;" onMouseOver="MM_timelineStop('TMadministracion');MM_showHideLayers('subcatalogos','','hide','submicuenta','','hide','subminegocio','','hide','submissucursales','','hide','subadministracion','','show')" onMouseOut="MM_timelineGoto('TMadministracion','1');MM_timelinePlay('TMadministracion')"><img src="../html/images/navbar/B_ctasxpagar.gif" width="139" height="23" border="0"></a></td>
        </tr>
        <tr>
          <td><img src="../html/images/blank.gif" width="1" height="1"></td>
        </tr>
        <tr>
          <td><a href="javascript:;" onMouseOver="MM_timelineStop('TMseguridad');MM_showHideLayers('subcatalogos','','hide','submicuenta','','hide','subminegocio','','hide','submissucursales','','hide','subadministracion','','hide','subseguridad','','show')" onMouseOut="MM_timelineGoto('TMseguridad','1');MM_timelinePlay('TMseguridad')"><img src="../html/images/navbar/B_seguridad.gif" width="139" height="23" border="0"></a></td>
        </tr>
        <tr>
          <td><img src="../html/images/blank.gif" width="1" height="1"></td>
        </tr>
        <tr>
          <td><img src="../html/images/blank.gif" width="1" height="1"></td>
        </tr>
        <tr>
          <td><img src="../html/images/navbar/separa_01.gif" width="139" height="10"></td>
        </tr>
        <tr>
          <td><img src="../html/images/blank.gif" width="1" height="1"></td>
        </tr>
        <tr>
          <td background="../html/images/navbar/separa_02.gif"><img src="../html/images/blank.gif" width="1" height="72"></td>
        </tr>
        <tr>
          <td background="../html/images/navbar/separa_02.gif">
            <div align="right"><img src="../html/images/navbar/navbar_02.gif" width="20" height="19"></div>
          </td>
        </tr>
        <tr>
          <td background="../html/images/navbar/separa_02.gif"><img src="../html/images/navbar/navbar_03.gif" width="139" height="1"></td>
        </tr>
      </table>
    </td>
    <td valign="top" align="center">
    <!--  aqui inicia el area de trabajo -->
<? } /* si toprint=='' */ ?>
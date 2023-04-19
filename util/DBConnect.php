<?php
class DBConnect {

var $HOST = "rmurga.globatmysql.com";    // Servidor
var $USER = "dbahanygen";         // nombre de usuario
var $PASS = "evaescarlet";          // Clave de usuario
var $BDD = "contabilidad01";    // Nombre de la base de datos

var $id_connect;
var $select_db;
var $result;
var $error;
function connect ()
{
$this->id_connect = mysql_connect($this->HOST, $this->USER, $this->PASS);
if(!$this->id_connect) {
$this->error_mysql("Imposible de conectar a la base de datos");
return 0;
}
$this->select_db = @mysql_select_db($this->BDD, $this->id_connect);
if(!$this->select_db) {
$this->error_mysql("Imposible de conectar a la base de datos");
return 0;
}
}
function query($QUERY)
{
$this->result = mysql_query($QUERY, $this->id_connect);
if(!$this->result) {
$this->error_mysql("Se ha detectado un problema en la conexion");
return 0;
}
}
function close_mysql()
{
mysql_close($this->id_connect);
}
function error_mysql($MSG)
{
$this->error = @mysql_error($this->id_connect);
echo "<B>Error :</B><BR><I>". $msg ."<BR> ". $this->error ."</I><BR>";
}
function fetch_array()
{
return @mysql_fetch_array($this->result);
}
function num_rows()
{
return @mysql_num_rows($this->result);
}
function getconexion() {
return $this->id_connect;
}
}
?>
<?php

date_default_timezone_set("America/Caracas");

$db   = "sahum";
$host = "localhost";
$user = "root";
$pass = "salomon";

$conex = mysql_connect($host,$user,$pass)or die("No fue posible la Conexion al Servidor ".$host);
$sdb   = mysql_select_db($db,$conex)or die("No se encontro la Base de Datos ".$db);

?>
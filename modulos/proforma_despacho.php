<?php

require "../config/conection.php";

session_start();
extract($_REQUEST);
if(! isset($_SESSION['usuario']))
{
    header("Location:login.php");
    die();
}

if(isset($despacho) && ! empty($despacho) && is_numeric($despacho))
{
    $data_despacho = mysql_fetch_assoc(mysql_query("SELECT * FROM despachos WHERE id_despacho = '$despacho' "));
    $insumos_despacho = mysql_query("SELECT * FROM insumos_despacho WHERE id_despacho = '$despacho' ");
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Pro forma de pedido</title>
</head>
<body>
    
</body>
</html>
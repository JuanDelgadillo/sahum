<?php

session_start();

include_once "../config/conection.php";

extract($_REQUEST);

// echo json_encode($_REQUEST);


$verificar_insumo = mysql_query("SELECT * FROM insumos WHERE codigo_insumo = '$codigo_insumo' ");

if(mysql_num_rows($verificar_insumo) == 0)
{
    echo '{"respuesta":false}';
}
else
{
    $insumo = mysql_fetch_assoc($verificar_insumo);
    $precio_total = $insumo['precio_unitario']*$cantidad_insumo;
    echo '{"respuesta":true,"codigo_insumo":"'.$insumo['codigo_insumo'].'","descripcion":"'.$insumo['descripcion'].'","cantidad":"'.$cantidad_insumo.'","precio_unitario":"'.$insumo['precio_unitario'].'","precio_total":"'.$precio_total.'"}';
}


?>
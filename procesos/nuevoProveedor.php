<?php

session_start();

include_once "../config/conection.php";

extract($_REQUEST);

if(isset($guardar))
{
    $verificar_proveedor = mysql_query("SELECT * FROM proveedores WHERE rif = '$rif' ");

    if(mysql_num_rows($verificar_proveedor) != 0)
    {
        $_SESSION['warning'] = "El proveedor ya se encuentra registrado.";
        header("Location:../modulos/nuevoProveedor.php");
        die();
    }
    else
    {
        $nuevoProveedor = mysql_query("INSERT INTO proveedores (rif, razon_social, telefono, direccion, encargado, email, pagina_web, notas) VALUES ('$rif','$razon_social','$telefono','$direccion','$encargado','$correo_electronico','$pagina_web','$notas') ");
        $_SESSION['message'] = "El proveedor ha sido registrado satisfactoriamente.";
        header("Location:../modulos/nuevoProveedor.php");
    }
}
else
{
    header("Location:../");
}

?>
<?php

session_start();

include_once "../config/conection.php";

extract($_REQUEST);


    if($operation == "save")
    {
        $verificar_proveedor = mysql_query("SELECT * FROM proveedores WHERE rif = '$rif' ");

        if(mysql_num_rows($verificar_proveedor) != 0)
        {
            $_SESSION['warning'] = "El proveedor ya se encuentra registrado.";
            header("Location:../modulos/gestion_proveedor.php");
            die();
        }
        else
        {
            $nuevoProveedor = mysql_query("INSERT INTO proveedores (rif, razon_social, telefono, direccion, encargado, email, pagina_web, notas) VALUES ('$rif','$razon_social','$telefono','$direccion','$encargado','$correo_electronico','$pagina_web','$notas') ");
            $_SESSION['message'] = "El proveedor ha sido registrado satisfactoriamente.";
            header("Location:../modulos/gestion_proveedor.php");
            die();
        }
    }
    elseif($operation == "update")
    {
        $actualizar_proveedor = mysql_query("UPDATE proveedores SET rif = '$rif', razon_social = '$razon_social', telefono = '$telefono', direccion = '$direccion', encargado = '$encargado', email = '$correo_electronico', pagina_web = '$pagina_web', notas = '$notas' WHERE id_proveedor = '$id' ");
        $_SESSION['message'] = "Los datos del proveedor han sido actualizados satisfactoriamente.";
        header("Location:../modulos/proveedores.php");
        die();
    }
    elseif($operation == "delete")
    {
        $verificar_proveedor = mysql_query("SELECT * FROM insumos WHERE id_proveedor = '$id' ");
        if(mysql_num_rows($verificar_proveedor) == 0)
        {
            $delete_proveedor = mysql_query("DELETE FROM proveedores WHERE id_proveedor = '$id' ");
            $_SESSION['message'] = "El proveedor se ha eliminado satisfactoriamente.";
            header("Location:../modulos/proveedores.php");
            die();
        }
        else
        {
            $_SESSION['warning'] = "No es posible eliminar el proveedor, ya que posee ".mysql_num_rows($verificar_proveedor)." insumos asociados.";
            header("Location:../modulos/proveedores.php");
            die();
        }
    }
    else
    {
        header("Location:../");
    }

?>
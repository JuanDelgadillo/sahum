<?php

session_start();

include_once "../config/conection.php";

extract($_REQUEST);


    if($operation == "save")
    {
        $verificar_deposito = mysql_query("SELECT * FROM depositos WHERE nombre_deposito = '$nombre_deposito' ");

        if(mysql_num_rows($verificar_deposito) != 0)
        {
            $_SESSION['warning'] = "El depósito ya se encuentra registrado.";
            header("Location:../modulos/gestion_deposito.php");
            die();
        }
        else
        {
            $nuevoDeposito = mysql_query("INSERT INTO depositos (id_division, nombre_deposito) VALUES ('$division_deposito','$nombre_deposito') ");
            $_SESSION['message'] = "El depósito ha sido registrado satisfactoriamente.";
            header("Location:../modulos/gestion_deposito.php");
            die();
        }
    }
    elseif($operation == "update")
    {
        $actualizar_deposito = mysql_query("UPDATE depositos SET id_division = '$division_deposito', nombre_deposito = '$nombre_deposito' WHERE id_deposito = '$id' ");
        $_SESSION['message'] = "El depósito ha sido actualizado satisfactoriamente.";
        header("Location:../modulos/depositos.php");
        die();
    }
    elseif($operation == "delete")
    {
        $verificar_insumos = mysql_query("SELECT * FROM insumos WHERE id_deposito = '$id' ");
        if(mysql_num_rows($verificar_insumos) == 0)
        {
            $delete_deposito = mysql_query("DELETE FROM depositos WHERE id_deposito = '$id' ");
            $_SESSION['message'] = "El depósito se ha eliminado satisfactoriamente.";
            header("Location:../modulos/depositos.php");
            die();
        }
        else
        {
            $_SESSION['warning'] = "No es posible eliminar el deposito, ya que posee ".mysql_num_rows($verificar_insumos)." insumos asociados.";
            header("Location:../modulos/depositos.php");
            die();
        }
    }
    else
    {
        header("Location:../");
    }

?>
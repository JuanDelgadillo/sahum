<?php

session_start();

include_once "../config/conection.php";

extract($_REQUEST);


    if($operation == "save")
    {
        $verificar_seccion = mysql_query("SELECT * FROM secciones WHERE nombre_seccion = '$nombre_seccion' ");

        if(mysql_num_rows($verificar_seccion) != 0)
        {
            $_SESSION['warning'] = "La sección ya se encuentra registrada en el depósito.";
            header("Location:../modulos/gestion_seccion.php");
            die();
        }
        else
        {
            $nuevaSeccion = mysql_query("INSERT INTO secciones (id_deposito, nombre_seccion) VALUES ('$deposito','$nombre_seccion') ");
            $_SESSION['message'] = "La sección ha sido registrada satisfactoriamente.";
            header("Location:../modulos/gestion_seccion.php");
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
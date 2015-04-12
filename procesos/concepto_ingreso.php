<?php

session_start();

include_once "../config/conection.php";

extract($_REQUEST);


    if($operation == "save")
    {
        $verificar_concepto = mysql_query("SELECT * FROM conceptos_ingreso WHERE nombre_concepto = '$nombre_concepto' ");

        if(mysql_num_rows($verificar_concepto) != 0)
        {
            $_SESSION['warning'] = "El concepto de ingreso ya se encuentra registrado.";
            header("Location:../modulos/gestion_concepto.php");
            die();
        }
        else
        {
            $nuevoConcepto = mysql_query("INSERT INTO conceptos_ingreso (nombre_concepto) VALUES ('$nombre_concepto') ");
            $_SESSION['message'] = "El concepto de ingreso ha sido registrado satisfactoriamente.";
            header("Location:../modulos/gestion_concepto.php");
            die();
        }
    }
    elseif($operation == "update")
    {
        $actualizar_concepto = mysql_query("UPDATE conceptos_ingreso SET nombre_concepto = '$nombre_concepto' WHERE id_concepto_ingreso = '$id' ");
        $_SESSION['message'] = "El concepto ha sido actualizado satisfactoriamente.";
        header("Location:../modulos/conceptos_ingreso.php");
        die();
    }
    elseif($operation == "delete")
    {
        $verificar_concepto = mysql_query("SELECT * FROM insumos WHERE id_concepto_ingreso = '$id' ");
        if(mysql_num_rows($verificar_concepto) == 0)
        {
            $delete_division = mysql_query("DELETE FROM conceptos_ingreso WHERE id_concepto_ingreso = '$id' ");
            $_SESSION['message'] = "El concepto de ingreso se ha eliminado satisfactoriamente.";
            header("Location:../modulos/conceptos_ingreso.php");
            die();
        }
        else
        {
            $_SESSION['warning'] = "No es posible eliminar el concepto de ingreso, ya que posee ".mysql_num_rows($verificar_concepto)." insumos asociados.";
            header("Location:../modulos/conceptos_ingreso.php");
            die();
        }
    }
    else
    {
        header("Location:../");
    }

?>
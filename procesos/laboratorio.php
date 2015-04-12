<?php

session_start();

include_once "../config/conection.php";

extract($_REQUEST);


    if($operation == "save")
    {
        $verificar_laboratorio = mysql_query("SELECT * FROM laboratorios WHERE nombre_laboratorio = '$nombre_laboratorio' ");

        if(mysql_num_rows($verificar_laboratorio) != 0)
        {
            $_SESSION['warning'] = "El laboratorio ya se encuentra registrado.";
            header("Location:../modulos/gestion_laboratorio.php");
            die();
        }
        else
        {
            $nuevoLaboratorio = mysql_query("INSERT INTO laboratorios (nombre_laboratorio) VALUES ('$nombre_laboratorio') ");
            $_SESSION['message'] = "El laboratorio ha sido registrado satisfactoriamente.";
            header("Location:../modulos/gestion_laboratorio.php");
            die();
        }
    }
    elseif($operation == "update")
    {
        $actualizar_laboratorio = mysql_query("UPDATE laboratorios SET nombre_laboratorio = '$nombre_laboratorio' WHERE id_laboratorio = '$id' ");
        $_SESSION['message'] = "El laboratorio ha sido actualizado satisfactoriamente.";
        header("Location:../modulos/laboratorios.php");
        die();
    }
    elseif($operation == "delete")
    {
        $verificar_insumos = mysql_query("SELECT * FROM insumos WHERE id_laboratorio = '$id' ");
        if(mysql_num_rows($verificar_insumos) == 0)
        {
            $delete_division = mysql_query("DELETE FROM laboratorios WHERE id_laboratorio = '$id' ");
            $_SESSION['message'] = "El laboratorio se ha eliminado satisfactoriamente.";
            header("Location:../modulos/laboratorios.php");
            die();
        }
        else
        {
            $_SESSION['warning'] = "No es posible eliminar el laboratorio, ya que posee ".mysql_num_rows($verificar_insumos)." insumos asociados.";
            header("Location:../modulos/laboratorios.php");
            die();
        }
    }
    else
    {
        header("Location:../");
    }

?>
<?php

session_start();

include_once "../config/conection.php";

extract($_REQUEST);


    if($operation == "save")
    {
        $verificar_servicio = mysql_query("SELECT * FROM servicios WHERE nombre_servicio = '$nombre_servicio' AND id_division = '$division' ");

        if(mysql_num_rows($verificar_servicio) != 0)
        {
            $_SESSION['warning'] = "El servicio ya se encuentra registrado.";
            header("Location:../modulos/divisiones.php");
            die();
        }
        else
        {
            $nuevoServicio = mysql_query("INSERT INTO servicios (id_division, nombre_servicio, ubicacion_fisica) VALUES ('$division','$nombre_servicio','$ubicacion_fisica') ");
            $_SESSION['message'] = "El servicio ha sido registrado satisfactoriamente.";
            header("Location:../modulos/divisiones.php");
            die();
        }
    }
    elseif($operation == "update")
    {
        $actualizar_division = mysql_query("UPDATE servicios SET nombre_servicio = '$nombre_servicio', ubicacion_fisica = '$ubicacion_fisica' WHERE id_servicio = '$id' ");
        $_SESSION['message'] = "El servicio ha sido actualizado satisfactoriamente.";
        header("Location:../modulos/servicios.php?division=".$division);
        die();
    }
    elseif($operation == "delete")
    {
        $delete_division = mysql_query("DELETE FROM servicios WHERE id_servicio = '$id' ");
        $_SESSION['message'] = "El servicio se ha eliminado satisfactoriamente.";
        header("Location:../modulos/servicios.php?division=".$division);
        die();

        // $verificar_servicios = mysql_query("SELECT * FROM servicios WHERE id_division = '$id' ");
        // $verificar_depositos = mysql_query("SELECT * FROM depositos WHERE id_division = '$id' ");
        // if(mysql_num_rows($verificar_servicios) == 0 && mysql_num_rows($verificar_depositos) == 0)
        // {
            
        // }
        // else
        // {
        //     $_SESSION['warning'] = "No es posible eliminar la división, ya que posee ".mysql_num_rows($verificar_servicios)." servicios y ".mysql_num_rows($verificar_depositos)." depositos asociados.";
        //     header("Location:../modulos/divisiones.php");
        //     die();
        // }
    }
    else
    {
        header("Location:../");
    }

?>
<?php

session_start();

include_once "../config/conection.php";

extract($_REQUEST);


    if($operation == "save")
    {
        $verificar_persona = mysql_query("SELECT * FROM responsables_servicio WHERE id_servicio = '$servicio' AND cedula_responsable = '$id' ");

        if(mysql_num_rows($verificar_persona) != 0)
        {
            $_SESSION['warning'] = "La persona ya es responsable del servicio.";
            header("Location:../modulos/servicios.php?division=".$division);
            die();
        }
        else
        {
            $nuevoResponsable = mysql_query("INSERT INTO responsables_servicio (cedula_responsable, id_servicio) VALUES ('$id','$servicio') ");
            $_SESSION['message'] = "El responsable ha sido registrado satisfactoriamente.";
            header("Location:../modulos/servicios.php?division=".$division);
            die();
        }
    }
    elseif($operation == "delete")
    {
        $delete_responsable = mysql_query("DELETE FROM responsables_servicio WHERE id_servicio = '$servicio' AND cedula_responsable = '$id' ");
        $_SESSION['message'] = "El responsable se ha eliminado satisfactoriamente.";
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
<?php

session_start();

include_once "../config/conection.php";

extract($_REQUEST);


    if($operation == "save")
    {
        $verificar_persona = mysql_query("SELECT * FROM responsables_servicio WHERE id_servicio = '$servicio' AND cedula_responsable = '$id' ");

        if(mysql_num_rows($verificar_persona) != 0)
        {
            auditoria($_SESSION['id_usuario'],"Intento asignar como reponsable de un servicio a la persona identificada con la cedula $id, que ya es responsable del servicio.",$info["os"],$info["browser"],$info["version"],$ip);
            $_SESSION['warning'] = "La persona ya es responsable del servicio.";
            header("Location:../modulos/servicios.php?division=".$division);
            die();
        }
        else
        {
            $nuevoResponsable = mysql_query("INSERT INTO responsables_servicio (cedula_responsable, id_servicio) VALUES ('$id','$servicio') ");
            auditoria($_SESSION['id_usuario'],"Asigno como responsable de un servicio a la persona identificada con la cedula $id",$info["os"],$info["browser"],$info["version"],$ip);
            $_SESSION['message'] = "El responsable ha sido registrado satisfactoriamente.";
            header("Location:../modulos/servicios.php?division=".$division);
            die();
        }
    }
    elseif($operation == "delete")
    {
        $delete_responsable = mysql_query("DELETE FROM responsables_servicio WHERE id_servicio = '$servicio' AND cedula_responsable = '$id' ");
        auditoria($_SESSION['id_usuario'],"Elimino a la persona identificada con la cedula $id, como responsable de un servicio",$info["os"],$info["browser"],$info["version"],$ip);
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
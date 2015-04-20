<?php

session_start();

include_once "../config/conection.php";

extract($_REQUEST);


    if($operation == "save")
    {
        $verificar_division = mysql_query("SELECT * FROM divisiones WHERE nombre_division = '$nombre_division' ");

        if(mysql_num_rows($verificar_division) != 0)
        {
            auditoria($_SESSION['id_usuario'],"Intento registrar una división de nombre $nombre_division ya existente.",$info["os"],$info["browser"],$info["version"],$ip);
            $_SESSION['warning'] = "La división ya se encuentra registrada.";
            header("Location:../modulos/gestion_division.php");
            die();
        }
        else
        {
            $nuevaDivision = mysql_query("INSERT INTO divisiones (nombre_division) VALUES ('$nombre_division') ");
            auditoria($_SESSION['id_usuario'],"Registro una nueva división de nombre $nombre_division",$info["os"],$info["browser"],$info["version"],$ip);
            $_SESSION['message'] = "La división ha sido registrada satisfactoriamente.";
            header("Location:../modulos/gestion_division.php");
            die();
        }
    }
    elseif($operation == "update")
    {
        $actualizar_division = mysql_query("UPDATE divisiones SET nombre_division = '$nombre_division' WHERE id_division = '$id' ");
        auditoria($_SESSION['id_usuario'],"Actualizó la división de nombre $nombre_division",$info["os"],$info["browser"],$info["version"],$ip);
        $_SESSION['message'] = "La división ha sido actualizada satisfactoriamente.";
        header("Location:../modulos/divisiones.php");
        die();
    }
    elseif($operation == "delete")
    {
        $verificar_servicios = mysql_query("SELECT * FROM servicios WHERE id_division = '$id' ");
        $verificar_depositos = mysql_query("SELECT * FROM depositos WHERE id_division = '$id' ");
        if(mysql_num_rows($verificar_servicios) == 0 && mysql_num_rows($verificar_depositos) == 0)
        {
            $delete_division = mysql_query("DELETE FROM divisiones WHERE id_division = '$id' ");
            auditoria($_SESSION['id_usuario'],"Eliminó una división",$info["os"],$info["browser"],$info["version"],$ip);
            $_SESSION['message'] = "La división se ha eliminado satisfactoriamente.";
            header("Location:../modulos/divisiones.php");
            die();
        }
        else
        {
            auditoria($_SESSION['id_usuario'],"Intento eliminar una división que posee ".mysql_num_rows($verificar_servicios)." servicios y ".mysql_num_rows($verificar_depositos)." depositos asociados.",$info["os"],$info["browser"],$info["version"],$ip);
            $_SESSION['warning'] = "No es posible eliminar la división, ya que posee ".mysql_num_rows($verificar_servicios)." servicios y ".mysql_num_rows($verificar_depositos)." depositos asociados.";
            header("Location:../modulos/divisiones.php");
            die();
        }
    }
    else
    {
        header("Location:../");
    }

?>
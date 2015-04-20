<?php

session_start();

include_once "../config/conection.php";

extract($_REQUEST);


    if($operation == "save")
    {
        $verificar_seccion = mysql_query("SELECT * FROM secciones WHERE nombre_seccion = '$nombre_seccion' ");

        if(mysql_num_rows($verificar_seccion) != 0)
        {
            auditoria($_SESSION['id_usuario'],"Intento registrar una sección de nombre $nombre_seccion, ya existente.",$info["os"],$info["browser"],$info["version"],$ip);
            $_SESSION['warning'] = "La sección ya se encuentra registrada en el depósito.";
            header("Location:../modulos/gestion_seccion.php?deposito=".$deposito);
            die();
        }
        else
        {
            $nuevaSeccion = mysql_query("INSERT INTO secciones (id_deposito, nombre_seccion) VALUES ('$deposito','$nombre_seccion') ");
            auditoria($_SESSION['id_usuario'],"Registro una sección de nombre $nombre_seccion.",$info["os"],$info["browser"],$info["version"],$ip);
            $_SESSION['message'] = "La sección ha sido registrada satisfactoriamente.";
            header("Location:../modulos/gestion_seccion.php?deposito=".$deposito);
            die();
        }
    }
    elseif($operation == "update")
    {
        $actualizar_seccion = mysql_query("UPDATE secciones SET nombre_seccion = '$nombre_seccion' WHERE id_seccion = '$id' ");
        auditoria($_SESSION['id_usuario'],"Actualizó la sección de nombre $nombre_seccion.",$info["os"],$info["browser"],$info["version"],$ip);
        $_SESSION['message'] = "La sección ha sido actualizada satisfactoriamente.";
        header("Location:../modulos/secciones.php?deposito=".$deposito);
        die();
    }
    elseif($operation == "delete")
    {
        $verificar_insumos = mysql_query("SELECT * FROM insumos WHERE id_seccion = '$id' ");
        if(mysql_num_rows($verificar_insumos) == 0)
        {
            $delete_seccion = mysql_query("DELETE FROM secciones WHERE id_seccion = '$id' ");
            auditoria($_SESSION['id_usuario'],"Eliminó una sección",$info["os"],$info["browser"],$info["version"],$ip);
            $_SESSION['message'] = "La sección se ha eliminado satisfactoriamente.";
            header("Location:../modulos/secciones.php?deposito=".$deposito);
            die();
        }
        else
        {
            auditoria($_SESSION['id_usuario'],"Intento eliminar una sección que posee ".mysql_num_rows($verificar_insumos)." insumos asociados.",$info["os"],$info["browser"],$info["version"],$ip);
            $_SESSION['warning'] = "No es posible eliminar la sección, ya que posee ".mysql_num_rows($verificar_insumos)." insumos asociados.";
            header("Location:../modulos/secciones.php?deposito=".$deposito);
            die();
        }
    }
    else
    {
        header("Location:../");
    }

?>
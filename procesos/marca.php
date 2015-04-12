<?php

session_start();

include_once "../config/conection.php";

extract($_REQUEST);


    if($operation == "save")
    {
        $verificar_marca = mysql_query("SELECT * FROM marcas WHERE nombre_marca = '$nombre_marca' AND id_laboratorio = '$laboratorio' ");

        if(mysql_num_rows($verificar_marca) != 0)
        {
            $_SESSION['warning'] = "La marca ya se encuentra registrada.";
            header("Location:../modulos/laboratorios.php");
            die();
        }
        else
        {
            $nuevaMarca = mysql_query("INSERT INTO marcas (id_laboratorio, nombre_marca) VALUES ('$laboratorio','$nombre_marca') ");
            $_SESSION['message'] = "La marca ha sido registrada satisfactoriamente.";
            header("Location:../modulos/laboratorios.php");
            die();
        }
    }
    elseif($operation == "update")
    {
        $actualizar_marca = mysql_query("UPDATE marcas SET nombre_marca = '$nombre_marca' WHERE id_marca = '$id' ");
        $_SESSION['message'] = "La marca ha sido actualizada satisfactoriamente.";
        header("Location:../modulos/marcas.php?laboratorio=".$laboratorio);
        die();
    }
    elseif($operation == "delete")
    {
        $delete_marca = mysql_query("DELETE FROM marcas WHERE id_marca = '$id' ");
        $_SESSION['message'] = "La marca se ha eliminado satisfactoriamente.";
        header("Location:../modulos/marcas.php?laboratorio=".$laboratorio);
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
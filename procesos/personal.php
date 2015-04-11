<?php

session_start();

include_once "../config/conection.php";

extract($_REQUEST);

    if($operation == "save" || $operation == "update")
    {
        $fecha_ingreso = explode("-",$fecha_ingreso);
        list($dia,$mes,$ano)=$fecha_ingreso;
        $fecha_ingreso = $ano."-".$mes."-".$dia;
        $fecha_ingreso_nomina = explode("-",$fecha_ingreso_nomina);
        list($dia,$mes,$ano)=$fecha_ingreso_nomina;
        $fecha_ingreso_nomina = $ano."-".$mes."-".$dia;
    }

    if($operation == "save")
    {
        $verificar_persona = mysql_query("SELECT * FROM personas WHERE cedula = '$cedula' ");

        if(mysql_num_rows($verificar_persona) != 0)
        {
            $_SESSION['warning'] = "La persona identificada con la cédula $cedula ya se encuentra registrada.";
            header("Location:../modulos/gestion_personal.php");
            die();
        }
        else
        {
            $nuevaPersona = mysql_query("INSERT INTO personas (cedula, nombres, apellidos, fecha_ingreso, estatus, nomina, fecha_ingreso_nomina, estatus_nomina, nivel_academico, profesion, ubicacion, telefono) VALUES ('$cedula','$nombres','$apellidos','$fecha_ingreso','$estatus','$nomina','$fecha_ingreso_nomina','$estatus_nomina','$nivel_academico','$profesion','$ubicacion','$telefono') ");
            $_SESSION['message'] = "La persona ha sido registrada satisfactoriamente.";
            header("Location:../modulos/gestion_personal.php");
            die();
        }
    }
    elseif($operation == "update")
    {
        $actualizar_division = mysql_query("UPDATE personas SET cedula = '$cedula', nombres = '$nombres', apellidos = '$apellidos', fecha_ingreso = '$fecha_ingreso', estatus = '$estatus', nomina = '$nomina', fecha_ingreso_nomina = '$fecha_ingreso_nomina', estatus_nomina = '$estatus_nomina', nivel_academico = '$nivel_academico', profesion = '$profesion', ubicacion = '$ubicacion', telefono = '$telefono' WHERE cedula = '$id' ");
        $_SESSION['message'] = "Los datos de la persona han sido actualizados satisfactoriamente.";
        header("Location:../modulos/personal.php");
        die();
    }
    elseif($operation == "delete")
    {
        $verificar_persona = mysql_query("SELECT * FROM servicios WHERE cedula = '$id' ");
    
        if(mysql_num_rows($verificar_persona) == 0)
        {
            $delete_persona = mysql_query("DELETE FROM personas WHERE cedula = '$id' ");
            $_SESSION['message'] = "La persona se ha eliminado satisfactoriamente.";
            header("Location:../modulos/personal.php");
            die();
        }
        else
        {
            $_SESSION['warning'] = "No es posible eliminar la persona, ya que es responsable de ".mysql_num_rows($verificar_persona)." servicios.";
            header("Location:../modulos/personal.php");
            die();
        }
    }
    else
    {
        header("Location:../");
    }

?>
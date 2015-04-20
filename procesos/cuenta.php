<?php

session_start();

include_once "../config/conection.php";

extract($_REQUEST);

    if($operation == "save" || $operation == "update")
    {
        $password_usuario = base64_encode($password_usuario);
    }

    if($operation == "save")
    {
        $verificar_cuenta = mysql_query("SELECT * FROM usuarios WHERE nombre_usuario = '$nombre_usuario' ");

        if(mysql_num_rows($verificar_cuenta) != 0)
        {
            auditoria($_SESSION['id_usuario'],"Intento registrar un usuario de nombre $nombre_usuario ya existente.",$info["os"],$info["browser"],$info["version"],$ip);
            $_SESSION['warning'] = "El nombre de usuario $nombre_usuario ya se encuentra registrado, intenta nuevamente con un nombre diferente.";
            header("Location:../modulos/gestion_cuenta.php?cedula=".$cedula);
            die();
        }
        else
        {
            $nuevaCuenta = mysql_query("INSERT INTO usuarios (cedula, id_rol, nombre_usuario, clave_usuario) VALUES ('$cedula','$privilegio','$nombre_usuario','$password_usuario') ");
            auditoria($_SESSION['id_usuario'],"Creo un nuevo usuario identificado con la cedula $cedula",$info["os"],$info["browser"],$info["version"],$ip);
            $_SESSION['message'] = "La cuenta ha sido creada satisfactoriamente.";
            header("Location:../modulos/personal.php");
            die();
        }
    }
    elseif($operation == "update")
    {
        $actualizar_cuenta = mysql_query("UPDATE usuarios SET id_rol = '$privilegio', nombre_usuario = '$nombre_usuario', clave_usuario = '$password_usuario' WHERE id_usuario = '$id' ");
        auditoria($_SESSION['id_usuario'],"Actualizo el usuario de nombre $nombre_usuario",$info["os"],$info["browser"],$info["version"],$ip);
        $_SESSION['message'] = "El usuario ha sido actualizado satisfactoriamente.";
        header("Location:../modulos/cuentas.php");
        die();
    }
    elseif($operation == "delete")
    {
        $delete_cuenta = mysql_query("DELETE FROM usuarios WHERE id_usuario = '$id' ");
        auditoria($_SESSION['id_usuario'],"Elimino un usuario",$info["os"],$info["browser"],$info["version"],$ip);
        $_SESSION['message'] = "El usuario se ha eliminado satisfactoriamente.";
        header("Location:../modulos/cuentas.php");
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
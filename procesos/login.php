<?php

session_start();

include_once "../config/conection.php";

if(isset($_POST['ingresar']))
{
    extract($_REQUEST);
    $usuario = mysql_real_escape_string($_POST['usuario']);
    $contrasena = mysql_real_escape_string($_POST['password']);
    $contrasena = base64_encode($contrasena);

    $sql = mysql_query(" SELECT * FROM usuarios WHERE nombre_usuario = '".$usuario."' AND clave_usuario = '".$contrasena."' ")or die("Error al Validar la Contraseña");
    
    if ($row = mysql_fetch_assoc($sql)) 
    {
        $_SESSION['id_usuario'] = $row['id_usuario'];
        $_SESSION['cedula_user'] = $row['cedula'];
        $_SESSION['usuario'] = $row['nombre_usuario'];
        $_SESSION['rol'] = $row['id_rol'];
        auditoria($_SESSION['id_usuario'],"Inicio sesión",$info["os"],$info["browser"],$info["version"],$ip);
        mysql_close($conection);
        header("Location:../");
    }
    else
    {
        $_SESSION['menssage'] = "El usuario ingresado no existe en el sistema";
        header("Location:../");
    }
}
else
{
    header("Location:../");
}

?>
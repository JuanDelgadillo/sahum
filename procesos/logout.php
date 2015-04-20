<?php

session_start();

include_once "../config/conection.php";

if(isset($_SESSION['usuario']))
{
    auditoria($_SESSION['id_usuario'],"Finalizó la sesión",$info["os"],$info["browser"],$info["version"],$ip);
    session_destroy();
    header("Location:../");
}
else
{
    header("Location:../");
}

?>